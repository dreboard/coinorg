<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
$coinMetal = $coin->getMetalByType($coinType);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType; ?> Color Report</title>
<script type="text/javascript">
$(document).ready(function(){
  $('#clientTbl').dataTable( {
	  "aaSorting": [[ 0, "desc" ]],
	  "iDisplayLength": 50
  });
});
</script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Grade Percentage');    
            data.addColumn('number', 'Slices');
            data.addRows([
              ['Red', <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD'); ?>],
              ['Red/Brown',  <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB'); ?>],
			  ['Brown', <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN'); ?>],
			  ['Unclassified', <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None'); ?>]
            ]);
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Grade Percentage');    
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['Red', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Business'); ?>],
              ['Red/Brown',  <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Business'); ?>],
			  ['Brown', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Business'); ?>],
			  ['Unclassified', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Business'); ?>]
            ]);
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Grade Percentage');    
            data3.addColumn('number', 'Slices');
            data3.addRows([
              ['Red', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Proof'); ?>],
              ['Red/Brown',  <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Proof'); ?>],
			  ['Brown', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Proof'); ?>],
			  ['Unclassified', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Proof'); ?>]
            ]);		
			
			
			
            var data4 = new google.visualization.DataTable();
            data4.addColumn('string', 'Grade Percentage');    
            data4.addColumn('number', 'Slices');
            data4.addRows([
              ['Red', <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD'); ?>],
              ['Red/Brown',  <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB'); ?>],
			  ['Brown', <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN'); ?>],
			  ['Unclassified', <?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None'); ?>]
            ]);
            var data5 = new google.visualization.DataTable();
            data5.addColumn('string', 'Grade Percentage');    
            data5.addColumn('number', 'Slices');
            data5.addRows([
              ['Red', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Business'); ?>],
              ['Red/Brown',  <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Business'); ?>],
			  ['Brown', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Business'); ?>],
			  ['Unclassified', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Business'); ?>]
            ]);
            var data6 = new google.visualization.DataTable();
            data6.addColumn('string', 'Grade Percentage');    
            data6.addColumn('number', 'Slices');
            data6.addRows([
              ['Red', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Proof'); ?>],
              ['Red/Brown',  <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Proof'); ?>],
			  ['Brown', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Proof'); ?>],
			  ['Unclassified', <?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Proof'); ?>]
            ]);		
			
							
            var options = {
						   slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};
            var options2 = {
						   slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};
            var options3 = {
						   slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};		
						   
            var options4 = {
						   slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};
            var options5 = {
						   slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};
            var options6 = {
						   slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};							   
						   				   
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
            var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);						

            var chart4 = new google.visualization.PieChart(document.getElementById('chart_div4'));
            chart4.draw(data4, options);
            var chart5 = new google.visualization.PieChart(document.getElementById('chart_div5'));
            chart5.draw(data5, options5);
            var chart6 = new google.visualization.PieChart(document.getElementById('chart_div6'));
            chart6.draw(data6, options6);		

	  }
        </script>
<style type="text/css">
.colorGraphDiv {width:100%; height:auto;}
</style>

<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><?php echo $coinType; ?> Color Report</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  
  <hr />
<table width="100%" border="0">
  <tr align="center">
    <td colspan="9"><h2>Percentage of All Coins</h2></td>
    </tr>
  <tr align="center">
    <td colspan="3"><h3>Total %</h3></td>
    <td colspan="3"><h3>Business Strike %</h3></td>
    <td colspan="3"><h3>Proof %</h3></td>
  </tr>
  <tr align="center">
    <td colspan="3"><div id="chart_div" class="colorGraphDiv"></div></td>
    <td colspan="3"><div id="chart_div2" class="colorGraphDiv"></div></td>
    <td colspan="3"><div id="chart_div3" class="colorGraphDiv"></div></td>
  </tr> 
   <tr align="center" >
     <td width="12%"><strong>Red</strong></td>
     <td width="10%"><?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD'); ?></td>
     <td width="9%">&nbsp;</td>
     <td width="13%"><strong>Red</strong></td>
     <td width="7%"><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Business'); ?></td>
     <td width="11%">&nbsp;</td>
     <td width="14%"><strong>Red</strong></td>
     <td width="11%"><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Proof'); ?></td>
     <td width="13%">&nbsp;</td>
    </tr>
   <tr align="center">
     <td><strong>Red/Brown</strong></td>
     <td><?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB'); ?></td>
     <td></td>
     <td><strong>Red/Brown</strong></td>
     <td><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Business'); ?></td>
     <td>&nbsp;</td>
     <td><strong>Red/Brown</strong></td>
     <td><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Proof'); ?></td>
     <td>&nbsp;</td>
   </tr>
   <tr align="center">
     <td><strong>Brown</strong></td>
     <td><?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN'); ?></td>
     <td></td>
     <td><strong>Brown</strong></td>
     <td><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Business'); ?></td>
     <td>&nbsp;</td>
     <td><strong>Brown</strong></td>
     <td><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Proof'); ?></td>
     <td>&nbsp;</td>
   </tr>
   <tr align="center">
     <td><strong>Unclassified</strong></td>
     <td><?php echo $collection->getCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None'); ?></td>
     <td></td>
     <td><strong>Unclassified</strong></td>
     <td><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Business'); ?></td>
     <td>&nbsp;</td>
     <td><strong>Unclassified</strong></td>
     <td><?php echo $collection->getCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Proof'); ?></td>
     <td>&nbsp;</td>
   </tr>
</table>  
  <hr />
<table width="100%" border="0">
  <tr align="center">
    <td colspan="9"><h2>Percentage of Each Coin Year</h2></td>
    </tr>
  <tr align="center">
    <td colspan="3"><h3>Total %</h3></td>
    <td colspan="3"><h3>Business Strike %</h3></td>
    <td colspan="3"><h3>Proof %</h3></td>
  </tr>
  <tr align="center">
    <td colspan="3"><div id="chart_div4" class="colorGraphDiv"></div></td>
    <td colspan="3"><div id="chart_div5" class="colorGraphDiv"></div></td>
    <td colspan="3"><div id="chart_div6" class="colorGraphDiv"></div></td>
  </tr> 
   <tr align="center" >
     <td width="12%"><strong>Red</strong></td>
     <td width="10%"><?php echo $collection->getDistinctCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD'); ?></td>
     <td width="9%">&nbsp;</td>
     <td width="13%"><strong>Red</strong></td>
     <td width="7%"><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Business'); ?></td>
     <td width="11%">&nbsp;</td>
     <td width="14%"><strong>Red</strong></td>
     <td width="11%"><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RD', $strike='Proof'); ?></td>
     <td width="13%">&nbsp;</td>
    </tr>
   <tr align="center">
     <td><strong>Red/Brown</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB'); ?></td>
     <td></td>
     <td><strong>Red/Brown</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Business'); ?></td>
     <td>&nbsp;</td>
     <td><strong>Red/Brown</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='RB', $strike='Proof'); ?></td>
     <td>&nbsp;</td>
   </tr>
   <tr align="center">
     <td><strong>Brown</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN'); ?></td>
     <td></td>
     <td><strong>Brown</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Business'); ?></td>
     <td>&nbsp;</td>
     <td><strong>Brown</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='BN', $strike='Proof'); ?></td>
     <td>&nbsp;</td>
   </tr>
   <tr align="center">
     <td><strong>Unclassified</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None'); ?></td>
     <td></td>
     <td><strong>Unclassified</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Business'); ?></td>
     <td>&nbsp;</td>
     <td><strong>Unclassified</strong></td>
     <td><?php echo $collection->getDistinctCoinIDByColorByCoinStrikeCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $color='None', $strike='Proof'); ?></td>
     <td>&nbsp;</td>
   </tr>
</table>
  

  <hr />

  <table width="100%" border="0">
    <tr valign="middle" class="darker">
      <td width="50%"><h3>By Year Color Designations</h3></td>
      <td width="16%" align="center"><img src="../img/Lincoln_Red.jpg" alt="11" width="20" height="20" align="absmiddle" /> Red</td>
      <td width="16%" align="center"><img src="../img/Lincoln_Red_Brown.jpg" alt="11" width="20" height="20" align="absmiddle" /> Red/Brown</td>
      <td width="16%" align="center"><img src="../img/Lincoln_Brown.jpg" alt="11" width="20" height="20" align="absmiddle" /> Brown</td>
    </tr>
<?php
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinYear DESC") or die(mysql_error());    
while($row = mysql_fetch_array($countAll))
	  {
		  $coin->getCoinById(intval($row['coinID']));
     echo '
    <tr class="gryHover">
      <td><a class="brownLink" href="viewCoinColor.php?coinID='.intval($row['coinID']).'">'.$coin->getCoinName().'</a></td>
      <td align="center">'.$collection->getCoinColorCount($userID, $color='RD', intval($row['coinID'])).'</td>
      <td align="center">'.$collection->getCoinColorCount($userID, $color='RB', intval($row['coinID'])).'</td>
      <td align="center">'.$collection->getCoinColorCount($userID, $color='BN', intval($row['coinID'])).'</td>
    </tr> 
	 ';
	  }
?>    
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>