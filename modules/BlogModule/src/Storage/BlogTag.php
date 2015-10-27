<?php
namespace BlogModule\Storage;

use BlogModule\Storage\Base as BaseStorage;
use BlogModule\Entity\BlogTag as BlogTagEntity;

class BlogTag extends BaseStorage
{
    protected $_meta = array(
        'conn'    => 'main',
        'table'   => 'blog_tag',
        'primary' => 'id',
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
            throw new \Exception('No blog tag found');
        }
        
        $entities = array();
        foreach($rows as $row) {
            $entities[] = new BlogTagEntity($row);
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
        
        return new BlogTagEntity($row);
        
    }
    
}