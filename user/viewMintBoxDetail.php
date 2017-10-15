<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['collectboxID'])) { 
$collectboxID = $Encryption->decode($_GET['collectboxID']);
$CollectionBoxes->getCollectionBoxById($collectboxID);
$MintBox->getMintBoxByID($CollectionBoxes->getBoxMintID());
}
if (isset($_POST["deleteCoinFormBtn"])) { 
$collectboxID = $Encryption->decode($_POST["toUpdate"]);
mysql_query("DELETE FROM collectboxes WHERE collectboxID = '$collectboxID'") or die(mysql_error()); 
header("location: MintBags.php");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $MintBox->getBoxName(); ?></title>
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

<h1><?php echo $MintBox->getBoxName() ?></h1>

<table width="930" id="viewTbl">
  <tr>

<td width="149" class="tdHeight"><span class="darker">Box: </span></td>
<td width="622" class="tdHeight"><a href="viewMintBox.php?boxMintID=<?php echo $CollectionBoxes->getBoxMintID() ?>"><?php echo $MintBox->getBoxName(); ?></a></td>
<td width="18"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Purchase Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($CollectionBoxes->getCoinDate() )); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Price:</strong></td>
  <td class="tdHeight">$<?php echo $CollectionBoxes->getCoinPrice() ; ?></td>
</tr>
  <tr>
    <td><span class="darker">Coin Type:</span></td>
    <td><?php echo $CollectionBoxes->getCoinType() ; ?></td>
    </tr>
  <tr>
    <td><h4><a href="editMintBoxes.php?toUpdate=<?php echo $Encryption->encode($collectboxID) ?>">Edit</a> <br />
    </h4>
      </td>
    <td><form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">
  <input name="toUpdate" type="hidden" value="<?php echo $Encryption->encode($collectboxID) ?>" />
<input name="deleteCoinFormBtn" type="submit" value="Delete Box From Collection" onclick="return confirm('Delete this Box?')" />
</form>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><span class="darker">Additional:</span><br />
      <?php echo $CollectionBoxes->getAdditional() ?></td>
    </tr>
</table>
<hr />

<h3>Purchase Details</h3>
<?php
$purchaseFrom = $CollectionBoxes->getPurchaseFrom();

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
    <td width="434">'.$CollectionBoxes->getEbaySellerID().'</td>
  </tr>
  <tr>
    <td><strong>Auction #:</strong></td>
    <td>'.$CollectionBoxes->getAuctionNumber().'</td>
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
    <td width="434">'.$CollectionBoxes->getShopName().'</td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td>'.$CollectionBoxes->getShopUrl().'</td>
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
    <td ><td>'.$CollectionBoxes->getAdditional().'</td></td>
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