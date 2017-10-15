<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["ID"])) { 
$collectrollsID = $Encryption->decode($_GET["ID"]);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinType = $collectionRolls->getCoinType();
$coinTypeLink = strip_tags($_GET["coinType"]);
$CoinTypes->getCoinByType($coinType);

$coinID = $collectionRolls->getCoinID();
$coin->getCoinById($coinID);
}


/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['coinID'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Coin';
} else {
$collectrollsID = $Encryption->decode($_GET["ID"]);
$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$coinID = mysql_real_escape_string($_POST["coinID"]);
$coin->getCoinById($coinID);

$coinType = $coin->getCoinType();
$CoinTypes->getCoinByType($coinType);

$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);

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

$coinNote = $collection->setToNone($_POST["coinNote"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$additional = $collection->setToNone($_POST["additional"]);	
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	


$updateThis = mysql_query("UPDATE collectrolls SET coinID = '$coinID', mintMark = '".$coin->getMintMark()."', coinYear = '".$coin->getCoinYear()."', coinVersion = '".$coin->getCoinVersion()."', coinType = '".$coin->getCoinType()."', coinCategory = '".$coin->getCoinCategory()."', design = '".$coin->getDesign()."', rollNickname = '$rollNickname', rollHolder = '$rollHolder', rollCondition = '$rollCondition', proService = '$proService', proSerialNumber = '$proSerialNumber', slabLabel = '$slabLabel', slabCondition = '$slabCondition', designation = '$designation', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', showName = '$showName', showCity = '$showCity' faceVal = '".$collectionRolls->getThisRollFaceVal($collectrollsID, $userID)."' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID' ") or die(mysql_error()); 

//////////add file
if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
header("location: viewSameRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Same Year & Mint Roll</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2").hide();

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
      }else if ($("#coinID").val() == "") {
        $("#errorMsg").text("Please select a coin...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinID").addClass("errorInput");
        return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname, #coinID").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text(String.fromCharCode(160));
	$("#endErrorMsg").text(String.fromCharCode(160));
});	

});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="80" height="80" align="absmiddle" /> Add  <?php echo $coinType ?> Roll (Same Year &amp; Mint)</h1>
 <p><a href="addRollType.php">Back to roll types</a></p>
 <div id="CoinList">
<p class="darker">Recently added Same Coin Rolls In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="70%">Type</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectrolls WHERE rollType = 'Same Coin' AND userID = '$userID' ORDER BY collectrollsID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any same coin rolls In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  $collectrollsID = intval($row['collectrollsID']); 
  $collectionRolls->getCollectionRollById($collectrollsID);

  $coinID = intval($row['coinID']); 
  $coin->getCoinById($coinID);

  echo '
<tr>
<td><a href="viewRollDetail.php?ID='.$Encryption->encode($collectrollsID).'">'.$coin->getCoinName().'</a></td>
<td>'.$collectionRolls->getCoinPrice().'</td>
<td>'.date("M j, Y",strtotime($collectionRolls->getCoinDate())).'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<hr />
<span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?>&nbsp;</span>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td class="darker">Roll Nickname</td>
    <td width="787" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="<?php echo $collectionRolls->getRollNickname(); ?>" /></td>
  </tr>
  <tr>
    <td width="182" class="darker">Year/Mint</td>
    <td colspan="4"><select name="coinID" id="coinID">
    <option value="<?php echo $collectionRolls->getCoinID(); ?>" selected="selected"><?php echo $coin->getCoinName(); ?></option>
      <?php 
   $query = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_',' ',  $_GET["coinType"])."' AND byMint = '1' AND coinYear <= ".date('Y')." ORDER BY coinYear ASC") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $coinName = $row['coinName'];
  $coinID = $row['coinID'];
	 echo '<option value="'.$coinID.'"> '.$coinName.'</option> ';	
  }
 ?>
    </select></td>
  </tr>
  <tr>
    <td width="184" class="darker"><label for="rollHolder">Holder</label></td>
    <td width="785" colspan="4"><select name="rollHolder" id="rollHolder">
      <option value="<?php echo $collectionRolls->getRollHolder(); ?>" selected="selected"><?php echo $collectionRolls->getRollHolder(); ?></option>
      <option value="Paper">Paper</option>
      <option value="Tube">Tube</option>
      <option value="Plastic">Plastic</option>
    </select></td>
  </tr>
    <tr>
    <td class="darker">Add All Coins</td>
    <td><select name="addCoins" id="addCoins">
      <option value="0" selected="selected">No, Roll Only</option>
      <option value="1">Yes, Add All <?php echo $CoinTypes->getRollCount() ?> Coins</option>
    </select> 
      (All new coins will be added to collection)</td>
  </tr>
    </table>
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Grade Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  
  
    
  <tr>
    <td width="185" class="darker">Grades</td>
    <td width="784" colspan="4"><strong>
      <select name="coinGrade" id="coinGrade">
        <option value="<?php echo $collectionRolls->getCoinGrade(); ?>" selected="selected"><?php echo $collectionRolls->getCoinGrade(); ?></option>
        <option value="No Grade">No Grade </option>
        <option value="Good to XF ">Good to XF</option>
        <option value="Good to AU" >Good to AU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="F to XF ">Fine to Extra Fine</option>
        <option value="F to BU" >Fine to BU</option>
        <option value="XF to AU ">XF to AU</option>
        <option value="XF to BU" >XF to BU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="AU" >About Uncirculated</option>
        <option value="BU">Brilliant Uncirculated</option>
      </select>
    </strong></td>
  </tr>

    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="196"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $collectionRolls->getCoinDate(); ?>" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong>Pruchase From</strong></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
    <option value="<?php echo $collectionRolls->getPurchaseFrom(); ?>" selected="selected"><?php echo $collectionRolls->getPurchaseFrom(); ?></option>
      <option value="None">None</option>
      <option value="eBay">eBay</option>
      <option value="Shop">Coin Show</option>
      <option value="Show">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
    <td width="241">&nbsp;</td>
    <td width="238">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="4">
    <div id="eBay" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
    <td width="53%"><input name="auctionNumber" type="text" value="<?php echo $collectionRolls->getAuctionNumber(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
    <td><input name="ebaySellerID" type="text" value="<?php echo $collectionRolls->getEbaySellerID(); ?>" /></td>
    </tr>
</table>
  </div>
  
     <div id="Shop" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="<?php echo $collectionRolls->getShopName(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="shopUrl">Website</label>
      &nbsp;</td>
    <td><input name="shopUrl" type="text" value="<?php echo $collectionRolls->getShopUrl(); ?>" /></td>
    </tr>
</table>
  </div>
        <div id="Show" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="showName">Show Name</label>&nbsp;</td>
    <td width="53%"><input name="showName" id="showName" type="text" value="<?php echo $collectionRolls->getShowName(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="showCity">City</label>&nbsp;</td>
    <td><input name="showCity" type="text" value="<?php echo $collectionRolls->getShowCity(); ?>" /></td>
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
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="<?php echo $collectionRolls->getCoinPrice(); ?>" /></td>
  </tr>
    </table>
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">  
  <tr>
    <td width="186"><strong>Image</strong></td>
    <td width="783" colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $collectionRolls->getCoinNote(); ?></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input name="ID" type="hidden" value="<?php echo $_GET["ID"]; ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Mint Roll" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
