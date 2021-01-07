<?php

abstract class Tevas implements KitasVadas, Vadas
{
    private const BLA1 = 55;

    public function printBlue()
    {
        $start = 5;
        echo self::BLA1;
        echo '<h1 style="color:blue;">' . $this->blueNumber($start) . '</h1>';
    }

    // abstract public function blueNumber($start);
}
