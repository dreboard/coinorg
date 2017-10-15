<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['collectrollsID'])) { 
$collectrollsID = intval($_GET['collectrollsID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinType = $collectionRolls->getCoinType();
$rollType = $collectionRolls->getRollType();

$coinID = $collectionRolls->getCoinID();
$rollNickname = $collectionRolls->getRollNickname();
//$coinID = $collectionRolls->getCoinDate();
$coin-> getCoinById($coinID);
$coinName = $coin->getCoinName();  
$additional = $collectionRolls->getAdditional(); 
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$coinLink = str_replace(' ', '_', $coinType);
$coinYearRange = $collectionRolls->getYearRange();

//$coinYearRange = $from1.$from2.' to '. $to1.$to2;

$from1 = trim(substr($coinYearRange, 0, 2));
$from2 = trim(substr($coinYearRange, 2, 3));
$to1 = substr($coinYearRange, -4, 2);
$to2 = substr($coinYearRange, -2, 2);



}

/*echo $from1;
echo '<br>';
echo $from2;
echo '<br>';
echo $to1;
echo '<br>';
echo $to2;*/
//////////ADD COIN
if (isset($_POST["addTypeRollFormBtn2"])) { 
$coinType = mysql_real_escape_string($_POST["coinType"]);
$coinCategory = str_replace('_',' ',  mysql_real_escape_string($_POST["coinCategory"]));
$mintMark = mysql_real_escape_string($_POST["mintMark"]);
$rollType = 'Date Range';
$from1 = mysql_real_escape_string($_POST["from1"]);
$from2 = mysql_real_escape_string($_POST["from2"]);
$to1 = mysql_real_escape_string($_POST["to1"]);
$to2 = mysql_real_escape_string($_POST["to2"]);
$coinYearRange = $from1.$from2.' to '. $to1.$to2;
$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$coinType = str_replace('_',' ',  mysql_real_escape_string($_POST["coinType"]));
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);
$coinSubCategory = 'None';
$coinCategory = 'None';

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
case "Assembled":
    $purchaseFrom = 'None';		
	$additional = 'None';		
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
  break;
case "None":
    $purchaseFrom = 'None';	
	$additional = 'None';	
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
  break;
}	

mysql_query("INSERT INTO collectrolls(coinType, rollType, coinYearRange, rollNickname, coinCategory, coinSubCategory, proService, proSerialNumber, slabLabel, coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, rollHolder, enterDate, userID) VALUES('$coinType', '$rollType', '$coinYearRange', '$rollNickname', '$coinCategory', '$coinSubCategory', '$proService', '$proSerialNumber', '$slabLabel', '$coinGrade', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$rollHolder', '$theDate', '$userID')") or die(mysql_error()); 
$collectrollsID = mysql_insert_id();
//////////add file
if(!empty($_FILES['file']['tmp_name'])){
	$coinPic1 = new UploadedPic('file');
	$photoFileName = $coinPic1 -> getFileName($userID.'/', $_FILES['file']['name']);	
$fileQuery = mysql_query("UPDATE collection SET  coinPic1 = '$photoFileName' WHERE collectionID = '$collectionID'")  or die(mysql_error()); 
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
<title>Add A Coin</title>

<style type="text/css">
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}

.bulkLinks {width:100px; height:auto;}
.rollHdr {margin:0px; padding:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	


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

//ADD TYPE ROLL

$("#addTypeRollForm").submit(function() {
      if($("#rollType").val() == "")  {
		$("#rollTypeLbl").addClass("errorTxt");
		$("#rollType").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});

$("#coinType").change(function() {
$(this).find("option:selected").each(function(){
	$("#coinCategory").val($(this).parent().attr("label"));
});
});	

//ADD MINT ROLL FORM
$("#addMintRollForm").submit(function() {
      if($("#rollName").val() == "")  {
		$("#rollNameLbl").addClass("errorTxt");
		$("#rollName").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});

$("#rollName").change(function() {
$(this).find("option:selected").each(function(){
	$("#rollCoinCategory").val($(this).parent().attr("label"));
	if($("#rollCoinCategory").val() == 'State Quarter'){
	$('#rollImage').attr("src","../img/State_Quarter.jpg");
	}else if($("#rollCoinCategory").val() == 'Sacagawea Dollar'){
	$('#rollImage').attr("src","../img/Sacagawea_Dollar.jpg");
	} 
	//$('#rollImage').attr("src","../img/Flying_Eagle.jpg
	
   // alert($(this).parent().attr("label"));
});
});	




	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1>Edit <?php echo $collectionRolls->getRollNickname(); ?> Roll</h1>
 <p><a href="addRollType.php">Back to roll types</a></p>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<div class="roundedWhite">
  <form id="addTypeRollForm" method="post" action="" name="addTypeRollForm">
    
  <table width="789" border="0" class="priceListTbl">
      <tr>
        <td class="darker" id="rollTypeLbl2">Roll Nickname</td>
        <td colspan="4"><input type="text" name="rollNickname" id="rollNickname" value="<?php echo $collectionRolls->getRollNickname(); ?>" /></td>
      </tr>
      <tr>
    <td width="206" class="darker" id="rollTypeLbl">Coin Type</td>
    <td colspan="4">
    <select name="coinType" id="coinType">
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
</select>
    <input type="hidden" name="coinCategory" id="coinCategory" value="" /></td>
  </tr>
  <tr>
    <td class="darker">Mint Mark</td>
    <td colspan="4"><select name="mintMark" id="mintMark">
    <option value="<?php echo $collectionRolls->getMintMark(); ?>" selected="selected"><?php echo $collectionRolls->getMintMark(); ?></option>
    <option value="Mixed">Mixed</option>
  <option value="Unknown">Unknown</option>  
  <option value="P&D">P & D</option>
  <option value="PDS">PDS</option>
  <option value="D">D</option>
  <option value="S">S</option>
  <option value="P">P</option>
  <option value="O">O</option>
  <option value="CC">CC</option>
    <option value="W">W</option>
  <option value="O&CC">O & CC</option>
  </select></td>
  </tr>
  <tr>
    <td class="darker">Year Range</td>
    <td colspan="4"><strong>From: </strong>
      <select name="from1">
      <option value="<?php echo $from1 ?>" selected="selected"><?php echo $from1 ?></option>
        <option value="20">20</option>
        <option value="19">19</option>
        <option value="18">18</option>
        <option value="17">17</option>
        </select>
      
      <select name="from2">
      <option value="<?php echo $from2 ?>" selected="selected"><?php echo $from2 ?></option>
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
      &nbsp;&nbsp;&nbsp; <strong>To: </strong>
       <select name="to1">
       <option value="<?php echo $to1 ?>" selected="selected"><?php echo $to1 ?></option>
        <option value="20">20</option>
        <option value="19">19</option>
        <option value="18">18</option>
        <option value="17">17</option>
        </select>
      
      <select name="to2">
      <option value="<?php echo $to2 ?>" selected="selected"><?php echo $to2 ?></option>
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
</select></td>
    </tr>
 
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $collectionRolls->getCoinDate(); ?>" /></td>
  </tr>
  <tr>
    <td><strong>Grades/Strike</strong></td>
    <td colspan="4">      <select name="coinGrade" id="coinGrade">
    <option value="<?php echo $collectionRolls->getCoinGrade(); ?>" selected="selected"><?php echo $collectionRolls->getCoinGrade(); ?> </option>
        <option value="No Grade">No Grade </option>
        <option value="Unknown ">Unknown</option>        
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
        <option value="Proof">Proof</option>        
      </select></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td width="102"><label>
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            eBay</label></td>
    <td width="123"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
 Shop</td>
    <td width="201"><label>
      <input type="radio" name="purchaseFrom" value="Assembled" id="otherRad" />
      Assembled</label></td>
    <td width="135"><label>
      <input name="purchaseFrom" type="radio" id="noneRad" value="None" />
      None</label></td>
  </tr>
  <tr>
    <td colspan="5">
      <div>
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
      
      <div>
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
      
      <div>
        <table width="60%" border="0">
          <tr>
            <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
            <td width="53%">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php echo $collectionRolls->getAdditional(); ?></textarea></td>
            </tr>
          </table>
      </div>    </td>
    </tr>
  <tr>
    <td><strong>Roll Holder</strong></td>
    <td colspan="4"><select name="rollHolder" id="rollHolder">
        <option value="<?php echo $collectionRolls->getRollHolder(); ?> " selected="selected"><?php echo $collectionRolls->getRollHolder(); ?></option>
        <option value="Paper ">Paper</option>
        <option value="Tube">Tube</option>  
        <option value="Plastic">Plastic</option>
        </select></td>
    </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="<?php echo $collectionRolls->getCoinPrice(); ?>" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td valign="top"><strong>Additional Info</strong></td>
    <td colspan="4"><label for="additional"></label>
      <textarea name="additional" id="additional" cols="45" rows="5"><?php echo $collectionRolls->getAdditional(); ?></textarea></td>
  </tr>
  <tr>
    <td valign="top"><strong>Image</strong></td>
    <td colspan="4"><input type="file" name="file" id="file" /></td>
  </tr>
  <tr>
    <td valign="bottom"><input type="hidden" name="coinCategory2" id="coinCategory2" />      <input type="submit" name="addTypeRollFormBtn" id="addTypeRollFormBtn" value="Add Type Roll" /></td>
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
