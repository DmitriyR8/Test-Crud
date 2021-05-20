<?php

use core\App;
use core\Router;

define("DEBUG", 1);
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/core');
define('ROOT', dirname(__DIR__));
define('HELPERS', dirname(__DIR__) . '/core/helpers');
define('APP', dirname(__DIR__) . '/app');
define('CONF', dirname(__DIR__) . '/config');
define('ROUTES', dirname(__DIR__). '/routes');
define('LAYOUT', 'crud');

require __DIR__ . '/../vendor/autoload.php';
require HELPERS . '/functions.php';
require ROUTES . '/web.php';

$query = rtrim($_SERVER['QUERY_STRING'], '/');

new App();

Router::dispatch($query);
