<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Ten Dollar';
$coinVal = '10';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;
$categoryLink = str_replace(' ', '_', $coinCategory);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Dollar Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
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
<h1><img src="../img/Mixed_Ten.jpg" width="100" height="100" align="middle"> My Ten Dollar Collection</h1>
<?php include("../inc/pageElements/categoryLinks.php"); ?> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $Bullion->getTotalTenByID($coinCategory, $userID); ?> (<?php echo $collection->getUniqueCollectionCountByCategory($userID, $coinCategory) ?> Unique)</td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $Bullion->getTotalGoldCategoryByID($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format($collection->getTotalFaceValSumByCategory($coinCategory, $userID), 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 11 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '11'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory='Ten Dollar'); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory='Ten Dollar'); ?> (<?php echo percent($collection->getByMintCountByCategoryByMint($userID, $coinCategory), $collection->getTotalByMintCountByCategory($coinCategory)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionCategoryById($userID, $coinCategory); ?> of <?php echo $collection->getCompleteCollectionCategoryCount($coinCategory); ?> (<?php echo percent($collection->getCompleteCollectionCategoryById($userID, $coinCategory), $collection->getCompleteCollectionCategoryCount($coinCategory)) ?>%)</td>
  </tr>
  </table>
  <br />
<table width="100%" border="0" id="subCatNav">
  <tr>
    <td width="29%"><img src="../img/chartIcon.jpg" width="32" height="25" align="absmiddle" /><a href="reportGraphCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Detailed Progress View</strong></a></td>
    <td width="17%"><img src="../img/printIcon.jpg" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td width="24%"><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /><a href="reportSpendingCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>&year=<?php echo $year; ?>" class="brownLink"><strong> Financial Report</strong></a></td>
    <td width="30%"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
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
        <option value="Two_Cent.php">Two Cent</option>
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
        <option value="Twenty_Cent.php">Twenty Cents </option>
        <option value="viewListReport.php?coinType=Twenty_Cent_Piece">Twenty Cent</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="Quarter.php">Quarter</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
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
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
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
    </select></td>
  </tr>
</table>
<br />
<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Ten Dollar Type Collection <?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 8 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '8'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Liberty_Cap_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Cap_Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Eagle">Capped Liberty</a> </td>

<td><a href="viewListReport.php?coinType=Coronet_Head_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Coronet_Head_Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Coronet_Head_Eagle">Coronet Head</a> </td>
  
<td><a href="viewListReport.php?coinType=Indian_Head_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Indian_Head_Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Indian_Head_Eagle">Indian Head</a> </td>
  
<td><a href="viewListReport.php?coinType=Quarter_Ounce_Gold"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Quarter_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Quarter_Ounce_Gold">Gold Eagle</a> </td>  
  
<td><a href="viewListReport.php?coinType=Quarter_Ounce_Buffalo"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Quarter_Ounce_Buffalo', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Quarter_Ounce_Buffalo">American Buffalo</a> </td>
  

  
<td><a href="viewListReport.php?coinType=Tenth_Ounce_Platinum"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Tenth_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Tenth_Ounce_Platinum">Platinum Eagle</a> </td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><a href="viewListReport.php?coinType=First_Spouse"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('First_Spouse', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=First_Spouse">First Spouse</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<table class="typeTbl">>  
  <tr class="dateHolder" valign="top">
    <td colspan="3"><h3>Ten Dollar Commemoratives</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Ten_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Ten_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCommemorativeReport.php?coinVersion=Olympic_Ten_Dollar">1984 Olympics</a> </td>

<td><a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Ten_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Library_of_Congress_Ten_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Ten_Dollar">2000 Library of<br />
  Congress
  </a> </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Ten_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Ten_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCommemorativeReport.php?coinVersion=First_Flight_Ten_Dollar">2003 First Flight Centennial</a> </td>

  </tr>
 </table>
<br />

<div class="roundedWhite">
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
      <td width="444" class="darker">Types</td>
      <td width="210" align="center" class="darker">Collected Pieces</td>    
      <td width="228" align="center" class="darker"> Investment</td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Liberty_Cap_Eagle" class="brownLink">Capped Liberty </a> (1795-1804)</td>
      <td align="center"><input readonly="readonly" class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Eagle', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Cap_Eagle', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Coronet_Head_Eagle" class="brownLink">Coronet Head </a> (1838-1907)</td>
      <td align="center"><input readonly="readonly" class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Coronet_Head_Eagle', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Coronet_Head_Eagle', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Indian_Head_Eagle" class="brownLink">Indian Head </a> (1907-1933) </td>
      <td align="center"><input readonly="readonly" class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Indian Head Eagle', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Indian_Head_Eagle', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Quarter_Ounce_Gold" class="brownLink">American Gold Eagle</a> (2006-Present)</td>
      <td align="center"><input readonly="readonly" class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Quarter_Ounce_Gold', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Quarter_Ounce_Gold', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=First_Spouse" class="brownLink">First Spouse</a> (2007-Present)</td>
      <td align="center"><input readonly="readonly" class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('First_Spouse', $userID); ?>"></td>
      
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('First_Spouse', $userID)?>" /></td>
    </tr>
    
  <tr>
      <td><a href="viewListReport.php?coinType=Quarter_Ounce_Buffalo" class="brownLink">American Buffalo</a> (2008)</td>
      <td align="center"><input readonly="readonly" class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Quarter_Ounce_Buffalo', $userID); ?>"></td>
      
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Quarter_Ounce_Buffalo', $userID)?>" /></td>
    </tr>  
    
    
    <tr>
      <td><a href="viewListReport.php?coinType=Tenth_Ounce_Platinum" class="brownLink">Platinum Eagle</a> (2006-Present)</td>
      <td align="center"><input readonly="readonly" class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Tenth_Ounce_Platinum', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Tenth_Ounce_Platinum', $userID)?>" /></td>
    </tr>
    
  <tr class="noHighlight">
    <td>Totals</td>
    <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $Bullion->getTotalTenByID($coinCategory, $userID); ?>" /></td>
    <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="$<?php echo $collection->getMasterCoinSumByCoinCategory($coinCategory, $userID); ?>" /></td>
  </tr>
</table><br>
</div>

<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>