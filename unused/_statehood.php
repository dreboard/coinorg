<?php 
$value = 'Quarter';
include '../inc/config.php';

//TYPE VARIABLES
$getVarietyCountCollectedVar = getVarietyCountCollected($value);
$getVarietyCountVar = getVarietyCount($value);

$getSubVarietyCountCollectedVar = getSubVarietyCountCollected("State Quarter");
$getSubVarietyCountVar = getSubVarietyCount("State Quarter");

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
<title>State Quarters Report</title>
<script type="text/javascript">
$(document).ready(function(){
$("#viewGraphBtn").click(function() {
   window.location = 'reportNickelGraph.php';
});


/*mintRollLink
mintBagLink
rollTypeLink
bagTypeLink*/


$(".addDelawareBtns, .add1999Btns").hide();

$("#addDelawareBtns").click(function() {
  $(".addDelawareBtns").toggle();
   if (this.value == 'Add Mode') {
	  this.value = 'View Mode'
	}
	else {
	  this.value = 'Add Mode';
	}
});
$("#add1999Btn").click(function() {
  $(".add1999Btns").toggle();
   if (this.value == 'Add Mode') {
	  this.value = 'View Mode'
	}
	else {
	  this.value = 'Add Mode';
	}
});

$("#DelawareLink2").click(function() {
	
  document.location('#DelawareLink');
});




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
.addTypeForm {margin:0px; display:inline;}
.otherTbl {margin:0px; font-size:80%;}
.otherInfo {padding:0px;}
.investmentTbl {display:inline; float:left;}
.coinHrdLogo {width:40px; height:auto;}
.newBulk {width:100px; height:auto;}
.topBdr {border-top:3px #000 solid;}
.yearHeadTbl {margin:10px 0px;}
.yearHeadTbl h2 {margin:0px;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<h1>Statehood Quarters Report</h1>
<table width="858" class="reportListTbl" border="0">
  <tr>
    <td width="333" rowspan="5" valign="top"><img src="../img/StateQuarter.jpg" name="reportImg" width="250" height="219" id=""></td>
    <td width="333">Total Collected</td>
    <td width="178">147</td>
  </tr>
  <tr>
    <td>Total Investment</td>
    <td>$353.00</td>
  </tr>
  <tr>
    <td>Type Collection Progress</td>
    <td><?php echo getVarietyCountCollected($value) ?> of <?php echo getVarietyCount($value) ?> (<?php echo percent($getVarietyCountCollectedVar, $getVarietyCountVar); ?>%)</td>
  </tr>
  <tr>
    <td height="42">Mint Collection Progress</td>
    <td><?php echo $getMintCollectedTypeVar; ?> of <?php echo $getMintCountTypeVar; ?> (<?php echo $mintPercent; ?>%)</td>
  </tr>
  <tr>
    <td height="42">Complete Collection Progress</td>
    <td><?php echo $getCompleteCollectedVar; ?> of <?php echo $getCompleteAllVar ?> (<?php echo $completePercent; ?>%)</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<table width="100%" id="reportListLinks">
  <tr>
    <td width="12%" class="darker">Category</td>
    <td width="26%" class="darker"><a href="#silver">By State</a></td>
    <td width="26%" class="darker"> <a href="#gold">By Year</a></td>  
    <td width="18%" class="darker"> <a href="#gold">Bags</a></td>   
    <td width="18%" class="darker">First Day</td>
  </tr>
</table>

<img src="../img/State_Quarter_Folder.jpg" width="230" height="332" alt="State_Quarter_Folder" />
<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="7"><h3>Type Collection <?php echo getVarietyCountCollected($value) ?> of <?php echo getVarietyCount($value) ?> (<?php echo percent($getVarietyCountCollectedVar, $getVarietyCountVar); ?>%)</h3></td>
    </tr>
<tr class="dateHolder" valign="top">
  <td valign="middle">1999</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Delaware'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">Delaware</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Pennsylvania'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1">Pennsylvania</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('New Jersey'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1">New Jersey</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Georgia'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1">Georgia</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Stanberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1">Connecticut</a> </td>
</tr>
    
<tr class="dateHolder" valign="top">
  <td valign="middle">2000</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1"> Massachusetts </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1"> Maryland </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> South Carolina </a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> New Hampshire </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1"> Kentucky </a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2001</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1"> New York </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1"> North Carolina </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> Rhode Island </a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> Vermont </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1">Stanberty</a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2002</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1"> Tennessee </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1"> Ohio </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> Louisiana</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> Indiana</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1"> Mississippi</a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2003</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">Illinois</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1">Alabama</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1">Maine</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1">Missouri</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1">Arkansas</a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2004</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">Michigan </a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1">Florida</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> Texas</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> Iowa</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1"> Wisconsin</a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2005</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1"> California</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1"> Minnesota</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> Oregon</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> Kansas</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1"> West Virginia</a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2006</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1"> Nevada</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1"> Nebraska</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> Colorado</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> North Dakota</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1"> South Dakota</a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2007</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1"> Montana</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1"> Washington</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> Idaho</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> Wyoming</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1"> Utah</a> </td>
</tr>

<tr class="dateHolder" valign="top">
  <td valign="middle">2008</td> 
<td><a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Draped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Draped_Bust_Quarter&page=1"> Oklahoma</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Capped_Bust_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Capped Bust Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Liberty_Head_Nickel&page=1"> New Mexico</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Seated Liberty Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Seated_Liberty_Quarter&page=1"> Arizona</a> </td>
  
<td> <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Barber Quarter'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Barber_Quarter&page=1"> Alaska</a> </td>
  
<td><a href="viewListReportReport.php?coinType=Standing Liberty&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Standing Liberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReportReport.php?coinType=Standing_Liberty&page=1"> Hawaii</a> </td>
</tr>
</table>
<div class="spacer"></div>
<div class="roundedWhite">
<table width="100%" class="reportList priceListTbl" border="1">
  <tr class="reportListLinks">
    <td width="128" class="darker"> Sets</td>
    <td width="135" align="center" class="darker">Proof</td>
    <td width="184" align="center" class="darker">Silver Proof</td>
    <td width="311" align="center" class="darker">Certified Proof</td>
    <td width="286" align="center" class="darker">Certified Group</td>    
    </tr>
  <tr valign="middle">
    <td class="darker">1999</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/Delaware.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/Pennsylvania.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/New_Jersey.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/georgia1999.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/connecticut1999.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2000</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/massachusetts2000.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/maryland2000.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/southcarolina2000.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/newhampshire2000.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/virginia2000.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2001</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/newyork2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/northcarolina2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/rhodeisland2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/vermont2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/kentucky2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2002</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/tennesee2002.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/northcarolina2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/rhodeisland2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/vermont2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/kentucky2001.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2003</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/illinois.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/alabama.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/maine.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/missouri2003.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/arkansas2003.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2004</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/michigan2004.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/florida2004.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/texas2004.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/iowa2004.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/wisconsin2004.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2005</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/california2005.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/minnesota2005.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/oregon2005.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/kansas2005.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/westvirginia2005.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2006</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/nevada.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/nebraska2006.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/colorado2006.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/northdakota2006.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/southdakota.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2007</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/montana.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/washington.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/idaho.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/wyoming.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/utah.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td class="darker">2008</td>
    <td align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000</a></td>
    <td align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000</a></td>
    <td align="center"><span class="darker"><img src="../img/Oklahoma.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/NewMexico.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/Arizona.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/Alaska.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span><span class="darker"><img src="../img/Hawaii.jpg" alt="" width="40" height="auto" align="texttop" class="coinHrdLogo" /></span></td>
    <td align="center">&nbsp;</td>
  </tr>
  </table>
  <p></p>
</div>
<div class="spacer"></div>
<div class="roundedWhite">
<table width="100%" class="reportList priceListTbl" border="1">
  <tr>
    <td width="8%">1999</td>
    <td width="18%" id="DelawareLink">Delaware</td>
    <td width="19%" id="PennsylvaniaLink">Pennsylvania</td>
    <td width="19%" id="NewJerseyLink">New Jersey</td>
    <td width="18%" id="GeorgiaLink">Georgia</td>
    <td width="18%" id="ConnecticutLink">Connecticut</td>
  </tr>
  <tr>
    <td>2000</td>
    <td>Massachusetts </td>
    <td>Maryland </td>
    <td>South Carolina</td>
    <td>New Hampshire</td>
    <td>Virginia</td>
  </tr>
  <tr>
    <td>2001</td>
    <td>New York</td>
    <td>North Carolina</td>
    <td>Rhode Island</td>
    <td>Vermont</td>
    <td>Kentucky</td>
  </tr>
  <tr>
    <td>2002</td>
    <td>Tennessee</td>
    <td>Ohio</td>
    <td>Louisiana</td>
    <td>Indiana</td>
    <td>Mississippi</td>
  </tr>
  <tr>
    <td>2003</td>
    <td>Illinois</td>
    <td>Alabama</td>
    <td>Maine</td>
    <td>Missouri</td>
    <td>Arkansas</td>
  </tr>
  <tr>
    <td>2004</td>
    <td>Michigan</td>
    <td>Florida</td>
    <td>Texas</td>
    <td>Iowa</td>
    <td>Wisconsin</td>
  </tr>
  <tr>
    <td>2005</td>
    <td>California</td>
    <td>Minnesota</td>
    <td>Oregon</td>
    <td>Kansas</td>
    <td>West Virginia</td>
  </tr>
  <tr>
    <td>2006</td>
    <td>Nevada</td>
    <td>Nebraska</td>
    <td>Colorado</td>
    <td>North Dakota</td>
    <td>South Dakota</td>
  </tr>
  <tr>
    <td>2007</td>
    <td>Montana</td>
    <td>Washington</td>
    <td>Idaho</td>
    <td>Wyoming</td>
    <td>Utah</td>
  </tr>
  <tr>
    <td>2008</td>
    <td>Oklahoma</td>
    <td>New Mexico</td>
    <td>Arizona</td>
    <td>Alaska</td>
    <td>Hawaii</td>
  </tr>
</table>
</div>
<div class="spacer"></div>
<div class="roundedWhite"><a name="State1999"></a>
<table width="100%" border="0" class="yearHeadTbl">
  <tr valign="middle">
    <td width="36%"><h2>1999 State Quarters &nbsp;<?php echo $State->getYear(); ?></h2></td>
    <td width="26%">&nbsp;</td>
    <td width="38%" align="right"><input name="add1999Btn" id="add1999Btn" type="button" value="Add Mode" /></td>
  </tr>
</table>
  <table width="100%" border="0" class="priceListTbl">
    <tr class="reportListLinksLeft">
      <td width="37%" class="darker">Total Face Value</td>
      <td width="43%" class="darker">Total Investment</td>
      <td width="20%">&nbsp;</td>
    </tr>
    
    <tr>
      <td>$<?php echo $State->getThisStateFaceValue($value) ?><img src="../img/moneyIcon.jpg" alt="value" width="auto" height="30" hspace="2" align="texttop" /></td>
      <td>$<?php echo $State->getThisStateInvestment($value) ?><img src="../img/moneyIcon.jpg" alt="value" width="auto" height="30" hspace="2" align="texttop" /></td>
      <td>&nbsp;</td>
    </tr>
</table>
<hr />

<table width="100%" class="reportList priceListTbl" border="0">
<tr class="dateHolder" valign="top">

<td id="DelawareLink2"><a href="viewListReportReport.php?coinType=State_Quarter&page=1">
  <img class="coinSwitch" src="../img/<?php echo getStateImage('Delaware'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=State_Quarter&page=1">Delaware</a> </td>
  
<td id="PennsylvaniaLink2"><a href="viewListReportReport.php?coinType=State_Quarter&page=1">  <img class="coinSwitch" src="../img/<?php echo getStateImage('Pennsylvania'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=State_Quarter&page=1">Pennsylvania</a> </td>
  
<td id="NewJerseyLink2"><a href="viewListReportReport.php?coinType=State_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('New Jersey'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=State_Quarter&page=1">New Jersey</a> </td>
  
<td id="GeorgiaLink2"> <a href="viewListReportReport.php?coinType=State_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Georgia'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=State_Quarter&page=1">Georgia</a> </td>
  
<td id="ConnecticutLink2"><a href="viewListReportReport.php?coinType=State_Quarter&page=1"><img class="coinSwitch" src="../img/<?php echo getStateImage('Stanberty'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=State_Quarter&page=1">Connecticut</a> </td>
</tr>

  </table>
  
  <table width="100%" class="reportList priceListTbl clear" border="1">
  <tr class="reportListLinks">
    <td width="180" class="darker">&nbsp;</td>
    <td colspan="2" align="center" class="darker">P</td>
    <td colspan="2" align="center" class="darker">D</td>
    <td colspan="3" align="center" class="darker">S</td>    
    <td colspan="3" align="center" class="darker"> Silver</td>
    </tr>
  <tr valign="middle">
    <td valign="top" class="darker">Coins <img src="../img/Delaware.jpg" width="40" height="auto" align="texttop" class="coinHrdLogo" /></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=873'  title="$name"><?php echo $State->getThisStateP('Delaware'); ?><span class="darker">
      <input name="addDelawarePBtn" type="button" value="Add" class="add1999Btns" />
    </span></a></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=874'  title="$name"><?php echo $State->getThisStateD('Delaware'); ?><span class="darker">
      <input type="button" name="button6" id="button6" value="Add" class="add1999Btns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=875'  title="$name"><?php echo $State->getThisStateS('Delaware'); ?><span class="darker">
      <input type="button" name="button7" id="button7" value="Add" class="add1999Btns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=876'  title="$name"><?php echo $State->getThisStatesSilver('Delaware'); ?><span class="darker">
      <input type="button" name="button8" id="button8" value="Add" class="add1999Btns" />
    </span></a></td>
    </tr>
    
    <tr valign="middle">
    <td valign="top" class="darker">Certified <img src="../img/State_QuarterCertified.jpg" width="auto" height="32" align="texttop" class="" /></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=873'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input name="addDelawarePBtn" type="button" value="Add" class="add1999Btns" />
    </span></a></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=874'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input type="button" name="button6" id="button6" value="Add" class="add1999Btns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=875'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input type="button" name="button7" id="button7" value="Add" class="add1999Btns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=876'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input type="button" name="button8" id="button8" value="Add" class="add1999Btns" />
    </span></a></td>
    </tr>
    
  <tr valign="top">
    <td height="47" rowspan="3" class="darker topBdr">Bulk  <img src="../img/newBulk2.jpg" width="100%" height="auto" align="texttop" class="newBulk" /></td>
    <td colspan="2" align="center" class="topBdr"><span class="darker">100 Bag<img src="../img/bagIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button" id="button" value="Add" class="add1999Btns" />
      </span></td>
    <td colspan="2" align="center" class="topBdr"><span class="darker">1000 Bag<img src="../img/bagIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button2" id="button2" value="Add" class="add1999Btns" />
      </span></td>
    <td colspan="3" align="center" class="topBdr"><span class="darker">Rolls<img src="../img/rollIcon.jpg" width="32" height="41" align="texttop" />
  <input type="button" name="button3" id="button3" value="Add" class="add1999Btns" />
      </span></td>
    <td colspan="3" align="center" class="topBdr"><span class="darker">Boxes<img src="../img/boxIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button4" id="button4" value="Add" class="add1999Btns" />
      </span></td>
  </tr>
  <tr valign="top" class="reportListLinks darker">
    <td width="89" align="center">P</td>
    <td width="99" align="center">D</td>
    <td width="95" align="center">P</td>
    <td width="103" align="center">D</td>
    <td width="71" align="center" valign="middle">Mint</td>
    <td width="54" align="center" valign="middle">P</td>
    <td width="56" align="center" valign="middle">D</td>
    <td width="63" align="center" valign="middle">Mix</td>
    <td width="55" align="center" valign="middle">P</td>
    <td width="51" align="center" valign="middle">D</td>
  </tr>
  <tr valign="top">
    <td height="22" align="center" valign="top"><a href='viewBag.php?coinID=873'  title="100 Count Delaware P Mint Bag"><?php echo $State->bagCount('873') ?></a></td>
    <td width="99" align="center" valign="top"><a href='viewBag.php?coinID=873' title="100 Count Delaware D Mint Bag"><?php echo $State->bagCount('873') ?></a></td>
    <td width="95" align="center" valign="top"><a href='viewBag.php?bagID=876' title="1000 Count Delaware D Mint Bag"><?php echo $State->bigBagCount('874') ?></a></td>
    <td width="103" align="center" valign="top"><a href='viewBag.php?bagID=876' title="1000 Count Delaware D Mint Bag"><?php echo $State->bigBagCount('874') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo $State->rollMintCount('1999 Delaware Mint Wrapped Two Roll Set') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo $State->rollMyCount('873') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo $State->rollMyCount('873') ?></a></td>
    <td align="center" valign="top"><?php echo $State->rollMix('Deleware'); ?></td>
    <td align="center" valign="top"><a href='rolls.php?rollID=1' title="$name"><?php echo $State->boxCount('873') ?></a></td>
    <td align="center" valign="top"><a href='rolls.php?rollID=1' title="$name"><?php echo $State->boxCount('873') ?></a></td>
  </tr>

  <tr valign="top">
    <td height="48" class="darker topBdr">First Day <img src="../img/firstDayIcon.jpg" width="25" height="32" align="texttop" /></td>
    <td colspan="11" class="topBdr"><?php echo $State->firstDayCount('Delaware') ?>
      <input name="input5" type="button" value="+" class="add1999Btns" /></td>
    </tr>
    
    <tr valign="top">
    <td height="48" class="darker topBdr">Errors <img src="../img/Delaware.jpg" width="40" height="auto" align="texttop" class="coinHrdLogo" /></td>
    <td colspan="11" class="topBdr"><?php echo $State->errorCount('Delaware') ?>
      <input name="input5" type="button" value="+" class="add1999Btns" /></td>
    </tr>
  </table>

<p><a href="#top">Top</a></p>
</div>
<div class="spacer"></div>
<div class="roundedWhite"><a name="Delaware"></a>
<table width="100%" border="0" class="yearHeadTbl">
  <tr valign="middle">
    <td width="36%"><h2>Delaware 1999 &nbsp;<?php echo $State->getStates(); ?></h2></td>
    <td width="26%">&nbsp;</td>
    <td width="38%" align="right"><input name="addDelawareBtns" id="addDelawareBtns" type="button" value="Add Mode" /></td>
  </tr>
</table>
  <table width="100%" border="0" class="priceListTbl">
    <tr class="reportListLinksLeft">
      <td width="37%" class="darker">Total Face Value</td>
      <td width="63%" class="darker">Total Investment</td>
    </tr>
    <tr>
      <td>$<?php echo $State->getThisStateFaceValue($value) ?><img src="../img/moneyIcon.jpg" alt="value" width="auto" height="30" hspace="2" align="texttop" /></td>
      <td>$<?php echo $State->getThisStateInvestment($value) ?><img src="../img/moneyIcon.jpg" alt="value" width="auto" height="30" hspace="2" align="texttop" /></td>

    </tr>
</table>
  
  <table width="100%" class="reportList priceListTbl clear" border="1">
  <tr class="reportListLinks">
    <td width="161" class="darker">&nbsp;</td>
    <td colspan="2" align="center" class="darker">P</td>
    <td colspan="2" align="center" class="darker">D</td>
    <td colspan="3" align="center" class="darker">S</td>    
    <td colspan="3" align="center" class="darker"> Silver</td>
    </tr>
  <tr valign="middle">
    <td valign="top" class="darker">Coins <img src="../img/Delaware.jpg" width="40" height="auto" align="texttop" class="coinHrdLogo" /></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=873'  title="$name"><?php echo $State->getThisStateP('Delaware'); ?><span class="darker">
      <input name="addDelawarePBtn" type="button" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=874'  title="$name"><?php echo $State->getThisStateD('Delaware'); ?><span class="darker">
      <input type="button" name="button6" id="button6" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=875'  title="$name"><?php echo $State->getThisStateS('Delaware'); ?><span class="darker">
      <input type="button" name="button7" id="button7" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=876'  title="$name"><?php echo $State->getThisStatesSilver('Delaware'); ?><span class="darker">
      <input type="button" name="button8" id="button8" value="Add" class="addDelawareBtns" />
    </span></a></td>
    </tr>
    
    <tr valign="middle">
    <td valign="top" class="darker">Certified <img src="../img/slabIcon.jpg" width="25" height="32" align="texttop" class="" /></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=873'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input name="addDelawarePBtn" type="button" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=874'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input type="button" name="button6" id="button6" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=875'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input type="button" name="button7" id="button7" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=876'  title="$name"><?php echo $State->certifiedCount('873') ?><span class="darker">
      <input type="button" name="button8" id="button8" value="Add" class="addDelawareBtns" />
    </span></a></td>
    </tr>
    
  <tr valign="top">
    <td height="47" rowspan="3" class="darker topBdr">Bulk  <img src="../img/newBulk2.jpg" width="100%" height="auto" align="texttop" class="newBulk" /></td>
    <td colspan="2" align="center" class="topBdr"><span class="darker">100 Bag<img src="../img/bagIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button" id="button" value="Add" class="addDelawareBtns" />
      </span></td>
    <td colspan="2" align="center" class="topBdr"><span class="darker">1000 Bag<img src="../img/bagIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button2" id="button2" value="Add" class="addDelawareBtns" />
      </span></td>
    <td colspan="3" align="center" class="topBdr"><span class="darker">Rolls<img src="../img/rollIcon.jpg" width="32" height="41" align="texttop" />
  <input type="button" name="button3" id="button3" value="Add" class="addDelawareBtns" />
      </span></td>
    <td colspan="3" align="center" class="topBdr"><span class="darker">Boxes<img src="../img/boxIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button4" id="button4" value="Add" class="addDelawareBtns" />
      </span></td>
  </tr>
  <tr valign="top" class="reportListLinks darker">
    <td width="108" align="center">P</td>
    <td width="99" align="center">D</td>
    <td width="95" align="center">P</td>
    <td width="103" align="center">D</td>
    <td width="71" align="center" valign="middle">Mint</td>
    <td width="54" align="center" valign="middle">P</td>
    <td width="56" align="center" valign="middle">D</td>
    <td width="63" align="center" valign="middle">Mix</td>
    <td width="55" align="center" valign="middle">P</td>
    <td width="51" align="center" valign="middle">D</td>
  </tr>
  <tr valign="top">
    <td height="22" align="center" valign="top"><a href='viewBag.php?coinID=873'  title="100 Count Delaware P Mint Bag"><?php echo $State->bagCount('873') ?></a></td>
    <td width="99" align="center" valign="top"><a href='viewBag.php?coinID=873' title="100 Count Delaware D Mint Bag"><?php echo $State->bagCount('873') ?></a></td>
    <td width="95" align="center" valign="top"><a href='viewBag.php?bagID=876' title="1000 Count Delaware D Mint Bag"><?php echo $State->bigBagCount('874') ?></a></td>
    <td width="103" align="center" valign="top"><a href='viewBag.php?bagID=876' title="1000 Count Delaware D Mint Bag"><?php echo $State->bigBagCount('874') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo $State->rollMintCount('1999 Delaware Mint Wrapped Two Roll Set') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo $State->rollMyCount('873') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo $State->rollMyCount('873') ?></a></td>
    <td align="center" valign="top"><?php echo $State->rollMix('Deleware'); ?></td>
    <td align="center" valign="top"><a href='rolls.php?rollID=1' title="$name"><?php echo $State->boxCount('873') ?></a></td>
    <td align="center" valign="top"><a href='rolls.php?rollID=1' title="$name"><?php echo $State->boxCount('873') ?></a></td>
  </tr>

  <tr valign="top">
    <td height="48" class="darker topBdr">First Day <img src="../img/firstDayIcon.jpg" width="25" height="32" align="texttop" /></td>
    <td colspan="11" class="topBdr"><?php echo $State->firstDayCount('Delaware') ?>
      <input name="input5" type="button" value="+" class="addDelawareBtns" /></td>
    </tr>
    
    <tr valign="top">
    <td height="48" class="darker topBdr">Errors <img src="../img/Delaware.jpg" width="40" height="auto" align="texttop" class="coinHrdLogo" /></td>
    <td colspan="11" class="topBdr"><?php echo $State->errorCount('Delaware') ?>
      <input name="input5" type="button" value="+" class="addDelawareBtns" /></td>
    </tr>
  </table>

<p>
<?php 
echo $State->getMintByID('873');

?>
<a href="#top">Top</a></p>
</div>
<hr />
<div class="roundedWhite"><a name="Pennsylvania"></a>
  <table width="100%" border="1" class="priceListTbl">
    <tr class="reportListLinks">
      <td width="29%" class="darker">Pennsylvania 1999</td>
      <td width="19%" align="left">Total Face Value</td>
      <td width="18%">Total Investment</td>
      <td width="14%">&nbsp;</td>
      <td width="20%">&nbsp;</td>
    </tr>
    <tr>
      <td><input name="addDelawareBtns" id="addDelawareBtns" type="button" value="Add Mode" /></td>
      <td>$345.99</td>
      <td>$345.99</td>
      <td>&nbsp;</td>
      <td><select name="State" id="switchState"> 
<option value="" selected="selected">Switch State</option> 
<option value="AL">Alabama</option> 
<option value="AK">Alaska</option> 
<option value="AZ">Arizona</option> 
<option value="AR">Arkansas</option> 
<option value="CA">California</option> 
<option value="CO">Colorado</option> 
<option value="CT">Connecticut</option> 
<option value="DE">Delaware</option> 
<option value="DC">District Of Columbia</option> 
<option value="FL">Florida</option> 
<option value="GA">Georgia</option> 
<option value="HI">Hawaii</option> 
<option value="ID">Idaho</option> 
<option value="IL">Illinois</option> 
<option value="IN">Indiana</option> 
<option value="IA">Iowa</option> 
<option value="KS">Kansas</option> 
<option value="KY">Kentucky</option> 
<option value="LA">Louisiana</option> 
<option value="ME">Maine</option> 
<option value="MD">Maryland</option> 
<option value="MA">Massachusetts</option> 
<option value="MI">Michigan</option> 
<option value="MN">Minnesota</option> 
<option value="MS">Mississippi</option> 
<option value="MO">Missouri</option> 
<option value="MT">Montana</option> 
<option value="NE">Nebraska</option> 
<option value="NV">Nevada</option> 
<option value="NH">New Hampshire</option> 
<option value="NJ">New Jersey</option> 
<option value="NM">New Mexico</option> 
<option value="NY">New York</option> 
<option value="NC">North Carolina</option> 
<option value="ND">North Dakota</option> 
<option value="OH">Ohio</option> 
<option value="OK">Oklahoma</option> 
<option value="OR">Oregon</option> 
<option value="PA">Pennsylvania</option> 
<option value="RI">Rhode Island</option> 
<option value="SC">South Carolina</option> 
<option value="SD">South Dakota</option> 
<option value="TN">Tennessee</option> 
<option value="TX">Texas</option> 
<option value="UT">Utah</option> 
<option value="VT">Vermont</option> 
<option value="VA">Virginia</option> 
<option value="WA">Washington</option> 
<option value="WV">West Virginia</option> 
<option value="WI">Wisconsin</option> 
<option value="WY">Wyoming</option>
</select></td>
    </tr>
</table>
  
  <table width="100%" class="reportList priceListTbl clear" border="1">
  <tr class="reportListLinks">
    <td width="139" class="darker">&nbsp;</td>
    <td colspan="2" align="center" class="darker">P</td>
    <td colspan="2" align="center" class="darker">D</td>
    <td colspan="3" align="center" class="darker">S</td>    
    <td colspan="3" align="center" class="darker"> Silver</td>
    <td width="238" align="center" class="darker">Other</td>
    </tr>
  <tr valign="middle">
    <td valign="top" class="darker">Coins <img src="../img/Pennsylvania.jpg" width="40" height="auto" align="texttop" class="coinHrdLogo" /></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=873'  title="$name">10000<span class="darker">
      <input name="addDelawarePBtn" type="button" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="2" align="center"><a href='viewStateCoin.php?coinID=874'  title="$name">10000<span class="darker">
      <input type="button" name="button6" id="button6" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=875'  title="$name">10000<span class="darker">
      <input type="button" name="button7" id="button7" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td colspan="3" align="center"><a href='viewStateCoin.php?coinID=876'  title="$name">10000<span class="darker">
      <input type="button" name="button8" id="button8" value="Add" class="addDelawareBtns" />
    </span></a></td>
    <td rowspan="5" valign="top" class="otherInfo">

<table width="100%" class="otherTbl">
  <tr>
    <td width="60%" valign="top"><img src="../img/firstDayIcon.jpg" width="25" height="32" align="texttop" />First Day</td>
    <td width="19%" valign="top"><?php echo $State->firstDayCount('Delaware') ?></td>
    <td width="21%"><input name="input4" type="button" value="+" class="addDelawareBtns" /></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" class="darker">Certified Coins</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><img src="../img/slabIcon.jpg" width="25" height="32" align="texttop" /> P</td>
    <td valign="top"><?php echo $State->certifiedCount('873') ?></td>
    <td><input name="input" type="button" value="+" class="addDelawareBtns" /></td>
  </tr>
  <tr>
    <td valign="top"><img src="../img/slabIcon.jpg" alt="" width="25" height="32" align="texttop" /> D</td>
    <td valign="top"><?php echo $State->certifiedCount('873') ?></td>
    <td><input name="input2" type="button" value="+" class="addDelawareBtns" /></td>
  </tr>
  <tr>
    <td valign="top"><img src="../img/slabIcon.jpg" alt="" width="25" height="32" align="texttop" /> S</td>
    <td valign="top"><?php echo $State->certifiedCount('873') ?></td>
    <td><input name="input3" type="button" value="+" class="addDelawareBtns" /></td>
  </tr>
</table>    </td>
    </tr>
  <tr valign="top">
    <td height="97" rowspan="4" class="darker topBdr">Bulk  <img src="../img/newBulk.jpg" width="100" height="auto" align="texttop" class="newBulk" /></td>
    <td colspan="2" align="center" class="topBdr"><span class="darker">100 Bag<img src="../img/bagIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button" id="button" value="Add" class="addDelawareBtns" />
    </span></td>
    <td colspan="2" align="center" class="topBdr"><span class="darker">1000 Bag<img src="../img/bagIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button2" id="button2" value="Add" class="addDelawareBtns" />
    </span></td>
    <td colspan="3" align="center" class="topBdr"><span class="darker">Rolls<img src="../img/rollIcon.jpg" width="32" height="41" align="texttop" /><br />
<input type="button" name="button3" id="button3" value="Add" class="addDelawareBtns" />
    </span></td>
    <td colspan="3" align="center" class="topBdr"><span class="darker">Boxes<img src="../img/boxIcon.jpg" width="32" height="41" align="texttop" />
      <input type="button" name="button4" id="button4" value="Add" class="addDelawareBtns" />
    </span></td>
    </tr>
  <tr valign="top" class="reportListLinks darker">
    <td width="64" align="center">P</td>
    <td width="66" align="center">D</td>
    <td width="63" align="center">P</td>
    <td width="69" align="center">D</td>
    <td width="58" align="center" valign="middle">Mint</td>
    <td width="42" align="center" valign="middle">P</td>
    <td width="44" align="center" valign="middle">D</td>
    <td width="50" align="center" valign="middle">Mix</td>
    <td width="43" align="center" valign="middle">P</td>
    <td width="34" align="center" valign="middle">D</td>
  </tr>
  <tr valign="top">
    <td height="22" align="center" valign="top"><a href='viewBag.php?coinID=873'  title="100 Count Delaware P Mint Bag"><?php echo bagCount('873') ?></a></td>
    <td width="66" align="center" valign="top"><a href='viewBag.php?coinID=873' title="100 Count Delaware D Mint Bag"><?php echo bagCount('873') ?></a></td>
    <td width="63" align="center" valign="top"><a href='viewBag.php?bagID=876' title="1000 Count Delaware D Mint Bag"><?php echo bigBagCount('874') ?></a></td>
    <td width="69" align="center" valign="top"><a href='viewBag.php?bagID=876' title="1000 Count Delaware D Mint Bag"><?php echo bigBagCount('874') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo rollMintCount('1999 Delaware Mint Wrapped Two Roll Set') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo rollMyCount('873') ?></a></td>
    <td align="center" valign="top"><a href='viewRoll.php?boxID=876' title="$name"><?php echo rollMyCount('873') ?></a></td>
    <td align="center" valign="top"><?php echo rollMix('Deleware'); ?></td>
    <td align="center" valign="top"><a href='rolls.php?rollID=1' title="$name"><?php echo boxCount('873') ?></a></td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td height="23" colspan="10" align="center" valign="top">&nbsp;</td>
    </tr>
  </table>

  <p></p>
</div>
<hr />
<p>&nbsp;</p>
<div class="spacer"></div>
<p>&nbsp;</p>
<p>2000 D Sacagawea Dollar 2000 Coin Bag<br />
  2000 D Sacagawea Dollar 250 Coin Bag<br />
  2000 P Sacagawea Dollar 2000 Coin Bag<br />
  2000 P Sacagawea Dollar 250 Coin Bag<br />
  2001 D Sacagawea Dollar 2000 Coin Bag<br />
  2001 D Sacagawea Dollar 250 Coin Bag<br />
  2001 P Sacagawea Dollar 2000 Coin Bag<br />
  2001 P Sacagawea Dollar 250 Coin Bag<br />
  2002 D Sacagawea Dollar 2000 Coin Bag<br />
  2002 D Sacagawea Dollar 250 Coin Bag<br />
  2002 P Sacagawea Dollar 2000 Coin Bag<br />
  2002 P Sacagawea Dollar 250 Coin Bag<br />
  2003 D Sacagawea Dollar 2000 Coin Bag<br />
  2003 D Sacagawea Dollar 250 Coin Bag<br />
  2003 P Sacagawea Dollar 2000 Coin Bag<br />
  2003 P Sacagawea Dollar 250 Coin Bag<br />
  2004 D Sacagawea Dollar 2000 Coin Bag<br />
  2004 D Sacagawea Dollar 250 Coin Bag<br />
  2004 P Sacagawea Dollar 2000 Coin Bag<br />
  2004 P Sacagawea Dollar 250 Coin Bag<br />
  2005 D Sacagawea Dollar 2000 Coin Bag<br />
  2005 D Sacagawea Dollar 250 Coin Bag<br />
  2005 P Sacagawea Dollar 2000 Coin Bag<br />
  2005 P Sacagawea Dollar 250 Coin Bag<br />
  2006 D Sacagawea Dollar 2000 Coin Bag<br />
  2006 D Sacagawea Dollar 250 Coin Bag<br />
  2006 P Sacagawea Dollar 2000 Coin Bag<br />
  2006 P Sacagawea Dollar 250 Coin Bag<br />
  2007 D Sacagawea Dollar 2000 Coin Bag<br />
  2007 D Sacagawea Dollar 250 Coin Bag<br />
  2007 P Sacagawea Dollar 2000 Coin Bag<br />
  2007 P Sacagawea Dollar 250 Coin Bag<br />
  2008 D Sacagawea Dollar 2000 Coin Bag<br />
  2008 D Sacagawea Dollar 250 Coin Bag<br />
  2008 P Sacagawea Dollar 2000 Coin Bag<br />
  2008 P Sacagawea Dollar 250 Coin Bag<br />
  2009 D Native American Dollar 2000 Coin Bag<br />
  2009 D Native American Dollar 250 Coin Bag<br />
  2009 P Native American Dollar 2000 Coin Bag<br />
  2009 P Native American Dollar 250 Coin Bag<br />
  2010 D Native American Dollar 2000 Coin Bag<br />
  2010 D Native American Dollar 250 Coin Bag<br />
  2010 P Native American Dollar 2000 Coin Bag<br />
  2010 P Native American Dollar 250 Coin Bag<br />
  2011 D Native American Dollar 2000 Coin Bag<br />
  2011 D Native American Dollar 250 Coin Bag<br />
  2011 P Native American Dollar 2000 Coin Bag<br />
  2011 P Native American Dollar 250 Coin Bag</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p></p>
</div>
</body>
</html>