<?php 
error_reporting (0);
$note = "";
$note2 = "";
include("connect.php");
if(isset($_GET["note2"])){
	$note2 = $_GET["note2"];
}
if(isset($_GET["note"])){
	$note2 = $_GET["note"];
}
//Lost password form
   if(isset($_POST["recoverEmail"])){
   $email = mysql_real_escape_string($_POST['recoverEmail']);
   if($email==''){
   $note2 = "Email is blank";
   header("location: forgotPass.php?note2=$note2");
   }
   if (preg_match( "/[\r\n]/", $email ) ) {
	header("location: forgotPass.php");	
}
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

   $result = mysql_query("SELECT password FROM members WHERE email='$email' LIMIT 1");
   if(mysql_num_rows($result)==0){// Email address not in database
   $note2 =  $email . " is not a registered Email . <a href='forgotPass.php#contWmst'>Contact webmaster</a>";
   header("location: forgotPass.php?note2=$note2");
   }
   if(mysql_num_rows($result)==1){
   $rows=mysql_fetch_array($result);
   $password = $rows['password'];
   $note = "The password has been sent to $email.";
   $to = $email;
   $subject = "Lost Password Request";
   $message = "Welcome to our website!\r\r
   You, or someone using your email address,\r\r
   has requested the password for your account\r\r
   If this is an error, ignore this email and you will be removed from our mailing list.\r\r
   Lost password is $password, http://www.http://shadowware.comli.com/login.php";
   $headers = 'From: noreply@shadowware.comli.com' . "\r\n" .
   'Reply-To: noreply@shadowware.comli.com' . "\r\n";
   mail($to, $subject, $message, $headers);
   header("location: forgotPass.php?note=$note");
   } 
   } else {
	 $note2 = "E-mail is not valid";
  }
   }

//Webmaster form
   if(isset($_POST["webMstEmail"])){
   $email = $_POST['webMstEmail'];
   if($email==''){
   $note2 = "Email is blank";
   header("location: forgotPass.php?note2=$note2");
   }
   $message = $_POST['details'];
   $webMaster = "dre_board@yahoo.com";
   $email = htmlspecialchars($email);
   $message = htmlspecialchars($message);

  if ( preg_match( "/[\r\n]/", $message ) || preg_match( "/[\r\n]/", $email ) ) {
	header("location: yahoo.com");	
}
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

   $to = $webMaster;
   $subject = "Lost Password Request";
   $headers = 'From: noreply@mysite.com' . "\r\n" .
   'Reply-To: noreply@mysite.com' . "\r\n";
   mail($to, $subject, $message, $headers);
   $note = "Webmaster message has been sent ";
  } else {
	 $note2 = "E-mail is not valid";
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Retreive Password</title>
<meta name="keywords" content="Black Hats, black shoes, evening wear, white gowns, black jeans" />
<meta name="description" content="Shadow Ware Online provides hard to find black and white business and formal wear. Located in Toledo Ohio" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="http://www.dreswebstudio.com/images/icon.ico" />
<link type="text/css" rel="stylesheet" href="styles.css" media="screen,projection" /> 
<script type="text/javascript" src="http://www.dreswebstudio.com/javascript/jquery.js"></script>
<style type="text/css">

</style> 
<script type="text/javascript">
$(document).ready(function(){
$("form :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
}).blur(function() {
  $("label").removeClass("labelfocus");
});
});

//LOGIN VALIDATION
function forgotPass(){ 
var senderMessage = document.getElementById("senderMessage");
var recoverEmail = document.getElementById("recoverEmail");

var atpos = recoverEmail.value.indexOf("@");
var dotpos = recoverEmail.value.lastIndexOf(".");
valid = true; 

if ( document.passRecoverForm.recoverEmail.value == ""){ 
document.passRecoverForm.recoverEmail.style.border = "solid #900 2px";
document.passRecoverForm.recoverEmail.focus();
senderMessage.innerHTML = "Please enter your E-Mail <br \/>"; 
valid = false;
}
else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) { 
recoverEmail.style.border = "solid #900 2px";
recoverEmail.focus();
senderMessage.innerHTML = "You have entered an invalid email address. Please try again.<br \/>"; 
valid = false;
}
return valid;
}


