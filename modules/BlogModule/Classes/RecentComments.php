<?php

namespace BlogModule\Classes;

class RecentComments {

    public $cache = null;
    
    const DEFAULT_RECENT_COMMENTS_COUNT = 5;
    const DEFAULT_DESC_TRUNCATION_LENGTH = 20;

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
                        'description'   => $this->prepareDesc((string) $entry->description),
                        'pubDate'       => (string) $entry->pubDate
                    );
                }
            }

            $this->cache->save($cacheKey, $recentComments, 86400);

        }

        return $recentComments;

    }

    /**
     * Prepare the description, strip out tags and perform truncation
     * 
     * @param $desc
     * @return string
     */
    protected function prepareDesc($desc)
    {
        
        $desc = html_entity_decode(strip_tags($desc), ENT_QUOTES, 'UTF-8');
        if(mb_strlen($desc) > 60) {
            $desc = mb_substr($desc, 0, 60) . ' ...';
        }
        return $desc;
    }

}