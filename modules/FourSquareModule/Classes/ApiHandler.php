<?php

namespace FourSquareModule\Classes;
class ApiHandler
{
 
    protected $secret;
    protected $key;
    protected $cache;
    protected $categories = array(
        '4bf58dd8d48988d14c941735',
        '4bf58dd8d48988d14a941735',
        '4bf58dd8d48988d1d3941735',
        '4f04af1f2fb6e1c99f3db0bb',
        '4bf58dd8d48988d149941735',
        '4bf58dd8d48988d151941735'
    );
 
    public function __construct() { }
 
    public function setCache($cache)
    {
        $this->cache = $cache;
    }
 
    public function getCache()
    {
        return $this->cache;
    }
 
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }
 
    public function setKey($key)
    {
        $this->key = $key;
    }
 
    public function getVenues($lat, $lng)
    {
        $cache    = $this->getCache();
        $cacheKey = 'venues-lat-' . $lat . '-lng-' . $lng;
        
        // If we have been here before, return early.
        if ($cache->contains($cacheKey)) {
            $venues = $cache->fetch($cacheKey);
            return $venues;
        }
        
        $fields = array('lat', 'lng', 'address', 'city', 'state', 'postalCode', 'country', 'crossStreet');
        $url = 'https://api.foursquare.com/v2/venues/search?'; 
        $requestParams = array(
            'v'             => '20120610',
            'intent'        => 'browse',
            'radius'        => '9500',
            'limit'         => '100',
            'll'            => "$lat,$lng",
            'categoryId'    => implode(',', $this->categories),
            'client_id'     => $this->key,
            'client_secret' => $this->secret
        );
        
        $url      .= http_build_query($requestParams);
        $response = json_decode(file_get_contents($url), true);
        
        $venues = array();
        if ($response['meta']['code'] == 200) {
            foreach ($response['response'] as $responseVenues) {
                foreach ($responseVenues as $venue) {
                    
                    // Check if the venue has more than 10 check-ins ever, if not then skip it.
                    if (!$venue['stats']['checkinsCount'] > 10) {
                        continue;
                    }
                    $tmpData =  array(
                        'id'          => $venue['id'],
                        'name'        => $venue['name'],
                        'people'      => $venue['hereNow']['count'],
                        'contact'     => $venue['contact'],
                        'categories'  => $venue['categories'],
                        'stats'       => $venue['stats'],
                        'url'         => isset($venue['url']) ? $venue['url'] : ''
                    );
                    
                    foreach($fields as $field) {
                        $tmpData[$field] = isset($venue['location'][$field]) 
                            ? $venue['location'][$field] : '';
                    }
                    
                    $venues[] = $tmpData; 
                }
            }
        }
        
        $result = array('venues' => $venues);
 
        // Store the array in the Cache.
        $cache->save($cacheKey, $result, 600);
        
        return $result;
            
    }
 
}