<?php 
include "../inc/config.php";
include_once "../inc/pageElements/logSession.php";
include_once "../inc/facebook/src/facebook.php";
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);
///////////////////////////THE POST
if (isset($_POST['newEventBtn'])) {
$coinClubID = $User->getCoinClubID();
$eventTitle = mysql_real_escape_string($_POST['eventTitle']);
$eventStartTime = date("H:i:s", strtotime($_POST["eventStartTime"]));
$colorCode = mysql_real_escape_string($_POST['colorCode']);
$eventDescription = mysql_real_escape_string($_POST['eventDescription']);

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

$sql = mysql_query("INSERT INTO event(coinClubID, eventStartDate, eventEndDate, eventStartTime, eventEndTime, eventTitle, eventType, address, city, state, zip, addedDate, eventDescription, eventAddedBy, seats, cost, colorCode, gallery, speaker) VALUES('$coinClubID', '$eventStartDate', '$eventEndDate', '$eventStartTime', '$eventEndTime', '$eventTitle', '$eventType', '$address', '$city', '$state', '$zip', '$theDate', '$eventDescription', '$userID', '$seats', '$cost', '$colorCode', '$gallery', '$speaker')") or die(mysql_error());
$eventID = mysql_insert_id();


if($gallery == '1'){
$albumName = mysql_real_escape_string($_POST['eventTitle']);
$albumDescription = '';
$sql = mysql_query("INSERT INTO album(albumName, albumDescription, coinClubID, userID, eventID) VALUES('$albumName', '$albumDescription', '$coinClubID', '$userID', '$eventID')") or die(mysql_error()); 
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
header("location: eventDisplay.php?ID=".$Encryption->encode($eventID)."");
exit();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//facebook events



$app_id = "470818899631048";
$app_secret = "f44f3691c4b79fe9d0c3c99b5f4f916e";
$my_url = $_SERVER['PHP_SELF'];
if (isset($_POST['fbEventBtn'])) {
$code = $_REQUEST["code"];

if(empty($code)) {
	$auth_url = "http://www.facebook.com/dialog/oauth?client_id="
	. $app_id . "&redirect_uri=" . urlencode($my_url)
	. "&scope=create_event";
	echo("<script>top.location.href='" . $auth_url . "'</script>");
}

$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
. $app_id . "&redirect_uri=" . urlencode($my_url)
. "&client_secret=" . $app_secret
. "&code=" . $code;
$access_token = file_get_contents($token_url);

$event_url = "https://graph.facebook.com/me/events?" . $access_token;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" href="http://mycoinclub.net76.net/js/jquery-ui.css" />
<script src="http://mycoinclub.net76.net/js/jquery.js"></script>
<script src="http://mycoinclub.net76.net/js/jquery-ui.js"></script>
<script type="text/javascript" src="http://mycoinclub.net76.net/js/jquery.ptTimeSelect.js"></script>
<link rel="stylesheet" type="text/css" href="http://mycoinclub.net76.net/js/jquery.ptTimeSelect.css"/>

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


$("#sameAdd").click(function() {
$("#address").val("<?php echo $CoinClub->getClubAddress(); ?>");
$("#city").val("<?php echo $CoinClub->getClubCity(); ?>");
//$("#state").val("<?php echo $CoinClub->getClubState(); ?>");
$("#zip").val("<?php echo $CoinClub->getClubZip(); ?>");

});

});
</script>  


<style type="text/css">
a {text-decoration:none;}
.linkColor {color:#996600;}
.redLink {color:#900;}
.blueLink {color:#009;}
.greenLink {color:#090;}
.calendar {border-collapse:collapse;}


#faceEvent label {float: left; width: 100px;}
#faceEvent input[type=text],textarea {width: 210px;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36867554-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
<h2>New Event</h2>

<div id="faceEvent">
<form enctype="multipart/form-data" action="<?php echo $event_url; ?>" method="post">
	<p><label for="name">Event Name</label><input type="text" name="name" value="" /></p>
	<p><label for="description">Event Description</label><textarea name="description"></textarea></p>
	<p><label for="location">Location</label><input type="text" name="location" value="" /></p>
	<p><label for="">Start Time</label><input type="text" name="start_time" value="<?php echo date('Y-m-d H:i:s'); ?>" /></p>
	<p><label for="end_time">End Time</label><input type="text" name="end_time" value="<?php echo date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))); ?>" /></p>
	<p><label for="picture">Event Picture</label><input type="file" name="picture" /></p>
	<p>
		<label for="privacy_type">Privacy</label>
		<input type="radio" name="privacy_type" value="OPEN" checked='checked'/>Open&nbsp;&nbsp;&nbsp;
		<input type="radio" name="privacy_type" value="CLOSED" />Closed&nbsp;&nbsp;&nbsp;
		<input type="radio" name="privacy_type" value="SECRET" />Secret&nbsp;&nbsp;&nbsp;
	</p>
	<p><input name="fbEventBtn" type="submit" value="Create Event" /></p>
</form>

</div>


<p>&nbsp;</p>
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

</div>                
</div>
</div>
<?php include("../inc/pageElements/footerClub.php"); ?>
</div><!--End container-->
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>