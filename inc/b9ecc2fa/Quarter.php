<?php 
$smallCentRollCount = '50';
$smallCentRollVal = '.50';
$coinVal = '.25';

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
          ['Draped Bust',  <?php echo $Invest->getTotalInvestmentByType('Draped_Bust_Quarter', $userID) ?>],
          ['Liberty Cap',  <?php echo $Invest->getTotalInvestmentByType('Liberty_Cap_Quarter', $userID) ?>],
          ['Seated Liberty',  <?php echo $Invest->getTotalInvestmentByType('Seated_Liberty_Quarter', $userID) ?>],
          ['Barber',  <?php echo $Invest->getTotalInvestmentByType('Barber_Quarter', $userID) ?>],
		  ['Standing Liberty',  <?php echo $Invest->getTotalInvestmentByType('Standing_Liberty', $userID) ?>],
          ['Washington',  <?php echo $Invest->getTotalInvestmentByType('Washington_Quarter', $userID) ?>],
		  ['Statehood',  <?php echo $Invest->getTotalInvestmentByType('State_Quarter', $userID) ?>],
          ['DC & Territories',  <?php echo $Invest->getTotalInvestmentByType('District_of_Columbia_and_US_Territories', $userID) ?>],
          ['America',  <?php echo $Invest->getTotalInvestmentByType('America_the_Beautiful_Quarter', $userID) ?>]
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
  <td><img src="../img/coinIcon.jpg" width="21" height="20" align="absmiddle" /> <a class="brownLink" href="Small_Cent.php"><strong>Main Report</strong></a></td>
    <td><img src="../img/chartIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportGraphCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Graph View</strong></a></td>
    <td><img src="../img/printIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportSpendingCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>&year=<?php echo $year; ?>" class="brownLink"><strong> Financial Report</strong></a></td>
    <td><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
      <option value="reportSpending.php">Main Report</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Cent">Half Cents</option>
      <option value="reportSpendingCategory.php?coinCategory=Large_Cent">Large Cent</option>
      <option value="reportSpendingCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="reportSpendingCategory.php?coinCategory=Two_Cent">Two Cent Grades</option>
      <option value="reportSpendingCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="reportSpendingCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="reportSpendingCategory.php?coinCategory=Dime">Dime</option>
      <option value="reportSpendingCategory.php?coinCategory=Twenty_Cent">Twenty Cent Grades</option>
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
    <td width="13%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Draped_Bust_Quarter&year=<?php echo $year ?>">Draped Bust</a></strong></td>
    <td width="9%" align="right">$<?php echo $collection->getCoinSumByType($coinType='Draped_Bust_Quarter', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Liberty_Cap_Quarter&year=<?php echo $year ?>">Liberty Cap</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Liberty_Cap_Quarter', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Seated_Liberty_Quarter&year=<?php echo $year ?>">Seated Liberty</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Seated_Liberty_Quarter', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Barber_Quarter&year=<?php echo $year ?>">Barber</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Barber_Quarter', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Standing_Liberty&year=<?php echo $year ?>">Standing Liberty</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Standing_Liberty', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Washington_Quarter&year=<?php echo $year ?>">Washington</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='Washington_Quarter', $userID) ?></td>
    </tr>
  <tr>
    <td width="13%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=State_Quarter&amp;year=<?php echo $year ?>">Statehood</a></strong></td>
    <td width="9%" align="right">$<?php echo $collection->getCoinSumByType($coinType='State_Quarter', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=District_of_Columbia_and_US_Territories&amp;year=<?php echo $year ?>">DC & Territories</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='District_of_Columbia_and_US_Territories', $userID) ?></td>
    </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=America_the_Beautiful_Quarter&amp;year=<?php echo $year ?>">America</a></strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByType($coinType='America_the_Beautiful_Quarter', $userID) ?></td>
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
    <td width="18%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Draped_Bust_Quarter&amp;year=<?php echo $year ?>">Draped Bust</a></strong></td>
    <td width="13%" align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Draped_Bust_Quarter', $userID) ?></td>
    <td width="12%" align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Draped_Bust_Quarter', $userID) ?></td>
    <td width="13%" align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Draped_Bust_Quarter', $userID) ?></td>
    <td width="31%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Liberty_Cap_Quarter&amp;year=<?php echo $year ?>">Liberty Cap</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Liberty_Cap_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Liberty_Cap_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Liberty_Cap_Quarter', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Seated_Liberty_Quarter&amp;year=<?php echo $year ?>">Seated Liberty</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Seated_Liberty_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Seated_Liberty_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Seated_Liberty_Quarter', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Barber_Quarter&amp;year=<?php echo $year ?>">Barber</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Barber_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Barber_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Barber_Quarter', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Standing_Liberty&amp;year=<?php echo $year ?>">Standing Liberty</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Standing_Liberty', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Standing_Liberty', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Standing_Liberty', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Washington_Quarter&amp;year=<?php echo $year ?>">Washington</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Washington_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Washington_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Washington_Quarter', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="18%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=State_Quarter&amp;year=<?php echo $year ?>">Statehood</a></strong></td>
    <td width="13%" align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='State_Quarter', $userID) ?></td>
    <td width="12%" align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='State_Quarter', $userID) ?></td>
    <td width="13%" align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='State_Quarter', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=District_of_Columbia_and_US_Territories&amp;year=<?php echo $year ?>">DC & Territories</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='District_of_Columbia_and_US_Territories', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='District_of_Columbia_and_US_Territories', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='District_of_Columbia_and_US_Territories', $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=America_the_Beautiful_Quarter&amp;year=<?php echo $year ?>">America</a></strong></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='America_the_Beautiful_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='America_the_Beautiful_Quarter', $userID) ?></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='America_the_Beautiful_Quarter', $userID) ?></td>
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
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Draped_Bust_Quarter&year=<?php echo $year; ?>">Draped Bust</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Draped_Bust_Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Liberty_Cap_Quarter&year=<?php echo $year; ?>">Liberty Cap</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Liberty_Cap_Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong> <a class="brownLink" href="viewTypeFinance.php?coinType=Seated_Liberty_Quarter&year=<?php echo $year; ?>">Seated Liberty</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Seated_Liberty_Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong> <a class="brownLink" href="viewTypeFinance.php?coinType=Barber_Quarter&year=<?php echo $year; ?>">Barber</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Barber_Quarter', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Barber_Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Standing_Liberty&year=<?php echo $year; ?>">Standing Liberty</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Standing_Liberty', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Standing_Liberty', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Washington_Quarter&year=<?php echo $year; ?>">Washington</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Washington_Quarter', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Washington_Quarter', $userID, $year) ?></strong></td>
  </tr>
  
  
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=State_Quarter&amp;year=<?php echo $year; ?>">Statehood</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='State_Quarter', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='State_Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a class="brownLink" href="viewTypeFinance.php?coinType=District_of_Columbia_and_US_Territories&amp;year=<?php echo $year; ?>">DC & Territories</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='District_of_Columbia_and_US_Territories', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong> <a class="brownLink" href="viewTypeFinance.php?coinType=America_the_Beautiful_Quarter&amp;year=<?php echo $year; ?>">Wheat</a></strong></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='01', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='02', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='03', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='04', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='05', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='06', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='07', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='08', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='09', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='10', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='11', $year) ?></td>
    <td align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $month='12', $year) ?></td>
    <td align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='America_the_Beautiful_Quarter', $userID, $year) ?></strong></td>
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
