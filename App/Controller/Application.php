<?php
/**
 * Shared Application Controller Class
 * this file is used to create generic controller functions
 * to share accross all of your application Controllers
 */
namespace App\Controller;
abstract class Application extends \PPI\Controller {

	/**
	 * Override for all rendering of views.
	 *
	 * @param string $template
	 * @param array $params
	 * @param array $options
	 * @return mixed
	 */
	function render($template, array $params = array(), array $options = array()) {

		if(!isset($params['helper']) && !$this->is('ajax')) {
			$params['helper'] = new \App\Helper\View();
		}
		return parent::render($template, $params, $options);
	}


}
