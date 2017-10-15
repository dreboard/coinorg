<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['ID'])) { 
$collectsetID = $Encryption->decode($_GET['ID']);
$CollectionSet->getCollectionSetById($collectsetID);

}


function editMintsetCoin($collectsetID, $collection, $userID, $coinCategory, $purchaseDate){
mysql_query("UPDATE collection SET(coinID, coinType, coinCategory,  slabCondition, coinGrade, designation, problem, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorType, byMint, firstday) VALUES('$coinID', '$coinType', '$coinCategory', '$slabCondition',  '$coinGrade', '$designation', '$problem', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '0.00', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$errorType', '$byMint', '$firstday')") or die(mysql_error()); 

return true;
}


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$collectsetID = $Encryption->decode($_POST['ID']);
$setNickname = mysql_real_escape_string($_POST["setNickname"]);
$mintsetID = mysql_real_escape_string($_POST["mintsetID"]);
$Mintset->getMintsetById($mintsetID);
$mintBox = mysql_real_escape_string($_POST["mintBox"]);
$coinYear = substr($Mintset->getSetName(), 0, 4);
$proService = mysql_real_escape_string($_POST["proService"]);
$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
$slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));

switch ($_POST["purchaseFrom"])
{
case "eBay":
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
	$auctionNumber = mysql_real_escape_string($_POST["auctionNumber"]);
	$ebaySellerID = mysql_real_escape_string($_POST["ebaySellerID"]);
	$additional = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
    $showName = 'None';
	$showCity = 'None';		
  break;
case "Coin Shop":
    $shopName = mysql_real_escape_string($_POST["shopName"]);
	$shopUrl = mysql_real_escape_string($_POST["shopUrl"]);
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$additional = 'None';		
	$showName = 'None';
	$showCity = 'None';	
	 break;
case "Coin Show":
    $showName = mysql_real_escape_string($_POST["showName"]);
	$showCity = mysql_real_escape_string($_POST["showCity"]);
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$additional = 'None';		
    	
	 break;	 
case "US Mint":
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
	$additional = mysql_real_escape_string($_POST["additional"]);
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
    $showName = 'None';
	$showCity = 'None';		
  break;
  default:
    $purchaseFrom = 'None';	
	$additional = 'None';	
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
    $showName = 'None';
	$showCity = 'None';	
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


mysql_query("INSERT INTO collectset(setVersion, mintBox, mintsetID, setType, setNickname, coinYear, strike, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, coinNote, enterDate, userID) VALUES('Mint', '$mintBox', '$mintsetID', '".$Mintset->getSetType()."', '$setNickname', '$coinYear', '".$Mintset->getCoinStrike()."', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '$coinNote', '$theDate', '$userID')") or die(mysql_error()); 



//////////add file
if(!empty($_FILES['file']['tmp_name'])){
	
	if($_FILES['file']['size'] > $max_filesize){
	$errorMsg = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collectset SET coinPic1 = '$coinPic1' WHERE collectsetID = '$collectsetID'")  or die(mysql_error()); 
}
}

header("location: viewMintSetDetail.php?ID=".$Encryption->encode($collectsetID)."");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit <?php echo $CollectionSet->getSetNickname(); ?></title>
<script type="text/javascript" src="../scripts/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="https://www.mycoinorganizer.com/scripts/js/jquery-ui-1.8.22.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://www.mycoinorganizer.com/scripts/css/smoothness/jquery-ui-1.8.22.custom.css"/>
<link rel="stylesheet" type="text/css" href="https://www.mycoinorganizer.com/scripts/css/jquery.ui.datepicker.css"/>

<script type="text/javascript" src="../scripts/jquery.form.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css"/>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30620319-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".purchaseDate").datepicker();

