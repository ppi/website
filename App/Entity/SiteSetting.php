<?php

namespace App\Entity;

class SiteSetting {
	
	protected $_id = null;
	protected $_key = null;
	protected $_value = null;
	
	public function __construct($row) {
		foreach($row as $key => $val) {
			if(property_exists($this, '_' . $key)) {
				$this->{'_' . $key} = $val;
			}
		}
	}
	
	public function getID() {
		return $this->_id;
	}
	
	public function getKey() {
		return $this->_key;
	}
	
	public function getValue() {
		return $this->_value;
	}
	
}