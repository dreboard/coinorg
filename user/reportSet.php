<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$value = 'Nickel';

//TYPE VARIABLES
$getVarietyCountCollectedVar = getVarietyCountCollected($value);
$getVarietyCountVar = getVarietyCount($value);


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
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Nickel Report</title>
<script type="text/javascript">
$(document).ready(function(){
$("#viewGraphBtn").click(function() {
   window.location = 'reportNickelGraph.php';
});


});
</script>  


<style type="text/css">

</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">

<table>
<tr>
    <td><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > </td>
    <td valign="top"><input id="printBtn"class="viewListBtns" name="" type="button" value="Print Report" /></td>
    <td valign="top"><input id="viewGraphBtn"class="viewListBtns" name="" type="button" value="Graph View" /></td>
    <td><input class="viewListBtns" id="mailBtn" type="button" value="Email Report"/ > </td>
  </tr>
  </table>

<?php include("../inc/pageElements/reportLinks.php"); ?>
  <div class="spacer"></div>
<table width="858" class="reportListTbl" border="0">
  <tr>
    <td width="333" rowspan="4" valign="top"><img src="../img/Nickels.jpg" name="reportImg" id="reportImg"></td>
    <td width="333">Total Collected Nickels</td>
    <td width="178">147</td>
  </tr>
  <tr>
    <td>Total Nickel Investment</td>
    <td>$353.00</td>
  </tr>
  <tr>
    <td>Type Collection Progress</td>
    <td><?php echo getVarietyCountCollected($value) ?> of <?php echo getVarietyCount($value) ?> (<?php echo percent($getVarietyCountCollectedVar, $getVarietyCountVar); ?>%)</td>
  </tr>
  <tr>
    <td>Mint Collection Progress</td>
    <td><?php echo $getMintCollectedTypeVar; ?> of <?php echo $getMintCountTypeVar; ?> (<?php echo $mintPercent; ?>%)</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td>Complete Collection Progress</td>
    <td><?php echo $getCompleteCollectedVar; ?> of <?php echo $getCompleteAllVar ?> (<?php echo $completePercent; ?>%)</td>
  </tr>
  
</table>

<table width="860" id="reportListLinks">
  <tr>
    <td class="darker">Types</td>
    <td class="darker"><a href="#silver">Coins</a></td>
    <td class="darker"> <a href="#gold">Rolls</a></td>  
    <td class="darker"> <a href="#gold">Bags</a></td>   
  </tr>
