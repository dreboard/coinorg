<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectionID = $Encryption->decode($_GET['ID']);

if($collection->getCollectionById($collectionID) == NULL){
header("location: myCoins.php");
} else {

$coinType = $collection->getCoinType();
$coinID = $collection->getCoinID();
$coin-> getCoinById($coinID);
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinGrade = $collection->getCoinGrade();
$proService = $collection->getGrader();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);

if($collection->getCoinImage1() !== '../img/noPic.jpg'){
  $coinPic1 = '<img src="'.$collection->getCoinImage1().'" class="coinImg" />';
	} else {
	$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';
	}
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
<script type="text/javascript" src="../scripts/lightbox.js"></script>
<script type="text/javascript" src="../scripts/images.js"></script>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
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
<span><?php echo $_SESSION['message']; ?></span>

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="157" rowspan="12" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo '<img src="../img/'.$coinVersion.'.jpg" width="150" height="150" />'; ?></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="162" class="tdHeight"><span class="darker">Type: </span></td>
<td width="575" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
<td width="16"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Year:</strong></td>
    <td class="tdHeight"><a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear() ?>"><?php echo $coin->getCoinYear() ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?>
    
    
    </td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grading Service:</strong></td>
    <td class="tdHeight"><a href="viewTypeService.php?proService=<?php echo $proService ?>&coinType=<?php echo $coinLink ?>"><?php echo $proService ?></a> 
   <?php 
   if($proService !== 'None'){
      echo $collection->getGraderNumber();
   }
     ?> 
    &nbsp; 
	<?php
	if($proService == 'None'){
	if($collection->getCertlist() == '0'){
		echo '(<a href="certListAdd.php?ID='.$_GET['ID'].'" class="greenLink">Add to Certification list</a>)';
	} else {
		echo '(This Coin Is On The <a href="certList.php" class="brownLinkBold">To Be Certified List</a>) <form action="" method="post" class="compactForm">
	  <input name="certCoinID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	  <input name="certRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove this Coin?\')" />
	  </form>';		
	}
	}
 ?></td>
    <td></td>
  </tr>
<tr>
<td class="tdHeight"><span class="darker">Purchase Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($collection->getCoinDate())); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Price:</strong></td>
  <td class="tdHeight">$<?php echo $collection->getCoinPrice(); ?></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
      </td>
    </tr>
</table>
<?php include('../inc/pageElements/viewCoinLinks.php'); ?>

<hr />

<h2>Purchase Details</h2>
<?php
$purchaseFrom = $collection->getPurchaseFrom();

switch ($purchaseFrom) {
    case 'eBay':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>eBay</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Seller ID: </strong></td>
    <td width="434">'.$collection->getEbaySellerID().'</td>
  </tr>
  <tr>
    <td><strong>Auction #:</strong></td>
    <td>'.$collection->getAuctionNumber().'</td>
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
    <td width="434">'.$collection->getShopName().'</td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td>'.$collection->getShopURL().'</td>
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
    <td width="434">'.$collection->getShowName().'</td>
  </tr>
  <tr>
    <td><strong>City:</strong></td>
    <td>'.$collection->getShowCity().'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	 ';
     break;	 
	 
	 case 'Mint':
     echo '
<table width="100%" border="0" id="purchaseTbl">
  <tr>
    <td ><h3>'.$collection->getPurchaseFrom().'</h3></td>
    </tr>
  <tr>
    <td></td>
  </tr>
  </table>
	 ';
	 break;	 
	 
	 case 'Other':
     echo '
<table width="100%" border="0" id="purchaseTbl">
  <tr>
    <td ><h3>'.$collection->getAdditional().'</h3></td>
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
<p><?php echo $additional; ?></p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>