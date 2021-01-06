<?php

include __DIR__ . '/Miskas.php';
include __DIR__ . '/Bebras.php';

// Miskas::$treeCount = 5000;


$miskas1 = new Miskas;
$miskas2 = new Miskas;


$miskas1(55, 'jksdhfjksdhgjfgsdfgsdjfsdgfsgjhgds');


// unset($miskas1, $miskas2);


$miskas1->age = 1110;

$age = $miskas1->age;

$miskas1->doEcho(7);

// $miskas2->title = 'Gudi Giria';


// _dc(Bebras::$treeCount);
// $miskas1->makeEcho(2);

Miskas::showTreeCount2();
Bebras::showTreeCount2();

var_dump($miskas1);
