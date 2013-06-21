<?php

namespace Application\Entity;

class DownloadEntry {

    protected $_id;
    protected $_ip_address;
    protected $_created;
    protected $_download_item_id;
    protected $_with_vendor;

    public function __construct($row = array()) {
        foreach($row as $key => $val) {
            if(property_exists($this, '_' . $key)) {
                $this->{'_' . $key} = $val;
            }
        }
    }

    public function setCreated($created)
    {
        $this->_created = $created;
    }

    public function getCreated()
    {
        return $this->_created;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setIP($ipAddress)
    {
        $this->_ip_address = $ipAddress;
    }

    public function getIP()
    {
        return $this->_ip_address;
    }

    public function getDownloadItemID()
    {
        return $this->_download_item_id;
    }

    public function setDownloadItemID($id)
    {
        $this->_download_item_id = $id;
    }

    public function setWithVendor($bool)
    {
        $this->_with_vendor = (int) $bool;
    }

    public function getWithVendor()
    {
        return $this->_with_vendor;
    }

}