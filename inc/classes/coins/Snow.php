<?php
/**
 * @package Coin\Designations
 * @since v0.1.0
 * @author Andre Board
 *
 * By Year Snow Arrays
 *
 * Generate an array containing a list of designated Snow numbers
 * for each small cent minted year from 1859 to 1909.  Arrays
 * will be used to populate selects to assign to collected coins
 */

namespace App\Coins;

use \DBConnect;
use \PDO;

/**
 * Class Snow
 */
class Snow
{

    /**
     * @var array
     */
    public $_1859_P = array();
    /**
     * @var array
     */
    public $_1860_P = array();
    /**
     * @var array
     */
    public $_1861_P = array();
    /**
     * @var array
     */
    public $_1862_P = array();
    /**
     * @var array
     */
    public $_1863_P = array();
    /**
     * @var array
     */
    public $_1864_P = array();
    /**
     * @var array
     */
    public $_1865_P = array();
    /**
     * @var array
     */
    public $_1866_P = array();
    /**
     * @var array
     */
    public $_1867_P = array();
    /**
     * @var array
     */
    public $_1868_P = array();
    /**
     * @var array
     */
    public $_1869_P = array();
    /**
     * @var array
     */
    public $_1870_P = array();
    /**
     * @var array
     */
    public $_1871_P = array();
    /**
     * @var array
     */
    public $_1872_P = array();
    /**
     * @var array
     */
    public $_1873_P = array();
    /**
     * @var array
     */
    public $_1874_P = array();
    /**
     * @var array
     */
    public $_1875_P = array();
    /**
     * @var array
     */
    public $_1876_P = array();
    /**
     * @var array
     */
    public $_1877_P = array();
    /**
     * @var array
     */
    public $_1878_P = array();
    /**
     * @var array
     */
    public $_1879_P = array();
    /**
     * @var array
     */
    public $_1880_P = array();
    /**
     * @var array
     */
    public $_1881_P = array();
    /**
     * @var array
     */
    public $_1882_P = array();
    /**
     * @var array
     */
    public $_1883_P = array();
    /**
     * @var array
     */
    public $_1884_P = array();
    /**
     * @var array
     */
    public $_1885_P = array();
    /**
     * @var array
     */
    public $_1886_P = array();
    /**
     * @var array
     */
    public $_1887_P = array();
    /**
     * @var array
     */
    public $_1888_P = array();
    /**
     * @var array
     */
    public $_1889_P = array();
    /**
     * @var array
     */
    public $_1890_P = array();
    /**
     * @var array
     */
    public $_1891_P = array();
    /**
     * @var array
     */
    public $_1892_P = array();
    /**
     * @var array
     */
    public $_1893_P = array();
    /**
     * @var array
     */
    public $_1894_P = array();
    /**
     * @var array
     */
    public $_1895_P = array();
    /**
     * @var array
     */
    public $_1896_P = array();
    /**
     * @var array
     */
    public $_1897_P = array();
    /**
     * @var array
     */
    public $_1898_P = array();
    /**
     * @var array
     */
    public $_1899_P = array();
    /**
     * @var array
     */
    public $_1900_P = array();
    /**
     * @var array
     */
    public $_1901_P = array();
    /**
     * @var array
     */
    public $_1902_P = array();
    /**
     * @var array
     */
    public $_1903_P = array();
    /**
     * @var array
     */
    public $_1904_P = array();
    /**
     * @var array
     */
    public $_1905_P = array();
    /**
     * @var array
     */
    public $_1906_P = array();
    /**
     * @var array
     */
    public $_1907_P = array();
    /**
     * @var array
     */
    public $_1908_P = array();
    /**
     * @var array
     */
    public $_1908_S = array();
    /**
     * @var array
     */
    public $_1909_P = array();
    /**
     * @var array
     */
    public $_1909_S = array();
    /**
     * @var array
     */
    public $_1859_P_Proof = array();
    /**
     * @var array
     */
    public $_1860_P_Proof = array();
    /**
     * @var array
     */
    public $_1861_P_Proof = array();
    /**
     * @var array
     */
    public $_1862_P_Proof = array();
    /**
     * @var array
     */
    public $_1863_P_Proof = array();
    /**
     * @var array
     */
    public $_1864_P_Proof = array();
    /**
     * @var array
     */
    public $_1865_P_Proof = array();
    /**
     * @var array
     */
    public $_1866_P_Proof = array();
    /**
     * @var array
     */
    public $_1867_P_Proof = array();
    /**
     * @var array
     */
    public $_1868_P_Proof = array();
    /**
     * @var array
     */
    public $_1869_P_Proof = array();
    /**
     * @var array
     */
    public $_1870_P_Proof = array();
    /**
     * @var array
     */
    public $_1871_P_Proof = array();
    /**
     * @var array
     */
    public $_1872_P_Proof = array();
    /**
     * @var array
     */
    public $_1873_P_Proof = array();
    /**
     * @var array
     */
    public $_1874_P_Proof = array();
    /**
     * @var array
     */
    public $_1875_P_Proof = array();
    /**
     * @var array
     */
    public $_1876_P_Proof = array();
    /**
     * @var array
     */
    public $_1877_P_Proof = array();
    /**
     * @var array
     */
    public $_1878_P_Proof = array();
    /**
     * @var array
     */
    public $_1879_P_Proof = array();
    /**
     * @var array
     */
    public $_1880_P_Proof = array();
    /**
     * @var array
     */
    public $_1881_P_Proof = array();
    /**
     * @var array
     */
    public $_1882_P_Proof = array();
    /**
     * @var array
     */
    public $_1883_P_Proof = array();
    /**
     * @var array
     */
    public $_1884_P_Proof = array();
    /**
     * @var array
     */
    public $_1885_P_Proof = array();
    /**
     * @var array
     */
    public $_1886_P_Proof = array();
    /**
     * @var array
     */
    public $_1887_P_Proof = array();
    /**
     * @var array
     */
    public $_1888_P_Proof = array();
    /**
     * @var array
     */
    public $_1889_P_Proof = array();
    /**
     * @var array
     */
    public $_1890_P_Proof = array();
    /**
     * @var array
     */
    public $_1891_P_Proof = array();
    /**
     * @var array
     */
    public $_1892_P_Proof = array();
    /**
     * @var array
     */
    public $_1893_P_Proof = array();
    /**
     * @var array
     */
    public $_1894_P_Proof = array();
    /**
     * @var array
     */
    public $_1895_P_Proof = array();
    /**
     * @var array
     */
    public $_1896_P_Proof = array();
    /**
     * @var array
     */
    public $_1897_P_Proof = array();
    /**
     * @var array
     */
    public $_1898_P_Proof = array();
    /**
     * @var array
     */
    public $_1899_P_Proof = array();
    /**
     * @var array
     */
    public $_1900_P_Proof = array();
    /**
     * @var array
     */
    public $_1901_P_Proof = array();
    /**
     * @var array
     */
    public $_1902_P_Proof = array();
    /**
     * @var array
     */
    public $_1903_P_Proof = array();
    /**
     * @var array
     */
    public $_1904_P_Proof = array();
    /**
     * @var array
     */
    public $_1905_P_Proof = array();
    /**
     * @var array
     */
    public $_1906_P_Proof = array();
    /**
     * @var array
     */
    public $_1907_P_Proof = array();
    /**
     * @var array
     */
    public $_1908_P_Proof = array();
    /**
     * @var array
     */
    public $_1909_P_Proof = [];


