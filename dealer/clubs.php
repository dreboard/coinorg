<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Coin Clubs</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Coin Clubs</h1>
<p>Pending: <?php echo $CoinClub->getPendingCount(); ?></p>
<table width="100%" border="0">
  <tr>
    <td width="60%"><strong>Club Name</strong></td>
    <td width="16%"><strong>Join Date</strong></td>
    <td width="13%"><strong>Members</strong></td>
    <td width="11%"><strong>Level</strong></td>
  </tr>
  <?php 
  $sql = mysql_query("SELECT * FROM coinclub ORDER BY clubName ASC") or die(mysql_error());
while ($row = mysql_fetch_array($sql))
{
	$clubName = $row["clubName"];
	$enterDate = date("m/d/y", strtotime($row["enterDate"]));
	$coinClubID = $row["coinClubID"];
	$clubLevel = $row["clubLevel"];
	echo '
	  <tr>
    <td><a href="viewClub.php?coinClubID='.$coinClubID.'">'.$clubName.'</a></td>
    <td>'.$enterDate.'</td>
    <td>'.$CoinClub->getMemberCount($coinClubID).'</td>
    <td>'.$clubLevel.'</td>
  </tr>
	 ';
	
}
  
  ?>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>