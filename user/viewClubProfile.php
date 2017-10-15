<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$clubmember = $Encryption->decode($_GET['ID']);
$ClubUser = new User();
$ClubUser->getUserById($clubmember);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View Mint Set</title>
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
<h1><?php echo $ClubUser->getUserName() ?></h1>

<table width="100%" border="0">
  <tr>
    <td width="13%"><strong> Club Name</strong></td>
    <td width="27%" align="right"><?php echo $CoinClub->getClubName() ?></td>
    <td width="60%" rowspan="3"><object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $ClubUser->getEbayID(); ?>" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $ClubUser->getEbayID(); ?>"></embed></object></td>
  </tr>
  <tr>
    <td><strong>Members</strong></td>
    <td align="right"><?php echo $CoinClub->getMemberCount($coinClubID); ?></td>
    </tr>
  <tr>
    <td valign="top"><strong>Manager</strong></td>
    <td align="right" valign="top"><?php echo $CoinClub->getClubManager($coinClubID) ?></td>
    </tr>
</table>
<br />
<hr />
<h3><?php echo $Mintset->getSetName(); ?> Price Guide</h3>
<table width="100%" border="1" id="priceListTbl" cellpadding="3">
  <tr class="keyRow">
    <td width="27%">Value</td>
    <td width="73%">Issue Price</td>
    </tr>

  <tr>
    <td>$<?php echo $Mintset->getValue(); ?></td>
    <td>$<?php echo $Mintset->getIssuePrice(); ?></td>
    </tr>
</table>
<p><a href="mintset.php">My Minsets </a> | <a href="addMintSet.php"> Add Mintset</a></p>



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