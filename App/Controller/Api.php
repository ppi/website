<?php
namespace App\Controller;
class Api extends Application {
	
	function preDispatch() {
		$this->addCSS('light/api');
	}
	
	// List the entire project API.
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
	 */
	protected function getAPIObject($xml) {

		$apiObject = new \App\Data\ApiObject();
		$doc = new \DOMDocument();
		$doc->loadXML($xml);
		$class = $doc->getElementsByTagName('class')->item(0);

		// Class Options
		$className = $name = ltrim($class->getElementsByTagName('full_name')->item(0)->nodeValue, '\\');
		$apiObject->set('name', $className);
		$apiObject->set('final', $class->getAttribute('final') == 'true');
		$apiObject->set('abstract', $class->getAttribute('abstract') == 'true');

		// Properties
		$properties = $class->getElementsByTagName('property');
		foreach($properties as $property) {
			$prop = new \App\Data\Api\Property();
			$prop->set('name', $property->getElementsByTagName('name')->item(0)->nodeValue);
			$prop->set('visibility', $property->getAttribute('visibility'));
			$prop->set('final', $property->getAttribute('final') == 'true');
			$prop->set('static', $property->getAttribute('static') == 'true');
			$prop->set('line', $property->getAttribute('line'));
			$apiObject->addProperty($prop);
		}
		
		// Methods
		$methods = $class->getElementsByTagName('method');
		foreach($methods as $method) {
			$m = new \App\Data\Api\Method();
			$m->set('name', $method->getElementsByTagName('name')->item(0)->nodeValue);
			$m->set('visibility', $method->getAttribute('visibility'));
			$m->set('final', $method->getAttribute('final') == 'true');
			$m->set('static', $method->getAttribute('static') == 'true');
			$m->set('abstract', $method->getAttribute('abstract') == 'true');
			$m->set('line', $method->getAttribute('line'));
			$apiObject->addMethod($m);
		}
		
		return $apiObject;

	}
	
}