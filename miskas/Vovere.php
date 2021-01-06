<?php

class Vovere extends Miskas
{

    public $name = 'Vovere';

    private $type = 'Graužiklis';

    protected $voice = 'Skviki-skviki';


    // public static $title = 'Voveres giria';

    public function __construct()
    {
        echo '<h3>VOVERES CONSTRUCT</h3>';
        parent::__construct(); //<---- paleis tevo konstruktoriu
    }


    public function makeNoise()
    {
        echo '<h1 style="color:red";>' . $this->voice . '<h1>';
    }


    public function makeBigNoise()
    {
        $this->makeNoise();
        parent::makeNoise();
    }

    public function getTitle()
    {
        echo $this->getSelfName();
        echo '<br>';
        echo $this->getStaticName();
    }
}
