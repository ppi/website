<?php

namespace BlogModule\Classes;

class RecentComments {

    public $cache = null;
    
    const DEFAULT_RECENT_COMMENTS_COUNT = 5;

    public function __construct($cache)
    {
        $this->cache = $cache;
    }

    /**
     * Get the comments from DISQUS
     * 
     * @return array
     */
    public function getComments()
    {
        $cacheKey = 'recent_comments';
        if ($this->cache->contains($cacheKey)) {
            $recentComments = $this->cache->fetch($cacheKey);
        } else {

            $recentComments = array();
            $result         = simplexml_load_string(file_get_contents("http://ppiframework.disqus.com/latest.rss"));

            if (isset($result->channel->item)) {
                foreach ($result->channel->item as $entry) {
                    $recentComments[] = array(
                        'title'         => (string) $entry->title,
                        'link'          => (string) $entry->link,
                        'description'   => strip_tags((string) $entry->description),
                        'pubDate'       => (string) $entry->pubDate
                    );
                }
            }

            $this->cache->save($cacheKey, $recentComments, 86400);

        }

        return $recentComments;

    }

}