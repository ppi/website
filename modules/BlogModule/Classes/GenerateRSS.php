<?php

namespace BlogModule\Classes;

class GenerateRSS {

    protected $cache = null;
    protected $defaultTTL = 43200; // (86400 / 2)
    protected $cacheKey = 'blog_rss_generate';
    protected $blogPostStorage = null;
    
    public function __construct($cache, $blogPostStorage)
    {
        $this->cache = $cache;
        $this->blogPostStorage = $blogPostStorage;
    }

    /**
     * Generate the RSS data
     * 
     * @return array
     */
    public function getRSSContent()
    {
        
        if ($this->cache->contains($this->cacheKey)) {
            $rssData = $this->cache->fetch($this->cacheKey);
        } else {

            $rssData = array();
            
            /* @todo - Generate RSS content */

            $this->cache->save($this->cacheKey, $rssData, $this->defaultTTL);
        }

        return $rssData;

    }

}