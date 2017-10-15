
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
<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle"> <?php echo $year ?>  Investment Dashboard</h1>
<table width="900" border="0">
  <tr>
    <td><img src="../../img/coinIcon.jpg" width="21" height="20" align="absmiddle" /> <a class="brownLink" href="report.php"><strong>Main Report</strong></a></td>
    <td><img src="../img/chartIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportGraph.php" class="brownLink"><strong> Graph View</strong></a></td>
    <td><img src="../img/printIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportSpendingCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>&year=<?php echo $year; ?>" class="brownLink"><strong> Financial Report</strong></a></td>
    <td><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
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

<table width="221" border="0" cellspacing="3">
<td width="139"><strong>Total Investment</strong></td>
    <td width="37">$<?php echo $collection->getCoinSumByAccount($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
    </tr>
    </table>
  <h3>All Time Coin Investments</h3>  
 <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="83%" rowspan="12" valign="top">
        <div id="chart_div" style="width:100%; height: 250px;"></div>
      </td>
    </tr>
    <tr class="smallTxt">
      <td height="25"><strong><a href="Half_Cent.php">Half Cent</a></strong></td>
    <td width="8%" height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Half_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Large_Cent.php">Large Cent</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Large_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td width="9%" height="25"><strong><a href="Small_Cent.php">Small Cent</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Small_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Two_Cent.php">Two Cent</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Two_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Three_Cent.php">Three Cent</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Three_Cent', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Half_Dime.php">Half Dime</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Half_Dime', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Nickel.php">Nickels</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Nickel', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Dime.php">Dimes</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Dime', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Twenty_Cent.php">Twenty Cent</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Twenty_Cent', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Quarter.php">Quarters</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Quarter', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Half_Dollar.php">Half Dollar</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Half_Dollar', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="25"><strong><a href="Dollar.php">Dollar</a></strong></td>
    <td height="25" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Dollar', $userID); ?></td>
    <td valign="top">&nbsp;</td>
  </tr>
 </table>
 <hr />

<h3><?php echo $year ?>  Report</h3>
<table width="500" border="0">
  <tr>
    <td width="87">   
    <select id="yearSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Switch Year</option>
<?php 
   foreach(range(1990, date("Y")) as $newYear){
      echo "<option value='reportSpendingCategory.php?coinCategory=Small_Cent&year=$newYear'>$newYear</option>";
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
    <td width="200"><strong><a class="brownLink" href="Half_Cent.php">Half Cent</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Half_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Large_Cent.php">Large Cent</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Large_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Small_Cent.php">Small Cent</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Small_Cent', $userID,$year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Two_Cent.php">Two Cent</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Two_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Three_Cent.php">Three Cent</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Three_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Half_Dime.php">Half Dime</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Half_Dime', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Nickel.php">Nickels</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Nickel', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Dime.php">Dime</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Dime', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Twenty_Cent.php">Twenty Cent</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Twenty_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Quarter.php">Quarter</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="Half_Dollar.php">Half Dollar</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Half_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong> <a class="brownLink" href="Dollar.php">Dollar</a></strong></td>
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
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
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
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='eBay'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>U.S. Mint</strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Mint'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Coin Shops</strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Shop'); ?></td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><strong>Coin Shows</strong></td>
    <td valign="top"><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Shows'); ?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Undefined</strong></td>
    <td valign="top"><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='None'); ?></td>
  </tr>
</table>
