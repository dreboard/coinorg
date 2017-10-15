<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['setType'])) { 
$setType = str_replace('_', ' ', strip_tags($_GET["setType"]));
$setLink = strip_tags($_GET["setType"]);
}
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
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Minted', 'Collected'],
          ['<?php echo $setType ?>',  <?php echo $Mintset->getSetCountByType($setType); ?>, <?php echo $CollectionSet->getSetCountByTypeByUserID($setType, $userID); ?>]
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
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#333; color:#FFF;}
#setList .setListRow a:hover{color:#FFF;}

table h3 {margin:0px; padding:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><?php echo $setType ?> Sets List</h1>
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
    <td width="10%" align="right"><?php echo $CollectionSet->getUniqueSetTypeCountById($setType,$userID); ?></td>
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
<br>
<?php if($setType == 'Proof'){  ?>
<table width="100%" border="0">
  <tr class="darker">
    <td width="17%"><a href="proof.php">View Proof Report</a></td>
    <td width="79%"><a href="viewSetsList.php?setType=Proof">Proof Set List</a></td>
    <td width="4%">&nbsp;</td>
  </tr>
</table>
<br />
<?php } ?>

  <div>
    <hr class="clear"> 



   <table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h3>Coin Set</h3></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$sql = mysql_query("SELECT * FROM mintset WHERE setType = '$setType' ORDER BY coinYear DESC") or die(mysql_error()); 
		while($row = mysql_fetch_array($sql)){
		$thisMintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewSet.php?ID=' . $thisMintsetID . '">' . $setName . '</a></td>
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