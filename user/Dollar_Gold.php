<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Gold Dollar';
$coinVal = '1';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;

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
<h1><img src="../img/Gold_Mixed.jpg" width="100" height="100" align="middle">My Gold Dollar Collection (<?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?>) Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="#coins">Coins</a></td>
    <td width="13%" class="darker"><a href="DollarRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="DollarFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="DollarGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="DollarError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="DollarBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="DollarBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $Bullion->getTotalCollectedCoinsByID($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $Bullion->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $Bullion->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 2 (<?php echo percent($Bullion->getTypeCollectionProgressByCategory($coinCategory, $userID), '2'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory), $Bullion->getTotalByMintCountByCategory($coinCategory)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $Bullion->getCompleteCollectionCategoryById($userID, $coinCategory); ?> of <?php echo $Bullion->getCompleteCollectionCategoryCount($coinCategory); ?> (<?php echo percent($Bullion->getCompleteCollectionCategoryById($userID, $coinCategory), $Bullion->getCompleteCollectionCategoryCount($coinCategory)) ?>%)</td>
  </tr>
  </table>
<div class="roundedWhite">
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
      <td colspan="3" class="darker">View <a href="Dollar.php" class="brownLink"><strong>Circulated</strong></a> | <a href="Dollar_Gold.php" class="brownLink"><strong>Bullion</strong></a> | <a href="Commemorative_Dollar.php" class="brownLink"><strong>Commemorative</strong></a> | <a href="Silver_Dollar.php" class="brownLink"><strong>Silver Eagle</strong></a></td>
      </tr>
    <tr>
    <td width="444" class="darker">Bullion Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Liberty_Head_Gold_Dollar" class="brownLink">Liberty Head</a> (1849-1854)</td>
  <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Head_Gold_Dollar', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty_Head_Gold_Dollar', $userID)?>" /></td>
</tr>

  <tr>
    <td><a href="viewListReport.php?coinType=Indian_Princess_Gold_Dollar" class="brownLink">Indian Head</a> (1854-1889)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Indian_Princess_Gold_Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Indian_Princess_Gold_Dollar', $userID)?>" /></td>
  </tr>
  
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $Bullion->getTotalCollectedCoinsByID($coinCategory, $userID); ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="$<?php echo $Bullion->getTotalInvestmentSumByCategory($coinCategory, $userID); ?>" /></td>
 </tr>
</table>
<br />
<table width="881" border="0">
  <tr>
    <td><img src="../img/chartIcon.jpg" width="32" height="25" align="absmiddle" /><a href="reportGraphCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Graph View</strong></a></td>
    <td><img src="../img/printIcon.jpg" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /><a href="reportSpendingCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>&year=<?php echo date('Y'); ?>" class="brownLink"><strong> Financial Report</strong></a></td>
    <td><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Dollars">
        <option value="Dollar_Gold.php">Dollar</option>
        <option value="viewListReport.php?coinType=Liberty_Head_Gold_Dollar">Liberty Head</option>
        <option value="viewListReport.php?coinType=Indian_Princess_Gold_Dollar">Indian Princess</option>
        </optgroup>
      <optgroup label="Quarter Eagles">
        <option value="Quarter_Eagle.php">Quarter Eagle</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Quarter_Eagle">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Turban_Head_Quarter_Eagle">Turban Head</option>
        <option value="viewListReport.php?coinType=Liberty_Head_Quarter_Eagle">Liberty Head</option>
        <option value="viewListReport.php?coinType=Coronet_Head_Quarter_Eagle">Coronet Head</option>
        <option value="viewListReport.php?coinType=Indian_Head_Quarter_Eagle">Indian Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="Three_Dollar.php">Three Dollar</option>
        <option value="viewListReport.php?coinType=Indian_Princess_Three_Dollar">Flying Eagle Cent</option>
        </optgroup>
      <optgroup label="Four Dollar">
        <option value="Four_Dollar.php">Four Dollar</option>
        <option value="viewListReport.php?coinType=Four_Dollar_Stella">Four Dollar Stella</option>
        </optgroup>
      <optgroup label="Five Dollar">
        <option value="Five_Dollar.php">Five Dollar</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Eagle">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Turban_Head_Half_Eagle">Turban Head</option>
        <option value="viewListReport.php?coinType=Liberty_Head_Half_Eagle">Liberty Head</option>
        <option value="viewListReport.php?coinType=Coronet_Head_Half_Eagle">Coronet Head</option>
        <option value="viewListReport.php?coinType=Indian_Head_Half_Eagle">Indian Head</option>

        </optgroup>
      <optgroup label="Ten Dollar">
        <option value="Ten_Dollar.php">Ten Dollar</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Eagle">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Coronet_Head_Eagle">Coronet Head</option>
        <option value="viewListReport.php?coinType=Indian_Head_Eagle">Indian Head</option>
        <option value="viewListReport.php?coinType=Quarter_Ounce_Gold">American Eagle</option>
        <option value="viewListReport.php?coinType=First_Spouse">First Spouse</option>
        <option value="viewListReport.php?coinType=Quarter_Ounce_Buffalo">American Buffalo</option>
        </optgroup>
      <optgroup label="Twenty Dollar">
        <option value="Twenty_Dollar.php">Twenty Dollar</option>
        <option value="viewListReport.php?coinType=Coronet_Head_Double_Eagle">Coronet Head</option>
        <option value="viewListReport.php?coinType=Saint_Gaudens_Double_Eagle">Saint Gaudens</option>
        </optgroup>
      <optgroup label="Twenty Five Dollar">
        <option value="Twenty_Five_Dollar.php">Twenty Five Dollar</option>
        <option value="viewListReport.php?coinType=Half_Ounce_Gold">American Eagle</option>
        <option value="viewListReport.php?coinType=Half_Ounce_Buffalo">American Buffalo</option>
        </optgroup>
      <optgroup label="Fifty Dollar">
        <option value="Fifty_Dollar.php">Fifty Dollar</option>
        <option value="viewListReport.php?coinType=One_Ounce_Buffalo">American Buffalo</option>
<option value="viewListReport.php?coinType=One_Ounce_Gold">American Eagle</option>

        </optgroup>

    </select></td>
  </tr>
</table>
<br>
<a class="topLink" href="#top">Top</a></p></div>
<hr />
<table width="372" border="0" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="2"><h3>Gold Dollar Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Liberty_Head_Gold_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty_Head_Gold_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Head_Gold_Dollar">Liberty Head</a> </td>

<td><a href="viewListReport.php?coinType=Indian_Princess_Gold_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Indian_Princess_Gold_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Indian_Princess_Gold_Dollar">Indian Head</a> </td>
  
  </tr>
 </table>
<hr />
<a name="coins"></a>
<h1>All Gold Dollars</h1>

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
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinCategory = '$coinCategory' AND userID = '$userID' AND coinMetal = 'Gold' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addBullion.php">None in collection, Add A Coin</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
	<td>&nbsp;</td>		    
  </tr>
  ';
} else {
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