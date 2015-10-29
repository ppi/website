<?php
namespace BlogModule\Collection;

use BlogModule\Entity\BlogPost as BlogPostEntity;

class ScreencastsCollection
{

    /**
     * @var array BlogPostEntity[]
     */
    protected $screencasts;


    /**
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        $this->setScreencasts($posts);
    }

    /**
     * @param array $posts
     */
    public function setScreencasts(array $posts)
    {
        foreach($posts as $post) {
            $this->screencasts[$post['id']] = new BlogPostEntity($post);
        }
    }

    /**
     * @param integer $id
     * @return BlogPostEntity
     */
    public function getByID($id)
    {
        if(!isset($this->screencasts[$id])) {
            throw new \InvalidArgumentException('Unable to locate blog post id: ' . $id);
        }

        return $this->screencasts[$id];
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->screencasts;
    }

}