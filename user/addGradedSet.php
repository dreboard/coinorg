<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
if($_POST["century"] == '' || $_POST["theYear"] == ''){
	$_SESSION['errorMsg'] = 'Select Coins For Set';
} else {


$setNickname = mysql_real_escape_string($_POST["setNickname"]);
$coinYear = mysql_real_escape_string($_POST["century"]).mysql_real_escape_string($_POST["theYear"]);
$proService = mysql_real_escape_string($_POST["proService"]);

$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
if($_POST['coinGrade'] == 'No Grade') {
	$coinGradeNum = '0';
} else {
	$coinGradeNum = preg_replace('#[^0-9]#i', '', $coinGrade); 
}


$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
$slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
$slabType = mysql_real_escape_string($_POST["slabType"]);
$firstday = mysql_real_escape_string($_POST["firstday"]);
$designation = mysql_real_escape_string($_POST["designation"]);

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}
switch ($_POST["purchaseFrom"])
{
case "eBay":
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
	$auctionNumber = mysql_real_escape_string($_POST["auctionNumber"]);
	$ebaySellerID = mysql_real_escape_string($_POST["ebaySellerID"]);
	$additional = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
  break;
case "Coin Shop":
    $shopName = mysql_real_escape_string($_POST["shopName"]);
	$shopUrl = mysql_real_escape_string($_POST["shopUrl"]);
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$additional = 'None';		
	 break;
case "Coin Show":
    $showName = mysql_real_escape_string($_POST["showName"]);
	$showCity = mysql_real_escape_string($_POST["showCity"]);
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$additional = 'None';		
    $mintBox = 'No'; 	
	 break;
  default:
    $purchaseFrom = 'None';	
	$additional = 'None';	
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	

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

mysql_query("INSERT INTO collectset(coinYear, setVersion, setType, setNickname, proService, proSerialNumber, slabCondition, slabLabel, coinGrade, designation, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, firstday) VALUES('$coinYear', 'Year', 'Year Set', '$setNickname', '$proService', '$proSerialNumber', '$slabCondition', '$slabLabel', '$coinGrade', '$designation', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$firstday')") or die(mysql_error()); 
$collectsetID = mysql_insert_id();

if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
	if(!empty($coinID['theID'])){
		$coin->getCoinById($coinID['theID']);
		$coinSql = mysql_query("INSERT INTO collection(coinID, coinType, coinCategory, slabCondition, slabType, coinGrade, designation, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, byMint, firstday,mintMark, coinYear, coinGradeNum, coinVersion, collectsetID, proService, proSerialNumber, commemorative, byMintGold, century, series, design, denomination, strike) VALUES('".$coinID['theID']."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '$slabCondition', '$slabType', '".$coinID['coinGrade']."', '$designation', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '0.00', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '".$coin->getByMint()."', '$firstday','".$coin->getMintMark()."', '".$coin->getCoinYear()."', '".$collection->getCoinGradeNum($coinID['coinGrade'])."', '".$coin->getCoinVersion()."', '$collectsetID', '$proService', '$proSerialNumber', '".$coin->getCommemorative()."', '".$coin->getByMintGold()."', '".$coin->getCentury()."', '".$coin->getSeries()."', '".$coin->getDesign()."', '".$coin->getDenomination()."', '".$coin->getCoinStrike()."')") or die(mysql_error()); 
	}
   }
}

//////////add file
if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/sets/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/sets/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collectset SET coinPic1 = '$coinPic1' WHERE collectsetID = '$collectsetID' AND userID = '$userID'")  or die(mysql_error()); 
}
}

