<?php

namespace BlogModule\Classes;

class GenerateRSS {

    protected $cache = null;
    protected $defaultTTL = 43200; // (86400 / 2)
    protected $cacheKey = 'blog_rss_generate';
    protected $routeKey = 'BlogView';
    protected $blogPostStorage = null;
    protected $router = null;
    
    public function __construct($cache, $blogPostStorage, $router)
    {
        $this->cache = $cache;
        $this->blogPostStorage = $blogPostStorage;
        $this->router = $router;
    }

    /**
     * Generate the RSS data
     * 
     * @return array
     */
    public function getRSSData()
    {
        
        if ($this->cache->contains($this->cacheKey)) {
            $rssData = $this->cache->fetch($this->cacheKey);
        } else {

            $rssData = array();
            foreach($this->blogPostStorage->getAllPublished() as $post) {
                $rssData[] = array(
                    'title' => $post->getTitle(),
                    'date'  => $post->getCreatedDate()->format('D, d M Y H:i:s O'),
                    'link'  => $this->router->generate($this->routeKey, array(
                        'postID' => $post->getID(),
                        'title'  => $post->getTitleForLink()
                    )) 
                );
            }
            
            $this->cache->save($this->cacheKey, $rssData, $this->defaultTTL);
        }

        return $rssData;

    }

}