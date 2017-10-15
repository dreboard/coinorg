<?php 
include 'inc/configSite.php';

	
/////////////////////////////////////////////////// REGISTER//////////////////////////////////////////////////////////////////
if(isset($_POST["registerAccountBtn"])){
$username = mysql_real_escape_string($_POST['username']);

if(!$User->checkUsername($username)){
$password = mysql_real_escape_string($_POST['password']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);
if($_POST["website"] == ""){
	$website = "None";
	} else {
	$website = mysql_real_escape_string($_POST['website']);
}
$question = mysql_real_escape_string($_POST['question']);
$answer = mysql_real_escape_string($_POST['answer']);
$viewLevel = mysql_real_escape_string($_POST['viewLevel']);
mysql_query("INSERT INTO user(username, firstname, lastname, email, password, website, question, answer, viewLevel, userDate) VALUES('$username', '$firstname', '$lastname', '$email', '$password', '$website', '$question', '$answer', '$viewLevel', '$theDate')") or die(mysql_error()); 

$userID = mysql_insert_id();
$User->sendWelcomeMail($userID, $email, $lastname, $firstname);

header("location: regSuccess.php");

  } else {
  $_SESSION['errorMsg'] = 'The username <strong>'.$username.'</strong> is already taken';
  } //End username check
}
else {
  $_SESSION['errorMsg'] = "Could not register account";
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
		  $(this).addClass("errorInput");
		  $(this).val() == ""
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
      }else if ($("#question").val() == "") {
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

#clientImg {height:200px; width:auto;}
#termsHolder  {height:150px; overflow:scroll; border:1px solid #333; padding: 5px; overflow-x: auto;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>

<div id="content" class="clear">
<div class="formsDiv" id="basicDiv">
			<img src="img/accountBasic.jpg" name="clientImg" align="left" id="clientImg" />
<p class="blueHdrTxt2">Basic Account Setup</p>
<br class="clear" />
<span><?php 
if(isset($_SESSION['errorMsg'])){
echo '<span class="errorTxt">'.addslashes($_SESSION['errorMsg']).'</span>'; 
} else {
echo ''; 
}
?>

</span>
<form name="memberRegForm" id="memberRegForm" method="post" action="">
<fieldset>
<table width="100%" border="0">
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
    <td><strong><label for="website">Website:</label></strong></td>
    <td>
      <input id="website" name="website" type="text" value="<?php if(isset($_POST["website"])){echo $_POST["website"];} else {echo "";}?>" />
    </td>
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


<table width="100%" border="0">
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
<p class="blueHdrTxt">Website Terms of Use</p>
<div id="termsHolder">
<div id="terms">
			   <p>This agreement between mycoinorganizer and <span class="clientName"></span>. As a network member, mycoinorganizer will connect various clients with contractor network members for emergency services if needed and repair work. <span class="clientName"></span>'s participation in the mycoinorganizer network will be legally bound and hereby agrees as follows:
				Contractor member agrees to maintain a good reputation with all policyholders and insurance carriers in reference to all business including but not limited to estimates, invoices, emails and all communications. If member were to intentionally or unintentionally misuse or fraud the policyholder or insurance representatives in any form may be temporarily or permanently removed from the network. mycoinorganizer will use its sole discretion in these decisions. 
			  Contractor member will carry all appropriate licenses and insurance to complete services being offered. Contractor member will also pull any permits required by local, state or federal laws.</p>
				
				<p>mycoinorganizer is intended to distribute policyholder members claims to contractors servicing there area but does not in any way guarantee that any certain type of claim or amount of claims will be received during any given period. Insurance claims tend to be weath related and contractor member understands that mycoinorganizer has not made any representations to this volume of work. Contractor members are always welcome to discuss upgrades or additional work with the policyholders. Contractor member should always have a signed work authorization prior to proceeding with work but will never ask for any portion of the deductible up front. Any balance of the deductible that is owed will be collected after job completion.
			  Contractor member agrees to follow any guidelines for timed requirements like contacting the policyholders. Member also understands that any payments due are solely the responsibility of the policyholder and the insurance company. </p>
				
				<p>Contractor member must pay for and complete background checks on any employees and any sub contractors that will be present on any job site related to a mycoinorganizer referral. If annual checks are not completed contractor may be immediately removed from the network.
				Contractor member shall define its coverage area by selecting zip codes in there account pages of their profile page. Member is solely responsible for maintaining and updating this section as they see fit including contact emails etc.
				Prior to receiving any referrals through the mycoinorganizer network, contractor will complete a brief tutorial ( trial run) wi a mycoinorganizer representative to ensure proper procedures. 
				mycoinorganizer has the right to raise or lower the annual fee or implement additional fees should it deem necessary. A 30 day notice would be given in the event changes are necessary. All concerns should be emailed to /////////@mycoinorganizer.com.
				All insurance must be current and in good standing including but not limited to general liability, pollution liability, automobile, workers compensation and any other policies needed. Member is responsible for providing proof to mycoinorganizer prior to full network activation as well as upon the annual renewal date. Not submitting this information timely can result in a temporary suspension from the network.
				Member agrees that is is capable of receiving and completing all requirements expressed within this agreement 24/7/365.  
			  </p>
				<p><span class="darker"> Indemnity:</span>  contractor member agrees it shall defend, indemnify and hold harmless mycoinorganizer, it's parent companies, affiliates, subsidiaries, employees, agents, directors, officers against any and all claims, suits,liabilities, attorney fees and any other monetary losses coming from or in relation to any referral given through the network.   If any court or jurisdiction were to award any damages against mycoinorganizer, that amount shall be limited to fees paid to mycoinorganizer as a part do this service agreement.
				mycoinorganizer shall use its sole discretion when determining needs for contractor members servicing zip codes. If mycoinorganizer notices Zip codes in need of additional contractors mycoinorganizer may contact contractor members in close areas to see if that member can extend there area.
			  In the event that any court were to find a certain portion of this agreement uninforceable then that direct portion will be declined but the remainder of this agreement shall remain in effect.</p>
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
			<br />
			<input id="registerAccountBtn" name="registerAccountBtn" type="submit" value="Register" /> <span id="endErrorMsg" class="errorTxt"></span>
			<img src="img/progress.gif" alt="" name="waitComplete" width="200" height="30" align="absmiddle" id="waitComplete" />
			</fieldset>
	</form>
			</div>
            
            
            
            
                        
<br class="clear" />
		</div>
<div class="spacer">&nbsp;</div>
<p><img src="img/faq.jpg" alt="Frequently asked questions" width="128" height="128" align="left"></p>
<p>&nbsp;</p>
<p><a href="contact.html">Contact Us</a></p>
</div>

</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>