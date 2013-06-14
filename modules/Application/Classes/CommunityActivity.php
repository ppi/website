<?php

namespace Application\Classes;

class CommunityActivity {
    
    public $cache;
    
    public function __construct($cache)
    {
        $this->cache = $cache;
    }

    public function parseGithubFeeds($feeds)
    {
   
        $cacheName = 'ppi-website-github-feeds';
        if($this->cache->contains($cacheName)) {
            return $this->cache->fetch($cacheName);
        }
        
        $activity = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            if(isset($xml->entry)) {
                foreach($xml->entry as $commit){
                    $timestamp = strtotime( (string) $commit->updated);
                    list($day, $month, $year) = explode('/', date('d/m/Y', $timestamp));
                    if($year == 2012) {
                        $title = (string) $commit->title;
                        if(strlen($title) > 70) {
                            $title = trim(substr($title, 0, 70)). '..';
                        }
                        $title = htmlentities($title);
                        $activity[$timestamp] = array(
                            'source'  => 'github',
                            'url'     => (string) $commit->link['href'],
                            'title'   => $title,
                            'date'    => date('jS M Y \a\t g:i a', $timestamp)
                        );
                    }
                }
            }
        }
        
        krsort($activity);
    
        $this->cache->save($cacheName, $activity, 60*60);
    
        return $activity;
           
    }
    
    public function getGithub($feeds)
    {
       $activity = array();
        if(!empty($feeds)) {
            $activity = $this->parseGithubFeeds($feeds);
        }
    
        return $activity;
    }
       

    
}