<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_POST["addCoinFormBtn"])) { 
$coinType = str_replace('_', ' ', $_POST["coinType"]);
$CoinTypes->getCoinByType($coinType);
$coinCategory = $CoinTypes->getCoinCategory();
$bagType = 'Same Type';

echo $CoinTypes->getBagCount();
exit();
}


if (isset($_POST["addMintBagFormBtn2"])) { 
if($_POST['coinType'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Coin Type';
} else {
$coinType = str_replace('_', ' ', $_POST["coinType"]);

$CoinTypes->getCoinByType(str_replace('_', ' ', $_POST["coinType"]));
switch($coinType){
  case 'Mixed Cents':
  $bagType = 'Same Type';
  $coinCategory = 'Small Cent';
  break;
  case 'Mixed Nickels':
  $bagType = 'Same Type';
  $coinCategory = 'Nickel';
  break;
  case 'Mixed Dimes':
  $bagType = 'Same Type';
  $coinCategory = 'Dime';
  break;
  case 'Mixed Quarters':
  $bagType = 'Same Type';
  $coinCategory = 'Quarter';
  break;
  case 'Mixed Half Dollars':
  $bagType = 'Same Type';
  $coinCategory = 'Half Dollar';
  break;
  case 'Mixed Dollars':
  $bagType = 'Same Type';
  $coinCategory = 'Dollar';
  break;
break;
default:
  $bagType = 'Mint Bag';
}

$CoinCategories->getCoinByCategory($CoinTypes->getCoinCategory());

$coinYear = mysql_real_escape_string($_POST["coinYear"]);
$mintMark = mysql_real_escape_string($_POST["mintMark"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$bagCondition = mysql_real_escape_string($_POST["bagCondition"]);

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
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}

$insert = mysql_query("INSERT INTO collectbags(userID, bagNickname, bagType, coinType, coinCategory, coinYear, mintMark, purchaseFrom, purchaseDate, bagCondition, purchasePrice, coinNote, enterDate, faceVal, denomination, coinCount) VALUES('$userID', '".$collectionBags->setBagName($userID, str_replace('_', ' ', $_POST["coinType"]), $_POST['bagNickname'])."', '$bagType', '".$coinType."', '".$CoinTypes->getCoinCategory()."', '".$coinYear."', '$mintMark', '$purchaseFrom', '$purchaseDate', '$bagCondition', '$purchasePrice', '$coinNote', '".$theDate."', '".$CoinTypes->getBagVal()."', '".$CoinTypes->getDenomination()."', '".$CoinTypes->getBagCount()."')") or die(mysql_error()); 

$collectbagID  = mysql_insert_id();

if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID.'/bags/'.$collectbagID.'/');
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID.'/bags/'.$collectbagID.'/'. str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collectbags SET coinPic1 = '$coinPic1' WHERE collectbagID = '$collectbagID' AND userID = '$userID'") or die(mysql_error()); 
}
}
header("location: bagDetail.php?ID=".$Encryption->encode($collectbagID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Mint Bag</title>
<style type="text/css">
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}
#newBag {width:50px; height:auto;}
.bulkLinks {width:100px; height:auto;}
.rollHdr {margin:0px; padding:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$('#waitMsg, .detailDiv2').hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	
$("#proService").change(function() {
	$("#labelRow, #serialNumRow, #slabConditionRow, #designationRow").show();
   if (this.value == 'PCGS'){
      $('#pcgsVarietyRow').show();
   } else {
      $('#pcgsVarietyRow').hide();
   }
      if (this.value == 'NGC'){
      $('#ngcDetailsRow, #ngcDesignationRow').show();
   } else {
      $('#ngcDetailsRow, #ngcDesignationRow').hide();
   }
});	


$("#coinType").click(function() {
	$("#coinTypeLbl").removeClass("errorTxt");
	$("#coinType").removeClass("errorInput");
});

//ADD MINT BAG FORM
$("#addMintBagForm").submit(function () {
    if ($("#coinType").val() == "") {
        $("#coinTypeLbl").addClass("errorTxt");
        $("#coinType").addClass("errorInput");
        return false;
    } else {
        $("#addMintBagFormBtn").prop('value', 'Saving Bag...');
        return true;
    }
});

$("#coinType").change(function () {
    $('#waitMsg').show();
    var dataString = $(this).val();
    $.ajax({
        url: "_coinYears.php?coinType=" + dataString,
        success: function (result) {
            $('#waitMsg').hide();
            $("#coinYear").html(result);
        }
    });
});
	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1><span class="darker"><img id="newBag" src="../img/newBag.jpg" align="absmiddle" /></span> Add Mint Bag</h1>
<p class="clear"><a href="addBulk.php" class="brownLinkBold">Back to Bulk</a></p>
<p class="clear">To add State Quarter, Presidential Dollars, America the Beautiful ect.  Go To <a href="addMintBags.php" class="brownLinkBold">Add Coin Type Series Bag</a></p>
<div id="CoinList">
<p class="darker">Recently added Mint Bags In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectbags WHERE bagType = 'Mint Bag' AND userID = '$userID' ORDER BY collectbagID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any Mint Bags in Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $bagID = intval($row['bagID']); 
$MintBag->getMintBagByID($bagID);  
$collectbagID = intval($row['collectbagID']); 
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $purchasePrice = floatval($row['purchasePrice']);  

  echo '
<tr>
<td>'.$purchaseDate.'</td> 
<td><a href="bagDetail.php?ID='.$Encryption->encode($_GET['collectbagID']).'">'.$MintBag->getBagName().'</a></td>
<td>'.$purchasePrice.'</td>
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

<span class="errorTxt" id="errorMsg"><?php echo $_SESSION['errorMsg']; ?></span>
<br />
<div>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
<h2><img src="../img/bagIcon.jpg" width="32" height="41" align="absmiddle" /> Bag Details</h2>
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td><label for="bagNickname">Bag Nickname</label></td>
    <td colspan="3"><input name="bagNickname" type="text" id="bagNickname" value="" size="50" maxlength="50" /></td>
    <td width="397"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span></td>
  </tr>
  <tr>
    <td width="216"><label for="coinType">Coin Type</label></td>
    <td colspan="4"><select id="coinType" name="coinType">
      <option value="" selected="selected">Select Coin</option>
      <optgroup label="Cents $50">
        <option value="Mixed Cents">Mixed Cents</option>
        <option value="Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Nickels $200">
        <option value="Mixed Nickels">Mixed Nickels</option>
        <option value="Jefferson_Nickel">Jefferson</option>
        <option value="Westward_Journey">Westward Journey</option>
        <option value="Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes $1000">
        <option value="Mixed Dimes">Mixed Dimes</option>
        <option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Quarters $1000">
        <option value="Mixed Quarters">Mixed Quarters</option>
        <option value="Washington_Quarter">Washington Quarter</option>
        <option value="State Quarter">State Quarter</option>
        <option value="District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars $1000">
        <option value="Mixed Half Dollars">Mixed Half Dollars</option>
        <option value="Walking_Liberty">Walking Liberty Half</option>
        <option value="Franklin_Half_Dollar">Franklin Half</option>
        <option value="Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars $2000">
        <option value="Mixed Dollars">Mixed Dollars</option>
        <option value="Morgan_Dollar">Morgan Dollar</option>
        <option value="Peace_Dollar">Peace Dollar</option>
        <option value="Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select> <span id="waitMsg">Generating Years.....</span></td>
  </tr>  
  <tr>
    <td><label for="mintBox">Coin Year</label></td>
    <td colspan="4" valign="top"><select name="coinYear" id="coinYear">
      <option value="" selected="selected">---Select year---</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker" id="rollNameLbl"><label for="mintMark">Mint Mark</label></td>
    <td colspan="2"><select name="mintMark" id="mintMark">
      <option value="P" selected="selected">P</option>
      <option value="D">D</option>
      <option value="P&D">P&amp;D</option>
      <option value="Unknown">Unknown</option>
    </select></td>
  </tr>
  <tr id="boxConditionRow">
    <td><label for="bagCondition">Bag Condition</label></td>
    <td colspan="4"><select id="bagCondition" name="bagCondition">
    <?php if(isset($_POST["bagCondition"])){echo '<option value="'.$_POST["bagCondition"].'" selected="selected">'.$_POST["bagCondition"].'</option>';} else {
		echo '<option value="Excellent" selected="selected">Excellent</option>';}?>
      <option value="Slight Wear">Slight Wear</option>
      <option value="Heavy Wear">Heavy Wear</option>      
      <option value="Severely Worn">Severely Worn/Torn</option>
    </select></td>
  </tr>
  <tr id="sealedRow">
    <td><label for="sealed">Sealed</label></td>
    <td colspan="4"><select id="sealed" name="sealed">
    <?php if(isset($_POST["sealed"])){echo '<option value="'.$_POST["sealed"].'" selected="selected">'.$_POST["sealed"].'</option>';} else {
		echo '<option value="Yes" selected="selected">Yes</option>';}?>
      <option value="No">No</option>      
    </select></td>
  </tr>      
  </table>
   <hr />

  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
 <tr>
   <td><label for="coinValue">Coin Value</label></td>
   <td><input name="coinValue" type="text" id="coinValue" value="<?php if(isset($_POST["coinValue"])){echo $_POST["coinValue"];} else {echo "";}?>" class="purchasePrice" /></td>
 </tr>
 <tr>
    <td><label for="purchasePrice">Purchase Price</label></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="<?php if(isset($_POST["purchasePrice"])){echo $_POST["purchasePrice"];} else {echo "";}?>" class="purchasePrice" /></td>
  </tr>
  <tr>
    <td width="185"><label for="purchaseDate">Purchase Date</label></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" value="<?php if(isset($_POST["purchaseDate"])){echo $_POST["purchaseDate"];} else {echo "";}?>" /></td>
  </tr>  
  <tr>
    <td valign="top"><label for="purchaseFrom">Purchase  From</label></td>
    <td><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Show">Coin Show</option>
      <option value="Shop">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="32%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="68%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
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
            <td width="32%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="68%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
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
            <td width="32%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="68%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php if(isset($_POST["showCity"])){echo $_POST["showCity"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div> 
 </td>
 </tr>
 </table>
    <hr />

    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">    
  <tr>
    <td width="111"><label for="file">Image</label></td>
    <td width="858" colspan="4">
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>
<tr>
    <td><label for="coinNote">Notes</label></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>  
  
  </table>  
 <br />

  
  <table width="601">
  <tr>
    <td width="166" valign="bottom">  
    <input name="coinCategory" type="hidden" value="" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Bag" /></td>
    <td width="423" colspan="4" id="endErrorMsg" class="errorTxt">&nbsp;</td>
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
