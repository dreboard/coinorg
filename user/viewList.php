<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinCatLink = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());

while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubCategory = $row['coinSubCategory'];
  }
$coinMetal = $coin->getMetalByType($coinType);
switch ($coinMetal)
{
case 'Gold':
  $byMintCount = $Bullion->getGoldTypeMintCount($coinType);
  break;
case 'Platinum':
  $byMintCount = $Bullion->getPlatinumTypeMintCount($coinType);
  break;  
default:
  $byMintCount = $coin->getCoinByTypeByMint($coinType);
}
 $totalByTypeCount = $coin->getCoinCountType($coinType);
 $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
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
<title>My <?php echo $coinType; ?> Checklist</title>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['<?php echo $coinType ?>',  <?php echo $byMintCount; ?>, <?php echo $uniqueCount; ?>]
        ]);

        var options = {
          title: 'Collection Progress',
		  colors: ['#814d37', '#b39477'],
          vAxis: {title: 'All Coins', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	  
	  $(document).ready(function(){	

$("#yearSwitchForm").submit(function() {
	 $('#yearSwitchBtn').val("Loading...");	  
});

});
    </script>
<style type="text/css">
#listTbl tr:hover{background-color:#333; color:#ccc;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="40" height="40" align="absmiddle" /> My <?php echo $coinType; ?> Checklist</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<br />

<h3>Type Collection Progress <?php echo $uniqueCount  ?> of <?php echo $byMintCount ?> (<?php echo $typePercent ?>%)</h3>
<div id="chart_div" style="width:99%; height: 160px;"></div>
<table width="958" class="clear">
  <tr class="darker">
    <td width="352">Year/Mint</td>
    <td width="210">In Collection</td>
</tr>
<?php 
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinYear ASC") or die(mysql_error());

while($row = mysql_fetch_array($countAll))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
  $mintage = $row['mintage'];
  $coinID = $row['coinID'];

  $coinTypeLink = str_replace(' ', '_', $coinType);
    if($collection->checkCollection($coinID, $userID) == 0){
	  $have = 'No, <a href="addCoinByID.php?coinID='.$coinID.'" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = '<img src="../img/'.$coinTypeLink.'.jpg"  title="'.$name.' in collection" class="coinIcon" /> (0) <a href="addCoinByID.php?coinID='.$coinID.'" class="addCoinLink" title="'.$name.' in collection">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID='.$coinID.'">Prepare for Auction</a>';
  }
  echo "
    <tr class='gryHover'>
    <td><a href='viewCoin.php?coinID=$coinID'  title='".$name."' View'>$name</a></td>
    <td>".$have."</td>
  </tr>
  ";
}   

?>
</table>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>