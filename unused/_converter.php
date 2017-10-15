<?php 
include '../inc/config.php';
$value = 'Cent';

//TYPE VARIABLES
$getVarietyCountCollectedVar = getVarietyCountCollected($value);
$getVarietyCountVar = getVarietyCount($value);

$getSubVarietyCountCollectedVar = getSubVarietyCountCollected("Cent");
$getSubVarietyCountVar = getSubVarietyCount("Cent");

$getSubVarietyCountCollectedVar2 = getSubVarietyCountCollected("Ten Dollar");
$getSubVarietyCountVar2 = getSubVarietyCount("Ten Dollar");

$getSubVarietyCountCollectedVar3 = getSubVarietyCountCollected("Half Cent");
$getSubVarietyCountVar3 = getSubVarietyCount("Half Cent");


$getCompleteCollectedVar = getCompleteCollected($value); 
$getCompleteAllVar = getCompleteAll($value);
$completePercentCalc = ((100*$getCompleteCollectedVar)/$getCompleteAllVar);
$completePercent = number_format($completePercentCalc, 0);


//By Mint Mark counts
$getMintCollectedTypeVar = getMintCollectedType($value);
$getMintCountTypeVar = getMintCountType($value);
$mintPercentCalc = ((100*$getMintCollectedTypeVar)/$getMintCountTypeVar);
$mintPercent = number_format($mintPercentCalc, 0);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="../scripts/modernizr.js"></script>
<script type="text/javascript" src="../scripts/main.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<title>Gold Report</title>
<script type="text/javascript">
$(document).ready(function(){
$("#viewGraphBtn").click(function() {
   window.location = 'reportNickelGraph.php';
});

$("#ShieldNickelMini, #Liberty_HeadMini, #Indian_Head_NickelMini, #Jefferson_NickelMini, #WestwardJourneyMini, #Return_to_MonticelloMini").hide();

$("#nickelBagBtn").click(function() {
  $("#ShieldNickelMini, #Liberty_HeadMini, #Indian_Head_NickelMini, #Jefferson_NickelMini, #WestwardJourneyMini, #Return_to_MonticelloMini").toggle();
   if (this.value == 'Expand All') {
	  this.value = 'Hide All'
	}
	else {
	  this.value = 'Expand All';
	}
});


$("#ShieldNickelBtn").click(function() {
   $("#ShieldNickelMini").toggle();
   if (this.value == '-') {
	  this.value = '+'
	}
	else {
	  this.value = '-';
	}
});

$("#Liberty_Head_NickelBtn").click(function() {
   $("#Liberty_HeadMini").toggle();
   if (this.value == '-') {
	  this.value = '+'
	}
	else {
	  this.value = '-';
	}
});

$("#Indian_Head_NickelBtn").click(function() {
   $("#Indian_Head_NickelMini").toggle();
   if (this.value == '-') {
	  this.value = '+'
	}
	else {
	  this.value = '-';
	}
});

$("#Jefferson_NickelBtn").click(function() {
   $("#Jefferson_NickelMini").toggle();
   if (this.value == '-') {
	  this.value = '+'
	}
	else {
	  this.value = '-';
	}
});

$("#WestwardJourneyBtn").click(function() {
   $("#WestwardJourneyMini").toggle();
   if (this.value == '-') {
	  this.value = '+'
	}
	else {
	  this.value = '-';
	}
});

$("#Return_to_MonticelloBtn").click(function() {
   $("#Return_to_MonticelloMini").toggle();
   if (this.value == '-') {
	  this.value = '+'
	}
	else {
	  this.value = '-';
	}
});



});
</script>  


