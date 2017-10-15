<?php 
error_reporting (0);
include("connect.php");
//error_reporting (E_ALL);
$thisMonth = date("M"); //abbv JUL
$eventMonth = date("F");// whole (July)
if(isset($_GET["senderMessage"])){
	$senderMessage = $_GET["senderMessage"];
	}else{ 
	$senderMessage = "";
}
$to = "dre_board@yahoo.com";
$mailtime = date("Y-m-d H:i:s");
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
<title>Product Returns</title>
<meta name="keywords" content="Black Hats, black shoes, evening wear, white gowns, black jeans" />
<meta name="description" content="Shadow Ware Online provides hard to find black and white business and formal wear. Located in Toledo Ohio" />
<link rel="shortcut icon" href="http://www.dreswebstudio.com/images/icon.ico" />
<link type="text/css" rel="stylesheet" href="styles.css" media="screen,projection" /> 
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="scripts.js"></script>
<style type="text/css">
.required {color:#900;}
#serviceForm #eventDay {width:55px;}
#serviceForm #eventYear {width:80px;}
#serviceForm #eventMonth {width:145px;}
#serviceForm select{width: 95px; margin-bottom: 5px;}
#serviceForm  #datesArea {font-size:100%; font-weight:bold;}
#serviceForm  #eventMonth {width:80px;}

#paraLeft p .widePara {width:100%; min-width:50%; float:left; display:block;}
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
if ( document.returnForm.first.value == ""){ 
senderMessage.innerHTML = "Please enter your first Name"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.first.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.returnForm.last.value == ""){ 
senderMessage.innerHTML = "Please enter your last Name"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.last.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.returnForm.phone.value == ""){ 
senderMessage.innerHTML = "Please enter your phone number"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.phone.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.returnForm.email.value == ""){ 
senderMessage.innerHTML = "Please enter your e-mail"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.email.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.returnForm.address.value == ""){ 
senderMessage.innerHTML = "Please enter your address"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.address.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.returnForm.city.value == ""){ 
senderMessage.innerHTML = "Please enter your city"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.city.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.returnForm.zip.value == ""){ 
senderMessage.innerHTML = "Please enter your zip code"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.zip.style.border = "solid #900 2px";
senderMessage.appendChild(document.createElement("br"));
valid = false;
}
if ( document.returnForm.state.value == ""){ 
senderMessage.innerHTML = "Please enter your state"; 
mailFormBtn.value = "Forgot Something...";
buttonMessage.innerHTML = "You have Skipped Required Fields, Scroll Up to View";
document.returnForm.state.style.border = "solid #900 2px";
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
<li class="bottom"><a href="../login.php">Login to account</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Questions</li>
<li class="bottom"><a href="faq.php">Frequently Asked</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<a href="cart.php"><img src="images/cart3.jpg" alt="my cart" name="showCart" width="48" height="43" id="showCart" /></a><br class="clear" />
</div><!--END HEADER-->

<div id="container">
<div id="bigType">
<h1>Returns.</h1>
<span class="smallType">Buy items,</span>
</div>
<div id="paraLeft">
<ul id="doList" class="noDot">
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/index.php">Home</a></li>
<li><a href="product_list.php">Products</a></li>
<li><a href="http://www.dreswebstudio.com/MyOnlineStore/cart.php">My Cart</a></li>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
.<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<p class="widePara">To ensure a timely response, please fill in as much information as possible in the form below. Sections noted by an '<span class='required'>*</span>' are mandatory and must be filled for the form to be processed.  Customer complaints or feedback concerning specific restaurants are forwarded to the store owner. We do not provide your information to third parties.</p>
<p>Before Filling out form please read our<br />
<a href="javascript: openwindow()">Return Policy</a></p>
<span>&nbsp;<?php echo $senderMessage; ?></span>
<div id="paraLeft">
<span id="senderMessage">&nbsp;</span>
<form action="sent.php" method="post" name="returnForm" id="returnForm" onsubmit="return validate_form ();">
<fieldset>
<legend><span class='required'>*</span>1.<span class="legendPost">Personal Info:</span></legend>
<label for="first">First</label>
<input type="text" name="first" id="first" onblur="fixButton(this);" /><br />
<label for="last">Last</label>
<input type="text" name="last" id="last" onblur="fixButton(this);" /><br />
<label for="phone">Phone</label>
<input type="text" name="phone" id="phone" onblur="fixButton(this);" /><br />
<label for="email">E-Mail</label>
<input type="text" name="email" id="email" onblur="fixButton(this);" /><br />
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
</fieldset>
<fieldset>
  <legend><span class='required'>*</span>2.<span class="legendPost">Product Info:</span></legend>
<label for="product_name">What did you buy?</label>
<select id="product_name" name="product_name">
<?php 
include "storescripts/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM products ORDER BY product_name ASC");
$productCount = mysql_num_rows($sql); // count the output amount
	while($row = mysql_fetch_array($sql)){ 
			 $product_name = $row["product_name"];
			 echo "<option value='$product_name'>$product_name</option>";
} 
mysql_close();
?>
</select><br /><br />
<label for="price">Purchase Price</label>
<input type="text" name="price" id="price" /><br />
<fieldset id="datePicker">
<legend id="datesArea">Purchase Date</legend>
<label class="eventFormLabel">Day</label>
<select name='eventMonth' id="eventMonth">
<option value='<?php echo $eventMonth; ?>' selected="selected"><?php echo $thisMonth; ?></option>
<option value='January'>Jan</option>
<option value='February'>Feb</option>
<option value='March'>Mar</option>
<option value='April'>Apr</option>
<option value='May'>May</option>
<option value='June'>Jun</option>
<option value='July'>Jul</option>
<option value='August'>Aug</option>
<option value='September'>Sep</option>
<option value='October'>Oct</option>
<option value='November'>Nov</option>
<option value='December'>Dec</option>
</select>
<select name='eventDay' id="eventDay">
<option value="<?php echo date("j"); ?>" selected="selected"><?php echo date("j"); ?></option>
<option value='1'>1&nbsp;</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>&nbsp;
<?php
$eventYear = date("Y");
$twoYear = $eventYear + 1;
$threeYear = $eventYear + 2;
echo"
<select id='eventYear' name='eventYear'>
<option value='$eventYear'>$eventYear</option>
<option value='$twoYear'>$twoYear</option>
<option value='$threeYear'>$threeYear</option>
</select>
"?>
</fieldset>
</fieldset>

<fieldset>
<legend><span class='required'>*</span>3.<span class="legendPost">Reason:</span></legend>
<label for="defect">Defective</label>
<input name="returnType" type="radio" class="labelStill" id="defect" value="Defect" checked="checked" /><br />
<label for="wrongSize">Wrong Size</label>
<input type="radio" name="returnType" value="Wrong Size" id="wrongSize" class="labelStill" /><br />
<label for="notLike">Did Not Like</label>
<input type="radio" name="returnType" value="Did Not Like" id="notLike" class="labelStill" />
<br />
<label for="other">Other</label>
<input type="radio" name="returnType" value="Other" id="other" class="labelStill" />
</fieldset>
<br class="clear" />
&nbsp;&nbsp;<input name="mailFormBtn" type="submit" value="Contact Me" id="mailFormBtn" /><br />
<span class="required" id="buttonMessage">&nbsp;</span>
</form>
<p>&nbsp;</p>
</div>

<br class="clear" />
</div><!--END CONTAINER-->
<div id="footer">
<ul class="headList">
<li class="top">ALL CONTENT</li>
<li class="bottom"> &copy; Copyright <?php echo date("Y");?> <a href="index.php">Shadow Wear</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Questions</li>
<li class="bottom"><a href="faq.php">Help &amp; FAQ</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Contact</li>
<li class="bottom"><a href="contact.php"><img src="images/mailSmall.jpg" alt="mail" width="34" height="32" align="left" />Customer Service</a></li>
</ul>
</div><!--END footer-->
</body>
</html>