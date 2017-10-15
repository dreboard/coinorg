<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_POST['newEventBtn'])) {

if($_POST['eventTitle'] == ""){
	$_SESSION['message'] = '<div id="msgDiv" class="alert alert-danger">Enter Event Title</div>';
} else {
$eventTitle = mysql_real_escape_string($_POST['eventTitle']);

$eventDescription = mysql_real_escape_string($_POST['eventDescription']);
$city = $General->setToNone($_POST['city']);
$state = $General->setToNone($_POST['state']);
$address = $General->setToNone($_POST['address']);
$zip = $General->setToNone($_POST['zip']);

$eventStartDate = $General->setTheDate($_POST["eventStartDate"]);

if($_POST['eventEndDate'] == ''){
	 $eventEndDate = $eventStartDate;
	 } else {
	 $eventEndDate = $General->setTheDate($_POST["eventEndDate"]);
}

$eventStartTime = $General->setTheTime($_POST["eventStartTime"]);
$eventEndTime = 	$General->getEndTime($_POST["eventEndTime"], $eventStartTime);

$eventType = mysql_real_escape_string($_POST['eventType']);
$days = $Event->getDatesBetween2Dates($eventStartDate,$eventEndDate);

$sql = mysql_query("INSERT INTO event(eventStartDate, eventEndDate, eventStartTime, eventEndTime, eventTitle, eventType, address, city, state, zip, addedDate, eventDescription, eventAddedBy, gallery, userID) VALUES('$eventStartDate', '$eventEndDate', '$eventStartTime', '$eventEndTime', '$eventTitle', '$eventType', '$address', '$city', '$state', '$zip', '$theDate', '$eventDescription', '$userID', '1', '$userID')") or die(mysql_error());
$eventID = mysql_insert_id();

//Create gallery folder
if ( !file_exists($userID.'/event/'.$eventID) ) {
    mkdir($userID.'/event/'.$eventID, 0755, true);
}
$dayNumber = 1;
	foreach($days as $day){
		$Event->insertDays($day, $eventStartTime, $eventEndTime, $eventID, $coinClubID='0', $dayNumber++);
	}

header("location: eventDisplay.php?ID=".$Encryption->encode($eventID)."");

}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Create New Event</title>
<?php include("../headItems.php"); ?>
<link rel="stylesheet" type="text/css" href="../scripts/plugins/time/jquery.ui.timepicker.css">
<script type="text/javascript" src="../scripts/plugins/time/jquery.ui.timepicker.js"></script>
<script src="../scripts/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../scripts/site/events.js"></script>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">

<?php echo $_SESSION['message']; ?>

<div class="well well-lg  hidden-xs">
<h3 class="noMargin"><span class="glyphicon glyphicon-calendar"></span> Create New Event &nbsp;<a href="userCalendar.php" role="button" class="btn btn-default hidden-xs">Return to Calendar</a></h3>
</div>
<h3 class="noMargin visible-xs">Create New Event</h3>

<a href="userCalendar.php" class="btn btn-default visible-xs" role="button">Return to Calendar</a>
<form class="form-horizontal" role="form" id="eventForm" action="" method="post">
  
  <div class="form-group">
    <label for="eventTitle" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title..." value="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="eventType" class="col-sm-2 control-label">Event Type</label>
    <div class="col-sm-10">
      <select name="eventType" id="eventType" class="form-control">
      <option value="General" selected="selected">General Event</option>
    <option value="Monthly Meeting">Monthly Meeting</option>
    <option value="Staff Meeting">Staff Meeting</option>
    <option value="Coin Show">Coin Show</option>
    <option value="Other">Other</option>
  </select>
    </div>
  </div>



<div class="form-group">
<label for="eventTitle" class="col-sm-2 control-label  hidden-xs">Dates</label>
  <div class="col-xs-4">
    <input name="eventStartDate" type="text" class="form-control theDate" id="eventStartDate" placeholder="Day of event......." value=""><span class="help-block">Default is today.</span>
  </div>
  <div class="col-xs-4">
    <input name="eventEndDate" type="text" class="form-control theDate" id="eventEndDate" placeholder="End of event......." value=""><span class="help-block">Default is same as start.</span>
  </div>

</div>


<div class="form-group clearfix">
<label for="time" class="col-sm-2 control-label  hidden-xs">Times</label>
  <div class="col-xs-4">
    <input name="eventStartTime" type="text" class="form-control theTime" id="eventStartTime" placeholder="Start time......." value=""><span class="help-block">default 8:00 a.m..</span>
  </div>
  <div class="col-xs-4">
    <input name="eventEndTime" type="text" class="form-control theTime" id="eventEndTime" placeholder="End time......." value=""><span class="help-block">default is start + 2 hours.</span>
  </div>

</div>


  <div class="form-group clearfix">
    <label for="" class="col-sm-2 control-label">Optional Items</label>
    <div class="col-sm-10">


<div class="panel panel-default">
  <div class="panel-heading"> Location</div>
  <div class="panel-body">

  <div class="form-group">
    <label for="address" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address" placeholder="Address & street..." value="">
    </div>
  </div>


  <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" name="city" placeholder="The City..." value="">
    </div>
  </div>

  <div class="form-group">
    <label for="state" class="col-sm-2 control-label">State</label>
    <div class="col-sm-10">
      <select name="state" size="1" class="form-control">
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
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="zip" class="col-sm-2 control-label">Zip</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code..." value="">
    </div>
  </div>


    </div>
  </div>



  </div>
</div>




  <div class="form-group">
    <label for="eventTitle" class="col-sm-2 control-label">Details</label>
    <div class="col-sm-10">
      <textarea name="eventDescription" id="eventDescription" cols="80" rows="5" class="wysiwyg"></textarea>
    </div>
  </div>

 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="newEventBtn"> Save <span class="glyphicon glyphicon-floppy-disk"></span></button>
    </div>
  </div>
  
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>