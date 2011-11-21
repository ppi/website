<?php
namespace App\Controller;
class Docs extends Application {
	
	function index() {
		$template = $this->get('index');
		if(!$this->templateExists('docs/' . $template)) {
			$template = 'getting-started';
		}
		$this->addCSS('light/docs');
		$this->render('docs/' . $template);
	}
	
}