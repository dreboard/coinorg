<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$collectTotal = $collection->getCollectionCountById($userID);

if (isset($_GET["year"])) { 
$year = intval($_GET["year"]);
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Spending Report</title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount Spent'],
          ['1/2 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Half_Cent', $userID) ?>],
          ['Lg Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Large_Cent', $userID) ?>],
          ['Sm Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Small_Cent', $userID) ?>],
          ['2 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Two_Cent', $userID) ?>],
		  ['3 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Three_Cent', $userID) ?>],
          ['1/2 Dime',  <?php echo $collection->getTotalInvestmentSumByCategory('Half_Dime', $userID) ?>],
          ['5 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Nickel', $userID) ?>],
          ['10 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Dime', $userID) ?>],
          ['20 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Twenty_Cent', $userID) ?>],
		  ['25 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Quarter', $userID) ?>],
          ['50 Cent',  <?php echo $collection->getTotalInvestmentSumByCategory('Half_Dollar', $userID) ?>],
		  ['$1',  <?php echo $collection->getTotalInvestmentSumByCategory('Dollar', $userID) ?>]
        ]);
		   var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['eBay', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='eBay'); ?>],
              ['U.S. Mint', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Mint'); ?>],
              ['Coin Shops', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Shop'); ?>],
              ['Undefined', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='None'); ?>]
            ]);

        var options = {
          title: 'Dollars Spent',
		  colors: ['#b39477'],
          hAxis: {title: 'All Small Cents', titleTextStyle: {color: 'black'}}
        };
		var formatter = new google.visualization.NumberFormat(
      {prefix: '$', negativeColor: 'red', negativeParens: true});
      formatter.format(data, 1); // Apply formatter to second column

        
	  
	  var options2 = {'title':'Investment Sources',
                           'width':300,
						   slices: {0: {color: '#b39477'}, 3: {color: '#907760'}},
                           'height':300};
      
	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      
	  
	  var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);		
			}				   
    </script>
<style type="text/css">
h1 {margin-bottom:0px;}


</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle"> <?php echo $year ?>  Investment Dashboard</h1>
<?php include("../inc/pageElements/dashboardTbl.php"); ?>
<br />

