<?php
namespace CoinTest;
require_once '../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Exception;

class CoinTests extends TestCase
{
    const TEST_YEAR = 2005;
    const TEST_COIN_ID = 33;
    protected $coin;

    /**
     * PHPUnit setup
     * Initiate classes to be tested
     */
    protected function setUp()
    {
        $this->coin = new \Coin();
    }

    /**
     * Get a coin by ID
     * @covers Coin::getCount()
     */
    public function testGetCoinByID()
    {
        try {
            $coin = $this->coin->getCoinByID(self::TEST_COIN_ID);
            $this->assertEquals(true, $coin);
            $this->assertEquals(self::TEST_YEAR, $this->coin->getCoinYear());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
