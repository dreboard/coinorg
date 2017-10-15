<?php 
error_reporting (0);
//error_reporting (E_ALL);
$thisMonth = date('m'); //2 digit number (07)
$eventMonth = date("F");// whole (July)
$loginIP = $_SERVER['REMOTE_ADDR'];
$loginIP = ip2long($loginIP);
$timezone = "America/Detroit";
date_default_timezone_set ($timezone);

if(isset($_GET["senderMessage"])){
	$senderMessage = $_GET["senderMessage"];
	}else{ 
	$senderMessage = "";
}
$to = "dre_board@yahoo.com";
$reviewtime = date("Y-m-d H:i:s");
 include "../../MyOnlineStore - Copy/storescripts/connect_to_mysql.php"; 

if(isset($_POST["feedbackVal"])){

$product_name = mysql_real_escape_string($_POST["product_name"]);
$first = mysql_real_escape_string($_POST["first"]);
$last = mysql_real_escape_string($_POST["last"]);
$phone = mysql_real_escape_string($_POST["phone"]);
$address = mysql_real_escape_string($_POST["address"]);
$email = mysql_real_escape_string($_POST["email"]);
$city = mysql_real_escape_string($_POST["city"]);
$state = mysql_real_escape_string($_POST["state"]);
$zip = mysql_real_escape_string($_POST["zip"]);
$price = mysql_real_escape_string($_POST["price"]);
$returnType = mysql_real_escape_string($_POST["returnType"]);
$eventDay = mysql_real_escape_string($_POST["eventDay"]);
$eventMonth = mysql_real_escape_string($_POST["eventMonth"]);
$eventYear = mysql_real_escape_string($_POST["eventYear"]);

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
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="http://dreboard.blogspot.com/feeds/posts/default?alt=rss" />
<link rel="shortcut icon" href="http://www.dreswebstudio.com/images/icon.ico" />
<link type="text/css" rel="stylesheet" href="../../MyOnlineStore - Copy/styles.css" media="screen,projection" /> 
<script type="text/javascript" src="../../MyOnlineStore - Copy/javascript/jquery.js"></script>
<script type="text/javascript" src="../../MyOnlineStore - Copy/scripts.js"></script>
<style type="text/css">
.required {color:#900;}
#registerForm #state {width:180px;}
#registerForm {width:450px; padding:10px 20px;}
#registerForm .labelStill {color:#191919; float:none; width: 30px}
#registerForm legend {font-wight:bolder; font-size:55px;}
#registerForm input[type=text] {
border-bottom: solid 2px #303030;
border-right: solid 2px #303030;
margin-bottom:7px;
}
#registerForm #eventDay {width:55px;}
#registerForm #eventYear {width:80px;}
#registerForm #eventMonth {width:145px;}
#registerForm select{width: 95px; margin-bottom: 5px;}
#registerForm  #datesArea {font-size:100%; font-weight:bold;}
#registerForm  #eventMonth {width:80px;}
</style>
<script type="text/javascript">
window.onload = function init(){
}
function clearDefault(x){
   if(x.defaultValue==x.value) x.value = "http://";
}
function openwindow()
{
	window.open("returnPolicy.php","mywindow","menubar=1,scrollbars=1,resizable=1,width=462,height=650");
}
function checkform(){
	var first = document.getElementById("first").value;
	var last = document.getElementById("last").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	if (first == "" || last == "" || email == "" || phone == "") {
	alert("First & Last Name along with Phone and E-Mail Required");
	return false;
	} else {
	document.mailForm.submit();
	}
}
function fixButton(obj){
var mailFormBtn = document.getElementById("mailFormBtn");
var buttonMessage = document.getElementById("buttonMessage");
mailFormBtn.value = "Send";
buttonMessage.innerHTML = "";	
obj.style.border = "solid #090 2px";
}
function validate_form(){ 
var mailFormBtn = document.getElementById("mailFormBtn");
var buttonMessage = document.getElementById("buttonMessage");
var senderMessage = document.getElementById("senderMessage");
valid = true; 
if ( document.registerForm.first.value == ""){ 
senderMessage.innerHTML = "Please enter your first Name"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.first.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.registerForm.last.value == ""){ 
senderMessage.innerHTML = "Please enter your last Name"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.last.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.registerForm.phone.value == ""){ 
senderMessage.innerHTML = "Please enter your phone number"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.phone.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.registerForm.email.value == ""){ 
senderMessage.innerHTML = "Please enter your e-mail"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.email.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.registerForm.address.value == ""){ 
senderMessage.innerHTML = "Please enter your address"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.address.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.registerForm.city.value == ""){ 
senderMessage.innerHTML = "Please enter your city"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.city.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.registerForm.zip.value == ""){ 
senderMessage.innerHTML = "Please enter your zip code"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.zip.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.registerForm.state.value == ""){ 
senderMessage.innerHTML = "Please enter your state"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.registerForm.state.style.border = "solid #900 2px";
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
<h1>Register.</h1>
<span class="smallType">Shopper Account,</span>
</div>
<div id="paraLeft">
<ul id="doList" class="noDot">
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/index.php">Home</a></li>
<li><a href="../../MyOnlineStore - Copy/product_list.php">Products</a></li>
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/cart.php">My Cart</a></li>
</ul>
</div>

<span>&nbsp;<?php echo $senderMessage; ?></span>

<img src="../../images/regSale.jpg" alt="discount" width="120" height="120" align="left" />
<p>All registered shoppers get 5% off of their first purchase.</p>
<p>&nbsp;</p>
<span id="senderMessage">&nbsp;</span>
<br class="clear" />
<form action="../../MyOnlineStore - Copy/sent.php" method="post" name="registerForm" id="registerForm" onsubmit="return validate_form ();">
<fieldset>
<legend><span class='required'>*</span>1.<span class="legendPost">required:</span></legend>
<label for="first">First</label>
<input type="text" name="first" id="first" onblur="fixButton(this);" /><br />
<label for="last">Last</label>
<input type="text" name="last" id="last" onblur="fixButton(this);" /><br />
<label for="phone">Phone</label>
<input type="text" name="phone" id="phone" onblur="fixButton(this);" /><br />
<label for="email">E-Mail</label>
<input type="text" name="email" id="email" onblur="fixButton(this);" /><br />
<label for="password">Password</label>
<input type="text" name="password" id="password" onblur="fixButton(this);" /><br />
<label for="password2">Verify Password</label>
<input type="text" name="password2" id="password2" onblur="fixButton(this);" /><br />
<label for="address">Address</label>
<input type="text" name="address" id="address" onblur="fixButton(this);" /><br />
<label for="city">City</label>
  <input type="text" name="city" id="city" onblur="fixButton(this);" /><br />
<label for="state">State</label>
<select name="state" id="state" onchange="fixButton(this);" />
<option value="">Select Your State</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">Dist of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select><br />
<label for="zip">Zip</label>
<input type="text" name="zip" id="zip" onblur="fixButton(this);" /><br />
<br />
<label for="registerFormBtn">&nbsp;</label>
<input name="registerFormBtn" type="submit" value="Create Account" id="registerFormBtn" onclick="this.value='Creating Account...'" /><br />
<span class="required" id="buttonMessage">&nbsp;</span>
</fieldset>
<br class="clear" />

</form>


<p>&nbsp;</p>


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