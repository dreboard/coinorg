<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

function enterMintsetCoin($coinID, $firstdayID, $coinType, $coinCategory){
mysql_query("INSERT INTO collection(coinID, coinType, coinCategory,  slabCondition, coinGrade, designation, problem, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, accountID, errorType, byMint, firstday) VALUES('$coinID', '$coinType', '$coinCategory', '$slabCondition',  '$coinGrade', '$designation', '$problem', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$accountID', '$errorType', '$byMint', '$firstday')") or die(mysql_error()); 

return true;
}


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$setNickname = mysql_real_escape_string($_POST["setNickname"]);
$coinType = mysql_real_escape_string($_POST["coinType"]);
$coinYear = intval($_POST["year1"]).intval($_POST["year2"]);
$mintMark = mysql_real_escape_string($_POST["mintMark"]);
$coinCategory = mysql_real_escape_string($_POST["coinCategory"]);
$rollType = 'Same Year';



if($_POST['rollHolder'] == '') {
	$rollHolder = 'Paper';
} else {
	$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);
}

$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);


if($_POST['proService'] == 'None') {
	$proService = 'None';
	$proSerialNumber = 'None';
	$slabLabel = 'None';
	$slabCondition = 'None';
} else {
	$proService = mysql_real_escape_string($_POST["proService"]);
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
	$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
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

$errorType = mysql_real_escape_string($_POST["errorType"]);
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);

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
$designation = mysql_real_escape_string($_POST["designation"]);


mysql_query("INSERT INTO collectrolls(setNickname, mintMark, coinYear, rollHolder, rollType, coinType, coinCategory, proService, proSerialNumber, slabCondition, slabLabel, coinGrade, designation, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, accountID) VALUES('$setNickname', '$mintMark', '$coinYear', '$rollHolder', '$rollType', '$coinType', '$coinCategory', '$proService', '$proSerialNumber', '$slabCondition', '$slabLabel', '$coinGrade', '$designation', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$accountID')") or die(mysql_error()); 

$collectrollsID = mysql_insert_id();
//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE collection SET  coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID'")  or die(mysql_error()); 
}
header("location: viewRollDetail.php?collectrollsID=$collectrollsID");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add U.S. First Day Coin Set</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$("#labelRow, #serialNumRow, #slabConditionRow, #certHolder").hide();


$("#proService").change(function() {
	$("#labelRow, #serialNumRow, #slabConditionRow, #certHolder").show();
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

$("#coinHdr").hide();
$("#firstdayID").change(function() {
$("#coinHdr").show();	
var dataString = $(this).val();
$.ajax({url:"../_query/mintArrayGet.php?firstdayID="+dataString, success:function(result){
$("#coinDisplayList").html(result);
}});

});	



	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Add U.S. Mint First Day Coin Set</h1>
  
 <p><a href="addSet.php">Back to set types</a></p>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<div class="roundedWhite">
<img src="../img/firstdaySets.jpg" alt="" width="610" height="114" />
<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Set Nickname</td>
    <td colspan="4"><input type="text" name="nickname" id="nickname" /></td>
  </tr>
  <tr>
    <td width="198" class="darker">Set Type</td>
    <td colspan="4">
    <select name="firstdayID" id="firstdayID">
    <option value="" selected="selected">Select A Coin Set</option>
<?php    
$query = mysql_query("SELECT * FROM firstday") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $firstdayID = intval($row['firstdayID']);
  $setName = strip_tags($row['setName']);
	 echo '<option value="'.$firstdayID.'"> '.$setName.'</option> ';	
  }

 ?>
 
    </select></td>
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
    <td class="darker"><label for="condition">Condition</label></td>
    <td colspan="4"><select id="condition" name="condition">
      <option value="None" selected="selected">None</option>  
      <option value="Sealed">Mint Sealed Box</option>
      <option value="Envelope">Envelope (Box Opened)</option>
      <option value="Opened">Opened</option>
      </select>
      
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
  <tr id="certHolder">
    <td class="darker"><label for="certHolder">Slab Type</label></td>
    <td colspan="4"><select id="certHolder" name="certHolder">
      <option value="None" selected="selected">None</option>  
      <option value="Individual">Individual (Coins in Own Holder)</option>
      <option value="Enclosed">Enclosed Envelope (Envelpoe Encased In Slab)</option>
      <option value="Dual">Dual (All Coins In One Slab)</option>
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
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
