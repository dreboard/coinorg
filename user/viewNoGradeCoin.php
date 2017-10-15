<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 
$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

if($collection->getTypeCollectionProgress($coinCategory, $userID) == 0){
$ungradedTypeDisplay = '(0)';
} else {
	$ungradedTypeDisplay = '';
}
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinCategory ?> Not Graded Report </title>
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
              ['Ungraded', <?php echo $collection->getNoGradeCoinIDCount($coinID, $userID); ?>],
              ['Graded',  <?php echo $collection->getGradedCoinIDCount($coinID, $userID); ?>]
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
<h1><img src="../img/<?php echo $coinVersion ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinName ?> Not Graded Report (<?php echo $collection->getNoGradeCoinIDCount($coinID, $userID); ?>)</h1>

<table width="100%" border="0">
    <tr align="center">
      <td width="20%" align="left"><img src="../img/coinIcon.jpg" width="21" height="20" align="absmiddle" /> <a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><strong>Main Report</strong></a></td>
    <td width="20%" align="left"><a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><img src="../img/grades.jpg" alt="graded" width="25" height="25" align="absmiddle" />
        <strong>Grade Report</strong></a></td>
    <td width="20%" align="left"><a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /> <strong><span class="brownLink">Financial Report</span></strong></a></td>
    <td width="20%" align="left"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><img src="../img/timeIcon.jpg" width="25" height="25" align="absmiddle" /> <strong>Collection History</strong></a></td>
    <td width="20%" align="left">&nbsp;</td>
  </tr>
  </table> 
<br />

<table width="100%" border="0">
  <tr>
    <td align="center" title="All Coins, Graded vs Not Graded"><strong>Ungraded Ratio</strong></td>
    </tr>
  <tr align="center" valign="top">
    <td width="50%"><div id="chart_div" class="miniGraphDiv"></div></td>
    </tr>
</table>




<h2>Coin List</h2>
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="55%" height="24"><strong>Year / Mint</strong></td>  
    <td width="33%"><strong>Type</strong></td>
    <td width="12%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND coinGrade = 'No Grade' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
  echo '
    <tr>
    <td>No '.$coin->getCoinName().'\'s Ungraded</td>
	<td>&nbsp;</td>	
	<td class="purchaseTotals" align="right">&nbsp;</td>	    
  </tr>
  ';
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
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="55%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="12%" align="right"><strong>Purchase Price</strong></td>
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