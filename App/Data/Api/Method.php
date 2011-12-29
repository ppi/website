<?php
namespace App\Data\Api;
class Method {
	
	protected $_static = false;
	
	protected $_final = false;
	
	protected $_abstract = false;
	
	protected $_visibility = 'public';
	
	protected $_name = '';
	
	protected $_description = '';
	
	protected $_line = 1;
	
	protected $_arguments = array();
	
	protected $_return = array(
		'type' => 'void',
		'line' => 1
	);
	
	function __construct() {
		
	}
	
	function set($var, $value) {
		if(property_exists($this, '_' . $var)) {
			$this->{'_' . $var} = $value;
		}
	}	
	
	function getName() {
		return $this->_name;
	}
	
	function getDesc() {
		return $this->_description;
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
	
	function addArgument(array $options) {
		$this->_arguments[] = $options;
	}
	
	function hasArguments() {
		return count($this->_arguments) > 0;
	}
	
	function getArguments() {
		return $this->_arguments;
	}
	
	function addReturnValue(array $options) {
		$this->_return = $options;
	}
	
	function getReturnType() {
		return $this->_return['type'];
	}
	
	function getReturnLine() {
		return $this->_return['line'];
	}
	
}