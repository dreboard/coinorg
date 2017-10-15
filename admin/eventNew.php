<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

///////////////////////////THE POST
if (isset($_POST['newEventBtn'])) {
$coinClubID = $User->getCoinClubID();
$eventTitle = mysql_real_escape_string($_POST['eventTitle']);
$eventStartTime = date("H:i:s", strtotime($_POST["eventStartTime"]));
$colorCode = mysql_real_escape_string($_POST['colorCode']);
$eventDescription = mysql_real_escape_string($_POST['eventDescription']);
$eventLevel = mysql_real_escape_string($_POST['eventLevel']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$address = mysql_real_escape_string($_POST['address']);
$zip = mysql_real_escape_string($_POST['zip']);
$email = mysql_real_escape_string($_POST['email']);
$phone = mysql_real_escape_string($_POST['phone']);
$contact = mysql_real_escape_string($_POST['contact']);		


$seats = '999';
$cost = '0.00';

$city = mysql_real_escape_string($_POST['city']);
		$state = mysql_real_escape_string($_POST['state']);
		$address = mysql_real_escape_string($_POST['address']);
		$zip = mysql_real_escape_string($_POST['zip']);

$eventStartDate = date("Y-m-d",strtotime($_POST["eventStartDate"]));
if($_POST['eventEndDate'] == ''){
	 $eventEndDate = $eventStartDate;
	 } else {
	 $eventEndDate = date("Y-m-d",strtotime($_POST["eventEndDate"]));
}
	
if($_POST['eventEndTime'] == ''){
	 $eventEndTime = $eventStartTime;
	 } else {
	 $eventEndTime = date("H:i:s", strtotime($_POST["eventEndTime"]));
}	
if($_POST['eventType'] == ''){
	 $eventType = 'General';
	 } else {
	 $eventType = mysql_real_escape_string($_POST['eventType']);
}
if($_POST['speaker'] == ''){
	 $speaker = 'None';
	 } else {
	 $speaker = mysql_real_escape_string($_POST['speaker']);
}

$gallery = intval($_POST['gallery']);
$days = $Event->getDatesBetween2Dates($eventStartDate,$eventEndDate);

$sql = mysql_query("INSERT INTO event(coinClubID, eventStartDate, eventEndDate, eventStartTime, eventEndTime, eventTitle, eventType, address, city, state, zip, addedDate, eventDescription, eventAddedBy, seats, cost, colorCode, gallery, speaker, eventLevel) VALUES('$coinClubID', '$eventStartDate', '$eventEndDate', '$eventStartTime', '$eventEndTime', '$eventTitle', '$eventType', '$address', '$city', '$state', '$zip', '$theDate', '$eventDescription', '$userID', '$seats', '$cost', '$colorCode', '$gallery', '$speaker', '$eventLevel')") or die(mysql_error());
$eventID = mysql_insert_id();


if($gallery == '1'){
$Event->createEventFolder($eventID);
}

switch($_POST['weekEnd']){
case '1':
$dayNumber = 1;
	foreach($days as $day){
		$Event->insertDays($day, $eventStartTime, $eventEndTime, $eventID, $coinClubID, $dayNumber++);
	}
	break;

 case '0':
 foreach($days as $day){
		$day_num = date("N", strtotime($day));
		$range = range($min='1', $max='5');
		if(in_array($day_num, $range)){
			$Event->insertDays($day, $eventStartTime, $eventEndTime, $eventID, $coinClubID, $dayNumber++);
		}
 }
		break;	 
}
$_SESSION['message'] = 'Event Saved';
header("location: eventDisplay.php?eventID=$eventID");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>New Event</title>
<script type="text/javascript">
$(document).ready(function(){	
$( ".showDate" ).datepicker();
$('.theTime').ptTimeSelect();

$("#newEventForm").submit(function() {
      if ($("#eventTitle").val() == "") {
		$("#eventTitle").addClass("errorInput");
        $("#errorMsg").text("Enter Title...");
        return false;
      }else if ($("#eventStartDate").val() == "") {
		$("#eventStartDate").addClass("errorInput");  
        $("#errorMsg").text("Enter Date...");
        return false;
      }else {
	 $('#newEventBtn').val("Adding Event.....");	  
	  return true;
	  }
});


});
</script>  


<style type="text/css">
a {text-decoration:none;}

.calendar {border-collapse:collapse;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h2>New Event</h2>
<form action="" name="newEventForm" id="newEventForm" method="post">
<span id="errorMsg" class="errorTxt"></span>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="right"><strong>
    <label for="eventTitle">Title</label>
  </strong></td>
  <td colspan="3"><input name="eventTitle" type="text" id="eventTitle" size="64" /></td>
  </tr>
<tr>
  <td align="right"><strong>View Level</strong></td>
  <td colspan="3"><select name="eventLevel" id="eventLevel">
    <option value="1" selected="selected">Admin</option>
    <option value="0">Site</option>
  </select></td>
</tr>
<tr>
  <td align="right"><strong>
    <label for="eventType">Event Type</label>
  </strong></td>
  <td colspan="3"><select name="eventType" id="eventType">
    <option value="Monthly Meeting" selected="selected">Monthly Meeting</option>
    <option value="Staff Meeting">Staff Meeting</option>
    <option value="Coin Show">Coin Show</option>
    <option value="Other">Other</option>
  </select></td>
</tr>
<tr>
  <td align="right"><strong>
    <label for="coinCategory">Topic</label>
  </strong></td>
  <td colspan="3"><select name="coinCategory">
  <option value="General" selected="selected">General</option>
  <option value="Half Cent">Half Cents</option>
  <option value="Large Cent">Large Cents</option>
  <option value="Small Cent">Small Cents</option>
  <option value="Two Cent">Two Cents</option>
  <option value="Three Cent">Three Cents</option>
  <option value="Half Dime">Half Dimes</option>
  <option value="Nickel">Nickels</option>
  <option value="Dime">Dimes</option>
  <option value="Twenty Cent">Twenty Cents</option>
  <option value="Quarter">Quarters</option>
  <option value="Half Dollar">Half Dollars</option>
  <option value="Dollar">Dollars</option>
  <option value="Commemorative">Commemoratives</option>
  <option value="Gold">Gold</option>
  <option value="Platinum">Platinum</option>
  <option value="Silver Eagle">Silver Eagles</option>
  </select></td>
</tr>
<tr>
  <td width="13%" align="right"><strong>
    <label for="eventStartDate">Dates</label>
  </strong></td>
  <td width="21%"><img src="../img/calendarIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Start Date</td>
  <td colspan="2"><img src="../img/calendarIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> End Date (leave blank if same)</td>
  </tr>
<tr>
  <td align="right"></td>
  <td><input name="eventStartDate" type="text" id="eventStartDate" size="25" class="showDate" /></td>
  <td><input type="text" name="eventEndDate" id="eventEndDate" class="showDate" /></td>
  <td width="42%">Include Weekends
    <input name="weekEnd" type="radio" id="weekEnd" value="1" checked="checked" />
    <label for="weekEnd">Yes </label>
    <input name="weekEnd" type="radio" id="weekEnd2" value="0" />
    <label for="weekEnd2">No </label></td>
</tr>
<tr id="rangeColorRow">
  <td align="right"></td>
  <td colspan="2">Color Code Dates 
    <select name="colorCode" id="colorCode">
  <option value="linkColor" selected="selected">Default</option>
  <option value="redLink">Red</option>
  <option value="greenLink">Green</option>
  <option value="blueLink">Blue</option>
</select></td>
  <td><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Create Album For Event 
    <input name="gallery" type="radio" id="gallery3" value="1" />
    <label for="gallery3">Yes </label>
    <input name="gallery" type="radio" id="gallery4" value="0" checked="checked" />
    <label for="gallery4">No </label></td>
</tr>
<tr>
  <td align="right"></td>
  <td width="21%"><label for="eventStartTime" id="eventStartTimeLbl"> <img src="../img/clockIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Start Time</label></td>
  <td width="24%"><label for="eventEndTime" id="eventEndTimeLbl"> <img src="../img/clockIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> End Time</label></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="right"></td>
  <td><input type="text" name="eventStartTime" id="eventStartTime" class="theTime" /></td>
  <td><input type="text" name="eventEndTime" id="eventEndTime" class="theTime" /></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="right" valign="top"><strong>
    <label>Description</label>
  </strong></td>
  <td colspan="3"><textarea name="eventDescription" id="eventDescription" cols="80" rows="5" class="wysiwyg"></textarea></td>
  </tr>
<tr>
  <td align="right"><strong>Speaker</strong></td>
  <td colspan="3"><input name="speaker" type="text" id="speaker" size="55" maxlength="55"></td>
  </tr>
  </table>
  <h3><img src="../img/mapIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Location</h3>
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
  <td colspan="4" align="left">
    <input id="sameAdd" type="checkbox" value="">
    Use Club Address</td>
  </tr>
<tr>
  <td align="right"><strong>Address</strong></td>
  <td colspan="3"><input name="address" type="text" id="address" size="100" value=""></td>
  </tr>
<tr>
  <td align="right"><strong>City</strong></td>
  <td colspan="3"><input type="text" name="city" id="city" /></td>
  </tr>
<tr>
  <td align="right"><strong>State</strong></td>
  <td colspan="3"><select name="state" size="1">  
  <option value="<?php echo $CoinClub->getClubState(); ?>" selected="selected"><?php echo $CoinClub->getClubState(); ?></option>
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
  </select></td>
  </tr>
<tr>
  <td align="right"><strong>Zip</strong></td>
  <td><input name="zip" type="text" id="zip" size="10" maxlength="10" /></td>
  <td colspan="2">&nbsp;</td>
  </tr>
<tr>
  <td align="right"><strong>Contact</strong></td>
  <td colspan="3"><input name="contact" type="text" id="contact" size="64" /></td>
  </tr>
<tr>
  <td align="right"><strong>Email</strong></td>
  <td colspan="3"><input name="email" type="text" id="email" size="64" /></td>
  </tr>
<tr>
  <td align="right"><strong>Phone</strong></td>
  <td colspan="2"><input name="phone" type="text" id="phone" size="20" /></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="right"></td>
  <td><input type="submit" name="newEventBtn" id="newEventBtn" value="Add Event" /></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
<br />
</form>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>