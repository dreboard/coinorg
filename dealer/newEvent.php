<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

	function insertDays($eventDay, $eventStartTime, $eventEndTime, $eventID, $dayNumber) {
    $sql = mysql_query("INSERT INTO eventDays(eventDay, eventStartTime, eventEndTime, dayNumber, eventID) VALUES('$eventDay', '$eventStartTime', '$eventEndTime', '$dayNumber', '$eventID')") or die(mysql_error());
}
	
	
	
	if (isset($_POST['newEventBtn'])) {
		$eventStartDate = date("Y-m-d",strtotime($_POST["eventStartDate"]));
		$eventStartTime = date("H:i:s", strtotime($_POST["eventStartTime"]));
		$eventEndTime = date("H:i:s", strtotime($_POST["eventEndTime"]));
		
		if($_POST['eventEndDate'] == ''){
			 $eventEndDate = $eventStartDate;
			 $multiDay = '0';
			 } else {
			 $eventEndDate = date("Y-m-d",strtotime($_POST["eventEndDate"]));
			 $multiDay = '1';
		}

		$eventTitle = mysql_real_escape_string($_POST['eventTitle']);
		$eventDescription = mysql_real_escape_string($_POST['eventDescription']);
		$city = mysql_real_escape_string($_POST['city']);
		$state = mysql_real_escape_string($_POST['state']);
		$address = mysql_real_escape_string($_POST['address']);
		$zip = mysql_real_escape_string($_POST['zip']);
		$company = mysql_real_escape_string($_POST['company']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$seats = mysql_real_escape_string($_POST['seats']);
		$cost = mysql_real_escape_string($_POST['cost']);
		$contact = mysql_real_escape_string($_POST['contact']);
		$colorCode = mysql_real_escape_string($_POST['colorCode']);
		if($_POST['seats'] == ''){
			 $seats = '999';
			 } else {
				$seats = mysql_real_escape_string($_POST['seats']);
		}
		
		if($_POST['cost'] == ''){
			 $cost = 'Free';
			 } else {
				$cost = mysql_real_escape_string($_POST['cost']);
		}
				
		$sql = mysql_query("INSERT INTO event(eventStartDate, eventStartTime, eventEndTime, eventEndDate, eventTitle, eventType, company, address, addedDate, eventDescription, eventAddedBy, seats, cost, email, phone, contact, colorCode, multiDay) VALUES('$eventStartDate', '$eventStartTime', '$eventEndTime', '$eventEndDate', '$eventTitle', '$eventType', '$company', '$address', '$theDate', '$eventDescription', '$userID', '$seats', '$cost', '$email','$phone','$contact', '$colorCode', '$multiDay')") or die(mysql_error());
	$eventID = mysql_insert_id();
		
		$days = $Calendar->getDatesBetween2Dates($eventStartDate,$eventEndDate);
		switch($_POST['weekEnd']){
		case '1':
		$dayNumber = 1;
			foreach($days as $day){
				insertDays($day, $eventStartTime, $eventEndTime, $eventID, $dayNumber++);
			}
			break;
		
		 case '0':
		 foreach($days as $day){
				$day_num = date("N", strtotime($day));
				$range = range($min='1', $max='5');
				if(in_array($day_num, $range)){
					insertDays($day, $eventStartTime, $eventEndTime, $eventID, $dayNumber++);
				}
		 }
				break;	 
		}
		
		
		
		if($_FILES['file']['tmp_name']) {
		  $upload = new Upload();
		  $upload->SetFileName(str_replace("-", "_", $eventStartDate).str_replace(" ", "_", $_FILES['file']['name']));
		  $upload->SetTempName(str_replace(" ", "_", $_FILES['file']['tmp_name']));
		  $upload->SetUploadDirectory("../upload/event/");
		  /*$upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png', 'pdf', 'txt', 'doc', 'docx', 'zip', 'ppt', 'xls', 'odt', 'odp', 'ods', 'odc', 'odb')); */
		  $upload->SetMaximumFileSize(3000000); 
		  echo $upload->UploadFile();
		  
		  $fileName = str_replace("-", "_", $eventStartDate).str_replace(" ", "_", $_FILES['file']['name']);
		  mysql_query("UPDATE event SET fileName = '$fileName' WHERE eventID = '$eventID'") or die(mysql_error()); 

}		

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script>
$(document).ready(function(){
//MEMBER SIGNUP
$("#goldForm").submit(function() {
      if ($("#first").val() == "") {
        $("#infoMsg").text("Please enter your first name...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#first").addClass("errorInput");
        return false;
      }else if ($("#last").val() == "") {
        $("#infoMsg").text("Please enter your last name...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#last").addClass("errorInput");
        return false;
      } else if ($("#phone").val() == "") {
        $("#infoMsg").text("Please enter a contact number..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#phone").addClass("errorInput");
        return false;
      }else if ($("#clientAddress").val() == "") {
        $("#locMsg").text("Please enter location address...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#clientAddress").addClass("errorInput");
        return false;
      }else if ($("#clientCity").val() == "") {
        $("#locMsg").text("Please enter a city...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#clientCity").addClass("errorInput");
        return false;
      }else if ($("#clientZip").val() == "") {
        $("#locMsg").text("Please enter a zip...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#clientZip").addClass("errorInput");
        return false;
      }else if ($("#cardNumber").val().length < 13) {
        $("#ccMsg").text("Please check card number...");
		$("#endErrorMsg").text("There are credit card errors... Scroll up to fix");
		$("#cardNumber").addClass("errorInput");
        return false;
      }else if ($("#securityCode").val().length < 3) {
        $("#ccMsg").text("Check your security code...");
		$("#endErrorMsg").text("There are credit card errors... Scroll up to fix");
		$("#securityCode").addClass("errorInput");
        return false;
      }else if ($("#password").val() == "") {
        $("#passwordMsg").text("Please Enter Your Password...");
        $("#endErrorMsg").text("There are password errors... Scroll up to fix");
		$("#password").addClass("errorInput");
        return false;
      }else if ($("#verify_password").val() == "") {
        $("#passwordMsg").text("Please Verify Your Password...");
        $("#endErrorMsg").text("There are password errors... Scroll up to fix");
		$("#verify_password").addClass("errorInput");
        return false;
      }else if ($("#password").val() !== $("#verify_password").val()) {
        $("#passwordMsg").text("Your Passwords Are Not The Same...");
        $("#endErrorMsg").text("There are password errors... Scroll up to fix");
        $("#password").addClass("errorInput");
		$("#verify_password").addClass("errorInput");
        return false;
      }else {
	  return true;
	  }
});	


});
</script>  
        <style type="text/css">
		.topAlign {vertical-align: top;}
		#address {width:418px; height:100px;}
		</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1> New Calendar Event</h1>
<span id="errorMsg" class="errorTxt">&nbsp;</span>
<form action="" method="post" enctype="multipart/form-data" id="newEventForm">
<h2>Event Details</h2>
<table width="700" border="0" cellspacing="0" class="eventEnterTbl">
<tr>
<td width="16%" align="right"><strong>
<label for="eventTitle" id="eventTitleLbl">Title</label>
</strong></td>
<td colspan="3">
<input name="eventTitle" type="text" id="eventTitle" size="64" /></td>
</tr>
<tr>
<td align="right"><strong>
  <label for="eventStartDate" id="eventStartDateLbl">Event Date</label>
</strong></td>
<td width="28%"><input name="eventStartDate" type="text" id="eventStartDate" class="showDate" /></td>
<td width="14%" align="right"><label for="eventEndDate" id="eventEndDateLbl"><strong>End Date</strong></label></td>
<td width="42%"><input name="eventEndDate" type="text" id="eventEndDate" class="showDate" /></td>
</tr>
<tr>
<td align="right"><strong>
  <label for="eventStartTime" id="eventStartTimeLbl"> Start Time</label>
</strong></td>
<td><input name="eventStartTime" type="text" class="theTime" id="eventStartTime" /></td>
<td align="right"><label for="eventEndTime" id="eventEndTimeLbl"><strong>End Time</strong></label></td>
<td><input name="eventEndTime" type="text" class="theTime" id="eventEndTime" /></td>
</tr>
<tr>
<td align="right"><strong>
  <label for="colorCode" id="colorCodeLbl">Color Code</label>
</strong></td>
<td><select name="colorCode" id="colorCode">
<option value="linkColor" selected="selected">Default</option>
<option value="redLink">Red</option>
<option value="greenLink">Green</option>
<option value="blueLink">Blue</option>
</select></td>
<td colspan="2">*Include Weekends
<input name="weekEnd" type="radio" id="weekEnd" value="1" checked="checked" />
<label for="weekEnd">Yes </label>
<input name="weekEnd" type="radio" id="weekEnd2" value="0" />
<label for="weekEnd2">No </label></td>
</tr>
<tr>
<td align="right">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">(*Date span only)</td>
</tr>
<tr>
<td align="right"><strong>
  <label for="company">Icon </label>
</strong></td>
<td colspan="3"><select name="colorCode2" id="colorCode2">
  <option value="linkColor" selected="selected">None</option>
  <option value="redLink">Red</option>
  <option value="greenLink">Green</option>
  <option value="blueLink">Blue</option>
</select></td>
</tr>
<tr>
<td align="right" class="topAlign"><strong>
<label for="address" id="addressLbl"> Address</label>
</strong></td>
<td colspan="3">
<textarea name="address" id="address"></textarea>                        </td>
</tr>

<tr>
<td align="right" valign="top"><strong>
  <label>State</label>
</strong></td>
<td colspan="3"><select name="state" size="1">
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
</tr>
<tr>
<td align="right" valign="top"><strong>
  <label>Zip</label>
</strong></td>
<td colspan="3"><input type="text" name="zip" id="zip" /></td>
</tr>
<tr>
<td align="right" valign="top"><strong>
  <label for="file">Attach File</label>
</strong></td>
<td colspan="3"><label for="file"></label>
<input type="file" name="file" id="file"></td>
</tr>
</table>
<br>

<h2>Event Description</h2>
<div class="textareaHolder"><textarea name="eventDescription" id="eventDescription" rows="10" class="wysiwyg"><?php echo $Event->getEventDescription(); ?></textarea></div><br>

<h2>Contact Information</h2>
<table width="620" border="0" cellspacing="0" class="eventEnterTbl">                             
<tr>
<td align="right"><label for="contact">Contact</label></td>
<td><input name="contact" type="text" id="contact" size="64" /></td>
</tr>
<tr>
<td align="right"><label for="phone">Phone</label></td>
<td><input name="phone" type="text" id="phone" size="64" /></td>
</tr>
<tr>
<td align="right"><label for="email">Email</label></td>
<td><input name="email" type="text" id="email" size="64" /></td>
</tr>
<tr>
<td align="right"><label for="seats">Seats</label></td>
<td><input type="text" name="seats" id="seats" /></td>
</tr>
<tr>
<td align="right"><label for="cost">Cost</label></td>
<td><input type="text" name="cost" id="cost" /></td>
</tr>

<tr>
<td>&nbsp;</td>
<td><label>
<input type="submit" name="newEventBtn" id="newEventBtn" value="Add This Event" />
</label></td>
</tr>
</table>
</form>


<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>