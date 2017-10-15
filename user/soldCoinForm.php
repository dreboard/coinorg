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

if($_POST['sellDate'] == '') {
	$sellDate = $theDate;
} else {
	$sellDate = date("Y-m-d",strtotime($_POST["sellDate"]));
}

$sellPrice = mysql_real_escape_string($_POST["sellPrice"]);
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$buyer = $collection->setToNone($_POST["buyer"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$purchasePrice = $collection->getCoinPrice();
$purchaseDate = $collection->getCoinDate();
$purchaseFrom = $collection->getPurchaseFrom();


$coinNote = $collection->getCoinNote();
$purchaseFrom = $collection->getPurchaseFrom();
$additional = $collection->getAdditional();
$auctionNumber = $collection->getAuctionNumber();
$ebaySellerID = $collection->getEbaySellerID();
$shopName = $collection->getShopName();
$shopUrl = $collection->getShopURL();
$showName = $collection->getShowName();
$showCity = $collection->getShowCity();	

$updateThis = mysql_query("INSERT INTO selllist(buyer, buyerAddress, buyerCity, buyerState, buyerZip, coinID, mintMark, variety, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, proService, proSerialNumber, slabCondition, strike, slabLabel, coinGrade, coinGradeNum, designation, problem, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, offPercent, strikeNumber, offPercent2, broadstrikeType, bondedPlanchets, matedPairType, DoubleDenom1, DoubleDenom2, indentPercent, planchetType, planchetMetal, showName, showCity, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal, seriesType) VALUES('".mysql_real_escape_string($_POST["buyer"])."', '".mysql_real_escape_string($_POST["buyerAddress"])."', '".mysql_real_escape_string($_POST["buyerCity"])."', '".mysql_real_escape_string($_POST["buyerState"])."','".mysql_real_escape_string($_POST["buyerZip"])."','$coinID', '".$coin->getMintMark()."', '".$Collection->getVariety()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$Collection->getGrader()."', '".$Collection->getGraderNumber()."', '".$Collection->getSlabCondition()."', '".$coin->getCoinStrike()."', '".$collection->getSlabLabel()."', '".$Collection->getCoinGrade()."', '".$Collection->getCoinGradeNumber()."', '".$Collection->getDesignation()."', '".$collection->getProblem()."', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '".$collection->getErrorType()."', '".$coin->getErrorCoin()."', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$collection->getoffPercent()."', '".$collection->getstrikeNumber()."', '".$collection->getoffPercent2()."', '".$collection->getbroadstrikeType()."', '".$collection->getbondedPlanchets()."', '".$collection->getmatedPairType()."', '".$collection->getDoubleDenom1()."', '".$collection->getDoubleDenom2()."', '".$collection->getindentPercent()."', '".$collection->getplanchetType()."', '".$collection->getplanchetMetal()."', '$showName', '$showCity', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."', '".$coin->getCoinSeriesType()."')") or die(mysql_error()); 		

if($Collection->deleteCoinAndImages($collectionID, $userID)){
	header('Location: viewCoinSaleDetail.php?ID='.$Encryption->encode($collectionID).'');
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
    <td width="114" rowspan="7" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo $coinLink ?>.jpg" width="100" height="100" alt="11" /></a></td>
<td width="156" class="tdHeight"><span class="darker">Type: </span></td>
<td width="622" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
<td width="18"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $collection->getCoinGrade(); ?></a></td>
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
    <td colspan="2"><a href="viewCoinDetail.php?ID=<?php echo $Encryption->encode($collectionID); ?>" class="darker">Return to Coin View</a></td>
    </tr>

</table>


  <hr />
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
  <table width="979" border="0" cellpadding="3" class="addCoinTbl">
  <tr class="darker">
    <td width="969" class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';
}
 ?></td>
    </tr> 
  </table>
  
<h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Sale Details</h2> 
  <table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="181"><label for="sellDate">Sale Date</label></td>
    <td width="490"><input type="text" name="sellDate" id="sellDate" class="purchaseDate" value="<?php if(isset($_POST["sellDate"])){echo $_POST["sellDate"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="sellPrice">Sale Price</label></td>
    <td><input name="sellPrice" type="text" id="sellPrice" value="<?php if(isset($_POST["sellPrice"])){echo $_POST["sellPrice"];} else {echo "";}?>" /></td>
    </tr>
  <tr>
    <td valign="top"><label for="sellFees">Sell Fees</label></td>
    <td colspan="2"><input name="sellFees" type="text" id="sellFees" value="<?php if(isset($_POST["sellFees"])){echo $_POST["sellFees"];} else {echo "";}?>" /></td>
    <td width="146">&nbsp;</td>
    <td width="148">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label for="buyer">Buyer</label></td>
    <td><input name="buyer" type="text" value="<?php if(isset($_POST["buyer"])){echo $_POST["buyer"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="shopName">Shop Name</label></td>
    <td><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
  </tr>
</table>
    
<h2><img src="../img/buyerIcon.jpg" width="32" height="25" align="absmiddle" /> Buyer Details</h2>     
  <table width="979" border="0" class="addCoinTbl">
 <tr>
    <td><label for="buyer">Buyer Address</label></td>
    <td><input name="buyer" type="text" id="buyer" value="<?php if(isset($_POST["buyer"])){echo $_POST["buyer"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td width="185"><label for="buyerAddress">Buyer Address</label></td>
    <td colspan="4"><input type="text" name="buyerAddress" id="buyerAddress" value="<?php if(isset($_POST["buyerAddress"])){echo $_POST["buyerAddress"];} else {echo "";}?>" /></td>
  </tr>  
  
  <tr>
    <td valign="top"><label for="buyerCity">Buyer City</label></td>
    <td colspan="2"><input type="text" name="buyerCity" id="buyerCity" value="<?php if(isset($_POST["buyerCity"])){echo $_POST["buyerCity"];} else {echo "";}?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label for="buyerState">Buyer State</label></td>
    <td colspan="2"><select name="buyerState"  id="buyerState">
    
    <?php if(isset($_POST["buyerState"])){echo '<option value="'.$_POST["buyerState"].'" selected="selected">'.$_POST["buyerState"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
    
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="DC">Dist of Columbia</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="ID">Idaho</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MS">Mississippi</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VT">Vermont</option>
      <option value="VA">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="185"><label for="buyerZip">Buyer Zip</label></td>
    <td colspan="4"><input type="text" name="buyerZip" id="buyerZip" value="<?php if(isset($_POST["buyerZip"])){echo $_POST["buyerZip"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="soldOn">Sold</label></td>
    <td colspan="2"><select id="soldOn" name="soldOn">
          <?php if(isset($_POST["soldOn"])){echo '<option value="'.$_POST["soldOn"].'" selected="selected">'.$_POST["soldOn"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <option value="eBay">On eBay</option>
      <option value="Shop">At Coin Show</option>
      <option value="Show">To Coin Shop</option>
      <option value="Other">Other</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="32%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="68%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
            <td><input name="ebaySellerID" type="text" value="<?php if(isset($_POST["ebaySellerID"])){echo $_POST["ebaySellerID"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div>
      
      <div id="Shop" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="32%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="68%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="shopUrl">Website</label>
              &nbsp;</td>
            <td><input name="shopUrl" type="text" value="<?php if(isset($_POST["shopUrl"])){echo $_POST["shopUrl"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div>
      <div id="Show" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="32%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="68%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php if(isset($_POST["showCity"])){echo $_POST["showCity"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div> 
     </td>
    </tr>
    </table>
  
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">    
<tr>
    <td width="188"><label for="coinNote">Notes</label></td>
    <td width="781" colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php if(isset($_POST["coinNote"])){echo $_POST["coinNote"];} else {echo "";}?></textarea></td>
  </tr>  
  
  </table> 
    
<br />
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coin" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>

<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>