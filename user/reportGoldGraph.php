<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>U.S. Gold Collection Progress Report</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['Gold Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Gold_Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Gold_Dollar'); ?>],
          ['Quarter Eagle',  <?php echo $Bullion->getTotalByMintCountByCategory('Quarter_Eagle') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Quarter_Eagle'); ?>],
          ['Three Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Three_Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Three_Dollar'); ?>],
          ['Four Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Four_Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Four_Dollar'); ?>],
		  ['Five Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Five_Dollar') ?>,  <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Five_Dollar'); ?>],
		  ['Ten Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Ten_Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Ten_Dollar'); ?>],
          ['Twenty Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Twenty_Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Twenty_Dollar'); ?>],
          ['Twenty Five Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Twenty_Five_Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Twenty_Five_Dollar'); ?>],
          ['Fifty Dollar',  <?php echo $Bullion->getTotalByMintCountByCategory('Fifty_Dollar') ?>, <?php echo $collection->getByMintCountByCategoryByMint($userID, 'Fifty_Dollar'); ?>]
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
h1 {margin-bottom:0px;}
#chart_div {margin:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/Gold_Mixed.jpg" width="100" height="100" align="middle"> U.S. Gold Collection Progress</h1>
 <?php include("../inc/pageElements/dashboardGoldTbl.php"); ?>

 <table width="100%" border="0">
   <tr>
      <td class="smallTxt">&nbsp;</td>
      <td align="right">&nbsp;</td>
     <td width="692" rowspan="14" align="right" valign="top">
       <div id="chart_div" style="width:100%; height: 450px;"></div>
     </td>
   </tr>
   <tr>
     <td colspan="2" class="smallTxt"><strong>Type Collection Progress</strong></td>
    </tr>
   <tr>
    <td width="126"><strong><a class="brownLink" href="Gold_Dollar.php">One Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Gold_Dollar'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Gold_Dollar'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Gold_Dollar'), $Bullion->getTotalByMintCountByCategory($coinCategory='Gold_Dollar')); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Quarter_Eagle.php">Quarter Eagle</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Quarter_Eagle'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Quarter_Eagle'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Quarter_Eagle'), $Bullion->getTotalByMintCountByCategory($coinCategory='Quarter_Eagle')); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Three_Dollar.php">Three Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Three_Dollar'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Three_Dollar'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Three_Dollar'), $Bullion->getTotalByMintCountByCategory($coinCategory='Three_Dollar')); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Four_Dollar.php">Four Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Four_Dollar'); ?> of 4 (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Four_Dollar'), 4); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Five_Dollar.php">Five Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Five_Dollar'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Five_Dollar'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Five_Dollar'), $Bullion->getTotalByMintCountByCategory($coinCategory='Five_Dollar')); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Ten_Dollar.php">Ten Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Ten_Dollar'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Ten_Dollar'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Ten_Dollar'), $Bullion->getTotalByMintCountByCategory($coinCategory='Ten_Dollar')); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Twenty_Dollar.php">Twenty Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Twenty_Dollar'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Twenty_Dollar'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Twenty_Dollar'), $Bullion->getTotalByMintCountByCategory($coinCategory='Twenty_Dollar')); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Twenty_Five_Dollar.php">Twenty Five</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Twenty_Five_Dollar'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Twenty_Five_Dollar'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Twenty_Five_Dollar'), $Bullion->getTotalByMintCountByCategory($coinCategory='Twenty_Five_Dollar')); ?>%)</td>
   </tr>
  <tr>
    <td width="126"><strong><a class="brownLink" href="Fifty_Dollar.php">Fifty Dollar</a></strong></td>
    <td width="168" align="right"><?php echo $Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Fifty_Dollar'); ?> of <?php echo $Bullion->getTotalByMintCountByCategory($coinCategory='Fifty_Dollar'); ?> (<?php echo percent($Bullion->getByMintCountByCategoryByMint($userID, $coinCategory='Fifty_Dollar'), $Bullion->getTotalByMintCountByCategory($coinCategory='Fifty_Dollar')); ?>%)</td>
   </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="168" align="right">&nbsp;</td>
   </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="168" align="right">&nbsp;</td>
   </tr>
  <tr>
    <td width="126" valign="top">&nbsp;</td>
    <td width="168" align="right" valign="top">&nbsp;</td>
   </tr>
 </table>

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>