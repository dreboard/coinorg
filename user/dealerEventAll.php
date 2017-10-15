<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

if(isset($_GET['month'])) {  
	$month = intval($_GET['month']);
	$year = intval($_GET['year']); 
} else {
	$month = date("n");
	$year = date('Y') ; 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Dealer Events</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Dealer Events</h1>
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
<p><a href="dealerEventNew.php" class="brownLinkBold">New Event</a></p>
<h1><?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year; ?></h1>
<span class="controlLinks"><?php echo $Calendar->monthControls($month, $year);?></span>

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="16%">Date</td>
    <td width="54%">Event</td>
    <td width="30%">Type</td>
  </tr>
</thead>
  
 <tbody> 
  <?php 
  	$sql = mysql_query("SELECT * FROM event WHERE MONTH(eventStartDate) = '$month' AND YEAR(eventStartDate) = '$year' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td> 
		  <td>No events for '.date( 'F', mktime(0, 0, 0, $month) ).' '.$year.'</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

		while($row = mysql_fetch_array($sql))
		{
			$eventID = $row['eventID'];
			$Event->getEventById($eventID);
			$eventTitle = $row['eventTitle'];
			echo '<tr><td>'.date("M j, Y",strtotime($Event->getEventStartDate())).'</td>
<td><a class="'.$Event->getColorCode().'" href="dealerEventDisplay.php?ID='.$Encryption->encode($eventID).'">'.$Event->getEventTitle().'</a></td>
<td>'.$Event->getEventType().'</td>			
	</tr>';
		}
}
  ?>    
</tbody>
  <tfoot class="darker">
  <tr>
    <td width="16%">Date</td>
    <td width="54%">Event</td>
    <td width="30%">Type</td>
  </tr>
</tfoot>
</table>



<p>&nbsp;</p>

<p>&nbsp;</p>

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>