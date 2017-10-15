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
$mintedYearNumber = $coin->getMintedYearsCount($coinType);
}
$i = 0;
foreach (range($coin->getTypeStartYear($coinType), $coin->getTypeEndYear($coinType)) as $mintedYears) {
$completeDate = percent($collection->getNumOfByMintCoinSavedThisYear($mintedYears, $coinType, $userID), $coin->getYearByMintCount($coinType, $mintedYears));	

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
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Complete'],
          ['<?php echo $coinType ?>',  <?php echo $mintedYearNumber; ?>, <?php echo $i; ?>]
        ]);

        var options = {
          title: 'Mint Mark Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'Minted Years', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<style type="text/css">
.byYearDiv {float:left; margin-right:5px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="40" height="40" align="absmiddle" /> <?php echo $coinType; ?> By Mint Mark Checklist</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />
<?php
echo '<h2>Complete Date Sets ('.$i.' of '.$mintedYearNumber.' '.percent($i, $mintedYearNumber).'%)</h2>';	
?>
<div id="chart_div" style="width:99%; height: 160px;"></div>



<table width="100%" border="0">
  <tr>
    <td align="center" title="All Coins, Graded vs Not Graded"><strong><a href="viewNoGradeReport.php?coinCategory=<?php echo $categoryLink ?>">Ungraded</a> Small Cents (<?php echo $collection->getNoGradeCategoryCount($coinCategory, $userID); ?>)</strong></td>
    <td align="center" title="All Graded Coins, Certified vs Raw"><strong>Graded &amp; Certified Small Cents (<?php echo $collection->getCategoryProGradeCount($coinCategory, $userID) ?>)</strong></td>
    <td align="center"><strong><a href="viewNoGradeReport.php?coinCategory=<?php echo $categoryLink ?>">Graded & Uncertified</a> By Type <?php echo $ungradedTypeDisplay ?></strong></td>    
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
foreach (range($coin->getTypeStartYear($coinType), $coin->getTypeEndYear($coinType)) as $mintedYears2) {
$completeDate2 = percent($collection->getNumOfByMintCoinSavedThisYear($mintedYears2, $coinType, $userID), $coin->getYearByMintCount($coinType, $mintedYears2));	

if( addYearNumbers($completeDate2) == 1){
	echo '<td><strong><a class="brownLink" href="viewCoinYear.php?coinType='.$coinCatLink.'&year='.$mintedYears2.'">'.$mintedYears2.'</a></strong></td>';
$tb = $tb + 1; //add 1 to $i
if ($tb == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$tb = 1; //reset $i
} //close the if
}//close the while loop
}
echo '' //close out the table
?>
</tr></table>



<hr />
<h3>By Year Mint Marks</h3>
<table width="100%" border="0" cellpadding="3">
<tr>
<?php
$i = 1;
foreach (range($coin->getTypeStartYear($coinType), $coin->getTypeEndYear($coinType)) as $mintedYears) {
echo '<td><strong><a class="brownLink" href="viewCoinYear.php?coinType='.$coinCatLink.'&year='.$mintedYears.'">'.$mintedYears.'</a></strong> '.$collection->getNumOfByMintCoinSavedThisYear($mintedYears, $coinType, $userID).' of '.$coin->getYearByMintCount($coinType, $mintedYears) .'</td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>


 
  


<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>