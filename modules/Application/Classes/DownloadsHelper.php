<?php
namespace Application\Classes;

class DownloadsHelper {

    protected $storage;

    public function setDownloadStorage($s)
    {
        $this->storage = $s;
    }

}