<?php

namespace App\Controller;

class Blog extends Application {

	function index() {
		
		$posts = $this->getBlogStorage()->getAll();

		$this->addCSS('light/blog');
		$this->render('blog/index', compact('posts'));
	}
	
	public function view() {
		
		$postID = $this->get('view');
		$post   = $this->getBlogStorage()->getByID($postID);
		$this->addCSS('light/blog');
		$this->render('blog/view', compact('post'));
	}
	
	protected function getBlogStorage() {
		return new \App\Storage\BlogPost();
	}
	
}