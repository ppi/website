<?php

namespace Application\Classes;

class DownloadCounter {

    public $storage = null;
    public $ip = null;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }
    
    public function setIP($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get the download count
     *
     * @return int
     */
    public function getDownloadCount()
    {
        return $this->storage->countAll();
    }
    
    public function setDownloadStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * Increment the download count
     *
     * @return void
     */
    public function incrementDownloadCount()
    {
        return $this->storage->insert(array('ip_address' => $this->ip, 'created' => time()));
    }

}