<?php
namespace CoinTest;

use PHPUnit\Framework\TestCase;
use Exception;

class CoinTests extends TestCase
{
    protected $coin;
    /**
     * PHPUnit setup
     * Initiate classes to be tested
     */
    protected function setUp()
    {
        //echo __DIR__; die;
        require_once __DIR__."/../../inc/db/DBConnect.php";
        require_once __DIR__.'/../../inc/classes/coins/Coin.php';
        $this->coin = new \Coin();

    }

    /**
     * Get a coin by ID
     */
    public function testGetACoinByID()
    {
        try {
            $coin = $this->coin->getCoinByID(33);
            $this->assertEquals(true, $coin);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
