<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	

if(isset($_GET['ID'])) {  
	$usersID = $Encryption->decode($_GET['ID']); 
	$Users = new User();
	$Users->getUserById($usersID);
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../js/lightbox.css">
<script type="text/javascript" src="../js/lightbox.js"></script>
<title>Member <?php echo $Users->getDisplayName() ?> Details</title>

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
<h2 class="blueHdrTxt2">Member: <span class="brownLinkBold"><?php echo $Users->getDisplayName() ?></span> Details</h2>
<p><img src="<?php echo $Users->getImageURL() ?>" class="profileImg" /></p>


<table width="100%" border="0">

  <tr>
    <td><?php echo $Users->getCollectionAvatar($usersID); ?><?php echo $Users->getAnswerAvatar($usersID); ?><?php echo $Users->getInvestmentAvatar($usersID); ?></td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Username</strong></td>
    <td><?php echo $Users->getUserName() ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="136"><strong> Joined</strong></td>
    <td width="177"><?php echo date("F j, Y",strtotime($Users->getUserDate())) ?></td>
    <td width="105" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td><?php echo $Users->mailDisplay($userID) ?></td>
    <td align="right">&nbsp;</td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td align="right" valign="top">&nbsp;</td>
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
  $sql = mysql_query("SELECT * FROM clubmembers WHERE userID = '".$usersID."'") or die(mysql_error());
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<select name="clubPosition">

</select>

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