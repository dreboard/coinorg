<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinType = $collectionRolls->getCoinType();
$coinCategory = $collectionRolls->getCoinCategory();  
$CollectMintRolls->getMintRollById($collectionRolls->getRollMintID());
$rollType = $collectionRolls->getRollType();
$CoinTypes->getCoinByType($coinType);

$rollNickname = $collectionRolls->getRollNickname();

$additional = $collectionRolls->getAdditional(); 

$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$coinLink = str_replace(' ', '_', $coinType);

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

<table width="916" id="viewTbl">
  <tr>
    <td width="121" rowspan="9" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo str_replace(' ', '_', $collectionRolls->getCoinType()) ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /></a></td>
    <td class="tdHeight"><strong>Roll Type:</strong></td>
    <td class="tdHeight"><a href="RollTypes.php?rollType=Same_Type">Same Type</a></td>
    </tr>
  <tr>
    <td width="195" class="tdHeight"><span class="darker">Coin Type: </span></td>
<td width="578" class="tdHeight"><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Purchase Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($collectionRolls->getCoinDate())); ?></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <td colspan="2" valign="top"></td>
    </tr>
</table>
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="25"><h3><a href="viewDateRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Roll Main View</a></h3></td>
    <td width="25%"><h3><a href="viewDateRollEdit.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Manage Roll &amp; Coins</a></h3></td>
    <td width="25%"><h3><a href="addRollDateRange.php">New Roll</a></h3></td>
    <td width="25%"><h3><a href="myRolls.php">All Rolls</a></h3></td>
  </tr>
</table>
<hr />
<h3>Additional Details</h3>
 <?php echo $collectionRolls->getCoinNote(); ?>
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
	 case 'Coin Show':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>Coin Shop</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Show Name: </strong></td>
    <td width="434">'.$collectionRolls->getShowName().'</td>
  </tr>
  <tr>
    <td><strong>City:</strong></td>
    <td>'.$collectionRolls->getShowCity().'</td>
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

}
?>
<hr />
<h3>Coins in this  Roll</h3>

<table width="100%" border="0" id="rollListTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Name</td>  
    <td width="14%" align="center">Grade</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND collectrollsID = '$collectrollsID' ") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>You dont have any coins In this roll</td> <td>&nbsp;</td> 
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $collectionID = intval($row['collectionID']);
  $collection->getCollectionById($collectionID);
  $coin->getCoinById($coinID);
  echo '
    <tr class="gryHover">
<td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.$coin->getCoinName().'</a></td>
<td align="center">'.$collection->getCoinGrade().'</td>
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Name</td>  
    <td width="14%" align="center">Grade</td>
  </tr>
	</tfoot>
</table>
<br />
<p class="clear"><a class="topLink" href="#top">Top</a></p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>