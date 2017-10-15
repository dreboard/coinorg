<?php 
$smallCentRollCount = '50';
$smallCentRollVal = '.50';
$coinVal = '.01';

$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;
?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount Spent'],
          ['Flowing Hair',  <?php echo $Invest->getTotalInvestmentByType('Flowing_Hair_Dollar', $userID) ?>],
          ['Draped Bust',  <?php echo $Invest->getTotalInvestmentByType('Draped_Bust_Dollar', $userID) ?>],
          ['Gobrecht',  <?php echo $Invest->getTotalInvestmentByType('Gobrecht_Dollar', $userID) ?>],
          ['Seated Liberty',  <?php echo $Invest->getTotalInvestmentByType('Seated_Liberty_Dollar', $userID) ?>],
		  ['Trade Dollar',  <?php echo $Invest->getTotalInvestmentByType('Trade_Dollar', $userID) ?>],
          ['Morgan Dollar',  <?php echo $Invest->getTotalInvestmentByType('Morgan_Dollar', $userID) ?>],
		  ['Peace Dollar',  <?php echo $Invest->getTotalInvestmentByType('Peace_Dollar', $userID) ?>],
          ['Eisenhower Dollar',  <?php echo $Invest->getTotalInvestmentByType('Eisenhower_Dollar', $userID) ?>],
          ['Eisenhower Dollar',  <?php echo $Invest->getTotalInvestmentByType('Susan_B_Anthony_Dollar', $userID) ?>],
          ['Lincoln Sacagawea',  <?php echo $Invest->getTotalInvestmentByType('Sacagawea_Dollar', $userID) ?>],
		  ['Lincoln Presidential',  <?php echo $Invest->getTotalInvestmentByType('Presidential_Dollar', $userID) ?>]
        ]);
		   var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['eBay', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='eBay'); ?>],
              ['U.S. Mint', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Mint'); ?>],
              ['Coin Shops', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Coin Shop'); ?>],
              ['Coin Show', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Coin Show'); ?>],			  
              ['Undefined', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='None'); ?>]
            ]);

        var options = {
          title: 'Dollars Spent',
		  colors: ['#b39477'],
          hAxis: {title: 'All <?php echo $coinCategory ?>s', titleTextStyle: {color: 'black'}}
        };
		var formatter = new google.visualization.NumberFormat(
      {prefix: '$', negativeColor: 'red', negativeParens: true});
      formatter.format(data, 1); // Apply formatter to second column

        
	  
	  var options2 = {'title':'Investment Sources',
                           'width':300,
						   colors: ['#b39477', '#907760', '#5a5245', '#906656', '#e4c6aa'],
						   is3D: true,
						   //slices: {0: {color: '#b39477'}, 3: {color: '#907760'}},
                           'height':300};
      
	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      
	  
	  var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);		
			}				   
    </script>
<h1><img src="../img/<?php echo $coinCategoryLink ?>.jpg" alt="" width="100" height="100" align="middle" /><?php echo $year ?> <?php echo $coinCategory ?> Investment Dashboard</h1>
<table width="900" border="0">
  <tr>
  <td><img src="../img/coinIcon.jpg" width="21" height="20" align="absmiddle" /> <a class="brownLink" href="<?php echo $coinCategoryLink ?>.php"><strong>Main Report</strong></a></td>
    <td><img src="../img/chartIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportGraphCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Graph View</strong></a></td>
    <td><img src="../img/printIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportSpendingCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>&year=<?php echo $year; ?>" class="brownLink"><strong> Financial Report</strong></a></td>
    <td><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
      <option value="reportSpending.php">Main Report</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Cent">Half Cents</option>
      <option value="reportSpendingCategory.php?coinCategory=Large_Cent">Large Cent</option>
      <option value="reportSpendingCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="reportSpendingCategory.php?coinCategory=Two_Cent">Two Cent</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="reportSpendingCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="reportSpendingCategory.php?coinCategory=Dime">Dime</option>
      <option value="reportSpendingCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
      <option value="reportSpendingCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="reportSpendingCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
  </tr>
</table><br />

