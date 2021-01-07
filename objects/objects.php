<?php

//Planas
class Nso
{
    public $ufoCount = 2;
    protected $color = 'Black';
    private $tail = false;

    public function addOneMoreUfo()
    {
        $this->ufoCount++;
    }
    public function addMoreUfo($ufoCount)
    {
        $this->ufoCount + $ufoCount;
    }
}


// gamyba 
$ufo1 = new Nso(); //<-- $ufo1 pagamintas objetas
$ufo2 = new Nso; //<--
$ufo3 = new Nso; //<--

// TYrimas

echo '<pre>';
var_dump($ufo1);
// var_dump($ufo2);
// var_dump($ufo3);
// var_dump([]);

// dolerio nera pries ufoCount, savybe nera kintamasis

echo $ufo1->ufoCount;
$ufo1->addOneMoreUfo();
echo '<pre>';
echo $ufo1->ufoCount;
