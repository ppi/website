<?php

namespace App\Controller;

class Blog extends Application {

	function index() {
		
		$posts = $this->getBlogStorage()->getAllPublished();
		$cats  = $this->getBlogCatStorage()->getAll();

		$this->addCSS('light/blog');
		$this->render('blog/index', compact('posts', 'cats'));
	}
	
	public function view() {
		
		$postID = $this->get('view');
		$post   = $this->getBlogStorage()->getByID($postID);
		$cats   = $this->getBlogCatStorage()->getAll();
		
		$this->addCSS('light/blog');
		$this->render('blog/view', compact('post', 'cats'));
	}
	
	protected function getBlogStorage() {
		return new \App\Storage\BlogPost();
	}
	
	protected function getBlogCatStorage() {
		return new \App\Storage\BlogCat();
	}
	
}