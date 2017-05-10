<?php

namespace Framework\Lang;

use Framework\Lang\Exception\LangNotFoundException;

class Lang
{
    protected static $data;

    public static function load($lang)
    {
        $path = LANG_DIR . $lang . '.php';
        if (!file_exists($path)) {
            throw new LangNotFoundException;
        }

        self::$data = require_once $path;
    }

    public static function get($name, $defaultValue = null)
    {
        return isset(self::$data[$name])
            ? self::$data[$name]
            : $defaultValue
        ;
    }
} 