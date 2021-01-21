<?php

require_once('Routes.php');

function my_autoloader($class_name)
{
    include 'classes/' . $class_name . '.class.php';
}

spl_autoload_register('my_autoloader');
