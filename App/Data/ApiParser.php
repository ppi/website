<?php
namespace App\Data;
use \App\Data\ApiObject,
	App\Data\Api\Method,
	App\Data\Api\Property;

class ApiParser {
	
	function __construct() {
		
	}
	
	/**
	 * Parse the docblox XML into php objects
	 * 
	 * @param string $xml
	 * @return ApiObject
	 */
	function parseDocBloxXML($xml) {

		$apiObject = new ApiObject();
		$class = simplexml_load_string($xml);

		// Class Options
		$apiObject->set('name',     ltrim( (string) $class->full_name, '\\'));
		$apiObject->set('final',    (string) $class['final'] == 'true');
		$apiObject->set('abstract', (string) $class['abstract'] == 'true');

		// Properties
		foreach($class->property as $property) {

			$prop = new Property();
			$prop->set('name',        (string) $property->name);
			$prop->set('visibility',  (string) $property->visibility);
			$prop->set('final',       (string) $property['final'] == 'true');
			$prop->set('static',      (string) $property['static'] == 'true');
			$prop->set('line',        (string) $property['line']);
			$apiObject->addProperty($prop);
		}
		
		// Methods
		foreach($class->method as $method) {

			$m = new Method();
			$m->set('name',       (string) $method->name);
			$m->set('final',      (string) $method['final'] == 'true');
			$m->set('static',     (string) $method['static'] == 'true');
			$m->set('visibility', (string) $method['visibility']);
			$m->set('abstract',   (string) $method['abstract'] == 'true');
			$m->set('line',       (string) $method['line']);
			
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
	
	/**
	 * Get XML data from the api folder, by specifying the $file's name
	 * 
	 * @param string 	$file
	 * @return string
	 */
	function getXMLFromFile($file) {

		$filename = ROOTPATH . 'api' . DS . $file . '.xml';
		if(!file_exists($filename)) {
			return '';
		}
		return file_get_contents($filename);
		
	}
	
	
	
}