<?php
namespace Framework;

use PPI\Framework\Module\Module as BaseModule;
use PPI\Framework\Autoload;


class Module extends BaseModule {
	
	protected $_moduleName = 'Framework';
	
	function init($e) {
		Autoload::add(__NAMESPACE__, dirname(__DIR__));
	}
	
	/**
	 * Get the routes for this module
	 * 
	 * @return \Symfony\Component\Routing\RouteCollection
	 */
	public function getRoutes() {
		return $this->loadSymfonyRoutes(__DIR__ . '/resources/config/routes.yml');
	}
	
}