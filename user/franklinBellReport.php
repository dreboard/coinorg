<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType; ?> Full Bell Lines Report</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


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
              ['Full Bell Lines', <?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='FH'); ?>],
              ['No Full Bell Lines',  <?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='None'); ?>]
            ]);
		
            var options = {
						   slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};
					   
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);				

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
<h1><?php echo $coinType; ?> Full Bell Lines Report</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  
  <hr />
 <table width="100%" border="0">
  <tr align="center">
    <td colspan="2"><h3>Total %</h3></td>
    </tr>
  <tr align="center">
    <td colspan="2"><div id="chart_div" class="colorGraphDiv"></div></td>
    </tr> 
   <tr align="center" >
     <td width="50%"><strong>Full Bell Lines</strong></td>
     <td width="50%"><?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='FB'); ?></td>
    </tr>
   <tr align="center">
     <td><strong>No Full Bell Lines</strong></td>
     <td><?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='None'); ?></td>
    </tr>
</table>
 
 <hr /> 
  <table width="100%" border="0">
    <tr class="darker">
      <td width="75%"><h3>By Year Designations</h3></td>
    <td width="25%" align="center">Full Bell Lines</td>
    </tr>
<?php
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND strike = 'Business' AND coinYear <= '".date('Y')."' ORDER BY coinYear DESC") or die(mysql_error());    
while($row = mysql_fetch_array($countAll))
	  {
		  $coin->getCoinById(intval($row['coinID']));
     echo '
    <tr class="gryHover">
      <td><a class="brownLink" href="fullBellReport.php?coinID='.intval($row['coinID']).'">'.$coin->getCoinName().'</a></td>
      <td align="center">'.$collection->getCoinDesignationCount($userID, $fullAtt='FBL', intval($row['coinID'])).'</td>
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