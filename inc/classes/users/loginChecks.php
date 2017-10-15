<?php 

    function safestrip($string)
	{
		   $string = strip_tags($string);
		   $string = mysql_real_escape_string($string);
		   return $string;
	}

	function login($email, $password)
	{
		$loginIP = ip2long($_SERVER['REMOTE_ADDR']);
		$lastlogin = date("Y-m-d H:i:s");
		$logYear = date("Y");
		$logMonth = date("F"); 
		$email = safestrip($email);
		$password = safestrip($password);
		$loginQuery = mysql_query("SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1")or die(mysql_error());
		$sql = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1") or die(mysql_error());
		$login_check = mysql_num_rows($sql);
		if($login_check > 0){ 
			while($row = mysql_fetch_array($sql)){ 
				$accountID = $row["accountID"];   
				$_SESSION['accountID'] = $accountID;
				$email = $row["email"];   
				$_SESSION['email'] = $email;
				$userLevel = preg_replace('#[^A-Za-z]#i', '', $row["userLevel"]);
				mysql_query("INSERT INTO logintrac (loginIP, accountID, logMonth, logYear) VALUES ('$loginIP','$accountID', '$logMonth', '$logYear')") or die (mysql_error());
				mysql_query("UPDATE users SET lastlogin = '$lastlogin' WHERE email='$email' AND password='$password'") or die (mysql_error());
		header('Location: '.$userLevel.'/home.php');   
		 } // close while
		} else {
		header("location: login.php");
		}
  return;
}
	
function loginCheck($accountID)
	{
		if (!isset($_SESSION['accountID'])) { 
         header("location: ../login.php");
	  }
	  if (isset($_SESSION['accountID'])) {
		  // Put stored session variables into local php variable
		  $accountID = $_SESSION['accountID'];
	  }
		return;
	}


?>