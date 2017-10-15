<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>First Day Report</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='State_Quarter', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='State_Quarter'); ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='District_of_Columbia_and_US_Territories', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='District_of_Columbia_and_US_Territories') ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='America_the_Beautiful_Quarter', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='America_the_Beautiful_Quarter') ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Westward_Journey', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='Westward_Journey') ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Sacagawea_Dollar', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='Sacagawea_Dollar') ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          [' ',  <?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Presidential_Dollar', $userID); ?>,  <?php echo $FirstDay->firstDayByCoinType($coinType='Presidential_Dollar') ?>]
        ]);				

        var options2 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
		  colors: ['#b39477', '#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };							

        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
		var chart3 = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);
		var chart4 = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
        chart4.draw(data4, options4);
		var chart5 = new google.visualization.ColumnChart(document.getElementById('chart_div5'));
        chart5.draw(data5, options5);	
		var chart6 = new google.visualization.ColumnChart(document.getElementById('chart_div6'));
        chart6.draw(data6, options6);	
		var chart7 = new google.visualization.ColumnChart(document.getElementById('chart_div7'));
        chart7.draw(data7, options7);						
}		  
    </script> 


<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#333; color:#FFF;}
#setList .setListRow a:hover{color:#FFF;}
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>My First Day Sets</h1>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="20%"><h3>Sets Collected</h3></td>
    <td width="18%" align="right"><?php echo $CollectionFirstday-> getFirstDayCountById($userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $CollectionFirstday->totalFirstDayInvestment($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $CollectionFirstday->getCertificationFirstDayCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr>

  <div>
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="5" align="left"><h2><strong>Certified Sets</strong></h2></td>
      </tr>
     <tr align="center">
       <td width="12%">&nbsp;</td>
       <td width="21%"><a href="viewFirstDayService.php?proService=PCGS"><strong>PCGS</strong></a></td>
       <td width="19%"><a href="viewFirstDayService.php?proService=ICG"><strong>ICG</strong></a></td>
       <td width="25%"><a href="viewFirstDayService.php?proService=NGC"><strong>NGC</strong></a></td>
       <td width="23%"><a href="viewFirstDayService.php?proService=ANACS"><strong>ANACS</strong></a></td>
      </tr>
     <tr align="center">
       <td align="left">Envelope</td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='PCGS', $firstdayType='Envelope', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='IGC', $firstdayType='Envelope', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='NGC', $firstdayType='Envelope', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='ANACS', $firstdayType='Envelope', $userID); ?></a></td>
      </tr>
     <tr align="center">
       <td align="left">Slabed Coins</td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='PCGS', $firstdayType='Coins', $userID); ?></a><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='ICG', $firstdayType='Coins', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='NGC', $firstdayType='Coins', $userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionFirstday->getFirstDaySetTypeProGrader($proService='ANACS', $firstdayType='Coins', $userID); ?></a></td>
     </tr>
     <tr align="center">
       <td>&nbsp;</td>
       <td><a href="viewFirstDayService.php?proService=PCGS"><?php echo $CollectionFirstday->getFirstDayProGrader('PCGS',$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=ICG"><?php echo $CollectionFirstday->getFirstDayProGrader('ICG',$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=NGC"><?php echo $CollectionFirstday->getFirstDayProGrader('NGC' ,$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=ANACS"><?php echo $CollectionFirstday->getFirstDayProGrader('ANACS',$userID); ?></a></td>
      </tr>
    </table>
   <hr class="clear"> 
<table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewFirstDayType.php?coinType=State_Quarter">Statehood </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewFirstDayType.php?coinType=District_of_Columbia_and_US_Territories">DC & Territories</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewFirstDayType.php?coinType=America_the_Beautiful_Quarter">America</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewFirstDayType.php?coinType=Westward_Journey">Westward </a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewFirstDayType.php?coinType=Sacagawea_Dollar">Sacagawea</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewFirstDayType.php?coinType=Presidential_Dollar">Presidential</strong></a></td>
  </tr>
  <tr>
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div3" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div4" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div5" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div6" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div7" style="width: 150px; height: 150px;"></div></td>
  </tr>
  <tr align="center">

  <td><?php echo $CollectionFirstday->firstDayTypeCollected($coinType='State_Quarter', $userID).' of '. $FirstDay->firstDayByCoinType($coinType='State_Quarter'); ?> (<?php echo percent( $CollectionFirstday->firstDayTypeCollected($coinType='State_Quarter', $userID), $FirstDay->firstDayByCoinType($coinType='State_Quarter')) ?>%)</td>
    
  <td><?php echo $CollectionFirstday->firstDayTypeCollected($coinType='District_of_Columbia_and_US_Territories', $userID).' of '. $FirstDay->firstDayByCoinType($coinType='District_of_Columbia_and_US_Territories'); ?> (<?php echo percent( $CollectionFirstday->firstDayTypeCollected($coinType='District_of_Columbia_and_US_Territories', $userID), $FirstDay->firstDayByCoinType($coinType='District_of_Columbia_and_US_Territories')) ?>%)</td>
    
  <td><?php echo $CollectionFirstday->firstDayTypeCollected($coinType='America_the_Beautiful_Quarter', $userID).' of '. $FirstDay->firstDayByCoinType($coinType='America_the_Beautiful_Quarter'); ?> (<?php echo percent( $CollectionFirstday->firstDayTypeCollected($coinType='America_the_Beautiful_Quarter', $userID), $FirstDay->firstDayByCoinType($coinType='America_the_Beautiful_Quarter')) ?>%)</td>
        
  <td><?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Westward_Journey', $userID).' of '. $FirstDay->firstDayByCoinType($coinType='Westward_Journey'); ?> (<?php echo percent( $CollectionFirstday->firstDayTypeCollected($coinType='Westward_Journey', $userID), $FirstDay->firstDayByCoinType($coinType='Westward_Journey')) ?>%)</td>
            
  <td><?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Sacagawea_Dollar', $userID).' of '. $FirstDay->firstDayByCoinType($coinType='Sacagawea_Dollar'); ?> (<?php echo percent( $CollectionFirstday->firstDayTypeCollected($coinType='Sacagawea_Dollar', $userID), $FirstDay->firstDayByCoinType($coinType='Sacagawea_Dollar')) ?>%)</td>
                
  <td><?php echo $CollectionFirstday->firstDayTypeCollected($coinType='Presidential_Dollar', $userID).' of '. $FirstDay->firstDayByCoinType($coinType='Presidential_Dollar'); ?> (<?php echo percent( $CollectionFirstday->firstDayTypeCollected($coinType='Presidential_Dollar', $userID), $FirstDay->firstDayByCoinType($coinType='Presidential_Dollar')) ?>%)</td>
  </tr>
</table>
<hr class="clear">
   <table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h2>Coin Set</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM firstday ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$firstdayID = $row['firstdayID'];
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewFirstDay.php?firstdayID=' . $firstdayID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionFirstday->getFirstDayCountByFirstDayId($firstdayID, $userID).'</td>
  </tr>';

	}
?>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>