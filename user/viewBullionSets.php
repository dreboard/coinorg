<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


$setTypes = array('American Eagle','Platinum');

$coinMetals = array('Gold','Platinum');

	$sql11 = mysql_query( "SELECT DISTINCT setType FROM mintset WHERE coinMetal IN('".implode("', '", $coinMetals)."')");
	$centuryCount = mysql_num_rows($sql11);  

$sql2 = mysql_query( "SELECT * FROM mintset WHERE coinMetal IN('".implode("', '", $coinMetals)."')");
$bullionCount = mysql_num_rows($sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Bullion Sets</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
       		var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Mint',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='American_Buffalo', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='American_Buffalo'); ?>]
        ]);
		var data3 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Gold Eagle',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='American Eagle', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='American Eagle'); ?>]
        ]);		
		var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Platinum Eagle',  <?php echo $CollectionSet->getAmEagleSetCountByTypeByUserID($setType='Platinum American Eagle', $coinMetal='Platinum', $userID); ?>,  <?php echo $Mintset->getSetCountByType($setType='Platinum American Eagle'); ?>]
        ]);	
		var data5 = google.visualization.arrayToDataTable([
          ['Year', 'Collected', 'Minted'],
          ['Special Mint',  <?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Special Mint', $userID); ?>, <?php echo $Mintset->getSetCountByType($setType='Special Mint'); ?>]
        ]);			
		

        var options2 = {
          title: 'Buffalo',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };
        var options3 = {
          title: 'Gold',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };		
        var options4 = {
          title: 'Platinum',
		  colors: ['#b39477','#814d37'],
          hAxis: {title: 'Progress', titleTextStyle: {color: 'black'}}
        };	
        var options5 = {
          title: 'Special Mint',
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
	  }
    </script>
<style type="text/css">
#chartsDiv div {margin:0px auto;}
table h3 {margin:0px; padding:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>My Bullion Sets</h1>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td><h3> Sets Collected</h3></td>
    <td align="right"><?php echo $CollectionSet->getSetTypeCountByID($setType, $userID); ?></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Set Type</option>
        <option value="viewSets.php?setType=Mint">Mint</option>
        <option value="viewSets.php?setType=Proof">Proof</option>
        <option value="viewSets.php?setType=Silver_Proof">Silver_Proof</option>
                <option value="viewSets.php?setType=Special_Mint">Special_Mint</option>

        <option value="viewSets.php?setType=Commemorative">Commemorative</option>
        <option value="viewSets.php?setType=American_Eagle">American Eagle</option>
        <option value="viewSets.php?setType=Platinum_American_Eagle">Platinum</option>        
<option value="viewBullionSets.php">All Bullion Sets</option>
    </select>
    
    </td>
  </tr>
  <tr>
    <td width="25%"><h3>Unique Sets Collected</h3></td>
    <td width="13%" align="right"><?php echo $CollectionSet->getMintsetUniqueCountById($userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $CollectionSet->getSetTypeSumByID($userID, $setType); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $CollectionSet->getMintsetCertifiedCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr>

<table width="100%" border="0" class="autoCoinTbl">
  <tr>
    <td align="center"><strong><a class="brownLink" href="viewSets.php?setType=American_Buffalo">American Buffalo</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewSets.php?setType=American_Eagle">Gold Eagle</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewSets.php?setType=Platinum_American_Eagle">Platinum Eagle</a></strong></td>
    <td align="center"><strong><a class="brownLink" href="viewSets.php?setType=Commemorative">Gold Commemorative</a><a class="brownLink" href="viewSets.php?setType=Special_Mint"></a></strong></td>
    </tr>
  <tr id="chartsDiv">
    <td align="center"><div id="chart_div2" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div3" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div4" style="width: 150px; height: 150px;"></div></td>
    <td align="center"><div id="chart_div5" style="width: 150px; height: 150px;"></div></td>
    </tr>
  <tr align="center">
    <td><?php echo $CollectionSet->getSetCountByTypeByUserID($setType='American_Buffalo', $userID); ?> (<?php echo percent($CollectionSet->getSetCountByTypeByUserID($setType='American_Buffalo', $userID), $Mintset->getSetCountByType($setType)) ?>%)</td>
    
    <td><?php echo $CollectionSet->getSetCountByTypeByUserID($setType='American_Eagle', $userID); ?> (<?php echo percent($CollectionSet->getSetCountByTypeByUserID($setType='American_Eagle', $userID), $Mintset->getSetCountByType($setType)) ?>%)</td>
    
    <td><?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Platinum_American_Eagle', $userID); ?> (<?php echo percent($CollectionSet->getSetCountByTypeByUserID($setType='Platinum_American_Eagle', $userID), $Mintset->getSetCountByType($setType)) ?>%)</td>
        
    <td><?php echo $CollectionSet->getSetCountByTypeByUserID($setType='Special Mint', $userID); ?> (<?php echo percent($CollectionSet->getSetCountByTypeByUserID($setType='Special Mint', $userID), $Mintset->getSetCountByType($setType)) ?>%)</td>
    </tr>
</table>
<hr>

  <div>
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h3>Certified Sets</h3></td>
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
$sql11 = mysql_query( "SELECT * FROM mintset WHERE coinMetal IN('".implode("', '", $coinMetals)."')");
	$centuryCount = mysql_num_rows($sql11);  
	
	while($row = mysql_fetch_array($sql11)){
		$thisMintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<tr class="gryHover">
    <td><a href="viewSet.php?mintsetID=' . $thisMintsetID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID($thisMintsetID, $userID).'</td>
  </tr>';

	}
?>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
'
</body>
</html>