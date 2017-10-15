<?php 
include 'inc/configSite.php';

if (isset($_POST['custom'])) {

		$userID = $Encryption->encode($_GET['custom']);

}

//Get back from paypal
//notify_url=https://www.mywebsite.com/PayPal_IPN
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


});
</script>  


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>
<div id="content" class="clear">

  <h1>Subscription Success</h1>
  <p>Thank you for <?php echo $userID ?></p>



</div>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>