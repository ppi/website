<?php
namespace Application\Storage;

use Application\Entity\DownloadItem as DownloadItemEntity;
use Application\Storage\Base as BaseStorage;

class DownloadItem extends BaseStorage
{
    protected $_meta = array(
        'conn'    => 'main',
        'table'   => 'download_item',
        'primary' => 'id',
        'fetchMode' => \PDO::FETCH_ASSOC
    );

    /**
     * Get all the downloads
     *
     * @return array
     * @throws \Exception When no rows exist
     */
    public function getAll() {

        $rows = $this->fetchAll();

        if($rows === false) {
            throw new \Exception('No download items found');
        }

        $entities = array();
        foreach($rows as $row) {
            $entities[] = new DownloadItemEntity($row);
        }
        return $entities;

    }


}
