<?php
define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/1stlesson/folder/garden-2/');
define('URL', 'http://localhost/1stlesson/folder/garden-2/');
define('DIR', __DIR__);

include __DIR__ . '/bootstrap.php';

Main\App::start()->send();