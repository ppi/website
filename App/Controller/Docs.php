<?php
namespace App\Controller;
class Docs extends Application {

	function index() {

		$section = $this->get('index');
		if(!$this->templateExists('docs/' . $section)) {
			$section = 'getting-started';
		}

		$template = 'docs/' . $section;

		$this->addCSS('light/docs', 'highlight/github');
		$this->addJS('docs');
		
		$this->render($template, compact('content'));
	}
	
}