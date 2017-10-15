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
<title>Mintset Report</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
		
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	
		//Chart 2
		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Mint',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Mint', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='Mint'); ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Proof',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Proof', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='Proof'); ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Silver Proof',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Silver Proof', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='Silver Proof'); ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Special Mint',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Special Mint', $userID); ?>, <?php echo $Mintset->getSetCountByType($setType='Special Mint'); ?>]
        ]);			
		var data6 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Commemorative',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Commemorative', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='Commemorative'); ?>]
        ]);	
		var data7 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['American Eagle',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='American Eagle', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='American Eagle'); ?>]
        ]);				

        var options2 = {
          title: 'Mint',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Proof',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Silver',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Special Mint',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options6 = {
          title: 'Commemorative',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options7 = {
          title: 'Bullion',
		  colors: ['#b39477','#814d37'],
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
<script type="text/javascript">
$(document).ready(function(){	

$('tr').hover(function() {
    $(this).find('a').css('color', '#ffffff');
});
$('tr').mouseout(function() {
    $(this).find('a').css('color', '#000000');
});​
  
});	  
</script>

<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#333; color:#FFF;}
#setList .setListRow a:hover{color:#FFF;}
.
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1> Coin Set History</h1>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3> Sets Collected</h3></td>
    <td align="right"><?php echo $CollectionSet->getMintsetCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="28%"><h3>Unique Sets Collected</h3></td>
    <td width="10%" align="right"><?php echo $CollectionSet->getMintsetUniqueCountById($userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $CollectionSet->totalAllMintsetsInvestment($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $CollectionSet->getMintsetCertifiedCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr>
<hr>

  <div>
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h3><strong>Certified Sets</strong></h3></td>
      </tr>
     <tr align="center">
       <td width="11%"><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><strong>ANACS</strong></a></td>
      </tr>
     <tr align="center">
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionSet->getSetProGrader('PCGS',$userID); ?></a></td>
       <td><?php echo $CollectionSet->getSetProGrader('ICG',$userID); ?></td>
       <td><?php echo $CollectionSet->getSetProGrader('NGC' ,$userID); ?></td>
       <td><?php echo $CollectionSet->getSetProGrader('ANACS',$userID); ?></td>
      </tr>
   </table>
   <hr class="clear"> 

   <table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h3>Coin Set</h3></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM collectset ORDER BY collectsetID DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$collectsetID = intval($row['collectsetID']);
		$thisMintsetID = intval($row['mintsetID']);
		$Mintset->getMintsetById($thisMintsetID);
		
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewSet.php?mintsetID=' . $thisMintsetID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID($thisMintsetID, $userID).'</td>
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