<?php

namespace Application\Entity;

class DownloadEntry {

    protected $_id = NULL;
    protected $_ip_address = NULL;
    protected $_created = NULL;

    public function __construct($row) {
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

    public function setIpAddress($ip_address)
    {
        $this->_ip_address = $ip_address;
    }

    public function getIpAddress()
    {
        return $this->_ip_address;
    }

}