<?php

namespace BlogModule\Storage;

use BlogModule\Storage\Base as BaseStorage;
use BlogModule\Entity\BlogPostTag as BlogPostTagEntity;
use BlogModule\Entity\BlogPost as BlogPostEntity;
    
class BlogPostTag extends BaseStorage {
    
    protected $_meta = array(
        'conn'      => 'main',
        'primary'   => 'id',
        'table'     => 'blog_post_tag',
        'fetchMode' => \PDO::FETCH_ASSOC
    );


    /**
     * Create the newsletter entry
     * 
     * @param string $name
     * @param string $email
     * @return integer
     */
    public function create($title) {
        
        $data['title'] = $title;
        return parent::insert($data);
            
    }
    
    /**
     * Get all the newsletter entries in the system
     * 
     * @return array
     * @throws \Exception When no rows exist
     */
    public function getAll() {
        
        $rows = $this->fetchAll();
        
        if($rows === false) {
            throw new \Exception('No blog cats found');
        }
        
        $entities = array();
        foreach($rows as $row) {
            $entities[] = new BlogPostTagEntity($row);
        }
        return $entities;
        
    }
    
    public function getByID($id) {
        
        $row = $this->_conn->createQueryBuilder()
            ->select('bc.*')
            ->from($this->getTableName(), 'bc')
            ->andWhere('bc.id = :id')
            ->setParameter(':id', $id)
            ->execute()->fetch($this->getFetchMode());
        
        if($row === false) {
            throw new \Exception();
        }
        
        return new BlogPostTagEntity($row);
        
    }
    
    public function getPostsByTagID($id) {
        
        $rows = $this->_conn->createQueryBuilder()
            ->select('bp.*')
            ->from($this->getTableName(), 'bpt')
            ->innerJoin('bpt', 'blog_post', 'bp', 'bp.id = bpt.post_id')
            ->andWhere('bpt.tag_id = :tag_id')->setParameter(':tag_id', $id)
            ->execute()->fetchAll($this->getFetchMode());
        
        if($rows === false) {
            throw new \Exception('No posts found for this tag id');
        }
        
        $entities = array();
        foreach($rows as $row) {
            $entities[] = new BlogPostEntity($row);
        }
        
        return $entities;
        
    }
    
    public function getTagsByPostID($postID) {
        
        $rows = $this->_conn->createQueryBuilder()
            ->select('bpt.*, bt.title tag_title')
            ->from($this->getTableName(), 'bpt')
            ->innerJoin('bpt', 'blog_tag', 'bt', 'bpt.tag_id = bt.id')
            ->andWhere('bpt.post_id = :id')->setParameter(':id', $postID)
            ->execute()->fetchAll($this->getFetchMode());
        
        if($rows === false) {
            throw new \Exception();
        }
        
        $entities = array();
        foreach($rows as $row) {
            $entities[] = new BlogPostTagEntity($row);
        }
        return $entities;
        
    }
    
    public function getPopularTags() {
        
        $rows = $this->_conn->createQueryBuilder()
            ->select('bpt.tag_id, bpt.post_id, bt.title as tag_title, count(bpt.tag_id) as tag_count')
            ->from($this->getTableName(), 'bpt')
            ->innerJoin('bpt', 'blog_tag', 'bt', 'bpt.tag_id = bt.id')
            ->groupBy('bpt.tag_id')
            ->execute()->fetchAll($this->getFetchMode());
        
        if($rows === false) {
            throw new \Exception();
        }
        
        $entities = array();
        foreach($rows as $row) {
            $entities[] = new BlogPostTagEntity($row);
        }
        
        // Sort our popular tags by their tag count.
        // we weren't able to do this above because of restrictions on the aliasing of tag_count
        usort($entities, function($a, $b) {
            if($a->getTagCount() == $b->getTagCount()) {
                return 0;
            }
            return $a->getTagCount() > $b->getTagCount() ? -1 : 1;
        });
        
        return $entities;
        
    }
    
}