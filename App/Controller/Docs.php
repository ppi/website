<?php
namespace App\Controller;
class Docs extends Application {

	function index() {

		$section = $this->get('index');
		if(!$this->templateExists('docs/' . $section)) {
			$section = 'getting-started';
		}

		$template = 'docs/' . $section;

		$this->addCSS('light/docs', 'syntax-github');
		$this->addJS('libs/highlight', 'docs');
		
		$this->render($template, compact('content'));
	}
	
}