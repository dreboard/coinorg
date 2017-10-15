<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['ID'])) { 
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);

}
//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

$collectrollsID = $Encryption->decode($_POST['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);

$rollCondition = mysql_real_escape_string($_POST["rollCondition"]);
$proService = mysql_real_escape_string($_POST["proService"]);
$proSerialNumber = $collection->setToNone($_POST["proSerialNumber"]);	
$slabLabel = $collection->setToNone($_POST["slabLabel"]);
$designation = mysql_real_escape_string($_POST["designation"]);	
$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);

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

$updateThis = mysql_query("UPDATE collectrolls SET rollNickname = '$rollNickname', rollCondition = '$rollCondition', proService = '$proService', proSerialNumber = '$proSerialNumber', slabLabel = '$slabLabel', slabCondition = '$slabCondition', designation = '$designation', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', showName = '$showName', showCity = '$showCity' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID' ") or die(mysql_error()); 

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
header("location: viewMintRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");
}

//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
$coinID = $Encryption->decode($_POST["Coin"]);
mysql_query("DELETE FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error()); 
header("location: viewCoin.php?coinID=$coinID");
exit();
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
	$("#errorMsg").text('');
	$("#endErrorMsg").text('');
});	

});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1><img src="../img/<?php echo str_replace(' ', '_', $collectionRolls->getDesign()) ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> Edit <?php echo $collectionRolls->getRollNickname() ?> Roll</h1>
 <p><a href="viewMintRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Back to roll</a></p>
 
<hr />

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td colspan="5" class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?></td>
    </tr>
  <tr>
    <td class="darker">Roll Nickname</td>
    <td width="787" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="<?php echo $collectionRolls->getRollNickname() ?>" /></td>
  </tr>
  
  <tr>
    <td width="184" class="darker"><label for="rollCondition">Condition</label></td>
    <td width="787" colspan="4"><select id="rollCondition" name="rollCondition">
      <option value="<?php echo $collectionRolls->getRollCondition() ?>" selected="selected"><?php echo $collectionRolls->getRollCondition() ?></option>
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
      <option value="<?php echo $collectionRolls->getGrader() ?>" selected="selected"><?php echo $collectionRolls->getGrader() ?></option>  
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
      <input name="slabLabel" type="text" id="slabLabel" size="70" value="<?php echo $collectionRolls->getSlabLabel() ?>" /></td>
  </tr>
  <tr id="serialNumRow">
    <td class="darker">Serial Number</td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="<?php echo $collectionRolls->getGraderNumber() ?>" size="70" /></td>
  </tr>
  <tr id="slabConditionRow">
    <td class="darker">Slab Condition</td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
    <option value="<?php echo $collectionRolls->getSlabCondition() ?>" selected="selected"><?php echo $collectionRolls->getSlabCondition() ?></option>
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
<option value="<?php echo $collectionRolls->getDesignation() ?>" selected="selected"><?php echo $collectionRolls->getDesignation() ?></option>
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
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" value="<?php echo $collectionRolls->getCoinDate() ?>" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong>Pruchase From</strong></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
      <option value="<?php echo $collectionRolls->getPurchaseFrom() ?>" selected="selected"><?php echo $collectionRolls->getPurchaseFrom() ?></option>
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
            <td width="33%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="67%"><input name="auctionNumber" type="text" value="<?php echo $collectionRolls->getAuctionNumber() ?>" /></td>
            </tr>
          <tr>
            <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
            <td><input name="ebaySellerID" type="text" value="<?php echo $collectionRolls->getEbaySellerID() ?>" /></td>
            </tr>
          </table>
      </div>
      
      <div id="Shop" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="33%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="67%"><input name="shopName" type="text" value="<?php echo $collectionRolls->getShopName() ?>" /></td>
            </tr>
          <tr>
            <td><label for="shopUrl">Website</label>
              &nbsp;</td>
            <td><input name="shopUrl" type="text" value="<?php echo $collectionRolls->getShopUrl() ?>" /></td>
            </tr>
          </table>
      </div>
      <div id="Show" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="33%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="67%"><input name="showName" id="showName" type="text" value="<?php echo $collectionRolls->getShowName() ?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php echo $collectionRolls->getShowCity() ?>" /></td>
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
            <td width="34%"> <label for="additional">Details</label>&nbsp;</td>
            <td width="66%">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php echo $collectionRolls->getAdditional() ?></textarea></td>
            </tr>
          </table>
      </div> 
      <div id="None" class="detailDiv2">
        &nbsp;
      </div>    </td>
    </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="<?php echo $collectionRolls->getCoinPrice() ?>" /></td>
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
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $collectionRolls->getCoinNote() ?></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input name="ID" type="hidden" value="<?php echo $_GET['ID'] ?>" />
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
