<?php

namespace BlogModule\Storage;

use BlogModule\Storage\Base as BaseStorage;
use BlogModule\Entity\BlogPost as BlogPostEntity;
    
class BlogPost extends BaseStorage
{
    
    protected $_meta = array(
        'conn'      => 'main',
        'primary'   => 'id',
        'table'     => 'blog_post',
        'fetchMode' => \PDO::FETCH_ASSOC
    );


    /**
     * Create the newsletter entry
     * 
     * @param string $name
     * @param string $email
     * @return integer
     */
    public function create($title, $content)
    {
        
        if(!isset($data['date_created'])) {
            $data['date_created'] = time();
        }

        $data['title'] = $title;
        $data['content'] = $content;
        
        return parent::insert($data);
            
    }
    
    /**
     * Get all the newsletter entries in the system
     * 
     * @return array
     * @throws \Exception When no rows exist
     */
    public function getAllPublished()
    {
        
        $rows = $this->_conn->createQueryBuilder()
            ->select('bp.*')
            ->from($this->_meta['table'], 'bp')
            ->andWhere('bp.published = 1')
            ->orderBy('bp.date_created', 'desc')
            ->execute()->fetchAll($this->getFetchMode());
        
        if($rows === false) {
            throw new \Exception('No blog entries found');
        }
        
        $entities = array();
        
        foreach($rows as $row) {
            $entities[] = new BlogPostEntity($row);
        }
        
        return $entities;
        
    }
    
    public function getByID($id)
    {
        $row = $this->_conn->createQueryBuilder()
            ->select('bp.*')
            ->from($this->_meta['table'], 'bp')
            ->andWhere('bp.id = :id')
            ->setParameter(':id', $id)
            ->execute()->fetch($this->getFetchMode());
        
        if($row === false) {
            throw new \Exception();
        }
        
        return new BlogPostEntity($row);
        
    }
    
    public function getRelatedPostsByTag($id, $blogPostTagStorage)
    {
        
        $tags = $blogPostTagStorage->getTagsByPostID($id);
        
        $related = array();
        foreach ($tags as $tag) {
            $posts = $blogPostTagStorage->getPostsByTagID($tag->getTagID());
            foreach ($posts as $post) {
                $postID = $post->getID();
                if ($id == $postID) {
                    continue;
                }
                $related[$post->getID()] = $post;
            }
        }
        
        return $related;
    }
    
    public function getTagsGroupedByPostID($posts, $blogPostTagStorage)
    {
        
        $map = array();
        foreach($posts as $post) {
            $map[$post->getID()] = $blogPostTagStorage->getTagsByPostID($post->getID());
        }
        return $map;
    }
    
}