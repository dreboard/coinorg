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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?>Grade Report</title>
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
            data.addColumn('string', 'Graded Percentage');    
            data.addColumn('number', 'Slices');
            data.addRows([
              ['Ungraded', <?php echo $Grade->getNoGradeCoinIDCount($coinID, $userID); ?>],
              ['Graded',  <?php echo $Grade->getGradedCoinIDCount($coinID, $userID); ?>]
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
<style type="text/css">
#gradeTblDiv {overflow-x:hidden !important;}
.floatDivs {float:left;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
  <h2><img src="../img/<?php echo $coinLink; ?>.jpg" alt="Obverse and reverse" name="obvRev2" width="50" height="50" align="absmiddle" title="<?php echo $coinType; ?>" /> <?php echo $coinName; ?> </h2>
  
    <h3> <a class="brownLink" href="viewCoinTypeYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>&coinType=<?php echo $coinLink ?>"><?php echo substr($coin->getCoinName(), 0, 4); ?></a> | <a class="brownLink" href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> | <a class="brownLink" href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1"><?php echo $coinType ?></a></h3>
    
<table width="26%" border="0" class="floatDivs">  
  <tr>
    <td>Total Collected</td>
    <td><?php echo $count ?></td>
  </tr>
  <tr>
    <td>Total Graded</td>
    <td><?php echo $Grade->getGradedCoinIDCount($coinID, $userID); ?></td>
    </tr>
  <tr>
    <td width="55%"><a href="viewNoGradeCoin.php?coinID=<?php echo $coinID ?>">Total Ungraded</a></td>
    <td width="45%"><a href="viewNoGradeCoin.php?coinID=<?php echo $coinID ?>"><?php echo $Grade->getNoGradeCoinIDCount($coinID, $userID); ?></a></td>
    </tr>
  <tr>
    <td><a href="viewCertCoin.php?coinID=<?php echo $coinID ?>">Total Certified</a></td>
    <td><?php echo $Grade->getCoinIDProGradeCount($coinID, $userID); ?></td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
<?php
        $sql = mysql_query("SELECT * FROM collection WHERE coinID = '".intval($_GET['coinID'])."'") or die(mysql_error()); 
      if(mysql_num_rows($sql) == 0){
		  echo '';
	  } else {?>
<div id="chart_div" style="height:190px;" class="miniGraphDiv floatDivs"></div>
<?php } ?>
<hr class="clear" />

  <?php include ("../inc/pageElements/coinLinks.php");?>
<hr />

  <table width="100%" border="0">
    <tr align="center">
      <td colspan="2" align="left"><h3>Grading Services</h3></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td width="11%"><a href="viewCoinService.php?proService=PCGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>PCGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICG&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>ICG</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NGC&amp;ID=<?php echo $Encryption->encode($coinID) ?>"><strong>NGC</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ANACS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>ANACS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=SEGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>SEGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=PCI&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>PCI</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICCS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>ICCS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=HALLMARK&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>HALLMARK</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NTC&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>NTC</strong></a></td>
    </tr>
    <tr align="center">
      <td><a href="viewCoinService.php?proService=PCGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('PCGS', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICG&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('ICG', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NGC&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('NGC', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ANACS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('ANACS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=SEGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('SEGS', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=PCI&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('PCI', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICCS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('ICCS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=HALLMARK&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('HALLMARK', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NTC&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('NTC',$coinID ,$userID); ?></a></td>
    </tr>
  </table>
<hr />


<div id="gradeTblDiv">
<?php include("../inc/coinGrade/".$coin->getCoinStrike().".php"); ?>
</div>

  <p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>