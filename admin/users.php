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
<title>Users</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Users</h1>
<table width="100%" border="0">
  <tr class="darker">
    <td>User Name</td>
    <td>Join Date</td>
    <td>Coins</td>
    <td>User Level</td>
  </tr>
  <?php 
  $sql = mysql_query("SELECT * FROM user ORDER BY lastname ASC") or die(mysql_error());
while ($row = mysql_fetch_array($sql))
{
	$username = $row["username"];
	$userDate = date("m/d/y", strtotime($row["userDate"]));
	$userLevel = $row["userLevel"];
	$usersID = $row["userID"];
	echo '
	  <tr>
    <td><a href="userView.php?usersID='.$usersID.'">'.$username.'</a></td>
    <td>'.$userDate.'</td>
    <td>'.$collection->totalCoinsByUser($usersID).'</td>
    <td>'.$userLevel.'</td>
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