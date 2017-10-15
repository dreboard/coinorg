<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coin  Clubs</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
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

<h1>Coin  Clubs</h1>
<table width="100%" border="0">
  <tr>
    <td width="27%"><strong>Club Name</strong></td>
    <td width="24%"><strong>Members</strong></td>
    <td width="45%"><strong>Club Type</strong></td>
    <td width="4%"><strong>Level</strong></td>
  </tr>
<?php 
$myQuery = mysql_query("SELECT * FROM coinclub") or die(mysql_error()); 
	while($row = mysql_fetch_array($myQuery)) {
         $coinClubID = intval($row['coinClubID']);
         $CoinClub->getClubById($coinClubID);
		 echo '<tr>
    <td><a href="viewClub.php?coinClubID='.$coinClubID.'&year='.$year.'&month='.$month.'">'.$CoinClub->getClubName().'</a></td>
    <td>'.$CoinClub->getMemberCount($coinClubID).'</td>
    <td>'.$CoinClub->getClubType().'</td>
    <td>'.$CoinClub->getClubLevel().'</td>
  </tr>';
} 
?>
</table>
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>