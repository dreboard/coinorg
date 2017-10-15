<?php

class DBConnect
{
    public $dbc;
    private static $instance;

    private function __construct()
    {
        $this->dbhc = new PDO('mysql:host=localhost;dbname=coins', "root", "");
    }

    //singleton pattern
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}