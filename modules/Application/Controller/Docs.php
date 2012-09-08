<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Docs extends SharedController
{
    public function indexAction()
    {
        return $this->render('Application:index:index.html.php');
    }

}
