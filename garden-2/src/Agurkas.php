<?php

namespace Cucumber;

use Vegetable\Darzove;

class Agurkas extends Darzove
{

    private $id, $count, $imgPath, $name, $kiekAugti, $price;

    // public $propertyName;
    public function __construct($id)
    {
        $this->id = $id + 1;
        $this->imgPath = rand(1, 6);
        $this->count = 0;
        $this->name = 'Agurkas';
        $this->kiekAugti = rand(2, 9);
        $this->price = 0.99;
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
        $this->kiekAugti = rand(2, 9);
        return $this->kiekAugti;
    }
}
