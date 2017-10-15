<?php 
include 'inc/configSite.php';

//checkEmail($email)	
/////////////////////////////////////////////////// REGISTER//////////////////////////////////////////////////////////////////
if(isset($_POST["registerAccountBtn"])){

$captchaImg = strip_tags(strtolower($_POST['captchaImg']));
if($captchaImg !== $captchaCode){
	$_SESSION['errorMsg'] = 'Your captcha code is wrong<br/>';  
}  else {
$username = mysql_real_escape_string($_POST['username']);
if(!$User->checkUsername($username)){
	
$name = mysql_real_escape_string($_POST['name']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = mysql_real_escape_string($_POST['zip']);
$phone = mysql_real_escape_string($_POST['phone']);
$clubEmail = mysql_real_escape_string($_POST['clubEmail']);

if(empty($_POST["ana"])){
	$ana = "0";
	$anaNum = 'None';
	} else {
	$ana = mysql_real_escape_string($_POST['ana']);	
	$anaNum = mysql_real_escape_string($_POST['anaNum']);	
}
if(empty($_POST["png"])){
	$png = "0";
	$pngNum = 'None';
	} else {
	$png = mysql_real_escape_string($_POST['png']);	
	$pngNum = mysql_real_escape_string($_POST['pngNum']);	
}
if($_POST["website"] == ""){
	$website = "None";
	} else {
	$website = mysql_real_escape_string($_POST['website']);	
}

if($_POST["clubDescription"] == ""){
	$clubDescription = "None";
	} else {
	$clubDescription = mysql_real_escape_string($_POST['clubDescription']);	
}
	
$password = mysql_real_escape_string($_POST['password']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);

$question = mysql_real_escape_string($_POST['question']);
$answer = mysql_real_escape_string($_POST['answer']);
$viewLevel = mysql_real_escape_string($_POST['viewLevel']);

if(!$User->checkEmail($email)){
mysql_query("INSERT INTO coinclub(clubName, clubAddress, clubCity, clubState, clubZip, clubPhone, clubEmail, clubWebsite, clubDescription, enterDate, ana, anaNum, png, pngNum) VALUES('$name', '$address', '$city', '$state', '$zip', '$phone', '$clubEmail', '$website', '$clubDescription', '$theDate', '$ana', '$anaNum', '$png', '$pngNum')") or die(mysql_error()); 
$clubID = mysql_insert_id();

mysql_query("INSERT INTO user(username, firstname, lastname, email, password, website, question, answer, viewLevel, userDate, userType, clubID) VALUES('$username', '$firstname', '$lastname', '$email', '$password', '$website', '$question', '$answer', '$viewLevel', '$theDate', 'club', '$clubID')") or die(mysql_error()); 

$userID = mysql_insert_id();
$User->sendWelcomeMail($userID, $email, $lastname, $firstname);

header("location: regSuccess.php");
} else {
  $_SESSION['errorMsg'] = 'The email <strong>'.$email.'</strong> is already taken';
  } //End username check	
	
  } else {
  $_SESSION['errorMsg'] = 'The username <strong>'.$username.'</strong> is already taken';
  } //End username check
}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<?php include("secureScripts.php"); ?>
<title>Register</title>

<script type="text/javascript">
$(document).ready(function(){	

$("#registerAccountBtn").hide();

$("#termsBtn").click(function(){
	if($(this).is(":checked") ) {
            $("#registerAccountBtn").show();
        }
});

$("#email").blur(function(){ 
	var email = $(this).val();
	  if(checkEmail(email)){
		  $(this).val() == ""
	  } else {
		  $("#email").addClass("errorInput");
		  $(this).val() == ""
		  $("#registerAccountBtn").hide();
	  }
 });
 
 function checkEmail(email) {
	  $.ajax({  //Make the Ajax Request
	 type: "GET",
	 url: "inc/ajax_check_email.php",  //file name
	 data: "email="+ email,  //data
	 success: function(server_response){
	 $("#emailChecker").html(server_response);
	 }
	 });
}
 
 
 
$("#checkUserBtn").click(function(){ 
var username = $("#username").val();
$.ajax({  //Make the Ajax Request
 type: "GET",
 url: "inc/ajax_check_username.php",  //file name
 data: "username="+ username,  //data
 success: function(server_response){
 $("#availability_status").html(server_response);
 }
 });
 });



$("input[type=text]").click(function(){
	  $(this).removeClass("errorInput");
});


//MEMBER SIGNUP
$("#memberRegForm").submit(function() {
      if ($("#name").val() == "") {
        $("#clubMsg").text("Please enter your Club name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#name").addClass("errorInput");
        return false;
      }else if ($("#address").val() == "") {
        $("#clubMsg").text("Please enter Club address...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#address").addClass("errorInput");
        return false;
      }else if ($("#city").val() == "") {
        $("#clubMsg").text("Please enter Club city...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#city").addClass("errorInput");
        return false;
      } else if ($("#clubEmail").val() == "") {
        $("#clubMsg").text("Please enter Club email..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#clubEmail").addClass("errorInput");
        return false;
      }else if ($("#zip").val() == "") {
        $("#clubMsg").text("Please enter Club zip...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#zip").addClass("errorInput");
        return false;
      } else if ($("#ana").is(":checked") && $('#anaNum').val() == "") {
        $("#clubMsg").text("Please enter ANA Number..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$('#anaNum').addClass("errorInput");
        return false;
      } else if ($("#png").is(":checked") && $('#pngNum').val() == "") {
        $("#clubMsg").text("Please enter PNG Number..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$('#pngNum').addClass("errorInput");
        return false;
      }
	  
	  
	  else if ($("#firstname").val() == "") {
        $("#infoMsg").text("Please enter your first  name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#firstname").addClass("errorInput");
        return false;
      }else if ($("#lastname").val() == "") {
        $("#infoMsg").text("Please enter your last name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#lastname").addClass("errorInput");
        return false;
      } 
	  
	  
	  
	  else if ($("#question").val() == "") {
        $("#passMsg").text("Please enter a zip...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("Select a security question");
		$("#question").addClass("errorInput");
        return false;
      }else if ($("#answer").val() == "") {
        $("#passMsg").text("Please check card number...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("Enter answer for security question");
		$("#answer").addClass("errorInput");
        return false;
      }else if ($("#password").val() == "") {
        $("#passMsg").text("Please Enter Your Password...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
        $("#endErrorMsg").text("There are password errors... Scroll up to fix");
		$("#password").addClass("errorInput");
        return false;
      }else if ($("#verify_password").val() == "") {
        $("#passMsg").text("Please Verify Your Password...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
        $("#endErrorMsg").text("There are password errors... Scroll up to fix");
		$("#verify_password").addClass("errorInput");
        return false;
      }else if ($("#password").val() !== $("#verify_password").val()) {
        $("#passMsg").text("Your Passwords Are Not The Same...");
        $("#endErrorMsg").text("There are password errors... Scroll up to fix");
        $("#password").addClass("errorInput");
		$("#verify_password").addClass("errorInput");
        return false;
      }else if ($("#captchaImg").val() == "") {
        $("#endErrorMsg").text("Enter image text");
        $("#captchaImg").addClass("errorInput");
        return false;
      }else {
	  return true;
	  }
});	


$("input[type=text], select").click(function(){
	  $(this).removeClass("errorInput");
	  $("#endErrorMsg, #passMsg, #infoMsg, #clubMsg").empty();
	  $("#waitComplete").hide();
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
});

$("#ana").click(function(){
	  $("#anaNum").removeClass("errorInput");
	  $("#clubMsg").empty();
	  $("#waitComplete").hide();
});
$("#png").click(function(){
	  $("#pngNum").removeClass("errorInput");
	  $("#clubMsg").empty();
	  $("#waitComplete").hide();
});


});
</script>  


<style type="text/css">
#clubDescription {width:99%;}
#clientImg {height:200px; width:auto;}
#termsHolder  {height:150px; overflow:scroll; border:1px solid #333; padding: 5px; overflow-x: auto;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<?php include("inc/pageElements/header.php"); ?>

<div id="content" class="clear">
<div class="formsDiv" id="basicDiv">
			<img src="siteImg/club.jpg" name="clientImg" align="left" id="clientImg" />
    <h2 class="blueHdrTxt2">Coin Club Account Setup</h2>

<span><?php 
if(isset($_SESSION['errorMsg'])){
echo '<span class="errorTxt">'.addslashes($_SESSION['errorMsg']).'</span>'; 
} else {
unset($_SESSION['errorMsg']); 
}
?>

</span><br class="clear" />
<form name="memberRegForm" id="memberRegForm" method="post" action="">
<fieldset>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3 class="hdrTxt">Club  Info</h3></td>
    <td colspan="3"><span id="clubMsg" class="errorTxt"></span></td>
    </tr>
  <tr>
    <td width="15%"><strong>
    <label for="name">Club Name:</label></strong></td>
    <td colspan="2">
      <input name="name" type="text" id="name" value="<?php if(isset($_POST["name"])){echo $_POST["name"];} else {echo "";}?>" size="50" /></td>
    <td width="44%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
    <label for="address">Address:</label></strong></td>
    <td colspan="2">
      <input name="address" type="text" id="address" value="<?php if(isset($_POST["address"])){echo $_POST["address"];} else {echo "";}?>" size="50" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="city">City:</label>
    </strong></td>
    <td colspan="2"><input name="city" type="text" id="city" value="<?php if(isset($_POST["city"])){echo $_POST["city"];} else {echo "";}?>" size="50" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="state">State:</label>
    </strong></td>
    <td colspan="2">
      <select name="state"  id="clubState">
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
        <option value="IN">Indiana</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="ME">Maine</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="MS">Mississippi</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NV">Nevada</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NM">New Mexico</option>
        <option value="NY">New York</option>
        <option value="NC">North Carolina</option>
        <option value="ND">North Dakota</option>
        <option value="OH" selected="selected">Ohio</option>
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
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="zip">Zip:</label>
    </strong></td>
    <td colspan="2"><input id="zip" name="zip" type="text" value="<?php if(isset($_POST["zip"])){echo $_POST["zip"];} else {echo "";}?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="clubEmail">Club Email:</label></strong></td>
    <td colspan="2">
      <input name="clubEmail" type="text" id="clubEmail" value="<?php if(isset($_POST["clubEmail"])){echo $_POST["clubEmail"];} else {echo "";}?>" size="50" />
   </td>
    <td></td>
  </tr>
  <tr>
    <td><strong>
      <label for="clubPhone">Club Phone:</label></strong></td>
    <td colspan="2">
      <input name="phone" type="text" id="clubPhone" value="<?php if(isset($_POST["clubPhone"])){echo $_POST["clubPhone"];} else {echo "";}?>" size="50" />
   </td>
    <td></td>
  </tr>
  <tr>
    <td><strong><label for="website">Website:</label></strong></td>
    <td colspan="2">
      www.<input name="website" type="text" id="website" value="<?php if(isset($_POST["website"])){echo $_POST["website"];} else {echo "";}?>" size="50" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>ANA Member:</strong></td>
    <td width="7%"><input id="ana" name="ana" type="checkbox" value="1"  />
      Yes</td>
    <td width="34%"># 
      <input name="anaNum" type="text" id="anaNum" value="<?php if(isset($_POST["anaNum"])){echo $_POST["anaNum"];} else {echo "";}?>" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>PNG Member:</strong></td>
    <td width="7%"><input id="png" name="png" type="checkbox" value="1"  />
      Yes</td>
    <td width="34%"># 
      <input name="pngNum" type="text" id="pngNum" value="<?php if(isset($_POST["pngNum"])){echo $_POST["pngNum"];} else {echo "";}?>" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Description:</strong></td>
    <td colspan="3" rowspan="2"><textarea name="clubDescription" id="clubDescription" cols="45" rows="5"></textarea></td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
  
</table>
<hr>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3 class="hdrTxt">Personal Info</h3></td>
    <td colspan="2"><span id="infoMsg" class="errorTxt"></span></td>
    </tr>
  <tr>
    <td width="15%"><strong><label for="firstname">First Name:</label></strong></td>
    <td width="32%">
      <input id="firstname" name="firstname" type="text" value="<?php if(isset($_POST["firstname"])){echo $_POST["firstname"];} else {echo "";}?>" /></td>
    <td width="53%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="lastname">Last Name:</label></strong></td>
    <td>
      <input id="lastname" name="lastname" type="text" value="<?php if(isset($_POST["lastname"])){echo $_POST["lastname"];} else {echo "";}?>" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="email">Email:</label></strong></td>
    <td>
      <input id="email" name="email" type="text" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} else {echo "";}?>" />
   </td>
    <td><span id="emailChecker"></span></td>
  </tr>
  
  <tr>
    <td><strong><label for="username">User Name:</label></strong></td>
    <td>
      <input name="username" type="text" id="username" value="<?php if(isset($_POST["username"])){echo $_POST["username"];} else {echo "";}?>" maxlength="10" />
      <input type="button" name="checkUserBtn" id="checkUserBtn" value="Check Availability">
</td>
    <td><span id="availability_status">Max 10 Characters</span></td>
  </tr>
</table>
<hr>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3 class="hdrTxt">Account Info</h3></td>
    <td colspan="2"><span id="passMsg" class="errorTxt"></span></td>
    </tr>
  <tr>
    <td width="19%"><strong>
      <label for="password">Password:</label></strong></td>
    <td width="29%"><input id="password" name="password" type="password" value="ab198900" /></td>
    <td width="52%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="verify_password">Verify Password:</label></strong></td>
    <td><input id="verify_password" name="verify_password" type="password" value="ab198900" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="question">Security Question:</label></strong></td>
    <td><select name="question" id="question">
      <option value="">Select A Security Question</option>
      <option value="What is the firstname name of your favorite aunt?">What is the firstname name of your favorite aunt?</option>
      <option value="Whats your favorite book?">Whats your favorite book?</option>
      <option value="Whats your favorite sport?">Whats your favorite sport?</option>
      <option value="Whats the name of your elementary school?">Whats the name of your elementary school?</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="answer">Security Answer:</label></strong></td>
    <td><input id="answer" name="answer" type="text" value="<?php if(isset($_POST["answer"])){echo $_POST["answer"];} else {echo "";}?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="viewLevel">Collection Level:</label></strong></td>
    <td><select name="viewLevel" id="viewLevel">
      <option value="private" selected>Private (Viewable by none)</option>
      <option value="public">Public (Viewable by all)</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
</table>

</fieldset>
<br />
<br />
<p class="blueHdrTxt"><strong>Website Terms of Use</strong></p>
<div id="termsHolder">
<div id="terms">
<p><strong>PRIVACY</strong></p>
  <p>Please review our <a href="privacy.php">Privacy Policy</a>, which also governs your visit to MyCoinOrganizer.com, to understand our privacy practices.</p>
  <p><strong>ELECTRONIC COMMUNICATIONS</strong></p>
  <p>When you visit MyCoinOrganizer.com or send e-mails to us, you are communicating with us electronically. You consent to receive communications from us electronically. We will communicate with you by e-mail or by posting notices on this site. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.</p>
  <p><strong>COPYRIGHT</strong></p>
  <p>Unless otherwise stated, all content included on this site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of MyCoinOrganizer or its suppliers and protected by United States and international copyright laws. The compilation of all content on this site is the exclusive property of MyCoinOrganizer and protected by U.S. and international copyright laws.</p>
  <p><strong>LICENSE AND SITE ACCESS</strong></p>
  <p>MyCoinOrganizer grants you a limited license to access and make personal use of this site and not to download (other than page caching) or modify it, or any portion of it, except with express written consent of MyCoinOrganizer. This license does not include any resale or commercial use of this site or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this site or its contents; any downloading or copying of account information for the benefit of another merchant; or any use of data mining, robots, or similar data gathering and extraction tools. This site or any portion of this site may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of MyCoinOrganizer. You may not frame or utilize framing techniques to enclose any trademark, logo, or other proprietary information (including images, text, page layout, or form) of MyCoinOrganizer without express written consent. You may not use any meta tags or any other "hidden text" utilizing MyCoinOrganizer's name or trademarks without the express written consent of MyCoinOrganizer. Any unauthorized use terminates the permission or license granted by MyCoinOrganizer. You are granted a limited, revocable, and nonexclusive right to create a hyperlink to the home page of MyCoinOrganizer.com so long as the link does not portray MyCoinOrganizer, or its products or services in a false, misleading, derogatory, or otherwise offensive matter. You may not use any MyCoinOrganizer logo or other proprietary graphic or trademark as part of the link without express written permission.</p>
  <p><strong>YOUR ACCOUNT</strong></p>
  <p>If you use this site, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under your account or password. MyCoinOrganizer does sell products for children, but it sells them to adults, who can purchase with a credit card or other permitted payment method. If you are under 18, you may use MyCoinOrganizer.com only with involvement of a parent or guardian. MyCoinOrganizer reserves the right to refuse service, terminate accounts, remove or edit content, or cancel orders in their sole discretion.</p>
  <p><strong>REVIEWS, COMMENTS, COMMUNICATIONS, AND OTHER CONTENT</strong></p>
  <p>Visitors may post reviews so long as the content is not illegal, obscene, threatening, defamatory, invasive of privacy, infringing of intellectual property rights, or otherwise injurious to third parties or objectionable and does not consist of or contain software viruses, political campaigning, commercial solicitation, chain letters, mass mailings, or any form of "spam." You may not use a false e-mail address, impersonate any person or entity, or otherwise mislead as to the origin of the content. MyCoinOrganizer reserves the right (but not the obligation) to remove or edit such content, but does not regularly review posted content.</p>
  <p>If you do post content or submit material, and unless we indicate otherwise, you grant MyCoinOrganizer a nonexclusive, royalty-free, perpetual, irrevocable, and fully sublicensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content throughout the world in any media. You grant MyCoinOrganizer and sublicensees the right to use the name that you submit in connection with such content, if they choose. You represent and warrant that you own or otherwise control all of the rights to the content that you post; that the content is accurate; that use of the content you supply does not violate this policy and will not cause injury to any person or entity; and that you will indemnify MyCoinOrganizer for all claims resulting from content you supply. MyCoinOrganizer has the right but not the obligation to monitor and edit or remove any activity or content. MyCoinOrganizer takes no responsibility and assumes no liability for any content posted by you or any third party.</p>
  <p><strong>PRODUCT DESCRIPTIONS</strong></p>
<p>MyCoinOrganizer attempts to be as accurate as possible. However, MyCoinOrganizer does not warrant that product descriptions or other content of this site is accurate, complete, reliable, current, or error-free. If a product offered by MyCoinOrganizer is not as described, your sole remedy is to return it in unused condition.</p>
  <p><strong>DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY</strong></p>
<p>THIS SITE AND ALL INFORMATION, CONTENT, MATERIALS, PRODUCTS  AND SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE ARE PROVIDED BY MyCoinOrganizer ON AN "AS IS" AND "AS AVAILABLE" BASIS, UNLESS OTHERWISE SPECIFIED IN WRITING. MyCoinOrganizer MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE OPERATION OF THIS SITE OR THE INFORMATION, CONTENT, MATERIALS, PRODUCTS OR SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE, UNLESS OTHERWISE SPECIFIED IN WRITING. YOU EXPRESSLY AGREE THAT YOUR USE OF THIS SITE IS AT YOUR SOLE RISK.</p>
  <p>TO THE FULL EXTENT PERMISSIBLE BY APPLICABLE LAW, MyCoinOrganizer DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. MyCoinOrganizer DOES NOT WARRANT THAT THIS SITE; INFORMATION, CONTENT, MATERIALS, PRODUCTS OR SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE; THEIR SERVERS; OR E-MAIL SENT FROM MyCoinOrganizer ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. MyCoinOrganizer WILL NOT BE LIABLE FOR ANY DAMAGES OF ANY KIND ARISING FROM THE USE OF THIS SITE OR FROM ANY INFORMATION, CONTENT, MATERIALS, PRODUCTS OR SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE, INCLUDING, BUT NOT LIMITED TO DIRECT, INDIRECT, INCIDENTAL, PUNITIVE, AND CONSEQUENTIAL DAMAGES, UNLESS OTHERWISE SPECIFIED IN WRITING.</p>
  <p>CERTAIN STATE LAWS DO NOT ALLOW LIMITATIONS ON IMPLIED WARRANTIES OR THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES. IF THESE LAWS APPLY TO YOU, SOME OR ALL OF THE ABOVE DISCLAIMERS, EXCLUSIONS, OR LIMITATIONS MAY NOT APPLY TO YOU, AND YOU MIGHT HAVE ADDITIONAL RIGHTS.</p>
  <p><strong>APPLICABLE LAW</strong></p>
  <p>By visiting MyCoinOrganizer.com, you agree that the laws of the State of Ohio, without regard to principles of conflict of laws, will govern these Terms and Conditions and any dispute of any sort that might arise between you and MyCoinOrganizer.</p>
  <p><strong>DISPUTES</strong></p>
  <p>Any dispute relating in any way to your visit to MyCoinOrganizer.com or to products or services sold or distributed by MyCoinOrganizer or through MyCoinOrganizer.com shall be adjudicated in any state or federal court in Fairfax County, Virginia, and you consent to exclusive jurisdiction and venue in such courts.</p>
  <p><strong>SITE POLICIES, MODIFICATION, AND SEVERABILITY</strong></p>
  <p>We reserve the right to make changes to our site, policies, and these Terms and Conditions at any time. If any of these conditions shall be deemed invalid, void, or for any reason unenforceable, that condition shall be deemed severable and shall not affect the validity and enforceability of any remaining condition.</p>
	    </div>	
			  </div>
			<br>
			<fieldset>
			<table width="100%" border="0">
			  <tr>
			    <td width="5%"><input class="miniChk" id="termsBtn" name="Agree" type="checkbox" value="Agree"></td>
			    <td width="78%">I Agree To Terms</td>
			    <td width="17%">&nbsp;
                
                </td>
			  </tr>
			</table>
			<p><img src="img/captchaImg.jpg" width="100" height="50" alt="captcha"><br>
<input id="captchaImg" name="captchaImg" type="text" value="" /> 
Enter the text from above
</p>
			<input id="registerAccountBtn" name="registerAccountBtn" type="submit" value="Register" /> <span id="endErrorMsg" class="errorTxt"></span>
			<img src="img/progress.gif" alt="" name="waitComplete" width="200" height="30" align="absmiddle" id="waitComplete" />
			</fieldset>
	</form>
			</div>
            
            
            
            
                        
<p>&nbsp;</p>
<p><br class="clear" />
</p>
</div>

<?php include("inc/pageElements/frontFooter.php"); ?>
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>