<?php 
include '../inc/config.php';
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
$pennyQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
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

.newFormImg {width:100px; height:100px; border:none;}
#rawTypeTbl img {width:auto; height:200px; border:none;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#halfCentHeadDiv, #largeCentForm").hide();

halfCentForm

//ADD COIN TYPE

$("#addTypeBagForm").submit(function() {
      if($("#bagType").val() == "")  {
		$("#bagTypeLbl").addClass("errorTxt");
		$("#bagType").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});


$("#coinType").change(function() {
$(this).find("option:selected").each(function(){
	//$("#bagTypeCoinCategory").val($(this).parent().attr("label"));
	$('#coinTypeImage').attr("src","../img/"+$(this).attr("value")+".jpg");

});
});	


$("#Braided_Hair_Liberty_Head_Large_Cent").click(function() {
$("#Half_CentImg, #Union_Shield").animate({
    opacity: .5
		});
		$(this).animate({
    opacity: 1
		});
		$("#largeCentForm").show();
		$("#halfCentForm").hide();
		
});
$("#Half_CentImg").click(function() {
$("#Braided_Hair_Liberty_Head_Large_Cent, #Union_Shield").animate({
    opacity: .5
		});
		$(this).animate({
    opacity: 1
		});
		$("#halfCentHeadDiv").show();
		$("#largeCentForm").hide();
});
$("#Union_Shield").click(function() {
$("#Braided_Hair_Liberty_Head_Large_Cent, #Half_CentImg").animate({
    opacity: .5
		});
		$(this).animate({
    opacity: 1
		});
});
///////////////////////////////////////////////////////////////////////////////////Form validation


$("#purchasePrice").focus(function(event){
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
      } else {
	  return true;
	  }
});

$("#coinType, #purchaseDate, #purchaseFrom, #purchasePrice, #proSerialNumber").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HALF CENT OPERATIONS

/*$("#halfCentCoinType").change(function() {
$(this).find("option:selected").each(function(){
	//$("#bagTypeCoinCategory").val($(this).parent().attr("label"));
	$('#Half_CentFormImg').attr("src","../img/"+$(this).attr("value")+".jpg");
	//alert($(this).attr("value"));
});
});	*/

$("#halfCentCoinType").change(function() {
var dataString = $(this).val();

$.ajax({url:"../inc/functions/addRawFunctions.php?coinType="+dataString, success:function(result){
$("#halfCentCoinName").html(result);
}});

$.ajax({url:"../inc/functions/addRawPage.php?coinType="+dataString, success:function(result){
$("#halfCentYears").html(result);
}});

$(this).find("option:selected").each(function(){
	$('#Half_CentFormImg').attr("src","../img/"+$(this).attr("value")+".jpg");
});
});	
$("#halfCentFormBtn").val("Add "+dataString);


	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Add Coin</h1>
<table width="100%" border="0" id="rawTypeTbl">
  <tr align="center">
    <td><a href="#forms"><img src="../img/Half_CentGraded.jpg" alt="Half Cent" name="Half_CentImg"  class="newImg" id="Half_CentImg" /></a></td>
    <td><a href="#forms"><img src="../img/Braided_Hair_Liberty_Head_Large_CentGraded.jpg" name="Braided_Hair_Liberty_Head_Large_Cent" width="306" height="428"  class="newImg" id="Braided_Hair_Liberty_Head_Large_Cent" /></a></td>
    <td><img src="../img/Union_ShieldGraded.jpg" class="newImg" id="Union_Shield" /></td>
    <td><img src="../img/Two_CentGraded.jpg" class="newImg" /></td>
    <td><img src="../img/Three_CentGraded.jpg" class="newImg" /></td>
    <td><img src="../img/Seated_Liberty_Half_DimeGraded.jpg" class="newImg" /></td>
  </tr>  
  <tr>
    <th scope="col">Half-Cents</th>
    <th scope="col">Large Cents</th>
    <th scope="col">Small Cents</th>
    <th scope="col">Two Cent</th>
    <th scope="col">Three Cent</th>
    <th scope="col">Half Dime</th>
  </tr>

  <tr align="center">
    <td><img src="../img/Indian_Head_NickelGraded.jpg" width="250" height="250" /></td>
    <td><img src="../img/Winged_Liberty_DimeGraded.jpg" width="250" height="250" /></td>
    <td><img src="../img/Twenty_Cent_PieceGraded.jpg" width="250" height="250" /></td>
    <td><img src="../img/Standing_LibertyGraded.jpg" width="250" height="250" /></td>
    <td><img src="../img/Walking_LibertyGraded.jpg" width="250" height="250" /></td>
    <td><img src="../img/Morgan_DollarGraded.jpg" width="250" height="250" /></td>
  </tr>
  <tr>
    <th scope="col">Nickels</th>
    <th scope="col">Dimes</th>
    <th scope="col">Twenty Cent</th>
    <th scope="col">Quarters</th>
    <th scope="col">Half Dollars</th>
    <th scope="col">Dollars</th>
  </tr>
