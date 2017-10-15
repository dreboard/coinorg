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
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	

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

<h1>My Dealer Page</h1>
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
<h1><?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year; ?></h1>

<table width="100%" border="0">
  <tr>
    <td width="60%" class="controlLinks"><?php echo $Calendar->monthControls($month, $year);?></td>
    <td width="20%" align="center"><a href="dealerEventNew.php" class="brownLinkBold"><img src="../img/calendarIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> New Event</a></td>
    <td width="20%" align="center"><a class="brownLinkBold" href="dealerEventAll.php"><img src="../img/paperIcon.jpg" alt="" width="20" height="20" align="absmiddle" />List View</a></td>

  </tr>
</table>
<br />
<?php echo $Calendar->drawDealerCalendar($month, $year, $userID);
?>
<br />



<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>