<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Index extends SharedController
{
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }
    
    public function aboutAction()
    {
        return $this->render('Application:index:about.html.php');
    }
    
    public function contributorsAction()
    {
        return $this->render('Application:index:contributors.html.php');
    }
    
    public function chatAction()
    {
        return $this->render('Application:index:livechat.html.php');
    }
    
    public function downloadsAction()
    {
        $downloadItemStorage = $this->getService('download.item.storage');
        $downloadItems = $downloadItemStorage->getAll();
        return $this->render('Application:index:downloads.html.php', compact('downloadItems'));
    }

    public function communityAction()
    {
        return $this->render('Application:index:community.html.php');
    }

    public function newsletterSubmitAction()
    {
        $emailAddress = $this->post('email');
        $name = $this->post('name');

        if(empty($emailAddress) || empty($name) || !filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
           die(json_encode('E_INVALID')); 
        }
        
        $ns = $this->getService('newsletter.helper');
        
        // Duplication check
        if($ns->existsByEmail($emailAddress)) {
            die(json_encode('E_DUPLICATE'));
        }
        
        $ns->create($name, $emailAddress);
        
        die(json_encode('OK'));
    }

}
