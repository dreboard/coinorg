<?php 
error_reporting (E_ALL);
$senderMessage = "";
$to = "dre_board@yahoo.com";
$mailtime = date("Y-m-d H:i:s");
$con = mysql_connect("localhost","dreswebs_admin","!Nd!aN1989");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dreswebs_admin") or die(mysql_error());

if(isset($_POST["contactMe"])){
$first = mysql_real_escape_string($_POST["first"]);
$last = mysql_real_escape_string($_POST["last"]);
$phone = mysql_real_escape_string($_POST["phone"]);
$phone = preg_replace("/[^0-9]/","", $phone); 
$email = mysql_real_escape_string($_POST["email"]);
$designType = mysql_real_escape_string($_POST["designType"]);
$clientStatus = "Estimate";

if($first == ""){
	$senderMessage = "Please enter first Name ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if($last == ""){
	$senderMessage = " Please enter last Name ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if($phone == ""){
	$senderMessage = "Please enter phone number ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if($email == ""){
	$senderMessage = "Please enter email address ";
	header("location: contact.php?senderMessage=$senderMessage");
	die();
}
if(!isset($_POST["website"])){
	$website = "None";
} else {
	$website = mysql_real_escape_string($_POST["website"]);
	if ( substr( strtolower( $website ), 0, 7 ) == 'http://' )
	{
		$website = substr( $website, 7 );
	} 
}

mysql_query("INSERT INTO clients(first, last, phone, email, website, designType, clientStatus) VALUES('$first', '$last', '$phone', '$email', '$website', '$designType', '$clientStatus')") or die(mysql_error());

$subject = "Request for Estimate";
$message = "{$first}, {$last} has requested a quote for {$designType}, and can be contacted at {$phone}" . "\r\n";

//CLEAN AND VALIDATE
function remove_headers($string) { 
 $headers = array(
 "/to\:/i",
 "/from\:/i",
 "/bcc\:/i",
 "/cc\:/i",
 "/Content\-Transfer\-Encoding\:/i",
 "/Content\-Type\:/i",
 "/Mime\-Version\:/i" 
 ); 
 $string = preg_replace($headers, '', $string);
 return strip_tags($string);
 } 
$designType = remove_headers($designType);
$last = remove_headers($last);
$first = remove_headers($first);
$phone = remove_headers($phone);
$headers = "From: dre_board@yahoo.com" . "\r\n";

mail("dre_board@yahoo.com",$subject,$message,$headers );
$senderMessage = "Thank You $first, your quote has been sent and you will receive a receipt resonse in your inbox";

$subject2 = "{$first} Your Quote is received";
$message2 = "You have sent a request for a quote.  All request will be handled on the same business day if received before 5pm. After 5pm request are handled before 11am the next business day";
//Mail receipt to user
mail($email,$subject2,$message2,$headers);

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
<li class="top">Clients</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/login.php">Login to account</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Portfolio</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/gallery.php">Go to Gallery</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Contact</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/contact.php">E-Mail Form</a></li>
</ul>
<br class="clear" />

</div><!--END HEADER-->

<div id="container">
<div id="bigType">

<p><span class="smallType2">Dre's Web Studio</span><br />
 Thank You.<br />
<span class="smallType">We respond to all emails.</span></p>
</div>
<div id="paraLeft">
<h3>&nbsp;<?php echo $senderMessage; ?></h3>
<ul id="doList" class="noDot">
<li class="bottom">What We Do</li>
<li><a href="../../MyOnlineStore - Copy/program.php#contentMgt" title="Content Management">Content Management</a></li>
<li><a href="../../MyOnlineStore - Copy/program.php#ecommerce">E-Commerce</a></li>
<li><a href="../../MyOnlineStore - Copy/design.php" title="Web Design">Web Design</a></li>
<li><a href="../../MyOnlineStore - Copy/program.php#software" title="Web Based Software">Web Based Software Creation</a></li>
<li><a href="../../MyOnlineStore - Copy/marketing.php" title="Search Engine Optimization">Search Engine Optimization</a></li>
<li><a href="../../MyOnlineStore - Copy/mobile.php" title="Mobile Web Creation">Mobile Web Creation</a></li>
<li><a href="../../MyOnlineStore - Copy/design.php#redesign" title="Website Redesign">Site Redesign</a></li>
<li><a href="../../MyOnlineStore - Copy/design.php#animate" title="Web Animation">Web Animation</a></li>
</ul>
</div>

<br class="clear" />
</div><!--END CONTAINER-->
<div id="footer">
<ul class="headList">
<li class="top">Content</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/index.php">Dre's Web Studio</a> <?php echo date("Y"); ?></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Portfolio</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/gallery.php">Go to Gallery</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Contact</li>
<li class="bottom"><a href="../../MyOnlineStore - Copy/contact.php">E-Mail Form</a></li>
</ul>
</div><!--END footer-->
</body>
</html>