<?php
namespace Application\Storage;

use Application\Entity\DownloadItem as DownloadItemEntity;
use Application\Storage\Base as BaseStorage;

class DownloadsCollection
{

    /**
     * @var array
     */
    protected $items;

    /**
     * @param array $items
     */
    public function __construct(array $items)
    {
        if(!empty($items)) {
            $this->setItems($items);
        }
    }

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        foreach($items as $item) {
            $this->items[] = new DownloadItemEntity($item);
        }
    }


    /**
     * Get all the downloads
     *
     * @return array
     */
    public function getAll()
    {
        return $this->items;
    }

}
