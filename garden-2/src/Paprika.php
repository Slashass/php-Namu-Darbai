<?php

namespace Peper;

use Vegetable\Darzove;

class Paprika extends Darzove
{
    private $count, $id, $imgPath, $name;

    public function __construct($id)
    {
        $this->id = $id + 1;
        $this->imgPath = rand(1, 6);
        $this->count = 0;
        $this->name = 'Paprika';
    }

    public function __get($propertyName)
    {
        return $this->$propertyName;
    }

    public function __set($propertyName, $value)
    {
        $this->$propertyName = $value;
    }

    public function kiekAugti()
    {
        return rand(1, 3);
    }
}
