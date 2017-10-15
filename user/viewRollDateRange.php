<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['collectrollsID'])) { 
$collectrollsID = intval($_GET['collectrollsID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinType = $collectionRolls->getCoinType();
$rollType = $collectionRolls->getRollType();

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
  $editLink =  '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  break;
case 'Date Range':
  $editLink =  '<a href="viewRollEditDate.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';  
  break;
case 'Same Year':
  $editLink =  '<a href="viewRollEditYear.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';  
  break;
  case 'Coin By Coin':
 $editLink =  '<a href="viewRollEditCoin.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>'; 
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
<td width="578" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
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
<h3> Roll Coins</h3>

<?php echo $collectionRolls->getRollCoinCount($collectrollsID); ?>


<p><a href="editRollSameCoinSmallCentCoins.php?collectrollsID=<?php echo $collectrollsID ?>">Edit</a></p>
<hr />
<hr />

<h3>Other <?php echo $coinType ?> Rolls</h3>
<table width="100%" border="0" id="rollListTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Roll Type</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND coinType = '$coinType'") or die(mysql_error());
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
  $thePageCode = "Go to the view coin page to view this coin";
  
  switch ($rollType)
{
case 'Same Coin':
  $editLink =  '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  break;
case 'Date Range':
  $editLink =  '<a href="viewRollDateRange.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';  
  break;
case 'Same Year':
  $editLink =  '<a href="viewRollEditYear.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';  
  break;
  case 'Coin By Coin':
 $editLink =  '<a href="viewRollEditCoin.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>';
  $editCoins = '<a href="viewRollEditSame.php?collectrollsID='.$collectrollsID.'">Edit This Roll</a>'; 
  break;
default:
  echo "No number between 1 and 3";
}
  
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a> </td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollTypes.php?rollType='.$rollTypeLink.'&coinCategory='.$coinCategory.'">'.$rollType.'</a></td>	    
  </tr>
  ';
	  }
?>
</tbody>

<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Roll Type</strong></td>
  </tr>
	</tfoot>
</table>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>