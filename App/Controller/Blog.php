<?php

namespace App\Controller;

class Blog extends Application {

	function index() {

		$this->addCSS('light/blog');
		$this->render('blog/index');
	}
	
}