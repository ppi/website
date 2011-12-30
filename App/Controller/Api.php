<?php
namespace App\Controller;
use App\Data\ApiParser;
class Api extends Application {
	
	function preDispatch() {
		$this->addCSS('light/api');
	}
	
	/**
	 * List the entire project API.
	 */
	function index() {
		$files = glob(ROOTPATH . 'api' . DS . '*.xml');
		$this->render('api/index', compact('files'));
	}
	
	function show() {

		$file      = $this->get('show', '');
		$cache     = $this->getCache();
		$cacheName = 'api__' . $file;
		if($cache->exists($cacheName)) {
			$apiObject = $cache->get($cacheName);
		} else {
			$apiParser = new ApiParser();
			$apiObject = $apiParser->parseDocBloxXML($apiParser->getXMLFromFile($file));
			$cache->set($cacheName, $apiObject);
		}
		$this->render('api/show', compact('apiObject'));
	}
	

}