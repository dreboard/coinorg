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
    <td width="121" rowspan="9" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo str_replace(' ', '_', $collectionRolls->getDesign()) ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /></a></td>
    <td class="tdHeight"><strong>Roll Version:</strong></td>
    <td class="tdHeight"><a href="viewMintRoll.php?rollMintID=<?php echo $collectionRolls->getRollMintID() ?>"><?php echo $CollectMintRolls->getRollName() ?></a></td>
    <td></td>
  </tr>
  <tr>
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
    <td><a href="editMintRoll.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Edit This Roll</a>
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
<h3>Mint Roll Coins</h3>
<table width="100%" border="0">
  <tr>
    <td width="13%"><strong>Open Roll</strong></td>
    <td width="26%"><form class="compactForm">
      <select name="openRoll" id="openRoll">
        <option value="" selected="selected">Choose</option>
        <option value="Yes">Yes, Open Roll</option>
	    <option value="">No, Leave Sealed</option>
      </select>
      <input name="ID" type="hidden" value="<?php echo $Encryption->decode($_GET['ID']) ?>" />
      <input name="" type="submit" />
    </form></td>
    <td width="61%" id="rollMsg">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Open Box</strong></td>
    <td><form class="compactForm">
      <select name="openRoll" id="openRoll">
        <option value="" selected="selected">Choose</option>
        <option value="Yes">Yes, Open Box</option>
	    <option value="">No, Leave Sealed</option>
      </select>
      <input name="ID" type="hidden" value="<?php echo $Encryption->decode($_GET['ID']) ?>" />
      <input name="" type="submit" />
    </form></td>
    <td id="boxMsg">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>