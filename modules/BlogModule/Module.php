<?php
namespace BlogModule;

use PPI\Framework\Module\AbstractModule;
use BlogModule\Collection\BlogPostsCollection;

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

            'blog.cache' => function ($sm) {
                return new \Doctrine\Common\Cache\ApcCache();
            },
            'blog.posts' => function ($sm) {
                $config = $sm->get('config');
                if (!isset($config['blog']['posts'])) {
                    throw new \Exception('Missing configuration for blog posts');
                }
                return new BlogPostsCollection($config['blog']['posts']);
            },
            'screencasts' => function ($sm) {
                $config = $sm->get('config');
                if (!isset($config['screencasts'])) {
                    throw new \Exception('Missing configuration for screencasts');
                }
                return new BlogPostsCollection($config['screencasts']);
            }

        ));
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array('Zend\Loader\StandardAutoloader' => array('namespaces' => array(__NAMESPACE__ => __DIR__ . '/src/',),),);
    }

}
