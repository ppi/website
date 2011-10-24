<?php
namespace App\Controller;
class General extends Application {

	function index() { die('index'); }

	function show404() {
		$this->render('framework/404');
	}

	function about() { die('about'); }

	function advertising() { die('advertising'); }

}
