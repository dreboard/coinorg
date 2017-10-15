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

<table width="100%" border="0">
  <tr>
    <td width="15%" class="tdHeight"><span class="darker">Purchase Date: </span></td>
    <td width="85%" class="tdHeight"><?php echo date("F j, Y",strtotime($collection->getCoinDate())); ?></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Purchase Price:</strong></td>
    <td class="tdHeight">$<?php echo $collection->getCoinPrice(); ?></td>
  </tr>
  </table>
<br />

<?php include('../inc/pageElements/viewCoinLinks.php'); ?>
<hr />
<h2>Sale Details</h2>
<table width="100%" border="0">

  <tr>
    <td width="10%"><img src="../img/ebayIcon2.jpg" width="91" height="40" /></td>
    <td width="21%">Prepare Auction Template</td>
    <td width="69%">
    <form class="compactForm" method="get" action="auctionCoinForm.php" id="addEbayForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>" /><input id="addEbayBtn" type="submit" value=" Create " />
</form>
    </td>
  </tr>
  <tr>
    <td width="10%"><img src="../img/soldIcon.jpg" width="91" height="40" /></td>
    <td width="21%">Mark Coin As Sold</td>
    <td width="69%">
    <form class="soldForm" method="get" action="soldCoinForm.php" id="addEbayForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>" /><input id="soldBtn" type="submit" value=" Create " />
</form>
    </td>
  </tr>
  <tr>
    <td width="10%"><img src="../img/saleIcon.jpg" width="91" height="40" /></td>
    <td width="21%">Mark Coin For Sale</td>
    <td width="69%">
    <form class="soldForm" method="get" action="saleCoinForm.php" id="saleCoinForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>" /><input id="saleCoinBtn" type="submit" value=" Create " />
</form>
    </td>
  </tr>
</table>

<hr />
<h3>&nbsp;</h3>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>