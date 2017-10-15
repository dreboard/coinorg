<?php  
session_start();  
require_once 'classes/User.class.php';  
require_once 'classes/UserTools.class.php';  
require_once 'classes/DB.class.php';  
  
//connect to the database  
$db = new DBConnect();  
$db->connect();  
  
//initialize UserTools object  
$userTools = new UserTools();  
  
//refresh session variables if logged in  
if(isset($_SESSION['logged_in'])) {  
	$user = unserialize($_SESSION['user']);  
	$_SESSION['user'] = serialize($userTools->get($user->id));  
}  
?>  
