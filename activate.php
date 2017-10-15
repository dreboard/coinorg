<?php include 'inc/config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("secureScripts.php"); ?>
<title>Congratulations</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<?php include ("inc/analyticsTracking.php"); ?>
</head>
<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>
<div id="content" class="clear">
<?php 
 if(isset($_GET["activateCode"])){
	 $userID = $Encryption->decode($_GET["activateCode"]);
     if(!$User->activateUser($userID)){
		 echo 'Account could not be activated';
	   } else {
		   echo '<h2>Congratulations </h2>
	  <p>Your account has been activated. <a href="login.php">Login to your account</a></p>';
	   }
 }
?>
</div>
<p>&nbsp;</p>
</div>
<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>