<table width="221" border="0" cellspacing="3">
<td width="139"><strong>Total Investment</strong></td>
    <td width="37">$<?php echo $Invest->getMasterCollectionTotal($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo $collection->getCoinFaceValueByAccount($userID); ?></td>
    </tr>
  <tr>
    <td><a href="purchaseHistory.php" class="brownLinkBold">Purchase History</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="salesHistory.php" class="brownLinkBold">Sales History</a></td>
    <td>&nbsp;</td>
  </tr>
    </table>
  <h3>All Time Coin Investments</h3>
  <table width="50%" border="0">
    <tr>
      <td width="24%">Investment</td>
      <td width="76%">$<?php echo $collection->getCoinSumByAccount($userID); ?></td>
    </tr>
    <tr>
      <td>Face Value</td>
      <td>$<?php echo $collection->getCoinFaceValueByAccount($userID); ?></td>
    </tr>
  </table>

 <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="83%" rowspan="14" valign="top">
        <div id="chart_div" style="width:100%; height: 350px;"></div>
      </td>
    </tr>
    <tr class="smallTxt">
      <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Half_Cent&year=<?php echo $year ?>">Half Cent</a></strong></td>
    <td width="8%" height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Half_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Large_Cent&year=<?php echo $year ?>">Large Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Large_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td width="9%" height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Small_Cent&year=<?php echo $year ?>">Small Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Small_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Two_Cent&year=<?php echo $year ?>">Two Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Two_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Three_Cent&year=<?php echo $year ?>">Three Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Three_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Half_Dime&year=<?php echo $year ?>">Half Dime</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Half_Dime', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Nickel&year=<?php echo $year ?>">Nickels</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Nickel', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dime&year=<?php echo $year ?>">Dime</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Dime', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Twenty_Cent&year=<?php echo $year ?>">Twenty Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Twenty_Cent', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Quarter&year=<?php echo $year ?>">Quarter</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Quarter', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="9"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dollar&year=<?php echo $year ?>">Half Dollar</a></strong></td>
    <td height="9" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Half_Dollar', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dollar&year=<?php echo $year ?>">Dollar</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Dollar', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="4">&nbsp;</td>
    <td height="4" align="right">&nbsp;</td>
  </tr>
  <tr class="smallTxt">
    <td height="20">&nbsp;</td>
    <td height="20" align="right">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
 </table>
 <hr />
<h3>Bulk/Other</h3>
<table width="100%" border="0" id="bulkTbl">
  <tr align="right" class="darker">
    <td width="14%">&nbsp;</td>
    <td width="14%" class="tdPadder">Rolls</td>
    <td width="14%" class="tdPadder">Folders</td>
    <td width="14%" class="tdPadder">Bags</td>
    <td width="14%" class="tdPadder">Boxes</td>
    <td width="14%" class="tdPadder">First Day</td>
    <td width="14%" class="keyRow">Totals</td>
  </tr>
  <tr>
    <td><strong><a href="reportSpendingCategory.php?coinCategory=Half_Cent&amp;year=<?php echo $year ?>">Half Cent</a></strong></td>
    <td width="12%" align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Half_Cent', $userID); ?></td>
    <td width="12%" align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Half_Cent', $userID); ?></td>
    <td width="12%" align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Half_Cent', $userID); ?></td>
    <td width="12%" align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Half_Cent', $userID); ?></td>
    <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Half_Cent', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Half_Cent') ?></td>
  </tr>
  <tr>
  <td><strong><a href="reportSpendingCategory.php?coinCategory=Large_Cent&amp;year=<?php echo $year ?>">Large Cent</a></strong></td>
  <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Large_Cent', $userID); ?></td>
  <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Large_Cent', $userID); ?></td>
  <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Large_Cent', $userID); ?></td>
  <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Large_Cent', $userID); ?></td>
  <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Large_Cent', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Large_Cent') ?></td>
  </tr>
  <tr>
    <td width="12%"><strong><a href="reportSpendingCategory.php?coinCategory=Small_Cent&amp;year=<?php echo $year ?>">Small Cent</a></strong></td>
    <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Small_Cent', $userID); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Small_Cent', $userID); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Small_Cent', $userID); ?></td>
    <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Small_Cent', $userID); ?></td>
    <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Small_Cent', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Small_Cent') ?></td>
  </tr>
  <tr>
    <td><strong><a href="reportSpendingCategory.php?coinCategory=Two_Cent&amp;year=<?php echo $year ?>">Two Cent</a></strong></td>
    <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Two_Cent', $userID); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Two_Cent', $userID); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Two_Cent', $userID); ?></td>
    <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Two_Cent', $userID); ?></td>
    <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Two_Cent', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Two_Cent') ?></td>
  </tr>
  <tr>
      <td><strong><a href="reportSpendingCategory.php?coinCategory=Three_Cent&amp;year=<?php echo $year ?>">Three Cent</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Three_Cent', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Three_Cent', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Three_Cent', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Three_Cent', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Three_Cent', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Three_Cent') ?></td>
  </tr>
  <tr>
      <td><strong><a href="reportSpendingCategory.php?coinCategory=Half_Dime&amp;year=<?php echo $year ?>">Half Dime</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Half_Dime', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Half_Dime', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Half_Dime', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Half_Dime', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Half_Dime', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Half_Dime') ?></td>
  </tr>
  <tr>
      <td><strong><a href="reportSpendingCategory.php?coinCategory=Nickel&amp;year=<?php echo $year ?>">Nickels</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Nickel', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Nickel', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Nickel', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Nickel', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Nickel', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Nickel') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dime&amp;year=<?php echo $year ?>">Dime</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Dime', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Dime', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Dime', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Dime', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Dime', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Dime') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Twenty_Cent&amp;year=<?php echo $year ?>">Twenty Cent</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Twenty_Cent', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Twenty_Cent', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Twenty_Cent', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Twenty_Cent', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Twenty_Cent', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Twenty_Cent') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Quarter&amp;year=<?php echo $year ?>">Quarter</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Quarter', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Quarter', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Quarter', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Quarter', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Quarter', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Quarter') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dollar&amp;year=<?php echo $year ?>">Half Dollar</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Half_Dollar', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Half_Dollar', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Half_Dollar', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Half_Dollar', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Half_Dollar', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Half_Dollar') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dollar&amp;year=<?php echo $year ?>">Dollar</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory='Dollar', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory='Dollar', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory='Dollar', $userID); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategory($coinCategory='Dollar', $userID); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategory($coinCategory='Dollar', $userID) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Dollar') ?></td>
  </tr>
  <tr class="SemiKeyRow">
    <td class="keyRow"><strong>Totals</strong></td>
    <td align="right"><strong>$<?php echo $collectionRolls->getUserSum($userID); ?></strong></td>
    <td align="right"><strong>$<?php echo $collectionFolder->getUserSum($userID); ?></strong></td>
    <td align="right"><strong>$<?php echo $collectionBags->getUserSum($userID); ?></strong></td>
    <td align="right"><strong>$<?php echo $CollectionBoxes->getBoxSumByID($userID); ?></strong></td>
    <td align="right" class="darker">$<?php echo $CollectionFirstday->totalFirstDayInvestment($userID) ?></td>
    <td align="right" class="keyRow"><strong>$<?php echo $Invest->getMasterBulkTotal($userID) ?></strong></td>
  </tr>
</table>
<hr />
<h3>Mint sets</h3>

