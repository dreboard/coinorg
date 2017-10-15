<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

///////////////////////////THE POST
if (isset($_POST['newEventBtn'])) {
$eventTitle = mysql_real_escape_string($_POST['eventTitle']);
$eventStartTime = date("H:i:s", strtotime($_POST["eventStartTime"]));
$colorCode = mysql_real_escape_string($_POST['colorCode']);
$eventDescription = mysql_real_escape_string($_POST['eventDescription']);
$city = $collection->setToNone($_POST['city']);
$state = $collection->setToNone($_POST['state']);
$address = $collection->setToNone($_POST['address']);
$zip = $collection->setToNone($_POST['zip']);
$email = $collection->setToNone($_POST['email']);
$phone = $collection->setToNone($_POST['phone']);
$contact = $collection->setToNone($_POST['contact']);		

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
if($_POST['cost'] == ''){
	 $cost = '0.00';
	 } else {
	 $cost = mysql_real_escape_string($_POST['cost']);
}
$days = $Event->getDatesBetween2Dates($eventStartDate,$eventEndDate);

$sql = mysql_query("INSERT INTO event(userID, eventStartDate, eventEndDate, eventStartTime, eventEndTime, eventTitle, eventType, address, city, state, zip, phone, email, addedDate, eventDescription, eventAddedBy, seats, cost, colorCode, eventLevel) VALUES('$userID', '$eventStartDate', '$eventEndDate', '$eventStartTime', '$eventEndTime', '$eventTitle', '$eventType', '$address', '$city', '$state', '$zip', '$phone', '$email', '$theDate', '$eventDescription', '$userID', '$seats', '$cost', '$colorCode', '$eventLevel')") or die(mysql_error());
$eventID = mysql_insert_id();

switch($_POST['weekEnd']){
case '1':
$dayNumber = 1;
	foreach($days as $day){
		$Event->insertDealerDays($day, $eventStartTime, $eventEndTime, $eventID, $dayNumber++, $userID);
	}
	break;

 case '0':
 foreach($days as $day){
		$day_num = date("N", strtotime($day));
		$range = range($min='1', $max='5');
		if(in_array($day_num, $range)){
			$Event->insertDealerDays($day, $eventStartTime, $eventEndTime, $eventID, $dayNumber++, $userID);
		}
 }
		break;	 
}
$_SESSION['message'] = 'Event Saved';
header("location: dealerEventDisplay.php?ID=".$Encryption->encode($eventID)."");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
.calenderHdr {background-color:#333333; color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Dealer Calendar</h1>
<table width="100%" border="0">
  <tr>
    <td width="16%"><h3><a href="dealerClients.php">Clients</a></h3></td>
    <td width="16%"><h3><a href="delaerShows.php">Shows</a></h3></td>
    <td width="16%"><h3><a href="dealerCalendar.php">Calendar</a></h3></td>
    <td width="16%"><h3><a href="dealerInventory.php">Inventory</a></h3></td>
    <td width="16%"><h3><a href="dealerFinance.php">Finance</a></h3></td>
    <td><h3><a href="dealerNotes.php">Notebook</a></h3></td>
  </tr>
</table>
<hr />
<p><a href="dealerEventAll.php" class="brownLinkBold">All Events</a></p>
<form action="" name="newEventForm" id="newEventForm" method="post">
<span id="errorMsg" class="errorTxt"></span>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="right"><strong>
    <label for="eventTitle">Title</label>
  </strong></td>
  <td colspan="3"><input name="eventTitle" type="text" id="eventTitle" size="64" value="<?php if(isset($_POST["eventTitle"])){echo $_POST["eventTitle"];} else {echo "";}?>" /></td>
  </tr>
<tr>
  <td align="right"><strong>
    <label for="eventType">Event Type</label>
  </strong></td>
  <td colspan="3"><select name="eventType" id="eventType">
      <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="None" selected="selected">Choose</option>';}?>
    <option value="None" selected="selected">None</option>
    <option value="Client Meeting">Client Meeting</option>
    <option value="Club Meeting">Club Meeting</option>    
    <option value="Coin Show">Coin Show</option>
    <option value="Coin Club">Other</option>
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
  <td><input name="eventStartDate" type="text" id="eventStartDate" size="25" class="showDate" value="<?php if(isset($_POST["eventStartDate"])){echo $_POST["eventStartDate"];} else {echo "";}?>" /></td>
  <td><input type="text" name="eventEndDate" id="eventEndDate" class="showDate" value="<?php if(isset($_POST["eventEndDate"])){echo $_POST["eventEndDate"];} else {echo "";}?>" /></td>
  <td width="42%">Include Weekends
       <select name="weekEnd" id="weekEnd">
    <?php if(isset($_POST["weekEnd"])){echo '<option value="'.$_POST["weekEnd"].'" selected="selected">'.$_POST["weekEnd"].'</option>';} else {
		echo '<option value="1" selected="selected">Yes</option>';}?>
   <option value="1" selected="selected">Yes</option>         
  <option value="0">No</option>  
</select></td>
</tr>
<tr id="rangeColorRow">
  <td align="right"></td>
  <td colspan="2">Color Code Dates 
    <select name="colorCode" id="colorCode">
    <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="" selected="selected">Choose</option>';}?>    
  <option value="linkColor" selected="selected">Default</option>
  <option value="redLink">Red</option>
  <option value="greenLink">Green</option>
  <option value="blueLink">Blue</option>
</select></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="right"></td>
  <td width="21%"><label for="eventStartTime" id="eventStartTimeLbl"> <img src="../img/clockIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Start Time</label></td>
  <td width="24%"><label for="eventEndTime" id="eventEndTimeLbl"> <img src="../img/clockIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> End Time</label></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="right"></td>
  <td><input type="text" name="eventStartTime" id="eventStartTime" class="theTime" value="<?php if(isset($_POST["eventStartTime"])){echo $_POST["eventStartTime"];} else {echo "";}?>" /></td>
  <td><input type="text" name="eventEndTime" id="eventEndTime" class="theTime" value="<?php if(isset($_POST["eventEndTime"])){echo $_POST["eventEndTime"];} else {echo "";}?>" /></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="right" valign="top"><strong>
    <label>Description</label>
  </strong></td>
  <td colspan="3"><textarea name="eventDescription" id="eventDescription" cols="80" rows="5" class="wysiwyg"><?php if(isset($_POST["eventDescription"])){echo $_POST["eventDescription"];} else {echo "";}?></textarea></td>
  </tr>
<tr>
  <td align="right" valign="top"><label for="cost">Cost</label></td>
  <td colspan="3"><input name="cost" id="cost" type="text" value="<?php if(isset($_POST["cost"])){echo $_POST["cost"];} else {echo "";}?>" /></td>
</tr>

  </table>
  <h3><img src="../img/mapIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Location</h3>
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="right"><strong>Address</strong></td>
  <td colspan="3"><input name="address" type="text" id="address" size="100" value="<?php if(isset($_POST["address"])){echo $_POST["address"];} else {echo "";}?>"></td>
  </tr>
<tr>
  <td align="right"><strong>City</strong></td>
  <td colspan="3"><input type="text" name="city" id="city" value="<?php if(isset($_POST["city"])){echo $_POST["city"];} else {echo "";}?>" /></td>
  </tr>
<tr>
  <td align="right"><strong>State</strong></td>
  <td colspan="3"><select name="state" size="1">  
    <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="" selected="selected">Choose</option>';}?>
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
  <td><input name="zip" type="text" id="zip" size="10" maxlength="10" value="<?php if(isset($_POST["zip"])){echo $_POST["zip"];} else {echo "";}?>" /></td>
  <td colspan="2">&nbsp;</td>
  </tr>
<tr>
  <td align="right"><strong>Contact</strong></td>
  <td colspan="3"><input name="contact" type="text" id="contact" size="64" value="<?php if(isset($_POST["contact"])){echo $_POST["contact"];} else {echo "";}?>" /></td>
  </tr>
<tr>
  <td align="right"><strong>Email</strong></td>
  <td colspan="3"><input name="email" type="text" id="email" size="64" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} else {echo "";}?>" /></td>
  </tr>
<tr>
  <td align="right"><strong>Phone</strong></td>
  <td colspan="2"><input name="phone" type="text" id="phone" size="20" value="<?php if(isset($_POST["phone"])){echo $_POST["phone"];} else {echo "";}?>" /></td>
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
<br />



<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>