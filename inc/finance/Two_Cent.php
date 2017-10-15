    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount Spent'],
          ['Two Cent',  <?php echo $Invest->getTotalInvestmentByType('Two_Cent_Piece', $userID) ?>]
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
<h1><img src="../img/<?php echo $coinCategoryLink ?>.jpg" alt="" width="100" height="100" align="middle" /> <?php echo $year ?> <?php echo $coinCategory ?> Investment Dashboard</h1>
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
      <td width="77%" rowspan="7" valign="bottom">
        <div id="chart_div" style="width:100%; height: 250px;"></div>
      </td>
    </tr>
    <tr>
    <td width="12%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Two_Cent_Piece&year=<?php echo $year ?>">Two Cent</a></strong></td>
    <td width="11%" align="right">$<?php echo $collection->getCoinSumByType($coinType='Two_Cent_Piece', $userID) ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
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
    <td width="18%" align="right"><strong>Rolls</strong></td>
    <td width="16%" align="right"><strong>Folders</strong></td>
    <td align="right"><strong>Bags</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="17%"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Two_Cent_Piece&amp;year=<?php echo $year ?>">Two Cent Piece</a></strong></td>
    <td width="18%" align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType='Two_Cent_Piece', $userID) ?></td>
    <td width="16%" align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType='Two_Cent_Piece', $userID) ?></td>
    <td width="16%" align="right">$<?php echo $collectionBags->getCoinSumByType($coinType='Two_Cent_Piece', $userID) ?></td>
    <td width="33%">&nbsp;</td>
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
      echo "<option value='reportSpendingCategory.php?coinCategory=$coinCategory&year=$newYear'>$newYear</option>";
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
    <td width="200"><strong><a class="brownLink" href="viewTypeFinance.php?coinType=Two_Cent_Piece&year=<?php echo $year; ?>">Two Cent</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByType($coinType='Two_Cent_Piece', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByType($coinType='Two_Cent_Piece', $userID, $year) ?></strong></td>
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
