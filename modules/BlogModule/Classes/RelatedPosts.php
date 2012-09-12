<?php

namespace BlogModule\Classes;

class RelatedPosts {

    protected $cache = null;
    protected $postStorage = null;
    protected $postTagStorage = null;
    
    public function __construct($cache, $postStorage, $postTagStorage)
    {
        $this->cache          = $cache;
        $this->postStorage    = $postStorage;
        $this->postTagStorage = $postTagStorage;
        
    }
    
    public function getRelatedPosts($post)
    {
        
        $cacheKey = 'blog_related_posts_' . $post->getID();
        if($this->cache->contains($cacheKey)) {
            $posts = $this->cache->fetch($cacheKey);
        } else {
            $posts = $this->postStorage->getRelatedPostsByTag($post->getID(), $this->postTagStorage);
            $this->cache->save($cacheKey, $posts, 86400);
        }
        
        return $posts;
        
    }

}