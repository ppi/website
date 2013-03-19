<?php

namespace Application\Entity;

class DownloadItem {

    protected $_id = NULL;
    protected $_name = NULL;
    protected $_filename = NULL;
    protected $_filesize = NULL;
    protected $_archive_type = NULL;
    protected $_num_downloads = NULL;
    protected $_created = NULL;
/*
 *
CREATE TABLE download_item

 *
 */
    public function __construct($row) {
        foreach($row as $key => $val) {
            if(property_exists($this, '_' . $key)) {
                $this->{'_' . $key} = $val;
            }
        }
    }

    public function getId() {
        return $this->_id;
    }

    public function getArchiveType()
    {
        return $this->_archive_type;
    }

    public function setArchiveType($archive_type)
    {
        $this->_archive_type = $archive_type;
    }

    public function getFilename()
    {
        return $this->_filename;
    }

    public function setFilename($filename)
    {
        $this->_filename = $filename;
    }

    public function getFilesizeHuman() {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $size = $this->getFilesize();
        for ($i = 0; $size > 1024; $i++) { $size /= 1024; }
        return round($size, 2).$units[$i];
    }

    public function getFilesize()
    {
        return $this->_filesize;
    }

    public function setFilesize($filesize)
    {
        $this->_filesize = $filesize;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getNumDownloads()
    {
        return $this->_num_downloads;
    }

    public function setNumDownloads($num_downloads)
    {
        $this->_num_downloads = $num_downloads;
    }

}