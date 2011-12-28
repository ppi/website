<?php
namespace App\Data;
use App\Data\Api\Method;
use App\Data\Api\Property;

class ApiObject {
	
	protected $_methods = array();
	protected $_properties = array();
	
	/**
	 * Constructor, lets take some XML and make magical objects out of it.
	 * 
	 * @param string $xml
	 */
	function __construct($xml) {
		
		$doc = new \DOMDocument();
		$doc->loadXML($xml);
		$xpath = new \DOMXPath($doc);
		print_r($xml); exit;
		var_dump($xpath->query('//class|//interface')); exit;
		
	}
	
	/**
	 * 
	 * Lets create method objects from our XML
	 * 
	 * @todo lets check what object type the xpath code above in construct give us back and typehint this function
	 * @param $param
	 * @return boolean
	 */
	function createMethods($param) {
		
		foreach($var as $method) {
			$this->_methods[] = new Methods();
		}
		return $count > 0;
	}
	
	/**
	 * 
	 * Lets create property objects from our XML
	 * 
	 * @todo lets check what object type the xpath code above in construct give us back and typehint this function
	 * @param $param
	 * @return boolean
	 */
	function createProperties($param) {
		
		foreach($var as $method) {
			$this->_methods[] = new Property();
		}
		return $count > 0;
	}
	
}