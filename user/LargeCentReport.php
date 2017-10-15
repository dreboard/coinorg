<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Large Cent';
$smallCentRollCount = '50';
$smallCentRollVal = '.50';
$coinVal = '.01';
$categoryLink = str_replace(' ', '_', $coinCategory);
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;

$early = array('Flowing Hair Large Cent', 'Liberty Cap Large Cent', 'Draped Bust Large Cent','Classic Head Large Cent');

$middle = array('Coronet Liberty Head Large Cent');

$late = array('Braided Hair Liberty Head Large Cent');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $coinCategory ?> Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('.coinTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
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
<h1><img src="../img/Large_Cent.jpg" width="100" height="100" align="middle"> My <?php echo $coinCategory ?> Collection</h1>
<?php include("../inc/pageElements/categoryLinks.php"); ?> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?> (<?php echo $collection->getUniqueCollectionCountByCategory($userID, $coinCategory) ?> Unique)</td>
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
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 6 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '6'); ?>%)</td>
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
        <option value="Twenty_Cent.php">Twenty Cent Grades</option>
        <option value="viewListReport.php?coinType=Twenty_Cent_Piece">Twenty Cents</option>
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
<hr />
<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Large Cent Type Collection <?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 6 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '6'); ?>%)</h3></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td><a href="viewListReport.php?coinType=Flowing_Hair_Large_Cent"> <img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Flowing Hair Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</a></td>
    <td><a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent"> <img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty Cap Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</a></td>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</a></td>
    <td><a href="viewListReport.php?coinType=Classic_Head_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Classic Head Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Classic_Head_Large_Cent">Classic Head</a></td>
    <td><a href="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Coronet Liberty Head Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head </a></td>
    <td><a href="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Braided Hair Liberty Head Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</a></td>
  </tr>
 </table>
 <br />






<table width="100%" border="0">
  <tr align="center">
    <td><a href="LargeCentReport.php?type=early">Early Date (1793-1814) Report</a></td>
    <td><a href="LargeCentReport.php?type=middle">Middle Date (1816-39) Report</a></td>
    <td><a href="LargeCentReport.php?type=late">Late Date (1839-57) Report</a></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td><form method="get" action="LargeCentSheldon.php" class="compactForm">
      By Year Sheldon List 
          <select name="coinYear" id="coinYear">
        <?php // Generate minimum years
        foreach (range('1793', '1814') as $year) { ?>
        <option value="<?php echo($year); ?>"><?php echo($year); ?></option>
        <?php } ?>
        </select><input name="" type="submit" value="Go" />
        </form></td>
    <td>&nbsp;</td>
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
 <?php if ($_GET['type'] == 'early'){ ?> 
    <tr>
      <td><a href="viewListReport.php?coinType=Flowing_Hair_Large_Cent" class="brownLink">Flowing Hair</a> (1793)</td>
      <td align="center" id="Flowing_Hair_Large_CentCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowing Hair Large Cent', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowing Hair Large Cent', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent" class="brownLink">Liberty Cap</a> (1793-1796)</td>
      <td align="center" id="Liberty_Cap_Large_CentCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty Cap Large Cent', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Cap Large Cent', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Draped_Bust_Large_Cent" class="brownLink">Draped Bust</a> (1796-1807) </td>
      <td align="center" id="Draped_Bust_Large_CentCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Large Cent', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Large Cent', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Classic_Head_Large_Cent" class="brownLink">Classic Head</a> (1808-1814)</td>
      <td align="center" id="Classic_Head_Large_CentCount"><input readonly="readonly" class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Classic Head Large Cent', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Classic Head Large Cent', $userID)?>" /></td>
    </tr>
<?php } else { echo '';}  ?> 
 <?php if ($_GET['type'] == 'middle'){ ?>    
    <tr>
      <td><a href="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent" class="brownLink">Coronet Liberty Head</a> (1816-1839)</td>
      <td align="center" id="WestwardJourneyCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Coronet Liberty Head Large Cent', $userID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Coronet Liberty Head Large Cent', $userID)?>" /></td>
    </tr>
    <?php } else { echo '';}  ?> 
     <?php if ($_GET['type'] == 'late'){ ?> 
    <tr>
      <td><a href="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent" class="brownLink">Braided Hair Liberty Head</a> (1839-1857)</td>
      <td align="center" id="Braided_Hair_Liberty_Head_Large_CentCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Braided Hair Liberty Head Large Cent', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Braided Hair Liberty Head Large Cent', $userID)?>" /></td>
    </tr>
<?php } else { echo '';}  ?>   

 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $collection->getMasterCoinSumByCoinCategory($coinCategory, $userID); ?>" /></td>
 </tr>
</table>
<br />
</div>


<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>