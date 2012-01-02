<?php
namespace App\Controller;
class Search extends Application {
	
	const maxAjaxResults = 50;
	
	function index() {
		
	}
	
	function ajax_search() {
		
		// Generic response structure
		$response = array(
			'status'      => 'E_OK',    // Status of the request
			'link'        => '',        // The link to go to upon
			'suggestions' => array(),   // The content of the response
			'numResults'  => 0,         // the number of results in this response,
			'data'        => array()
		);
		
		$keyword = $this->getQuery('query', '');
		
		if($keyword == '') {
			$response['status'] = 'E_NO_KEYWORD';
			$this->sendAjaxContent($response);
		}
		
		// jQuery plugin requires this to be passed back via XHR.
		$response['query'] = $keyword;
		
		$baseUrl = $this->getBaseUrl();
		
		// Get the searchable API data
		$jsonApiDataPath = ROOTPATH . 'api' . DS . 'searchdata.json';
		if(!file_exists($jsonApiDataPath)) {
			$response['status'] = 'E_NO_DATAFILE_FOUND';
			$this->sendAjaxContent($response);
		}

		// Lets fetch it
		$data = json_decode(file_get_contents($jsonApiDataPath), true);

		// Look through API methods
		foreach($data['methods'] as $method) {
			if(stripos($method['title'], $keyword) !== false) {
				// Make something like: PPI\Cache->set()
				$response['suggestions'][] = $method['class'] . '->' . $method['title'] . '()';
				$response['data'][] = $baseUrl . 'api/show/' . 
										str_replace('\\', '_', $method['class']) .
										'#m-' . $method['title'];
				
				$response['numResults']++;
				
				// Threshold bailout
				if($response['numResults'] >= self::maxAjaxResults) {
					$this->sendAjaxContent($response);
				}
			}
		}
		
		// Look through API classes
		foreach($data['classes'] as $class) {
			if(stripos($class, $keyword) !== false) {

				$response['suggestions'][] = $class;
				$response['data'][] = $baseUrl . 'api/show/' . str_replace('\\', '_', $class);
				$response['numResults']++;
				
				// Threshold bailout
				if($response['numResults'] >= self::maxAjaxResults) {
					$this->sendAjaxContent($response);
				}
			}
		}
		$this->sendAjaxContent($response);
	}
	
	function results() {
		
		// Generic response structure
		$response = array(
			'status'      => 'E_OK',    // Status of the request
			'link'        => '',        // The link to go to upon
			'methods'     => array(),   // The content of the response
			'classes'     => array(),   // The content of the response
			'numResults'  => 0,         // the number of results in this response,
			'data'        => array()
		);
		
		$keyword = $this->getQuery('keyword', '');
		if($keyword == '') {
			$this->displayResults();
		}
		
		// Get the searchable API data
		$jsonApiDataPath = ROOTPATH . 'api' . DS . 'searchdata.json';
		if(!file_exists($jsonApiDataPath)) {
			$this->displayResults();
		}
		
		// Lets fetch it
		$data = json_decode(file_get_contents($jsonApiDataPath), true);
		
		// jQuery plugin requires this to be passed back via XHR.
		$response['query'] = $keyword;
		
		$baseUrl = $this->getBaseUrl();
		
		// Look through API methods
		foreach($data['methods'] as $method) {
			if(stripos($method['title'], $keyword) !== false) {
				// Make something like: PPI\Cache->set()
				$response['methods'][] = array(
					'title' => $method['class'] . '->' . $method['title'] . '()',
					'url'   => $baseUrl . 'api/show/' .  str_replace('\\', '_', $method['class']) . '#m-' . $method['title'],
					'type'  => 'method'
				);
			}

		}
		
		// Look through API classes
		foreach($data['classes'] as $class) {
			if(stripos($class, $keyword) !== false) {
				$response['classes'][] = array(
					'title' => $class,
					'url'   => $baseUrl . 'api/show/' . str_replace('\\', '_', $class),
					'type'  => 'class'
				);
			}
		}
		$this->displayResults($response);
	}
	
	/**
	 * Display search results
	 * 
	 * @param array $response
	 * @return void
	 */
	protected function displayResults($response = array()) {
		
		$this->addCSS('light/search');
		$this->render('search/results', compact('response'));
	}

	/**
	 * Send the respone back to the user
	 * 
	 * @param array $response
	 * @return void
	 */
	protected function sendAjaxContent(array $response) {
		die(json_encode($response));
	}
	
}