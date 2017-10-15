<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 
if (isset($_POST["addCoinFormBtn"])) { 
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$name = mysql_real_escape_string($_POST["name"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_POST["coinType"]));

if($_POST["purchaseFrom"] == ''){
	$purchaseFrom = 'None';
} else {
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
}

$gradeService = $_POST['gradeService'];
if($_POST['gradeService'] == 'Self') {
	$proSerialNumber = 'N/A';
	$proGrade = 'N/A';
} else {
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $proGrade = mysql_real_escape_string($_POST["proGrade"]);
	
}

$purchaseDateRaw = mysql_real_escape_string($_POST["purchaseDate"]);
$purchaseParts = explode("/", $purchaseDateRaw);
$year = intval($purchaseParts[2]);
$day = str_pad($purchaseParts[1], 2, '0', STR_PAD_LEFT); 
$month = str_pad($purchaseParts[0], 2, '0', STR_PAD_LEFT); 
$purchaseDate = date($year.'-'.$month.'-'.$day);
$enterDate = date('Y-m-d H:i:s');


mysql_query("INSERT INTO collection(coinType, coinName, coinGrade, pennyQuantity, purchaseDate, timeyear) VALUES('$coinType', '$name', '$coinGrade', '1', '$purchaseDate', '$year')") or die(mysql_error()); 

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

$("a#Union_Shield").click(function(event){
	  event.preventDefault();
	  $("img#typeImg").attr("src", "../img/Union_Shield.jpg");
	  $("#coinTypeUnion").show();
	  $("#coinType").val($(this).attr('id'));
	  $("#coinTypeBicentennial, #coinTypeMemorial, #coinTypeWheat, #coinTypeIndian, #coinTypeFlying").hide();
	  $("#errorMsg").text("");
	  $("#endErrorMsg").text("");
	  $("#typeLbl").removeClass("errorTxt");
	  
	});


$('#gradeService').change(function(event) {
if( $('#gradeService').val() == 'Self'){
  $("#gradeTbl").show();
  $("#proTbl").hide();
} else {
	$("#proTbl").show();
	$("#gradeTbl").hide();
}
});

///////////////////////////////////////////////////////////////////////////////////Form validation
$("#friendFirst, #friendLast, #friendEmail").focus(function() {
	$(this).removeClass("errorInput");
	$("#friendMsg").removeClass("errorTxt");
});	

$(".purchasePrice").focus(function(event){
	$(this).val("");
});

$("#noPrice").click(function(){
	$("#purchasePrice").val("0.00");
	$("#purchasePrice").removeClass("errorInput");
	$("#errorMsg").text("");
	$("#endErrorMsg").text("");
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

$("#rollType").change(function() {
$(this).find("option:selected").each(function(){
	$("#rollCoinCategory").val($(this).parent().attr("label"));
	$('#typeImage').attr("src","../img/"+$(this).attr("value")+".jpg");

});
});	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//ADD TYPE BAG

$("#addTypeBagForm").submit(function() {
      if($("#bagType").val() == "")  {
		$("#bagTypeLbl").addClass("errorTxt");
		$("#bagType").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});

$("#bagType").change(function() {
	var labelName = $(this).parent().attr("label");
$(this).find("option:selected").each(function(){
	
	$("#bagTypeCoinCategory").val($(this).parent().attr("label"));
	$('#bagTypeImage').attr("src","../img/"+$(this).attr("value")+".jpg");
	alert(labelName);
});
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//ADD MINT BAG FORM
$("#addMintBagForm").submit(function() {
      if($("#bagName").val() == "")  {
		$("#bagNameLbl").addClass("errorTxt");
		$("#bagName").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});

$("#bagName").change(function() {
$(this).find("option:selected").each(function(){
	$("#bagCoinCategory").val($(this).parent().attr("label"));
	
	if($("#bagCoinCategory").val() == 'State Quarter'){
	$('#bagImage').attr("src","../img/State_Quarter.jpg");
	}else if($("#bagCoinCategory").val() == 'Sacagawea Dollar'){
	$('#bagImage').attr("src","../img/Sacagawea_Dollar.jpg");
	} 
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
<h1>Add Bags</h1>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<br />

<div class="roundedWhite">

<form id="addTypeBagForm" method="post" action="" name="addTypeBagForm">

<table width="857" border="0" class="priceListTbl">
  <tr>
    <td width="176" rowspan="4" valign="top" class="darker"><h2 class="rollHdr">Coin Bag</h2>
      <img src="../img/newMyBag.jpg" width="100" height="auto" align="texttop" /></td>
    <td width="208" class="darker" id="bagTypeLbl">Bag Type</td>
    <td width="459">
    <select name="bagType" id="bagType">
<option selected="selected" value="">Quick Menu</option>

<optgroup label="Cents $50">
<option value="Mixed Cents">Mixed Cents</option>
<option value="Flying Eagle">Flying Eagle Cent</option>
<option value="Indian Head">Indian Head Cent</option>
<option value="Lincoln Wheat">Lincoln Wheat Cent</option>
<option value="Lincoln Memorial">Lincoln Memorial Cent</option>
<option value="Lincoln Bicentennial">Lincoln Bicentennial</option>
<option value="Union Shield">Union Shield</option>
</optgroup>

<optgroup label="Nickels $200">
<option value="Mixed Nickels">Mixed Nickels</option>
<option value="Shield_Nickel">Liberty Cap</option>
<option value="Indian_Head">Indian Head</option>
<option value="Lincoln_Wheat">Classic Head Half Cent</option>
<option value="Lincoln_Memorial">Braided Hair Half Cent</option>
<option value="Lincoln_Bicentennial">Lincoln Bicentennial Series</option>
<option value="Union_Shield">Union Shield</option>
</optgroup>
<optgroup label="Dimes $1000">
<option value="Mixed Dimes">Mixed Dimes</option>
<option value="Drapped_Bust_Dime">Drapped Bust Dime</option>
<option value="Liberty_Cap_Dime">Liberty Cap Dime</option>
<option value="Seated_Liberty_Dime">Liberty Seated Dime</option>
<option value="Barber_Dime">Barber Dime</option>
<option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
<option value="Roosevelt_Dime">Roosevelt Dime</option>
</optgroup>

<optgroup label="Quarters $1000">
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
<optgroup label="Half Dollars $1000">
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
<optgroup label="Dollars $2000">
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
    <td><select name="mintMark" id="bagMintMark">
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
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate4" id="purchaseDate4" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td><span class="darker">
      <input type="text" name="purchaseFrom4" id="purchaseFrom4" />
    </span></td>
  </tr>
  <tr>
    <td width="176" rowspan="2" valign="top" class="darker"><img src="../img/blank2.jpg" alt="" width="90" height="90" id="bagTypeImage" /></td>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><input type="hidden" name="coinCategory" id="bagTypeCoinCategory" />      <input type="submit" name="addMintRollFormBtn2" id="addMintRollFormBtn2" value="Add Mint Roll" /></td>
    <td>&nbsp;</td>
  </tr>
</table>



</form>
</div>
 <div class="spacer"></div>
 <p>Proof set coins from 1968 to the present contain "S" mint marked coins.  These were produced at the San Francisco United States government Mint.  Proof coin sets minted in 1964 and earlier have no mint mark and were produced at the Philadelphia United States government Mint.</p>
</div>
</body>
</html>
