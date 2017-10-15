<?php 
include 'inc/configSite.php';

 $userID = 9;
?>
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

<h2>Congratulations </h2>
<p>Your account has been registered.  Please check your email and follow the activation link to access your new collectors account.</p>
<a href="activate.php?userID=<?php echo $Encrypt ->encode($userID); ?>">Activate Account</a>

</div>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>