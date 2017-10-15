<?php 
error_reporting (E_ALL);
$loginIP = $_SERVER['REMOTE_ADDR'];
$loginIP = ip2long($loginIP);
$timezone = "America/Detroit";
date_default_timezone_set ($timezone);
$lastlogin  = date("Y-m-d H:i:s");
$note = "";
 include "../../MyOnlineStore - Copy/storescripts/connect_to_mysql.php"; 
if (isset($_POST['email'])) {
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']); 
if($email == ""){
	$note = "Please an amount";
	header("location: login.php?note=$note");
	die();
}
if($password == ""){
	$note = "Please A Note";
	header("location: login.php?note=$note");
	die();
}
$sql = mysql_query("SELECT * FROM members WHERE email='$email' AND password='$password' LIMIT 1") or die(mysql_error());
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
    while($row = mysql_fetch_array($sql)){ 
	$level = $row['level'];
	//FIND USERLEVEL
	if($level == "admin"){
        // Get member ID into a session variable
        $accountID = $row["accountID"];   
        session_register('accountID'); 
        $_SESSION['accountID'] = $accountID;
		//Get user level
		$level = $row["level"];   
        session_register('level'); 
        $_SESSION['level'] = $level;
        // Get member username into a session variable
	    $username = $row["username"];   
        session_register('username'); 
        $_SESSION['username'] = $username;
        // Update last_log_date field for this member now
        mysql_query("UPDATE members SET lastlogin  = '$lastlogin ' WHERE $accountID ='$accountID'"); 

		//Login tracker
		mysql_query("INSERT INTO logintrac (loginIP, accountID) VALUES ('$loginIP','$accountID')") or die (mysql_error());
        // Print success message here if all went well then exit the script
		header("location: admin/home.php?accountID=$accountID");   
		
	}else if($level == "client"){
        // Get member ID into a session variable
        $accountID = $row["accountID"];   
        session_register('accountID'); 
        $_SESSION['accountID'] = $accountID;
		//Get user level
		$level = $row["level"];   
        session_register('level'); 
        $_SESSION['level'] = $level;
        // Get member username into a session variable
	    $username = $row["username"];   
        session_register('username'); 
        $_SESSION['username'] = $username;
        // Update last_log_date field for this member now
        mysql_query("UPDATE members SET lastlogin = '$lastlogin' WHERE $accountID ='$accountID'"); 

		//Login tracker
		mysql_query("INSERT INTO logintrac (loginIP, accountID) VALUES ('$loginIP','$accountID')") or die (mysql_error());
        // Print success message here if all went well then exit the script
		header("location: clients/home.php?accountID=$accountID");   
		exit();
	}
    } // close while
} else {
header("location: login.php");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Account Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="sitemap" type="application/rss+xml" title="Sitemap" href="http://dreswebstudio.com/sitemap.xml" />
<meta name="robots" content="noindex,nofollow" /> 
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="http://dreboard.blogspot.com/feeds/posts/default?alt=rss" />
<link rel="shortcut icon" href="http://www.dreswebstudio.com/images/icon.ico" />
<link type="text/css" rel="stylesheet" href="../../MyOnlineStore - Copy/styles.css" media="screen,projection" /> 
<script type="text/javascript"src="http://www.dreswebstudio.com/javascript/jquery.js"></script>
<script type="text/javascript" src="../../MyOnlineStore - Copy/scripts.js"></script>
<style type="text/css">
#discount {margin-right:10px;}
#regMe {width:100%;}
#wideField a {color:#000; font-weight:bold; text-decoration:none;}
#createBox {margin-left:25px;}
</style>
<script type="text/javascript">
<!--
window.onload = function init(){
}
$(document).ready(function(){
$("form :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
}).blur(function() {
  $("label").removeClass("labelfocus");
});
});

//VALIDATE

function chkSearch(){ 
var senderMessage = document.getElementById("senderMessage");
valid = true; 
if ( document.searchForm.searchVal.value == ""){ 
document.searchForm.searchVal.style.border = "solid #900 2px";
document.searchForm.searchVal.focus();
senderMessage.innerHTML = "Please Enter A Search Term"; 
valid = false;
}

return valid;
}

