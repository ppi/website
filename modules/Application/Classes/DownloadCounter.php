<?php

namespace Application\Classes;
use Application\Storage\DownloadEntry as DownloadEntryStorage;

class DownloadCounter {

    public $storage = null;
    public $_ip = null;

    public function __construct($ip, $storage)
    {
        $this->storage = $storage;
        $this->_ip     = $ip;
    }

    /**
     * Get the download count
     *
     * @return int
     */
    public function getDownloadCount()
    {
        $download = new DownloadEntryStorage($this->storage);
        return $download->countAll();
    }

    /**
     * Set the download count
     *
     * @param integer $count
     */
    public function setDownloadCount()
    {
        $download = new DownloadEntryStorage($this->storage);
        $userIP   = $this->_ip;
        $created  = time();

        return $download->insert(array('ip_address' => $userIP, 'created' => $created));
    }

    /**
     * Increment the download count
     *
     * @return void
     */
    public function incrementDownloadCount()
    {
        $this->setDownloadCount();
    }

}