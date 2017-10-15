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
$collection->deleteCoin($collectionID, $userID); 
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
	$designation = 'None';
} else {
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
	$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
	$designation = mysql_real_escape_string($_POST["designation"]);
	//$collection->removeCertListStatus($collectionID, $userID);
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


$updateThis = mysql_query("UPDATE collection SET coinID = '$coinID', coinNickname = '".mysql_real_escape_string($_POST["coinNickname"])."', coinType = '$coinType', coinCategory = '$coinCategory', coinSubCategory = '$coinSubCategory', fullAtt = '".mysql_real_escape_string($_POST["fullAtt"])."',  proService = '$proService', proSerialNumber = '$proSerialNumber', designation = '$designation', slabCondition = '$slabCondition', slabLabel = '$slabLabel', coinGrade = '$coinGrade', coinGradeNum = '$coinGradeNum', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', byMint = '$byMint' WHERE collectionID = '$collectionID'") or die(mysql_error()); 

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

<table width="100%" border="0">
  <tr>
    <td colspan="2"><h1 class="tblH1"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo $coinLink ?>.jpg" alt="11" width="40" height="40" border="0" align="absmiddle" /></a> <a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink">Edit <?php echo $coinName; ?></a></h1></td>
  </tr>
  <tr>
    <td class="tdHeight"><span class="darker">Type: </span></td>
    <td class="tdHeight"><a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $collection->getCoinType()) ?>&amp;page=1"><?php echo $coinType ?></a></td>
  </tr>
  <tr>
    <td width="9%" class="darker">Nickname:</td>
    <td width="91%" class="brownLink"><?php echo $collection->getCoinNickname(); ?></td>
  </tr>
  <tr>
    <td width="9%" class="darker">Variety:</td>
    <td width="91%" class="brownLink"><?php echo $collection->getVarietyForCoin(intval($collectionID)); ?></td>
  </tr>
  <tr>
    <td class="darker">Errors:</td>
    <td class="brownLink"><?php echo $Errors->getErrorForCoin(intval($collectionID)); ?></td>
  </tr>
  <tr>
    <td colspan="2"><form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">

<input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>" />
<input name="deleteCoinFormBtn" type="submit" value="Delete Coin From Collection" onclick="return confirm('Delete this Coin?')" />
</form>
    &nbsp;| <a href="viewCoinDetail.php?ID=<?php echo $Encryption->encode($collectionID); ?>" class="darker">Return to Coin View</a></td>
    </tr>
</table>
<hr />

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
<table width="100%" border="0" cellpadding="3">

  <tr>
    <td colspan="2"><h2>Basic Details</h2></td>
    </tr>
  <tr>
    <td><label for="coinNickname">Nickname</label></td>
    <td>
      <input name="coinNickname" type="text" id="coinNickname" size="70" value="<?php echo $collection->getCoinNickname() ?>" /></td>
    </tr>
  <tr>
    <td width="172" class="darker">Year &amp; Mint</td>
    <td><select id="coinID" name="coinID">
<option value="<?php echo $coinID ?>" selected="selected"><?php echo $coinName ?></option>
<?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	if($coinType == 'No Coin'){
		$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType != 'No Coin'") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
	echo '<option value="'.intval($row['coinID']).'">'.strip_tags($row['coinName']).' '. strip_tags($row['coinType']).'</option>';
	}
	} else {
			
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinYear ASC") or die(mysql_error()); 
	while($row2 = mysql_fetch_array($getcoinType)){
		$coinID = $row2['coinID'];
		$coinType = $row2['coinType'];
		$name = $row2['coinName'];
echo '<option value="'.intval($row2['coinID']).'">'.strip_tags($row2['coinName']).'</option>';

	}
	}
?>
    </select></td>
  </tr>
<tr>
    <td class="darker">Grade</td>
    <td><select name="coinGrade">
<option value="<?php echo $collection->getCoinGrade() ?>" selected="selected"><?php echo $collection->getCoinGrade() ?> </option>    
<?php echo $collection->getGradeList($collection->getStrike()); ?>
</select></td>
  </tr>
