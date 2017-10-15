<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

function addYearNumbers($val){
	if(intval($val) === 100){ 
    $num = 1;
	} else {
		$num = 0;
	}
	return $num;
}

if (isset($_GET["coinType"])) { 
$coinCatLink = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
//$mintedYearNumber = $coin->getMintedYearsCount($coinType);

$coinCategory = $coin->getCategoryByType($coinType);
$coinMetal = $coin->getMetalByType($coinType);
$CoinTypes->getCoinByType($coinType);
$getDates = htmlentities($CoinTypes->getDates());
$mintedYearNumber = $collection->dateSetNums($coinType, $userID);
$byMintCount = $coin->getCoinByTypeByMint($coinType);
/*switch ($coinMetal)
{
case 'Gold':
  $byMintCount = $Bullion->getGoldTypeMintCount($coinType);
  break;
case 'Platinum':
  $byMintCount = $Bullion->getPlatinumTypeMintCount($coinType);
  break;  
default:
  
}*/
}
$i = 0;
foreach (range($coin->getTypeStartYear($coinType), $coin->getTypeEndYear($coinType)) as $mintedYears) {
$completeDate = $General->percent($collection->getNumOfByMintCoinSavedThisYear($mintedYears, $coinType, $userID), $coin->getYearByMintCount($coinType, $mintedYears));	

$i = $i + addYearNumbers($completeDate); 

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>By Mint Mark Checklist</title>
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
		var data = google.visualization.arrayToDataTable([
          ['Year', 'Minted', 'Complete'],
          ['By Year',  <?php echo $mintedYearNumber; ?>, <?php echo $i; ?>]
        ]);			
            // Create the data table.
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Minted', 'Collected'],
          ['By Year',  <?php echo $collection->dateSetNums(str_replace('_', ' ', strip_tags($_GET["coinType"]))) ?>,  <?php echo $collection->dateSetCollectedNums(str_replace('_', ' ', strip_tags($_GET["coinType"])), $userID); ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Minted', 'Collected'],
          ['By Year',  <?php echo $byMintCount; ?>, <?php echo $collection->getCollectionUniqueCountByType($userID, str_replace('_', ' ', strip_tags($_GET["coinType"]))); ?>]
        ]);

            // Set chart options
        var options = {
          title: 'By Mint Mark',
		  colors: ['#814d37','#b39477'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
            // Set chart options
        var options2 = {
          title: 'By Date',
		  colors: ['#814d37','#b39477'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
            // Set chart options
        var options3 = {
          title: 'By Mint',
		  colors: ['#814d37','#b39477'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };

						   
            // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
        var chart3 = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);

	  }
        </script>
<style type="text/css">
.byYearDiv {float:left; margin-right:5px;}
#content {overflow:hidden;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="40" height="40" align="absmiddle" /> <?php echo $coinType; ?> By Mint Mark Checklist</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

<h2>Complete Sets</h2>

<table width="100%" border="0">
  <tr>
    <td align="center" title="All Coins, Graded vs Not Graded"><strong>Mint Mark Progress <?php echo $i.' of '.$mintedYearNumber.' ('.$General->percent($i, $mintedYearNumber).'%)';	 ?></strong></td>
    <td align="center" title="All Graded Coins, Certified vs Raw"><strong> Date Set Progress <?php echo $collection->dateSetCollectedNums(str_replace('_', ' ', strip_tags($_GET["coinType"])), $userID); ?> of <?php echo $collection->dateSetNums(str_replace('_', ' ', strip_tags($_GET["coinType"]))) ?> (<?php echo percent($collection->dateSetCollectedNums(str_replace('_', ' ', strip_tags($_GET["coinType"])), $userID),  $collection->dateSetNums(str_replace('_', ' ', strip_tags($_GET["coinType"])))) ?>%)</strong></td>
    <td align="center"><strong>By Mint Complete Progress </strong></td>    
    </tr>
  <tr align="center" valign="top">
    <td width="33%"><div id="chart_div" class="miniGraphDiv"></div></td>
    <td width="33%"><div id="chart_div2" class="miniGraphDiv"></div></td>
    <td width="33%"><div id="chart_div3" class="miniGraphDiv"></div></td>
    </tr>
</table>



<hr />
<h3>Completed Mint Mark Sets</h3>


<table width="100%" border="0" cellpadding="3">
<tr>
<?php
$tb = 1;
$y = 0;
foreach (range($coin->getTypeStartYear(str_replace('_', ' ', strip_tags($_GET["coinType"]))), $coin->getTypeEndYear(str_replace('_', ' ', strip_tags($_GET["coinType"])))) as $mintedYears2) {
$completeDate2 = $General->percent($collection->getNumOfByMintCoinSavedThisYear($mintedYears2, str_replace('_', ' ', strip_tags($_GET["coinType"])), $userID), $coin->getYearDistinctMintMarkCount(str_replace('_', ' ', strip_tags($_GET["coinType"])), $mintedYears2));	

if( addYearNumbers($completeDate2) == 1){
	echo '<td><strong><a class="brownLink" href="viewCoinYear.php?coinType='.$coinCatLink.'&year='.$mintedYears2.'">'.$mintedYears2.'</a></strong></td>';
$tb = $tb + 1; //add 1 to $i
if ($tb == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$tb = 1; //reset $i
} //close the if
}//close the while loop
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>

<hr />
<h3>By Year Mint Marks</h3>
<table width="98%" border="0" cellpadding="3" class="autoCoinTbl">
<tr>
<?php 
$i = 1;
$imgURL = $CoinTypes->getMintedYearList($getDates);
$delimiter=",";
$itemList = array();
$itemList = explode($delimiter, $imgURL);
/*foreach($itemList as $item){*/
	

$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '".str_replace('_', ' ', strip_tags($_GET["coinType"]))."' ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
	
echo '<td><strong><a class="brownLink" href="viewCoinYear.php?coinType='.str_replace(' ', '_', $coinType).'&year='.intval($row["coinYear"]).'">'.intval($row["coinYear"]).'</a></strong> '.$collection->getNumOfByMintCoinSavedThisYear(intval($row["coinYear"]), str_replace('_', ' ', strip_tags($_GET["coinType"])), $userID).' of '.$coin->getYearDistinctMintMarkCount(str_replace('_', ' ', strip_tags($_GET["coinType"])), intval($row["coinYear"])) .'</td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>

<p>&nbsp;</p>
<br />

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>