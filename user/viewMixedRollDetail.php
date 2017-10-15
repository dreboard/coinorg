<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);

$CollectMintRolls->getMintRollById($collectionRolls->getRollMintID());

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

<table width="930" id="viewTbl">
  <tr>
    <td width="121" rowspan="9" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo str_replace(' ', '_', $collectionRolls->getCoinCategory()) ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /></a></td>
    <td class="tdHeight"><strong>Roll Type:</strong></td>
    <td class="tdHeight"><a href="RollTypes.php?rollType=Mixed_Type">Mixed Type</a></td>
    <td></td>
  </tr>
  <tr>
    <td width="195" class="tdHeight"><span class="darker">Coin Category: </span></td>
<td width="578" class="tdHeight"><a href="categoryRolls.php?coinCategory=<?php echo str_replace(' ', '_', $collectionRolls->getCoinCategory()) ?>"><?php echo $collectionRolls->getCoinCategory(); ?></a></td>
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
    <td><strong>Coins In Roll:</strong></td>
    <td><?php echo $collectionRolls->getRollCount($collectrollsID, $userID); ?></td>
    </tr>
  <tr>

    <td colspan="2" valign="top"></td>
    </tr>
</table>
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="25"><h3><a href="viewMixedRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Roll Main View</a></h3></td>
    <td width="25%"><h3><a href="viewMixedRollEdit.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Manage Roll &amp; Coins</a></h3></td>
    <td width="25%"><h3><a href="addRollsMixed.php">New Roll</a></h3></td>
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
    <td>'.$collectionRolls->getAdditional().'</td>
    </tr>
  </table>
	 ';
	 break;

}
?>
<hr />
<h3>Collection/Storage Details</h3>
<table width="100%" border="0">
  <tr>
    <td width="12%" class="darker">Collection</td>
    <td width="88%">
<?php
$countWant = mysql_query("SELECT * FROM collectrolls WHERE collectrollsID = '$collectrollsID' AND coincollectID != '0' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countWant) == 0){
	  echo 'This roll is not in a collection, Add to: 
	  <form action="" method="post" class="compactForm" id="collectionListForm">
	  <select name="Collection" id="Collection">
      <option selected="selected" value="">Select</option>
		'.$CoinCollect->getOpenList($userID).'
    </select>
	  <input name="ID" type="hidden" value="'.$Encryption->encode($collectrollsID).'" />
	  <input id="collectionListBtn" name="collectionListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Collection?\')" />
	  </form> &nbsp;<a href="addCollection.php">Create New Collection</a>
	  ';
} else {

  while($row = mysql_fetch_array($countWant))
	  {
		$coincollectID = intval($row['coincollectID']); 
		$CoinCollect->getCoinCollectionById($coincollectID);
		echo '<a href="coinCollectionView.php?ID='.$Encryption->encode($coincollectID).'"><strong>'.$CoinCollect->getCoinCollectionName().'</strong></a>&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="'.$Encryption->encode($collectrollsID).'" />
	    <input id="collectionRemoveBtn" name="collectionRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Collection?\')" />
	  </form>';
	  }
}
?>
    </td>
  </tr>
  <tr>
    <td><strong>Container</strong></td>
    <td>
      <?php
if($collectionRolls->getContainerID() == '0'){
	 echo 'This roll is not in a container, Add to: '.$Container->getOpenList($userID, $collectrollsID);
} else {

		$Container->getContainerById($collectionRolls->getContainerID());
		echo $Container->getContainerTypeLinkByID($collectionRolls->getContainerID()).'&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="'.$Encryption->encode($collectrollsID).'" />
	    <input id="containerRemoveBtn" name="containerRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Container?\')" />
	  </form>';
}
?>
      </td>
  </tr>
</table>

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
<p><a class="topLink" href="#top">Top</a></p>
<p><a href="http://cgi.ebay.co.uk/ws/eBayISAPI.dll?ViewItem&item=130849451064" target="_blank">
Please check out my other auctions!
</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>