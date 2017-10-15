<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectbagID = $Encryption->decode($_GET['ID']);
$collectionBags->getCollectionBagById($collectbagID);
$MintBag->getMintBagByID($collectionBags->getBagID());
}
if (isset($_POST["deleteBagBtn"])) { 
$collectbagID = $Encryption->decode($_POST["ID"]);
mysql_query("DELETE FROM collectbags WHERE collectbagID = '$collectbagID'") or die(mysql_error()); 
header("location: viewMinBox.php");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $collectionBags->getBagNickname(); ?></title>
</head>
<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<hr />

<h2><img id="newBag" src="../img/newBag.jpg" align="absmiddle" /> <?php echo $collectionBags->getBagNickname(); ?></h2>

<table width="930" id="viewTbl">
<?php echo $collectionBags->getBagTypeLink($collectbagID); ?>
  <tr>
    <td width="149"><strong>Type</strong></td>
    <td width="622"><?php echo $collectionBags->getBagType(); ?></td>
  </tr>
<tr>
<td><span class="darker">Purchase Date: </span></td>
<td><?php echo date("F j, Y",strtotime($collectionBags->getCoinDate() )); ?></td>
</tr>
<tr>
  <td><strong>Purchase Price:</strong></td>
  <td>$<?php echo $collectionBags->getCoinPrice() ; ?></td>
</tr>
  <tr>
    <td><span class="darker">Coin Type:</span></td>
    <td><?php echo $collectionBags->getCoinType() ; ?></td>
    </tr>
  <tr>
    <td colspan="2" valign="top"><span class="darker">Additional:</span><br />
      <?php echo $collectionBags->getAdditional() ?></td>
    </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr align="center">
    <td width="33%">
     <a href="editBags.php?ID=<?php echo $Encryption->encode($collectbagID) ?>" class="btn btn-primary" role="button">Edit Bag Details</a>
   </td>
    <td width="33%"><form action="" method="post" id="removeBagForm" class="compactForm">
  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectbagID) ?>" />
<input class="btn btn-primary" name="removeBagBtn" id="removeBagBtn" type="submit" value="Remove Bag Keep Coins" onclick="return confirm('Remove this Bag?');" />
</form></td>
    <td width="33%"><form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">
  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectbagID) ?>" />
<input class="btn btn-primary" name="deleteBagBtn" id="deleteBagBtn" type="submit" value="Delete Bag From Collection" onclick="return confirm('Delete this Bag?');" />
</form></td>
  </tr>
</table>

<hr />

<h3>Purchase Details</h3>
<?php
$purchaseFrom = $collectionBags->getPurchaseFrom();

switch ($purchaseFrom) {
    case 'US Mint':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>US Mint</h3></td>
    </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="434">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>&nbsp;</strong></td>
    <td>&nbsp;</td>
  </tr>
</table>
	 ';
     break;	
	     case 'eBay':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>eBay</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Seller ID: </strong></td>
    <td width="434">'.$collectionBags->getEbaySellerID().'</td>
  </tr>
  <tr>
    <td><strong>Auction #:</strong></td>
    <td>'.$collectionBags->getAuctionNumber().'</td>
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
    <td width="434">'.$collectionBags->getShopName().'</td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td>'.$collectionBags->getShopUrl().'</td>
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
    <td ><td>'.$collectionBags->getAdditional().'</td></td>
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

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>