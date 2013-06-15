<?php

namespace Application\Entity;

class DownloadItem {

    protected $id;
    protected $name;
    protected $filename;
    protected $filesize;
    protected $vendor_filesize;
    protected $archive_type;
    protected $num_downloads;
    protected $created;
    protected $description;

    public function __construct($row) {
        foreach($row as $key => $val) {
            if(property_exists($this, $key)) {
                $this->{$key} = $val;
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getArchiveType()
    {
        return $this->archive_type;
    }

    public function setArchiveType($archiveType)
    {
        $this->archive_type = $archiveType;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getFilesizeHuman() {
        return $this->convertFileSize($this->filesize);
    }

    public function getFilesize()
    {
        return $this->filesize;
    }

    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;
    }

    public function getVendorFilesize()
    {
        return $this->vendor_filesize;
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

    protected function convertFileSize($size)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        for ($i = 0; $size > 1024; $i++) { $size /= 1024; }
        return round($size, 2).$units[$i];
    }

}