<?php if (in_array($collection->getCoinType(), $fullTypes)) {?> 
  <tr>
    <td><label for="fullAtt">Full Attribute</label></td>
    <td><select name="fullAtt" id="fullAtt">
<option value="<?php echo $collection->getFullAtt() ?>" selected="selected"><?php echo $collection->getFullAtt() ?></option>
        
<?php if ($coinType == 'Jefferson Nickel'){ ?>        
<option value="FS">Full Steps</option>
<?php }?>
<?php if ($coinType == 'Standing Liberty'){ ?>    
<option value="FH">Full Head</option>
<?php }?>
<?php if ($coinType == 'Winged Liberty Dime'){ ?>   
<option value="FB">Full Band</option>
<?php }?>
<?php if ($coinType == 'Franklin Half Dollar'){ ?>   
<option value="FBL">Full Bell Lines</option>
<?php }?>

    </select></td>
  </tr>
 <?php } else { echo ''; }  ?>     
  
  <tr>
    <td class="darker"><label for="proService">Grading Service</label></td>
    <td><select id="proService" name="proService">
<option value="<?php echo $collection->getGrader() ?>" selected="selected"><?php echo $collection->getGrader() ?></option>
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
  <tr id="serialNumRow">
    <td class="darker">Serial Number</td>
    <td><input name="proSerialNumber" type="text" id="proSerialNumber" value="<?php echo $collection->getGraderNumber() ?>" size="70" /></td>
  </tr>
  <tr>
    <td class="darker"><label for="designation">Designation</label></td>
    <td><select name="designation" id="designation"><option value="None" selected="selected"><?php echo $collection->getDesignation() ?></option>
      <option value="DCAM">Deep Cameo Proof (DCAM)</option>
      <option value="CAM">Cameo Proof (CAM)</option>
      <option value="SP">Specimen (SP) Struck well like a Proof</option>
      <option value="Genuine">Genuine</option>
      <option value="Sample">Sample</option>
      <option value="Authentic">Authentic</option>
    </select></td>
  </tr>
  <tr id="labelRow">
    <td class="darker">Slab Label</td>
    <td><label for="slabLabel"></label>
      <input name="slabLabel" type="text" id="slabLabel" size="70" value="<?php echo $collection->getSlabLabel() ?>" /></td>
  </tr>
<tr id="slabConditionRow">
    <td><label for="slabCondition">Slab Condition</label></td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
    <?php $collection->getSlabCondition(); ?>
        <option value="Excellent">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>  
  
  <tr>
    <td class="darker">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h2>Purchase Details</h2></td>
    </tr>
      <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="<?php echo $collection->getCoinPrice() ?>" /></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" value="<?php echo $collection->getCoinDate() ?>" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td>
      <select name="purchaseFrom">
        <option value="<?php echo $collection->getPurchaseFrom() ?>" selected="selected"><?php echo $collection->getPurchaseFrom() ?> </option>    
        <option value="eBay">eBay</option>
        <option value="Coin Shop">Coin Shop</option>
        <option value="Other" >Other</option>
        <option value="None">None</option>
        </select>
      
      <span class="darker">
        </span></td>
    </tr>
  <tr>
    <td colspan="2" valign="top">
      <div class="detailDiv">
        <table width="60%" border="0">
          <tr>
            <td width="30%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="70%"><input name="auctionNumber" type="text" value="<?php echo $collection->getAuctionNumber() ?>" /></td>
            </tr>
          <tr>
            <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
            <td><input name="ebaySellerID" type="text" value="<?php echo $collection->getEbaySellerID() ?>" /></td>
            </tr>
          </table>
      </div>
      
      <div class="detailDiv">
        <table width="60%" border="0">
          <tr>
            <td width="30%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="70%"><input name="shopName" type="text" value="<?php echo $collection->getShopName() ?>" /></td>
            </tr>
          <tr>
            <td><label for="shopUrl">Website</label>
              &nbsp;</td>
            <td><input name="shopUrl" type="text" value="<?php echo $collection->getShopURL() ?>" /></td>
            </tr>
          </table>
      </div>
      
      <div class="detailDiv">
        <table width="99%" border="0">
          <tr>
            <td width="30%"> <label for="additional">Details</label>&nbsp;</td>
            <td width="70%">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2"><textarea name="additional" id="additional" cols="" rows="7" class="wideTxtarea"><?php echo $collection->getGraderNumber() ?></textarea></td>
            </tr>
          </table>
      </div>    </td>
    </tr>

  
    
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="darker">Notes</span></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $collection->getCoinNote() ?></textarea></td>
  </tr>

  <tr>
    <td valign="bottom"> 
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input type="submit" name="updateCoinBtn" id="updateCoinBtn" value="Update Coin" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>