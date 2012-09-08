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
    
    public function projectsAction()
    {
        $projects = $this->getProjects();
        return $this->render('Application:index:projects.html.php', compact('projects'));
    }
    
    public function communityAction()
    {
        $activity = array();
        $filtered = false;
        return $this->render('Application:index:community.html.php', compact('activity', 'filtered'));
    }

    protected function getUserStorage()
    {
        return new \UserModule\Storage\User($this->getService('DataSource'));
    }
    
    protected function getProjects() {
   		
   		return array(
   			array(
   				'title' => 'Framework',
   				'desc'  => 'PPI is an Open Source Framework that streamlines development; both individual and enterprise. Providing you with the essentials you need, the things, you want and the freedom to work your own way. Leveraging PPI is fast, easy, and tuned for everything from Microblogging to E-Commerce and more.',
   				'source'      => 'https://github.com/ppi/framework',
   				'download'    => 'https://github.com/ppi/framework/downloads',
   				'tracker'     => 'https://github.com/ppi/framework/issues?labels=Bug&sort=created&direction=desc&state=open&page=1',
   				'discussions' => 'https://github.com/ppi/framework/issues?labels=Bug%2Cdiscussion&sort=created&direction=desc&state=open&page=1'
   			),
   			array(
   				'title' => 'Skeleton App',
   				'desc'  => 'The PPI Skeleton Application is an out-of-the-box solution for building web applications. It\'s lightweight, structured and very easy to understand. It conveys the best practises on how to utilize the multitude of features in the PPI Framework. This is a RAD solution for front-end and back-end development. Featuring the Twitter Bootstrap font-end toolkit. Combining CSS/JS loads into one singular HTTP request each.',
   
   				'source'      => 'https://github.com/ppi/skeletonapp',
   				'download'    => 'https://github.com/ppi/skeletonapp/downloads',
   				'tracker'     => 'https://github.com/ppi/skeletonapp/issues?labels=Bug&sort=created&direction=desc&state=open&page=1',
   				'discussions' => 'https://github.com/ppi/skeletonapp/issues?labels=Bug%2Cdiscussion&sort=created&direction=desc&state=open&page=1'
   			),
   			array(
   				'title' => 'Website',
   				'desc'  => 'The PPI Website repository is the official repository powering www.ppi.io. Here we have taken the skeleton application and extended it to build a static website. A great example of light-weight development and seeing how things piece together.',
   				'source'      => 'https://github.com/ppi/website',
   				'download'    => 'https://github.com/ppi/website/downloads',
   				'tracker'     => 'https://github.com/ppi/website/issues?labels=Bug&sort=created&direction=desc&state=open&page=1',
   				'discussions' => 'https://github.com/ppi/website/issues?labels=Bug%2Cdiscussion&sort=created&direction=desc&state=open&page=1'
   			)
   		);
   		
   	}

}
