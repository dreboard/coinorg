<?php
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
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
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reports</title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 25
} );

});
</script>
<style type="text/css">
#adminTbl {clear:both; margin-top:12px;}
</style>

</head>

<body>
<div id="container">


<?php include("../inc/pageElements/headerAdmin.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<h1>My Events</h1>
<p><a href="eventNew.php" class="brownLinkBold">New Event</a></p>
<h1><?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year; ?></h1>
<span class="controlLinks"><?php echo $Calendar->monthControls($month, $year);?></span>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="16%">Date</td>
    <td width="66%">Event</td>
    <td width="18%">Type</td>
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
			$Event->getEventById($row['eventID']);
			echo '<tr><td>'.date("M j, Y",strtotime($Event->getEventStartDate())).'</td>
<td><a class="'.$Event->getColorCode().'" href="eventDisplay.php?ID='.intval($row['eventID']).'">'.$Event->getEventTitle().'</a></td>
<td>'.$Event->getEventType().'</td>			
	</tr>';
		}
}
  ?>    
</tbody>
  <tfoot class="darker">
  <tr>
    <td width="16%">Date</td>
    <td width="66%">Event</td>
    <td width="18%">Type</td>
  </tr>
</tfoot>
</table>
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>