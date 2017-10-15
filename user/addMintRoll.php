<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['rollMintID'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Roll';
} else {

$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$rollMintID = mysql_real_escape_string($_POST["rollMintID"]);
$CollectMintRolls->getMintRollById($rollMintID);
$coinYear = substr($CollectMintRolls->getRollName(), 0, 4);
$coinVersion = $CollectMintRolls->getCoinVersion();

$coinType = $CollectMintRolls->getCoinType();
$coinCategory = $CollectMintRolls->getCoinCategory();
$rollCondition = mysql_real_escape_string($_POST["rollCondition"]);


$proService = mysql_real_escape_string($_POST["proService"]);
$proSerialNumber = $collection->setToNone($_POST["proSerialNumber"]);	
$slabLabel = $collection->setToNone($_POST["slabLabel"]);
$designation = mysql_real_escape_string($_POST["designation"]);	
$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);

$rollHolder = "Mint Wrapped";
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
$coinGrade = "BU";

$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$additional = $collection->setToNone($_POST["additional"]);	
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

mysql_query("INSERT INTO collectrolls(rollNickname, rollMintID, coinVersion, design, rollType, coinType, coinCategory, rollCondition, proService, proSerialNumber, slabLabel, slabCondition, coinDesignation, rollHolder, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, coinGrade, enterDate, userID, coinYear, mintMark, faceVal) VALUES ('$rollNickname', '$rollMintID', '$coinVersion', '".$CollectMintRolls->getDesign()."', 'Mint', '$coinType', '$coinCategory', '$rollCondition', '$proService', '$proSerialNumber', '$slabLabel', '$slabCondition', '$designation', '$rollHolder', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$coinGrade', '$theDate', '$userID', '".$CollectMintRolls->getCoinYear()."', '".$CollectMintRolls->getMintMark()."', '".$CollectMintRolls->getFaceVal()."')") or die(mysql_error()); 

$collectrollsID = mysql_insert_id();

