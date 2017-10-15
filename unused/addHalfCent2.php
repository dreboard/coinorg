<?php 
include '../inc/config.php';
$errorMsg = ""; 
if (isset($_POST["halfCentFormBtn"])) { 
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$coinID = mysql_real_escape_string($_POST["coinID"]);
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


/*mysql_query("INSERT INTO collection(coinType, coinName, coinGrade, pennyQuantity, purchaseDate, timeyear) VALUES('$coinType', '$name', '$coinGrade', '1', '$purchaseDate', '$year')") or die(mysql_error()); */
echo $coinID;
}

if (isset($_GET["coinType"])) { 
$coinType = intval($_GET["coinType"]);
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubType = $row['coinSubType'];
  }
  
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui.js"></script>
<script type="text/javascript" src="../scripts/main.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/jquery-ui-1.8.18.custom/css/ui-lightness/jquery-ui-1.8.18.custom.css"/>

<title>Add A Coin</title>

<style type="text/css">
.fromList{margin:0px;}
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}


.newFormImg {width:200px; height:auto; border:none; margin:0px;}
#rawTypeTbl img {width:150px; height:150px; border:none;}
.priceListTbl h3 {margin:0px;}

#otherDetails {width:99%;}
</style>
<script type="text/javascript">
$(document).ready(function(){	



$("#coinType").change(function() {
$(this).find("option:selected").each(function(){
	$('#coinTypeImage').attr("src","../img/"+$(this).attr("value")+"_both.jpg");

});
});	

$("input").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text("");
});	

$("#halfCentCoinType").change(function() {
var dataString = $(this).val();

$.ajax({url:"../inc/functions/addRawFunctions.php?coinType="+dataString, success:function(result){
$("#halfCentCoinName").html(result);
}});

$.ajax({url:"../inc/functions/addRawPage.php?coinType="+dataString, success:function(result){
$("#halfCentYears").html(result);
}});

$.ajax({url:"../inc/functions/addRawID.php?coinName="+dataString, success:function(result){
$("#coinID").val(result);
alert(result);
}});

$(this).find("option:selected").each(function(){
	$('#Half_CentFormImg').attr("src","../img/"+$(this).attr("value")+"_both.jpg");
});
});	
$("#halfCentFormBtn").val("Add "+dataString);


/*$("#halfCentCoinName").change(function() {
var dataString = $(this).val();
$.ajax({url:"../inc/functions/addRawID.php?coinName="+dataString, success:function(result){
$("#coinID").val(result);
alert(result);
}});

});	*/
	
	
	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Add Coin</h1>
<div class="spacer"></div>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<div class="roundedWhite" id="halfCentHeadDiv">
<form id="halfCentHeadForm" method="post" action="" name="halfCentHeadForm">
<table width="979" border="0" class="priceListTbl">
  <tr>
    <td width="188" rowspan="2" class="darker" id="boxTypeLbl2"><img src="../img/Half_CentMix.jpg" alt="Half Cent" name="Half_CentFormImg"  class="newFormImg" id="" /></td>
    <td valign="top"><h3>Half Cent Entry Form</h3></td>
    <td width="223" rowspan="2" valign="top"><img src="../img/blank2.jpg" alt="Half Cent" name="Half_CentFormImg" align="left"  class="newFormImg" id="Half_CentFormImg" /></td>
    <td width="217" valign="top" id="halfCentYears">&nbsp;</td>
  </tr>
  <tr>
    <td width="333" valign="top"><span class="darker">Half Cent Type</span>:
      <select name="coinType" id="halfCentCoinType">
        <option value="">Select A Half Cents</option>
        <option value="Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="Classic_Head_Half_Cent">Classic Head</option>
        <option value="Braided_Hair_Half_Cent">Braided Hair</option>
      </select></td>
    <td width="217" valign="top" id="halfCentYears">&nbsp;</td>
    </tr>
  </table>
  </form>
  
  <form id="halfCentForm" method="post" action="" name="halfCentForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="175" class="darker">Year &amp; Mint</td>
    <td colspan="3"><select id="halfCentCoinName" name="coinName">

    </select><input name="coinID" type="text" value="" id="coinID" />
    
    </td>
  </tr>
  <tr>
    <td class="darker">Grade</td>
    <td colspan="3"><select>
<option value="No Grade" selected="selected">No Grade </option>
<option value="Basal 0">(Basal 0) The coin is identifiable by type only. </option>
<option value="P-1" >(PO-1) Poor - Barely identifiable; must have date and mintmark, otherwise pretty thrashed.</option>
<option value="FR-2">(FR-2) Fair - Worn almost smooth but lacking the damage Poor coins have.</option>
<option value="AG-3">(AG-3) About Good - Worn rims but most lettering is readable though worn.</option>
<option value="G-4">(G-4) Good - Heavily worn such that inscriptions merge into the rims in places; details are mostly gone.</option>
<option value="G-6">(G-6) Good - Rims complete with flat detail, peripheral lettering full.</option>
<option value="VG-8">(VG-8) Very Good - Very worn, all major elements clear. Little if any central detail.</option>

<option value="VG-8">(VG-10) Very Good - Design worn with slight detail, slightly clearer.</option>
<option value="F-12">(F-12) Fine - Very worn, but wear is even and overall design elements stand out boldly.</option>
<option value="F-12">(F-15) Fine - Slightly more detail in the recessed areas, all lettering sharp.</option>
<option value="VF-20">(VF-20) Very Fine - Moderately worn, with some finer details remaining. </option>
<option value="VF-25">(VF-25) Very Fine - Slightly more definition in the detail and lettering. </option>

<option value="VF-30">(VF-30) Very Fine - Almost complete detail with flat areas. </option>
<option value="VF-35">(VF-35) Very Fine - Detail is complete but worn with high points flat. </option>
<option value="EF-40">(EF-40) Extremely Fine - Lightly worn; all devices are clear, major devices bold.</option>

<option value="EF-45">(EF-45) Extremely Fine - Detail is complete with some high points flat.</option>
<option value="AU-50">(AU-50) About Uncirculated - Slight traces of wear on high points; may have contact marks and little eye appeal.</option>
<option value="AU-55">(AU-55) About Uncirculated - Full detail with friction on less than 1/2 surface, mainly on high points</option>

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
    <td colspan="3"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td width="119"><span class="darker">
    </span>
            <label>
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            eBay</label></td>
    <td width="159"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
Coin Shop</td>
    <td width="508"><label>
      <input type="radio" name="purchaseFrom" value="Other" id="otherRad" />
      Other</label></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="3">
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
    <td width="47%"> <label for="auctionNumber">Details</label>&nbsp;</td>
    <td width="53%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><textarea name="otherDetails" id="otherDetails" cols="" rows=""></textarea></td>
    </tr>
</table>
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="3"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="3"><textarea name="additional" id="additional" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom">      <input type="submit" name="halfCentFormBtn" id="halfCentFormBtn" value="Add Half Cent" /></td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p>Prnt.</p>
</div>

</body>
</html>
