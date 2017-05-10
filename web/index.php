<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('LANG_DIR', ROOT . DS . 'Lang' . DS);
define('VIEW_DIR', ROOT . DS . 'View' . DS);

try {
    require_once(ROOT . DS . 'Framework' . DS . 'bootstrap.php');

    \Framework\Application\Application::run(
        new Framework\Router\Router(),
        \Framework\Db\Db::getInstance()
    );
} catch (\PDOException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}
