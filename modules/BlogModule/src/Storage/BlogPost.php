<?php

namespace BlogModule\Storage;

use BlogModule\Entity\BlogPost as BlogPostEntity;
    
class BlogPost
{

    /**
     * @var array BlogPostEntity[]
     */
    protected $posts;


    /**
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        if(!empty($posts)) {
            $this->setPosts($posts);
        }
    }

    /**
     * @param array $posts
     */
    public function setPosts(array $posts)
    {
        foreach($posts as $post) {
            $this->posts[$post['id']] = new BlogPostEntity($post);
        }
    }

    public function getByID($id)
    {
        if(!isset($this->posts[$id])) {
            throw new \InvalidArgumentException('Unable to locate blog post id: ' . $id);
        }

        return $this->posts[$id];
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->posts;
    }
    
}