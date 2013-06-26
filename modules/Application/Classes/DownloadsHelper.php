<?php
namespace Application\Classes;

class DownloadsHelper {

    protected $storage;
    protected $downloadsBasePath;
    protected $publicBasePath;

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

    public function setPublicBasePath($path)
    {
        $this->publicBasePath = $path;
    }

    public function getFullDownloadPath($filename)
    {
        return $this->downloadsBasePath . '/' . $filename;
    }

    public function copyFileToPublicFolder($path, $filename)
    {
        $dir = dirname($path);
        $newFilename = str_replace('.zip', '_' . sha1(microtime(true)) . '.zip', $filename);
        copy($path, $this->publicBasePath . '/' . $newFilename);
        return $newFilename;
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