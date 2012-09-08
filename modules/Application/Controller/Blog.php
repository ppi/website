<?php
namespace Application\Controller;

use Application\Controller\Shared as SharedController;

class Blog extends SharedController
{

    /**
     * Blog index action. Note the $tagID param is not supplied by the framework, but we manually call it
     * from tagviewAction() below.
     * 
     * @param null|integer $tagID
     * @return string
     */
    public function indexAction($tagID = null)
    {
        
        $bs = $this->getBlogStorage();
        
        if($tagID === null) {
            $posts = $bs->getAllPublished();
        } else {
            $posts = $this->getBlogPostTagStorage()->getPostsByTagID($tagID);
        }
        
        $tagsGroupedByPostID = $bs->getTagsGroupedByPostID($posts, $this->getBlogPostTagStorage());
        foreach($posts as $key => $post) {
            if(isset($tagsGroupedByPostID[$post->getID()])) {
                $posts[$key]->setTags($tagsGroupedByPostID[$post->getID()]);
            }
        }
        
        $allTags = array();
        
        return $this->render('Application:blog:index.html.php', compact('posts', 'allTags'));
        
    }
    
    public function viewAction() {
   		
   		$postID       = $this->getRouteParam('postID');
   		$post         = $this->getBlogStorage()->getByID($postID);
   		$blogPostTags = $this->getBlogTagStorage()->getAll();
   		
   		$this->render('blog/view', compact('post', 'blogPostTags'));
   	}
    
    public function getPopularTagsAction() {
   		
//   		$cache = $this->getCache();
//   		$cacheKey = 'popular_tags';
//   		
//   		if($cache->exists($cacheKey)) {
//   			$popularTags = $cache->get($cacheKey);
//   		} else {
   			
//   			$cache->set($cacheKey, $popularTags, 86400);
//   		}
        
        $response = array();
        $popularTags = $this->getBlogPostTagStorage()->getPopularTags();
        
        foreach($popularTags as $tag) {
            $response[] = array(
                'id'    => $tag->getTagID(),
                'title' => $tag->getTitle(),
                'count' => $tag->getTagCount(),
                'link'  => $this->generateUrl('BlogTagView', array(
                       'tagID' => $tag->getTagID(),
                       'title' => strtolower($tag->getTitle())
                 ))
           );
   		}
   		
   		return json_encode(array('tags' => $response));
   		
   	}
    
    public function tagviewAction() {
        return $this->indexAction($this->getRouteParam('tagID'));   
    }
    
    protected function getBlogStorage() {
   		return new \Application\Storage\BlogPost($this->getService('datasource'));
   	}
   	
   	protected function getBlogTagStorage() {
   		return new \Application\Storage\BlogTag($this->getService('datasource'));
   	}
   	
   	protected function getBlogPostTagStorage() {
   		return new \Application\Storage\BlogPostTag($this->getService('datasource'));
   	}

}
