<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Docs extends SharedController
{
    public function indexAction()
    {
        $page    = $this->getRouteParam('page');
        $version = $this->getRouteParam('ver');
        
        if(!$this->isValidDocsVersion($version)) {
            $this->setFlash('error', 'Invalid Docs Version');
            return $this->redirectToRoute('Homepage');
        }
        
        if(!$this->isValidDocsPage($page)) {
            $this->setFlash('error', 'Invalid Docs Page');
            return $this->redirectToRoute('Homepage');
        }
        
        return $this->render('Application:docs:frame.html.php', compact('page', 'version'));
    }
    
    public function viewAction()
    {
        $page    = $this->getRouteParam('page');
        $version = $this->getRouteParam('ver');
        
        if(!$this->isValidDocsVersion($version)) {
            return 'Invalid Docs Version';
        }
        
        if(!$this->isValidDocsPage($page)) {
            return 'Invalid Docs Page';
        }
        
        $version = str_replace(array('2.0', '2.1'), array('2_0', '2_1'), $version);
        $docsFolder = 'docs_' . $version;
        
        return $this->render('Application:docs:index.html.php', compact('page', 'docsFolder'));
    }

    /**
     * Get a list of valid docs pages, from the module config.
     * 
     * @return array
     */
    protected function getDocsPages()
    {
        $config = $this->getConfig();
        return isset($config['docs']['pages']) ? $config['docs']['pages'] : array(); 
    }
    
    protected function isValidDocsVersion($version)
    {
        return in_array($version, array('2.0', '2.1')); 
    }

    /**
     * Check if the specified $page is in the list of valid pages
     * 
     * @param $page
     * @return bool
     */
    protected function isValidDocsPage($page) {
        return in_array($page, $this->getDocsPages());
    }

}
