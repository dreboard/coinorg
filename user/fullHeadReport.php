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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $coinType; ?> Full Head Report</title>
<?php include("../headItems.php"); ?>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
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
              ['Full Head', <?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='FH'); ?>],
              ['No Full Head',  <?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='None'); ?>]
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
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><img src="../img/<?php echo $_GET["coinType"]; ?>.jpg" class="oneHundredWidth" title="<?php echo $coinType ?>" /> <?php echo $coinType; ?> Full Head Report</h2>
<?php include("../inc/pageElements/typeLinks.php"); ?>

  <hr />
  <h3>Percent Attributed </h3>
 <div class="table-responsive"> 
  <table class="table">
   <tr align="center" >
     <td width="25%" valign="middle"><strong>Full Head <?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='FH'); ?></strong></td>
     <td width="75%" rowspan="3"><div id="chart_div" class="colorGraphDiv"></div></td>
   </tr>
   <tr align="center" >
     <td valign="middle"><strong>No Full Head <?php echo $collection->getAllCoinsFullAttCount(str_replace('_', ' ', $_GET["coinType"]), $userID, $fullAtt='None'); ?></strong></td>
   </tr>
   <tr align="center" >
     <td valign="middle"><strong>Certified FH</strong> 2</td>
     </tr>
  </table>
</div>
<h3>Attributed By Year</h3>
<div class="table-responsive">
 <table class="table table-hover">
<?php
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinYear DESC") or die(mysql_error());    
while($row = mysql_fetch_array($countAll))
	  {
		  $coin->getCoinById(intval($row['coinID']));
     echo '
    <tr>
      <td><a class="brownLink" href="fullHeadCoinReport.php?coinID='.intval($row['coinID']).'">'.$coin->getCoinName().'</a></td>
      <td align="center">'.$collection->getCoinDesignationCount($userID, $designation='FH', intval($row['coinID'])).'</td>
    </tr> 
	 ';
	  }
?>    
  </table>
  </div>
<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>