<?php
namespace BlogModule\Controller;

use BlogModule\Controller\Shared as SharedController;

class Blog extends SharedController
{

    /**
     * Blog index action
     *
     * @return string
     */
    public function indexAction()
    {
        $posts = $this->getService('blog.posts')->getAll();
        return $this->render('BlogModule:blog:index.html.php', compact('posts'));
    }

    public function viewAction()
    {
        $postID = $this->getRouteParam('postID');
        $post = $this->getService('blog.posts')->getByID($postID);
//        $blogPostTags = $this->getBlogTagStorage()->getAll();
        $post->setContent($this->render('BlogModule:post:' . $post->getSlug() . '.html.php', compact('post')));
        return $this->render('BlogModule:blog:view.html.php', compact('post'));
    }

    public function getRecentCommentsAction()
    {
        $recentCommentsHelper = new \BlogModule\Classes\RecentComments($this->getService('blog.cache'));
        $recentComments = $recentCommentsHelper->getComments();
        $recentComments = array_slice($recentComments, 0, $this->getRecentCommentsAmount());

        return json_encode(array('comments' => $recentComments));
    }

    public function getPopularTagsAction()
    {

        $cache = $this->getService('blog.cache');
        $cacheKey = 'popular_tags';
        if ($cache->contains($cacheKey)) {
            $popularTags = $cache->fetch($cacheKey);
        } else {
            $popularTags = $this->getBlogPostTagStorage()->getPopularTags();
            $cache->save($cacheKey, $popularTags, 86400);
        }

        $response = array();

        foreach ($popularTags as $tag) {
            $response[] = array(
                'id' => $tag->getTagID(),
                'title' => $tag->getTitle(),
                'count' => $tag->getTagCount(),
                'link' => $this->generateUrl('BlogTagView', array(
                    'tagID' => $tag->getTagID(),
                    'title' => strtolower($tag->getTitle())
                ))
            );
        }

        return json_encode(array('tags' => $response));

    }

    /**
     * Get the related posts for the specified routeParam('postID')
     *
     * @return string
     */
    public function getRelatedPostsAction()
    {
        $bs = $this->getBlogStorage();
        $post = $bs->getByID($this->getRouteParam('postID'));

        $relatedPostsHelper = new \BlogModule\Classes\RelatedPosts(
            $this->getService('blog.cache'), $bs, $this->getBlogPostTagStorage()
        );

        $relatedPosts = $relatedPostsHelper->getRelatedPosts($post);

        $response = array('posts' => array());
        foreach ($relatedPosts as $relatedPost) {

            $relatedTitle = $relatedPost->getTitle();

            $postLink = $this->generateUrl('BlogView', array(
                'postID' => $relatedPost->getID(),
                'title' => $this->normalizePostTitleLink($relatedTitle),
            ));

            $response['posts'][] = array('link' => $postLink, 'title' => $relatedTitle);
        }

        return json_encode($response);
    }

    public function tagviewAction()
    {
        return $this->indexAction($this->getRouteParam('tagID'));
    }


    public function getRSSAction()
    {
        $rssHelper = new \BlogModule\Classes\GenerateRSS(
            $this->getCache(),
            $this->getBlogStorage(),
            $this->getService('router')
        );

        $rssData = $rssHelper->getRSSData();
        $rssBaseLink = $this->generateUrl('BlogGetRSS');
        $content = $this->render('BlogModule:blog:rss.xml.php', compact('rssData', 'rssBaseLink'));

        $this->getService('response')->headers->set('Content-Type', 'text/xml');
        return $content;
    }

    protected function normalizePostTitleLink($title)
    {
        return strtolower(str_replace(' ', '-', $title));
    }

}
