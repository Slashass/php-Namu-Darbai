<?php


$img = file_get_contents('rudolf' . $_GET['i'] . '.jpg');

header('Content-type: image/png');


echo $img;
