<?php
namespace App\Data\Api;
class Method {
	
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
	
	/**
	 * Keywords
	 * 
	 * @var string
	 */
	protected $_keywords = '';
	
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
	
	/**
	 * Get any keywords for this method such as 'final' and 'static'
	 * 
	 * @todo revise the name of this function
	 * @return string
	 */
	function getKeywords() {
		
	}
	
}