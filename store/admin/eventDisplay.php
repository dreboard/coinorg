<?php
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";

if(isset($_GET['ID'])) {  
	$eventID = intval($_GET['ID']); 
	$Event->getEventById($eventID); 
} 
if(isset($_POST['cancelEventBtn'])) {  
	$eventID = $Encryption->decode($_POST['ID']);
	$Event->cancelUserEvent($eventID, $userID); 
	header("location: dealerEventAll.php");
    exit();
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Event->getEventTitle(); ?></title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">

</style>

</head>

<body>
<div id="container">


<?php include("../inc/pageElements/headerAdmin.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">

<h2><?php echo $Event->getEventTitle(); ?></h2>
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
  <tr>
    <td><strong>Edit:</strong></td>
    <td><a href="eventEdit.php?ID=<?php echo intval($_GET['ID']); ?>">Change</a></td>
  </tr>
</table>


  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>