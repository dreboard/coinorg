<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);
$errorMsg = '';

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
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $Event->getEventTitle(); ?></title>

<script type="text/javascript">
$(document).ready(function(){	


});
</script>  


<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
    <h2 class="blueHdrTxt2"><?php echo $Event->getEventTitle(); ?></h2>
<table width="620" border="0" cellpadding="3">
  <tr>
        <td width="117" valign="middle"><a href="eventEdit.php?ID=<?php echo $Encryption->encode($eventID) ?>">Edit Event</a></td>
    <td width="135" valign="middle"><a href="eventCancel.php?ID=<?php echo $Encryption->encode($eventID) ?>&club=<?php echo $Encryption->encode($coinClubID) ?>">Cancel Event</a></td>
    <td width="232" valign="middle">
    <?php 
	if($Album->getEventGallery($eventID) == '0'){
		echo '<form action="" method="post">
<input name="ID" type="hidden" value="'.$Encryption->encode($eventID).'">
<input name="galleryBtn" type="submit" value="Create Gallery">
</form>';
	} else {
		echo '<a href="albumView.php?ID='.$Encryption->encode($Album->getEventGallery($eventID)).'">Image Gallery</a>';
	}
	?>
    
    
    </td>
    <td width="23" valign="middle">&nbsp;</td>

  </tr>
</table>

<br />

<table width="620" border="0" cellpadding="3">
  <tr>
    <td><strong>Seats</strong></td>
    <td><strong>Registered</strong></td>
    <td><strong>Available</strong></td>
  </tr>
    <tr>
    <td><?php echo $Event->getSeats(); ?></td>
    <td><?php echo $Event->getRegistrants($eventID); ?></td>
    <td><?php echo $Event->getSeats() - $Event->getRegistrants($eventID); ?></td>
  </tr>
    <tr>
      <td colspan="2"><a href="eventRegList.php?eventID=<?php echo $eventID ?>">View Registered List</a></td>
      <td>&nbsp;</td>
    </tr>
</table>

<br />

<table width="620" border="0" cellpadding="3">
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

<table width="400" border="0">
  
<?php 
if($Event->getMultiCheck() ==0){
echo '';
} else {
	$eventQuery = mysql_query("SELECT * FROM eventDays WHERE eventID = '".$eventID."' ORDER BY dayNumber ASC ") or die(mysql_error());
			$num_rows = mysql_num_rows($eventQuery);
				while($row = mysql_fetch_array($eventQuery))
				{
				 $eventID = intval($row['eventID']);
				 $dayNumber = intval($row['dayNumber']);
				 echo '<tr>
				 <td><strong>Day # '.$multiDayNum.'</strong></td>
				 <td><a href="eventView.php?eventID='.$eventID.'">View</a></td>
				 <td><a href="eventListEdit.php?eventID='.$eventID.'">Edit</a></td>
				 </tr> ';
       }
}
?>
  
</table>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
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