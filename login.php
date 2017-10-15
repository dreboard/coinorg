<?php 
include 'inc/configSite.php';

$formErrors = "";
$loginIP = ip2long($_SERVER['REMOTE_ADDR']);
$lastlogin = date("Y-m-d H:i:s");
$recoverDate = date("Y-m-d H:i:s");
$logYear = date("Y");
$logMonth = date("F"); 

if (isset($_POST['loginFormBtn'])) {
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$Login->loginUser($email, $password, $loginIP);
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	

$("#progressBar").hide();
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#loginForm").submit(function() {
      if ($("#email").val() == "") {
		$("#email").addClass("errorInput");
        $("#formErrors").text("Need email address...");
        return false;
      }else if ($("#password").val() == "") {
		$("#password").addClass("errorInput");  
        $("#formErrors").text("Need password...");
        return false;
      }else {
	 $("#progressBar").show();	 
	 $("#loginHdr").text("Logging In..."); 
	  return true;
	  }
});
loginHdr

});
</script>  


<style type="text/css">
#loginDiv{margin:20px auto; width:600px; min-height:300px; background-color:#fff; background : url("siteImg/loginBG.png") no-repeat center center; padding-top:50px;}
#loginForm {width:500px;  margin:0px auto;}
#loginForm label{ float: left; width: 130px; font-weight: bold;}
#loginForm input[type=text], #loginForm input[type=password] {width: 240px; margin-bottom: 5px;}

#logError {display:block;}
.spacer {min-height:445px;}
#loginDiv #loginLogo {text-align:center; display:block; margin:0px auto;}
#loginForm input[type=submit] {
	background : url("siteImg/loginBtn.png") no-repeat center center;
	width : 167px;
	height :40px;
	border : none;
	color : transparent;
	font-size : 0;
	cursor:pointer;
}
form h2 {margin:0px;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>
<div id="content" class="clear">

<div id="loginDiv" class="roundedMoreWhite">
<form id="loginForm" name="loginForm" action="" method="post" class="wideLable">
  
   <table width="100%" border="0">
  <tr>
    <td><h2 id="loginHdr">Please Login</h2> </td>
    <td><img src="siteImg/progress.gif" width="200" height="30" id="progressBar"></td>
  </tr>
</table>

<p id="formErrors"><?php if(isset($_SESSION['message'])){	echo  $_SESSION['message'];	} ?>&nbsp;</p>
<label for="email">Email:</label><input name="email" type="text" id="email" value="" size="31" /><br />
<label for="password">Password:</label><input name="password" type="password" id="password" value="" size="34" />
<br />

<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td width="14%"><input id="loginFormBtn" name="loginFormBtn" type="submit" value="Login" />&nbsp;</td>
    <td width="46%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="40%"><a href="forgotPass.php">Forgot Password?</a>&nbsp;</td>
    <td colspan="2" align="right"><a href="activateSend.php" id="forgotTxt">Re-Send Activation Code</a></td>
    </tr>
</table>

</form>

</div>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>