<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Key/Semi Key Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );


});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:130%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle" id="setTypes"> My Key/Semi Key Report</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="25%" class="darker"><a href="viewKeyReport.php">Key Report</a></td>
    <td width="25%" class="darker"><a href="viewKeyCoins.php">Key Coins</a></td>
    <td width="25%" class="darker"> <a href="viewKeyGrades.php">Grade Report</a></td>  
    <td width="25%" class="darker"><a href="viewKeyCheck.php">Checklist</a></td>   
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="28%"><strong>Total Collected </strong></td>
    <td width="72%"><?php echo $collection->getKeyCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td width="28%"><strong>Total Unique </strong></td>
    <td width="72%"><?php echo $collection->getKeyCollectionById($userID)	; ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getKeySumByAccount($userID); ?></td>
  </tr>
  </table>
  <hr />
  <table border="0" id="folderTbl" class="typeTbl">

<tr align="center"><td colspan="6"><h3>U.S. Coin Key/Semi Key Date Collection</h3><br />
</td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewCoin.php?coinID=1181"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('1181', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=1181">1793 P Liberty Cap Half Cent</a> </td>

<td><a href="viewCoin.php?coinID=1188"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('1188', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=1188">1796 P Liberty Cap Half Cent</a> </td>
  
<td><a href="viewCoin.php?coinID=1163"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('1163', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=1163">1802 P Draped Bust Half Cent</a> </td>  
  
<td><a href="viewCoin.php?coinID=1196"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('1196', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=1196">1793 P <br />
Ameri in Legend<br />
Flowing Hair Large Cent</a> </td>
  
<td><a href="viewCoin.php?coinID=1229"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('1229', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=1229">1799 P Draped Bust Large Cent</a></td>
  
<td><a href="viewCoin.php?coinID=1246"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('1246', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=1246">1804 P Draped Bust Large Cent</a> </td> 

  </tr>
  
  <tr class="dateHolder" valign="top">
    <td><a href="viewCoin.php?coinID=3591"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3591', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3591">1856 P
      Flying Eagle Cent</a></td>
    <td><a href="viewCoin.php?coinID=3625"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3625', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3625">1877 Indian Head Cent</a></td>
      
    <td><a href="viewCoin.php?coinID=3661"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3661', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3661">1908 S Indian Head Cent</a></td>
    <td><a href="viewCoin.php?coinID=3663"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3663', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3665">1909 S Indian Head Cent</a></td>
    <td><a href="viewCoin.php?coinID=3665"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3665', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Classic_Head_Half_Cent">1909 S Lincoln Wheat Cent</a></td>
    <td><a href="viewCoin.php?coinID=3667"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3667', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3667">1909 S VDB Lincoln Wheat Cent</a></td>
  </tr>
  
  <tr class="dateHolder" valign="top">
    <td><a href="viewCoin.php?coinID=3681"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3681', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3681">1914 D Lincoln Wheat Cent</a></td>
      
    <td><a href="viewCoin.php?coinID=3687"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3687', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3687">1922 D No D Lincoln Wheat Cent</a></td>
      
    <td><a href="viewCoin.php?coinID=3727"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('3727', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=3727">1931 S Lincoln Wheat Cent</a></td>
      
    <td><a href="viewCoin.php?coinID=2281"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('2281', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=2281">1864 P Small Motto Two Cent</a></td>
      
    <td><a href="viewCoin.php?coinID=2291"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('2291', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=2291">1872 P<br />
Two Cent</a></td>
      
    <td><a href="viewCoin.php?coinID=2292"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('2292', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=2292">1873 P <br />
      Two Cent</a></td>
  </tr>
  
  <tr class="dateHolder" valign="top">
    <td><a href="viewCoin.php?coinID=2299"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('2299', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=2299">1855 P Three Cent Silver</a></td>
    
    <td><a href="viewCoin.php?coinID=2332"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('2332', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=2332">1877 P Three Cent Silver</a></td>
    
    <td><a href="viewCoin.php?coinID=2333"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('2333', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=2333">1878 P Three Cent Silver</a><a href="viewCoin.php?coinID=1181"></a></td>
    
    <td><a href="viewCoin.php?coinID=15"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('15', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=15">1877 P Shield Nickel</a></td>
    
    <td><a href="viewCoin.php?coinID=16"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('16', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=16">1878 P Shield Nickel</a></td>
    
    <td><a href="viewCoin.php?coinID=107"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('107', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=107">1885 P Liberty Head Nickel</a></td>
  </tr>
  
  <tr class="dateHolder" valign="top">
    <td><a href="viewCoin.php?coinID=108"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('108', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=108">1886 P Liberty Head Nickel</a></td>
      
    <td><a href="viewCoin.php?coinID=136"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('136', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=136">1912 S Liberty Head Nickel</a></td>
      
    <td><a href="viewCoin.php?coinID=6511"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('6511', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=6511">1913 S Type II Buffalo Nickel</a></td>
      
    <td><a href="viewCoin.php?coinID=181"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('181', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=181">1950 D Jefferson Nickel</a></td>
      
    <td><a href="viewCoin.php?coinID=645"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('645', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=645">1895 O Barber Dime</a></td>
      
    <td><a href="viewCoin.php?coinID=514"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('514', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=514">1916 D Winged Liberty Dime</a></td>
  </tr>
  
  <tr class="dateHolder" valign="top">
    <td><a href="viewCoin.php?coinID=856"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('856', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=856">1949 S Roosevelt Dime</a></td>
      
    <td><a href="viewCoin.php?coinID=1372"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('1372', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=1372">1796 P Draped Bust Quarter</a></td>
      
    <td><a href="viewCoin.php?coinID=1181"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('Classent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=1181">190ent</a></td>
      
    <td><a href="viewCoin.php?coinID=1181"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('Classent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=1181">190ent</a></td>
      
    <td><a href="viewCoin.php?coinID=1181"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('Classent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=16">190ent</a></td>
      
    <td><a href="viewCoin.php?coinID=1181"><img class="coinSwitch" src="../img/<?php echo $collection->getKeyImg('Classent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoin.php?coinID=1181">190ent</a></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
<div class="roundedWhite">
  <table width="100%" id="masterCountTbl" border="1">
    <tr>
    <td width="206" class="darker">Types</td>
    <td width="306" align="center" class="darker">Collected </td>    
    <td width="452" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="Half_Cent.php" class="brownLink">Half Cents</a></td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Cent', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" id="halfVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Cent', $userID); ?>" /></td>
</tr>
  <tr>
    <td><a href="Large_Cent.php" class="brownLink">Large Cents</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Large Cent', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Large Cent', $userID); ?>" /></td>
  </tr>
  

 <tr>
    <td><a href="Small_Cent.php" class="brownLink">Small Cents</a>
    <td align="center" id="Lincoln_WheatCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Small Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" id="smallVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Small Cent', $userID); ?>" /></td>
 </tr>
 
 
 <tr>
 <td><a href="Half_Dime.php" class="brownLink">Half Dimes</a></td>
    <td align="center" id="Lincoln_MemorialCount"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="Nickel.php" class="brownLink">Nickels</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Nickel', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Nickel', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Dime.php" class="brownLink">Dimes</a></td>
    <td align="center" id="Union_ShieldCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="Twenty_Cent.php" class="brownLink">Twenty Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Twenty Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Twenty Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Two_Cent.php" class="brownLink">Two Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Two Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Two Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Three_Cent.php" class="brownLink">Three Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Three Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Three Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Quarter.php" class="brownLink">Quarters</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Quarter', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Quarter', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Half_Dollar.php" class="brownLink">Half Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Dollar', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Dollar.php" class="brownLink">Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Dollar', $userID); ?>" /></td>
 </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $collection->getCoinSumByAccount($userID); ?>" /></td>
 </tr>
</table>
<p><br>
<a class="topLink" href="#top">Top</a></p></div>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>