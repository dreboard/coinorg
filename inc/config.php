<?php
use App\Coins\{Collection, BulkCoin, Coin, Snow};
//C:\xampp719\htdocs\_COINS\coins\inc
define('BASE_URL', dirname(dirname($_SERVER['PHP_SELF'])).'/');
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__.'/db'.PATH_SEPARATOR. __DIR__.'/classes'.PATH_SEPARATOR. __DIR__.'/config');
require_once '../vendor/autoload.php';
require_once 'settings.php';
require_once 'dates.php';
require_once 'includes.php';
require_once 'uploads.php';

$db = DBConnect::getInstance();
$errorMsg = "";
$_SESSION['message'] = '';
$_SESSION['errorMsg'] = '';


if (function_exists('mysql_connect')) {
    $error = "No remote DB connection";
    $hostname_content = "localhost";
    $username_content = "root";
    $password_content = "";
    $con = @mysql_connect($hostname_content, $username_content, $password_content);
    mysql_select_db("coins", $con);
}

///////////////////////////////////////////////////////////////////////////////
//YOUTUBE


/*require_once '../../../Zend/Zend_Gdata/Loader.php'; // the Zend dir must be in your include_path
Zend_Loader::loadClass('Zend_Gdata_YouTube');
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');


$facebook = new Facebook(array(
    'appId' => '470818899631048',
    'secret' => 'f44f3691c4b79fe9d0c3c99b5f4f916e',
));
*/