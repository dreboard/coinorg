<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$siteUserID = $Encryption->decode($_GET['ID']);
$SiteUser = new User();
$SiteUser->getUserById($siteUserID);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>User Profile <?php echo $SiteUser->getUserName() ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><?php echo $SiteUser->getUserName() ?></h1>

<table width="100%" border="0">
  <tr>
    <td width="250" height="250" colspan="2"><img src="../siteImg/siteUser.jpg" width="250" height="250" /></td>
    <td align="right">&nbsp;</td>
    <td width="60%" rowspan="5"><object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $SiteUser->getEbayID(); ?>" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $SiteUser->getEbayID(); ?>"></embed></object></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $User->getCollectionAvatar($siteUserID); ?><?php echo $User->getAnswerAvatar($siteUserID); ?><?php echo $User->getInvestmentAvatar($siteUserID); ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="250"><strong> Joined</strong></td>
    <td width="13%"><?php echo $CoinClub->getClubName() ?></td>
    <td width="14%" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Members</strong></td>
    <td><?php echo $CoinClub->getMemberCount($coinClubID); ?></td>
    <td align="right">&nbsp;</td>
    </tr>
  <tr>
    <td valign="top"><strong>Manager</strong></td>
    <td valign="top"><?php echo $CoinClub->getClubManager($coinClubID) ?></td>
    <td align="right" valign="top">&nbsp;</td>
    </tr>
</table>
<br />
<hr />

<table width="100%" border="0" id="clientTbl">
  <thead>
  <tr class="darker">
    <td width="57%"><strong>Collected</strong></td>
    <td width="11%" align="center"><strong>Grade</strong></td>  
    <td width="14%" align="center"><strong>Date Collected</strong></td>
    <td width="18%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>

<?php
$sql = mysql_query("SELECT * FROM collectset WHERE mintsetID = '$mintsetID' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($sql)== 0){
	echo    ' <tr align="center">
    <td align="left"><a href="addMintSet.php">No Sets Saved, Add Mintset</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	   
  </tr>';
} else {
  while($row = mysql_fetch_array($sql))
	  {
  $collectsetID = intval($row['collectsetID']);
  $mintsetID = intval($row['mintsetID']);
  $Mintset->getMintsetById($mintsetID);
  $CollectionSet = new CollectionSet();
  $CollectionSet->getCollectionSetById($collectsetID);  
  $setNickName = $CollectionSet->getSetNickname();
  
  

 switch ($Mintset->getSetType())
	{
	  case 'Proof':
		$viewLink = '<a href="viewMintSetDetail.php?collectsetID='.$collectsetID.'">'.$CollectionSet->getSetNickname().'</a>';
		break;
	  case 'Uncirculated':
		$viewLink = '<a href="viewMintSetDetail.php?collectsetID='.$collectsetID.'">'.$CollectionSet->getSetNickname().'</a>';
		break;
	  case 'Proof':
		$viewLink = '<a href="viewMintSetDetail.php?collectsetID='.$collectsetID.'">'.$CollectionSet->getSetNickname().'</a>';
		break;
	  default:
		echo "No number between 1 and 3";
	}
  echo '
    <tr align="center">
    <td align="left">'.$viewLink.'</a></td>
	<td>'. $CollectionSet->getCoinGrade() .'</td>
		<td>'.date("F j, Y",strtotime($CollectionSet->getCoinDate())) .'</td>
	<td>$'. $CollectionSet->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot>
  <tr class="darker">
    <td><strong>Collected</strong></td>
    <td align="center"><strong>Grade</strong></td>  
    <td width="14%" align="center"><strong>Date Collected</strong></td>
    <td width="18%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>