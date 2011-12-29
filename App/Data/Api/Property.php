<?php
namespace App\Data\Api;
class Property {
	
	/**
	 * Method name
	 * 
	 * @var string
	 */
	protected $_name = '';
	
	/**
	 * Visibility
	 * 
	 * @var string
	 */
	protected $_visibility = '';
	
	protected $_static = false;
	
	protected $_final = false;
	
	protected $_abstract = false;
	
	protected $_line = 0;
	
	/**
	 * Get the name of the method
	 * 
	 * @return string
	 */
	function getName() {
		return $this->_name;
	}
	
	/**
	 * Get the visibility of the method
	 * 
	 * @return string
	 */
	function getVisibility() {
		return $this->_visibility;
	}
	
	function set($var, $value) {
		
		if(property_exists($this, '_' . $var)) {
			$this->{'_' . $var} = $value;
		}
		
	}
	
}