<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$collectionID = $Encryption->decode($_GET['ID']);
$collection->getCollectionById($collectionID);
$coinType = $collection->getCoinType();
$coinID = $collection->getCoinID();
$proService = $collection->getGrader();
$coin-> getCoinById($coinID);
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
//getPageCategory
$linkName = str_replace(' ', '_', $coinType);
$coinLink = str_replace(' ', '_', $coinType);
}

//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
$collection->getCollectionById($collectionID);
$coinID = $collection->getCoinID();
mysql_query("DELETE FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error()); 
header("location: viewCoin.php?coinID=".$collection->getCoinID()."");
exit();
}

//////////ADD COIN
if (isset($_POST["updateCoinBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
$collection->getCollectionById($collectionID);

$coinID = mysql_real_escape_string($_POST["coinID"]);
$coin->getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$byMint = $coin->getByMint();

$proService = mysql_real_escape_string($_POST["proService"]);
if($_POST['proService'] == 'None') {
	$proSerialNumber = 'None';
	$slabLabel = 'None';
	$slabCondition = 'None';
} else {
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
	$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
	$collection->removeCertListStatus($collectionID, $userID);
}


if($_POST['purchasePrice'] == '') {
	$purchasePrice = '0.00';
} else {
	$purchasePrice = mysql_real_escape_string($_POST["purchasePrice"]);
}
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}

$errorType = mysql_real_escape_string($_POST["errorType"]);
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$coinGradeNum = $collection->getCoinGradeNum($coinGrade);
if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$auctionNumber = mysql_real_escape_string($_POST["auctionNumber"]);
$ebaySellerID = mysql_real_escape_string($_POST["ebaySellerID"]);
$shopName = mysql_real_escape_string($_POST["shopName"]);
$shopUrl = mysql_real_escape_string($_POST["shopUrl"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
$additional = mysql_real_escape_string($_POST["additional"]);

$updateThis = mysql_query("UPDATE collection SET coinID = '$coinID', coinType = '$coinType', coinCategory = '$coinCategory', coinSubCategory = '$coinSubCategory', proService = '$proService', proSerialNumber = '$proSerialNumber', slabCondition = '$slabCondition', slabLabel = '$slabLabel', coinGrade = '$coinGrade', coinGradeNum = '$coinGradeNum', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', errorType = '$errorType', byMint = '$byMint' WHERE collectionID = '$collectionID'") or die(mysql_error()); 

if($updateThis){
	header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
	exit;
  } else {
	  echo 'Update failed';
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	

$("#updateCoinBtn").click(function() {
	$(this).prop('value', 'Saving Changes...');
});

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

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a>,  U.S. <?php echo $coinCategory ?></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="114" rowspan="6" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo $coinLink ?>.jpg" width="100" height="100" alt="11" /></a></td>
<td width="156" class="tdHeight"><span class="darker">Type: </span></td>
<td width="622" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
<td width="18"></td>
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
    <td colspan="2"><a href="viewCoinDetail.php?ID=<?php echo $Encryption->encode($collectionID); ?>" class="darker">Return to Coin View</a></td>
    </tr>

</table>


<hr />


<form enctype="multipart/form-data" action="process.php" method="post" id="templateform">
<h2>Enter a title and description (optional)</h2>
<h3>Size</h3>
<table width="100%" border="0">
  <tr>
    <td width="33%"><h1>Title Of Auction</h1></td>
   <td width="33%"><h2>Title Of Auction</h2></td>
    <td width="33%"><h3>Title Of Auction</h3></td>
  </tr>
  <tr>
    <td>Large: <input type="radio" name="headerSize" id="radio" value="h1" /></td>
    <td>Medium: <input type="radio" name="headerSize" id="radio" value="h2" /></td>
    <td>Small: <input type="radio" name="headerSize" id="radio" value="h3" /></td>
  </tr>
  <tr>
    <td colspan="3"><span class="bottom">
       <label for="title">Title: </label><input type="text" name="title" id="title" value="" size="120" tabindex="1" />
    </span></td>
    </tr>
</table>

<h3>Description</h3>
<textarea rows="14" cols="40" name="description" id="description" tabindex="2" class="wysiwyg"></textarea>


<br />
<br />










  
  
  
  
  
  
<h2>Available Images</h2>
<table width="960" border="0">
  <tr align="center">
    <td>
 <?php 
 if($collection->getCoinImage1() !== '../img/noPic.jpg'){
 ?>   
    <label for="coinImage1">Include</label>
    <input type="checkBox" name="coinImage" id="coinImage1" value="<?php echo $collection->getCoinImage1() ?>" />
  <?php } else { echo ''; }?>  
    </td>
    <td>
  <?php 
 if($collection->getCoinImage2() !== '../img/noPic.jpg'){
 ?>     
 <label for="coinImage2">Include</label> 
    <input type="checkBox" name="coinImage" id="coinImage2" value="<?php echo $collection->getCoinImage2() ?>" />
    <?php } else { echo ''; }?>  
    </td>
    <td>
     <?php 
 if($collection->getCoinImage3() !== '../img/noPic.jpg'){
 ?>   
 <label for="coinImage3">Include</label>
    <input type="checkBox" name="coinImage" id="coinImage3" value="<?php echo $collection->getCoinImage3() ?>" />
    <?php } else { echo ''; }?>  
    </td>
    <td>
     <?php 
 if($collection->getCoinImage4() !== '../img/noPic.jpg'){
 ?>   
 <label for="coinImage4">Include</label>
    <input type="checkBox" name="coinImage" id="coinImage4" value="<?php echo $collection->getCoinImage4() ?>" />
    <?php } else { echo ''; }?>  
    </td>
  </tr>
  <tr align="center">
    <td width="240" class="imgRow"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage1().'" class="coinTblImg" />'; ?></td>
    <td width="240" class="imgRow"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage2().'" class="coinTblImg" />'; ?></td>
    <td width="240" class="imgRow"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage3().'" class="coinTblImg" />'; ?></td>
    <td width="240" class="imgRow"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage4().'" class="coinTblImg" />'; ?></td>
  </tr>
  <tr align="center">
    <td class="imgRow2">&nbsp;</td>
    <td class="imgRow2">&nbsp;</td>
    <td class="imgRow2">&nbsp;</td>
    <td class="imgRow2">&nbsp;</td>
  </tr>
  <tr align="center">
    <td class="imgRow2">&nbsp;</td>
    <td class="imgRow2">&nbsp;</td>
    <td class="imgRow2">&nbsp;</td>
    <td class="imgRow2">&nbsp;</td>
  </tr>
  </table>
<h2>Add terms and conditions (optional)</h2>
<h3>Shipping</h3>
<table width="100%" border="0">
  <tr>
    <td width="3%"><span class="clearfix">
      <input type="radio" name="terms1" id="terms1" value="I will ship to the USA only (48 contiguous states).  Shipping to AK, HI and PR will have an additional charge.  Please contact me for quote on shipping to AK, HI and PR." class="inlinecheckbox" tabindex="6" />
    </span></td>
    <td width="97%">I will ship to the USA only (48 contiguous states).  Shipping to AK, HI and PR will have an additional charge.  Please contact me for quote on shipping to AK, HI and PR.</td>
  </tr>
  <tr>
    <td><span class="clearfix">
      <input type="radio" name="terms1" id="terms2" value="I will ship to all 50 states in the USA and PR.  No international shipping please." class="inlinecheckbox" tabindex="7" />
    </span></td>
    <td><span class="clearfix">I will ship to all 50 states in the USA and PR.  No international shipping please.
    </span></td>
  </tr>
  <tr>
    <td><span class="clearfix">
      <input type="radio" name="terms1" id="terms3" value="I will ship to all 50 states in the USA and Internationally.  Please contact me for a quote on international shipping." class="inlinecheckbox" tabindex="8" />
    </span></td>
    <td><span class="clearfix">
    I will ship to all 50 states in the USA and Internationally.  Please contact me for a quote on international shipping.
    </span></td>
  </tr>
  <tr>
    <td><span class="clearfix">
      <input type="radio" name="terms1" id="terms3a" value="Free shipping." class="inlinecheckbox" tabindex="9" />
    </span></td>
    <td><span class="clearfix">
      Free shipping.
    </span></td>
  </tr>
</table>
<h3 class="formheading">Refunds and Returns</h3>
<table width="100%" border="0">
  <tr>
    <td width="3%"><span class="clearfix">
      <input type="checkbox" name="terms11" id="terms21" value=" All sales are final, and all items are sold 'as is'. Item condition is stated in the description; please read before bidding. If an item is damaged during shipping and no insurance was purchased, I will not issue a refund.  If item was damaged and insurance was purchased, please contact the shipping provider." class="inlinecheckbox" tabindex="10" />
    </span></td>
    <td width="97%"><span class="clearfix">All sales are final, and all items are sold 'as is'. Item condition is stated in the description; please read before bidding. If an item is damaged during shipping and no insurance was purchased, I will not issue a refund.  If item was damaged and insurance was purchased, please contact the shipping provider.</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td><span class="bottom">
      <textarea rows="14" cols="40" name="terms" id="terms" tabindex="11"></textarea>
    </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

  <p>Add Another (Up To 4 Images): 
  <form id="coinPic1Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="coinPic1" id="coinPic1" type="file" />
    <input name="coinPic1Btn" id="coinPic1Btn" type="submit" value="Upload" /></form></p>

                
				
                
                <div class="terms formsection box clearfix">
                	
                  <div class="bottom">
                        
                      <div class="clearfix">
                        <label for="terms1" class="inlinelabel"><small></small></label>
                    </div>
                        <div class="clearfix"></div>
                        
                    <div class="clearfix"></div>
    
                        
                        
                      <div class="clearfix"></div>
    
                        <h3 class="formheading">Custom Terms</h3>
                    <label for="terms" class="clear"><small>Enter any other terms or conditions here</small></label>
                    </div>
                </div>
  <div>
                        <input type="submit" id="preview" class="button" value="Preview Layout" tabindex="12" onClick="formPreview()" />
                        <input type="submit" id="submit" class="button" value="Generate HTML" tabindex="13" onClick="formProcess()" />
              </div>
</form>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>