<?php 
include 'inc/config.php';

$captchaCode = 'the coin';

/////////////////////////////////////////////////// REGISTER//////////////////////////////////////////////////////////////////
if(isset($_POST["registerAccountBtn"])){
$captchaImg = strip_tags(strtolower($_POST['captchaImg']));
if($captchaImg !== $captchaCode){
	$_SESSION['errorMsg'] = 'Your captcha code is wrong<br/>';  
}	else {
$username = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['email']);
if(!$User->checkEmail($email)){
$password = mysql_real_escape_string($_POST['password']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);

$zip = mysql_real_escape_string($_POST['zip']);
if($_POST["website"] == ""){
	$website = "None";
	} else {
	$website = mysql_real_escape_string($_POST['website']);
}
if($_POST["youtube"] == ""){
	$youtube = "None";
	} else {
	$youtube = mysql_real_escape_string($_POST['youtube']);
}
if($_POST["ebayID"] == ""){
	$ebayID = "None";
	} else {
	$ebayID = mysql_real_escape_string($_POST['ebayID']);
}

$activateCode = $General->random_string(); 
$question = mysql_real_escape_string($_POST['question']);
$answer = mysql_real_escape_string($_POST['answer']);
$viewLevel = mysql_real_escape_string($_POST['viewLevel']);

$sql = mysql_query("INSERT INTO user(username, firstname, lastname, email, password, website, question, answer, viewLevel, userDate, ip, youtube, ebayID) VALUES('$username', '$firstname', '$lastname', '$email', '$password', '$website', '$question', '$answer', '$viewLevel', '$theDate', '".ip2long($_SERVER['REMOTE_ADDR'])."', '$youtube', '$ebayID')") or die(mysql_error()); 

$userID = mysql_insert_id();

$User->sendWelcomeMail($userID, $email, $lastname, $firstname);

header("location: regSuccess.php");
exit();
  } else {
  $_SESSION['errorMsg'] = '<p>The email address <strong>'.$email.'</strong> is already registered.<br />If you have lost your password go to <a href="forgotPass.php">Forgot my Password.</a></p>';
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
<title>Basic Account Setup</title>

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
		  $("#email").addClass("errorInput");
		  //$(this).val() == ""
	  }
 });
 
 function checkEmail(email) {
	  $.ajax({  //Make the Ajax Request
	 type: "GET",
	 url: "_ajax_check_email.php",  //file name
	 data: "email="+ email,  //data
	 success: function(server_response){
	 $("#emailChecker").html(server_response);
	 }
	 });
}
 
 
 
$("#checkUserBtn").click(function(){ 
$("#checkUserBtn").prop('value', 'Checking.......');
var username = $("#username").val();
$.ajax({  //Make the Ajax Request
 type: "GET",
 url: "_ajax_check_username.php",  //file name
 data: "username="+ username,  //data
 success: function(server_response){
 $("#availability_status").html(server_response);
 $("#checkUserBtn").prop('value', 'Check Availability');
 }
 });
 });



$("input[type=text]").click(function(){
	  $(this).removeClass("errorInput");
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
});


