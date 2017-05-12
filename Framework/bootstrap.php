<?php

spl_autoload_register(
    function ($className) {
        $className = str_replace('\\', DS, $className);
        $path = ROOT . DS . $className . '.php';

        if (!file_exists($path)) {
            throw new \Exception('Error path: ' . $path);
        }

        require_once $path;
    }
);

require_once(ROOT . DS . 'Config' . DS . 'Config.php');

function _e($name, $defaultValue = null)
{
    echo \Framework\Lang\Lang::get($name, $defaultValue);
}