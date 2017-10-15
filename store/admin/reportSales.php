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
        //http://simple.wikipedia.org/wiki/Brown#Tones_of_brown_color_comparison_chart
        var options = {
          title: 'Inventory by Type',
		  slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b39477'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
		  is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
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

<h1>Sales Report</h1>
<table width="100%" border="0">
  <tr>
    <td width="12%"><strong>All Time Sales</strong></td>
    <td width="13%">&nbsp;</td>
    <td width="75%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>2013 Sales</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>April Sales</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
$sql = mysql_query("SELECT SUM(price >= '400.00' AND quantity >= '1') as TotalHigh, SUM(price <= '400.00' AND quantity >= '1') as TotalLow From products") or die(mysql_error());
    $row = mysql_fetch_array($sql);
    echo "There are " . $row['TotalHigh'] . "  Above $400<br />";
    echo "There are " . $row['TotalLow'] . " Below $400";
?>
<br />
<br />
<?php 
$sql = mysql_query("SELECT DISTINCT coinType FROM products") or die(mysql_error());
while ($row = mysql_fetch_array($sql)) {
    echo$row[0]." ".$Product->getProductTypeCount($row[0])."<br />";
}
?>
<div id="chart_div" style="width: 900px; height: 300px;"></div>
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
<hr />
<h2>Sales by Site</h2>
<table width="100%" border="0">
  <tr>
    <td width="20%">Site</td>
    <td width="20%">Pieces</td>
    <td width="19%" align="right">Total</td>
    <td width="41%">&nbsp;</td>
  </tr>
  <tr>
    <td>All Small Cents</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>






<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>

<?php include("../inc/pageElements/footer.php"); ?>

</div><!--End container-->
</body>
</html>