<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<hr />
<a name="twenty"></a>
<div class="roundedWhite"><a name="nickels"></a>
<img src="../img/Shield_Nickel.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Nickels / <a href="reportHalf_Dime.php">Half Dimes</a> <input id="closeAllBtn" name="" type="button" value="Expand All"></h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><input id="ShieldNickelBtn" name="" type="button" value="+"> 
  <a href="viewListReport.php?coinType=Shield Nickel&page=1">Shield Nickel</a> (1866-1883)</td>
  <td align="center" id="ShieldNickelCount"><input readonly class="collectCount" type="text" value="<?php echo getCollectionCount('Shield Nickel'); ?>"/ ></td>  
  <td>&nbsp;</td>
  <tr id="ShieldNickelMini" class="noHighlight">
  <td colspan="3">
  
  <table width="100%" border="0">
<td width="43%">Mint Collection Progress</td>
    <td width="57%">0 of <?php echo getMintCount('Shield Nickel') ?> (0%)</td>
  <tr>
    <td>Complete Collection Progress</td>
    <td><?php echo getCompleteSet("Shield Nickel"); ?></td>
  </tr>
</table>

  
  
  <a class="miniReportLink" href="viewListReport.php?coinType=Shield Nickel&page=1">Shield Nickel Full Report</a> | Add To Collection  </td>
  </tr>
  <tr>
    <td><input id="Liberty_Head_NickelBtn" name="" type="button" value="+"> <a href="viewListReport.php?coinType=Liberty_Head_Nickel&page=1">Liberty Head Nickel</a> (1883-1913)</td>
     <td align="center" id="Liberty_Head_NickelCount"><input readonly class="collectCount" type="text" value="<?php echo getCollectionCount('Liberty Head Nickel'); ?>"/ ></td>  
     <td>&nbsp;</td>
  </tr>
  
  <tr id="Liberty_HeadMini" class="noHighlight">
  <td colspan="3">
  
  <table width="100%" border="0">
<td width="43%">Mint Collection Progress</td>
    <td width="57%">0 of <?php echo getMintCount('Liberty Head Nickel') ?> (0%)</td>
  <tr>
    <td>Complete Collection Progress</td>
    <td><?php echo getCompleteSet("Liberty Head Nickel"); ?></td>
  </tr>
</table>
  <a class="miniReportLink" href="viewListReport.php?coinType=Liberty_Head_Nickel&page=1">Liberty Head Nickel Full Report</a>  </td>
  </tr>
  
  
 <tr><td><input id="Indian_Head_NickelBtn" name="" type="button" value="+"> <a href="viewListReport.php?coinType=Indian_Head_Nickel&page=1">Indian Head Nickel</a> (1913-1938)
    <td align="center" id="Indian_Head_NickelCount"><input readonly class="collectCount" type="text" value="<?php echo getCollectionCount('Indian Head Nickel'); ?>"/ ></td>
    <td>&nbsp;</td>
 </tr>
 
 <tr id="Indian_Head_NickelMini" class="noHighlight">
  <td colspan="3">
  <table width="100%" border="0">
<td width="43%">Mint Collection Progress</td>
    <td width="57%">0 of <?php echo getMintCount('Indian Head Nickel') ?> (0%)</td>
  <tr>
    <td>Complete Collection Progress</td>
    <td><?php echo getCompleteSet("Indian Head Nickel"); ?></td>
  </tr>
</table>
  <a class="miniReportLink" href="viewListReport.php?coinType=Indian_Head_Nickel&page=1">Indian Head Nickel Full Report</a>  </td>
  </tr>
 
 <tr>
 <td><input id="Jefferson_NickelBtn" name="" type="button" value="+"> <a href="viewListReport.php?coinType=Jefferson_Nickel&page=1">Jefferson Nickel</a> (1938-2003)</td>
    <td align="center" id="Jefferson_NickelCount"><input readonly class="collectCount" type="text" value="<?php echo getCollectionCount('Jefferson Nickel'); ?>"/ ></td>
    <td>&nbsp;</td>
 </tr>
 
 <tr id="Jefferson_NickelMini" class="noHighlight">
  <td colspan="3">
  <table width="100%" border="0">
