<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

function getDenomination($boxType){
//$coinType = str_replace('_', ' ', mysql_real_escape_string($_POST["coinType"]));
$pennyQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$boxType'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $denomination = $row['denomination'];
  }
return $denomination;
}

if (isset($_POST["addCoinFormBtn"])) { 
$boxType = str_replace('_', ' ', mysql_real_escape_string($_POST["boxType"]));
echo getDenomination($boxType);

}


$errorMsg = ""; 
if (isset($_POST["addCoinFormBtn"])) { 
$boxNickname = mysql_real_escape_string($_POST["boxNickname"]);
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$name = mysql_real_escape_string($_POST["name"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_POST["coinType"]));

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

if($_POST['purchasePrice'] == '') {
	$purchasePrice = $MintBox->getFaceVal();
} else {
	$purchasePrice = mysql_real_escape_string($_POST["purchasePrice"]);
}
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}
mysql_query("INSERT INTO collectboxes(coinType, coinName, coinGrade, pennyQuantity, purchaseDate, timeyear) VALUES('$coinType', '$name', '$coinGrade', '1', '$purchaseDate', '$year')") or die(mysql_error()); 

}

if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$pennyQuery = mysql_query("SELECT * FROM pennies WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
  }
  
}

//Add Mint roll

if (isset($_POST["addMintRollFormBtn"])) { 
$coinCategory = mysql_real_escape_string($_POST["rollCoinCategory"]);
$rollName = mysql_real_escape_string($_POST["rollName"]);


echo $coinCategory;

}
//Add Mint roll

if (isset($_POST["addMintBagFormBtn"])) { 
$coinCategory = mysql_real_escape_string($_POST["bagCoinCategory"]);
$bagName = mysql_real_escape_string($_POST["bagName"]);

switch ($coinCategory)
{
case "State Quarter":
  $coinType = "Quarter";
  $denomination = '0.250';
  echo $denomination;
  break;
case "Sacagawea Dollar":
  $coinType = "Dollar";
  $denomination = '1.000';
  echo $denomination;  
  break;
case "Westward Journey":
  $coinType = "Nickel";
  $denomination = '0.050';
  break;

}


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin Box</title>

<style type="text/css">

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
	  return false;
	} else {
	  return true;
	  }
});

$("#coinType, #purchaseDate, #purchaseFrom, #purchasePrice, #proSerialNumber").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text("");
});	




//ADD TYPE BOX

