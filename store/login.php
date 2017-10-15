<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Small Cents | Login to your account</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
  <br />  

<h2 id="loginHdr">Please Login</h2>  
<form id="loginForm" name="loginForm" action="http://www.allsmallcents.com" method="post" class="wideLable">
  
<table width="100%" border="0">
  <tr>
    <td colspan="2" id="formErrors" class="errorTxt"><?php if(isset($_SESSION['message'])){	echo  $_SESSION['message'];	} ?>&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><label for="email"><strong>Email:</strong></label>
      <strong>&nbsp;</strong></td>
    <td><input name="email" type="text" id="email" value="" size="50" /></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><label for="password"><strong>Password:</strong></label>
      <strong>&nbsp;</strong></td>
    <td><input name="password" type="password" id="password" value="" size="50" /></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="40%"><input id="loginFormBtn" name="loginFormBtn" type="submit" value=" Login " />&nbsp;</td>
    <td width="46%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="14%"><a href="forgotPass.php">Forgot Password?</a>&nbsp;</td>
    <td colspan="2" align="right"><a href="activateSend.php" id="forgotTxt">Re-Send Activation Code</a></td>
    </tr>
</table>

</form>
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>