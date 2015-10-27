<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Links extends SharedController
{
    public function gplusAction()
    {
        return $this->redirect('https://plus.google.com/communities/100606932222119087997');
    }

    public function facebookAction()
    {
        return $this->redirect('https://www.facebook.com/groups/577953472239155');
    }

    public function twitterAction()
    {
        return $this->redirect('http://www.twitter.com/ppi_framework');
    }
}
