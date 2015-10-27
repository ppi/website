<?php
namespace Application\Storage;

use Application\Storage\Base as BaseStorage;
use Application\Entity\NewsletterEntry as NewsletterEntryEntity;

class NewsletterEntry extends BaseStorage
{
    protected $_meta = array(
        'conn' => 'main',
        'table' => 'newsletter_entries',
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
    public function create($name, $email)
    {

        if (!isset($data['created_time'])) {
            $data['created_time'] = time();
        }

        $data['name'] = $name;
        $data['email'] = $email;

        return parent::insert($data);

    }

    /**
     * Check if a newsletter record exists by email address
     *
     * @param $email
     * @return bool
     */
    public function existsByEmail($email)
    {
        $row = $this->_conn->createQueryBuilder()
            ->select('count(id) as total')
            ->from($this->getTableName(), 'n')
            ->andWhere('n.email = :email')
            ->setParameter(':email', $email)
            ->execute()
            ->fetch($this->getFetchMode());

        return $row['total'] > 0;
    }

    /**
     * Get all the newsletter entries in the system
     *
     * @return array
     * @throws \Exception When no rows exist
     */
    public function getAll()
    {

        $rows = $this->fetchAll();

        if ($rows === false) {
            throw new \Exception('No news letter entries found');
        }

        $entities = array();
        foreach ($rows as $row) {
            $entities[] = new NewsletterEntryEntity($row);
        }
        return $entities;

    }

}