<td width="43%">Mint Collection Progress</td>
    <td width="57%">0 of <?php echo getMintCount('Jefferson Nickel') ?> (0%)</td>
  <tr>
    <td>Complete Collection Progress</td>
    <td><?php echo getCompleteSet("Jefferson Nickel"); ?></td>
  </tr>
</table>
  <a class="miniReportLink" href="viewListReport.php?coinType=Jefferson_Nickel&page=1">Jefferson Nickel Full Report</a>  </td>
  </tr>
 
 <tr>
    <td><input id="WestwardJourneyBtn" name="" type="button" value="+"> 
    <a href="viewListReport.php?coinType=Westward_Journey&page=1">Westward Journey Series</a> (2004-2005)</td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="collectCount" type="text" value="<?php echo getCollectionCount('Westward Journey'); ?>" /></td>
    <td>&nbsp;</td>
 </tr>
 
 <tr id="WestwardJourneyMini" class="noHighlight">
  <td colspan="3">
  <table width="100%" border="0">
<td width="43%">Mint Collection Progress</td>
    <td width="57%">0 of <?php echo getMintCount('Westward Journey') ?> (0%)</td>
  <tr>
    <td>Set Collection Progress</td>
    <td>&nbsp;</td>
  <tr>
    <td>Complete Collection Progress</td>
    <td><?php echo getCompleteSet("Westward Journey"); ?></td>
  </tr>
</table>
  <a class="miniReportLink" href="viewListReport.php?coinType=Westward_Journey&page=1">Westward Journey Full Report</a>  </td>
  </tr>
 
  <tr>
    <td><input id="Return_to_MonticelloBtn" name="" type="button" value="+"> 
    <a href="viewListReport.php?coinType=Return_to_Monticello&page=1">Return to Monticello</a> (2006-Present)</td>
    <td align="center" id="Return_to_MonticelloCount"><input readonly class="collectCount" type="text" value="<?php echo getCollectionCount('Return to Monticello'); ?>"/ ></td>
    <td>&nbsp;</td>
 </tr>
 
 <tr id="Return_to_MonticelloMini" class="noHighlight">
  <td colspan="3">
  <table width="100%" border="0">
<td width="43%">Mint Collection Progress</td>
    <td width="57%">0 of <?php echo getMintCount('Return to Monticello') ?> (0%)</td>
  <tr>
    <td>Complete Collection Progress</td>
    <td><?php echo getCompleteSet("Return to Monticello"); ?></td>
  </tr>
