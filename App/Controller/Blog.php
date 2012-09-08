<?php

namespace App\Controller;

class Blog extends Application {

	function index($tagID = null) {
		
		$bs    = $this->getBlogStorage();
		
		if($tagID === null) {
			$posts = $bs->getAllPublished();
		} else {
			$posts = $this->getBlogPostTagStorage()->getPostsByTagID($tagID);
		}
		
		$tagsGroupedByPostID = $bs->getTagsGroupedByPostID($posts, $this->getBlogPostTagStorage());
		foreach($posts as $key => $post) {
			if(isset($tagsGroupedByPostID[$post->getID()])) {
				$posts[$key]->setTags($tagsGroupedByPostID[$post->getID()]);
			}
		}
		
		$allTags = array();

		$this->addCSS('light/blog');
		$this->addJS('mustache', 'blog');
		$this->render('blog/index', compact('posts', 'allTags'));
	}
	
	public function view() {
		
		$postID       = $this->get('view');
		$post         = $this->getBlogStorage()->getByID($postID);
		$blogPostTags = $this->getBlogTagStorage()->getAll();
		
		$this->addCSS('light/blog');
		$this->addJS('mustache', 'blog');
		$this->render('blog/view', compact('post', 'blogPostTags'));
	}
	
	public function tagview() {
		$this->index($this->get('tagview'));
	}
	
	public function get_popular_tags() {
		
		$cache = $this->getCache();
		$cacheKey = 'popular_tags';
		
		if($cache->exists($cacheKey)) {
			$popularTags = $cache->get($cacheKey);
		} else {
			$popularTags = $this->getBlogPostTagStorage()->getPopularTags();
			$cache->set($cacheKey, $popularTags, 86400);
		}
		
		$response = array();
		$baseUrl = $this->getBaseUrl();
		
		foreach($popularTags as $tag) {
			$response[] = array(
				'id'    => $tag->getTagID(),
				'title' => $tag->getTitle(),
				'count' => $tag->getTagCount(),
				'link'  => $baseUrl . 'blog/tag/' . $tag->getTagID() . '/' . strtolower($tag->getTitle())
			);
		}
		
		die(json_encode(array('tags' => $response)));
		
	}
	
	protected function getBlogStorage() {
		return new \App\Storage\BlogPost();
	}
	
	protected function getBlogTagStorage() {
		return new \App\Storage\BlogTag();
	}
	
	protected function getBlogPostTagStorage() {
		return new \App\Storage\BlogPostTag();
	}
	
}