<?php 
error_reporting (E_ALL);
$errorMessage = "";

$to = "dre_board@yahoo.com";
$myTime = date("Y-m-d H:i:s");
$reviewIP = $_SERVER['REMOTE_ADDR'];
$reviewIP = ip2long($reviewIP);
$timezone = "America/Detroit";
date_default_timezone_set ($timezone);
$thisMonth = date('m'); //number (07)
$eventMonth = date("F");// whole (July)
$eventYear = date("Y");

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
$salesID = mysql_real_escape_string($_POST["salesID"]);
$first = mysql_real_escape_string($_POST["improve"]);
$shopFreq = mysql_real_escape_string($_POST["shopFreq"]);
$comment = strip_tags($_POST["comment"]);

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
if($salesID == ""){
	$errorMessage = "Please enter your invoice number<br /> ";
	header("location: contact.php?errorMessage=$errorMessage");
	die();
}
if($comment == ""){
	$errorMessage = "Please A Comment";
	header("location: contact.php?errorMessage=$errorMessage");
	die();
}

$result = mysql_query("SELECT salesID FROM review WHERE salesID=".$salesID." AND productName=".$productName."");
if($result && mysql_num_rows($result) > 0){
	$note = "You have already rated this product";
	header("location: contact.php?note=$note");
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
document.feedbackForm.mailFormBtn.value= "Saving Your Rating....";
valid = true; 
if ( document.feedbackForm.email.value == ""){ 
document.feedbackForm.email.style.border = "solid #900 2px";
document.feedbackForm.mailFormBtn.value= "There are errors in the form";
document.getElementById("errorMessage").innerHTML = "Please enter your E-Maill Address";
return false;
}
if ( document.feedbackForm.first.value == ""){ 
document.feedbackForm.first.style.border = "solid #900 2px";
document.feedbackForm.mailFormBtn.value= "There are errors in the form";
document.getElementById("errorMessage").innerHTML = "Please enter first name";
return false;
}
if ( document.feedbackForm.last.value == ""){ 
document.feedbackForm.last.style.border = "solid #900 2px";
document.feedbackForm.mailFormBtn.value= "There are errors in the form";
document.getElementById("errorMessage").innerHTML = "Please enter last name";
return false;
}
if ( document.feedbackForm.salesID.value == ""){ 
document.feedbackForm.salesID.style.border = "solid #900 2px";
document.feedbackForm.mailFormBtn.value= "There are errors in the form";
document.getElementById("errorMessage").innerHTML = "Enter your invoice number";
return false;
}

if ( document.feedbackForm.comment.value == ""){ 
document.feedbackForm.comment.style.border = "solid #900 2px";
document.feedbackForm.mailFormBtn.value= "There are errors in the form";
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
document.feedbackForm.mailFormBtn.value= "Saving.....";
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
<h1>Rating.</h1>
<span class="smallType">Product Review,</span>
</div>
<p>To ensure the success of our store and to keep customers happy with their pruchases, we would like to know how your shopping experience was.  Please fill in as much information as possible in order to provide us with your complete shopping experience.  We do not provide your information to third parties.</p>
<div id="paraLeft">
<p id="senderMessage"><?php if(isset($senderMessage)){echo $senderMessage;}else{echo "";}?></p>
<form action="" method="post" name="feedbackForm" id="feedbackForm" onsubmit="return validate_form();">
<fieldset>
<label for="email">Your E-Mail</label>
<input name="email" id="email" value="<?php if(isset($email)){echo $email;}?>" type="text" /><br />
<label for="first">First</label>
<input type="text" name="first" id="first" value="<?php if(isset($first)){echo $first;}?>" /><br />
<label for="last">Last</label>
<input type="text" name="last" id="last" value="<?php if(isset($last)){echo $last;}?>" /><br />
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
<label for="salesID">Invoice Number</label>
<input type="text" name="salesID" id="salesID" value="<?php if(isset($salesID)){echo $salesID;}?>" />
<br />

</fieldset><br />
<p>How would you rate your product?<br />
(1-Not worth the money, 3-Neutral, 5-Great buy) </p>
<table id="rateTable" width="60%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="10%">1</th>
    <th width="10%">2</th>
    <th width="10%">3</th>
    <th width="10%">4</th>
    <th width="10%">5</th>
  </tr>
  <tr>
    <th><input class="rateRadio" type='radio' name='rating' value='1' /></th>
    <th><input class="rateRadio" type='radio' name='rating' value='2' /></th>
   <th><input class="rateRadio" type='radio' name='rating' value='3' /></th>
   <th><input class="rateRadio" type='radio' name='rating' value='4' /></th>
    <th><input name='rating' type='radio' class="rateRadio" value='5' checked="checked" /></th>
  </tr>
</table>
<br />
<label for="comment">Product Comment</label><br class="clear" />
<textarea name="comment" id="comment" cols="40" rows="10"><?php if(isset($comment)){echo $comment;}?></textarea>
</fieldset><br />
<input name="feedbackVal" type="hidden" value="1" />
&nbsp;&nbsp;<input name="mailFormBtn" type="submit" value="Rate This Product" id="mailFormBtn" />
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