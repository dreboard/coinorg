<?php 
error_reporting (E_ALL);
$errorMessage = "";

$to = "dre_board@yahoo.com";
$myTime = date("Y-m-d H:i:s");
$userIP = $_SERVER['REMOTE_ADDR'];
$userIP = ip2long($userIP);
$timezone = "America/Detroit";
date_default_timezone_set ($timezone);
$feedDate = date('m'); //number (07)
$feedMonth = date("F");// whole (July)
$feedYear = date("Y");

if(isset($_GET["senderMessage"])){
$senderMessage = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["senderMessage"]);
unset ($_POST["email"]);
unset ($_POST["product_name"]);
unset ($_POST["refer"]);
unset ($_POST["improve"]);
unset ($_POST["shopFreq"]);
unset ($_POST["comments"]);
}

$con = mysql_connect("localhost","dreswebs_admin","!Nd!aN1989");
//$con = mysql_connect("localhost","dreswebs_admin","ab198900");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dreswebs_admin") or die(mysql_error());

if(isset($_POST["feedbackVal"])){
$email = mysql_real_escape_string($_POST["email"]);
$product_name = mysql_real_escape_string($_POST["product_name"]);
$refer = mysql_real_escape_string($_POST["refer"]);
$improve = mysql_real_escape_string($_POST["improve"]);
$shopFreq = mysql_real_escape_string($_POST["shopFreq"]);
$comments = strip_tags($_POST["comments"]);

if($email == ""){
	$errorMessage = "Please enter E-Mail<br /> ";
	header("location: contact.php?errorMessage=$errorMessage");
	die();
}
if($product_name == ""){
	$errorMessage = " Please Select a product<br /> ";
	header("location: contact.php?errorMessage=$errorMessage");
	die();
}
if($refer == ""){
	$errorMessage = "Please A Refer Choice<br /> ";
	header("location: contact.php?errorMessage=$errorMessage");
	die();
}
if($shopFreq == ""){
	$errorMessage = "Please A Shopping Value";
	header("location: contact.php?errorMessage=$errorMessage");
	die();
}

mysql_query("INSERT INTO feedback(email, product_name, refer, improve, shopFreq, comments, feedDate, feedMonth, feedYear, userIP) VALUES('$email', '$product_name', '$refer', '$improve', '$shopFreq', '$comments', '$feedDate', '$feedMonth', '$feedYear', '$userIP')") or die(mysql_error());

$subject = "A Survey has been posted";
$message = "A store product survey has been conducted by " . $email . "\r\n";

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
$email = remove_headers($email);
$comments = remove_headers($comments);
$headers = "From: dre_board@yahoo.com" . "\r\n";
$message .= $comments;

mail("dre_board@yahoo.com",$subject,$message,$headers );
$sentMessage = "Thank You, your survey has been sent and you will receive a receipt resonse in your inbox";

$subject2 = "Your survey was received";
$message2 = "Thank you for participating in our product survey.  We review all surveys to ensure our products meet our customers expectations";
//Mail receipt to user
mail($email,$subject2,$message2,$headers);
$senderMessage = "Your survey has been sent";
unset ($_POST["email"]);
unset ($_POST["product_name"]);
unset ($_POST["refer"]);
unset ($_POST["improve"]);
unset ($_POST["shopFreq"]);
unset ($_POST["comments"]);
header("location: feedback.php?senderMessage=$senderMessage");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customer Service</title>
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
<style type="text/css">
#errorMessage {color:#900; font-size:1.2em; width:400px;}
#senderMessage {color:#900; font-size:1.2em; width:400px;}
#feedbackForm {width:550px;}
label{ float: left; width: 130px; font-weight: bold;}
#feedbackForm .rateRadio {width: 20px; margin-bottom: 5px; text-align:center;}
#feedbackForm textarea {width:370px;}
select {width: 200px; margin-bottom: 5px;}
.labelfocus {color:#666;}

</style>
<script type="text/javascript">
window.onload = function init(){
}
$(document).ready(function(){
$("form :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
}).blur(function() {
  $("label").removeClass("labelfocus");
});
});

function validate_form(){ 
document.feedbackForm.mailFormBtn.value= "Sending....";
valid = true; 
if ( document.feedbackForm.email.value == ""){ 
document.feedbackForm.email.style.border = "solid #900 2px";
document.getElementById("errorMessage").innerHTML = "Please enter your E-Maill Address";
return false;
}
if ( document.feedbackForm.improve.value == ""){ 
document.feedbackForm.improve.style.border = "solid #900 2px";
document.getElementById("errorMessage").innerHTML = "Please Make An Area Selection";
return false;

}
if ( document.feedbackForm.shopFreq.value == ""){ 
document.feedbackForm.shopFreq.style.border = "solid #900 2px";
document.getElementById("errorMessage").innerHTML = "Enter A Shopping Selection";
return false;
}

if ( document.feedbackForm.comments.value == ""){ 
document.feedbackForm.comments.style.border = "solid #900 2px";
document.getElementById("errorMessage").innerHTML = "Enter A comment";
return false;
}

//var comments = document.getElementById("comments");
//comments.innerHTML = "";
//if (comments.value.length < 1) {
//	comments.style.border = "solid #900 2px";
//  document.getElementById("errorMessage").innerHTML = "Enter A comment";
//  comments.focus();
//return false;
//} 

return true;
document.feedbackForm.submit();
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
<h1>Feedback Survey.</h1>
<span class="smallType">How did we do,</span>
</div>
<p>To ensure the success of our store and to keep customers happy with their pruchases, we would like to know how your shopping experience was.  Please fill in as much information as possible in order to provide us with your complete shopping experience.  We do not provide your information to third parties.</p>
<div id="paraLeft">
<p id="senderMessage"><?php if(isset($senderMessage)){echo $senderMessage;}else{echo "";}?></p>
<form action="" method="post" name="feedbackForm" id="feedbackForm" onsubmit="return validate_form();">
<fieldset>
<label for="email">Your E-Mail</label>
<input name="email" id="email" value="<?php if(isset($email)){echo $email;}?>" type="text" />
<br />

<label for="product_name">What did you buy?</label>
<select id="product_name" name="product_name">
<option value="<?php if(isset($product_name)){echo $product_name;}?>" selected="selected"><?php if(isset($product_name)){echo $product_name;}else{echo "Select A Product";}?></option>
<?php 
include "../../MyOnlineStore - Copy/storescripts/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM products ORDER BY date_added");
$productCount = mysql_num_rows($sql); // count the output amount
	while($row = mysql_fetch_array($sql)){ 
			 $product_name = $row["product_name"];
			 echo "<option value='$product_name'>$product_name</option>";
} 
mysql_close();
?>
</select><br /><br />

</fieldset><br />
<p>Based on your most recent experience, how likely are you to recommend our site to a friend or colleague?<br />
(1-Not at all likely, 2-Neutral, 3-Extremely Likely) </p>
<table id="rateTable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="10%">1</th>
    <th width="10%">2</th>
    <th width="10%">3</th>
    <th width="10%">4</th>
    <th width="10%">5</th>
    <th width="10%">6</th>
    <th width="10%">7</th>
    <th width="10%">8</th>
    <th width="10%">9</th>
    <th width="10%">10</th>
  </tr>
  <tr>
    <th><input class="rateRadio" type='radio' name='refer' value='1' /></th>
    <th><input class="rateRadio" type='radio' name='refer' value='2' /></th>
   <th><input class="rateRadio" type='radio' name='refer' value='3' /></th>
   <th><input class="rateRadio" type='radio' name='refer' value='4' /></th>
    <th><input class="rateRadio" type='radio' name='refer' value='5' /></th>
    <th><input class="rateRadio" type='radio' name='refer' value='6' /></th>
    <th><input class="rateRadio" type='radio' name='refer' value='7' /></th>
    <th><input class="rateRadio" type='radio' name='refer' value='8' /></th>
    <th><input class="rateRadio" type='radio' name='refer' value='9' /></th>
    <th><input class="rateRadio" type='radio' name='refer' value='10' /></th>
  </tr>
</table>
<br />
<fieldset>
<p>What one area in general could we most improve upon? </p>
<select id="improve" name="improve">
     <option value="" selected="selected">Select An Area</option>
    <option value="Price">Price</option>
    <option value="Product Quality">Product Quality</option>
    <option value="Checkout">Checkout</option>
</select><br /><br />
<p>How many times have you shopped at our site? </p>
  <select id="shopFreq" name="shopFreq">
    <option value="" selected="selected">Select An Option</option>
    <option value="Once">Once</option>
    <option value="Two to Ten">Two to Ten</option>
    <option value="More Than Ten">More Than Ten</option>
  </select>
  <br /><br />
<label for="comments">Additional Comments</label><br class="clear" />
<textarea name="comments" id="comments" cols="40" rows="10"><?php if(isset($comments)){echo $comments;}?></textarea>
</fieldset><br />
<input name="feedbackVal" type="hidden" value="1" />
&nbsp;&nbsp;<input name="mailFormBtn" type="submit" value="Send Feedback" id="mailFormBtn" />
</form>
<p id="errorMessage"><?php echo $errorMessage; ?></p>

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