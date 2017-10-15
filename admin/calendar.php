<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Calendar</title>
<?php include("../headItems.php"); ?>

<link rel="stylesheet" type="text/css" href="../scripts/plugins/fullcalendar/fullcalendar/fullcalendar.css">
<script type='text/javascript' src='../scripts/plugins/fullcalendar/fullcalendar/fullcalendar.js'></script>	

<script>
$(document).ready(function () {
    $('table').addClass('table').wrap("<div class='table-responsive'></div>");
    $('#calendar').fullCalendar({
        eventSources: [

        // your event source
        {
            events: [ // put the array in the `events` property
                           <?php
			   $sql = mysql_query("SELECT * FROM event");
			   		while($row = mysql_fetch_array($sql)){
			  
				  $Event->getEventById(intval($row['eventID']));
				  echo 
				  "{
				  title:' ".$Event->getEventTitle()." ',
				  start:' ".$Event->getEventStartDate()." ',
				  end:' ".$Event->getEventEndDate()." ',
				  url: 'viewEvent.html?ID=". intval($row['eventID'])." '
				  },";
			   
					}?>],
			
            color: '#8b4513', // an option!
            textColor: 'white' // an option!
        }
        ]

    });
  });	
</script>
</head>

<body>
<?php include("_nav.php"); ?>
     
<div class="container">
<p>&copy; Company 2014</p>
<div id='calendar'></div>
<p>&nbsp;</p>

</div><!--/.container -->
<?php include("../inc/pageElements/bt-footer.php"); ?>

</body>
</html>