<?php
include_once ('global.php');
require_once BASE_PATH . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use Core\Router;

/**
 * Routing
 */
$router = new Router();
$router->run();