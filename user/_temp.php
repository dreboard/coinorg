<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Half Dollar';
$coinVal = '.50';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Half Dollar Collection</title>
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
<h1><img src="../img/Mixed_Half_Dollars.jpg" width="100" height="100" align="middle">My Half Dollar Collection (<?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?>) Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="#coins">Coins</a></td>
    <td width="13%" class="darker"><a href="HalfDollarRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="HalfDollarFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="HalfDollarGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="HalfDollarError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="HalfDollarBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="HalfDollarBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 8 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '8'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory); ?> (<?php echo percent($collection->getByMintCountByCategoryByMint($userID, $coinCategory), $collection->getTotalByMintCountByCategory($coinCategory)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionCategoryById($userID, $coinCategory); ?> of <?php echo $collection->getCompleteCollectionCategoryCount($coinCategory); ?> (<?php echo percent($collection->getCompleteCollectionCategoryById($userID, $coinCategory), $collection->getCompleteCollectionCategoryCount($coinCategory)) ?>%)</td>
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
  <td><a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar" class="brownLink">Flowing Hair</a> (1794-1795)</td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowing Hair Half Dollar', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowing Hair Half Dollar', $userID)?>" /></td>
</tr>

  <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar" class="brownLink">Draped Bust</a> (1796-1807)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Half Dollar', $userID)?>" /></td>
  </tr>
  
  <tr>
    <td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar" class="brownLink">Liberty Cap</a> (1807-1839)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty Cap Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Cap Half Dollar', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Seated_Liberty_Half_Dollar" class="brownLink">Seated Liberty</a> (1839-1891)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Seated Liberty Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Seated Liberty Half Dollar', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Barber_Half_Dollar" class="brownLink">Barber</a> (1892-1916)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Barber Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Barber Half Dollar', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Walking_Liberty" class="brownLink">Walking Liberty</a> (1916-1947)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Walking Liberty', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Walking Liberty', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Franklin_Half_Dollar" class="brownLink">Franklin</a> (1948-1963)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Franklin Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Franklin Half Dollar', $userID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Kennedy_Half_Dollar" class="brownLink">Kennedy</a> (1964-Present)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Kennedy Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Kennedy Half Dollar', $userID)?>" /></td>
  </tr>


 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo getCoinSubCatValByID($userID, "Half Dollar") ?>" /></td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="printSmallBtn" type="button" value="Print Half Dollar Report"/ >&nbsp;
  <select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option selected="selected" value="">Switch Coin</option>
    <optgroup label="Half Cents">
      <option value="Half_Cent.php">Half Cents</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
      <option value="viewListReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
      <option value="viewListReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
      </optgroup>
    <optgroup label="Large Cents">
      <option value="Large_Cent.php">Large Cent</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
      <option value="viewListReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
      <option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
      <option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
      </optgroup>
    <optgroup label="Cents">
      <option value="Small_Cent.php">Small Cents</option>
      <option value="viewListReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
      <option value="viewListReport.php?coinType=Indian_Head">Indian Head Cent</option>
      <option value="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
      <option value="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
      <option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
      <option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
      </optgroup>
    <optgroup label="Two Cents">
      <option value="Two_Cent.php">Two Cent Grades</option>
      <option value="viewListReport.php?coinType=Two_Cent">Two Cent Piece</option>
      </optgroup>
    <optgroup label="Three Cents">
      <option value="Three_Cent.php">Three Cent</option>
      <option value="viewListReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
      <option value="viewListReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
      </optgroup>
    <optgroup label="Half Dimes">
      <option value="Half_Dime.php">Half Dime</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
      <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
      </optgroup>
    </optgroup>
    <optgroup label="Nickels">
      <option value="Nickel.php">Nickel</option>
      <option value="viewListReport.php?coinType=Shield_Nickel">Sheild</option>
      <option value="viewListReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
      <option value="viewListReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
      <option value="viewListReport.php?coinType=Jefferson_Nickel">Jefferson</option>
      <option value="viewListReport.php?coinType=Westward_Journey">Westward Journey</option>
      <option value="viewListReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
      </optgroup>
    <optgroup label="Dimes">
      <option value="Dime.php">Dime</option>
      <option value="viewListReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
      <option value="viewListReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
      <option value="viewListReport.php?coinType=Barber_Dime">Barber Dime</option>
      <option value="viewListReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
      <option value="viewListReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
      </optgroup>
    <optgroup label="Twenty Cents">
      <option value="Twenty_Cent.php">Twenty Cent Grades</option>
      <option value="viewListReport.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
      </optgroup>
    <optgroup label="Quarters">
      <option value="Quarter.php">Quarter</option>
      <option value="viewListReport.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
      <option value="viewListReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
      <option value="viewListReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
      <option value="viewListReport.php?coinType=Barber_Quarter">Barber Quarter</option>
      <option value="viewListReport.php?coinType=Standing_Liberty">Standing Liberty</option>
      <option value="viewListReport.php?coinType=Washington_Quarter">Washington Quarter</option>
      <option value="viewListReport.php?coinType=State Quarter">State Quarter</option>
      <option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
      <option value="viewListReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
      </optgroup>
    <optgroup label="Half Dollars">
      <option value="Half_Dollar.php">Half Dollar</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
      <option value="viewListReport.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
      <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
      <option value="viewListReport.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
      <option value="viewListReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
      <option value="viewListReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
      <option value="viewListReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
      <option value="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
      </optgroup>
    <optgroup label="Dollars">
      <option value="Dollar.php">Dollar</option>
      <option value="viewListReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
      <option value="viewListReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
      <option value="viewListReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
      <option value="viewListReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
      <option value="viewListReport.php?coinType=Trade_Dollar">Trade Dollar</option>
      <option value="viewListReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
      <option value="viewListReport.php?coinType=Peace_Dollar">Peace Dollar</option>
      <option value="viewListReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
      <option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
      <option value="viewListReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
      <option value="viewListReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
      </optgroup>
  </select>
  <br>
<a class="topLink" href="#top">Top</a></p></div>
<hr />
<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Half Dollar Type Collection <?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 8 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '8'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Flowing Hair Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair</a> </td>

<td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust</a> </td>
  
<td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty Cap Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap</a> </td>
  
<td><a href="viewListReport.php?coinType=Seated_Liberty_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Seated Liberty Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty</a> </td>  
  
<td><a href="viewListReport.php?coinType=Barber_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Barber Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Barber_Half_Dollar">Barber</a> </td>
  

  
<td><a href="viewListReport.php?coinType=Walking_Liberty"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Walking Liberty', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Walking_Liberty">Walking Liberty </a> </td>
  </tr>
  <tr class="dateHolder" valign="top"> 
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  
<td><a href="viewListReport.php?coinType=Franklin_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Franklin Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Lincoln_Whe">Franklin</a> </td>
  
<td> <a href="viewListReport.php?coinType=Kennedy_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Kennedy Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy</a> </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
 </table>
<hr />
<a name="coins"></a>
<h1>All Half Dollars</h1>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertificationCountById($userID) ?></td>
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
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinCategory = 'Half Dollar' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
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
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
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