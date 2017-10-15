<?php 
error_reporting (0);
//error_reporting (E_ALL);
$senderMessage = "";
//IN CASE JAVASCRIPT IS OFF OR MOBILE
if(isset($_POST["serviceType"])){
$returnType = preg_replace('#[^a-z]#i', '', $_POST["returnType"]);
if($returnType == "returns"){
header("location: returns.php");
}
if($returnType == "questions"){
header("location: questions.php");
}
if($returnType == "suggest"){
header("location: suggest.php");
}
if($returnType == "other"){
header("location: questions.php");
}
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
.required {color:#900;}
#serviceForm input {width: 200px; margin-bottom: 5px;}
#serviceForm label{ float: none; margin-bottom: 5px;}
#senderMessage {color:#900; font-size:1.2em; width:400px;}
</style>
<script type="text/javascript">
window.onload = function init(){
}
function clearDefault(x){
   if(x.defaultValue==x.value) x.value = "http://";
}

function goService(){
	var serviceForm = document.getElementById("serviceForm");
	var returnType = document.serviceForm.value;
	serviceForm.action = returnType.value;
	document.serviceForm.submit();
}
function questionStuff(){
	var senderMessage = document.getElementById("senderMessage");
	var serviceFormBtn = document.getElementById("serviceFormBtn");	
	serviceFormBtn.disabled = true;
	senderMessage.innerHTML = "Going to Question Form";
	window.location="questions.php"; 
}
function suggestStuff(){
	var senderMessage = document.getElementById("senderMessage");
	var serviceFormBtn = document.getElementById("serviceFormBtn");	
	serviceFormBtn.disabled = true;
	senderMessage.innerHTML = "Going to Suggestion Form";
	window.location="suggest.php"; 
}
function returnStuff(){
	var senderMessage = document.getElementById("senderMessage");
	var serviceFormBtn = document.getElementById("serviceFormBtn");	
	serviceFormBtn.disabled = true;
	senderMessage.innerHTML = "Going to Return Product Form";
	window.location="returns.php"; 
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
<h1>Customer Service.</h1>
<span class="smallType">Contact Us,</span>
</div>
<p>To ensure a timely response, please fill in as much information as possible in the form below. Sections noted by an '<span class='required'>*</span>' are mandatory and must be filled for the form to be processed.  Customer complaints or feedback concerning specific restaurants are forwarded to the store owner. We do not provide your information to third parties.</p>
<div id="paraLeft">
<form action="" method="post" name="serviceForm" id="serviceForm">
<fieldset>
<legend>1.<span class="legendPost">Type of Service:</span></legend>
<input name="returnType" type="radio" class="labelStill" id="defect" value="returns" onclick="returnStuff();" />
<label for="defect">I Need to Return A Product</label><br />

<input type="radio" name="returnType" value="questions" id="question" class="labelStill" onclick="questionStuff();" />
<label for="wrongSize">I Have A Product Question</label><br />

<input type="radio" name="returnType" value="suggest" id="notLike" class="labelStill" onclick="suggestStuff();" /> 
<label for="notLike">Suggestions</label>

<br />
<input type="radio" name="returnType" value="other" id="other" class="labelStill" onclick="questionStuff();" />
<label for="other">Other</label>
</fieldset>
<input name="serviceType" type="hidden" value="1" />
<p id="senderMessage" class="clear"><?php echo $senderMessage; ?>&nbsp;</p>
&nbsp;&nbsp;<input name="serviceFormBtn" type="submit" value="Contact Me" id="serviceFormBtn" onclick="return goService()" />
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