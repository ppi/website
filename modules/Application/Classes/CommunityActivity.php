<?php

namespace Application\Classes;

class CommunityActivity {
    
    public $cache = null;
    
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
                            'source' => 'github',
                            'url'	 => (string) $commit->link['href'],
                            'title'	 => $title . ' on ' . date('jS M Y \a\t g:i a', $timestamp)
                        );
                    }
                }
            }
        }
        
        krsort($activity);
    
        $this->cache->save($cacheName, $activity, 60*60);
    
        return $activity;
           
    }
    
    public function getTweets($usernames)
    {
        
        $activity = array();
        if(!empty($usernames)) {
            foreach($usernames as $username) {
                $activity += $this->parseTweets($username);
            }
        }
        return $activity;
    }

    public function parseTweets($username, $maxtweets = 20)
    {
    
        $cacheName = 'ppi-website-twitter-feeds';
        if($this->cache->contains($cacheName)) {
            return $this->cache->fetch($cacheName);
        }
        $tweet_array = array();
        $tweets = simplexml_load_file(sprintf("https://api.twitter.com/1/statuses/user_timeline.xml?include_rts=true&screen_name=%s", $username));
        foreach($tweets->status as $tweet ) {
            
            // Loop to limitate nr of tweets.
            if ($maxtweets == 0) {
                break;
            } else {
                $twit = (string) $tweet->text;  //Fetch the tweet itself
    
                // Convert URLs into hyperlinks
                $twit = preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a href=\"\\0\">\\0</a>", $twit);
    
                // Convert usernames (@) into links
                $twit = preg_replace("(@([a-zA-Z0-9\_]+))", "<a href=\"http://www.twitter.com/\\1\">\\0</a>", $twit);
    
                // Convert hash tags (#) to links
                $twit = preg_replace('/(^|\s)#(\w+)/', '\1<a href="http://search.twitter.com/search?q=%23\2">#\2</a>', $twit);
    
                //Specifically for non-English tweets, converts UTF-8 into ISO-8859-1
                //$twit = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $twit);
                $twit = utf8_decode($twit);
    
                // get the URL of the status..
                $status = "https://twitter.com/ppi_framework/status/" . ( (string) $tweet->id); 
    
                //Get the date it was posted
                $dateParseFormat = 'D M j G:i:s O Y';
                $pubdate = \DateTime::createFromFormat($dateParseFormat, (string) $tweet->created_at)->getTimestamp();
                $propertime = gmdate('F jS Y, H:i', $pubdate);  //Customize this to your liking
    
                //Store tweet and time into the array
                $tweet_item = array(
                    'title'  => $twit . date('jS M Y \a\t g:i a', $pubdate),
                    'url'    => $status,
                    'date'   => $propertime,
                    'source' => 'twitter'
                );
    
                $tweet_array[$pubdate] = $tweet_item;
    
                $maxtweets--;
            }
        }
        
        krsort($tweet_array);
    
        $this->cache->save($cacheName, $tweet_array, 60*60);
    
        // Return array
        return $tweet_array;
           
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