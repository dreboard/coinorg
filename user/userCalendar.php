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
<title>My Calendar</title>
<?php include("../headItems.php"); ?>

<link rel="stylesheet" type="text/css" href="../scripts/plugins/fullcalendar/fullcalendar/fullcalendar.css">
<script type='text/javascript' src='../scripts/plugins/fullcalendar/fullcalendar/fullcalendar.js'></script>	

<script>
$(document).ready(function () {
    $('table').addClass('table').wrap("<div class='table-responsive'></div>");

$('#calendar').fullCalendar({
			allDayDefault: false,
 			header: {
				left: 'prev,next, today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},       
		events: "_getEvents.php",
		eventSources: [
        {
            color: '#8b4513', // an option!
            textColor: 'white' // an option!
        }]

    });


  var date = $("#calendar").fullCalendar('getDate');
  var month_int = date.getMonth() + 1;
  var year_int = date.getYear();
  //you now have the visible month as an integer from 0-11
  



$(".fc-button").click(function(){
	  var currentTitle = $('.fc-header-title').text();
	  var arr = currentTitle.split(" ");
	  var curMonth = arr[0];
	  var curYear = arr[1];

	 // $("#dateView").text(curMonth);

            $.ajax({

                type: "GET",
                url: "_getSideEvents.php",
                data: 'month=' + $('.fc-header-title').text(),
                success: function(msg){
                    $('#dateView').html(msg);
                }

            }); // Ajax Call
	  
	  
	  
  //
});


  });
</script>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">

  <div class="btn-group btn-group-justified">
  <div class="btn-group">
  <a href="enterEvent.php" class="btn btn-primary" role="button">New Event</a>
  </div>
  <div class="btn-group">
    <a href="userNotes.php" class="btn btn-default" role="button">Notebook</a>
  </div>
  <div class="btn-group">
    <a href="#" class="btn btn-default" role="button">Gallery</a>
  </div>
</div>
<br>
<!--<div id='calendar'></div>-->




<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8"><div id='calendar'></div></div>
  
  
  
  <div class="col-xs-6 col-md-4">
<div id="dateView" class="noMargin">

<ul class="list-group">
 <li class="list-group-item default"><strong>Activity For <?php echo date('F'); ?> <?php echo date('Y'); ?></strong></li>
  <li class="list-group-item"><span class="badge">$<?php echo $Invest->getMonthlyInvestmentByID($userID, date('m'), date('Y')); ?></span> Spending</li>
  <li class="list-group-item"><span class="badge">18</span> Coins Added</li>
  <li class="list-group-item"><span class="badge">11</span> Coin Shows</li>
  <li class="list-group-item"><span class="badge">1</span> Coin Group</li>
</ul>




</div>
<!--  -->
 <hr />

  
  
  </div>
</div>
    

 <br />   
</div><!--/.container -->





<?php include("../inc/pageElements/bt-footer.php"); ?>

</body>
</html>