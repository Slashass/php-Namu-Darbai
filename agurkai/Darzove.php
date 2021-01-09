<?php

class Darzove
{
    // private $id, $count, $imgPath;

    public function augintiDarzove($kiek)
    {
        $this->count = $this->count + $kiek;
    }

    public function nuskintiVisus()
    {
        $this->count = 0;
    }

    public function gautiKieki()
    {
        return $this->count;
    }

    public function nuskintiDarzove($kiek)
    {
        $this->count = $this->count - $kiek;
    }
}
