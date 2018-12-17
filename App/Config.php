<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{
    private static $_instance;

    public static $DbHost;
    public static $DbName;
    public static $DbUser;
    public static $DbPass;

    protected function __construct()
    {
        $config = (include __DIR__ . '/config.php')['db'];

        self::$DbHost = $config['host'];
        self::$DbName = $config['dbname'];
        self::$DbUser= $config['user'];
        self::$DbPass = $config['password'];
    }

    protected function __clone()
    {
    }

    protected function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new static;
        }

        return self::$_instance;
    }


}