<?php
define('DOOR_BELL', 'ring');
// kur yra aplikacija
define('INSTALL_FOLDER', '/1stlesson/folder/garden-2/');
define('URL', 'http://localhost/1stlesson/folder/garden-2/');
define('DIR', __DIR__);

include __DIR__ . '/bootstrap.php';

// _d($uri);

Main\App::router();


