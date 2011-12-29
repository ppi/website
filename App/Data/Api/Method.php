<?php
namespace App\Data\Api;
class Method {
	
	protected $_static = false;
	
	protected $_final = false;
	
	protected $_abstract = false;
	
	protected $_visibility = 'public';
	
	protected $_name = '';
	
	protected $_line = 0;
	
	function __construct() {
		
	}
	
	function getName() {
		return $this->_name;
	}
	
	function isStatic() {
		return $this->_static;
	}
	
	function isFinal() {
		return $this->_final;
	}
	
	function isAbstract() {
		return $this->_abstract;
	}
	
	function set($var, $value) {
		
		if(property_exists($this, '_' . $var)) {
			$this->{'_' . $var} = $value;
		}
	}	
	
}