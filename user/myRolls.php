<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coin Rolls Report</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='State_Quarter', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='State_Quarter'); ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='District_of_Columbia_and_US_Territories', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='District_of_Columbia_and_US_Territories') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='America_the_Beautiful_Quarter', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='America_the_Beautiful_Quarter') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Westward_Journey', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='Westward_Journey') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Sacagawea_Dollar', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='Sacagawea_Dollar') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Presidential_Dollar', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='Presidential_Dollar') ?>]
        ]);				

        var options2 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };							

        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
		var chart3 = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);
		var chart4 = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
        chart4.draw(data4, options4);
		var chart5 = new google.visualization.ColumnChart(document.getElementById('chart_div5'));
        chart5.draw(data5, options5);	
		var chart6 = new google.visualization.ColumnChart(document.getElementById('chart_div6'));
        chart6.draw(data6, options6);	
		var chart7 = new google.visualization.ColumnChart(document.getElementById('chart_div7'));
        chart7.draw(data7, options7);						
}		  
    </script> 


<style type="text/css">

#masterRollTbl {border-collapse:collapse;}
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/myRolls.jpg" width="100" height="100" align="middle">   Coin Rolls</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>
  </tr>
</table> 
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="20%"><h3>Rolls Collected</h3></td>
    <td width="18%" align="right"><?php echo $collectionRolls->getRollCountByID($userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $collectionRolls->getUserSum($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $collectionRolls->getCertificationRollCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle"><h3><img src="../img/addIcon.jpg" width="20" height="20" align="absmiddle"> <a href="addRollType.php">Add New Roll</a></h3></td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr>
<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr class="keyRow">
      <td><strong>Roll Type</strong></td>
      <td align="right"><strong>Collected</strong></td>
      <td align="right"><strong>Investment</strong></td>
      <td align="center"><strong>Roll Storage</strong></td>
    </tr>
    <tr>
      <td width="19%"><a href="RollTypes.php?rollType=Mint">Mint Roll</a></td>
      <td width="11%" align="right"><?php echo $collectionRolls->getRollTypeCount($rollType='Mint', $userID) ?></td>
      <td width="13%" align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType='Mint', $userID)?></td>
      <td width="57%" rowspan="8" align="left" valign="top">
  
  
  
      
  <table width="100%" border="0">
  <tr class="SemiKeyRow">
    <td colspan="6" align="center"><strong>Coin Roll Bins</strong></td>
    </tr>
  <tr class="darker">
    <td width="16%" align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">1C</a></td>
    <td width="16%" align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">5C</a></td>
    <td width="16%" align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">10C</a></td>
    <td width="16%" align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">25C</a></td>
    <td width="16%" align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">50C</a></td>
    <td width="16%" align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">$1</a></td>
  </tr>
  <tr>
    <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Bin', $coinCategory='Small_Cent'); ?></td>
    <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Bin', $coinCategory='Nickel'); ?></td>
    <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Bin', $coinCategory='Dime'); ?></td>
    <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Bin', $coinCategory='Quarter'); ?></td>
    <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Bin', $coinCategory='Half_Dollar'); ?></td>
    <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Bin', $coinCategory='Dollar'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td colspan="6" align="center" class="SemiKeyRow"><strong>Coin Trays</strong></td>
      </tr>
    <tr class="darker">
      <td align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">1C</a></td>
      <td align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">5C</a></td>
      <td align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">10C</a></td>
      <td align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">25C</a></td>
      <td align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">50C</a></td>
      <td align="center"><a href="categoryRolls.php?coinCategory=Small_Cent">$1</a></td>
    </tr>
    <tr>
      <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Tray', $coinCategory='Small_Cent'); ?></td>
      <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Tray', $coinCategory='Nickel'); ?></td>
      <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Tray', $coinCategory='Dime'); ?></td>
      <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Tray', $coinCategory='Quarter'); ?></td>
      <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Tray', $coinCategory='Half_Dollar'); ?></td>
      <td align="center"><?php echo $Container->getRollBinCategoryCount($userID, $containerType='Roll Tray', $coinCategory='Dollar'); ?></td>
    </tr>
  </table>
    
      
      
      
      
      </td>
    </tr>
    <tr>
      <td><a href="RollTypes.php?rollType=Same_Coin">Single Coin</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCount($rollType='Same Coin', $userID) ?></td>
      <td align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType='Same Coin', $userID)?></td>
      </tr>
    <tr>
      <td><a href="RollTypes.php?rollType=Same_Type">Same Coin Type</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCount($rollType='Same Type', $userID) ?></td>
      <td align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType='Same Type', $userID)?></td>
      </tr>
    <tr>
      <td><a href="RollTypes.php?rollType=Mixed_Type">Mixed Type</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCount($rollType='Mixed Type', $userID) ?></td>
      <td align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType='Mixed Type', $userID)?></td>
    </tr>
    <tr>
      <td><a href="RollTypes.php?rollType=Date_Range">Date Range</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCount($rollType='Date Range', $userID) ?></td>
      <td align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType='Date Range', $userID)?></td>
      </tr>
    <tr>
      <td><a href="RollTypes.php?rollType=Same_Year">Same Year Mixed Mint</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCount($rollType='Same Year', $userID) ?></td>
      <td align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType='Same Year', $userID)?></td>
      </tr>
    <tr>
      <td><a href="RollTypes.php?rollType=Coin_By_Coin">Coin By Coin</a></td>
            <td align="right"><?php echo $collectionRolls->getRollTypeCount($rollType='Coin By Coin', $userID) ?></td>
            <td align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType='Coin By Coin', $userID)?></td>
      </tr>
    <tr>
      <td><a href="proofRolls.php">Proof</a></td>
      <td align="right"><?php echo $collectionRolls->getProofRollCount($userID); ?></td>
      <td align="right">$<?php echo $collectionRolls->getProofRollTypeValByCoinType($userID) ?></td>
      </tr>
  </tbody>
