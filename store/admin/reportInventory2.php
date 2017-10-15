<?php
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory Report</title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		          ['Types', 'Inventory Weight'],
			<?php 
			$sql = mysql_query("SELECT DISTINCT coinType FROM products") or die(mysql_error());
			while ($row = mysql_fetch_array($sql)) {		
				echo "['".$row[0]."',     ".$Product->getProductTypeCount($row[0])."],";
			}
			?>		
        ]);
		var data2 = google.visualization.arrayToDataTable([
		          ['Types', 'Inventory Weight'],
			<?php 
			$sql = mysql_query("SELECT DISTINCT category FROM products") or die(mysql_error());
			while ($row = mysql_fetch_array($sql)) {		
				echo "['".$row[0]."',     ".$Product->getCategoryCount($row[0])."],";
			}
			?>		
        ]);
        //http://simple.wikipedia.org/wiki/Brown#Tones_of_brown_color_comparison_chart
        var options = {
          title: 'Inventory by Type',
		  slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b39477'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
		  is3D: true,
        };
        var options2 = {
          title: 'Inventory by Category',
		  slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b39477'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
		  is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);		
      }
    </script>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">

</style>

</head>

<body>
<div id="container">

<?php include("../inc/pageElements/headerAdmin.php"); ?>
<div id="contentHolder" class="wide">

<div id="content" class="inner">

<h1>Inventory Report</h1>
<table width="100%" border="0">
  <tr>
    <td width="14%"><strong>Product Count</strong></td>
    <td width="86%"><?php echo $Product->getProductCount() ?></td>
  </tr>
  <tr>
    <td><strong>Inventory Costs</strong></td>
    <td>$<?php echo $Product->getProductCost() ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>



<?php
$sql = mysql_query("SELECT SUM(coinType = 'Lincoln Wheat' AND quantity >= '1') as TotalWheat, SUM(coinType = 'Lincoln Memorial' AND quantity >= '1') as TotalMemorial From products") or die(mysql_error());
    $row = mysql_fetch_array($sql);
    echo "There are " . $row['TotalWheat'] . " Wheat";
    echo "There are " . $row['TotalMemorial'] . " Memorial";
?>
<br />

<?php
$sql = mysql_query("SELECT SUM(price >= '200.00' AND quantity >= '1') as TotalHigh, SUM(price <= '200.00' AND quantity >= '1') as TotalLow From products") or die(mysql_error());
    $row = mysql_fetch_array($sql);
    echo "There are " . $row['TotalHigh'] . "  Above $200<br />";
    echo "There are " . $row['TotalLow'] . " Below $200";
?>
<br />
<br />

<table width="100%" border="0">
  <tr>
    <td align="center"><h2>Type</h2></td>
    <td align="center"><h2>Categories</h2></td>
  </tr>
  <tr>
    <td width="50%" valign="top"><div id="chart_div" style="width: 475px; height: 300px;" class="chartsDiv"></div></td>
    <td width="50%" valign="top"><div id="chart_div2" style="width: 475px; height: 300px;" class="chartsDiv"></div></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="51%" valign="top">
    
    
 <table width="100%" border="0">
<?php 
			$sql = mysql_query("SELECT DISTINCT coinType FROM products") or die(mysql_error());
			while ($row = mysql_fetch_array($sql)) {	 
  echo '<tr>
			<td width="40%" class="darker">'.$row[0].'</td>
			<td>'.$Product->getProductTypeCount($row[0]).'</td>
		  </tr>';
			}
?>	  
</table>
   	
</td>
    <td width="49%" valign="top">

 <table width="100%" border="0">
<?php 
			$sql = mysql_query("SELECT DISTINCT category FROM products") or die(mysql_error());
			while ($row = mysql_fetch_array($sql)) {	 
  echo '<tr>
			<td width="30%" class="darker">&nbsp;&nbsp;'.$row[0].'</td>
			<td>'.$Product->getCategoryCount($row[0]).'</td>
		  </tr>';
			}
?>	  
</table>    
       
    </td>
  </tr>
</table>

<?php 

function get30Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= curdate() AND date_added >= DATE_SUB(curdate(),INTERVAL 30 DAY) ") or die(mysql_error());
	return mysql_num_rows($sql);
}
function get30Sums(){
$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added <= curdate() AND date_added >= DATE_SUB(curdate(),INTERVAL 30 DAY) ") or die(mysql_error());
	return mysql_num_rows($sql);
}

function get60Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= curdate() AND date_added >= DATE_SUB(curdate(),INTERVAL 60 DAY) ") or die(mysql_error());
	return mysql_num_rows($sql);
}
function getDeals($days){
	if ($days == 180) {
	  $dayssub30 = 90;
	  } else {
		  $dayssub30 = $days - 30;
	  }
$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(NOW(), INTERVAL $days DAY) AND date_added >= DATE_SUB(NOW(), INTERVAL $dayssub30 DAY) ") or die(mysql_error());
	return mysql_num_rows($sql);
}
function getDealSums($days){
	if ($days == 180) {$dayssub30 = 90;} else {$dayssub30 = $days - 30;}

$end_date = date('Y-m-d H:m:s', strtotime("+".$days." days"));
$results = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added <= DATE_SUB(NOW(), INTERVAL $days DAY) AND date_added >= DATE_SUB(NOW(), INTERVAL $dayssub30 DAY) ") or die(mysql_error());
$num_rows = mysql_num_rows($results);
	  while($row = mysql_fetch_array($sql))
			  {
				$coinSum = $row['COALESCE(sum(purchasePrice), 0.00)'];
			  }
    return money_format('%(#10n', $coinSum);
}
?> 
<hr />
<h2>Stale Inventory</h2>
<table width="100%" border="0">
  <tr class="darker">
    <td width="20%">Range</td>
    <td width="20%" align="center">30</td>
    <td width="20%" align="center">60</td>
    <td width="20%" align="center">90</td>
    <td width="20%" align="center">180</td>
  </tr>
  <tr>
    <td><strong>Products</strong></td>
    <td align="center"><a href="reportRange.php?days=30"><?php echo get30Deals(); ?></a></td>
    <td align="center"><a href="reportRange.php?days=60"><?php echo getDeals('60'); ?></a></td>
    <td align="center"><a href="reportRange.php?days=90"><?php echo getDeals('90'); ?></a></td>
    <td align="center"><a href="reportRange.php?days=180"><?php echo getDeals('180'); ?></a></td>
  </tr>
  <tr>
    <td><strong>Totals</strong></td>
    <td align="center">$<?php echo get30Sums(); ?></td>
    <td align="center">$<?php echo getDealSums('60'); ?></td>
    <td align="center">$<?php echo getDealSums('90'); ?></td>
    <td align="center">$<?php echo getDealSums('180'); ?></td>
  </tr>
</table>
<hr />





<p>&nbsp;</p>
<?php 
$sql = mysql_query("SELECT * FROM transactions") or die(mysql_error());
while ($row = mysql_fetch_array($sql)) {
	$Transactions->getTransactionById($row['id']);
	$arr = explode(',', rtrim($Transactions->getProductArray(), ","));
    echo $Transactions->getProductArray()."<br />";
	foreach ($arr as $val) {
		$parts = explode('-', $val);
		echo 'Product '.$parts[0]. ' Quantity ' .$parts[1];
		};
}

/*$arr = explode(',', $listStr);
foreach ($arr as $val) {}*/


?>

<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>

<?php include("../inc/pageElements/footer.php"); ?>

</div><!--End container-->
</body>
</html>