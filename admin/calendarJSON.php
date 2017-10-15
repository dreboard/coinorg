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
        
		events: "../inc/ajax/_getEvents.php",
		eventSources: [
        {
            color: '#8b4513', // an option!
            textColor: 'white' // an option!
        }]

    });

/*      $('#calendar').fullCalendar({ 
		draggable: false, 
		color: '#8b4513', 
		events: "_getEvents.php",
		textColor: 'white' 
      }); */

   });
</script>
</head>

<body>
<?php include("_nav.php"); ?>
     
<div class="container">
<p id="loading"></p>
<div id='calendar'></div>
<p>&nbsp;</p>

</div><!--/.container -->
<?php include("../inc/pageElements/bt-footer.php"); ?>

</body>
</html>