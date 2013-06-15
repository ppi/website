<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Index extends SharedController
{
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }

    public function downloadsAction()
    {
        $downloadItemStorage = $this->getService('download.item.storage');
        $downloadItems = $downloadItemStorage->getAll();
        return $this->render('Application:index:downloads.html.php', compact('downloadItems'));
    }

    public function downloadAction()
    {
        $file = $this->getRouteParam('file');
        $downloadCounter = $this->getService('download.counter');
        $downloadCounter->setIP($this->getIP());
        $downloadCounter->incrementDownloadCount();
        return 'OK';
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
    
    public function projectsAction()
    {
        $projects = $this->getProjects();
        return $this->render('Application:index:projects.html.php', compact('projects'));
    }
    
    public function communityAction()
    {
        $filtered        = false;
        $activityHelper  = $this->getService('activity.helper');
        $github          = $activityHelper->getGithubActivity();
        $tweets          = $activityHelper->getTwitterActivity();
        $activity        = $tweets + $github;
        
        krsort($activity);
        
        return $this->render('Application:index:community.html.php', compact('activity', 'filtered'));
    }

    public function activityAction()
    {
        $filtered        = false;
        $activityHelper  = $this->getService('activity.helper');
        $github          = $activityHelper->getGithubActivity();
        $tweets          = $communityHelper->getTwitterActivity();
        $activity        = $tweets + $github;
        
        krsort($activity);
        
        return $this->render('Application:index:community.html.php', compact('activity', 'filtered'));
    }
    
    public function newsletterSubmitAction()
    {
        $emailAddress = $this->post('email');
        $name = $this->post('name');

        if(empty($emailAddress) || empty($name) || !filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
           die(json_encode('E_INVALID')); 
        }
        
        $ns = $this->getNewsletterStorage();
        
        // Duplication check
        if($ns->existsByEmail($emailAddress)) {
            die(json_encode('E_DUPLICATE'));
        }
        
        $ns->create($name, $emailAddress);
        
        die(json_encode('OK'));
    }

    protected function getUserStorage()
    {
        return new \UserModule\Storage\User($this->getService('DataSource'));
    }
    
    /**
     * Get the news letter storage
     * 
     * @return \Application\Storage\NewsletterEntry
     */
    public function getNewsletterStorage()
    {
        return new \Application\Storage\NewsletterEntry($this->getService('DataSource'));
    }

    protected function getTwitterActivityUsernames()
    {
        $config = $this->getConfig();
        return isset($config['community']['twitterUsernames']) ? $config['community']['twitterUsernames'] : array();
    }

}