</table>

<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<div class="roundedWhite" id="halfCentHeadDiv">
<form id="halfCentHeadForm" method="get" action="" name="halfCentHeadForm">
<table width="979" border="0" class="priceListTbl">
  <tr>
    <td width="190" rowspan="2" class="darker" id="boxTypeLbl2"><img src="../img/Half_CentMix.jpg" alt="Half Cent" name="Half_CentFormImg"  class="newFormImg" id="Half_CentFormImg" /></td>
    <td colspan="2" valign="top"><h3>Half Cent Graded Entry Form</h3></td>
  </tr>
  <tr>
    <td width="328" valign="top"><span class="darker">Half Cent Type</span>:
      <select name="coinType" id="halfCentCoinType">
      <option value="">Select A Half Cents</option>
      <option value="Liberty_Cap_Half_Cent">Liberty Cap</option>
      <option value="Draped_Bust_Half_Cent">Draped Bust</option>
      <option value="Classic_Head_Half_Cent">Classic Head</option>
      <option value="Braided_Hair_Half_Cent">Braided Hair</option>
    </select></td>
    <td width="447" valign="top" id="halfCentYears">&nbsp;</td>
  </tr>
  </table>
  </form>
  <form id="halfCentForm" method="post" action="" name="halfCentForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Year &amp; Mint</td>
    <td><select id="halfCentCoinName" name="coinName">

    </select>
    
    </td>
    <tr>
    <td width="225" class="darker"><label for="gradeService">Grading Service</label></td>
    <td width="744"><select id="gradeService" name="gradeService">
<option value="No Grade">No Grade</option>  
<option value="Self" selected="selected">Self</option> 
<option value="PCGS">PCGS (Professional Coin Grading Service)</option>
<option value="ICG">ICG (Independent Coin Grading Company)</option>
<option value="NGC">NGC (Numismatic Guaranty Corporation of America)</option>
<option value="ANACS">ANACS (American Numismatic Association Certification Service)</option>
<option value="SEGS">SEGS (Sovereign Entities Grading Service Inc)</option>
<option value="PCI">PCI</option>      
<option value="ICCS">ICCS (International Coin Certification Service )</option>  
<option value="HALLMARK">HALLMARK</option>  
<option value="NTC">NTC</option>                                                       
</select></td>
    </tr>
  <tr>
    <td width="225" class="darker">Serial Number</td>
    <td width="744"><input type="text" name="proSerialNumber" id="proSerialNumber" value="" /></td>
    </tr>
  <tr>
    <td class="darker">Grade</td>
    <td><select>
  <option value="No Grade" selected="selected">No Grade </option>
  <option value="Basal 0">(Basal 0) The coin is identifiable by type only. </option>
  <option value="P-1" >(P-1) Poor - Barely identifiable; must have date and mintmark, otherwise pretty thrashed.</option>
  <option value="FR-2">(FR-2) Fair - Worn almost smooth but lacking the damage Poor coins have.</option>
  <option value="G-4">(G-4) Good - Heavily worn such that inscriptions merge into the rims in places; details are mostly gone.</option>
  <option value="VG-8">(VG-8) Very Good - Very worn, but all major design elements are clear, if faint. Little if any central detail.</option>
  <option value="F-12">(F-12) Fine - Very worn, but wear is even and overall design elements stand out boldly.</option>
  <option value="VF-20">(VF-20) Very Fine - Moderately worn, with some finer details remaining. </option>
  <option value="EF-40">(EF-40) Extremely Fine - Lightly worn; all devices are clear, major devices bold.</option>
  <option value="AU-50">(AU-50) About Uncirculated - Slight traces of wear on high points; may have contact marks and little eye appeal.</option>
  <option value="AU-58">(AU-58) Very Choice About Uncirculated - Slightest hints of wear marks, no major contact marks, almost full luster.</option>
  <option value="MS-60">(MS-60) Mint State Basal - Strictly uncirculated with no luster, obvious contact marks.</option>
  <option value="MS-63">(MS-63) Mint State Acceptable - Uncirculated, but with contact marks and nicks, slightly impaired luster.</option>
  <option value="MS-65">(MS-65) Mint State Choice - Uncirculated with strong luster, very few contact marks. Strike is above average.</option>
  <option value="MS-68">(MS-68) Mint State Premium Quality - Uncirculated with perfect luster, no visible contact marks.</option>
  <option value="MS-69">(MS-69) Mint State All-But-Perfect - Uncirculated with perfect luster, and very exceptional eye appeal</option>
  <option value="MS-70">(MS-70) Mint State Perfect - The perfect coin. There are no microscopic flaws visible to 8x.</option>
  </select></td>
  </tr>
    <tr>
    <td class="darker">Additional</td>
    <td><input type="text" name="proGrade" id="proGrade" value="" /></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate3" id="purchaseDate3" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td><span class="darker">
      <input type="text" name="purchaseFrom3" id="purchaseFrom3" />
    </span></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><span class="darker">Notes</span></td>
    <td><textarea name="additional" id="additional" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom"><input name="coinCategory" type="hidden" value="Half Cent" />      <input type="submit" name="halfCentFormBtn" id="halfCentFormBtn" value="Add Half Cent" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<div class="roundedWhite">
