<?php 
include '../inc/configSite.php';

if(isset($_GET['coinClubID'])) {  
	$coinClubID = intval($_GET['coinClubID']);
	$CoinClub->getClubById($coinClubID);
}
//checkEmail($email)	
/////////////////////////////////////////////////// REGISTER//////////////////////////////////////////////////////////////////
if(isset($_POST["registerAccountBtn"])){
$username = mysql_real_escape_string($_POST['username']);
$coinClubID = intval($_POST['coinClubID']);
if(!$User->checkUsername($username)){
	
$name = mysql_real_escape_string($_POST['name']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = mysql_real_escape_string($_POST['zip']);
$phone = mysql_real_escape_string($_POST['phone']);
$dealerEmail = mysql_real_escape_string($_POST['dealerEmail']);

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

if($_POST["dealerDescription"] == ""){
	$dealerDescription = "None";
	} else {
	$dealerDescription = mysql_real_escape_string($_POST['dealerDescription']);	
}
	
$password = mysql_real_escape_string($_POST['password']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);

$question = mysql_real_escape_string($_POST['question']);
$answer = mysql_real_escape_string($_POST['answer']);
$viewLevel = mysql_real_escape_string($_POST['viewLevel']);

if(!$User->checkEmail($email)){
mysql_query("INSERT INTO dealer(dealerName, dealerAddress, dealerCity, dealerState, dealerZip, dealerPhone, dealerEmail, dealerWebsite, dealerDescription, enterDate, ana, anaNum, png, pngNum) VALUES('$name', '$address', '$city', '$state', '$zip', '$phone', '$dealerEmail', '$website', '$dealerDescription', '$theDate', '$ana', '$anaNum', '$png', '$pngNum')") or die(mysql_error()); 
$dealerID = mysql_insert_id();

mysql_query("INSERT INTO user(username, firstname, lastname, email, password, website, question, answer, viewLevel, userDate, userType, dealerID) VALUES('$username', '$firstname', '$lastname', '$email', '$password', '$website', '$question', '$answer', '$viewLevel', '$theDate', 'dealer', '$dealerID')") or die(mysql_error()); 

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



else {
  $_SESSION['errorMsg'] = "Could not register account";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<?php include("../inc/scripts.php"); ?>
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
        $("#dealerMsg").text("Please enter your stores name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#name").addClass("errorInput");
        return false;
      }else if ($("#address").val() == "") {
        $("#dealerMsg").text("Please enter store address...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#address").addClass("errorInput");
        return false;
      }else if ($("#city").val() == "") {
        $("#dealerMsg").text("Please enter store city...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#city").addClass("errorInput");
        return false;
      } else if ($("#dealerEmail").val() == "") {
        $("#dealerMsg").text("Please enter store email..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#dealerEmail").addClass("errorInput");
        return false;
      }else if ($("#zip").val() == "") {
        $("#dealerMsg").text("Please enter store zip...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#zip").addClass("errorInput");
        return false;
      } else if ($("#ana").is(":checked") && $('#anaNum').val() == "") {
        $("#dealerMsg").text("Please enter ANA Number..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$('#anaNum').addClass("errorInput");
        return false;
      } else if ($("#png").is(":checked") && $('#pngNum').val() == "") {
        $("#dealerMsg").text("Please enter PNG Number..");
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
      } else if ($("#email").val() == "") {
        $("#infoMsg").text("Please enter your email..");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#email").addClass("errorInput");
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
      }else {
	  return true;
	  }
});	


$("input[type=text], select").click(function(){
	  $(this).removeClass("errorInput");
	  $("#endErrorMsg, #passMsg, #infoMsg, #dealerMsg").empty();
	  $("#waitComplete").hide();
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
});

$("#ana").click(function(){
	  $("#anaNum").removeClass("errorInput");
	  $("#dealerMsg").empty();
	  $("#waitComplete").hide();
});
$("#png").click(function(){
	  $("#pngNum").removeClass("errorInput");
	  $("#dealerMsg").empty();
	  $("#waitComplete").hide();
});


});
</script>  


<style type="text/css">
#dealerDescription {width:99%;}
#clientImg {height:200px; width:auto;}
#termsHolder  {height:150px; overflow:scroll; border:1px solid #333; padding: 5px; overflow-x: auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/header.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
    <h2 class="blueHdrTxt2">Coin Club Account Setup</h2>

<span><?php 
if(isset($_SESSION['errorMsg'])){
echo '<span class="errorTxt">'.addslashes($_SESSION['errorMsg']).'</span>'; 
} else {
echo ''; 
}
?>

</span><br class="clear" />
<form action="" method="post" enctype="multipart/form-data" name="memberRegForm" id="memberRegForm">
<fieldset>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3 class="hdrTxt">Club  Info</h3></td>
    <td colspan="3"><span id="dealerMsg" class="errorTxt"></span></td>
    </tr>
  <tr>
    <td width="15%"><strong>
    <label for="name">Club Name:</label></strong></td>
    <td colspan="2">
      <input name="name" type="text" id="name" value="<?php if(isset($_POST["name"])){echo $_POST["name"];} else {echo "";}?>" size="50" /></td>
    <td width="48%">&nbsp;</td>
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
      <select name="state"  id="dealerState">
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
    <td><strong><label for="dealerEmail"> Email:</label></strong></td>
    <td colspan="2">
      <input name="dealerEmail" type="text" id="dealerEmail" value="<?php if(isset($_POST["dealerEmail"])){echo $_POST["dealerEmail"];} else {echo "";}?>" size="50" />
   </td>
    <td></td>
  </tr>
  <tr>
    <td><strong>
      <label for="dealerPhone"> Phone:</label></strong></td>
    <td colspan="2">
      <input name="phone" type="text" id="dealerPhone" value="<?php if(isset($_POST["dealerPhone"])){echo $_POST["dealerPhone"];} else {echo "";}?>" size="50" />
   </td>
    <td></td>
  </tr>
  <tr>
    <td><strong><label for="website">Website:</label></strong></td>
    <td colspan="2">
      <input name="website" type="text" id="website" value="<?php if(isset($_POST["website"])){echo $_POST["website"];} else {echo "";}?>" size="50" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Club Logo</strong></td>
    <td colspan="2"><input type="file" name="file" id="file"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>ANA Member:</strong></td>
    <td width="7%"><input id="ana" name="ana" type="checkbox" value="1"  />
      Yes</td>
    <td width="30%"># 
      <input name="anaNum" type="text" id="anaNum" value="<?php if(isset($_POST["anaNum"])){echo $_POST["anaNum"];} else {echo "";}?>" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>PNG Member:</strong></td>
    <td width="7%"><input id="png" name="png" type="checkbox" value="1"  />
      Yes</td>
    <td width="30%"># 
      <input name="pngNum" type="text" id="pngNum" value="<?php if(isset($_POST["pngNum"])){echo $_POST["pngNum"];} else {echo "";}?>" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Description:</strong></td>
    <td colspan="3" rowspan="2"><textarea name="dealerDescription" id="dealerDescription" cols="45" rows="5"></textarea></td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
  
</table>
<hr>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3 class="hdrTxt">Contact Info</h3></td>
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
<p class="blueHdrTxt">&nbsp;</p>
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
			<img src="../img/progress.gif" alt="" name="waitComplete" width="200" height="30" align="absmiddle" id="waitComplete" />
			</fieldset>
	</form>
			</div>
            
            
            
            
                        
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</div><!--End container-->
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>