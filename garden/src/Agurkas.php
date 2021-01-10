<?php

namespace Cucumber;

use Vegetable\Darzove;

class Agurkas extends Darzove
{

    private $id, $count, $imgPath;

    // public $propertyName;
    public function __construct($id)
    {
        $this->id = $id + 1;
        $this->imgPath = rand(1, 6);
        $this->count = 0;

        // $agurkoObj->id = $_SESSION['agurku ID'] + 1;
        // $agurkoObj->count = 0;
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
        return rand(2, 9);
    }

    // Visai nebutina
    // public function __serialize() // <---- ivyksta kai objektas yra serializuojamas
    // {

    // }

}