$("#addCoinForm").submit(function() {
      if($("#coinType").val() == "")  {
		$("#errorMsg").text("Select a penny type.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#typeLbl").addClass("errorTxt");
      return false;
      }else if ($("#purchaseDate").val() == "") {
        $("#errorMsg").text("Please enter a purchase date...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#purchaseDate").addClass("errorInput");
        return false;
      } else if ($("#purchaseFrom").val() == "") {
        $("#errorMsg").text("Please insert how you got the coin..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#purchaseFrom").addClass("errorInput");
        return false;
      }else if ($("#purchasePrice").val() == "") {
        $("#errorMsg").text("Please enter a purchase price click $0.00...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#noPriceSpn").show();
		$("#purchasePrice").addClass("errorInput");
        return false;
      } else if( $('#gradeService').val() !== 'Self' && $("#proSerialNumber").val() == ""){
      $("#errorMsg").text("Enter your serial number.");
	  $("#proSerialNumber").addClass("errorInput");
	  return false;
     }else if( $('#gradeService').val() !== 'Self' && $("#proGrade").val() == ""){
      $("#errorMsg").text("Enter a coin grade.");
	  $("#proGrade").addClass("errorInput");
	  $("#endErrorMsg").text("There are form errors... Scroll up to fix");
	  return false;
	} else {
	  return true;
	  }
});

$("#coinType, #purchaseDate, #purchaseFrom, #purchasePrice").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	

	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Edit <?php echo $CollectionSet->getSetNickname(); ?></h1>
<a href="viewSetDetail.php?ID=<?php echo $Encryption->encode($collectsetID) ?>">Back to <?php echo $CollectionSet->getSetNickname(); ?></a>
 
<hr />

<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<div class="roundedWhite">

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td><label for="setNickname">Set Nickname</label></td>
    <td colspan="4"><input name="setNickname" type="text" id="setNickname" value="<?php echo $CollectionSet->getSetNickname(); ?>" size="60" /></td>
  </tr>
    <tr>
    <td><label for="mintBox">Presentation Box</label></td>
    <td><select name="mintBox" id="mintBox">
    <?php if ($CollectionSet->getMintBox() == 'Yes') {?>   
      <option value="Yes" selected="selected">Yes</option>
      <option value="No">No</option>
     <?php } else {  ?> 
       <option value="No" selected="selected">No</option>
      <option value="Yes">Yes</option>
      <?php }?>     
    </select>
    
    </td>
  </tr>
  </table>
  
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  
  <tr>
    <td><label for="proService">Grading Service</label></td>
    <td colspan="4"><select id="proService" name="proService">
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
    <td><label for="coinGrade">Grade</label></td>
    <td colspan="4">
      <select name="coinGrade">
        <option value="No Grade" selected="selected">No Grade </option>
        <option value="B0">(B-0) Basal 0 </option>
        <option value="P1" >(PO-1) Poor</option>
        <option value="FR2">(FR-2) Fair</option>
        <option value="AG3">(AG-3) About Good</option>
        <option value="G4">(G-4) Good</option>
        <option value="G6">(G-6) Good</option>
        <option value="VG8">(VG-8) Very Good</option>
        <option value="VG10">(VG-10) Very Good</option>
        <option value="F12">(F-12) Fine</option>
        <option value="F15">(F-15) Fine</option>
        <option value="VF20">(VF-20) Very Fine</option>
        <option value="VF25">(VF-25) Very Fine</option>
        <option value="VF30">(VF-30) Very Fine</option>
        <option value="VF35">(VF-35) Very Fine</option>
        <option value="EF40">(EF-40) Extremely Fine</option>
        <option value="EF45">(EF-45) Extremely Fine</option>
        <option value="AU50">(AU-50) About Uncirculated</option>
        <option value="AU53">(AU-53) About Uncirculated</option>
        <option value="AU55">(AU-55) About Uncirculated</option>
        <option value="AU58">(AU-58) Very Choice About Uncirculated</option>
        <option value="MS60">(MS-60) Mint State Basal</option>
        <option value="MS61">(MS-61) Mint State Acceptable</option>
        <option value="MS62">(MS-62) Mint State Acceptable</option>
        <option value="MS63">(MS-63) Mint State Acceptable</option>
        <option value="MS64">(MS-64) Mint State Acceptable</option>
        <option value="MS65">(MS-65) Mint State Choice</option>
        <option value="MS66">(MS-66) Mint State Choice</option>
        <option value="MS67">(MS-67) Mint State Choice</option>
        <option value="MS68">(MS-68) Mint State Premium</option>
        <option value="MS69">(MS-69) Mint State All-But-Perfect</option>
        <option value="MS70">(MS-70) Mint State Perfect</option>
        <option value="PR35">(PR-35) Impaired Proof.</option>
        <option value="PR40">(PR-40) Impaired Proof.</option>
        <option value="PR45">(PR-45) Impaired Proof.</option>
        <option value="PR50">(PR-50) Impaired Proof.</option>
        <option value="PR55">(PR-55) Impaired Proof.</option>
        <option value="PR58">(PR-58) Impaired Proof.</option>
        <option value="PR60">(PR-60) Brilliant Proof.</option>
        <option value="PR61">(PR-61) Brilliant Proof.</option>
        <option value="PR62">(PR-62) Brilliant Proof.</option>
        <option value="PR63">(PR-63) Brilliant Proof.</option>
        <option value="PR64">(PR-64) Brilliant Proof.</option>
        <option value="PR65">(PR-65) Gem Proof.</option>
        <option value="PR66">(PR-66) Choice Gem Proof.</option>
        <option value="PR67">(PR-67) Extraordinary Proof.</option>
        <option value="PR68">(PR-68) Extraordinary Proof.</option>
        <option value="PR69">(PR-69) Extraordinary Proof.</option>
        <option value="PR70">(PR-70) Perfect Proof.</option>
      </select></td>
  </tr>
  <tr id="serialNumRow">
    <td><label for="proSerialNumber">Serial Number</label></td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="<?php echo $CollectionSet->getSetNickname(); ?>" size="70" /></td>
  </tr>
  <tr id="slabConditionRow">
    <td><label for="slabCondition">Slab Condition</label></td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
      <option value="Excellent" selected="selected">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  
  
  </table>
   
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
    <tr>
    <td><label for="purchasePrice">Purchase Price</label></td>
    <td colspan="5"><input name="purchasePrice" type="text" id="purchasePrice" value="<?php echo $CollectionSet->getCoinPrice(); ?>" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><label for="purchaseDate">Purchase Date</label></td>
    <td colspan="5"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $CollectionSet->getCoinDate(); ?>" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="purchaseFrom">Obtained From</label></td>
    <td width="104">
            
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            <label for="eBayRad">eBay</label></td>
    <td width="163"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
