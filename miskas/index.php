<?php
include __DIR__ . '/vendor/autoload.php';

echo 'Sveiki atėję į mišką<br>';

// include __DIR__ . 'inc/Miskas.php';

// include __DIR__ . 'inc/Lape.php';
// include __DIR__ . 'inc/Vovere.php';

// include __DIR__ . 'inc/Egle.php';


echo '<br>';

// echo Miskas::$title;

echo Mano\Vovere::$vovere;
echo Petras\Zzz\Vovere::$vovere;

echo '<br>';

// $animal1 = new Lape;
// $animal2 = new Egle;
$animal2 = new Eglynas\Egle;


// $animal1->makeNoise();
Valio\Miskas::kazkoksMetodas('pirmas', 'ir paskutinis');

$animal2('UUUUU');


$animal2->makeBigNoise();

echo '<br>';

echo $animal2->name;

// var_dump($animal1->getArea());

// var_dump($animal2);

// echo '<pre>';
// var_dump($animal1);
// echo '<br>';
// var_dump($animal2);