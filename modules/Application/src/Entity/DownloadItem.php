<?php

namespace Application\Entity;

class DownloadItem {

    protected $id;
    protected $name;
    protected $num_downloads;
    protected $url;
    protected $version;
    protected $description;
    protected $date_released;

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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDesc()
    {
        return $this->description;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getDateReleased()
    {
        if($this->date_released !== null && !($this->date_released instanceof \DateTime)) {
            $this->date_released = \DateTime::createFromFormat('Y-m-d', $this->date_released);
        }
        return $this->date_released;
    }

}