<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
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



$categoryLink = str_replace(' ', '_', $coin->getCategoryByType($coinType));
$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $buttonTxt = str_replace('_', ' ', $pageCategory); 
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  if($pageCategory == "Half Dime"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  if($pageCategory == "Half Dollar"){
	  $pageCategory = "Half";
	  }
	  if($pageCategory == "Small Cent"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  $dates = $row['dates'];

  }
 }
 
 $totalByTypeCount = $coin->getCoinCountType($coinType);
 
 $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
 
 $typePercent = percent($uniqueCount, $byMintCount);
 $typeAllPercent = percent($uniqueCount, $totalByTypeCount); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType; ?> Color Report</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script>
<style type="text/css">
#obvRev2 {width:270px; height:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><?php echo $coinType; ?> Steps Report</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  
  <hr />
  <h3>By Year Full Head Designations</h3>
  <table width="100%" border="0">
    <tr class="darker">
      <td width="50%">&nbsp;</td>
    <td width="16%">6 Full Steps</td>
    <td width="16%">5 Full Steps</td>
    <td width="16%">Full Steps</td>
    </tr>
<?php
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinYear DESC") or die(mysql_error());    
while($row = mysql_fetch_array($countAll))
	  {
		  $coin->getCoinById(intval($row['coinID']));
     echo '
    <tr class="gryHover">
      <td><a class="brownLink" href="viewCoinColor.php?coinID='.intval($row['coinID']).'">'.$coin->getCoinName().'</a></td>
      <td align="center">'.$collection->getCoinDesignationCount($userID, $designation='6FS', intval($row['coinID'])).'</td>
      <td align="center">'.$collection->getCoinDesignationCount($userID, $designation='5FS', intval($row['coinID'])).'</td>
      <td align="center">'.$collection->getCoinDesignationCount($userID, $designation='FS', intval($row['coinID'])).'</td>
    </tr> 
	 ';
	  }
?>    
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>