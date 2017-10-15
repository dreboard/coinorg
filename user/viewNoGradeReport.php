<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', strip_tags($_GET["coinCategory"]));
$coinTypeLink = strip_tags($_GET["coinCategory"]);
$coinCategoryPage = str_replace('_', '', strip_tags($_GET["coinCategory"]));

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
              ['Ungraded', <?php echo $collection->getNoGradeCategoryCount($coinCategory, $userID); ?>],
              ['Graded',  <?php echo $collection->getGradeCategoryCount($coinCategory, $userID); ?>]
            ]);


            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Topping');
            data3.addColumn('number', 'Slices');
            data3.addRows([
			
			
			<?php 
			$countAll = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinCategory = '$coinCategory' ORDER BY coinYear ASC") or die(mysql_error());
			  while($row = mysql_fetch_array($countAll))
				  {
			  $coinType = strip_tags($row['coinType']);
			  echo "[' ".$coinType." ', ".$collection->getNoGradeTypeCount($coinType, $userID)."],";
				  }
			?>
            ]);


            // Set chart options
            var options = {
						   slices: {0: {color: '#b39477'}, 1: {color: '#907760'}},
						   is3D: true,
						   sliceVisibilityThreshold:0,
                           'height':180};

            // Set chart options
            var options3 = {
                           slices: {0: {color: '#e4c6aa'}, 1: {color: '#b89b79'}, 2: {color: '#b89b79'},3: {color: '#5a5245'}, 4: {color: '#b39477'}, 5: {color: '#906656'}},
						   is3D: true,
                           'height':180};

						   
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

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
<h1><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinCategory ?> Not Graded Report (<?php echo $collection->getNoGradeCategoryCount($coinCategory, $userID); ?>)</h1>

<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="<?php echo $coinTypeLink ?>.php">Coins</a></td>
    <td width="13%" class="darker"><a href="<?php echo $coinCategoryPage ?>Rolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="<?php echo $coinCategoryPage ?>Folders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="<?php echo $coinCategoryPage ?>Grades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="<?php echo $coinCategoryPage ?>Error.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="<?php echo $coinCategoryPage ?>Bags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="<?php echo $coinCategoryPage ?>Boxes.php">Boxes</a></td>    
  </tr>
</table> 



<table width="100%" border="0">
  <tr>
    <td align="center" title="All Coins, Graded vs Not Graded"><strong>Ungraded Ratio</strong></td>

    <td align="center"><strong>Ungraded By Type <?php echo $ungradedTypeDisplay ?></strong></td>    
    </tr>
  <tr align="center" valign="top">
    <td width="50%"><div id="chart_div" class="miniGraphDiv"></div></td>
    <td width="50%"><div id="chart_div3" class="miniGraphDiv"></div></td>
    </tr>
</table>
<br />

<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="20%">Ungraded</td>
    <td width="20%">Certified</td>
    <td width="20%">Errors</td>
    <td width="20%">First Day</td>
    <td width="20%">Proofs</td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><a href="viewNoGradeReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getUngradedCountById($userID, $coinCategory); ?></a></td>
    <td><a href="viewCertCatReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getTypeCertificationCountById($userID, $coinCategory); ?></a></td>
    <td><?php echo $collection->getTypeErrorCountById($userID, $coinCategory); ?></td>
    <td><?php echo $collection->getTypeFirstDayCountById($userID, $coinCategory); ?></td>
    <td><a href="categoryProof.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $collection->getTypeProofCountById($userID, $coinCategory); ?></a></td>
    <td>&nbsp;</td>
  </tr>
</table>

<hr />

<h2>Coin List</h2>
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="55%" height="24">Year / Mint</td>  
    <td width="33%">Type</td>
    <td width="12%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".$coinCategory."' AND userID = '$userID' AND coinGrade = 'No Grade' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No Coins Ungraded</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	 
	<td>&nbsp;</td>	   
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coin-> getCoinById(intval($row['coinID']));  
  echo '
    <tr class="gryHover">
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'" class="brownLink">'.$coin->getCoinName().'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'.$coinType.'</a></td>	
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment(intval($row['coinID']), $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="55%" height="24">Year / Mint</td>  
    <td width="33%">Type</td>
    <td width="12%" align="right">Purchase</td>
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