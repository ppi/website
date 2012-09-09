<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Docs extends SharedController
{
    public function indexAction()
    {
        $page = $this->getRouteParam('page');
        if(!$this->isValidDocsPage($page)) {
            $this->setFlash('error', 'Invalid Docs Page');
            return $this->redirectToRoute('Homepage');
        }
        
        return $this->render('Application:docs:' . $page . '.html.php');
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