function validate_form(){ 
var senderMessage = document.getElementById("senderMessage");
valid = true; 
if ( document.loginForm.email.value == ""){ 
document.loginForm.email.style.border = "solid #900 2px";
document.loginForm.email.focus();
senderMessage.innerHTML = "Please enter your E-Mail <br \/>"; 
valid = false;
}
if (document.loginForm.password.value == ""){ 
document.loginForm.password.style.border = "solid #900 2px";
document.loginForm.password.focus();
senderMessage.innerHTML += "Please your last name <br \/>"; 
valid = false;
}

//E-Mail validate
var email = document.loginForm.email;
var atpos = email.value.indexOf("@");
var dotpos = email.value.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) { 
email.style.border = "solid #900 2px";
email.focus();
senderMessage.innerHTML = "You have entered an invalid email address. Please try again.<br \/>"; 
valid = false;
}

return valid;
}
//-->
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18051024-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="header">
<ul class="headList">
<li class="top">Shoppers</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/login.php"><img src="../../images/accountIcon2.jpg" alt="my account" width="34" height="32" align="left" />Login to account</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<form action="../../MyOnlineStore - Copy/results.php" method="post" name="searchForm" id="searchForm" onsubmit="return chkSearch()">
<label class="top" for="searchVal">Find an Item</label>
<input type="text" name="searchVal" id="search" />
<input type="submit" value="Search" id="searchFormBtn" />
</form>
<span class="headSpacer">&nbsp;</span>
<a href="../../MyOnlineStore - Copy/cart.php"><img src="../../images/cart3.jpg" alt="my cart" name="showCart" width="48" height="43" id="showCart" /></a><br class="clear" />
</div><!--END HEADER-->

<div id="container">
<div id="bigType">
<h1>
  
  Account Login.</h1>
<span class="smallType">&nbsp;&nbsp;&nbsp;&nbsp;Track Purchases, Update Info</span>
</div>
<div id="paraLeft">
<ul id="doList" class="noDot">
<li class="bottom">Store Links</li>
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/index.php">Home</a></li>
<li><a href="../../MyOnlineStore - Copy/product_list.php">Products</a></li>
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/cart.php">My Cart</a></li>
</ul>

</div>

<div id="paraRight">
<p id="senderMessage">&nbsp;</p>
<form action="" method="post" name="loginForm" id="loginForm" onsubmit="return validate_form()">
<fieldset><legend>Account Info</legend>
<label for="email">E-Mail</label>
<input type="text" name="email" value="" /><br />
<label for="password">Password</label>
<input type="password" name="password" value="" /><br />
<label for="loginFormBtn">&nbsp;</label>
<p class="myLink"><a href="../../MyOnlineStore - Copy/forgotPass.php" rel="nofollow">Forgot Passoword</a></p>
<input name="loginFormBtn" id="loginFormBtn" type="submit" value="Log Me In" />
</fieldset>
</form>
<div id="createBox">
<h3>Create Account</h3>
<a href="../../MyOnlineStore - Copy/register.php"><img src="../../images/regSale.jpg" alt="discount" name="discount" width="120" height="120" align="left" id="discount" /></a>
<p class="wideField">All registered shoppers get 5% off of their first purchase. <a href="../../MyOnlineStore - Copy/register.php">Create My Account</a></p></div>
<p>&nbsp;</p>
</div>
<br class="clear" />
<p>&nbsp;</p>

</div><!--END CONTAINER-->
<div id="footer">
<ul class="headList">
<li class="top">ALL CONTENT</li>
<li class="bottom"> &copy; Copyright <?php echo date("Y");?> <a href="../../index.php">Dre's Web Studio</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Questions</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/faq.php">Help &amp; FAQ</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Contact</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/contact.php"><img src="../../images/mailSmall.jpg" alt="mail" width="34" height="32" align="left" />Customer Service</a></li>
</ul>
</div><!--END footer-->
</body>
</html>