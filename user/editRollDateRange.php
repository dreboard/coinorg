<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["ID"])) { 
$collectrollsID = $Encryption->decode($_GET["ID"]);
$collectionRolls->getCollectionRollById($collectrollsID);

}


/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['coinType'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Coin Type';
} else {

$collectrollsID = $Encryption->decode($_POST["ID"]);
$coinYearRange = mysql_real_escape_string($_POST["startYear"]).' to '. mysql_real_escape_string($_POST["endYear"]);

$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$CoinTypes->getCoinByType($coinType);

$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);

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
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

$updateThis = mysql_query("UPDATE collectrolls SET rollNickname = '$rollNickname', endYear = '".mysql_real_escape_string($_POST["endYear"])."', startYear = '".mysql_real_escape_string($_POST["startYear"])."', rollHolder = '$rollHolder', rollCondition = '$rollCondition', proService = '$proService', proSerialNumber = '$proSerialNumber', slabLabel = '$slabLabel', slabCondition = '$slabCondition', designation = '$designation', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', showName = '$showName', showCity = '$showCity' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID' ") or die(mysql_error()); 


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
$fileQuery = mysql_query("UPDATE collectrolls SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
header("location: viewDateRollDetail.php?ID=".$_POST["ID"]."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Edit Date Range Roll</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2").hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	



$("#addCentForm").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      }else if ($("#coinCategory").val() == "") {
        $("#errorMsg").text("Please select a Category...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinCategory").addClass("errorInput");
        return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname, #coinCategory").click(function(){
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
<h1><img src="../img/Mixed_Cents.jpg" width="80" height="80" align="absmiddle" /> Edit Date Range Roll</h1>
 <p><a href="viewDateRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID); ?>" class="brownLinkBold">Back to roll</a></p>
 
<hr />


<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl" cellpadding="2">

  <tr>
    <td colspan="5" class="darker">
<span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?></span>    
    </td>
    </tr>
  <tr>
    <td class="darker">Roll Nickname</td>
    <td width="787" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="<?php echo $collectionRolls->getRollNickname(); ?>" /></td>
  </tr>
  <tr>
    <td width="184" class="darker">Coin Type</td>
    <td colspan="4"><select name="coinType" id="coinType">
      <option selected="selected" value="<?php echo $collectionRolls->getCoinType(); ?>"><?php echo $collectionRolls->getCoinType(); ?></option>
      <optgroup label="Half Cent">
        <option value="Mixed Half Cents">Mixed Half Cents</option>
        <option value="Liberty Cap Half Cent">Liberty Cap</option>
        <option value="Draped Bust Half Cent">Draped Bust</option>
        <option value="Classic Head Half Cent">Classic Head</option>
        <option value="Braided Hair Half Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cent">
        <option value="Mixed_Large_Cents">Mixed Large Cents</option>
        <option value="Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="Classic_Head_Large_Cent">Classic Head</option>
        <option value="Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Small Cent">
        <option value="Mixed_Cents">Mixed Cents</option>
        <option value="Flying_Eagle">Flying Eagle Cent</option>
        <option value="Indian_Head">Indian Head Cent</option>
        <option value="Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Half_Dimes">
        <option value="Mixed_Half_Dimes">Mixed Half Dimes</option>
        <option value="Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="Mixed_Nickels">Mixed Nickels</option>
        <option value="Shield_Nickel">Shield Nickel</option>
        <option value="Liberty_Head_Nickel">Liberty_Head_Nickel</option>
        <option value="Indian_Head_Nickel">Indian_Head_Nickel</option>
        <option value="Jefferson_Nickel">Jefferson_Nickel</option>
        <option value="Westward_Journey">Westward_Journey</option>
        <option value="Return_to_Monticello">Return_to_Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="Mixed_Dimes">Mixed Dimes</option>
        <option value="Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="Barber_Dime">Barber Dime</option>
        <option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty_Cents">
        <option value="Twenty Cent Piece">Twenty Cent Piece</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="Mixed_Quarters">Mixed Quarters</option>
        <option value="Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="Barber_Quarter">Barber Quarter</option>
        <option value="Standing_Liberty">Standing Liberty</option>
        <option value="Washington_Quarter">Washington Quarter</option>
        <option value="State Quarter">State Quarter</option>
        <option value="District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half_Dollars">
        <option value="Mixed_Half_Dollars">Mixed Half Dollars</option>
        <option value="Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="Barber_Half_Dollar">Barber Half</option>
        <option value="Walking_Liberty">Walking Liberty Half</option>
        <option value="Franklin_Half_Dollar">Franklin Half</option>
        <option value="Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="Mixed_Dollars">Mixed Dollars</option>
        <option value="Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="Trade_Dollar">Trade Dollar</option>
        <option value="Morgan_Dollar">Morgan Dollar</option>
        <option value="Peace_Dollar">Peace Dollar</option>
        <option value="Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
<tr>
    <td class="darker">Year Range</td>
    <td colspan="4"><strong>From: </strong>
    <select name="startYear" id="startYear">
	<option value="<?php echo $collectionRolls->getStartYear(); ?>" selected="selected"><?php echo $collectionRolls->getStartYear(); ?></option>
	<?php echo $collection->coinYearSelectByType($collectionRolls->getCoinType()) ?></select>
    &nbsp;&nbsp;&nbsp; <strong>To: </strong>
    <select name="endYear" id="endYear">
		<option value="<?php echo $collectionRolls->getEndYear(); ?>" selected="selected"><?php echo $collectionRolls->getEndYear(); ?></option>
	<?php echo $collection->coinYearSelectByType($collectionRolls->getCoinType()) ?></select></td>
    </tr>
  <tr>
    <td class="darker">Mint Marks</td>
    <td colspan="4"><select name="mintMark" id="mintMark">
      <option value="<?php echo $collectionRolls->getMintMark(); ?> " selected="selected"><?php echo $collectionRolls->getMintMark(); ?></option>
      <option value="Unknown">Unknown</option>
      <option value="P&amp;D">P &amp; D</option>
      <option value="PDS">PDS</option>
      <option value="D">D</option>
      <option value="S">S</option>
      <option value="P">P</option>
      <option value="O">O</option>
      <option value="CC">CC</option>
      <option value="W">W</option>
      <option value="O&amp;CC">O &amp; CC</option>
    </select></td>
  </tr>
  <tr>
    <td width="184" class="darker"><label for="rollHolder">Holder</label></td>
    <td width="787" colspan="4"><select name="rollHolder" id="rollHolder">
      <option value="<?php echo $collectionRolls->getRollHolder(); ?>" selected="selected"><?php echo $collectionRolls->getRollHolder(); ?></option>
      <option value="Paper">Paper</option>
      <option value="Tube">Tube</option>
      <option value="Plastic">Plastic</option>
    </select></td>
  </tr>
    </table>
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Grade Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  
  
    
  <tr>
    <td width="185" class="darker">Grades</td>
    <td width="784" colspan="4"><strong>
      <select name="coinGrade" id="coinGrade">
        <option value="<?php echo $collectionRolls->getCoinGrade(); ?>" selected="selected"><?php echo $collectionRolls->getCoinGrade(); ?></option>
        <option value="No Grade">No Grade </option>
        <option value="Good to XF ">Good to XF</option>
        <option value="Good to AU" >Good to AU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="F to XF ">Fine to Extra Fine</option>
        <option value="F to BU" >Fine to BU</option>
        <option value="XF to AU ">XF to AU</option>
        <option value="XF to BU" >XF to BU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="AU" >About Uncirculated</option>
        <option value="BU">Brilliant Uncirculated</option>
      </select>
    </strong></td>
  </tr>

    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="186"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $collectionRolls->getCoinDate(); ?>" /></td>
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
    <td width="53%"><input name="auctionNumber" type="text" value="<?php echo $collectionRolls->getAuctionNumber(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
    <td><input name="ebaySellerID" type="text" value="<?php echo $collectionRolls->getEbaySellerID(); ?>" /></td>
    </tr>
</table>
  </div>
  
     <div id="Shop" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="<?php echo $collectionRolls->getShopName(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="shopUrl">Website</label>
      &nbsp;</td>
    <td><input name="shopUrl" type="text" value="<?php echo $collectionRolls->getShopUrl(); ?>" /></td>
    </tr>
</table>
  </div>
        <div id="Show" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="showName">Show Name</label>&nbsp;</td>
    <td width="53%"><input name="showName" id="showName" type="text" value="<?php echo $collectionRolls->getShowName(); ?>" /></td>
    </tr>
  <tr>
    <td><label for="showCity">City</label>&nbsp;</td>
    <td><input name="showCity" type="text" value="<?php echo $collectionRolls->getShowCity(); ?>" /></td>
    </tr>
</table>
  </div> 
         
      <div id="None" class="detailDiv2">

  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="<?php echo $collectionRolls->getCoinPrice(); ?>" /></td>
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
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $collectionRolls->getCoinNote(); ?></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input name="ID" type="hidden" value="<?php echo $_GET["ID"] ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Save Changes" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
