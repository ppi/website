<?php

namespace BlogModule\Entity;

class BlogTag {
	
	protected $_id = null;
	protected $_title = null;
	
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
	
	public function getTitle() {
		return $this->_title;
	}
    
}