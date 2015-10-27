<?php

namespace Application\Classes;

class Newsletter
{

    protected $storage;

    public function setStorage($s)
    {
        $this->storage = $s;
    }

    public function existsByEmail($email)
    {
        return $this->storage->existsByEmail($email);
    }

    public function create($name, $email)
    {
        return $this->storage->create($name, $email);
    }

    public function getAll()
    {
        return $this->storage->getAll();
    }

}