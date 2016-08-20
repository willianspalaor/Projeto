<?php

define('BASE_PATH',    __DIR__ . '/application/');
define('BASE_LIBRARY', __DIR__ . '/application/library/');
define('BASE_PUBLIC',  __DIR__ . '/public/');

include_once BASE_LIBRARY . 'App.php';
include_once BASE_LIBRARY . 'Controller.php';
include_once BASE_LIBRARY . 'Model.php';

$app = new App();
$app->run();

