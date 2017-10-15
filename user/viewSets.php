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


table h3 {margin:0px; padding:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mintset.jpg" width="100" height="100" align="absmiddle"> My <?php echo $setType ?> Sets</h1>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td><a href="mintsetListType.php?setType=<?php echo strip_tags($_GET["setType"]); ?>" class="brownLinkBold">View Set Release List</a></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
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
    <td width="16%"><a href="proof.php"> Proof Report</a></td>
    <td width="15%"><a href="viewSetsList.php?setType=Proof">Proof Set List</a></td>
    <td width="69%"><a href="proofCoins.php">Proof Coins</a></td>
  </tr>
</table>
<br />
<?php } elseif($setType== 'Commemorative'){ ?>
<table width="100%" border="0">
  <tr class="darker">
    <td width="24%"><a href="proof.php"> Commemorative Report</a></td>
    <td width="22%"><a href="viewSetsList.php?setType=Commemorative">Commemorative Set List</a></td>
    <td width="54%"><a href="CommemorativeCoinsAll.php">Coins</a></td>
  </tr>
</table>
<?php }?>
<hr>

<div id="chart_div" style="width:100%; height: 130px;"></div>

<hr>

  <div>
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h3>Certified Sets</h3></td>
      </tr>
     <tr align="center">
       <td width="11%"><a href="viewSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewSetService.php?proService=ICG&setType=<?php echo $setLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewSetService.php?proService=NGC&setType=<?php echo $setLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewSetService.php?proService=ANACS&setType=<?php echo $setLink; ?>"><strong>ANACS</strong></a></td>
      </tr>
     <tr align="center">
       <td><a href="viewSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><?php echo $CollectionSet->getSetProGrader('PCGS',$userID); ?></a></td>
       <td><?php echo $CollectionSet->getSetTypeProGrader($setType,'ICG',$userID); ?></td>
       <td><?php echo $CollectionSet->getSetTypeProGrader($setType,'NGC' ,$userID); ?></td>
       <td><?php echo $CollectionSet->getSetTypeProGrader($setType,'ANACS',$userID); ?></td>
      </tr>
   </table>
   <hr class="clear"> 

<table width="100%" border="0" id="setList">
 <thead class="darker">
  <tr>
  <td width="44%" align="left">Name</td>
   <td>Type</td>
   <td width="17%" align="center">Collected</td>  
  </tr>
</thead>
  <tbody>
<?php 
	$sql = mysql_query("SELECT * FROM collectset WHERE setType = '$setType' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error()); 
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td>No Proof Sets Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {	
	while($row = mysql_fetch_array($sql)){
		$collectsetID = intval($row['collectsetID']);
		$CollectionSet->getCollectionSetById($collectsetID);
		$mintsetID = intval($row['mintsetID']);
		$Mintset->getMintsetById(intval($row['mintsetID']));
		$setNickname = $row['setNickname'];
	echo '<tr class="setListRow">
    <td><a href="viewSetDetail.php?ID=' . $Encryption->encode($collectsetID) . '">' . $CollectionSet->getSetNickname(). '</a></td>
	<td><a href="viewSet.php?ID=' . intval($row['mintsetID']). '">' .$Mintset->getSetName(). '</a></td>
    <td align="center">'.$CollectionSet->getCoinPrice().'</td>
  </tr>';

	}
}
?>
  </tbody>
 <tfoot class="darker">
  <tr>
  <td width="44%" align="left">Name</td>
   <td>Type</td>
   <td width="17%" align="center">Collected</td>  
  </tr>
</tfoot>

</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>