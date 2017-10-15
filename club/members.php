<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Members</title>

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
<h1><img src="../siteImg/usersIcon.jpg" alt="" width="50" height="50" align="absmiddle">Members</h1>
<table width="100%" border="0">
      <tr>
        <td width="18%"><a href="members.php">Members</a></td>
        <td width="13%"><?php echo $CoinClub->getMemberCount($coinClubID); ?></td>
        <td width="69%">&nbsp;</td>
      </tr>
      <tr>
        <td><a href="eventMonth.php">Events This Month</a></td>
        <td><a href="eventCalendar.php"><?php echo $Event->getMonthEventCountCount($coinClubID, $month=date('m'), $year = date('Y')); ?> </a></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
<hr>

<table width="100%" border="0">
<thead>
  <tr>
    <td><strong>User Name</strong></td>
    <td><strong>Join Date</strong></td>
    <td><strong>Coins</strong></td>
    <td><strong>Position</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php 
  $sql = mysql_query("SELECT * FROM clubmembers WHERE coinClubID = '".$User->getCoinClubID()."'") or die(mysql_error());
while ($row = mysql_fetch_array($sql))
{
	$userDate = date("m/d/y", strtotime($row["joinDate"]));
	$clubPosition = strip_tags($row["clubPosition"]);
	$usersID = intval($row["userID"]);
	$Users = new User();
	$Users->getUserById($usersID);
	echo '
	  <tr>
    <td><a href="userView.php?ID='.$Encryption->encode($usersID).'">'.$Users->getDisplayName().'</a></td>
    <td>'.$userDate.'</td>
    <td>'.$collection->totalCoinsByUser($usersID).'</td>
    <td>'.$clubPosition.'</td>
  </tr>
	 ';
}
  
  ?>
  </tbody>
  <tfoot>  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </tfoot>
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