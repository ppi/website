<?php

namespace App\Entity;

class NewsletterEntry {
	
	protected $_id = null;
	protected $_name = null;
	protected $_email = null;
	protected $_created_time = null;
	
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
	
	public function getEmail() {
		return $this->_email;
	}
    
    public function getName() {
        return $this->_name;
    }
	
	public function getCreateTime() {
		return $this->_created_time;
	}
    
}