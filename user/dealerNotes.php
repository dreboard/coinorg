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
<title>My Dealer Notes</title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<style type="text/css">
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Dealer Notes</h1>
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
<p><a href="dealerNoteNew.php" class="brownLinkBold">Create New Note</a></p>
<table width="100%" border="0">
  <tr>
    <td width="82%" class="darker">All Notes</span></td>
    <td width="18%" class="darker">Added</td>
    </tr>
  <?php 
  	$sql = mysql_query("SELECT * FROM notes WHERE userID = '$userID' ORDER BY noteID DESC") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	  echo '<tr><td>No Saved Notes</td><td>&nbsp;</td></tr>';
} else {
		while($row = mysql_fetch_array($sql))
		{
			echo '<tr><td><a href="dealerNote.php?ID='.$Encryption->encode(intval($row['noteID'])).'">'.strip_tags($row['noteTitle']).'</a></td>
			<td>'.date("M j, Y",strtotime($row['noteDate'])).'</td>
			</tr>';
		}
}
  ?>        
</table>



<br />



<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>