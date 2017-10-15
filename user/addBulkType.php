<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

function setBulkNumber($userID){
$sql = mysql_query("SELECT bulkRollNum FROM collectionBulk WHERE userID = '$userID' ORDER BY bulkRollNum DESC LIMIT 1") or die(mysql_error());
return mysql_num_rows($sql) + 1;	
	
}

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_',' ',  $_GET["coinType"]);
$coinTypeLink = strip_tags($_GET["coinType"]);
$CoinTypes->getCoinByType($coinType);
}

if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['rollNums'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Number of Rolls';
} else {

$rollNums = mysql_real_escape_string($_POST["rollNums"]);
$coinType = mysql_real_escape_string($_POST["coinType"]);
$CoinTypes->getCoinByType($coinType);
$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);
$bulkRoll = '1';
if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

if($_POST['purchasePrice'] == '') {
	$purchasePrice = '0.00';
} else {
	$purchasePrice = mysql_real_escape_string($_POST["purchasePrice"]);
}
$rollPrice = round($purchasePrice/$rollNums, 2);
$coinNote = $collection->setToNone($_POST["coinNote"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$coinNote = $collection->setToNone($_POST["coinNote"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	
for ($i=1; $i<= $rollNums; $i++) {
	
$sql = mysql_query("INSERT INTO collectrolls(rollNickname, rollType, coinType, coinCategory, rollHolder, purchaseDate, purchaseFrom, auctionNumber, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, faceVal, denomination, bulkRoll) VALUES ('$rollNickname ".$i."', 'Same Type', '".$coinType."', '".$CoinTypes->getCoinCategory()."', '$rollHolder', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$rollPrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '".$CoinTypes->getRollVal()."', '".$CoinTypes->getDenomination()."', '$bulkRoll')") or die(mysql_error()); 
$collectrollsID = mysql_insert_id();	

$sql2 = mysql_query("INSERT INTO collectionBulk(coinID, collectrollsID, coins, coinType, coinCategory, enterDate, userID, denomination, bulkRollNum) VALUES('0', '$collectrollsID', '".$CoinTypes->getRollCount()."', '$coinType', '".$CoinTypes->getCoinCategory()."', '$theDate', '$userID', '".$CoinTypes->getDenomination()."', '".setBulkNumber($userID)."')") or die(mysql_error()); 
}

header("location: viewBulkRolls.php");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Bulk Rolls</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	



$("#addCentForm").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      }else if($("#rollNums").val() == ""){
		$("#errorMsg").text("Select Number of Rolls");
		$("#rollNums").addClass("errorInput");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		return false;
	}else {
		$("#addCoinFormBtn").prop('value', 'Saving Rolls...');  
	  return true;
	  }
});

$("#rollNickname, #rollNums").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text('');
	$("#rollNums").removeClass("errorTxt");
	$("#endErrorMsg").text('');
});	


});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo strip_tags($_GET["coinType"]) ?>.jpg" width="80" height="80" align="absmiddle" /> Add Bulk <?php echo $coinType ?> Rolls</h1>
 <p><a href="addRollType.php">Back to roll types</a></p>
 <hr />
<?php echo setBulkNumber($userID) ?>
<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';
}
 ?></td>
    <td width="722" class="errorTxt" id="errorMsg">&nbsp;</td>
    </tr>
  <tr>
    <td class="darker">Nicknames</td>
    <td><input name="rollNickname" type="text" id="rollNickname" size="80" value="" /> 
    *Numbered consecutively</td>
  </tr>
  <tr>
    <td class="darker"><label for="rollNums"># of Rolls</label></td>
    <td><select name="rollNums" id="rollNums">
      <option value="" selected="selected">Select</option>
        <?php 
for ($vam1 = 2; $vam1 <= 20; $vam1++) {
echo "<option value=".$vam1.">".$vam1."</option>";
}
?>
      </select>
    </select></td>
  </tr>  
  <tr>
    <td width="184" class="darker"><label for="rollHolder">Holder</label></td>
    <td width="785"><select name="rollHolder" id="rollHolder">
        <option value="Paper " selected="selected">Paper</option>
        <option value="Tube">Tube</option>  
        <option value="Plastic">Plastic</option>
        </select></td>
  </tr>
    </table>
  <br />
  
  
   <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2>  
  
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="186"><label for="purchaseDate">Purchase Date</label></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>  
    <tr>
    <td><label for="purchasePrice">Pruchase Price</label></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="purchaseFrom">Pruchase From</label></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Shop">Coin Show</option>
      <option value="Show">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
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
      
      <div id="None" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="47%">&nbsp; </td>
            <td width="53%">&nbsp;</td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          </table>
      </div>    </td>
    </tr>

    </table>
  <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">  
  <tr>
    <td width="186"><strong>Image</strong></td>
    <td width="783"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input name="coinType" type="hidden" value="<?php echo str_replace('_',' ',  $_GET["coinType"]); ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value=" Add Rolls " /></td>
    <td><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
