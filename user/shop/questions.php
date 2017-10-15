<?php 
//error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');
$errorMessage = "";
$senderMessage = "";
$to = "dre_board@yahoo.com";
$myTime = date("Y-m-d H:i:s");
$userIP = $_SERVER['REMOTE_ADDR'];
$userIP = ip2long($userIP);
$timezone = "America/Detroit";
date_default_timezone_set ($timezone);
$questionDate = date('m'); //number (07)
$questionMonth = date("F");// whole (July)
$questionYear = date("Y");

if(isset($_GET["senderMessage"])){
$senderMessage = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["senderMessage"]);
unset ($_POST["email"]);
unset ($_POST["product_name"]);
unset ($_POST["subject"]);
unset ($_POST["question"]);
}

$con = mysql_connect("localhost","dreswebs_admin","!Nd!aN1989");
//$con = mysql_connect("localhost","dreswebs_admin","ab198900");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dreswebs_admin") or die(mysql_error());

if(isset($_POST["questionChecker"])){
$email = mysql_real_escape_string($_POST["email"]);
$product_name = mysql_real_escape_string($_POST["product_name"]);
$subject = mysql_real_escape_string($_POST["subject"]);
$question = strip_tags($_POST["question"]);

if($email == ""){
	$errorMessage = "Please enter E-Mail<br /> ";
	header("location: questions.php?errorMessage=$errorMessage");
	die();
}
if($product_name == ""){
	$errorMessage = " Please Select a product<br /> ";
	header("location: questions.php?errorMessage=$errorMessage");
	die();
}
if($subject == ""){
	$errorMessage = "Please A subject<br /> ";
	header("location: questions.php?errorMessage=$errorMessage");
	die();
}
if($question == ""){
	$errorMessage = "Please Ask A Question";
	header("location: questions.php?errorMessage=$errorMessage");
	die();
}

mysql_query("INSERT INTO questions(email, product_name, question, subject, questionDate, questionMonth, questionYear, userIP) VALUES('$email', '$product_name', '$question', '$subject', '$questionDate', '$questionMonth', '$questionYear', '$userIP')") or die(mysql_error());

$message = "A store question was asked by " . $email . "\r\n";

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
$subject = remove_headers($subject);
$product_name = remove_headers($product_name);
$question = remove_headers($question);
$headers = "From: dre_board@yahoo.com" . "\r\n";
$message .= $question;

mail("dre_board@yahoo.com",$subject,$message,$headers );
$sentMessage = "Thank You, your question has been sent and you will receive a receipt resonse in your inbox";

$subject2 = "Your question was received";
$message2 = "We review all question and will respond in a timely manner.";
//Mail receipt to user
mail($email,$subject2,$message2,$headers);
$senderMessage = "Your question has been sent";
unset ($_POST["email"]);
unset ($_POST["product_name"]);
unset ($_POST["subject"]);
unset ($_POST["question"]);
header("location: questions.php?senderMessage=$senderMessage");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customer Product Questions</title>
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
.labelfocus {color:#666;}
#errorMessage {color:#900; font-size:1.2em; width:400px;}
#senderMessage {color:#900; font-size:1.2em; width:400px;}
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
var senderMessage = document.getElementById("senderMessage");
valid = true; 
if ( document.questionForm.email.value == ""){ 
document.questionForm.email.style.border = "solid #900 2px";
senderMessage.innerHTML = "Please enter your E-Mail <br \/>"; 
valid = false;
}
if (document.questionForm.subject.value == ""){ 
document.questionForm.subject.style.border = "solid #900 2px";
senderMessage.innerHTML += "Please enter a subject <br \/>"; 
valid = false;
}
if (document.questionForm.question.value == ""){ 
document.questionForm.question.style.border = "solid #900 2px";
senderMessage.innerHTML += "Please enter a question"; 
valid = false;
}
if (document.questionForm.product_name.value == ""){ 
document.questionForm.product_name.style.border = "solid #900 2px";
senderMessage.innerHTML += "Please select a product"; 
valid = false;
}
return valid;
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
<li class="bottom"><a href="../../MyOnlineStore - Copy/faq.php">Frequently Asked</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<a href="../../MyOnlineStore - Copy/cart.php"><img src="../../images/cart3.jpg" alt="my cart" name="showCart" width="48" height="43" id="showCart" /></a><br class="clear" />
</div><!--END HEADER-->

<div id="container">
<div id="bigType">
<h1>General Questions.</h1>
<span class="smallType">Contact Us,</span>
</div>
<p>To ensure a timely response, please fill in as much information as possible in the form below. Sections noted by an '<span class='required'>*</span>' are mandatory and must be filled for the form to be processed.  Customer complaints or feedback concerning specific restaurants are forwarded to the store owner. We do not provide your information to third parties.</p>
<div id="paraLeft">
<p id="senderMessage"><?php echo $senderMessage; ?></p>
<form action="" method="post" name="questionForm" id="questionForm" onsubmit="return validate_form ();">
<fieldset>
<legend>Enter Your Question:</legend><br />
<label for="subject">Subject</label>
<input type="text" id="subject" name="subject" value="<?php if(isset($subject)){echo $subject;}?>" />
<br />
<label for="product_name">Product?</label>
<select id="product_name" name="product_name">
<option selected="selected" value="<?php if(isset($product_name)){	echo $product_name;}else{echo "";}?>"><?php if(isset($product_name)){	echo $product_name;}else{echo "Select A Product";}?></option>
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
<label for="email">E-Mail</label>
<input type="text" id="email" name="email" value="<?php if(isset($email)){echo $email;}?>" /><br /><br />
<label for="question">Question</label>
<textarea name="question" id="question" cols="60" rows="10">
<?php if(isset($question)){echo $question;}?>
</textarea><br />
<input name="questionChecker" type="hidden" value="1" />
<label for="questionFormBtn">&nbsp;</label>
<input name="questionFormBtn" type="submit" value="Send Question" id="questionFormBtn" onclick="this.value='Sending Question.....'" />
</fieldset>
</form>

<h2>Feedback</h2>
<p>How'd we do? We want to hear about your recent purchases from our website.<br />
  <a href="../../MyOnlineStore - Copy/feedback.php">Survey</a></p>
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