<?php
namespace App\Data;
use App\Data\Api\Method;
use App\Data\Api\Property;

class ApiObject {
	
	protected $_methods = array();
	protected $_properties = array();
	protected $_consts = array();
	protected $_final = false;
	protected $_abstract = false;
	protected $_name = '';
	protected $_interface = false;
	protected $_class = false;
	
	function __construct() {

	}
	
	function getName() {
		return $this->_name;
	}
	
	function isInterface() {
		return $this->_interface;
	}
	
	function isClass() {
		return $this->_class;
	}
	
	function isAbstract() {
		return $this->_abstract;
	}
	
	function set($var, $value) {
		
		if(property_exists($this, '_' . $var)) {
			$this->{'_' . $var} = $value;
		}
	}
	
	function addMethod(Method $method) {
		$this->_methods[] = $method;
	}
	
	function addProperty(Property $property) {
		$this->_properties[] = $property;
	}
	
	function getMethods() {
		return $this->_methods;
	}
	
	function getProperties() {
		return $this->_properties;
	}
}