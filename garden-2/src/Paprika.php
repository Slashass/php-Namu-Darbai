<?php

namespace Peper;

use Vegetable\Darzove;

class Paprika extends Darzove
{
    private $count, $id, $imgPath, $name, $kiekAugti, $price;

    public function __construct($id)
    {
        $this->id = $id + 1;
        $this->imgPath = rand(1, 6);
        $this->count = 0;
        $this->name = 'Paprika';
        $this->kiekAugti = rand(1, 3);
        $this->price = 0.09;
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
        $this->kiekAugti = rand(1, 3);
        return $this->kiekAugti;
    }
}