<table width="244" border="0" cellspacing="3">
<td width="135"><strong>Total Investment</strong></td>
    <td width="96" align="right">$<?php echo number_format($Invest->getMasterCategoryInvestment($coinCategory, $userID), 2); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td align="right">$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
    </tr>
    </table>
  <h3>All Time <?php echo $coinCategory ?> Coins Investment</h3>  
  <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="78%" rowspan="14" valign="bottom">
        <div id="chart_div" style="width:100%; height: 400px;"></div>
      </td>
    </tr>
    <tr>
    <td width="13%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Flowing_Hair_Dollar&year=<?php echo $year ?>">Flowing Hair</a></strong></td>
    <td width="9%" align="right">$<?php echo $collection->getCoinSumByType($coinType='Flowing_Hair_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Draped_Bust_Dollar&year=<?php echo $year ?>">Draped Bust</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Draped_Bust_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Gobrecht_Dollar&year=<?php echo $year ?>">Gobrecht</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Gobrecht_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Seated_Liberty_Dollar&year=<?php echo $year ?>">Seated Liberty</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Seated_Liberty_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Trade_Dollar&year=<?php echo $year ?>">Trade Dollar</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Trade_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Morgan_Dollar&year=<?php echo $year ?>">Morgan Dollar</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Morgan_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td width="13%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Peace_Dollar&amp;year=<?php echo $year ?>">Peace Dollar</a></strong></td>
    <td width="9%" align="right">$<?php echo $collection->getCoinSumByType($coinType='Peace_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Eisenhower_Dollar&amp;year=<?php echo $year ?>">Eisenhower</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Eisenhower_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Susan_B_Anthony_Dollar&amp;year=<?php echo $year ?>">SBA</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Susan_B_Anthony_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Sacagawea_Dollar&amp;year=<?php echo $year ?>">Sacagawea</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Sacagawea_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Presidential_Dollar&amp;year=<?php echo $year ?>">Presidential</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Presidential_Dollar', $userID) ?></td>
    </tr>
  <tr>
    <td colspan="2" align="right" valign="top"><strong>$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></strong></td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td align="right" valign="top">&nbsp;</td>
  </tr>
  </table>
<hr />
<h3>Bulk Coins</h3>
<table width="100%" border="0" id="bulkTbl">
  <tr>
    <td>&nbsp;</td>
    <td width="13%" align="right"><strong>Rolls</strong></td>
    <td width="12%" align="right"><strong>Folders</strong></td>
    <td align="right"><strong>Bags</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="18%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Flowing_Hair_Dollar&amp;year=<?php echo $year ?>">Flowing Hair</a></strong></td>
    <td width="13%" align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Flowing_Hair_Dollar', $userID) ?></td>
    <td width="12%" align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Flowing_Hair_Dollar', $userID) ?></td>
    <td width="13%" align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Flowing_Hair_Dollar', $userID) ?></td>
    <td width="31%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Draped_Bust_Dollar&amp;year=<?php echo $year ?>">Draped Bust</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Draped_Bust_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Draped_Bust_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Draped_Bust_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Gobrecht_Dollar&amp;year=<?php echo $year ?>">Gobrecht</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Gobrecht_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Gobrecht_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Gobrecht_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Seated_Liberty_Dollar&amp;year=<?php echo $year ?>">Seated Liberty</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Seated_Liberty_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Seated_Liberty_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Seated_Liberty_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Trade_Dollar&amp;year=<?php echo $year ?>">Trade Dollar</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Trade_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Trade_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Trade_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Morgan_Dollar&amp;year=<?php echo $year ?>">Morgan Dollar</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Morgan_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Morgan_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Morgan_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="18%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Peace_Dollar&amp;year=<?php echo $year ?>">Peace Dollar</a></strong></td>
    <td width="13%" align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Peace_Dollar', $userID) ?></td>
    <td width="12%" align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Peace_Dollar', $userID) ?></td>
    <td width="13%" align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Peace_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Eisenhower_Dollar&amp;year=<?php echo $year ?>">Eisenhower Dollar</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Eisenhower_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Eisenhower_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Eisenhower_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Susan_B_Anthony_Dollar&amp;year=<?php echo $year ?>">Susan B Anthony</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Susan_B_Anthony_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Susan_B_Anthony_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Susan_B_Anthony_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Sacagawea_Dollar&amp;year=<?php echo $year ?>">Sacagawea</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Sacagawea_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Sacagawea_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Sacagawea_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Presidential_Dollar&amp;year=<?php echo $year ?>">Presidential</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Presidential_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Presidential_Dollar', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Presidential_Dollar', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><strong>$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></strong></td>
    <td align="right"><strong>$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></strong></td>
    <td align="right"><strong>$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></strong></td>
    <td>&nbsp;</td>
  </tr>
</table>

  
  
 
 <hr />

<h3><?php echo $year ?> <?php echo $coinCategory ?> Report</h3>
<table width="500" border="0">
  <tr>
    <td width="87">   
    <select id="yearSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Switch Year</option>
<?php 
   foreach(range(1990, date("Y")) as $newYear){
      echo "<option value='reportSpendingCategory.php?coinCategory=$coinCategoryLink&year=$newYear'>$newYear</option>";
   }
?>
</select>
    </td>
    <td width="313">&nbsp;</td>
    <td width="86">&nbsp;</td>
  </tr>
</table>

<table width="100%" border="0" id="monthInvestTbl">
  <tr>
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
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Flowing_Hair_Dollar&year=<?php echo $year; ?>">Flowing Hair</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Flowing_Hair_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Draped_Bust_Dollar&year=<?php echo $year; ?>">Draped Bust</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Draped_Bust_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong> <a class="brownLink" href="viewTypeFinance.php?coinType=Gobrecht_Dollar&year=<?php echo $year; ?>">Gobrecht</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Gobrecht_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Gobrecht_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong> <a class="brownLink" href="viewTypeFinance.php?coinType=Seated_Liberty_Dollar&year=<?php echo $year; ?>">Seated Liberty</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Seated_Liberty_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Trade_Dollar&year=<?php echo $year; ?>">Trade Dollar</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Trade_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Trade_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Morgan_Dollar&year=<?php echo $year; ?>">Morgan Dollar</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Morgan_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Morgan_Dollar', $userID, $year) ?></strong></td>
  </tr>
  
  
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Peace_Dollar&amp;year=<?php echo $year; ?>">Peace Dollar</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Peace_Dollar', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Peace_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Eisenhower_Dollar&amp;year=<?php echo $year; ?>">Eisenhower Dollar</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Eisenhower_Dollar', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Eisenhower_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong> <a class="brownLink" href="viewTypeFinance.php?coinType=Susan_B_Anthony_Dollar&amp;year=<?php echo $year; ?>">Wheat</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Susan_B_Anthony_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong> <a class="brownLink" href="viewTypeFinance.php?coinType=Sacagawea_Dollar&amp;year=<?php echo $year; ?>">Sacagawea</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Sacagawea_Dollar', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Sacagawea_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Presidential_Dollar&amp;year=<?php echo $year; ?>">Presidential</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Presidential_Dollar', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Presidential_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong>Totals</strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='01', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='02', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='03', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='04', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='05', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='06', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='07', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='08', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='09', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='10', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='11', $year) ?></strong></td>
    <td width="70" align="right"><strong><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory, $userID, $month='12', $year) ?></strong></td>
    <td width="70" align="right">&nbsp;</td>
  </tr>
</table>

<hr />

<table width="900" border="0">
  <tr>
    <td colspan="2"><h3>Purchase Sources</h3></td>
    <td width="580" rowspan="7" valign="top">
      <div id="chart_div2" style="width: 300px; height: 300px;"></div>
    </td>
    <td width="93">&nbsp;</td>
  </tr>
  <tr>
    <td width="114"><strong>Sources</strong></td>
    <td width="95"><strong># Bought</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="114"><strong>eBay</strong></td>
    <td><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='eBay'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>U.S. Mint</strong></td>
    <td><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Mint'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Coin Shops</strong></td>
    <td><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Coin Shop'); ?></td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><strong>Coin Shows</strong></td>
    <td valign="top"><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Coin Shows'); ?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Undefined</strong></td>
    <td valign="top"><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='None'); ?></td>
  </tr>
</table>
