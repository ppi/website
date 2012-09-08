<?php

namespace App\Entity;

class BlogPost {
	
	protected $_id = null;
	protected $_title = null;
	protected $_content = null;
	protected $_category_id = null;
	protected $_date_created = null;
	
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
	
	public function getCategoryID() {
		return $this->_category_id;
	}
	
	public function getTitle() {
		return $this->_title;
	}
	
	public function getShortContent() {
		$content = explode('[split]', $this->getContent());
		return $content[0];
	}
    
    public function getContent() {
        return $this->_content;
    }

	/**
	 * Get the created date
	 * 
	 * @return \DateTime
	 */
	public function getCreatedDate() {
		$dt = new \DateTime();
		$dt->setTimestamp($this->_date_created);
		return $dt;
	}
    
}