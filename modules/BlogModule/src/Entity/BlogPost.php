<?php

namespace BlogModule\Entity;

use DateTime;

class BlogPost {
	
	protected $id;
	protected $title;
	protected $content;
	protected $category_id;
	protected $date_created;
    protected $slug;
    protected $desc;
    
	public function __construct($row) {
		foreach($row as $key => $val) {
			if(property_exists($this, $key)) {
				$this->{$key} = $val;
			}
		}
	}
	
	public function getID() {
		return $this->id;
	}
	
	public function getCategoryID() {
		return $this->category_id;
	}
	
	public function getTitle() {
		return $this->title;
	}
    
    public function getDescription() {
        return $this->desc;
    }
    
    public function getTitleForLink() {
        return strtolower(str_replace(' ', '-', $this->getTitle()));
    }
	
	public function getShortContent() {
		$content = explode('[split]', $this->getContent());
		return $content[0];
	}
    
    public function getContent() {
        return $this->content;
    }

	/**
	 * Get the created date
	 * 
	 * @return \DateTime
	 */
	public function getCreatedDate() {
		return DateTime::createFromFormat('d/m/Y', $this->date_created);
	}
	
    public function setContent($c)
    {
        $this->content = $c;
    }
    
    public function getSlug()
    {
        return $this->slug;
    }
    
}