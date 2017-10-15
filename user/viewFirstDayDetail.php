<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectfirstdayID = $Encryption->decode($_GET['ID']);
$CollectionFirstday->getCollectFirstDayById($collectfirstdayID);

$FirstDay->getFirstDayByID($CollectionFirstday->getFirstdayID());
$FirstDay->getFirstdayID();
$coinType = $FirstDay->getCoinType();

switch ($CollectionFirstday->getFirstdayType())
{
case 'Envelope':
  $editLink =  '<a href="editFirstDayRaw.php?collectfirstdayID='.$collectfirstdayID.'">Edit This Set</a>';
  break;
case 'Certified Envelope':
  $editLink =  '<a href="editFirstDayCert.php?collectfirstdayID='.$collectfirstdayID.'">Edit This Set</a>';
  break;
case 'Certified Coins':
  $editLink =  '<a href="editFirstDayCoins.php?collectfirstdayID='.$collectfirstdayID.'">Edit This Set</a>';
  break;
}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $FirstDay->getSetName(); ?></title>
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

<h1><?php echo $CollectionFirstday->getFirstdayNickname() ?></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="121" rowspan="8" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo str_replace(' ', '_', $FirstDay->getCoinVersion()); ?>.jpg" width="100" height="100" alt="11" /></a></td>
<td width="149" class="tdHeight"><span class="darker">Set Type: </span></td>
<td width="622" class="tdHeight"><a href="viewFirstDay.php?firstdayID=<?php echo $FirstDay->getFirstdayID() ?>"><?php echo $FirstDay->getSetName(); ?></a></td>
<td width="18"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Purchase Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($CollectionFirstday->getCoinDate() )); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Price:</strong></td>
  <td class="tdHeight">$<?php echo $CollectionFirstday->getCoinPrice() ; ?></td>
</tr>
  <tr>
    <td><span class="darker">First Day Type:</span></td>
    <td><?php echo $CollectionFirstday->getFirstdayType() ; ?></td>
    </tr>
  <tr>
    <td><?php echo $editLink ?></a>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><span class="darker">Additional:</span><br />
      <?php echo $CollectionFirstday->getAdditional() ?></td>
    </tr>
</table>
<hr />

<h3>Purchase Details</h3>
<?php
$purchaseFrom = $CollectionFirstday->getPurchaseFrom();

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
    <td width="434">'.$CollectionFirstday->getEbaySellerID().'</td>
  </tr>
  <tr>
    <td><strong>Auction #:</strong></td>
    <td>'.$CollectionFirstday->getAuctionNumber().'</td>
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
    <td width="434">'.$CollectionFirstday->getShopName().'</td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td>'.$CollectionFirstday->getShopUrl().'</td>
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
    <td ><td>'.$CollectionFirstday->getAdditional().'</td></td>
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