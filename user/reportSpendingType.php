<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$collectTotal = $collection->getCollectionCountById($userID);

if (isset($_GET["from"])) { 
$purchaseFrom = str_replace('_', ' ', strip_tags($_GET["from"]));
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
          ['1/2 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Half_Cent', $userID, $purchaseFrom) ?>],
          ['Lg Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Large_Cent', $userID, $purchaseFrom) ?>],
          ['Sm Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Small_Cent', $userID, $purchaseFrom) ?>],
          ['2 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Two_Cent', $userID, $purchaseFrom) ?>],
		  ['3 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Three_Cent', $userID, $purchaseFrom) ?>],
          ['1/2 Dime',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Half_Dime', $userID, $purchaseFrom) ?>],
          ['5 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Nickel', $userID, $purchaseFrom) ?>],
          ['10 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Dime', $userID, $purchaseFrom) ?>],
          ['20 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Twenty_Cent', $userID, $purchaseFrom) ?>],
		  ['25 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Quarter', $userID, $purchaseFrom) ?>],
          ['50 Cent',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Half_Dollar', $userID, $purchaseFrom) ?>],
		  ['$1',  <?php echo $collection->getTotalInvestmentSumByCategoryFrom('Dollar', $userID, $purchaseFrom) ?>]
        ]);


        var options = {
          title: 'Dollars Spent',
		  colors: ['#b39477'],
          hAxis: {title: 'All Small Cents', titleTextStyle: {color: 'black'}}
        };
		var formatter = new google.visualization.NumberFormat(
      {prefix: '$', negativeColor: 'red', negativeParens: true});
      formatter.format(data, 1); // Apply formatter to second column

        
      
	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      
	  
	
			}				   
    </script>
<style type="text/css">
h1 {margin-bottom:0px;}
#monthInvestTbl {font-size:75%;}
.smallTxt {font-size:85%;}
.tdPadder {padding-right:5px;}
#monthInvestTbl tr:hover
{
        background-color:#333;
		color:#fff;
}

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle"> <?php echo $year ?>  <?php echo $purchaseFrom ?> Purchases</h1>
<?php include("../inc/pageElements/dashboardTbl.php"); ?>
<br />

