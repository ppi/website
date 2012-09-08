<?php

namespace Application\Classes;

class DownloadCounter {
    
    public $cache = null;
    
    public function __construct($cache)
    {
        $this->cache = $cache;
    }

    /**
     * Get the download count
     * 
     * @return int
     */
    public function getDownloadCount()
    {
        $cacheKey = 'site_download_count';
        return $this->cache->contains($cacheKey) ? $this->cache->fetch($cacheKey) : 0;
    }

    /**
     * Set the download count
     * 
     * @param integer $count
     */
    public function setDownloadCount($count)
    {
        $cacheKey = 'site_download_count';
        $this->cache->save($cacheKey, $count); // Store this forever, it should never expire
    }

    /**
     * Increment the download count
     * 
     * @return void
     */
    public function incrementDownloadCount() 
    {
        $this->setDownloadCount($this->getDownloadCount() + 1);
    }
    
}