$("#addTypeBagForm").submit(function() {
      if($("#bagType").val() == "")  {
		$("#bagTypeLbl").addClass("errorTxt");
		$("#bagType").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});

$("#CentsBoxSize, #NickeslBoxSize, #Half_DimesBoxSize, #DimesBoxSize, #QuartersBoxSize, #Half_DollarsBoxSize, #DollarsBoxSize").hide();

$("#boxType").change(function() {

$(this).find("option:selected").each(function(){
	var boxLabelName = $(this).parent().attr("label");
	$("#boxTypeCoinCategory").val($(this).parent().attr("label"));
	$('#boxTypeImage').attr("src","../img/"+$(this).attr("value")+".jpg");
	$("#"+boxLabelName+"BoxSize").show();
	$('.sizesBoxTbl').not("#"+boxLabelName+"BoxSize") .hide();
	//alert(boxLabelName);
});
});	



	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1>Add Boxes</h1>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>

<div class="roundedWhite">
<form id="addTypeBoxForm" method="post" action="" name="addTypeBoxForm">

<table width="857" border="0" class="priceListTbl">
      <tr>
        <td width="176" rowspan="7" valign="top" class="darker"><h2 class="rollHdr">Type Box</h2>
          <img src="../img/newMyBox.jpg" width="100" height="auto" align="texttop" /></td>
        <td class="darker" id="boxTypeLbl2">Box Nickname</td>
        <td><input name="boxNickname" type="text" id="boxNickname" size="64" /></td>
      </tr>
      <tr>
    <td width="208" class="darker" id="boxTypeLbl">Coin Type</td>
    <td width="459">
    <select name="boxType" id="boxType">
<option selected="selected" value="">Quick Menu</option>

<optgroup label="Cents">
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
    </td>
  </tr>
  <tr>
    <td class="darker">Mint Mark</td>
    <td><select name="mintMark" id="rollMintMark">
    <option value="Mixed">Mixed</option>    
    <option value="P">P</option>
    <option value="D">D</option>
    <option value="S">S</option>
    <option value="O">O</option>
    <option value="C">C</option>
    <option value="W">W</option>  
    <option value="CC">CC</option>           
    </select></td>
  </tr>
  <tr class="boxSize">
    <td valign="top" class="darker">Box Size</td>
    <td>
        <table width="253" id="CentsBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102" id="boxSizeLbl">&nbsp;</td>
        <td width="139">&nbsp;</td>
      </tr>
    </table>
    <table width="253" id="CentsBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102"><label>
          <input type="radio" name="boxSize" value="1000" id="1000" />
          $10</label></td>
        <td width="139"><input type="radio" name="boxSize" value="2500" id="boxSizes_1" />
$25</td>
      </tr>
    </table>
    <table width="253" id="Half_DimesBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102"><label>
          <input type="radio" name="boxSize" value="400" id="" />
          $20</label></td>
        <td width="139"><input type="radio" name="boxSize" value="2000" id="boxSizes_1" />
$100</td>
      </tr>
    </table>
    <table width="253" id="NickelsBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102"><label>
          <input type="radio" name="boxSize" value="400" id="" />
          $20</label></td>
        <td width="139"><input type="radio" name="boxSize" value="2000" id="boxSizes_1" />
$100</td>
      </tr>
    </table>
    <table width="253" id="DimesBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102"><label>
          <input type="radio" name="boxSize" value="1000" id="" />
          $100</label></td>
        <td width="139"><input type="radio" name="boxSize" value="2500" id="boxSizes_1" />
$250</td>
      </tr>
    </table>
    <table width="253" id="QuartersBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102"><label>
          <input type="radio" name="boxSize" value="400" id="" />
          $100</label></td>
        <td width="139"><input type="radio" name="boxSize" value="1000" id="boxSizes_1" />
$250</td>
      </tr>
    </table>
    <table width="253" id="Half_DollarsBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102"><label>
          <input type="radio" name="boxSize" value="200" id="" />
          $100</label></td>
        <td width="139"><input type="radio" name="boxSize" value="1000" id="boxSizes_1" />
$500</td>
      </tr>
    </table>
    <table width="253" id="DollarsBoxSize" class="sizesBoxTbl">
      <tr>
        <td width="102"><label>
          <input type="radio" name="boxSize" value="200" id="" />
          $200</label></td>
        <td width="139"><input type="radio" name="boxSize" value="1000" id="boxSizes_1" />
$1000</td>
      </tr>
    </table>
    
    
    </td>
  </tr>
  <tr>
    <td><label for="condition" class="darker">Condition</label></td>
    <td>
      <select name="condition" id="condition">
     <option value="Circulated">Circulated</option>
    <option value="Uncirculated">Uncirculated</option>
    <option value="Unknown">Unknown</option>  
      </select></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td><select name="purchaseFrom" id="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Mint">Mint</option>
      <option value="Coin Shop">Coin Shop</option>
      <option value="Coin Show">Coin Show</option>
    </select></td>
  </tr>
  <tr>
    <td width="176" rowspan="3" valign="top" class="darker"><img src="../img/blank2.jpg" alt="" width="90" height="90" id="boxTypeImage" /></td>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><strong>Additional</strong></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom"><input type="hidden" name="coinCategory2" id="boxTypecoinCategory" />      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Box" /></td>
    <td>&nbsp;</td>
  </tr>
</table>



</form>
</div>

 <p>&nbsp;</p>
</div>
</body>
</html>
