<?php 
class Login
{

	public function loginUser($email, $password, $loginIP){
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']); 
		//$password = mysql_real_escape_string(sha1($_POST['password']));
		$loginQuery = mysql_query("SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1") or die(mysql_error());
		$num_rows = mysql_num_rows($loginQuery);
		if($num_rows == 0) {
				$_SESSION['message'] = 'Your email or password is incorrect';
						  } else {
						  while($row = mysql_fetch_array($loginQuery))
							  {
							  $email = strip_tags($row['email']);
							  $password = strip_tags($row['password']);
							  $userLevel = strip_tags($row['userLevel']);
								  if(intval($row['active']) === 0){
									  $_SESSION['message'] = 'Your account has not been activated, please check your email.';
									  header("location: login.php");
									  exit;
								  } else {
									    $userID = intval($row['userID']);
										$user = new User();
										$user->getUserById($userID);
										$_SESSION['userID'] = $userID;
										mysql_query("INSERT INTO logintrac (loginIP, userID, logintime) VALUES ('$loginIP','$userID', '".date("Y-m-d H:i:s")."')") or die (mysql_error());
										switch($user->getUserLevel()){
											case 'user':
										header("location: index.php");
										exit;
										break;
										case 'admin':
										header("location: admin/index.php");
										break;
										}
										//header("location: ".$user->getUserLevel()."/index.php");										
								  }
						}
			  }
		 return; //else wrong email
} 

	public function loginMobileUser($email, $password, $loginIP){
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']); 
		//$password = mysql_real_escape_string(sha1($_POST['password']));
		$loginQuery = mysql_query("SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1") or die(mysql_error());
		$num_rows = mysql_num_rows($loginQuery);
		if($num_rows == 0) {
				$_SESSION['message'] = 'Your email or password is incorrect';
						  } else {
						  while($row = mysql_fetch_array($loginQuery))
							  {
							  $email = strip_tags($row['email']);
							  $password = strip_tags($row['password']);
							  $userLevel = strip_tags($row['userLevel']);
								  if(intval($row['active']) === 0){
									  $_SESSION['message'] = 'Your account has not been activated, please check your email.';
									  header("location: login.php");
									  exit;
								  } else {
									    $userID = intval($row['userID']);
										$_SESSION['userID'] = $userID;
										mysql_query("INSERT INTO logintrac (loginIP, userID, logintime) VALUES ('$loginIP','$userID', '".date("Y-m-d H:i:s")."')") or die (mysql_error());
										header("location: index.php");
										exit;
								  }
						}
			  }
		 return; //else wrong email
} 
	
public function loginCheck($userID){
	if (isset($_SESSION['userID'])) {
		$userID = intval($_SESSION['userID']); 
		return $userID;
	} else {
		header("location: http://allsmallcents.com/login.php");
		exit;
	}
   return;
}

public function loginOut($userID){
session_start();
session_destroy(); 
header("location: http://allsmallcents.com/index.php");
exit;
return;
}


public function getUserIDLastLogin($userID){
	$sql = mysql_query("SELECT * FROM logintrac WHERE userID = '$userID' ORDER BY userID DESC LIMIT 1")or die(mysql_error());
	 while($row = mysql_fetch_array($sql))
		  {
		   return strip_tags($row['logintime']);;
		  }
}






}//End Class
?>
