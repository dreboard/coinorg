<?php
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__.'/db'.PATH_SEPARATOR. __DIR__.'/classes'.PATH_SEPARATOR. __DIR__.'/config');
require_once 'settings.php';
require_once 'dates.php';
require_once 'includes.php';
require_once 'uploads.php';

$db = DBConnect::getInstance();
//$page = new Pages(); 
$coin = new Coin();
$User = new User();
$Encrypt = new Encryption();
$mail = new PHPMailer(true);
$Login = new Login();
?>