<?php
namespace BlogModule;

use PPI\Framework\Module\AbstractModule;

class Module extends AbstractModule
{

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

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }

}
