<?php
namespace Application;

use PPI\Module\Module as BaseModule;
use PPI\Autoload;

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
            
            'community.cache' => function($sm) {
                return new \Doctrine\Common\Cache\ApcCache();
            },
            
            'download.counter' => function($sm) {
                return new \Application\Classes\DownloadCounter($sm->get('download.entry.storage'));
            },
            
            'download.entry.storage' => function($sm) {
                return new \Application\Storage\DownloadEntry($sm->get('datasource'));
            },

            'download.item.storage' => function($sm) {
                return new \Application\Storage\DownloadItem($sm->get('datasource'));
            },

            'community.helper' => function($sm) {

                $config   = $sm->get('config');
                $tmhOAuth = new \tmhOAuth(array(
                    'consumer_key'    => $config['oauth']['consumer_key'],
                    'consumer_secret' => $config['oauth']['consumer_secret'],
                    'user_token'      => $config['oauth']['user_token'],
                    'user_secret'     => $config['oauth']['user_secret'],
                ));

                $helper = new \Application\Classes\CommunityHelper();
                $helper->setOAuthDriver($tmhOAuth); 
                $helper->setCache($sm->get('community.cache'));

                return $helper;
            }
        ));
    }

}
