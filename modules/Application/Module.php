<?php
namespace Application;

use PPI\Framework\Module\Module as BaseModule;
use PPI\Framework\Autoload;

class Module extends BaseModule
{
    protected $_moduleName = 'Application';

    public function init($e)
    {
        Autoload::add(__NAMESPACE__, dirname(__DIR__));
    }

    /**
     * Get the routes for this module
     *
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRoutes()
    {
        return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
    }

    /**
     * Get the configuration for this module
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->loadYamlConfig(__DIR__ . '/resources/config/config.yml');
    }
    
    public function getServiceConfig()
    {
        return array('factories' => array(
            'download.item.storage' => function($sm) {
                $config = $sm->get('config');
                if(!isset($config['downloads']['items'])) {
                    throw new \Exception('Unable to locate any download items');
                }
                return new \Application\Storage\DownloadsCollection($config['downloads']['items']);
            }

        ));
    }

}
