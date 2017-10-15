<?php 
session_start();
//error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set ("America/Detroit");
$theDate = date("Y-m-d H:i:s");
$captchaCode = "the coin";

$hostname_content = "localhost";
$username_content = "mycoinor_coins";
$password_content = "ab198900";
$con = mysqli_connect("127.0.0.1", "root", "", "coins");

if (!isset($_SESSION['pageMsg'])) {
	$_SESSION['pageMsg'] = '';
}
 //Authorize.net
include "classes/db/DBConnect.php";
include "classes/Encryption.class.php";
include_once("classes/PHPMailer/class.phpmailer.php");
include "functions/pageFunctions.php";
include "classes/coins/Coin.php";  
include "classes/coins/Pages.php"; 
include "classes/users/Login.php"; 
include "classes/users/User.php";

$db = DBConnect::getInstance();
//$page = new Pages(); 
$coin = new Coin();
$User = new User();
$Encrypt = new Encryption();
$mail = new PHPMailer(true);
$Login = new Login();
?>