<form id="largeCentForm" method="post" action="" name="largeCentForm">
<table width="979" border="0" class="priceListTbl">
  <tr>
    <td class="darker" id="boxTypeLbl2"><img src="../img/Flowing_Hair_Large_Cent.jpg" alt="Half Cent" name="Half_CentFormImg"  class="newFormImg" id="largeCentFormFormImg" /></td>
    <td><h2>Large Cent Entry Form</h2></td>
  </tr>
  <tr>
    <td width="197" class="darker" id="boxTypeLbl">Large Cent Type</td>
    <td width="772">
    <select name="coinType" id="coinType">
<option value="">All Large Cents</option>
<option value="Flowing_Hair_Large_Cent">Flowing Hair</option>
<option value="Liberty_Cap_Large_Cent">Liberty Cap</option>
<option value="Draped_Bust_Large_Cent">Draped Bust</option>
<option value="Classic_Head_Large_Cent">Classic Head</option>
<option value="Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
<option value="Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
</select>
    </td>
  </tr>
  <tr>
    <td class="darker">Year &amp; Mint</td>
    <td><select id="coinTypeHalfCent" name="name">
      <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinCategory = 'Cent'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $coinName = $row['coinName'];
  $coinID = $row['coinID'];
  echo "<option value=".$coinName.">".$coinName."</option>";
  }
  ?>
    </select>
    <select id="coinTypeLarge_Cent" name="coinType">

    </select>
    </td>
  </tr>
  <tr>
    <td class="darker">Grade</td>
    <td><select>
<option value="No Grade" selected="selected">No Grade </option>
<option value="Basal 0">(Basal 0) The coin is identifiable by type only. </option>
<option value="P-1" >(P-1) Poor - Barely identifiable; must have date and mintmark, otherwise pretty thrashed.</option>
<option value="FR-2">(FR-2) Fair - Worn almost smooth but lacking the damage Poor coins have.</option>
<option value="G-4">(G-4) Good - Heavily worn such that inscriptions merge into the rims in places; details are mostly gone.</option>
<option value="VG-8">(VG-8) Very Good - Very worn, but all major design elements are clear, if faint. Little if any central detail.</option>
<option value="F-12">(F-12) Fine - Very worn, but wear is even and overall design elements stand out boldly.</option>
<option value="VF-20">(VF-20) Very Fine - Moderately worn, with some finer details remaining. </option>
<option value="EF-40">(EF-40) Extremely Fine - Lightly worn; all devices are clear, major devices bold.</option>
<option value="AU-50">(AU-50) About Uncirculated - Slight traces of wear on high points; may have contact marks and little eye appeal.</option>
<option value="AU-58">(AU-58) Very Choice About Uncirculated - Slightest hints of wear marks, no major contact marks, almost full luster.</option>
<option value="MS-60">(MS-60) Mint State Basal - Strictly uncirculated with no luster, obvious contact marks.</option>
<option value="MS-63">(MS-63) Mint State Acceptable - Uncirculated, but with contact marks and nicks, slightly impaired luster.</option>
<option value="MS-65">(MS-65) Mint State Choice - Uncirculated with strong luster, very few contact marks. Strike is above average.</option>
<option value="MS-68">(MS-68) Mint State Premium Quality - Uncirculated with perfect luster, no visible contact marks.</option>
<option value="MS-69">(MS-69) Mint State All-But-Perfect - Uncirculated with perfect luster, and very exceptional eye appeal</option>
<option value="MS-70">(MS-70) Mint State Perfect - The perfect coin. There are no microscopic flaws visible to 8x.</option>
</select></td>
  </tr>

  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate3" id="purchaseDate3" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td><span class="darker">
      <input type="text" name="purchaseFrom3" id="purchaseFrom3" />
    </span></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><span class="darker">Notes</span></td>
    <td><textarea name="additional" id="additional" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom"><input type="hidden" name="coinCategory2" id="coinCategory2" />      <input type="submit" name="addTypeRollFormBtn" id="addTypeRollFormBtn" value="Add Type Roll" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<div class="roundedWhite">
