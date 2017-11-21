<?php

namespace vendor\core;


class Db
{
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        require LIBS . '/rb.php';
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze(true);
        //\R::fancyDebug(true);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}