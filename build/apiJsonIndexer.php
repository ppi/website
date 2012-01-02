<?php

error_reporting(-1);
date_default_timezone_set('Europe/London');
require_once 'PPI/PPI/init.php';

$files   = glob(ROOTPATH . 'api/*.xml');
$methods = array();

foreach($files as $file) {

	$simpleXML = simplexml_load_file($file);
	if(isset($simpleXML->method)) {
		$class = (string) $simpleXML->full_name;
		
		$result['classes'][] = $class;
		
		foreach($simpleXML->method as $method) {
			$methods[] = array(
				'class' => $class,
				'title' => (string) $method->name
			);
		}
	}
}

$result['methods'] = $methods;

unlink(ROOTPATH . 'api/searchdata.json');
file_put_contents(ROOTPATH . 'api/searchdata.json', json_encode($result));

die('Methods Indexed: ' . count($methods) . "\n\n");