<table width="221" border="0" cellspacing="3">
<td width="139"><strong>Total Investment</strong></td>
    <td width="37">$<?php echo $Invest->getMasterCollectionTotalFrom($userID, $purchaseFrom); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo $collection->getCoinFaceValueByAccount($userID); ?></td>
    </tr>
  <tr>
    <td><a href="purchaseHistoryFrom.php?from=<?php echo $purchaseFrom ?>&purchaseType=Coins" class="brownLinkBold">Purchase History</a></td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <h3>All Time Coin Investments</h3>
  <table width="50%" border="0">
    <tr>
      <td width="24%">Investment</td>
      <td width="76%">$<?php echo $collection->getCoinSumByAccountFrom($userID, $purchaseFrom); ?></td>
    </tr>
    <tr>
      <td>Face Value</td>
      <td>$<?php echo $collection->getCoinFaceValueByAccountFrom($userID, $purchaseFrom); ?></td>
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
    <td width="8%" height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Cent', $userID, $purchaseFrom); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Large_Cent&year=<?php echo $year ?>">Large Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Large_Cent', $userID, $purchaseFrom); ?></td>
    </tr>
  <tr class="smallTxt">
    <td width="9%" height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Small_Cent&year=<?php echo $year ?>">Small Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Small_Cent', $userID, $purchaseFrom); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Two_Cent&year=<?php echo $year ?>">Two Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Two_Cent', $userID, $purchaseFrom); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Three_Cent&year=<?php echo $year ?>">Three Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Three_Cent', $userID, $purchaseFrom); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Half_Dime&year=<?php echo $year ?>">Half Dime</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dime', $userID, $purchaseFrom); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="reportSpendingCategory.php?coinCategory=Nickel&year=<?php echo $year ?>">Nickels</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Nickel', $userID, $purchaseFrom); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dime&year=<?php echo $year ?>">Dime</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Dime', $userID, $purchaseFrom); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Twenty_Cent&year=<?php echo $year ?>">Twenty Cent</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Twenty_Cent', $userID, $purchaseFrom); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Quarter&year=<?php echo $year ?>">Quarter</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Quarter', $userID, $purchaseFrom); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="9"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dollar&year=<?php echo $year ?>">Half Dollar</a></strong></td>
    <td height="9" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dollar', $userID, $purchaseFrom); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dollar&year=<?php echo $year ?>">Dollar</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategoryFrom($coinCategory='Dollar', $userID, $purchaseFrom); ?></td>
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
    <td width="12%" align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Cent', $userID, $purchaseFrom); ?></td>
    <td width="12%" align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Cent', $userID, $purchaseFrom); ?></td>
    <td width="12%" align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Cent', $userID, $purchaseFrom); ?></td>
    <td width="12%" align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Half_Cent', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Half_Cent') ?></td>
  </tr>
  <tr>
  <td><strong><a href="reportSpendingCategory.php?coinCategory=Large_Cent&amp;year=<?php echo $year ?>">Large Cent</a></strong></td>
  <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Large_Cent', $userID, $purchaseFrom); ?></td>
  <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Large_Cent', $userID, $purchaseFrom); ?></td>
  <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Large_Cent', $userID, $purchaseFrom); ?></td>
  <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Large_Cent', $userID, $purchaseFrom); ?></td>
  <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Large_Cent', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Large_Cent') ?></td>
  </tr>
  <tr>
    <td width="12%"><strong><a href="reportSpendingCategory.php?coinCategory=Small_Cent&amp;year=<?php echo $year ?>">Small Cent</a></strong></td>
    <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Small_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Small_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Small_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Small_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Small_Cent', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Small_Cent') ?></td>
  </tr>
  <tr>
    <td><strong><a href="reportSpendingCategory.php?coinCategory=Two_Cent&amp;year=<?php echo $year ?>">Two Cent</a></strong></td>
    <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Two_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Two_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Two_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Two_Cent', $userID, $purchaseFrom); ?></td>
    <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Two_Cent', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Two_Cent') ?></td>
  </tr>
  <tr>
      <td><strong><a href="reportSpendingCategory.php?coinCategory=Three_Cent&amp;year=<?php echo $year ?>">Three Cent</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Three_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Three_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Three_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Three_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Three_Cent', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Three_Cent') ?></td>
  </tr>
  <tr>
      <td><strong><a href="reportSpendingCategory.php?coinCategory=Half_Dime&amp;year=<?php echo $year ?>">Half Dime</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Half_Dime', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Half_Dime') ?></td>
  </tr>
  <tr>
      <td><strong><a href="reportSpendingCategory.php?coinCategory=Nickel&amp;year=<?php echo $year ?>">Nickels</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Nickel', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Nickel', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Nickel', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Nickel', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Nickel', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Nickel') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dime&amp;year=<?php echo $year ?>">Dime</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Dime', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Dime', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Dime') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Twenty_Cent&amp;year=<?php echo $year ?>">Twenty Cent</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Twenty_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Twenty_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Twenty_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Twenty_Cent', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Twenty_Cent', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Twenty_Cent') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Quarter&amp;year=<?php echo $year ?>">Quarter</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Quarter', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Quarter', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Quarter', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Quarter', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Quarter', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Quarter') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dollar&amp;year=<?php echo $year ?>">Half Dollar</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Half_Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Half_Dollar', $userID, $purchaseFrom) ?></td>
    <td align="right" class="SemiKeyRow">$<?php echo $Invest->getMasterBulkCategoryTotal($userID, $coinCategory='Half_Dollar') ?></td>
  </tr>
  <tr>
      <td><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dollar&amp;year=<?php echo $year ?>">Dollar</a></strong></td>
      <td align="right" class="tdPadder">$<?php echo $collectionRolls->getTotalInvestmentSumByCategoryFrom($coinCategory='Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionFolder->getTotalInvestmentSumByCategoryFrom($coinCategory='Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $collectionBags->getTotalInvestmentSumByCategoryFrom($coinCategory='Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder">$<?php echo $CollectionBoxes->getTotalInvestmentSumByCategoryFrom($coinCategory='Dollar', $userID, $purchaseFrom); ?></td>
      <td align="right" class="tdPadder"><?php echo $CollectionFirstday->getFirstDaySumByCategoryFrom($coinCategory='Dollar', $userID, $purchaseFrom) ?></td>
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
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>