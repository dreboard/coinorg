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
<style type="text/css"></style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
  <h1><?php echo $coinName; ?> Certified Coins</h1>
  
    <h3> <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>"><?php echo substr($coin->getCoinName(), 0, 4); ?></a> | <a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> | <a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1"><?php echo $coinType ?></a></h3>
    
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="20%" rowspan="4" valign="top"><img src="../img/<?php echo $coinVersion ?>.jpg" width="150" height="150" /></td>
    <td>Total Collected</td>
    <td><?php echo $count ?></td>
    <td width="47%" rowspan="5" valign="top">
    <div id="chart_div" style="height:250px;" class="miniGraphDiv"></div>
    </td>
  </tr>
  <tr>
    <td>Total Graded</td>
    <td><?php echo $collection->getGradedCoinIDCount($coinID, $userID); ?></td>
    </tr>
  <tr>
    <td width="20%"><a href="viewNoGradeCoin.php?coinID=<?php echo $coinID ?>">Total Ungraded</a></td>
    <td width="13%"><a href="viewNoGradeCoin.php?coinID=<?php echo $coinID ?>"><?php echo $collection->getNoGradeCoinIDCount($coinID, $userID); ?></a></td>
    </tr>
  <tr>
    <td valign="top"><a href="viewCertCoin.php?coinID=<?php echo $coinID ?>">Total Certified</a></td>
    <td valign="top"><?php echo $collection->getCoinIDProGradeCount($coinID, $userID); ?></td>
    </tr>
</table>

  <table width="100%" border="0">
    <tr align="center">
      <td width="20%" align="left"><img src="../img/coinIcon.jpg" width="21" height="20" align="absmiddle" /> <a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><strong>Main Report</strong></a></td>
    <td width="20%" align="left"><img src="../img/grades.jpg" alt="graded" width="25" height="25" align="absmiddle" />
      <a href="viewNoGradeCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><strong>No Grade Report</strong></a></td>
    <td width="20%" align="left"><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /> <a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><strong><span class="brownLink">Financial Report</span></strong></a></td>
    <td width="20%" align="left"><img src="../img/timeIcon.jpg" width="25" height="25" align="absmiddle" /> <a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><strong>Collection History</strong></a></td>
    <td width="20%" align="left">&nbsp;</td>
  </tr>
  </table>
  <table width="100%" border="0" id="coinServiceTbl">
    <tr align="center">
      <td colspan="2" align="left"><h3><strong>Grading Services</strong></h3></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td width="11%"><a href="viewCoinService.php?proService=PCGS&amp;coinID=<?php echo $coinID; ?>"><strong>PCGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICG&amp;coinID=<?php echo $coinID; ?>"><strong>ICG</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NGC&amp;coinID=<?php echo $coinID; ?>"><strong>NGC</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ANACS&amp;coinID=<?php echo $coinID; ?>"><strong>ANACS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=SEGS&amp;coinID=<?php echo $coinID; ?>"><strong>SEGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=PCI&amp;coinID=<?php echo $coinID; ?>"><strong>PCI</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICCS&amp;coinID=<?php echo $coinID; ?>"><strong>ICCS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=HALLMARK&amp;coinID=<?php echo $coinID; ?>"><strong>HALLMARK</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NTC&amp;coinID=<?php echo $coinID; ?>"><strong>NTC</strong></a></td>
    </tr>
    <tr align="center">
      <td><a href="viewCoinService.php?proService=PCGS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('PCGS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICG&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('ICG', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NGC&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('NGC', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ANACS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('ANACS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=SEGS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('SEGS', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=PCI&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('PCI', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICCS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('ICCS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=HALLMARK&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('HALLMARK', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NTC&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('NTC',$coinID ,$userID); ?></a></td>
    </tr>
  </table>
  <hr />
<table width="100%" border="0" id="clientTbl">
<thead>
  <tr class="darker">
    <td width="57%"><strong>Year / Mint</strong></td>
    <td width="11%" align="center"><strong>Grade</strong></td>  
    <td width="14%" align="center"><strong>Service</strong></td>
    <td width="18%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$sql = mysql_query("
SELECT * 
FROM collection
WHERE proService !=  'None'
AND coinID =  '".$coinID."'
AND userID =  '".$userID."'
") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td width="57%"><strong>No '.$coinName.' Certified Coins</strong></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($sql))
	  {

  $collectionIDNum = strip_tags($row['collectionID']);
  $collection->getCollectionById($collectionIDNum);  
  
  $coinID = intval($row['coinID']);
  $coinGrade = $collection->getCoinGrade();
  $coinID = $collection-> getCoinID($coinID);  
  
  $coinName = $coin->getCoinName(); 
  $collectedCoinName = $coin->getCoinName();
  
  $collectfolderID = $collection->getCollectionFolder();
  $collectionFolder->getCollectionFolderById($collectfolderID);
  $collectrollsID = $collection->getCollectionRoll();
  
  $collectsetID = $collection->getCollectionSet();
  
  $proService = $collection->getGrader();
if($collectfolderID == '0' && $collectrollsID == '0' && $proService == 'None' && $collectsetID == '0') {
    $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;';
}
else if($proService != 'None') {
    $coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
}
else if($collectfolderID != '0') {
    $coinIcon = '<a href="viewFolderCoinsList.php?collectfolderID='.$collectfolderID.'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
}
else if($collectrollsID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" />';
}
else if($collectsetID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" />';
}
else { //Or else if($value == 'BB') if you might add more at some point
   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
}
  
//$collection->getCollectionFolder()
//$collection->getCollectionRoll()
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?collectionID='.$collectionIDNum.'">'.$collectedCoinName.'</a></td>
	<td><a href="viewCoinByGrade.php?coinGrade='. $collection->getCoinGrade() .'&coinID='.$coinID.'">'. $collection->getCoinGrade() .'</td>
		<td><a href="viewCoinService.php?proService='.$proService.'&amp;coinID='.$coinID.'">'.$collection->getGrader() .'</a></td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot>
  <tr class="darker">
    <td><strong>Year / Mint</strong></td>
    <td align="center"><strong>Grade</strong></td>  
    <td width="14%" align="center"><strong>Service</strong></td>
    <td width="18%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>


  <p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>