</table>
<hr>
<table width="100%" border="1" cellpadding="3" id="masterRollTbl">
  <tr class="keyRow">
    <td><strong>Denomination</strong></td>
    <td width="12%"><strong>Rolls</strong></td>
    <td width="12%">Mint Rolls</td>
    <td width="12%">Single Coin</td>
    <td width="12%">By Type</td>
    <td width="12%">Date Range</td>
    <td width="12%">Same Year</td>
    <td width="12%">Coin By Coin</td>
    </tr>
  <tr class="gryHover">
    <td width="12%"><strong><a href="categoryRolls.php?coinCategory=Half_Cent">Half Cent</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Half Cent' ); ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Half Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Half Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Half Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Half Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Half Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Half Cent') ?></td>
    </tr>
 <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Large_Cent">Large Cent</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Large Cent' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Large Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Large Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Large Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Large Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Large Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Large Cent') ?></td>
    </tr>
  <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Small_Cent">Small Cent</a></strong></td>
    <td width="12%"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Small Cent' ); ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Small Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Small Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Small Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Small Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Small Cent') ?></td>
    <td width="12%"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Small Cent') ?></td>
    </tr>
  <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Two_Cent">Two Cent</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Two Cent' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Two Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Two Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Two Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Two Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Two Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Two Cent') ?></td>
    </tr>
 <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Three_Cent">Three Cent</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Three Cent' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Three Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Three Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Three Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Three Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Three Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Three Cent') ?></td>
    </tr>
<tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Half_Dime">Half Dime</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Half Dime' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Half Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Half Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Half Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Half Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Half Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Half Dime') ?></td>
    </tr>
 <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Nickel">Nickels</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Nickel' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Nickel') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Nickel') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Nickel') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Nickel') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Nickel') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Nickel') ?></td>
    </tr>
  <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Dime">Dimes</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Dime' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Dime') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Dime') ?></td>
    </tr>
<tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Twenty_Cent">Twenty Cent</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Twenty Cent' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Twenty Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Twenty Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Twenty Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Twenty Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Twenty Cent') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Twenty Cent') ?></td>
    </tr> 
 <tr class="gryHover">
   <td><strong><a href="categoryRolls.php?coinCategory=Quarter">Quarters</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Quarter' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Quarter') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Quarter') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Quarter') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Quarter') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Quarter') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Quarter') ?></td>
    </tr>
 <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Half_Dollar">Half Dollars</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Half Dollar' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Half Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Half Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Half Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Half Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Half Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Half Dollar') ?></td>
    </tr>
 <tr class="gryHover">
    <td><strong><a href="categoryRolls.php?coinCategory=Dollar">Dollars</a></strong></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Dollar' ); ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory='Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory='Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory='Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory='Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory='Dollar') ?></td>
    <td><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory='Dollar') ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br class="clear">
  <div>
<p class="roundedWhite">
  <img src="../img/ads/coinRollAd.jpg" width="900" height="100"> </p>
   
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>