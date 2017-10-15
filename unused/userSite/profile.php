<?php   
  
require_once 'includes/global.inc.php';  
  
//check to see if they're logged in  
if(!isset($_SESSION['logged_in'])) { 
    header("Location: login.php"); 
} 
 
//get the user object from the session 
$user = unserialize($_SESSION['user']); 
$email = $user->email; 
$username = $user->username; 
$city = $user->city; 
 
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Settings</title> 
</head>

<body>
<p><a href="logout.php">Log Out</a> | <a href="index.php">Return to Homepage</a> | <a href="profile.php">My Profile</a></p>
<?php echo $email; ?><br/>
<?php echo $username; ?><br/> 
<?php echo $city; ?><br/> 


</body>
</html>

