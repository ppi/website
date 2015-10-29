<?php
namespace BlogModule\Collection;

use BlogModule\Entity\BlogPost as BlogPostEntity;

class BlogPostsCollection
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
        $this->setPosts($posts);
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

    /**
     * @param integer $id
     * @return BlogPostEntity
     */
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