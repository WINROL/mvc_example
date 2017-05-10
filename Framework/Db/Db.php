<?php

namespace Framework\Db;

use Framework\Config\Config;

class Db
{
    /**
     * @var null|\PDO
     */
    protected static $db = null;

    private function __construct()
    {
        try {
            $connStr = 'mysql:host='
                . Config::get('db.host')
                . ';dbname='
                . Config::get('db.name');
            $driverOptions = [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '". Config::get('db.charset') ."'",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];

            self::$db = new \PDO(
                $connStr,
                Config::get('db.user'),
                Config::get('db.pass'),
                $driverOptions
            );
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (null === self::$db) {
            new self;
        }

        return self::$db;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}