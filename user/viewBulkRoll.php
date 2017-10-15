<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinType = $collectionRolls->getCoinType();
$rollType = $collectionRolls->getRollType();
$CoinTypes->getCoinByType($coinType);
$coinID = $collectionRolls->getCoinID();
$rollNickname = $collectionRolls->getRollNickname();
//$coinID = $collectionRolls->getCoinDate();
$coin-> getCoinById($coinID);
$coinName = $coin->getCoinName();  
$additional = $collectionRolls->getAdditional(); 
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$coinLink = str_replace(' ', '_', $coinType);

switch ($rollType)
{
case 'Same Coin':
  $editLink =  '<a href="viewRollEditSame.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';
  break;
case 'Date Range':
  $editLink =  '<a href="viewRollEditDate.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';  
  break;
case 'Same Year':
  $editLink =  '<a href="viewRollEditYear.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';  
  break;
  case 'Coin By Coin':
 $editLink =  '<a href="viewRollEditCoin.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>'; 
  break;
    case 'Mint':
 $editLink =  '<a href="editMintRoll.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>';
  $editCoins = '<a href="editMintRollCoins.php?ID='.$Encryption->encode($collectrollsID).'">Edit This Roll</a>'; 
  break;
default:
  echo "No number between 1 and 3";
}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $rollNickname ?></title>
 <script type="text/javascript">
$(document).ready(function(){	

$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<hr />

<h1><?php echo $rollNickname ?> Coin Roll</h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="121" rowspan="8" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo $coinLink ?>.jpg" width="100" height="100" alt="11" /></a></td>
<td width="195" class="tdHeight"><span class="darker">Coin Type: </span></td>
<td width="578" class="tdHeight"><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
<td width="16"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Purchase Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($collectionRolls->getCoinDate())); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Price:</strong></td>
  <td class="tdHeight">$<?php echo $collectionRolls->getCoinPrice(); ?></td>
</tr>
  <tr>
    <td><span class="darker">Type:</span></td>
    <td><?php echo $rollType ?></td>
    </tr>
  <tr>
    <td><?php echo $editLink ?></a>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><span class="darker">Additional:</span><br />
      <?php echo $additional ?></td>
    </tr>
</table>
<hr />

<h3>Purchase Details</h3>
<?php
$purchaseFrom = $collectionRolls->getPurchaseFrom();

switch ($purchaseFrom) {
    case 'eBay':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>eBay</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Seller ID: </strong></td>
    <td width="434">'.$collectionRolls->getEbaySellerID().'</td>
  </tr>
  <tr>
    <td><strong>Auction #:</strong></td>
    <td>'.$collectionRolls->getAuctionNumber().'</td>
  </tr>
</table>
	 ';
     break;	 
	 case 'Coin Shop':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>Coin Shop</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Shop Name: </strong></td>
    <td width="434">'.$collectionRolls->getShopName().'</td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td>'.$collectionRolls->getShopUrl().'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	 ';
     break;	 
	 case 'None':
     echo '
<table width="100%" border="0" id="purchaseTbl">
  <tr>
    <td ><td>'.$collectionRolls->getAdditional().'</td></td>
    </tr>
  <tr>
    <td></td>
  </tr>
  </table>
	 ';
	 break;
    //default:
	case 'None':
        echo 'None';
        break;
}
?>
<hr />
<h3>Coins In Roll <?php echo $collectionRolls->getRollCoinCount($collectrollsID); ?></h3>

<p><a href="editRollSameCoinSmallCentCoins.php?collectrollsID=<?php echo $collectrollsID ?>">Edit</a></p>

<table width="100%" border="0" id="rollListTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Grade</td>
  </tr>
</thead>
  <tbody>
<?php
$sql = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND collectrollsID = '".$Encryption->decode($_GET['ID'])."' LIMIT ".$CoinTypes->getRollCount()." ") or die(mysql_error());

  while($row = mysql_fetch_array($sql))
	  {
 $collectrollsID = intval($row['collectrollsID']);
 $collectionID = intval($row['collectionID']);
 $coinID = intval($row['coinID']);
 $coin->getCoinById($coinID);
// $collectionRolls->getCollectionRollById($collectrollsID);
  $collection->getCollectionById($collectionID);
  $coinName = $coin->getCoinName();
  
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.$coinName.'</a> </td>
	<td align="center">'.$collection->getCoinGrade().'</td>
  </tr>
  ';
	  }
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Grade</td>
  </tr>
	</tfoot>
</table>
<br class="clear" />
<hr />

<h3>Other <?php echo $coinType ?> Rolls</h3>
<table width="100%" border="0" id="rollListTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Collected</td>
    <td width="32%" align="center">Roll Type</td>
    <td width="7%">Edit</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND coinType = '".$collectionRolls->getCoinType()."' ") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $rollNickname = strip_tags($row['rollNickname']);  
  $coinGrade = strip_tags($row['coinGrade']);  
  $coinID = intval($row['coinID']);
  $coinCategory = strip_tags($row['coinCategory']);
  $coinGrade = strip_tags($row['coinGrade']);
  $rollType = strip_tags($row['rollType']);
  $collectrollsID = intval($row['collectrollsID']);
  $rollTypeLink = str_replace(' ', '_', $rollType);
  $collectionRolls->getCollectionRollById($collectrollsID);
switch ($rollType)
{
case 'Same Coin':
  $viewLink =  '<a href="viewRollSame.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
  $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
case 'Date Range':
  $viewLink =  '<a href="viewRollDateRange.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
    $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
case 'Same Year':
  $viewLink =  '<a href="viewRollSameYear.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
    $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
  case 'Mixed Type':
  $viewLink =  '<a href="viewRollSameYear.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
    $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';
  break;
  case 'Coin By Coin':
 $viewLink =  '<a href="viewRollCoins.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
   $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$Encryption->encode($collectrollsID).'">Edit</a>';
  break;
}   



  echo '
    <tr>
    <td>'.$viewLink.'</td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollTypes.php?rollType='.$rollTypeLink.'&coinCategory='.$coinCategory.'">'.$rollType.'</a></td>	 
	<td>'.$editLink.'</td>   
  </tr>
  ';
	  }
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Collected</td>
    <td width="32%" align="center">Roll Type</td>
    <td>Edit</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>