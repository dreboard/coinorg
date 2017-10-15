<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinCatLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
$categoryLink = str_replace(' ', '_', $_GET["coinType"]);
$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $buttonTxt = str_replace('_', ' ', $pageCategory); 
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  $dates = $row['dates'];

  }
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType ?> Not Graded Report </title>
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
              ['Ungraded', <?php echo $collection->getNotGradedTypeCount($coinType, $userID); ?>],
              ['Graded',  <?php echo $collection->getAllGradedTypeCount($coinType, $userID); ?>]
            ]);




            // Set chart options
            var options = {
						   slices: {0: {color: '#b39477'}, 1: {color: '#907760'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};


						   
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);


	  }
        </script>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );


});
</script>
<style type="text/css">


</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinType ?> Not Graded Report (<?php echo $collection->getNotGradedTypeCount($coinType, $userID); ?>)</h1>

<?php include("../inc/pageElements/viewTypeLinks.php"); ?> 

<hr />


<table width="100%" border="0">
  <tr>
    <td colspan="2" align="center" title="All Coins, Graded vs Not Graded">&nbsp;</td>

    <td align="center">&nbsp;</td>    
    </tr>
  <tr align="center" valign="top">
    <td width="15%" align="left"><strong>Total Ungraded</strong>
    
    </td>
    <td width="7%"></td>
    <td width="78%"><strong>Ungraded Ratio</strong></td>
    </tr>
  <tr align="center" valign="top">
    <td align="left">Business</td>
    <td><?php echo $collection->getNoGradeStrikeTypeCount($coinType, $userID, $strike='Business'); ?></td>
    <td width="78%" rowspan="5"><div id="chart_div" class="miniGraphDiv"></div></td>
  </tr>
  <tr align="center" valign="top">
    <td align="left">Proof</td>
    <td><?php echo $collection->getNoGradeStrikeTypeCount($coinType, $userID, $strike='Proof'); ?></td>
    </tr>
  <tr align="center" valign="top">
    <td align="left">Sample</td>
    <td>&nbsp;</td>
    </tr>
  <tr align="center" valign="top">
    <td align="left">Genuine</td>
    <td>&nbsp;</td>
    </tr>
  <tr align="center" valign="top">
    <td align="left">Authentic</td>
    <td>&nbsp;</td>
    </tr>
</table>

<hr />
<h2>Coin List</h2>
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="55%" height="24">Year / Mint</td>  
    <td width="12%" align="right">Purchase </td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID' AND coinGrade = 'No Grade' AND collectsetID = '0' ORDER BY coinID ASC") or die(mysql_error());

if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
    <td>No Ungraded '. $coinType.' coins</td>
	<td></td>
  </tr> ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $collectionID = intval($row['collectionID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?collectionID='.$collectionID.'" class="brownLink">'.$coinName.'</a></td>
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>     
<tfoot class="darker">
  <tr>
    <td width="55%" height="24">Year / Mint</td>  
    <td width="12%" align="right">Purchase </td>
  </tr>
	</tfoot>
</table>
<br />
<p><a href="addCoinType.php?coinType=<?php echo $coinCatLink ?>">Add <?php echo $coinType ?></a></p>
  
  <p>&nbsp;</p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>