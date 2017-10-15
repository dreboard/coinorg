<?php  
//register.php  
  
require_once 'includes/global.inc.php';  
  
//initialize php variables used in the form  
$username = "";  
$password = "";  
$password_confirm = "";  
$email = ""; 
$address = '';
$city = '';
$state = '';
$zip = '';
$error = "";  

//check to see that the form has been submitted  
if(isset($_POST['submit-form'])) {   
  
    //retrieve the $_POST variables  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    $password_confirm = $_POST['password-confirm'];  
    $email = $_POST['email'];  
    $address = $_POST['address'];  
    $city = $_POST['city'];  
    $state = $_POST['state'];  
    $zip = $_POST['zip'];  
	  
    //initialize variables for form validation  
    $success = true;  
    $userTools = new UserTools();  
  
    //validate that the form was filled out correctly  
    //check to see if user name already exists  
    if($userTools->checkUsernameExists($username))  
    {  
        $error .= "That username is already taken.<br/> \n\r";  
        $success = false;  
    }  
  
    //check to see if passwords match  
    if($password != $password_confirm) {  
        $error .= "Passwords do not match.<br/> \n\r";  
        $success = false;  
    }  
  
    if($success)  
    {  
        //prep the data for saving in a new user object  
        $data['username'] = $username;  
        $data['password'] = md5($password); //encrypt the password for storage  
        $data['email'] = $email;  
		$data['address'] = $address;  
		$data['city'] = $city;  
		$data['state'] = $state;  
		$data['zip'] = $zip;  
  
        //create the new user object  
        $newUser = new User($data);  
  
        //save the new user to the database  
        $newUser->save(true);  
  
        //log them in  
        $userTools->login($username, $password);  
  
        //redirect them to a welcome page  
        header("Location: welcome.php");  
  
    }  
  
}  
  
//If the form wasn't submitted, or didn't validate  
//then we show the registration form again  
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
</head>

<body>
<?php echo ($error != "") ? $error : ""; ?>  
    <form action="register.php" method="post">  
  
    Username: <input type="text" value="<?php echo $username; ?>" name="username" /><br/>  
    Password: <input type="password" value="<?php echo $password; ?>" name="password" /><br/>  
    Password (confirm): <input type="password" value="<?php echo $password_confirm; ?>" name="password-confirm" /><br/>  
    E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/> 
    Address: <input type="text" value="<?php echo $address; ?>" name="address" /><br/>  
    City: <input type="text" value="<?php echo $city; ?>" name="city" /><br/>  
    State: <input type="text" value="<?php echo $state; ?>" name="state" /><br/>   
    Zip: <input type="text" value="<?php echo $zip; ?>" name="zip" /><br/>  
    <input type="submit" value="Register" name="submit-form" />  
  
    </form> 
</body>
</html>
