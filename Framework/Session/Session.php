<?php

namespace Framework\Session;

class Session
{
    public static function get($name, $defaultValue = null)
    {
        if (!isset($_SESSION[$name])) {
            return $defaultValue;
        }

        return $_SESSION[$name];
    }

    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }
}