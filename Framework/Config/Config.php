<?php

namespace Framework\Config;

class Config {
    protected static $settings = [];

    public static function get($name, $defaultValue = null)
    {
        if (!isset(self::$settings[$name])) {
            return $defaultValue;
        }

        return self::$settings[$name];
    }

    public static function set($name, $value)
    {
        if (isset(self::$settings[$name])) {
            return false;
        }
        self::$settings[$name] = $value;

        return true;
    }
}