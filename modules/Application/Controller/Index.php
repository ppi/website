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
    
    public function projectsAction()
    {
        $projects = $this->getProjects();
        return $this->render('Application:index:projects.html.php', compact('projects'));
    }

    public function downloadsAction()
    {
        $downloadItemStorage = $this->getService('download.item.storage');
        $downloadItems = $downloadItemStorage->getAll();
        return $this->render('Application:index:downloads.html.php', compact('downloadItems'));
    }

    public function downloadAction()
    {
        $fileID = $this->getRouteParam('fileID');
        if(empty($fileID)) {
            throw new \Exception('Invalid FileID');
        }

        $withVendor      = $this->post('vendor', 'no') === 'yes';
        $downloadHelper  = $this->getService('download.item.storage');
        $downloadCounter = $this->getService('download.counter');
        $file            = $downloadHelper->getDownloadFileByID($fileID);
        $filename        = $downloadHelper->normaliseFileName($file, $withVendor);

        // Create download entry
        $downloadCounter->create($this->getIP(), $file, $withVendor);

        $path = $downloadHelper->getFullDownloadPath($filename);
        if(!file_exists($path)) {
            throw new \Exception('Unable to locate download file: ' . $filename);
        }

        // Copy file over to public folder
        $newPath = $downloadHelper->copyFileToPublicFolder($path, $filename);

        return $this->redirect('/downloads/' . $newPath);

    }
    
    public function communityAction()
    {
        return $this->render('Application:index:community.html.php');
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
        
        $ns = $this->getService('newsletter.helper');
        
        // Duplication check
        if($ns->existsByEmail($emailAddress)) {
            die(json_encode('E_DUPLICATE'));
        }
        
        $ns->create($name, $emailAddress);
        
        die(json_encode('OK'));
    }

}
