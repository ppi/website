<?php
namespace Application\Storage;

use Application\Storage\Base as BaseStorage;
use Application\Entity\SiteSetting as SettingEntity;

class SiteSettings extends BaseStorage
{
   protected $_meta = array(
       'conn'    => 'main',
       'table'   => 'newsletter_entries',
       'primary' => 'id',
       'fetchMode' => \PDO::FETCH_ASSOC
   );

    
    public function getSettingByKey($key) {
        
        $row = $this->_conn->createQueryBuilder()
            ->select('ss.*')
            ->from($this->_meta['table'], 'ss')
            ->andWhere('ss.`key` = :setting_key')
            ->setParameter(':setting_key', $key)
            ->execute()
            ->fetch($this->getFetchMode());
        
        if($row === false) {
            throw new \Exception();
        }
        
        return new SettingEntity($row);
        
    }
    
}
