<?php
namespace BlogModule;

use PPI\Framework\Module\Module as BaseModule;
use PPI\Framework\Autoload;

class Module extends BaseModule
{
    protected $_moduleName = 'BlogModule';

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
        return $this->loadSymfonyRoutes(__DIR__ . '/resources/routes/symfony.yml');
    }
    
    /**
     * Get the configuration for this module
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->loadConfig(__DIR__ . '/resources/config/config.yml');
    }
    
    public function getServiceConfig()
    {
        return array('factories' => array(
            
            'blog.cache' => function($sm) {
                return new \Doctrine\Common\Cache\ApcCache();
            },
            'blog.storage' => function($sm) {
                $config = $sm->get('config');
                if(!isset($config['blog']['posts'])) {
                    throw new \Exception('Missing configuraiton for blog posts');
                }
                return new \BlogModule\Storage\BlogPost(
                    $config['blog']['posts']
                );
            }
            
        ));
    }

}
