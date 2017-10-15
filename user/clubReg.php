<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_POST["addCoinFormBtn"])) { 

$clubName = mysql_real_escape_string($_POST["clubName"]);
$clubType = mysql_real_escape_string($_POST["clubType"]);
$clubAddress = mysql_real_escape_string($_POST["clubAddress"]);
$clubCity = mysql_real_escape_string($_POST["clubCity"]); 
$clubState = mysql_real_escape_string($_POST["clubState"]);
$clubZip = mysql_real_escape_string($_POST["clubZip"]);
$clubPhone = mysql_real_escape_string($_POST["clubPhone"]);
$clubEmail = mysql_real_escape_string($_POST["clubEmail"]); 
$clubLevel = mysql_real_escape_string($_POST["clubLevel"]); 
$clubDescription = mysql_real_escape_string($_POST["clubDescription"]);

mysql_query("INSERT INTO coinclub(clubName, clubType, clubAddress, clubCity, clubState, clubZip, clubPhone, clubEmail, clubDescription, enterDate, userID, clubLevel) VALUES('$clubName', '$clubType', '$clubAddress', '$clubCity', '$clubState', '$clubZip', '$clubPhone', '$clubEmail', '$clubDescription', '$theDate', '$userID', '$clubLevel')") or die(mysql_error()); 

$coinClubID = mysql_insert_id();



$From = "admin@mycoinorganizer.com";
$Subject = 'New Club Request';
$Message = '<table width="100%" border="0">
  <tr>
    <td width="42%"><img src="http://mycoinorganizer.com/img/mailLogo.jpg" width="207" height="113" /></td>
    <td width="54%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
	<h1>New Club Request</h1>
	<p style="margin-bottom:3px;">You have a new club request.  Please go to the <a href="http://mycoinorganizer.com/login.php">The Login Page</a> and review the details.</p>
	</td>
  </tr>
  <tr style="background-color:#999999;">
        <td colspan="3" style="padding:10px;"><a style="text-decoration:none; color:#000000;" href="mycoinorganizer.com">My Coin Organizer</a></td>
  </tr>
</table>';


  $mail->AddReplyTo('admin@mycoinorganizer.com', 'Admin');
  $mail->AddAddress('admin@mycoinorganizer.com', 'Admin');
  $mail->SetFrom($clubEmail, 'Requestor');
  $mail->AddReplyTo('admin@mycoinorganizer.com', 'Admin');
  $mail->Subject = 'New Club Request';
  $mail->AltBody = 'New club request'; 
  $mail->MsgHTML($Message);
  $mail->Send();
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  header("location: clubRegRequest.php?coinClubID=$coinClubID");
}


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin Club</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	


$("#addCoinForm").submit(function() {
      if ($("#clubName").val() == "") {
		$("#errorMsg").text("Please assign the todo");
		$("#clubName").addClass("errorInput");
		$("label[for='clubName']").addClass("errorTxt");
		$("#waitComplete").hide();
        return false;
    }else if ($("#clubAddress").val() == "") {
	  $("#clubAddress").addClass("errorInput");
	  $("#errorMsg").text("Enter address");
	  $("label[for='clubAddress']").addClass("errorTxt");
	  $("#waitComplete").hide();
	  return false;
	}else if ($("#clubCity").val() == "") {
	  $("#clubCity").addClass("errorInput");
	  $("#errorMsg").text("Enter city");
	  $("label[for='clubCity']").addClass("errorTxt");
	  $("#waitComplete").hide();
	  return false;
	}else if ($("#clubState").val() == "") {
	  $("#clubState").addClass("errorInput");
	  $("#errorMsg").text("Enter state");
	  $("label[for='clubState']").addClass("errorTxt");
	  $("#waitComplete").hide();
	  return false;
	}else if ($("#clubZip").val() == "") {
	  $("#clubZip").addClass("errorInput");
	  $("#errorMsg").text("Enter zip code");
	  $("label[for='clubZip']").addClass("errorTxt");
	  $("#waitComplete").hide();
	  return false;
	}else if ($("#clubPhone").val() == "") {
	  $("#clubPhone").addClass("errorInput");
	  $("#errorMsg").text("Enter phone");
	  $("label[for='clubPhone']").addClass("errorTxt");
	  $("#waitComplete").hide();
	  return false;
	}else if ($("#clubEmail").val() == "") {
	  $("#clubEmail").addClass("errorInput");
	  $("#errorMsg").text("Enter Email");
	  $("label[for='clubEmail']").addClass("errorTxt");
	  $("#waitComplete").hide();
	  return false;
	}else {
		$( "#waitComplete").show();
		return true;
		}
});


	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Add A Coin Club Request</h1>
  <div class="roundedWhite">
  <p>To start a club</p>
  <ol>
  <li>The coin club must already be established.</li>
  <li>Club must have an address, phone number and email.</li>
  <li></li>  
  <li></li>
  <li></li>
  </ol>
  </div>
  <br />
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<div id="addCoinDiv">
  
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="178" class="darker"><label for="clubName">Club Name</label></td>
    <td width="779"><input name="clubName" type="text" id="clubName" size="70" /></td>
  </tr>
  <tr>
    <td class="darker">Club Type</td>
    <td><select id="clubType" name="clubType">
      <option value="Business" selected="selected">Business</option>
      <option value="Proof">Proof</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="clubAddress">Address</label></td>
    <td><label for="slabLabel"></label>
      <input name="clubAddress" type="text" id="clubAddress" size="70" /></td>
  </tr>
  <tr>
    <td class="darker"><label for="clubCity">City</label></td>
    <td><input name="clubCity" type="text" id="clubCity" value="" size="70" /></td>
  </tr>
  <tr>
    <td class="darker"><label for="clubState">State</label></td>
    <td><select name="clubState" size="1" id="clubState">
   <option value="" selected="selected">Select State</option> 
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
</select></td>
  </tr>
  <tr>
    <td class="darker"><label for="clubZip">Zip</label></td>
    <td><input type="text" name="clubZip" id="clubZip" /></td>
  </tr>
  <tr>
    <td><strong><label for="clubPhone">Phone</label></strong></td>
    <td><input type="text" name="clubPhone" id="clubPhone" /></td>
  </tr>
  <tr>
    <td><span class="darker"><label for="clubEmail">Club E-Mail</label></span></td>
    <td><input type="text" name="clubEmail" id="clubEmail" /></td>
  </tr>
  <tr>
    <td><span class="darker">Web Site</span></td>
    <td><input name="clubWebsite" type="text" id="clubWebsite" /></td>
  </tr>
  <tr>
    <td><strong>Logo</strong></td>
    <td><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td valign="top"><span class="darker">Club Description</span></td>
    <td><textarea name="clubDescription" id="clubDescription" class="wideTxtarea" cols="" rows="12"></textarea></td>
  </tr>
  <tr>
    <td class="darker">View Level</td>
    <td><select id="clubLevel" name="clubLevel">
      <option value="public" selected="selected">Public</option>
      <option value="private">Private</option>
    </select></td>
  </tr>
  <tr>
    <td valign="bottom"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
    <td>&nbsp;
      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Club" />
      <img src="../img/progress.gif" name="waitComplete" width="200" height="30" align="absmiddle" id="waitComplete" /></td>
  </tr>
</table>
</form>
</div>


<div class="spacer"></div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
