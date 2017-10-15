<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

function enterMintsetCoin($coinID, $mintsetID, $coinType, $coinCategory){
mysql_query("INSERT INTO collection(coinID, coinType, coinCategory,  slabCondition, coinGrade, designation, problem, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorType, byMint, firstday) VALUES('$coinID', '$coinType', '$coinCategory', '$slabCondition',  '$coinGrade', '$designation', '$problem', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$errorType', '$byMint', '$firstday')") or die(mysql_error()); 

return true;
}


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$setNickname = mysql_real_escape_string($_POST["setNickname"]);
$mintsetID = mysql_real_escape_string($_POST["mintsetID"]);
$Mintset->getMintsetById($mintsetID);

$coinYear = substr($Mintset->getSetName(), 0, 4);
$setType = '';
if($_POST['proService'] == 'None') {
	$proService = 'None';
	$coinGrade = 'None';
	$proSerialNumber = 'None';
	$slabLabel = 'None';
	$slabCondition = 'None';
} else {
	$proService = mysql_real_escape_string($_POST["proService"]);
	$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
	$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
}
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
case "US Mint":
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
	$additional = mysql_real_escape_string($_POST["additional"]);
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
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


mysql_query("INSERT INTO collectset(mintsetID, setType, setNickname, proService, proSerialNumber, slabCondition, slabLabel, coinGrade, designation, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID) VALUES('$mintsetID', '".$Mintset->getSetType()."', '$setNickname', '$proService', '$proSerialNumber', '$slabCondition', '$slabLabel', '$coinGrade', '$designation', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID')") or die(mysql_error()); 
$collectsetID = mysql_insert_id();
$Mintset->getAllMintSetCoins($collectsetID, $mintsetID, $userID);

//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE collectset SET  coinPic1 = '$coinPic1' WHERE collectsetID = '$collectsetID'")  or die(mysql_error()); 
}

header("location: viewSet.php?mintsetID=$mintsetID");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add U.S. Mint Coin Set</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript" src="https://www.mycoinorganizer.com/scripts/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="https://www.mycoinorganizer.com/scripts/jquery.form.js"></script>

<link rel="stylesheet" type="text/css" href="https://mycoinorganizer.com/style.css"/>

<script type="text/javascript" src="https://mycoinorganizer.com/scripts/main.js"></script>

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
<script type="text/javascript">
$(document).ready(function(){	
$("#coinHdr").hide();

$("#proService").change(function() {
	$("#labelRow, #serialNumRow, #slabConditionRow, #gradeRow").show();
});	

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

$("#coinType, #purchaseDate, #purchaseFrom, #purchasePrice, #proSerialNumber").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$("#getYear").click(function() {
$("#coinHdr").show();	
var coinYear = parseInt($("#century").val()+$("#theYear").val());
alert(coinYear);
$.ajax({
  url: '../_query/mintArrayGet2.php?coinYear='+coinYear,
  success: function(data) {
    $('#coinDisplayList').html(data);
  }
});

});

	
});
</script>     

</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Add Graded Coin Set</h1>
 <p><a href="addSet.php">Back to set types</a></p>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<div class="roundedWhite">

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Set Nickname</td>
    <td colspan="4"><input type="text" name="setNickname" id="setNickname" /></td>
  </tr>
  <tr>
    <td width="198" class="darker">Select Year</td>
    <td colspan="4">
<select name="century" id="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="theYear" id="theYear">
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

<input name="getYear" id="getYear" type="button" value="Go" /></td>
  </tr>
  <tr>
    <td class="darker">&nbsp;</td>
    <td colspan="4" valign="top">
    <h4 id="coinHdr">These Coins Will Be Entered Into Your Collection</h4>
    <div id="coinDisplayList">
    
    
    </div>
    </td>
  </tr>
    
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
      <input name="slabLabel" type="text" id="slabLabel" size="70" /></td>
  </tr>
  <tr id="gradeRow">
    <td class="darker">Grade</td>
    <td colspan="4"><select name="coinGrade">
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
    <td class="darker">Serial Number</td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="" size="70" /></td>
  </tr>
  <tr id="slabConditionRow">
    <td class="darker">Slab Condition</td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
      <option value="Excellent" selected="Excellent">Excellent</option>
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
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
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
      <input type="radio" name="purchaseFrom" value="US Mint" id="otherRad" />
      US Mint</label></td>
    <td width="326">
      <input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      <label for="noneRad">None</label></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="4">
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
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
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
    <input name="coinCategory" type="hidden" value="<?php echo $coinTypeSearch ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add  Coin" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<div class="spacer"></div>
 <p>Proof set coins from 1968 to the present contain "S" mint marked coins.  These were produced at the San Francisco United States government Mint.  Proof coin sets minted in 1964 and earlier have no mint mark and were produced at the Philadelphia United States government Mint.</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
