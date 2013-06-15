<?php

namespace Application\Classes;

class ActivityHelper {
    
    protected $cache;
    protected $githubFeeds;
    protected $twitterUsername;

    protected $oauthDriver;

    public function setOAuthDriver($driver)
    {
        $this->oauthDriver = $driver;
    }
    
    public function setGithubFeeds($feeds)
    {
         $this->githubFeeds = $feeds;
    }

    public function setTwitterUsername($username)
    {
        $this->twitterUsername = $username;
    }

    public function setCache($cache)
    {
        $this->cache = $cache;
    }

    public function getGithubActivity()
    {
       $activity = array();
        if(!empty($this->githubFeeds)) {
            $activity = $this->parseGithubFeeds($this->githubFeeds);
        }
    
        return $activity;
    }

    public function getTwitterActivity()
    {
        $cacheName = 'ppi-twitter-feeds';
        if($this->cache->contains($cacheName)) {
            return $this->cache->fetch($cacheName);
        }

        $username = $this->twitterUsername;

        $this->oauthDriver->request('GET', $this->oauthDriver->url('1.1/statuses/user_timeline'), array(
            'screen_name' => $username
        ));

        $tweets = json_decode($this->oauthDriver->response['response']);
        $tweets = $this->sortTweets($tweets);

        $this->cache->save($cacheName, $tweets, 86400 / 2);

        return $tweets;
    }

    public function sortTweets($tweets, $tweetLimit = 100)
    {
        
        $activity = array();
        foreach($tweets as $t) {
            $text = $t->text;
            

           // Convert URLs into hyperlinks
            $text = preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a href=\"\\0\">\\0</a>", $text);

            // Convert usernames (@) into links
            $text = preg_replace("(@([a-zA-Z0-9\_]+))", '<a target="_blank" href="http://www.twitter.com/\\1">\\0</a>', $text);

            // Convert hash tags (#) to links
            $text = preg_replace('/(^|\s)#(\w+)/', '\1<a href="http://search.twitter.com/search?q=%23\2">#\2</a>', $text);

            //Specifically for non-English tweets, converts UTF-8 into ISO-8859-1
            //$text = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $text);
            $text = utf8_decode($text);

            // get the URL of the status..
            $status = "https://twitter.com/ppi_framework/status/" . ( (string) $t->id); 

            $timestamp = strtotime($t->created_at . ' UTC');
            $propertime = gmdate('F jS Y, H:i', $timestamp);  //Customize this to your liking

            //Store tweet and time into the array
            $tweet_item = array(
                'title'  => $text,
                'url'    => $status,
                'date'   => $propertime,
                'source' => 'twitter'
            );

            $activity[$timestamp] = $tweet_item;

            if(count($activity) >= $tweetLimit) {
                break;
            }

        }
        
        krsort($activity);
    
        return $activity;
    }


    public function parseGithubFeeds($feeds)
    {
   
        $cacheName = 'ppi-website-github-activity';
        if($this->cache->contains($cacheName)) {
            return $this->cache->fetch($cacheName);
        }
        
        $activity = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            if(isset($xml->entry)) {
                foreach($xml->entry as $commit) {
                    $timestamp = strtotime( (string) $commit->updated);
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
        
        krsort($activity);
    
        $this->cache->save($cacheName, $activity, 60*60);
    
        return $activity;
           
    }
    

       

    
}