<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['design'])) { 
$design = str_replace('_', ' ', $_GET['design']);
$designLink = strip_tags($_GET['design']);
$designURL = str_replace(' ', '', $_GET['design']);
$designQuery = str_replace('_', ' ', $_GET['design']);

$byMintCount = $CoinDesign->getDesignNoProGradeCount($design, $userID);
 $totalByTypeCount = $CoinDesign->getCoinCountDesign($designURL);
 $uniqueCount = $CoinDesign->getDesignProGradeCount($designURL, $userID);
 $typePercent = percent($uniqueCount, $byMintCount);
 $typeAllPercent = percent($uniqueCount, $totalByTypeCount);  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $designQuery ?> Collection</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Graded', 'Certified'],
          ['<?php echo $design ?>',  <?php echo $CoinDesign->getDesignNoProGradeCount($design, $userID); ?>, <?php echo $CoinDesign->getDesignProGradeCount($design, $userID) ?>]
        ]);

        var options = {
          title: 'Collection Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All Coins', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $designLink ?>.jpg" width="40" height="40" align="absmiddle" /> My <?php echo $designQuery; ?> Certified Coins</h1>

<table width="100%" id="reportListLinks" class="clear">
  <tr>
  <td width="14%" class="darker"><a href="reportDesign.php?design=<?php echo $designLink ?>">Report</a></td>
     <td width="14%" class="darker"><a href="reportDesignCoins.php?design=<?php echo $designLink ?>">Coins</a></td>
    <td width="13%" class="darker"><a href="reportDesignYear.php?design=<?php echo $designLink ?>&setYear=<?php echo $CoinDesign->getDesignStartYear($design) ?>">Year Sets</a></td> 
    <td width="20%" class="darker"> <a href="reportDesignGrade.php?design=<?php echo $designLink ?>">Grade Report</a></td>
    <td width="14%" class="darker">
      <select name="designSel" id="designSel2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        >
        <option value="" selected="selected">Switch Design</option>
        <option value="viewDesignList.php?design=Barber">Barber Coins</option>
        <option value="viewDesignList.php?design=Seated_Liberty">Seated Liberty Coins</option>
        <option value="viewDesignList.php?design=Flowing_Hair">Flowing Hair Coins</option>
        <option value="viewDesignList.php?design=Draped_Bust">Draped Bust Coins</option>
        <option value="viewDesignList.php?design=Liberty_Cap">Liberty Cap Coins</option>
      </select>
    </td>
 
  </tr>
</table>
  <table width="100%" border="0" id="listTbl" class="clear">
  <tr valign="top" class="darker">
    <td width="180" align="center"><h3><a href="viewDesignFolder.php?design=<?php echo $designLink ?>&page=1"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td width="179" align="center"><h3><a href="viewDesignErrors.php?design=<?php echo $designLink ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /> Errors</a></h3></td>
    <td width="173" align="center"><h3><a href="viewDesignList.php?design=<?php echo $designLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td width="243" align="center"><h3><a href="viewDesignCertList.php?design=<?php echo $designLink ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only</a></h3></td>

    <td width="203" align="center"><h3><br />
    </h3></td>
  </tr>
  </table>
<h3>Graded and Certified <?php echo $uniqueCount  ?> of <?php echo $byMintCount ?> (<?php echo $typePercent ?>%)</h3>
<div id="chart_div" style="width:99%; height: 160px;"></div>
<table width="100%" border="0" class="coinTbl" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="74%">Year / Mint</td>  
    <td width="13%" align="center">Collected</td>
    <td width="13%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE design = '$designQuery' AND userID = '$userID' AND proService != 'None' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No certified '.$designQuery.' in collection</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="right">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
	  }
?>
</tbody>
    
<tfoot class="darker">
  <tr>
    <td width="74%">Year / Mint</td>  
    <td width="13%" align="center">Collected</td>
    <td width="13%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>