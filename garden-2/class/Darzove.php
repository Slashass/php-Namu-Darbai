<?php

namespace Vegetable;

use Greenhouse\Siltnamis;

abstract class Darzove implements Siltnamis
{
    // private $id, $count, $imgPath;

    public function augintiDarzove($kiek)
    {
        $this->count = $this->count + $kiek;
    }

    public function nuskintiDarzove($kiek)
    {
        $this->count = $this->count - $kiek;
    }

    public function nuskintiVisus()
    {
        $this->count = 0;
    }

    abstract public function kiekAugti();
}