<form id="largeCentForm" method="post" action="" name="largeCentForm">
<table width="979" border="0" class="priceListTbl">
  <tr>
    <td class="darker" id="boxTypeLbl2"><img src="../img/Union_Shield.jpg" alt="Half Cent" name="Half_CentFormImg"  class="newFormImg" id="Half_CentFormImg" /></td>
    <td><h2>Small Cent Entry Form</h2></td>
  </tr>
  <tr>
    <td width="197" class="darker" id="boxTypeLbl">Small Cent Type</td>
    <td width="772">
    <select name="coinType" id="coinType">
<option value="Flying_Eagle">Flying Eagle Cent</option>
<option value="Indian_Head">Indian Head Cent</option>
<option value="Lincoln_Wheat">Lincoln Wheat Cent</option>
<option value="Lincoln_Memorial">Lincoln Memorial Cent</option>
<option value="Lincoln_Bicentennial">Lincoln Bicentennial</option>
<option value="Union_Shield">Union Shield</option>
</select>
    </td>
  </tr>
  <tr>
    <td class="darker">Year &amp; Mint</td>
    <td><select id="coinTypeHalfCent" name="name">
      <?php 
     $typeQuery = mysql_query("SELECT * FROM coins WHERE coinCategory = 'Cent'") or die(mysql_error());
while($row = mysql_fetch_array($typeQuery))
  {
  $coinName = $row['coinName'];
  $coinID = $row['coinID'];
  echo "<option value=".$coinName.">".$coinName."</option>";
  }
  ?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td class="darker">Grade</td>
    <td><select>
<option value="No Grade" selected="selected">No Grade </option>
<option value="Basal 0">(Basal 0) The coin is identifiable by type only. </option>
<option value="P-1" >(P-1) Poor - Barely identifiable; must have date and mintmark, otherwise pretty thrashed.</option>
<option value="FR-2">(FR-2) Fair - Worn almost smooth but lacking the damage Poor coins have.</option>
<option value="G-4">(G-4) Good - Heavily worn such that inscriptions merge into the rims in places; details are mostly gone.</option>
<option value="VG-8">(VG-8) Very Good - Very worn, but all major design elements are clear, if faint. Little if any central detail.</option>
<option value="F-12">(F-12) Fine - Very worn, but wear is even and overall design elements stand out boldly.</option>
<option value="VF-20">(VF-20) Very Fine - Moderately worn, with some finer details remaining. </option>
<option value="EF-40">(EF-40) Extremely Fine - Lightly worn; all devices are clear, major devices bold.</option>
<option value="AU-50">(AU-50) About Uncirculated - Slight traces of wear on high points; may have contact marks and little eye appeal.</option>
<option value="AU-58">(AU-58) Very Choice About Uncirculated - Slightest hints of wear marks, no major contact marks, almost full luster.</option>
<option value="MS-60">(MS-60) Mint State Basal - Strictly uncirculated with no luster, obvious contact marks.</option>
<option value="MS-63">(MS-63) Mint State Acceptable - Uncirculated, but with contact marks and nicks, slightly impaired luster.</option>
<option value="MS-65">(MS-65) Mint State Choice - Uncirculated with strong luster, very few contact marks. Strike is above average.</option>
<option value="MS-68">(MS-68) Mint State Premium Quality - Uncirculated with perfect luster, no visible contact marks.</option>
<option value="MS-69">(MS-69) Mint State All-But-Perfect - Uncirculated with perfect luster, and very exceptional eye appeal</option>
<option value="MS-70">(MS-70) Mint State Perfect - The perfect coin. There are no microscopic flaws visible to 8x.</option>
</select></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate3" id="purchaseDate3" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td><span class="darker">
      <input type="text" name="purchaseFrom3" id="purchaseFrom3" />
    </span></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><span class="darker">Notes</span></td>
    <td><textarea name="additional" id="additional" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom"><input type="hidden" name="coinCategory2" id="coinCategory2" />      <input type="submit" name="addTypeRollFormBtn" id="addTypeRollFormBtn" value="Add Type Roll" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p>Prnt.</p>
</div>

</body>
</html>
