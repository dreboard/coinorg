<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

if(isset($_POST['cancelEventBtn'])) {  
	$eventID = $Encryption->decode($_POST['ID']);
	$Event->cancelUserEvent($eventID, $userID); 
	header("location: dealerEventAll.php");
    exit();
} 

if(isset($_GET['ID'])) {  
	$eventID = $Encryption->decode($_GET['ID']); 
	$Event->getEventById($eventID); 
} 
if(isset($_POST['galleryBtn'])) {  
$eventID = $Encryption->decode($_POST['ID']);
$Event->getEventById($eventID); 

$sql = mysql_query("INSERT INTO album(albumName, albumDescription, coinClubID, userID, eventID) VALUES('".$Event->getEventTitle()."', '".$Event->getEventDescription()."', '$coinClubID', '$userID', '$eventID')") or die(mysql_error()); 
$albumID = mysql_insert_id();
header("location: albumView.php?ID=".$Encryption->encode($albumID)."");
exit();
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
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

<h1>My Dealer Event</h1>
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

<table width="666" border="0" cellpadding="3">
  <tr class="darker">
    <td width="117" valign="middle"><a href="dealerEventAll.php" class="brownLink">All Events</a></td>
        <td width="117" valign="middle"><a href="dealerEventEdit.php?ID=<?php echo $_GET['ID'] ?>">Edit Event</a></td>
        
    <td width="112" valign="middle"><a href="dealerEventNew.php">New Event</a></td>    
    <td width="166" valign="middle">
    <form action="" method="post" class="compactForm">
    <input name="ID" type="hidden" value="<?php echo $_GET['ID'] ?>">
    <input name="cancelEventBtn" type="submit" value=" Cancel Event "onclick="return confirm('Cancel This Event?')">
    </form></td>
    
    <td width="112" valign="middle">&nbsp;</td>

  </tr>
</table>
<br />
<table width="620" border="0" cellpadding="3">
  <tr>
    <td><strong>Event:</strong></td>
    <td><?php echo $Event->getEventTitle(); ?></td>
  </tr>
  <tr>
    <td width="16%"><strong>Date:</strong></td>
    <td width="84%"><?php echo date("l jS F Y",strtotime($Event->getEventStartDate())); ?></td>
  </tr>
  <tr>
    <td><strong>Time</strong></td>
    <td><?php echo date("g:i a",strtotime($Event->getEventStartTime())); ?> - <?php echo date("g:i a",strtotime($Event->getEventEndTime())); ?></td>
  </tr>
  <tr>
    <td><strong>Cost:</strong></td>
    <td><?php echo $Event->getCost(); ?></td>
  </tr>
    <tr>
    <td><strong>Contact:</strong></td>
    <td><?php echo $Event->getContact(); ?></td>
  </tr>
      <tr>
    <td><strong>Phone:</strong></td>
    <td><?php echo $Event->getContactPhone(); ?></td>
  </tr>
      <tr>
    <td><strong>Email:</strong></td>
    <td><?php echo $Event->getContactEmail(); ?></td>
  </tr>
  <tr>
    <td><strong>Location:</strong></td>
    <td><span><a id="showAdd" href="#">Show Map</a></span></td>
  </tr>
  <tr>
    <td colspan="2">
    <p><?php echo $Event->getAddress() .'<br />
'.$Event->getCity() .', '.$Event->getState().' '.$Event->getZip() ?></p></td>
    </tr>
  <tr>
    <td colspan="2">
    <div><?php echo $Event->getEventDescription(); ?></div>
    </td>
  </tr> 
</table>
<br />



<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>