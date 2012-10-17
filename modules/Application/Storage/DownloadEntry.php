<?php
namespace Application\Storage;

use Application\Storage\Base as BaseStorage;
use Application\Entity\DownloadEntry as DownloadEntryEntity;

class DownloadEntry extends BaseStorage
{
    protected $_meta = array(
        'conn'    => 'main',
        'table'   => 'download_entry',
        'primary' => 'id',
        'fetchMode' => \PDO::FETCH_ASSOC
    );

    /**
     * Get all the newsletter entries in the system
     *
     * @return array
     * @throws \Exception When no rows exist
     */
    public function getAll() {

        $rows = $this->fetchAll();

        if($rows === false) {
            throw new \Exception('No download entries found');
        }

        $entities = array();
        foreach($rows as $row) {
            $entities[] = new DownloadEntry($row);
        }
        return $entities;

    }

    /**
     * Get the total number of registrations
     *
     * @return integer
     */
    public function countAll()
    {
        $row = $this->createQueryBuilder()
            ->select('count(id) as total')
            ->from($this->getTableName(), 'r')
            ->execute()
            ->fetch($this->getFetchMode());

        return $row['total'];
    }

}
