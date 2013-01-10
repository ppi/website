<?php

namespace BlogModule\Entity;

class BlogPost {
	
	protected $_id;
	protected $_title;
	protected $_content;
	protected $_category_id;
	protected $_date_created;
    protected $_slug;
    protected $_description;
    
    protected $_tags = array();
	
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
    
    public function getDescription() {
        return $this->_description;
    }
    
    public function getTitleForLink() {
        return strtolower(str_replace(' ', '-', $this->getTitle()));
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
	
	public function setTags($tags) {
		$this->_tags = $tags;
	}
	
	public function hasTags() {
		return !empty($this->_tags);
	}
	
	public function getTags() {
		return $this->_tags;
	}
    
    public function setContent($c)
    {
        $this->_content = $c;
    }
    
    public function getSlug()
    {
        return $this->_slug;
    }
    
}