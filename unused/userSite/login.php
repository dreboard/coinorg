<?php  
require_once 'includes/global.inc.php';  
$error = "";  
$username = "";  
$password = "";  
  
//check to see if they've submitted the login form  
if(isset($_POST['submit-login'])) {  
 
    $username = $_POST['username']; 
    $password = $_POST['password'];  
  
    $userTools = new UserTools();  
    if($userTools->login($username, $password)){  
        //successful login, redirect them to a page  
        header("Location: index.php");  
    }else{  
        $error = "Incorrect username or password. Please try again.";  
    }  
}  
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>Much like register.php, login.php will have form validation at the top   and the HTML login form at the bottom. The form is just two fields,   username and password. The form validation calls the UserTools login()   function and redirects them to index.php if login() returns true and   displays an error if login() returns false.</p>

<?php  
if($error != "")  
{  
    echo $error."<br/>";  
}  
?>  
    <form action="login.php" method="post">  
        Username: <input type="text" name="username" value="<?php echo $username; ?>" /><br/>  
        Password: <input type="password" name="password" value="<?php echo $password; ?>" /><br/>  
        <input type="submit" value="Login" name="submit-login" />  
    </form>  
</body>
</html>
