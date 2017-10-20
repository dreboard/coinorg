<?php
/**
 * CoinOrg
 * DBConnect Class
 * @package App/Main
 * @since v0.1.0
 */
class DBConnect
{
    public $dbc;
    private static $instance;

    /**
     * DBConnect constructor.
     * @todo set fetch style to FETCH_ASSOC and update usage
     */
    private function __construct()
    {
        $this->dbhc = new PDO('mysql:host=localhost;dbname=coins', "root", "");
    }


    /**
     * singleton pattern db instance
     * @return mixed
     */
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