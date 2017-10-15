<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinType = 'Platinum American Eagle';
$coinVal = '1';
$collectTotal = $coin->getCoinCatCountByID($accountID, $coinType);
$coinfaceval = $collectTotal * $coinVal;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Platinum American Eagle Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_Platinum American Eagles.jpg" width="100" height="100" align="middle">My Platinum American Eagle Collection (<?php echo $collection->getTotalCollectedCoinsByID($coinType, $accountID); ?>) Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="#coins">Coins</a></td>
    <td width="13%" class="darker"><a href="Platinum American EagleRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="Platinum American EagleFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="Platinum American EagleGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="Platinum American EagleError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="Platinum American EagleBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="Platinum American EagleBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getTotalCollectedCoinsByID($coinType, $accountID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCategory($coinType, $accountID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinType, $accountID) ?> of 11 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinType, $accountID), '11'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $collection->getByMintCountByCategoryByMint($accountID, $coinType); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinType); ?> (<?php echo percent($collection->getByMintCountByCategoryByMint($accountID, $coinType), $collection->getTotalByMintCountByCategory($coinType)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionCategoryById($accountID, $coinType); ?> of <?php echo $collection->getCompleteCollectionCategoryCount($coinType); ?> (<?php echo percent($collection->getCompleteCollectionCategoryById($accountID, $coinType), $collection->getCompleteCollectionCategoryCount($coinType)) ?>%)</td>
  </tr>
  </table>
<div class="roundedWhite">
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Flowing_Hair_Platinum American Eagle" class="brownLink">Flowing Hair</a> (1794-1795)</td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowing Hair Platinum American Eagle', $accountID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowing Hair Platinum American Eagle', $accountID)?>" /></td>
</tr>

  <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Platinum American Eagle" class="brownLink">Draped Bust</a> (1795-1804)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
  <tr>
    <td><a href="viewListReport.php?coinType=Gobrecht_Platinum American Eagle" class="brownLink">Gobrecht</a> (1836-1839)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Gobrecht Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Gobrecht Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Seated_Liberty_Platinum American Eagle" class="brownLink">Seated Liberty</a> (1836-1873)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Seated Liberty Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Seated Liberty Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Trade_Platinum American Eagle" class="brownLink">Trade</a> (1873-1885)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Trade Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Trade Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Morgan_Platinum American Eagle" class="brownLink">Morgan</a> (1878-1904, 1921)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Morgan Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Morgan Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
    <tr>
      <td><a href="viewListReport.php?coinType=Peace_Platinum American Eagle" class="brownLink">Peace</a> (1921-1928, 1934, 1935)</td>
      <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Peace Platinum American Eagle', $accountID); ?>"/ ></td>  
      <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Peace Platinum American Eagle', $accountID)?>" /></td>
    </tr>
      <tr>
    <td><a href="viewListReport.php?coinType=Eisenhower_Platinum American Eagle" class="brownLink">Eisenhower</a> (1971-1978)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Eisenhower Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Eisenhower Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Susan_B_Anthony_Platinum American Eagle" class="brownLink">Susan B Anthony</a> (1979-1981,1999)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Susan B Anthony Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Susan B Anthony Platinum American Eagle', $accountID)?>" /></td>
  </tr>
      <tr>
    <td><a href="viewListReport.php?coinType=Sacagawea_Platinum American Eagle" class="brownLink">Sacagawea</a> (2000-Present)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Sacagawea Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Sacagawea Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Kennedy_Half_Platinum American Eagle" class="brownLink">Presidential</a> (2007-2016)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Presidential Platinum American Eagle', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Presidential Platinum American Eagle', $accountID)?>" /></td>
  </tr>
  
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo getCoinSubCatValByID($accountID, "Platinum American Eagle") ?>" /></td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="printSmallBtn" type="button" value="Print Platinum American Eagle Report"/ >&nbsp; | &nbsp;<input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <select onChange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Quick Menu</option>
<optgroup label="Platinum American Eagles">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Half_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Half_Cent&page=1">Braided Hair</option>
</optgroup>
<optgroup label="Platinum American Eagles">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Large_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Large_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent&page=1">Coronet Liberty Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent&page=1">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="reportCent.php">All Cents</option>
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
<option value="reportHalf.php">All Platinum American Eagles</option>
<option value="viewListReport.php?coinType=Shield_Nickel&page=1">Flowing Hair Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Draped Bust Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Classic Head Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial Series</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Dimes">
<option value="viewListReport.php?coinType=reportHalf.php">All Platinum American Eagles</option>
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
<option value="reportHalf.php">All Platinum American Eagles</option>
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
<optgroup label="Platinum American Eagles">
<option value="reportHalf.php">All Platinum American Eagles</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Platinum American Eagle&page=1">Flowing Hair Half</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Platinum American Eagle&page=1">Draped Bust Half</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Platinum American Eagle&page=1">Liberty Cap Half</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Platinum American Eagle&page=1">Seated Liberty Half</option>
<option value="viewListReport.php?coinType=Barber_Half_Platinum American Eagle&page=1">Barber Half</option>
<option value="viewListReport.php?coinType=Walking_Liberty&page=1">Walking Liberty Half</option>
<option value="viewListReport.php?coinType=Franklin_Half_Platinum American Eagle&page=1">Franklin Half</option>
<option value="viewListReport.php?coinType=Kennedy_Half_Platinum American Eagle&page=1">Kennedy Half</option>
</optgroup>
<optgroup label="Platinum American Eagles">
<option value="reportHalf.php">All Platinum American Eagles</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Platinum American Eagle&page=1">Flowing Hair Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Draped_Bust_Platinum American Eagle&page=1">Draped Bust Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Gobrecht_Platinum American Eagle&page=1">Gobrecht Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Platinum American Eagle&page=1">Seated Liberty Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Trade_Platinum American Eagle&page=1">Trade Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Morgan_Platinum American Eagle&page=1">Morgan Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Peace_Platinum American Eagle&page=1">Peace Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Eisenhower_Platinum American Eagle&page=1">Eisenhower Platinum American Eagle</option>
<option value="viewListReport.php?coinType=Susan_B_Anthony_Platinum American Eagle&page=1">Susan B. Anthony</option>
<option value="viewListReport.php?coinType=Sacagawea_Platinum American Eagle&page=1">Sacagawea/Native American</option>
<option value="viewListReport.php?coinType=Presidential_Platinum American Eagle&page=1">Presidential Platinum American Eagle</option>
</optgroup>
</select> 
  <a href="viewCollectionSubType.php?coinSubCategory=Small_Cent">View Cent Collection </a><br>
<a class="topLink" href="#top">Top</a></p></div>
<hr />
<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Silver/Clad Platinum American Eagle Type Collection <?php echo $collection->getTypeCollectionProgressByCategory($coinType, $accountID) ?> of 11 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinType, $accountID), '11'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Flowing_Hair_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Flowing Hair Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Platinum American Eagle">Flowing Hair</a> </td>

<td><a href="viewListReport.php?coinType=Draped_Bust_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Platinum American Eagle">Draped Bust</a> </td>
  
<td><a href="viewListReport.php?coinType=Gobrecht_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Gobrecht Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Gobrecht_Platinum American Eagle">Gobrecht</a> </td>
  
<td><a href="viewListReport.php?coinType=Seated_Liberty_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Seated Liberty Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Seated_Liberty_Platinum American Eagle">Seated Liberty</a> </td>  
  
<td><a href="viewListReport.php?coinType=Trade_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Trade Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Trade_Platinum American Eagle">Trade</a> </td>
  

  
<td><a href="viewListReport.php?coinType=Morgan_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Morgan Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Morgan_Platinum American Eagle">Morgan</a> </td>
  </tr>
  
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Peace_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Peace Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Peace_Platinum American Eagle">Peace</a> </td>

<td><a href="viewListReport.php?coinType=Eisenhower_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Eisenhower Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Eisenhower_Platinum American Eagle">Eisenhower</a> </td>
  
<td><a href="viewListReport.php?coinType=Susan_B_Anthony_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Susan B Anthony Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Susan_B_Anthony_Platinum American Eagle">Susan B Anthony</a> </td>
  
<td><a href="viewListReport.php?coinType=Sacagawea_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Sacagawea Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Sacagawea_Platinum American Eagle">Sacagawea</a> </td>  
  
<td><a href="viewListReport.php?coinType=Presidential_Platinum American Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Presidential Platinum American Eagle', $accountID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Presidential_Platinum American Eagle">Presidential</a> </td>
    
<td>&nbsp;</td>
  </tr>
 </table>
<hr />
<a name="coins"></a>
<h1>All Platinum American Eagles</h1>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertificationCountById($accountID) ?></td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = 'Platinum American Eagle' AND accountID = '$accountID' ORDER BY coinID ASC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $accountID).'</td>
	<td class="purchaseTotals" align="right">$'.$collection->totalcoinTypeInvestment($coinID, $accountID).'</td>	    
  </tr>
  ';
	  }
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>