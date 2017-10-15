<?php   
  
require_once 'includes/global.inc.php';  
  
//check to see if they're logged in  
if(!isset($_SESSION['logged_in'])) { 
    header("Location: login.php"); 
} 
 
//get the user object from the session 
$user = unserialize($_SESSION['user']); 
 
//initialize php variables used in the form 
$email = $user->email; 
$message = ""; 
 
//check to see that the form has been submitted 
if(isset($_POST['submit-settings'])) {  
 
    //retrieve the $_POST variables 
    $email = $_POST['email']; 
 
    $user->email = $email; 
    $user->save(); 
 
    $message = "Settings Saved<br/>"; 
} 
 
//If the form wasn't submitted, or didn't validate  
//then we show the registration form again  
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Settings</title> 
</head>

<body>

</body>
</html><?php echo $message; ?>  
  
    <form action="edit.php" method="post">  
  
    E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>  
    <input type="submit" value="Update" name="submit-settings" />  
  
    </form> 