</table>  

 <table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Type Collection <?php echo getVarietyCountCollected($value) ?> of <?php echo getVarietyCount($value) ?> (<?php echo percent($getVarietyCountCollectedVar, $getVarietyCountVar); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td><a href="viewListReport.php?coinType=Shield Nickel&page=1">
  <img class="coinSwitch" src="../img/<?php echo getImage('Shield Nickel'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Shield Nickel&page=1">Shield Nickel</a> 
</td>
  <td><a href="viewListReport.php?coinType=Liberty_Head_Nickel&page=1">  <img class="coinSwitch" src="../img/<?php echo getImage('Liberty Head Nickel'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Head_Nickel&page=1">Liberty Head Nickel</a> </td>
  
<td><a href="viewListReport.php?coinType=Indian_Head_Nickel&page=1"><img class="coinSwitch" src="../img/<?php echo getImage('Indian Head Nickel'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Indian_Head_Nickel&page=1">Indian Head</a> </td>
  
<td> <a href="viewListReport.php?coinType=Jefferson_Nickel&page=1"><img class="coinSwitch" src="../img/<?php echo getImage('Jefferson Nickel'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Jefferson_Nickel&page=1">Jefferson Nickel</a> </td>
  
<td><a href="viewListReport.php?coinType=Westward_Journey&page=1"><img class="coinSwitch" src="../img/<?php echo getImage('Westward Journey'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Westward_Journey&page=1">Westward Journey</a> </td>
  
<td><a href="viewListReport.php?coinType=Return_to_Monticello&page=1"><img class="coinSwitch" src="../img/<?php echo getImage('Return to Monticello'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Return_to_Monticello&page=1">Return to Monticello</a> </td>
  </tr>
</table>
 
  <div class="spacer"></div>

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

<p>1979 Mint<br>
  1979 Proof Type I<br>
  1979 Proof Type II<br>
  1979 Susan B Anthony PDS Uncirculated Set<br>
  1980 Mint<br>
  1980 Proof<br>
  1980 Susan B Anthony PDS Uncirculated Set<br>
  1981 Mint<br>
  1981 Proof Type I<br>
  1981 Proof Type II<br>
  1981 Susan B Anthony PDS Uncirculated Set<br>
  1982 Mint D  Uncirculated Souvenir Coin Set<br>
  1982 Mint P  Uncirculated Souvenir Coin Set<br>
  1982 Proof<br>
  1983 Mint D  Uncirculated Souvenir Coin Set<br>
  1983 Mint P  Uncirculated Souvenir Coin Set<br>
  1983 Olympic 3 Silver Dollar Uncirculated Set<br>
  1983 Prestige Proof Set<br>
  1983 Proof<br>
  1983 Proof No mint mark dime<br>
  1983 Proof Prestige<br>
  1984 Mint<br>
  1984 Olympics 3 Coin Uncirculated Set <br>
  1984 Prestige Proof Set<br>
  1984 Proof<br>
  1984 Proof Prestige<br>
  1985 Mint<br>
  1985 Prestige Proof Set<br>
  1985 Proof<br>
  1986 Mint<br>
  1986 Prestige Proof Set<br>
  1986 Proof<br>
  1986 Proof Prestige<br>
  1986 Statue of Liberty Half and Silver Dollar Proof Set<br>
  1986 Statue of Liberty Half and Silver Dollar Uncirculated Set<br>
  1987 Mint<br>
  1987 P 2 Coin Proof Gold American Eagle Set<br>
  1987 Prestige Proof Set<br>
  1987 Proof<br>
  1987 Proof Prestige<br>
  1988 4 Coin Gold American Eagle Proof Set<br>
  1988 Mint<br>
  1988 Prestige Proof Set<br>
  1988 Proof<br>
  1988 Proof Prestige<br>
  1989 Congressional Bicentennial Half &amp; Dollar Proof Set<br>
  1989 Congressional Bicentennial Half &amp; Dollar Uncirculated Set<br>
  1989 Mint<br>
  1989 Prestige Proof Set<br>
  1989 Proof<br>
  1989 Proof Prestige<br>
  1990 4 Coin Gold American Eagle Proof Set<br>
  1990 Mint<br>
  1990 Prestige Proof Set<br>
  1990 Proof<br>
  1990 Proof No S Cent<br>
  1990 Proof Prestige<br>
  1990 Proof Prestige No S Cent</p>
<p>1991 - 1995 World War II 50th Anniversary Commemorative Two Coin Uncirculated Set<br>
</p>
<p>1991 4 Coin Gold American Eagle Proof Set<br>
  1991 Mint<br>
  1991 Mount Rushmore Two Piece Commemorative Coin Proof Set<br>
  1991 Mount Rushmore Two Piece Commemorative Coin Uncirculated Set<br>
  1991 Prestige Proof Set<br>
  1991 Proof<br>
  1991 Proof Prestige<br>
  1992 4 Coin Gold American Eagle Proof Set<br>
  1992 Columbus Quincentenary 3 Coin Proof Set<br>
  1992 Columbus Quincentenary Half &amp; Dollar Proof Set<br>
  1992 Columbus Quincentenary Half &amp; Dollar Uncirculated Set<br>
  1992 Mint<br>
  1992 Olympic Half &amp; Dollar Two Coin Proof Set<br>
  1992 Olympic Half &amp; Dollar Two Coin Uncirculated Set<br>
  1992 Prestige Proof Set<br>
  1992 Proof<br>
  1992 Proof Prestige<br>
  1992 Proof Silver<br>
  1992 Proof Silver Premier<br>
  1993 4 Coin Gold American Eagle Proof Set<br>
  1993 Bill of Rights Half and Silver Dollar Proof Commemorative set<br>
  1993 Bill of Rights Half and Silver Dollar Uncirculated Commemorative set<br>
  1993 Jefferson Coin And Currency Set<br>
  1993 Mint<br>
  1993 P 5 Coin Philadelphia Proof Set<br>
  1993 Prestige Proof Set<br>
  1993 Proof<br>
  1993 Proof Prestige<br>
  1993 Proof Silver<br>
  1993 Proof Silver Premier<br>
  1993 World War II Half &amp; Dollar Proof Set<br>
  1993 World War II Half &amp; Dollar Uncirculated Set<br>
  1994 4 Coin Gold American Eagle Proof Set<br>
  1994 Mint<br>
  1994 Prestige Proof Set<br>
  1994 Proof<br>
  1994 Proof Prestige<br>
  1994 Proof Silver<br>
  1994 Proof Silver Premier<br>
  1994 U.S. Veterans 3 Silver Dollar Proof Set<br>
  1994 U.S. Veterans 3 Silver Dollar Uncirculated Set<br>
  1994 World Cup Half and Silver Dollar Proof Set<br>
  1994 World Cup Half and Silver Dollar Uncirculated Set<br>
  1995 Civil War Battlefield Half and Silver Dollar Proof Set<br>
  1995 Civil War Battlefield Half and Silver Dollar Uncirculated Set<br>
  1995 Mint<br>
  1995 Olympic Track and Field and Cycling 2 Coin Proof Set<br>
  1995 Prestige Proof Set<br>
  1995 Proof<br>
  1995 Proof Prestige<br>
  1995 Proof Silver<br>
  1995 Proof Silver Premier<br>
  1995 W 5 Coin Proof American Eagle Proof Set<br>
  1996 4 Coin Gold American Eagle Proof Set<br>
  1996 Mint Westpoint Roosevelt Dime<br>
  1996 Prestige Proof Set<br>
  1996 Proof<br>
  1996 Proof Silver<br>
  1996 Proof Silver Premier<br>
  1997 3 Coin Proof Impressions of Liberty Proof Set Signed<br>
  1997 4 Coin Gold American Eagle Proof Set<br>
  1997 Botanic Garden Uncirculated Set<br>
  1997 Mint<br>
  1997 Prestige Proof Set<br>
  1997 Proof<br>
  1997 Proof Silver<br>
  1997 Proof Silver Premier<br>
  1997 W American Eagle Platinum 4 coin Proof Set<br>
  1998 2PC SET BU RFK SILVER DOLLAR &amp;MATTE PROOF JFK HALF<br>
  1998 4 Coin Gold American Eagle Proof Set<br>
  1998 Black Patriots Commemorative Proof Set<br>
  1998 Mint<br>
  1998 Proof<br>
  1998 Proof Silver<br>
  1998 Proof Silver Premier<br>
  1998 Robert F Kennedy Proof and Uncirculated Commemorative Coin Set<br>
  1998 W American Eagle Platinum 4 coin Proof Set<br>
  1999 4 Coin Gold American Eagle Proof Set<br>
  1999 Dolly Madison 2 Coin Proof and Uncirculated Set<br>
  1999 George Washington Uncirculated and Proof Set<br>
  1999 Mint<br>
  1999 Proof<br>
  1999 Proof Silver<br>
  1999 State Quarter Proof Set<br>
  1999 W American Eagle Platinum 4 coin Proof Set<br>
  1999 Yellowstone Proof and Uncirculated Dollar Set<br>
  2000 4 Coin Gold American Eagle Proof Set<br>
  2000 Leif Ericson Silver Dollar and Iceland Kronur Silver Proof Set<br>
  2000 Millennium Coin And Currency Uncirculated Set<br>
  2000 Mint<br>
  2000 Proof<br>
  2000 Proof Silver<br>
  2000 State Quarter Proof Set<br>
  2000 W American Eagle Platinum 4 coin Proof Set<br>
  2001 4 Coin Gold American Eagle Proof Set<br>
  2001 American Buffalo Silver Dollar Proof and Uncirculated Set<br>
  2001 Buffalo Coin and Currency Uncirculated Set<br>
  2001 Mint<br>
  2001 Proof<br>
  2001 Proof Silver<br>
  2001 State Quarter Proof Set<br>
  2001 W American Eagle Platinum 4 coin Proof Set<br>
  2002 4 Coin Gold American Eagle Proof Set<br>
  2002 Mint<br>
  2002 Proof<br>
  2002 Proof Silver<br>
  2002 State Quarter Proof Set<br>
  2002 W American Eagle Platinum 4 coin Proof Set<br>
  2003 4 Coin Gold American Eagle Proof Set<br>
  2003 Mint<br>
  2003 Proof<br>
  2003 Proof<br>
  2003 Proof Silver<br>
  2003 State Quarter Proof Set<br>
  2003 W American Eagle Platinum 4 coin Proof Set<br>
  2004 4 Coin Gold American Eagle Proof Set<br>
  2004 Lewis and Clark Coin and Currency Set<br>
  2004 Lewis and Clark Coin and Pouch Set<br>
  2004 Mint<br>
  2004 Proof<br>
  2004 Proof Silver<br>
  2004 State Quarter Proof Set<br>
  2004 Thomas Edison Set<br>
  2004 W American Eagle Platinum 4 coin Proof Set<br>
  2004 Westward Journey Nickel Series 6 Coin Set<br>
  2005 4 Coin Gold American Eagle Proof Set<br>
  2005 Mint<br>
  2005 Proof<br>
  2005 Proof Silver<br>
  2005 State Quarter Proof Set<br>
  2005 W American Eagle Platinum 4 coin Proof Set<br>
  2005 Westward Journey Bison &amp; Ocean Proof Set<br>
  2005 Westward Journey Coin and Medal Set <br>
  2005 Westward Journey Nickel Series 6 Coin Set<br>
  2006 4 Coin Gold American Eagle Proof Set<br>
  2006 American Eagle 20th Anniversary Gold &amp; Silver Set<br>
  2006 American Eagle 20th Anniversary Gold Coin Set<br>
  2006 American Eagle 20th Anniversary Silver Coin Set<br>
  2006 Franklin Coin &amp; Chronicles<br>
  2006 Legacy Proof <br>
  2006 Mint<br>
  2006 Proof<br>
  2006 Proof Silver<br>
  2006 Return to Monticello Uncirculated and Proof Set<br>
  2006 State Quarter Proof Set<br>
  2006 W 3 Coin Gold American Eagle Set<br>
  2006 W American Eagle Platinum 4 coin Proof Set<br>
  2006 Westward Journey Nickel Series 3 Coin Set<br>
  2007 10th Anniversary Platinum Eagle Set<br>
  2007 Legacy Proof Set <br>
  2007 Mint<br>
  2007 Presidential Dollar Proof Set<br>
  2007 Presidential Dollar Uncirculated Set<br>
  2007 Proof<br>
  2007 Proof Silver<br>
  2007 State Quarter Proof Set<br>
  2008 4 Coin Gold American Eagle Proof Set<br>
  2008 Bald Eagle Silver Dollar and Medal Set<br>
  2008 Legacy Proof Set<br>
  2008 Mint <br>
  2008 Presidential Dollar Coin Collection Annual Pack<br>
  2008 Presidential Dollar Proof Set<br>
  2008 Presidential Dollar Uncirculated Set<br>
  2008 Proof<br>
  2008 Proof Silver<br>
  2008 State Quarter Proof Set<br>
  2008 W American Eagle Platinum 4 coin Proof Set<br>
  2009 4 Coin Gold American Eagle Proof Set<br>
  2009 District of Columbia &amp; U.S. Territories Quarters Proof Set<br>
  2009 District of Columbia &amp; U.S. Territories Quarters Silver Proof Set<br>
  2009 Lincoln Bicentennial One Cent Proof Set<br>
  2009 Lincoln Coin and Chronicles Set<br>
  2009 Mint<br>
  2009 P Lincoln Silver Dollar<br>
  2009 P Lincoln Silver Dollar Proof<br>
  2009 Presidential Dollar Coin Collection Annual Pack<br>
  2009 Presidential Dollar Proof Set<br>
  2009 Presidential Dollar Uncirculated Set<br>
  2009 Proof<br>
  2009 Proof Silver<br>
  2009 US Mint Lincoln Coin &amp; Chronicles Proof Set<br>
  200S Legacy Proof Set<br>
  2010 4 Coin Gold American Eagle Proof Set<br>
  2010 Mint<br>
  2010 Presidential Dollar Coin Collection Annual Pack<br>
  2010 Presidential Dollar Proof Set<br>
  2010 Presidential Dollar Uncirculated Set<br>
  2010 Proof <br>
  2010 Proof Silver<br>
  2010 United States Mint America the Beautiful Quarters Proof Set<br>
  2010 US Mint America the Beautiful Silver Quarters Proof Set <br>
  2011 America the Beautiful Quarters Uncirculated Set<br>
  2011 American Eagle Gold Proof Four Coin Set<br>
  2011 Glacier National Park Quarters Three Coin Set<br>
  2011 Mint<br>
  2011 Presidential Dollar Proof Set<br>
  2011 Presidential Dollar Uncirculated Set<br>
  2011 Proof <br>
  2011 Proof Silver<br>
  2011 Silver Eagle 25th Anniversary Proof and Uncirculated Set<br>
  2011 United States Mint America the Beautiful Quarters Proof Set<br>
  2011 US Mint America the Beautiful Silver Quarters Proof Set <br>
  2012 America the Beautiful Quarters Proof Set<br>
  2012 America the Beautiful Quarters Silver Proof Set<br>
  2012 Star-Spangled Banner Two-Coin Proof Set</p>
<p>Proof set coins from 1968 to the present contain "S" mint marked coins.  These were produced at the San Francisco United States government Mint.  Proof coin sets minted in 1964 and earlier have no mint mark and were produced at the Philadelphia United States government Mint.</p>
</div>

</body>
</html>