function contactMe(){ 
var senderMessage = document.getElementById("senderMessage");
var webMstEmail = document.contactWebmasterForm.webMstEmail;
var atpos = webMstEmail.value.indexOf("@");
var dotpos = webMstEmail.value.lastIndexOf(".");
valid = true; 

if ( document.contactWebmasterForm.webMstEmail.value == ""){ 
document.contactWebmasterForm.webMstEmail.style.border = "solid #900 2px";
document.contactWebmasterForm.webMstEmail.focus();
senderMessage.innerHTML = "Please enter your E-Mail <br \/>"; 
valid = false;
}
else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) { 
webMstEmail.style.border = "solid #900 2px";
webMstEmail.focus();
senderMessage.innerHTML = "You have entered an invalid email address. Please try again.<br \/>"; 
valid = false;
}
else if ( document.contactWebmasterForm.contactWebmasterFormDetails.value == ""){ 
document.contactWebmasterForm.contactWebmasterFormDetails.style.border = "solid #900 2px";
document.contactWebmasterForm.contactWebmasterFormDetails.focus();
senderMessage.innerHTML = "Please enter the details of your problem"; 
valid = false;
}
return valid;
}
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
<li class="bottom"><a href="login.php"><img src="images/accountIcon2.jpg" width="34" height="32" alt="account login" />Login to account</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Find an Item:</li>
<li class="bottom">
<form action="results.php" method="post" name="searchForm" id="searchForm">
<input type="text" name="search" id="search" />
<input type="submit" value="Search" id="searchFormBtn" />
</form></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<a href="cart.php"><img src="images/cart3.jpg" alt="my cart" name="showCart" width="48" height="43" id="showCart" /></a><br class="clear" />
</div><!--END HEADER-->
<div id="container">

<div id="bigType">
<h1>Shadow Ware.</h1>
<span class="smallType">Elegant Black &amp; White Clothing,</span>
</div>
<br />
<div id="paraRight">
<h1>Password Recovery Page</h1>
<span id="senderMessage"><?php echo $note; ?><?php echo $note2; ?></span>
<form id="passRecoverForm" name="passRecoverForm" method="post" action="forgotPass.php" onsubmit="forgotPass();">
  <fieldset><legend>Recovery Form</legend>
  <label for="recoverEmail">Enter E-Mail</label>
  <input name="recoverEmail" type="text" id="recoverEmail" onfocus="clearDefault(this);" value="" /><br />
<span>Password will be mailed to your registered e-mail<br /></span>
 <label for="passRecoverFormBtn">&nbsp;</label> <input name="passRecoverFormBtn" type="submit" value="Retreive My Password" />
  </fieldset>
</form>
<p>If you have a problem recovering your password by email, contact the webmaster by entering your information here.</p>
<a name="#contWmst"></a>
<form id="contactWebmasterForm" name="contactWebmasterForm" method="post" action="forgotPass.php" onsubmit="contactRecover();">
  <fieldset>
    <legend>Contact Webmaster For Support</legend>
  <label for="webMstEmail">Enter E-Mail</label>
  <input name="webMstEmail" type="text" id="webMstEmail" onfocus="clearDefault(this);" /><br />
<label for="details">Details:</label>
<textarea name="details" cols="80" rows="10"></textarea><br />
 <label for="contactWebmasterFormBtn">&nbsp;</label>
  <input name="contactWebmasterFormBtn" type="submit" value="Contact Webmaster" />
  </fieldset>
</form>
<p>&nbsp;</p>
  <hr align="center" width="80%" />

<div id="bottomProducts">
<p>&nbsp;</p>
</div><!--END bottomProducts-->
</div>
<br class="clear" />
</div><!--END CONTAINER-->
<div id="footer">
<ul class="headList">
<li class="top">ALL CONTENT</li>
<li class="bottom"> &copy; Copyright <?php echo date("Y");?> <a href="../index.php">Shadow Ware</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Questions</li>
<li class="bottom"><a href="faq.php">Help &amp; FAQ</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Contact</li>
<li class="bottom"><a href="contact.php"><img src="images/mailSmall.jpg" width="34" height="32" alt="mail" />Customer Service</a></li>
</ul>
</div><!--END footer-->
</body>
</html>