<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 


function insertNone($value){
	if($value == ""){
		return "None";
	} else {
	return mysql_real_escape_string($value);
	}
}


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$firstdayNickname = mysql_real_escape_string($_POST["firstdayNickname"]);
$firstdayID = intval($_POST["firstdayID"]);
$FirstDay->getFirstDayByID($firstdayID);
$faceVal = $FirstDay->getFaceVal();
$condition = mysql_real_escape_string($_POST["condition"]);
$coinYear = substr($FirstDay->getSetName(), 0, 4);
$mintMark = "P&D";

$coinType = $FirstDay->getCoinType();
$coinCategory = $FirstDay->getCoinCategory();
$coinVersion = $FirstDay->getCoinVersion();



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


if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$additional = $collection->setToNone($_POST["additional"]);	
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);

mysql_query("INSERT INTO collectfirstday(firstdayNickname, mintMark, coinYear, firstdayID, coinVersion, coinType, coinCategory,  coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, faceVal) VALUES('$firstdayNickname', '$mintMark', '$coinYear', '$firstdayID', '$coinVersion', '$coinType', '$coinCategory', 'BU', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$faceVal')") or die(mysql_error()); 

$collectfirstdayID  = mysql_insert_id();
$FirstDay->getAllFirstdaySetCoins($firstdayID,$collectfirstdayID, $userID);

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
header("location: viewFirstDayDetail.php?ID=".$Encryption->encode($collectfirstdayID)."");
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
#errorMsg {display:block; margin-top:50px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	


$("#addCoinForm").submit(function() {
      if($("#firstdayID").val() == "")  {
		$("#errorMsg").text("Select a Set.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#firstdayID").addClass("errorInput");
      return false;
      }else if ($("#firstdayNickname").val() == "") {
        $("#errorMsg").text("Please enter a Nickname...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#firstdayNickname").addClass("errorInput");
        return false;
      }else {
	  return true;
	  }
});

$("#firstdayID, #firstdayNickname").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#waitMsg").hide();
$("#firstdayID").change(function() {
$('#waitMsg').show();	
var dataString = $(this).val();
$.ajax({url:"_mintArrayGet.php?firstdayID="+dataString, success:function(result){
$("#waitMsg").hide();	
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

<div class="roundedWhite">
<img src="../img/firstdaySet.jpg" alt="" width="170" height="114" align="left" /><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm" class="clear">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Set Nickname</td>
    <td colspan="4"><input type="text" name="firstdayNickname" id="firstdayNickname" /></td>
  </tr>
  <tr>
    <td width="198" class="darker">Set Type</td>
    <td colspan="4">
    <select name="firstdayID" id="firstdayID">
    <option value="" selected="selected">Select A Coin Set</option>
<?php    
$query = mysql_query("SELECT * FROM firstday ORDER BY coinYear ASC") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $firstdayID = intval($row['firstdayID']);
  $setName = strip_tags($row['setName']);
	 echo '<option value="'.$firstdayID.'"> '.$setName.'</option> ';	
  }

 ?>
 
    </select> <span id="waitMsg">Loading Coins........</span></td>
  </tr>
  <tr>
    <td class="darker">&nbsp;</td>
    <td colspan="4" valign="top">
    <div id="coinDisplayList"></div>
    </td>
  </tr>
  <tr>
    <td class="darker"><label for="condition">Condition</label></td>
    <td colspan="4"><select id="condition" name="condition">
      <option value="None" selected="selected">None</option>  
      <option value="Sealed">Mint Sealed Box</option>
      <option value="Envelope">Envelope Sealed (Box Opened)</option>
      <option value="Opened">Opened</option>
      </select>
      
      </td>
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
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coins" /></td>
    <td colspan="4" id="endErrorMsg">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