<table width="40%" border="0">
  <tr>
    <td width="61%">Mint</td>
    <td width="39%" align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Mint', $userID); ?></td>
  </tr>
  <tr>
    <td>Proof</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Proof', $userID); ?></td>
  </tr>
  <tr>
    <td>Silver Proof</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Silver Proof', $userID); ?></td>
  </tr>
  <tr>
    <td>Special Mint</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Special Mint', $userID); ?></td>
  </tr>
  <tr>
    <td>Souvenir Set</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Souvenir Set', $userID); ?></td>
  </tr>
  <tr>
    <td>3 Coin Set</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='3 Coin Set', $userID); ?></td>
  </tr>
  <tr>
    <td>Limited Edition Silver Proof Set</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Limited Edition Silver Proof Set', $userID); ?></td>
  </tr>
  <tr>
    <td>Uncirculated Coin Set</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Uncirculated Coin Set', $userID); ?></td>
  </tr>
  <tr>
    <td>Commemorative</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Commemorative', $userID); ?></td>
  </tr>
  <tr>
    <td>American Eagle</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='American Eagle', $userID); ?></td>
  </tr>
  <tr>
    <td>American Buffalo</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='American Buffalo', $userID); ?></td>
  </tr>
  <tr>
    <td>Year Set</td>
    <td align="right"><?php echo $CollectionSet->getSetTypeSumByID($setType='Year Set', $userID); ?></td>
  </tr>
  <tr class="keyRow">
    <td><strong>Total</strong></td>
    <td align="right"><strong>$<?php echo $CollectionSet->totalAllMintsetsInvestment($userID); ?></strong></td>
  </tr>
  </table>


<hr />

<h3><?php echo $year ?>  Spending Report</h3>
<table width="500" border="0">
  <tr>
    <td width="87">   
    <select id="yearSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Switch Year</option>
<?php 
   foreach(range(1990, date("Y")) as $newYear){
      echo "<option value='reportSpending.php?year=$newYear'>$newYear</option>";
   }
?>
</select>
    </td>
    <td width="313">&nbsp;</td>
    <td width="86">&nbsp;</td>
  </tr>
</table>
<br />
<table width="100%" border="0" id="monthInvestTbl">
  <tr class="SemiKeyRow">
    <td>&nbsp;</td>
    <td align="right"><strong>Jan</strong></td>
    <td align="right"><strong>Feb</strong></td>
    <td align="right"><strong>Mar</strong></td>
    <td align="right"><strong>Apr</strong></td>
    <td align="right"><strong>May</strong></td>
    <td align="right"><strong>Jun</strong></td>
    <td align="right"><strong>Jul</strong></td>
    <td align="right"><strong>Aug</strong></td>
    <td align="right"><strong>Sep</strong></td>
    <td align="right"><strong>Oct</strong></td>
    <td align="right"><strong>Nov</strong></td>
    <td align="right"><strong>Dec</strong></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Cent&year=<?php echo $year ?>">Half Cent</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Half_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Large_Cent&year=<?php echo $year ?>">Large Cent</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Large_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Large_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Small_Cent&year=<?php echo $year ?>">Small Cent</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Small_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Small_Cent', $userID,$year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Two_Cent&year=<?php echo $year ?>">Two Cent</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Two_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Two_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Three_Cent&year=<?php echo $year ?>">Three Cent</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Three_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dime&year=<?php echo $year ?>">Half Dime</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dime', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Half_Dime', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Nickel&year=<?php echo $year ?>">Nickels</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Nickel', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Nickel', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dime&year=<?php echo $year ?>">Dime</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dime', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Dime', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Twenty_Cent&year=<?php echo $year ?>">Twenty Cent</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Twenty_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Quarter&year=<?php echo $year ?>">Quarter</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dollar&year=<?php echo $year ?>">Half Dollar</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Half_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Half_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong> <a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dollar&year=<?php echo $year ?>">Dollar</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr class="keyRow">
    <td width="200"><strong>Totals</strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='01', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='02', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='03', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='04', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='05', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='06', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='07', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='08', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='09', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='10', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='11', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='12', $year) ?></strong></td>
    <td align="right">&nbsp;</td>
  </tr>
</table>

<br />

<hr />


<table width="900" border="0">
  <tr>
    <td colspan="2"><h3>Purchase Sources</h3></td>
    <td width="523" rowspan="11" valign="top">
      <div id="chart_div2" style="width: 300px; height: 300px;"></div>
    </td>
    <td width="93">&nbsp;</td>
  </tr>
  <tr>
    <td width="142"><strong>Sources</strong></td>
    <td width="124"><strong># Bought</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="142"><strong><a href="reportSpendingType.php?from=eBay&year=<?php echo $year ?>">eBay</a></strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='eBay'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="reportSpendingType.php?from=Mint&year=<?php echo $year ?>">U.S. Mint</a></strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Mint'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="reportSpendingType.php?from=Coin_Shop&year=<?php echo $year ?>">Coin Shops</a></strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Shop'); ?></td>
  </tr>
    <tr>
    <td><strong><a href="reportSpendingType.php?from=Coin_Show&year=<?php echo $year ?>">Coin Shows</a></strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Show'); ?></td>
  </tr>
  <tr>
    <td valign="top"><strong><a href="reportSpendingType.php?from=None&year=<?php echo $year ?>">Undefined</a></strong></td>
    <td valign="top"><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='None'); ?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>

</table>

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>