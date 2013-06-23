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

    public function getFullDownloadPath($filename)
    {
        return $this->downloadsBasePath . '/' . $filename;
    }


    public function normaliseFileName($file, $withVendor)
    {
        $filename = $file->getFilename();
        if($withVendor) {
            $filename = str_replace('.zip', '-with-vendor.zip', $filename);
        }
        return $filename;
    }

}