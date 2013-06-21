<?php

namespace Application\Classes;

use Application\Entity\DownloadEntry as EntryEntity;

class DownloadCounter
{

    protected $storage;
    protected $ip;

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
     * @return integer
     */
    public function create($ip, $file, $withVendor)
    {

        $entry = new EntryEntity();
        $entry->setIP($ip);
        $entry->setDownloadItemID($file->getID());
        $entry->setWithVendor($withVendor);

        return $this->storage->insert(array(
            'ip_address'       => $entry->getIP(),
            'download_item_id' => $entry->getDownloadItemID(),
            'with_vendor'      => $entry->getWithVendor(),
            'created'          => time()
        ));
    }


    public function normaliseFileName($file)
    {
        $filename = $file->getFilename();
        if($withVendor) {
            $filename = str_replace('.zip', '-with-vendor.zip');
        }
        return $filename;
    }

}