<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));

require_once(ROOT . DS . 'Framework' . DS . 'bootstrap.php');

$router = new Framework\Router\Router();
$router->run($_SERVER['REQUEST_URI']);

$db = \Framework\Db\Db::getInstance();

