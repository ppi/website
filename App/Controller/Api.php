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
	 * Get the API object from an XML structure.
	 * 
	 * @param string $xml
	 */
	protected function getAPIObject($xml) {
		return new \App\Data\ApiObject($xml);
		
	}
	
}