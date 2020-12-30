<?php


// $info = ['a' => rand(55, 88), 'b' => rand(1, 44)];

$info = file_get_contents('duomenys.json'); // nuskaitom faila

$info = json_decode($info, 1); // paverciam masyvu

print_r($info);

$info['a'] = ++$info['a']; // redaguojam

file_put_contents('duomenys.json', json_encode($info)); // viska vel uzsaugom faile