    /**
     *
     */
    public function test()
    {
        $this->__construct();
    }

    /**
     * Snow constructor.
     *
     * Get the array of Snow values for each year.
     */
    public function __construct()
    {
        $this->_1859_P_Proof = array('PR 1', 'PR 2');
        $this->_1859_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6');

        $this->_1860_P_Proof = array('PR 1', 'PR 2');
        $this->_1860_P = array('Snow 1', 'Snow 2');

        $this->_1861_P_Proof = array('PR 1', 'PR 2');
        $this->_1861_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6');

        $this->_1862_P_Proof = array('PR 1', 'PR 2');
        $this->_1862_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4');

        $this->_1863_P_Proof = array('PR 1', 'PR 2');
        $this->_1863_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13');

        $this->_1864_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1864_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20');

        $this->_1865_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1865_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15');

        $this->_1866_P_Proof = array('PR 1');
        $this->_1866_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16');

        $this->_1867_P_Proof = array();
        $this->_1867_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8');

        $this->_1868_P_Proof = array('PR 1');
        $this->_1868_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11');

        $this->_1869_P_Proof = array('PR 1', 'PR 2');
        $this->_1869_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16');

        $this->_1870_P_Proof = array('PR 1', 'PR 2');
        $this->_1870_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29', 'Snow 30', 'Snow 31', 'Snow 32', 'Snow 33', 'Snow 34', 'Snow 35', 'Snow 36', 'Snow 37', 'Snow 38', 'Snow 39', 'Snow 40', 'Snow 41');

        $this->_1871_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1871_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5');

        $this->_1872_P_Proof = array('PR 1');
        $this->_1872_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14');

        $this->_1873_P_Proof = array('PR 1');
        $this->_1873_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7');

        $this->_1874_P_Proof = array('PR 1');
        $this->_1874_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4');

        $this->_1875_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1875_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15');

        $this->_1876_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1876_P = array('Snow 1');

        $this->_1877_P_Proof = ['PR 1', 'PR 2', 'PR 3'];
        $this->_1877_P = array('Snow 1', 'Snow 2');

        $this->_1878_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4', 'PR 5');
        $this->_1878_P = array('Snow 1', 'Snow 2', 'Snow 3');

        $this->_1879_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1879_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4');

        $this->_1880_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1880_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4');

        $this->_1881_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1881_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7');

        $this->_1882_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1882_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7');

        $this->_1883_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4', 'PR 5');
        $this->_1883_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10');

        $this->_1884_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1884_P = array('Snow 1', 'Snow 2', 'Snow 3');

        $this->_1885_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1885_P = array('Snow 1', 'Snow 2');

        $this->_1886_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4', 'PR 5');
        $this->_1886_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8');

        $this->_1887_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4', 'PR 5', 'PR 6');
        $this->_1887_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10');

        $this->_1888_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1888_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29', 'Snow 30', 'Snow 31', 'Snow 32', 'Snow 33');

        $this->_1889_P_Proof = array('PR 1', 'PR 2');
        $this->_1889_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29', 'Snow 30', 'Snow 31', 'Snow 32', 'Snow 33');

        $this->_1890_P_Proof = array('PR 1', 'PR 2');
        $this->_1890_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15');

        $this->_1891_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1891_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23');

        $this->_1892_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1892_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14');

        $this->_1893_P_Proof = array('PR 1', 'PR 2');
        $this->_1893_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18');

        $this->_1894_P_Proof = array('PR 1', 'PR 2');
        $this->_1894_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6');

        $this->_1895_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4', 'PR 5');
        $this->_1895_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29', 'Snow 30', 'Snow 31');

        $this->_1896_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1896_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17');

        $this->_1897_P_Proof = array('PR 1', 'PR 2');
        $this->_1897_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18');

        $this->_1898_P_Proof = array('PR 1', 'PR 2', 'PR 3');
        $this->_1898_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29', 'Snow 30', 'Snow 31', 'Snow 32', 'Snow 33', 'Snow 34', 'Snow 35', 'Snow 36');

        $this->_1899_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4', 'PR 5');
        $this->_1899_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22');

        $this->_1900_P_Proof = array('PR 1', 'PR 2');
        $this->_1900_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23');

        $this->_1901_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4', 'PR 5');
        $this->_1901_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24');

        $this->_1902_P_Proof = array('PR 1', 'PR 2', 'PR 3', 'PR 4');
        $this->_1902_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13');

        $this->_1903_P_Proof = array('PR 1');
        $this->_1903_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25');

        $this->_1904_P_Proof = array('PR 1');
        $this->_1904_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16');

        $this->_1905_P_Proof = array('PR 1');
        $this->_1905_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29');

        $this->_1906_P_Proof = array('PR 1');
        $this->_1906_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29', 'Snow 30', 'Snow 31', 'Snow 32', 'Snow 33', 'Snow 34', 'Snow 35', 'Snow 36', 'Snow 37', 'Snow 38', 'Snow 44');

        $this->_1907_P_Proof = array('PR 1');
        $this->_1907_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23', 'Snow 24', 'Snow 25', 'Snow 26', 'Snow 27', 'Snow 28', 'Snow 29', 'Snow 30', 'Snow 31', 'Snow 32', 'Snow 33', 'Snow 34', 'Snow 35', 'Snow 36', 'Snow 37', 'Snow 38', 'Snow 39', 'Snow 40', 'Snow 41', 'Snow 42', 'Snow 43', 'Snow 44', 'Snow 45', 'Snow 46', 'Snow 47', 'Snow 48', 'Snow 49', 'Snow 50');

        $this->_1908_P_Proof = array('PR 1', 'PR 2');
        $this->_1908_P = array('Snow 1', 'Snow 2', 'Snow 3', 'Snow 4', 'Snow 5', 'Snow 6', 'Snow 7', 'Snow 8', 'Snow 9', 'Snow 10', 'Snow 11', 'Snow 12', 'Snow 13', 'Snow 14', 'Snow 15', 'Snow 16', 'Snow 17', 'Snow 18', 'Snow 19', 'Snow 20', 'Snow 21', 'Snow 22', 'Snow 23');
        $this->_1908_S = array('Snow 1', 'Snow 2');

        $this->_1909_P_Proof = array('PR 1');
        $this->_1909_P = array('Snow 1', 'Snow 2');
        $this->_1909_S = array('Snow 1', 'Snow 2');
    }


