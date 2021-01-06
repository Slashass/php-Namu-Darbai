<?php

echo 'Sveiki atėję į mišką<br>';

include __DIR__ . '/Miskas.php';

include __DIR__ . '/Lape.php';
include __DIR__ . '/Vovere.php';

include __DIR__ . '/Egle.php';


echo '<br>';

// echo Miskas::$title;

echo '<br>';

// $animal1 = new Lape;
$animal2 = new Egle;


// $animal1->makeNoise();

$animal2->makeBigNoise();

echo '<br>';

echo $animal2->getTitle();

// var_dump($animal1->getArea());

// var_dump($animal2);

// echo '<pre>';
// var_dump($animal1);
// echo '<br>';
// var_dump($animal2);