</table>
  <a class="miniReportLink" href="viewListReport.php?coinType=Return_to_Monticello&page=1">Return to Monticello Full Report</a>  </td>
  </tr>
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="total_quantity" readonly class="collectCount" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <select onChange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Quick Menu</option>
<optgroup label="Half Cents">
<option value="reportCent.php#half">All Half Cents</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Half_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Half_Cent&page=1">Braided Hair</option>
</optgroup>
<optgroup label="Large Cents">
<option value="reportCent.php#large">All Large Cents</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Large_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Large_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent&page=1">Coronet Liberty Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent&page=1">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="reportCent.php#cent">All Cents</option>
<option value="viewListReport.php?coinType=Flying_Eagle&page=1">Flying Eagle Cent</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Lincoln Wheat Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Lincoln Memorial Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Two Cents">
<option value="Two_Cent">Two Cent Piece</option>
</optgroup>
<optgroup label="Three Cents">
<option value="Three_Cent">Three Cent Piece</option>
</optgroup>
<optgroup label="Half Dimes">
<option value="reportHalf_Dime.php">All Half Dimes</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dime&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime&page=1">Liberty Cap Half Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime&page=1">Seated Liberty Half Dime</option>
</optgroup>
<optgroup label="Nickels">
<option value="reportNickel.php">All Nickels</option>
<option value="viewListReport.php?coinType=Shield_Nickel&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Classic Head Half Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Braided Hair Half Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial Series</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Dimes">
<option value="reportDime.php">All Dimes</option>
<option value="viewListReport.php?coinType=Drapped_Bust_Dime&page=1">Drapped Bust Dime</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Dime&page=1">Liberty Cap Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dime&page=1">Liberty Seated Dime</option>
<option value="viewListReport.php?coinType=Barber_Dime&page=1">Barber Dime</option>
<option value="viewListReport.php?coinType=Winged_Liberty_Dime&page=1">Winged Liberty Dime</option>
<option value="viewListReport.php?coinType=Roosevelt_Dime&page=1">Roosevelt Dime</option>
</optgroup>
<optgroup label="Twenty Cents">
<option value="Twenty Cents">Twenty Cent Piece</option>
</optgroup>
<optgroup label="Quarters">
<option value="reportQuarter.php">All Quarters</option>
<option value="viewListReport.php?coinType=Draped_Bust_Quarter&page=1">Draped Bust Quarter</option>
<option value="viewListReport.php?coinType=Capped_Bust_Quarter&page=1">Capped Bust Quarter</option>
<option value="viewListReport.php?coinType=Liberty_Seated_Quarter&page=1">Liberty Seated Quarter</option>
<option value="viewListReport.php?coinType=Barber_Quarter&page=1">Barber Quarter</option>
<option value="viewListReport.php?coinType=Standing_Liberty&page=1">Standing Liberty</option>
<option value="viewListReport.php?coinType=Washington_Quarter&page=1">Washington Quarter</option>
<option value="viewListReport.php?coinType=State Quarter&page=1">State Quarter</option>
<option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories&page=1">D.C. and U. S. Territories</option>
<option value="viewListReport.php?coinType=America the Beautiful Quarter&page=1">America the Beautiful Quarter</option>
</optgroup>
<optgroup label="Half Dollars">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar&page=1">Flowing Hair Half</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar&page=1">Draped Bust Half</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar&page=1">Liberty Cap Half</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar&page=1">Seated Liberty Half</option>
<option value="viewListReport.php?coinType=Barber_Half_Dollar&page=1">Barber Half</option>
<option value="viewListReport.php?coinType=Walking_Liberty&page=1">Walking Liberty Half</option>
<option value="viewListReport.php?coinType=Franklin_Half_Dollar&page=1">Franklin Half</option>
<option value="viewListReport.php?coinType=Kennedy_Half_Dollar&page=1">Kennedy Half</option>
</optgroup>
<optgroup label="Dollars">
<option value="reportDollar.php">All Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Dollar&page=1">Flowing Hair Dollar</option>
<option value="viewListReport.php?coinType=Draped_Bust_Dollar&page=1">Draped Bust Dollar</option>
<option value="viewListReport.php?coinType=Gobrecht_Dollar&page=1">Gobrecht Dollar</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dollar&page=1">Seated Liberty Dollar</option>
<option value="viewListReport.php?coinType=Trade_Dollar&page=1">Trade Dollar</option>
<option value="viewListReport.php?coinType=Morgan_Dollar&page=1">Morgan Dollar</option>
<option value="viewListReport.php?coinType=Peace_Dollar&page=1">Peace Dollar</option>
<option value="viewListReport.php?coinType=Eisenhower_Dollar&page=1">Eisenhower Dollar</option>
<option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar&page=1">Susan B. Anthony</option>
<option value="viewListReport.php?coinType=Sacagawea_Dollar&page=1">Sacagawea/Native American</option>
<option value="viewListReport.php?coinType=Presidential_Dollar&page=1">Presidential Dollar</option>
</optgroup>
</select><br>
<a class="topLink" href="#top">Top</a></p></div>
<hr>
<div class="roundedWhite"><a name="more"></a>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Rolls</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  </table>
</div>
</body>
</html>