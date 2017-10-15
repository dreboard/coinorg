<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['collectfirstdayID'])) { 
$collectfirstdayID = intval($_GET['collectfirstdayID']);
$CollectionFirstday->getCollectFirstDayById($collectfirstdayID);

$FirstDay->getFirstDayByID($CollectionFirstday->getFirstdayID());
$FirstDay->getFirstdayID();
$coinType = $FirstDay->getCoinType();
}


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$firstdayNickname = mysql_real_escape_string($_POST["firstdayNickname"]);
$firstdayID = intval($_POST["firstdayID"]);
$FirstDay->getFirstDayByID($firstdayID);

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

$updateThis = mysql_query("UPDATE collectfirstday SET firstdayNickname = '$firstdayNickname', coinType = '$coinType', coinCategory = '$coinCategory', firstdayID = '$firstdayID', coinYear = '$coinYear', mintMark = '$mintMark', coinVersion = '$coinVersion', coinGrade = 'BU', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', condition = '$condition' WHERE collectfirstdayID = '$collectfirstdayID'") or die(mysql_error()); 

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
header("location: viewFirstDayDetail.php?collectfirstdayID=$collectfirstdayID");
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

$("#firstdayID").change(function() {
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

<div class="roundedWhite">
<img src="../img/firstdaySet.jpg" alt="" width="170" height="114" align="left" /><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm" class="clear">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Set Nickname</td>
    <td colspan="3"><input name="firstdayNickname" type="text" id="firstdayNickname" value="<?php echo $CollectionFirstday->getFirstdayNickname() ?>" /></td>
  </tr>
  <tr>
    <td width="198" class="darker">Set Type</td>
    <td colspan="3">
    <select name="firstdayID" id="firstdayID">
    <option value="<?php echo $CollectionFirstday->getFirstdayID() ?>" selected="selected"><?php echo $CollectionFirstday->getFirstdayNickname() ?></option>
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
    <td colspan="3" valign="top">
    <div id="coinDisplayList"></div>
    </td>
  </tr>
  <tr>
    <td class="darker"><label for="condition">Condition</label></td>
    <td colspan="3"><select id="condition" name="condition">
      <option value="<?php echo $CollectionFirstday->getFirstdayNickname() ?>" selected="selected"><?php echo $CollectionFirstday->getFirstdayNickname() ?></option>  
      <option value="Sealed">Mint Sealed Box</option>
      <option value="Envelope">Envelope (Box Opened)</option>
      <option value="Opened">Opened</option>
      </select>
      
      </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="3"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $CollectionFirstday->getFirstdayNickname() ?>" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td><span class="darker">
      </span>
      <select name="purchaseFrom2">
        <option value="<?php echo $CollectionFirstday->getPurchaseFrom() ?>" selected="selected"><?php echo $CollectionFirstday->getPurchaseFrom() ?></option>
        <option value="eBay">eBay</option>
        <option value="Coin Shop">Coin Shop</option>
        <option value="Other" >Other</option>
        <option value="None">None</option>
      </select></td>
    <td width="174">&nbsp;</td>
    <td width="326">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="3">
    <div id="ebayDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
    <td width="53%"><input name="auctionNumber" type="text" value="<?php echo $CollectionFirstday->getAuctionNumber() ?>" /></td>
    </tr>
  <tr>
    <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
    <td><input name="ebaySellerID" type="text" value="<?php echo $CollectionFirstday->getEbaySellerID() ?>" /></td>
    </tr>
</table>
  </div>
  
     <div id="shopDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="<?php echo $CollectionFirstday->getShopName() ?>" /></td>
    </tr>
  <tr>
    <td><label for="shopUrl">Website</label>
      &nbsp;</td>
    <td><input name="shopUrl" type="text" value="<?php echo $CollectionFirstday->getShopURL() ?>" /></td>
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
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php echo $CollectionFirstday->getAdditional() ?></textarea></td>
    </tr>
</table>
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="3"><input name="purchasePrice" type="text" id="purchasePrice" value="<?php echo $CollectionFirstday->getCoinPrice() ?>" /></td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td colspan="3"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="3"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $CollectionFirstday->getCoinNote() ?></textarea></td>
  </tr>

  <tr>
    <td valign="bottom"><input name="collectfirstdayID" type="hidden" value="<?php echo $collectfirstdayID ?>" />      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coins" /></td>
    <td colspan="3" id="endErrorMsg">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
