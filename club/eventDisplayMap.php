<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET['eventID'])) {  
	$eventID = intval($_GET['eventID']); 
	$Event->getEventById($eventID); 
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
<table width="620" border="0">
  <tr>
        <td><a href="eventView.php?eventID=<?php echo $eventID ?>">Details</a></td>
        <td><a href="eventEdit.php?eventID=<?php echo $eventID ?>">Edit Event</a></td>
    <td><a href="eventCancel.php?eventID=<?php echo $eventID ?>">Cancel Event</a></td>
    <td>
    
    <a href="gallery.php?eventID=<?php echo $eventID ?>">Image Gallery</a>
    
    </td>
    <td>&nbsp;</td>

  </tr>
</table>

<br />

<table width="620" border="0">
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

<table width="620" border="0">
  <tr>
    <td width="4%"><strong>Date:</strong></td>
    <td width="96%"><?php echo date("l jS F Y",strtotime($Event->getEventStartDate())); ?></td>
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
    <p><?php echo $Event->getAddress() ?> <br />
<?php echo $Event->getCity() ?>, <?php echo $Event->getState() ?> <?php echo $Event->getZip() ?></p></td>
    </tr>
  <tr>
    <td colspan="2">
    <div><?php echo $Event->getEventDescription(); ?></div>
    </td>
  </tr>
  <tr>
    <td colspan="2" id="showMap"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo str_replace(' ', '+', $Event->getAddress())."+".str_replace(' ', '+', $Event->getCity())."+".$Event->getState()."+".$Event->getZip() ?>&amp;aq=0&amp;oq=5&amp;sspn=5.013515,8.009033&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo str_replace(' ', '+', $Event->getAddress())."+".str_replace(' ', '+', $Event->getCity())."+".$Event->getState()."+".$Event->getZip() ?>&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></td>
  </tr>
</table>





<table width="400" border="0">
  
<?php 
if($Event->getEventIDReference() ==0){
echo '';
} else {
	$eventQuery = mysql_query("SELECT * FROM event WHERE eventIDRef = '".$Event->getEventIDReference()."' ") or die(mysql_error());
			$num_rows = mysql_num_rows($eventQuery);
			 if($num_rows == 0){
					echo '';
				 } else {
				while($row = mysql_fetch_array($eventQuery))
				{
				 $eventIDRef = intval($row['eventIDRef']);
				 $eventID = intval($row['eventID']);
				 $multiDayNum = intval($row['multiDayNum']);
				 echo '<tr>
				 <td><strong>Day # '.$multiDayNum.'</strong></td>
				 <td><a href="eventView.php?eventID='.$eventID.'">View</a></td>
				 <td><a href="eventListEdit.php?eventID='.$eventID.'">Edit</a></td>
				 </tr> ';
				 }
       }
}
?>
  
</table>

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