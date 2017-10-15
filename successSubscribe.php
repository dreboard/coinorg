<?php 
include 'inc/configSite.php';
include "inc/classes/users/Subscription.class.php";
$Subscription = new Subscription;

if ($_SERVER['REQUEST_METHOD'] != "POST") die ("No Post Variables");

if (isset($_GET['subscribeID'])) {
	  $subscribeID = urlencode($_GET['subscribeID']);
	$Subscription->getSubscriptionById($subscribeID);  
}
urlencode($subscribeID)

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<script type="text/javascript" src="https://www.mycoinorganizer.com/scripts/js/jquery-1.7.2.min.js"></script>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  


<style type="text/css">
body {margin:0px; padding:0px; width:100%; font-family:Arial, Helvetica, sans-serif;}

.innerContainer {width:1000px; margin:0px auto;}

#headLinksContainer {width:1000px; margin:0px auto;}
#headLinks {margin-top:20px; margin-bottom:15px; background-color:#797979; float:right;}


#header {width:100%; background-image:url(siteImg/headerBG.jpg); background-repeat:repeat-x; color:#fff; height:138px;}
#innerHdr {padding-top:10px;}


/*content*/
#content {margin-top:20px;  width:824px; height:300px; background-image:url(siteImg/contentSliderBG.png); background-position:center; background-repeat:repeat-x; text-align:center; padding-top:23px;}

/**/


#shortDivTbl a {color:#fff;}


a img {border:none;}
a, a:hover {text-decoration:none;}

.darker {font-weight:bold;}
.clear {clear:both;}

#footer {width:100%; background-color:#797979; height:80px;}

</style>

<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body>
<div id="headLinksContainer">
<div id="headLinks" class="shortDiv">
<table width="400" border="0" id="shortDivTbl">
  <tr align="center" height="45">
    <td><a href="#">HOME</a></td>
    <td><a href="#">REGISTER</a></td>
    <td><a href="#">LOGIN</a></td>
    <td><a href="#">BLOG</a></td>
    <td><a href="#">CONTACT</a></td>
  </tr>
</table>
</div>
</div>
<div id="header" class="wideDiv clear">
  <div  id="innerHdr" class="innerContainer">
  <img src="siteImg/logo.png" width="329" height="113" alt="My Coin Organizer"></div>
</div>


<div id="content" class="innerContainer clear">
<img src="siteImg/collectionImg.png" width="801" height="280" align="absmiddle" id="collectionImg"></div>




<div id="footer" class="clear">
<div id="footerContent">

</div>
</div>



</body>
</html>