header("location: viewSetDetail.php?ID=".$Encryption->encode($collectsetID)."");
exit();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Graded Year Coin Set</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<?php include("../secureScripts.php"); ?>
<script type="text/javascript">
$(document).ready(function(){	
$("#coinHdr, #waitMsg").hide();
$(".showDate").datepicker();

$("#addSetForm").submit(function() {
      if($("#setNickname").val() == "")  {
		$("#errorMsg").text("Enter A Set Name.....");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#setNickname").addClass("errorInput");
      return false;
      }else if ($("#century").val() == "") {
        $("#errorMsg").text("Please Select A Century...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#century").addClass("errorInput");
        return false;
      }else if ($("#theYear").val() == "") {
        $("#errorMsg").text("Please Select A Year...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#theYear").addClass("errorInput");
        return false;
      }else if ($("#proService").val() == "") {
        $("#errorMsg").text("Please Select A Coin Service...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#proService").addClass("errorInput");
        return false;
      } else if ($("#proSerialNumber").val() == "") {
        $("#errorMsg").text("Enter Slab Serial Number..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#proSerialNumber").addClass("errorInput");
        return false;
      } else if ($(".theCoin input:checked").length < 1){
		$("#errorMsg").text("Please Select at Least One Coin.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
        return false;
    }else {
	  return true;
	  }
});

$("#setNickname, #proService, #proSerialNumber, #century, #theYear").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$("#getYear").click(function() {
$("#coinHdr").show();	
$('#waitMsg').show();
var coinYear = parseInt($("#century").val()+$("#theYear").val());
//alert(coinYear);
$.ajax({
  //url: '../inc/yearArray.php?coinYear='+coinYear,
  url: '_yearArray.php?coinYear='+coinYear,
  success: function(data) {
	  $('#waitMsg').hide();
    $('#coinDisplayList').html(data);
  }
});

});


$("#getYear").click(function() {
$("#coinIDValidate").val('1');	
});

//////////////////////////////////////////////////////////////////////////////////
$("#shopDetails, #ebayDetails, #otherDetails, #coinShowDetails").hide();

$("#eBayRad").click(function() {
	$("#ebayDetails").show();
	$(".detailDiv").not("#ebayDetails").hide();
});
$("#shopRad").click(function() {
	$("#shopDetails").show();
	$(".detailDiv").not("#shopDetails").hide();
});
$("#otherRad").click(function() {
	$("#otherDetails").show();
	$(".detailDiv").not("#otherDetails").hide();
});
$("#noneRad").click(function() {
	$(".detailDiv").hide();
});
$("#showRad").click(function() {
	$("#coinShowDetails").show();
	$(".detailDiv").not("#coinShowDetails").hide();
});

$('#name').prop('selectedIndex',0);	
});
</script>     

</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1><img src="../img/SetIcon2.jpg" width="120" height="62" align="absmiddle" /> Add Graded Year Coin Set</h1>
 <p><a href="addSet.php" class="brownLinkBold">Back to set types</a></p>
 <div id="CoinList">
<p class="darker">Recently Added  Sets In Your Collection | <a href="mintsetHistory.php" class="brownLinkBold">Mint Set History</a></p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="13%">Date</td>
    <td width="40%">Set</td>
    <td width="31%">Type</td>   
    <td width="16%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectset WHERE userID = '$userID' AND setVersion = 'Year' ORDER BY collectsetID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="4">You dont have any graded year sets in your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  
  if($row['coinPic1'] == 'blankBig.jpg'){
	  $thumb = '<img src="../img/1.jpg" width="25" height="25" />';
  } else {
	  $thumb = '<img src="'.$userID.'/'.$row['coinPic1'].'" width="auto" height="25" />';
  }
  $collectsetID = intval($row['collectsetID']); 
  $mintsetID = intval($row['mintsetID']); 
  $CollectionSet->getCollectionSetById($collectsetID);
  $Mintset->getMintsetById($CollectionSet->getMintsetID());


  $thePageCode = "Go to the view coin page to view this coin";
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td>'.date("M j, Y",strtotime($CollectionSet->getCoinDate())).'</td> 
<td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'">'.$CollectionSet->getSetNickname().'</a></td>
<td><a href="viewSet.php?mintsetID='.$mintsetID.'">'.substr($Mintset->getSetName(), 0, 30).'</a></td>
<td>'.$CollectionSet->getCoinPrice().'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<hr />

<span class="errorTxt" id="errorMsg"><?php echo $_SESSION['errorMsg']; ?></span>
<div>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addSetForm">
<h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Set/Coin Details</h2>
  <table width="100%" border="0" cellpadding="3">

  <tr>
    <td class="darker">Set Nickname</td>
    <td colspan="4"><input name="setNickname" type="text" id="setNickname" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td width="198" class="darker"><label for="century">Select Year</label></td>
    <td colspan="4">
<select name="century" id="century">
<option value="" selected="selected">Century</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="theYear" id="theYear">
<option value="" selected="selected">Year</option>
<option value="00">00</option>
<?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?>
</select>

<input name="getYear" id="getYear" type="button" value="Get Coins" /> <span id="waitMsg">Loading Coins........</span></td>
  </tr>
  <tr>
    <td colspan="5" class="darker">
      <h4 id="coinHdr">Select coins</h4>
      <div id="coinDisplayList">
        
        
      </div>    </td>
    </tr>
</table>

<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Details</h2> 
<table width="100%" cellpadding="3">    
  <tr>
    <td class="darker"><label for="proService">Grading Service</label></td>
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
    <td class="darker">Slab Label</td>
    <td colspan="4"><label for="slabLabel"></label>
      <input name="slabLabel" type="text" id="slabLabel" size="70" maxlength="70" /></td>
  </tr>
  <tr id="gradeRow">
    <td class="darker">Set Grade</td>
    <td colspan="4"><select name="coinGrade">
      <option value="No Grade" selected="selected">No Grade </option>
      <option value="BU">Brilliant Uncirculated </option>
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
    </select> 
    (if all same grade)</td>
  </tr>
  <tr id="serialNumRow">
    <td class="darker">Serial Number</td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="" size="70" /></td>
  </tr>
  <tr id="slabTypeRow">
    <td class="darker">Slab Type</td>
    <td colspan="4"><select id="slabType" name="slabType">
      <option value="Individual" selected="Individual" selected="selected">Individual</option>
      <option value="Group">Group</option>
    </select></td>
  </tr>
  <tr id="slabConditionRow">
    <td class="darker">Slab Condition</td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
      <option value="Excellent" selected="selected">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  
  <tr>
    <td><strong>Designation</strong></td>
    <td colspan="4"><select name="designation" id="designation">
<option value="None" selected="selected">None</option>
<option value="Cameo Proof">Cameo Proof</option>
<option value="Deep Cameo Proof">Deep Cameo</option>
<option value="Ultra Cameo">Ultra Cameo</option>
</select></td>
  </tr>
  <tr>
    <td><strong>First Day</strong></td>
    <td colspan="4"><p>
      <label>
        <input type="radio" name="firstday" value="1" id="firstDay_0" />
        Yes</label>
      <label>
        <input name="firstday" type="radio" id="firstDay_1" value="0" checked="checked" />
        No</label>
      <br />
    </p></td>
  </tr>
    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="100%" border="0" cellpadding="3">
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="5"><input type="text" name="purchaseDate" id="purchaseDate" class="showDate" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td width="107"><span class="darker">
    </span>
            
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            <label for="eBayRad">eBay</label></td>
    <td width="152"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
<label for="shopRad">Coin Shop</label></td>
    <td width="174">
      <label>
      <input type="radio" name="purchaseFrom" value="Coin Show" id="showRad" />
      Coin Show</label></td>
    <td width="162">
      <input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      <label for="noneRad">None</label></td>
    <td width="162">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">
    <div id="ebayDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
    <td width="53%"><input name="auctionNumber" type="text" value="" /></td>
    </tr>
  <tr>
    <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
    <td><input name="ebaySellerID" type="text" value="" /></td>
    </tr>
</table>
  </div>
<div id="coinShowDetails" class="detailDiv">
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
     <div id="shopDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="" /></td>
    </tr>
  <tr>
    <td><label for="shopUrl">Website</label>
      &nbsp;</td>
    <td><input name="shopUrl" type="text" value="" /></td>
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
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"></textarea></td>
    </tr>
</table>
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="5"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>  </table>
  
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="100%" border="0" cellpadding="3">  
    <td><strong>Image</strong></td>
    <td colspan="4"><label for="file"></label>
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
    <input id="coinIDValidate" name="coinIDValidate" type="hidden" value="" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Set" /></td>
    <td colspan="4" id="endErrorMsg" class="errorTxt">&nbsp;</td>
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
