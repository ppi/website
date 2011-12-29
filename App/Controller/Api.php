<?php
namespace App\Controller;
class Api extends Application {
	
	function preDispatch() {
		$this->addCSS('light/api');
	}
	
	/**
	 * List the entire project API.
	 */
	function index() {
		
		$files = glob(ROOTPATH . 'api' . DS . '*.xml');
		foreach($files as $file) {
			$pathinfo = pathinfo($file);
			$filenames[] = str_replace('.xml', '', $pathinfo['filename']);
		}
		
		$this->render('api/index', compact('filenames'));
	}
	
	function show() {
		
		$file      = $this->get('show', '');
		$cache     = $this->getCache();
		$cacheName = 'api__' . $file;
		if($cache->exists($cacheName)) {
			$apiObject = $cache->get($cacheName);
		} else {
			$apiObject = $this->getAPIObject($this->getXMLFromFile($file));
		}
		
		$this->render('api/show', compact('apiObject'));
	}
	
	protected function getXMLFromFile($file) {

		$filename = ROOTPATH . 'api' . DS . $file . '.xml';
		if(file_exists($filename)) {
			return file_get_contents($filename);
		}
		return '';
	}
	
	/**
	 * Lets take some XML and make magical objects out of it.
	 * 
	 * @todo get the description from docblock->description
	 * @param string $xml
	 * @return \App\Data\ApiObject
	 */
	protected function getAPIObject($xml) {

		$apiObject = new \App\Data\ApiObject();
		$class = simplexml_load_string($xml);

		// Class Options
		$apiObject->set('name', ltrim( (string) $class->full_name, '\\'));
		$apiObject->set('final', (string) $class['final'] == 'true');
		$apiObject->set('abstract', (string) $class['abstract'] == 'true');

		// Properties
		foreach($class->property as $property) {
			$prop = new \App\Data\Api\Property();
			$prop->set('name', (string) $property->name);
			$prop->set('visibility', (string) $property->visibility);
			$prop->set('final', (string) $property['final'] == 'true');
			$prop->set('static', (string) $property['static'] == 'true');
			$prop->set('line', (string) $property['line']);
			$apiObject->addProperty($prop);
		}
		
		// Methods
		foreach($class->method as $method) {

			$m = new \App\Data\Api\Method();
			$m->set('name', (string) $method->name);
			$m->set('final', (string) $method['final'] == 'true');
			$m->set('static', (string) $method['static'] == 'true');
			$m->set('visibility', (string) $method['visibility']);
			$m->set('abstract', (string) $method['abstract'] == 'true');
			$m->set('line', (string) $method['line']);
			
			if(isset($method->docblock)) {
	
				$m->set('description', (string) $method->docblock->description);

				if(isset($method->docblock->tag)) {

					foreach($method->docblock->tag as $tag) {
						
						if($tag['name'] == 'param') {
							
							$m->addArgument(array(
								'name' => (string) $tag['variable'],
								'type' => (string) $tag['type'],
								'desc' => (string) $tag['description'],
								'line' => (string) $tag['line']
							));
							
						} elseif($tag['name'] == 'return') {
							
							$m->addReturnValue(array(
								'type' => (string) $tag['type'],
								'line' => (string) $tag['line']
							));
						}
					}
				}
				
			}

			
			$apiObject->addMethod($m);
		}
		
		return $apiObject;

	}
	
}