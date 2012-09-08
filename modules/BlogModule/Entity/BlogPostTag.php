<?php

namespace BlogModule\Entity;

class BlogPostTag {
	
	protected $_id = null;
	protected $_post_id = null;
	protected $_tag_id = null;
	protected $_tag_title = null;
	protected $_tag_count = null;
	
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
	
	public function getPostID() {
		return $this->_post_id;
	}
	
	public function getTagID() {
		return $this->_tag_id;
	}
	
	public function getTagCount() {
		return $this->_tag_count;
	}
	
	public function getTitle() {
		return $this->_tag_title;
	}
    
}