    /**
     * @return array
     */
    public function get_1859_P()
    {
        return $this->_1859_P;
    }

    /**
     * @return array
     */
    public function get_1859_P_Proof()
    {
        return $this->_1859_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1860_P()
    {
        return $this->_1860_P;
    }

    /**
     * @return array
     */
    public function get_1860_P_Proof()
    {
        return $this->_1860_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1861_P()
    {
        return $this->_1861_P;
    }

    /**
     * @return array
     */
    public function get_1861_P_Proof()
    {
        return $this->_1861_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1862_P()
    {
        return $this->_1862_P;
    }

    /**
     * @return array
     */
    public function get_1862_P_Proof()
    {
        return $this->_1862_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1863_P()
    {
        return $this->_1863_P;
    }

    /**
     * @return array
     */
    public function get_1863_P_Proof()
    {
        return $this->_1863_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1864_P()
    {
        return $this->_1864_P;
    }

    /**
     * @return array
     */
    public function get_1864_P_Proof()
    {
        return $this->_1864_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1865_P()
    {
        return $this->_1865_P;
    }

    /**
     * @return array
     */
    public function get_1865_P_Proof()
    {
        return $this->_1865_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1866_P()
    {
        return $this->_1866_P;
    }

    /**
     * @return array
     */
    public function get_1866_P_Proof()
    {
        return $this->_1866_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1867_P()
    {
        return $this->_1867_P;
    }

    /**
     * @return array
     */
    public function get_1867_P_Proof()
    {
        return $this->_1867_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1868_P()
    {
        return $this->_1868_P;
    }

    /**
     * @return array
     */
    public function get_1868_P_Proof()
    {
        return $this->_1868_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1869_P()
    {
        return $this->_1869_P;
    }

    /**
     * @return array
     */
    public function get_1869_P_Proof()
    {
        return $this->_1869_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1870_P()
    {
        return $this->_1870_P;
    }

    /**
     * @return array
     */
    public function get_1870_P_Proof()
    {
        return $this->_1870_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1871_P()
    {
        return $this->_1871_P;
    }

    /**
     * @return array
     */
    public function get_1871_P_Proof()
    {
        return $this->_1871_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1872_P()
    {
        return $this->_1872_P;
    }

    /**
     * @return array
     */
    public function get_1872_P_Proof()
    {
        return $this->_1872_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1873_P()
    {
        return $this->_1873_P;
    }

    /**
     * @return array
     */
    public function get_1873_P_Proof()
    {
        return $this->_1873_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1874_P()
    {
        return $this->_1874_P;
    }

    /**
     * @return array
     */
    public function get_1874_P_Proof()
    {
        return $this->_1874_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1875_P()
    {
        return $this->_1875_P;
    }

    /**
     * @return array
     */
    public function get_1875_P_Proof()
    {
        return $this->_1875_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1876_P()
    {
        return $this->_1876_P;
    }

    /**
     * @return array
     */
    public function get_1876_P_Proof()
    {
        return $this->_1876_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1877_P()
    {
        return $this->_1877_P;
    }

    /**
     * @return array
     */
    public function get_1877_P_Proof()
    {
        return $this->_1877_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1878_P()
    {
        return $this->_1878_P;
    }

    /**
     * @return array
     */
    public function get_1878_P_Proof()
    {
        return $this->_1878_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1879_P()
    {
        return $this->_1879_P;
    }

    /**
     * @return array
     */
    public function get_1879_P_Proof()
    {
        return $this->_1879_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1880_P()
    {
        return $this->_1880_P;
    }

    /**
     * @return array
     */
    public function get_1880_P_Proof()
    {
        return $this->_1880_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1881_P()
    {
        return $this->_1881_P;
    }

    /**
     * @return array
     */
    public function get_1881_P_Proof()
    {
        return $this->_1881_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1882_P()
    {
        return $this->_1882_P;
    }

    /**
     * @return array
     */
    public function get_1882_P_Proof()
    {
        return $this->_1882_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1883_P()
    {
        return $this->_1883_P;
    }

    /**
     * @return array
     */
    public function get_1883_P_Proof()
    {
        return $this->_1883_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1884_P()
    {
        return $this->_1884_P;
    }

    /**
     * @return array
     */
    public function get_1884_P_Proof()
    {
        return $this->_1884_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1885_P()
    {
        return $this->_1885_P;
    }

    /**
     * @return array
     */
    public function get_1885_P_Proof()
    {
        return $this->_1885_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1886_P()
    {
        return $this->_1886_P;
    }

    /**
     * @return array
     */
    public function get_1886_P_Proof()
    {
        return $this->_1886_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1887_P()
    {
        return $this->_1887_P;
    }

    /**
     * @return array
     */
    public function get_1887_P_Proof()
    {
        return $this->_1887_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1888_P()
    {
        return $this->_1888_P;
    }

    /**
     * @return array
     */
    public function get_1888_P_Proof()
    {
        return $this->_1888_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1889_P()
    {
        return $this->_1889_P;
    }

    /**
     * @return array
     */
    public function get_1889_P_Proof()
    {
        return $this->_1889_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1890_P()
    {
        return $this->_1890_P;
    }

    /**
     * @return array
     */
    public function get_1890_P_Proof()
    {
        return $this->_1890_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1891_P()
    {
        return $this->_1891_P;
    }

    /**
     * @return array
     */
    public function get_1891_P_Proof()
    {
        return $this->_1891_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1892_P()
    {
        return $this->_1892_P;
    }

    /**
     * @return array
     */
    public function get_1892_P_Proof()
    {
        return $this->_1892_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1893_P()
    {
        return $this->_1893_P;
    }

    /**
     * @return array
     */
    public function get_1893_P_Proof()
    {
        return $this->_1893_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1894_P()
    {
        return $this->_1894_P;
    }

    /**
     * @return array
     */
    public function get_1894_P_Proof()
    {
        return $this->_1894_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1895_P()
    {
        return $this->_1895_P;
    }

    /**
     * @return array
     */
    public function get_1895_P_Proof()
    {
        return $this->_1895_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1896_P()
    {
        return $this->_1896_P;
    }

    /**
     * @return array
     */
    public function get_1896_P_Proof()
    {
        return $this->_1896_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1897_P()
    {
        return $this->_1897_P;
    }

    /**
     * @return array
     */
    public function get_1897_P_Proof()
    {
        return $this->_1897_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1898_P()
    {
        return $this->_1898_P;
    }

    /**
     * @return array
     */
    public function get_1898_P_Proof()
    {
        return $this->_1898_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1899_P()
    {
        return $this->_1899_P;
    }

    /**
     * @return array
     */
    public function get_1899_P_Proof()
    {
        return $this->_1899_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1900_P()
    {
        return $this->_1900_P;
    }

    /**
     * @return array
     */
    public function get_1900_P_Proof()
    {
        return $this->_1900_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1901_P()
    {
        return $this->_1901_P;
    }

    /**
     * @return array
     */
    public function get_1901_P_Proof()
    {
        return $this->_1901_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1902_P()
    {
        return $this->_1902_P;
    }

    /**
     * @return array
     */
    public function get_1902_P_Proof()
    {
        return $this->_1902_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1903_P()
    {
        return $this->_1903_P;
    }

    /**
     * @return array
     */
    public function get_1903_P_Proof()
    {
        return $this->_1903_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1904_P()
    {
        return $this->_1904_P;
    }

    /**
     * @return array
     */
    public function get_1904_P_Proof()
    {
        return $this->_1904_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1905_P()
    {
        return $this->_1905_P;
    }

    /**
     * @return array
     */
    public function get_1905_P_Proof()
    {
        return $this->_1905_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1906_P()
    {
        return $this->_1906_P;
    }

    /**
     * @return array
     */
    public function get_1906_P_Proof()
    {
        return $this->_1906_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1907_P()
    {
        return $this->_1907_P;
    }

    /**
     * @return array
     */
    public function get_1907_P_Proof()
    {
        return $this->_1907_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1908_P()
    {
        return $this->_1908_P;
    }

    /**
     * @return array
     */
    public function get_1908_S()
    {
        return $this->_1908_S;
    }

    /**
     * @return array
     */
    public function get_1908_P_Proof()
    {
        return $this->_1908_P_Proof;
    }

    /**
     * @return array
     */
    public function get_1909_P()
    {
        return $this->_1909_P;
    }

    /**
     * @return array
     */
    public function get_1909_S()
    {
        return $this->_1909_S;
    }

    /**
     * @return array
     */
    public function get_1909_P_Proof()
    {
        return $this->_1909_P_Proof;
    }

    /**
     * @param $userID
     * @param $snow
     * @param $coinYear
     * @return bool
     */
    public function getSnowCertifiedCountByYear($userID, $snow, $coinYear)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE proService != 'None' AND userID = '$userID' AND snow = 'snow' AND coinYear = '$coinYear'") or die(mysql_error());
        return mysql_num_rows($sql);
    }

    /**
     * @param $userID
     * @param $snow
     * @return bool
     */
    public function getSnowCertifiedCountByVAM($userID, $snow)
    {
        $sql = mysql_query("SELECT * FROM collection WHERE proService != 'None' AND userID = '$userID' AND snow = 'snow' AND collectsetID = '0'") or die(mysql_error());
        return mysql_num_rows($sql);
    }


    /**
     * @param $coinType
     * @param $coinYear
     * @param $snow
     * @param $userID
     * @param $mintMark
     * @param $strike
     * @return string
     */
    public function getSnowByYearAndByMint($coinType, $coinYear, $snow, $userID, $mintMark, $strike)
    {
        $countAll = mysql_query("SELECT * FROM collection WHERE coinType = '" . str_replace('_', ' ', $coinType) . "' AND coinYear = '$coinYear' AND strike = '$strike' AND userID = '$userID' AND snow = '$snow' AND mintMark = '$mintMark' ") or die(mysql_error());
        $img_check = mysql_num_rows($countAll);
        if ($img_check == 0) {
            return "blank.jpg";
        } else {
            while ($row = mysql_fetch_array($countAll)) {
                switch ($strike) {
                    case 'Business':
                        return str_replace(' ', '_', $coinType) . '.jpg';
                        break;
                    case 'Proof':
                        return str_replace(' ', '_', $coinType) . '_Proof.jpg';
                        break;
                }
            }
        }
    }


}