<label for="shopRad">Coin Shop</label></td>
    <td width="132">
     <input type="radio" name="purchaseFrom" value="Mint" id="otherRad" />
      <label for="mintRad">U.S Mint</label></td>
    <td width="189">
      <input name="purchaseFrom" type="radio" id="coinShowRad" value="Coin Show" />
      <label for="coinShowRad">Coin Show</label></td>
    <td width="189"><input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      <label for="noneRad">None</label></td>
  </tr>
  <tr>
    <td colspan="4">
    <div id="ebayDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
    <td width="53%"><input name="auctionNumber" type="text" value="<?php echo $CollectionSet->getAuctionNumber(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
    <td><input name="ebaySellerID" type="text" value="<?php echo $CollectionSet->getEbaySellerID(); ?>" /></td>
    </tr>
</table>
  </div>
<div id="coinShowDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="showName">Show Name</label>&nbsp;</td>
    <td width="53%"><input name="showName" id="showName" type="text" value="<?php echo $CollectionSet->getShowName(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="showCity">City</label>&nbsp;</td>
    <td><input name="showCity" type="text" value="<?php echo $CollectionSet->getShowCity(); ?>" /></td>
    </tr>
</table>
  </div>  
     <div id="shopDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="<?php echo $CollectionSet->getShopName(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="shopUrl">Website</label>
      &nbsp;</td>
    <td><input name="shopUrl" type="text" value="<?php echo $CollectionSet->getShopUrl(); ?>" /></td>
    </tr>
</table>
  </div>
  
      <div id="otherDetails" class="detailDiv">
<table width="60%" border="0">

  <tr>
    <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
    <td width="53%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php echo $CollectionSet->getAdditional(); ?>
    </textarea></td>
    </tr>
</table>
  </div> 
  
     </td>
  </tr>

  </table>
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">    
  <tr>
    <td><label for="file">Image</label></td>
    <td colspan="4">
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      </td>
  </tr>
<tr>
    <td><label for="coinNote">Notes</label></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $CollectionSet->getCoinNote(); ?>
    </textarea></td>
  </tr>  
  
  </table>  
 <br />

  
  <table>
  <tr>
    <td valign="bottom">  
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectsetID) ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coin" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<div class="spacer"></div>
 <p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
