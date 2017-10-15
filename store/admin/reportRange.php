<?php
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";

switch(intval($_GET['days'])){

case '30':
	$sql2 = mysql_query("SELECT * FROM products WHERE date_added <= curdate() AND date_added >= DATE_SUB(curdate(),INTERVAL 30 DAY) ") or die(mysql_error());
	$theCount =  mysql_num_rows($sql2);
	$theAmount = $Product->get30Sums();
break;	
	
case '60':
	$sql2 = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 30 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 60 day) AND quantity >= '1'  ") or die(mysql_error());
		$theCount =  mysql_num_rows($sql2);
	$theAmount = $Product->get60Sums();
break;	

case '90':
	$sql2 = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 60 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 90 day)  AND quantity >= '1' ") or die(mysql_error());	
		$theCount =  mysql_num_rows($sql2);
	$theAmount = $Product->get90Sums();
break;		
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo intval($_GET['days']) ?> Day Inventory Report</title>
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
			switch(intval($_GET['days'])){
             case '30':
			echo "['".$row[0]."',     ".$Product->getProductType30Count($row[0])."],";
			break;
             case '60':
			echo "['".$row[0]."',     ".$Product->getProductType60Count($row[0])."],";
			break;
             case '90':
			echo "['".$row[0]."',     ".$Product->getProductType90Count($row[0])."],";
			break;						
			}
			}
			?>		
        ]);
		var data2 = google.visualization.arrayToDataTable([
		          ['Types', 'Inventory Weight'],
			<?php 
			$sql = mysql_query("SELECT DISTINCT category FROM products") or die(mysql_error());
			while ($row = mysql_fetch_array($sql)) {		
			switch(intval($_GET['days'])){
             case '30':
			echo "['".$row[0]."',     ".$Product->getCategory30Count($row[0])."],";
			break;
             case '60':
			echo "['".$row[0]."',     ".$Product->getCategory60Count($row[0])."],";
			break;
             case '90':
			echo "['".$row[0]."',     ".$Product->getCategory90Count($row[0])."],";
			break;						
			}			
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

<h1 id="adminHdr"><?php echo intval($_GET['days']) ?> Day Inventory Report</h1>
<table width="100%" border="0">
  <tr>
    <td width="14%"><strong>Product Count</strong></td>
    <td width="86%"><?php echo $theCount; ?></td>
  </tr>
  <tr>
    <td><strong>Inventory Costs</strong></td>
    <td>$<?php echo $theAmount; ?></td>
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
			<td width="40%" class="darker">'.$row[0].'</td>';
			switch(intval($_GET['days'])){
             case '30':
			echo '<td>'.$Product->getProductType30Count($row[0]).'</td>';
			break;
             case '60':
			echo '<td>'.$Product->getProductType60Count($row[0]).'</td>';
			break;
             case '90':
			echo '<td>'.$Product->getProductType90Count($row[0]).'</td>';
			break;						
			}			
		  echo '</tr>';
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
			<td width="40%" class="darker">'.$row[0].'</td>';
			switch(intval($_GET['days'])){
             case '30':
			echo '<td>'.$Product->getCategory30Count($row[0]).'</td>';
			break;
             case '60':
			echo '<td>'.$Product->getCategory60Count($row[0]).'</td>';
			break;
             case '90':
			echo '<td>'.$Product->getCategory90Count($row[0]).'</td>';
			break;						
			}			
		  echo '</tr>';
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
$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added > DATE_SUB(now(), interval 30 day) ") or die(mysql_error());
	return mysql_num_rows($sql);
}

function get60Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 30 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 60 day)   ") or die(mysql_error());
	return mysql_num_rows($sql);
}
function get90Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 60 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 90 day)   ") or die(mysql_error());
	return mysql_num_rows($sql);
}
function get180Deals(){
$sql = mysql_query("SELECT * FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 180 day)   ") or die(mysql_error());
	return mysql_num_rows($sql);
}



function get90Sums(){
$sql = mysql_query("SELECT COALESCE(sum(purchasePrice), 0.00) FROM products WHERE date_added <= DATE_SUB(curdate(),INTERVAL 60 day)  AND date_added >= DATE_SUB(curdate(),INTERVAL 90 day)   ") or die(mysql_error());
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
<h2><?php echo intval($_GET['days']); ?> Inventory</h2>
<table width="100%" border="0" id="productTbl">
    <thead class="darker">
  <tr align="center">
    <td width="6%" align="left">&nbsp;</td>
    <td width="67%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
  </tr>
</thead>
  <tbody>
  <tr align="center" valign="top">
<?php 
	
    if(mysql_num_rows($sql2) == 0){
	  echo '
    <td width="25%">No '.intval($_GET['days']).' inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {

while($row = mysql_fetch_array($sql2))
  {
  $Product->getProductById(intval($row['productID']));
			  echo '<tr>
				<td align="center" valign="middle"><img class="listImg" src="'.$Product->getCoinImage1().'" /></td>
				<td><a href="inventory_edit.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a></td>
				<td align="right">$'.$Product->getPrice().'</td>
				<td align="right">'.date("F j, Y",strtotime($Product->getDateAdded())).'</td>
				</tr>';
  }

}
?>
</tr>
  </tbody>
    <tfoot class="darker">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="67%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
  </tr>
</tfoot>

</table>
<hr />

<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>

<?php include("../inc/pageElements/footer.php"); ?>

</div><!--End container-->
</body>
</html>