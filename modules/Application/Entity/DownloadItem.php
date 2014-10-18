<?php

namespace Application\Entity;

class DownloadItem {

    protected $id;
    protected $name;
    protected $num_downloads;
    protected $created;
    protected $description;
    protected $url;
    protected $version;

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

    public function getVendorFilesizeHuman()
    {
        return $this->convertFileSize($this->vendor_filesize);
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

    public function getNumDownloads()
    {
        return $this->num_downloads;
    }

    public function setNumDownloads($numDownloads)
    {
        $this->num_downloads = $numDownloads;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    protected function convertFileSize($size)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        for ($i = 0; $size > 1024; $i++) { $size /= 1024; }
        return round($size, 2).$units[$i];
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

}