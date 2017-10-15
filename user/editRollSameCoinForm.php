<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_',' ',  strip_tags($_GET["coinType"]));
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinID = $collectionRolls->getCoinID();
$coin->getCoinById($coinID);
$CoinTypes->getCoinByType($coinType);

$inRollRequest = mysql_query("SELECT * FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = ".$userID."") or die(mysql_error());
$inRollCount = mysql_num_rows($inRollRequest); 
$optionLimit = $CoinTypes->getRollCount() - $inRollCount; 

$coinTypeLink = strip_tags($_GET["coinType"]);

}

/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['rollNickname'] == '') {
	$_SESSION['errorMsg'] = 'Please Name your roll';
} else {
$collectrollsID = $Encryption->decode($_POST["ID"]);
$coin->getCoinById(mysql_real_escape_string($_POST["coinID"]));
$coinType = $coin->getCoinType();
$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
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

$updateThis = mysql_query("UPDATE collectrolls SET coinID = '".mysql_real_escape_string($_POST["coinID"])."', rollNickname = '$rollNickname', coinType = '$coinType', coinCategory = '".$coin->getCoinCategory()."', rollHolder = '$rollHolder', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', showName = '$showName', showCity = '$showCity' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID' ") or die(mysql_error());


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
<title>Edit Same Coin Roll</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

$("#addCentForm").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text('');
	$("#endErrorMsg").text('');
});	

});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><span class="darker"><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="auto" align="absmiddle" /></span> Edit  <?php echo $coinType ?> Roll</h1>
 <p><a href="viewSameRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>" class="brownLinkBold">Back to Roll Main View</a></p>
 
<hr />


<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl" cellpadding="2">

  <tr>
    <td class="darker">Current Coin</td>
    <td colspan="4">
    <select name="coinID" class="coinOptions">
    <option value="<?php echo $collectionRolls->getCoinID() ?>" selected="selected"><?php echo $coin->getCoinName(); ?> (Current)</option>
<?php        
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND byMint = '1' AND coinYear <= ".date('Y')." ORDER BY coinYear ASC") or die(mysql_error());
   while($row = mysql_fetch_array($sql))
		{
		  $coin->getCoinById(intval($row['coinID']));
		  $coinListName = $coin->getCoinName();
		  echo '<option value="'.intval($row['coinID']).'">'.$coinListName.'</option>';	
		}?>
        </select>    
    </td>
  </tr>
  <tr>
    <td class="darker">Roll Nickname</td>
    <td width="787" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="<?php echo $collectionRolls->getRollNickname(); ?>" /> <span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?>&nbsp;</span></td>
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
    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="186"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $collectionRolls->getCoinDate(); ?>" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong>Pruchase From</strong></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Shop">Coin Show</option>
      <option value="Show">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
    <td width="241">&nbsp;</td>
    <td width="238">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="32%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="68%"><input name="auctionNumber" type="text" value="<?php echo $collectionRolls->getAuctionNumber(); ?>" /></td>
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
            <td width="32%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="68%"><input name="shopName" type="text" value="<?php echo $collectionRolls->getShopName(); ?>" /></td>
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
            <td width="32%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="68%"><input name="showName" id="showName" type="text" value="<?php echo $collectionRolls->getShowName(); ?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php echo $collectionRolls->getShowCity(); ?>" /></td>
            </tr>
          </table>
      </div> 
      
      <div id="None" class="detailDiv2">
        
      </div>    </td>
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
    <input name="ID" type="hidden" value="<?php echo $_GET["ID"] ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Save Changes" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>