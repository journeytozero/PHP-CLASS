<?php
namespace store\src\model;


class Customer
{
    private $name;

    public function__construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}




?>