<?php
namespace BlogModule\Controller;

use BlogModule\Controller\Shared as SharedController;

class Screencasts extends SharedController
{

    /**
     * Blog index action
     *
     * @return string
     */
    public function indexAction()
    {
        $posts = $this->getService('screencasts')->getAll();
        return $this->render('BlogModule:screencasts:index.html.php', compact('posts'));
    }

    /**
     * @return string
     */
    public function viewAction()
    {
        $postID = $this->getRouteParam('id');
        $post = $this->getService('screencasts')->getByID($postID);
        $post->setContent($this->render('BlogModule:screencasts/items:' . $post->getSlug() . '.html.php', compact('post')));
        return $this->render('BlogModule:blog:view.html.php', compact('post'));
    }

}
