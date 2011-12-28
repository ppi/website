<?php
namespace App\Data\Api;
class Property {
	
	protected $_static = false;
	
	protected $_final = false;
	
	protected $_abstract = false;
	
	function __construct($xml) {
		
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
	
	
}