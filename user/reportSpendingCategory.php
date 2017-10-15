<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";



if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$coinCategoryLink = $_GET["coinCategory"];
$year = intval($_GET["year"]);
$CoinCategories->getCoinByCategory($coinCategory);

$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $CoinCategories->getDenomination();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My <?php echo $coinCategory ?> Finance Report</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){

$("#spendTbl td:last-child").addClass("darker");



});
</script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount Spent'],
<?php
	$sql = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinCategory = '".str_replace('_', ' ', $_GET["coinCategory"])."' ORDER BY coinYear ASC ") or die(mysql_error()); 
	$data = '';
	while($row = mysql_fetch_array($sql)){
	  $data .= "['".$row['coinType']."',  ".$Invest->getTotalInvestmentByType($row['coinType'], $userID)."],";
	  }
	  $data = substr(trim($data), 0, -1);
	  echo $data;

	  /*while($row = mysql_fetch_array($sql))
			  {	echo "['".$row['coinType']."',  ".$Invest->getTotalInvestmentByType($row['coinType'], $userID)."],"; }*/?>	
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
		  'height':300,
		  'width':1100,
          hAxis: {title: 'All <?php echo $coinCategory ?>s', titleTextStyle: {color: 'black'}}
        };
		var formatter = new google.visualization.NumberFormat(
      {prefix: '$', negativeColor: 'red', negativeParens: true});
      formatter.format(data, 1); // Apply formatter to second column

        
	  
	  var options2 = {'title':'Investment Sources',
                           'width':500,
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
<style type="text/css">
table #spendTbl {
  width:1300px;
  text-align:right;
}
.table-scrollable{
    overflow: auto;
}
#spendTbl td {min-width:70px;}
.rightAlign {text-align:right;}
.leftAlign {text-align:left;}
#chart_div2 {margin:0px; padding:0px;}
#investYearSwitcher {margin-bottom:5px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><img src="../img/<?php echo $coinCategoryLink ?>.jpg" alt="" width="100" height="100" align="middle" class="hidden-xs" /> <?php echo $year ?> <?php echo $coinCategory ?> Investment Dashboard</h2>


<h3>Coins</h3>
<table width="500" border="0" id="investYearSwitcher">
  <tr>
    <td width="216">   
    <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Switch Year</option>
<?php 
   foreach(range(1990, date("Y")) as $newYear){
      echo "<option value='reportSpendingCategory.php?coinCategory=".$_GET["coinCategory"]."&year=$newYear'>$newYear</option>";
   }
?>
</select>
    </td>
    <td width="188">
    <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
      <option value="reportSpending.php">Main Report</option>
      
<?php
	$sql = mysql_query("SELECT DISTINCT coinCategory FROM coins ORDER BY denomination DESC ") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		echo '<option value="reportSpendingCategory.php?coinCategory='.str_replace(' ', '_', $row["coinCategory"]).'&year='.$_GET['year'].' ">'.$row["coinCategory"].'</option>';
	  }      
?>      
    </select>
    </td>
    <td width="82">&nbsp;</td>
  </tr>
</table>
<div class="table-responsive">
<table class="table table-condensed table-hover table-scrollable" id="spendTbl">
  <thead><tr class="active leftAlign darker">
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
  </thead>
 <tfoot class="darker">
  <tr class="active">
    <td width="250"><strong>Totals</strong></td>
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
  </tfoot>
<tbody>
<?php
echo $Invest->loadFinanceCategoryTbl($coinCategory, $year, $userID);
?>
</tbody>
</table>
</div>












<div class="row">
  <div class="col-md-12" id="chart_div"></div>
</div>

<h3>Bulk Coins</h3>
<div class="table-responsive">
<table class="table">
  <tr class="active">
    <td width="18%">&nbsp;</td>
    <td width="13%" align="right"><strong>Rolls</strong></td>
    <td width="12%" align="right"><strong>Folders</strong></td>
    <td width="13%" align="right"><strong>Bags</strong></td>
    </tr>
  
<?php echo $Invest->loadBulkCategoryTbl($coinCategory, $year, $userID); ?>
  
    <tr class="active">
    <td>&nbsp;</td>
    <td align="right"><strong>$<?php echo $collectionRolls->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></strong></td>
    <td align="right"><strong>$<?php echo $collectionFolder->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></strong></td>
    <td align="right"><strong>$<?php echo $collectionBags->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></strong></td>
    </tr>
</table>
</div>



<table class="table">
  <tr>
    <td colspan="3"><h3>Purchase Sources</h3></td>
    <td width="15" rowspan="7" valign="top">
      
    </td>
    </tr>
  <tr>
    <td width="98"><strong>Sources</strong></td>
    <td width="77"><strong># Bought</strong></td>
    <td width="455" rowspan="7"><div id="chart_div2"></div></td>
    </tr>
  <tr>
    <td width="98"><strong>eBay</strong></td>
    <td><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='eBay'); ?></td>
    </tr>
  <tr>
    <td><strong>U.S. Mint</strong></td>
    <td><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Mint'); ?></td>
    </tr>
  <tr>
    <td><strong>Coin Shops</strong></td>
    <td><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Coin Shop'); ?></td>
    </tr>
  <tr>
    <td valign="top"><strong>Coin Shows</strong></td>
    <td valign="top"><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Coin Shows'); ?></td>
    </tr>
  <tr>
    <td valign="top"><strong>Undefined</strong></td>
    <td valign="top"><?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='None'); ?></td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"></td>
  </tr>
</table>







<p><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->

<script>
$(document).ready(function() {
	var table = $('#spendTbl').DataTable( {
		//scrollY:        "400px",
		scrollX:        true,
		scrollCollapse: true,
		paging:         false,
        "paging":   false,
        "searching": false,
        "info":     false		
	} );
	new $.fn.dataTable.FixedColumns( table, {
        leftColumns: 1,
        rightColumns: 1
    } );   
}); 
</script> 
</body>

</html>