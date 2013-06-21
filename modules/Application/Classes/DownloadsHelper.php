<?php
namespace Application\Classes;

class DownloadsHelper {

    protected $storage;
    protected $downloadsBasePath;

    public function setDownloadStorage($s)
    {
        $this->storage = $s;
    }

    public function getDownloadFileByID($id)
    {
        return $this->storage->getFileByID($id);
    }

    public function setDownloadsBasePath($path)
    {
        $this->downloadsBasePath = $path;
    }

}