function getMintRollCoins($collectrollsID, $rollMintID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity) {
	    $folder = new Folder();
        $folder->getFolderByID($rollMintID);
		$coinList = explode(",", $folder->getFolderCoins());
		
		foreach ($coinList as $coinID) {
			$this->enterNewFolderCoins($collectfolderID, $coinID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity,  $purchaseDate);
		}
		
	return;
	}

	function enterNewMintRollCoins($collectrollsID, $coinID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity,  $purchaseDate){
		$coin = new Coin();
		$coin->getCoinById($coinID);
		$coinID = $coin->getCoinID();

$sql = mysql_query("INSERT INTO collection(coinID, collectfolderID, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, enterDate, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID."', '$collectfolderID', '$purchaseFrom', '$auctionNumber', '$additional', '0.00', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '".date('Y-m-d H:i:s')."', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', 'No Grade', '99', '$purchaseDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  
	return true;
	}


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
header("location: viewRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add U.S. Mint Roll</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2, #labelRow, #serialNumRow, #slabConditionRow, #designationRow").hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	

$("#proService").change(function() {
	$("#labelRow, #serialNumRow, #slabConditionRow, #designationRow").show();
});	

$("#addCentForm").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      }else if ($("#rollMintID").val() == "") {
        $("#errorMsg").text("Please select a roll...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollMintID").addClass("errorInput");
        return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname, #rollMintID").click(function(){
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
  <h1><img src="../img/Mint.jpg" width="100" height="100" align="absmiddle" /> Add U.S. Mint Roll</h1>
 <p><a href="addRollType.php" class="brownLinkBold">Back to roll types</a></p>
 <div id="CoinList">
<p class="darker">Recently added U.S. Mint Roll In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="70%">Type</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectrolls WHERE rollType = 'Mint' AND userID = '$userID' ORDER BY collectrollsID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any Mint rolls In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  $collectrollsID = intval($row['collectrollsID']); 
  $collectionRolls->getCollectionRollById($collectrollsID);

  $rollMintID = intval($row['rollMintID']); 
  $CollectMintRolls->getMintRollById($rollMintID);

  echo '
<tr>
<td><a href="viewMintRollDetail.php?ID='.$Encryption->encode($collectrollsID).'">'.$CollectMintRolls->getRollName().'</a></td>
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
    <td width="787" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="" /></td>
  </tr>
  <tr>
    <td width="182" class="darker">Roll Type</td>
    <td colspan="4">
    <select name="rollMintID" id="rollMintID">
    <option value="" selected="selected">Select A Roll Set</option>
<?php    
$query = mysql_query("SELECT * FROM rollsmint ORDER BY coinYear ASC") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $rollMintID = intval($row['rollMintID']);
  $rollName = strip_tags($row['rollName']);
	 echo '<option value="'.$rollMintID.'"> '.$rollName.'</option> ';	
  }

 ?>
 
    </select></td>
  </tr>
  <tr>
    <td width="184" class="darker"><label for="rollCondition">Condition</label></td>
    <td width="785" colspan="4"><select id="rollCondition" name="rollCondition">
      <option value="None" selected="selected">None</option>
      <option value="Sealed">Mint Sealed Box</option>
      <option value="Opened">Box Opened</option>
      <option value="Rolls">Rolls Only</option>
    </select></td>
  </tr>
    </table>
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  
  
    
  <tr>
    <td width="186" class="darker"><label for="proService">Grading Service</label></td>
    <td width="783" colspan="4"><select id="proService" name="proService">
      <option value="None" selected="selected">None</option>  
      <option value="PCGS">PCGS (Professional Coin Grading Service)</option>
      <option value="ICG">ICG (Independent Coin Grading Company)</option>
      <option value="NGC">NGC (Numismatic Guaranty Corporation of America)</option>
      <option value="ANACS">ANACS (American Numismatic Association Certification Service)</option>
      <option value="SEGS">SEGS (Sovereign Entities Grading Service Inc)</option>
      <option value="PCI">PCI</option>      
      <option value="ICCS">ICCS (International Coin Certification Service )</option>  
      <option value="HALLMARK">HALLMARK</option>  
      <option value="NTC">NTC</option>                                                       
      </select>
      
      </td>
  </tr>
  <tr id="labelRow">
    <td class="darker">Slab Label</td>
    <td colspan="4"><label for="slabLabel"></label>
      <input name="slabLabel" type="text" id="slabLabel" size="70" /></td>
  </tr>
  <tr id="serialNumRow">
    <td class="darker">Serial Number</td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="" size="70" /></td>
  </tr>
  <tr id="slabConditionRow">
    <td class="darker">Slab Condition</td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
    <option value="" selected="selected">None</option>
      <option value="Excellent" selected="Excellent">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  
  <tr id="designationRow">
    <td><strong>Designation</strong></td>
    <td colspan="4"><select name="designation" id="designation">
<option value="None" selected="selected">None</option>
<option value="Cameo Proof">Cameo Proof</option>
<option value="Deep Cameo Proof">Deep Cameo</option>
<option value="Ultra Cameo">Ultra Cameo</option>
</select></td>
  </tr>
    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="186"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
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
    <td valign="top">&nbsp;</td>
    <td colspan="4">
    <div id="eBay" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
    <td width="53%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
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
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
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
    <td width="47%"> <label for="showName">Show Name</label>&nbsp;</td>
    <td width="53%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
    </tr>
  <tr>
    <td><label for="showCity">City</label>&nbsp;</td>
    <td><input name="showCity" type="text" value="<?php if(isset($_POST["showCity"])){echo $_POST["showCity"];} else {echo "";}?>" /></td>
    </tr>
</table>
  </div> 
        <div id="Mint" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td><label for="mintBox">Presentation Box</label></td>
    <td><select name="mintBox" id="mintBox">
     <?php if(isset($_POST["mintBox"])){echo '<option value="'.$_POST["mintBox"].'" selected="selected">'.$_POST["mintBox"].'</option>';} else {
		echo '<option value="Yes" selected="selected">Yes</option>';}?>  
      <option value="No">No</option>
    </select></td>
  </tr>
  <tr>
    <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
    <td width="53%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php if(isset($_POST["additional"])){echo $_POST["additional"];} else {echo "";}?></textarea></td>
    </tr>
</table>
  </div> 
      <div id="None" class="detailDiv2">
&nbsp;
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="" /></td>
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
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input name="coinCategory" type="hidden" value="<?php echo $coinTypeSearch ?>" />
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