//MEMBER SIGNUP
$("#memberRegForm2").submit(function() {
      if ($("#firstname").val() == "") {
        $("#infoMsg").text("Please enter your firstname name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#firstname").addClass("errorInput");
        return false;
      }else if ($("#lastname").val() == "") {
        $("#infoMsg").text("Please enter your lastname name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#lastname").addClass("errorInput");
        return false;
      } else if ($("#email").val() == "") {
        $("#infoMsg").text("Please enter your email..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#email").addClass("errorInput");
        return false;
      }else if ($("#emailChecker").text() == "Email is not valid") {
        $("#infoMsg").text("Please enter a valid email..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#email").addClass("errorInput");
        return false;
      }else if ($("#emailChecker").text() == "Email is already registered.") {
        $("#infoMsg").text("Please enter another email address..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#email").addClass("errorInput");
        return false;
      }else if ($("#zip").val() == "") {
        $("#infoMsg").text("Please enter your zip..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#zip").addClass("errorInput");
        return false;
      }else if ($("#username").val() == "") {
        $("#infoMsg").text("Please enter your username..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#username").addClass("errorInput");
        return false;
      }else if ($("#availability_status").text() == "Already In Use") {
        $("#infoMsg").text("Please select another username..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#username").addClass("errorInput");
        return false;
      }else if ($("#password").val() == "") {
        $("#passMsg").text("Please Enter Your Password...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
        $("#endErrorMsg").text("There are password errors... Scroll up to fix");
		$("#password").addClass("errorInput");
        return false;
      }else if ($("#password").val().length < 8) {
        $("#passMsg").text("Please Enter An 8 Character Password...");
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
      }else if ($("#question").val() == "") {
        $("#passMsg").text("Please select a question...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("Select a security question");
		$("#question").addClass("errorInput");
        return false;
      }else if ($("#answer").val() == "") {
        $("#passMsg").text("Please enter your answer...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("Enter answer for security question");
		$("#answer").addClass("errorInput");
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
	  $("#endErrorMsg, #passMsg, #infoMsg").empty();
	  $("#waitComplete").hide();
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
});

});
</script>  


<style type="text/css">
.socIpt {width:100%;}
#clientImg {height:100px; width:auto;}
#termsHolder  {height:150px; overflow:scroll; border:1px solid #333; padding: 5px; overflow-x: auto;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<?php include("inc/pageElements/header.php"); ?>

<div id="content" class="clear">
<div class="formsDiv" id="basicDiv">
			<img src="siteImg/collector.jpg" name="clientImg" align="left" id="clientImg" />
    <h1 class="blueHdrTxt2">Basic Account Setup</h1>


<br class="clear" />
<span><?php 
if(isset($_SESSION['errorMsg'])){
echo '<span class="errorTxt">'.strip_tags($_SESSION['errorMsg'], '<a><br>').'</span>'; 
} else {
	 unset($_SESSION['errorMsg']);
echo ''; 
}
?>

</span>
<form name="memberRegForm" id="memberRegForm" method="post" action="">
<fieldset>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="3"><h3 class="hdrTxt">Personal Info (All Required)</h3>      
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span id="infoMsg" class="errorTxt">&nbsp;</span>&nbsp;</td>
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
      <input id="email" name="email" type="text" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} else {echo "";}?>" onBlur="checkEmail();" />
   </td>
    <td><span id="emailChecker"></span></td>
  </tr>
  <tr>
    <td><strong><label for="zip">Zip Code:</label></strong></td>
    <td>
      <input type="text" name="zip" id="zip" value="<?php if(isset($_POST["zip"])){echo $_POST["zip"];} else {echo "";}?>"></td>
    <td>&nbsp;</td>
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
<hr />
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="3"><h3 class="hdrTxt">Account Info (All Required)</h3>      </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span id="passMsg" class="errorTxt">&nbsp;</span>&nbsp;</td>
    </tr>
  <tr>
    <td width="18%"><strong>
      <label for="password">Password:</label></strong></td>
    <td width="39%"><input id="password" name="password" type="password" value="" /> 
     &nbsp; <span id="minPass">*min 8 characters</span></td>
    <td width="43%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="verify_password">Verify Password:</label></strong></td>
    <td><input id="verify_password" name="verify_password" type="password" value="" /></td>
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
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">* Private: No forum posts or ebay items displayed<br>
      * Public: User Page searchable and ebay items displayed</td>
    </tr>
</table>
<hr />

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="3"><h3 class="hdrTxt">Social Info (Not Required)</h3>      <span id="passMsg" class="errorTxt">&nbsp;</span></td>
    </tr>
  <tr>
    <td width="18%"><strong>
      
          <label for="password">Website:</label></strong></td>
    <td width="38%">www.<input name="website" type="text" id="website" value="<?php if(isset($_POST["website"])){echo $_POST["website"];} else {echo "";}?>" size="40" /></td>
    <td width="44%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="youtube">Youtube:</label></strong></td>
    <td><input class="socIpt" id="youtube" name="youtube" type="text" value="<?php if(isset($_POST["youtube"])){echo $_POST["youtube"];} else {echo "";}?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="ebayID">EbayID:</label></strong></td>
    <td><input class="socIpt" id="ebayID" name="ebayID" type="text" value="<?php if(isset($_POST["ebayID"])){echo $_POST["ebayID"];} else {echo "";}?>" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="3"><h3 class="hdrTxt">Collection Speciality (Required)</h3>      <span id="passMsg" class="errorTxt">&nbsp;</span></td>
    </tr>
  <tr>
    <td width="18%"><strong>
      
          
            <label for="password">What I Collect:</label></strong></td>
    <td width="38%"><select name="iCollect" id="iCollect">
        <option value="General" selected='selected'>No Speciality</option>
        <option value="Half_Cent">Half Cents</option>
        <option value="Large_Cent">Large Cents</option>
        <option value="Small_Cent">Small Cents</option>
        <option value="Two_Cent">Two Cents</option>
        <option value="Three_Cent">Three Cents</option>
        <option value="Half_Dime">Half Dimes</option>
        <option value="Nickels">Nickels</option>
        <option value="Dimes">Dime</option>
        <option value="Twenty_Cent">Twenty Cents</option>
        <option value="Quarter">Quarters</option>
        <option value="Half_Dollar">Half Dollars</option>
        <option value="Dollar">Dollars</option>
    </select></td>
    <td width="44%">&nbsp;</td>
  </tr>  
  <tr>
    <td><strong>
      <label for="ebayID">Other:</label></strong></td>
    <td><select name="iCollect2" id="iCollect2">
      <option value="None" selected='selected'>No Varieties/Errors</option>
      <option value="Double Die">Double Dies</option>
      <option value="Errors">Errors</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
</table>

<hr />
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="3"><h3 class="hdrTxt">My Club/Group (Not Required)</h3>      
    <span id="passMsg" class="errorTxt">&nbsp;</span></td>
    </tr>
  <tr>
    <td width="18%"><strong>
      
          
            <label for="password">Club/Group:</label></strong></td>
    <td width="38%"><select name="clubID" id="clubID">
        <option value="0" selected='selected'>No Club/Group Membership</option>
        <option value="Half_Cent">Half Cents</option>
        <option value="Large_Cent">Large Cents</option>
    </select></td>
    <td width="44%">&nbsp;</td>
  </tr>  
  <tr id="clubRow">
    <td><strong>
      <label for="clubCode">Meber Code:</label></strong></td>
    <td><input class="socIpt" id="clubCode" name="clubCode" type="text" value="<?php if(isset($_POST["clubCode"])){echo $_POST["clubCode"];} else {echo "";}?>" /></td>
    <td>* Code from your coin club/group</td>
  </tr>
</table>
</fieldset>

<h3 class="blueHdrTxt">Website Terms of Use</h3>
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
            

		</div>

<p>&nbsp;</p>
<p>&nbsp;</p>

</div>

<?php include("inc/pageElements/frontFooter.php"); ?>
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>