<?php 
error_reporting (0);
$senderMessage = "";
if(isset($_GET["senderMessage"])){
$senderMessage = $_GET["senderMessage"];
unset($_POST);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contact Dres Web Studio</title>
<meta name="keywords" content="Web development, flash animation, email campaigns, social media, web redesign, SEO, SEM, media placement, web video, mobile web, online marketing" />
<meta name="description" content="Dres Web Studio founded in 2010 to provide web page design, online video, web page redesign, and mobile web creation. Located in Toledo Ohio" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="sitemap" type="application/rss+xml" title="Sitemap" href="http://dreswebstudio.com/sitemap.xml" />
<meta name="reply-to" content="dre_board&#64;yahoo&#46;com" />
<link rev="made" href="mailto:dre_board&#64;yahoo&#46;com" />
<meta name="author" content="Dre's Web Studio" />
<meta name="language" content="en" />
<meta name="distribution" content="global" />
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="http://dreboard.blogspot.com/feeds/posts/default?alt=rss" />
<link rel="shortcut icon" href="http://www.dreswebstudio.com/images/icon.ico" />
<link type="text/css" rel="stylesheet" href="../../MyOnlineStore - Copy/styles.css" media="screen,projection" /> 
<script type="text/javascript" src="../../MyOnlineStore - Copy/javascript/jquery.js"></script>
<script type="text/javascript" src="../../MyOnlineStore - Copy/scripts.js"></script>
<!--<style type="text/css">

</style>-->
<script type="text/javascript">
<!--
window.onload = function init(){
}
function clearDefault(x){
   if(x.defaultValue==x.value) x.value = "";
}

function checkform(){
	var first = document.getElementById("first").value;
	var last = document.getElementById("last").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	if (first == "" || last == "" || email == "" || phone == "") {
	alert("First & Last Name along with Phone and E-Mail Required");
	return false;
} else{
document.mailForm.submit();
}
	
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
<li class="bottom"><a href="../../login.php">Login to account</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Questions</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/faq.php">Help &amp; FAQ</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<a href="../../MyOnlineStore - Copy/cart.php"><img src="../../images/cart3.jpg" alt="my cart" name="showCart" width="48" height="43" id="showCart" /></a><br class="clear" />
</div><!--END HEADER-->

<div id="container">
<div id="bigType">

<p><span class="smallType2">Dre's Web Studio</span><br />
 Thank You.<br />
<span class="smallType">We respond to all emails.</span></p>
</div>
<div id="paraLeft">
<ul id="doList" class="noDot">
<li class="bottom">Store Links</li>
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/index.php">Home</a></li>
<li><a href="../../MyOnlineStore - Copy/product_list.php">Products</a></li>
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/cart.php">My Cart</a></li>
</ul>
<br />
<div id="newItem">
<h4> Newest Product</h4>
<?php 
include "../../MyOnlineStore - Copy/storescripts/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 1");
while($row = mysql_fetch_array($sql)){ 
$product_name = $row["product_name"];
$id = $row["id"];
echo '<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="product.php?id=' . $id . '"><img class="inventory_images" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" border="0" width="100px" height="auto" /></a></td>
  </tr>
  <tr>
    <th>' . $product_name . '</th>
  </tr>
</table>';
}
?>


</div>
</div>
<div id="paraRight">
<?php echo $senderMessage ?>
</div>
<br class="clear" />
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
<li class="bottom"><a href="../../MyOnlineStore - Copy/contact.php">Customer Service</a></li>
</ul>
</div><!--END footer-->
</body>
</html>