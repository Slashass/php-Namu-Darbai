<?php
define('DOOR_BELL', 'ring');
// kur yra aplikacija
define('INSTALL_FOLDER', '/1stlesson/folder/garden/');

// pasalinam folderi is duomenu
$uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);

// duomenis pasiverciam i masyva is uri eilutes
$uri = explode('/', $uri);

include __DIR__ . '/bootstrap.php';

// _d($uri);

// Router

if ('sodinimas' == $uri[0]) {
    include __DIR__ . '/sodinimas.php';
} elseif ('auginimas' == $uri[0]) {
    include __DIR__ . '/auginimas.php';
} elseif ('skynimas' == $uri[0]) {
    include __DIR__ . '/skynimas.php';
}



$page = preg_replace('/[^\d]/', '', $_SERVER['REQUEST_URI']);
