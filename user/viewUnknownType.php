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
<title><?php echo $coinType; ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
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
<h1><?php echo $coinType; ?> Coins</h1>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="30%" rowspan="3" valign="top"><img src="../img/<?php echo $coinCatLink; ?>_both.jpg" alt="Obverse and reverse" name="obvRev2" hspace="0" vspace="0" id="obvRev2" title="<?php echo $coinType; ?>" /></td>
    <td>Type</td>
    <td><a href="<?php echo str_replace(' ', '_', $coin->getCategoryByType($coinType)); ?>.php"><?php echo $coin->getCategoryByType($coinType) ?></a></td>
  </tr>
  <tr>
    <td>Total Collected</td>
    <td><?php echo $CollectionUnk->getTotalCollectedTypeCoinsByID($coinType, $userID); ?></td>
    </tr>
  <tr>
    <td width="20%" valign="top">Total Face Value</td>
    <td width="50%" valign="top"><?php echo $CollectionUnk->getTotalFaceValSumByType($coinType, $userID); ?></td>
    </tr>
</table>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  
  <hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="25%">Certified</td>
    <td width="25%">Proofs</td>
    <td width="25%">Errors</td>
    <td width="25%">Damaged</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getGradeProTypeCount($coinType, $userID); ?></td>
    <td><?php echo $collection->getStrikeCollectedCountByType($userID, $coinType, $strike='Proof'); ?></td>
    <td><?php echo $collection->getTypeErrorCountByCoinType($userID, $coinType); ?></td>
    <td><?php echo $Errors->getProblemTypeCount($coinType, $userID);?></td>
  </tr>
</table>

  <hr />

  <table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="58%">Year / Mint</td>
    <td width="12%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM unknowncoins WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
	<td>&nbsp;</td>
    <td>None in collection</td>
	<td></td><td></td>
	<td></td>	   
  </tr>
  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {

  $unknownCollectionID = intval($row['unknownCollectionID']);
  $CollectionUnk->getCollectionById($unknownCollectionID);  
  
  $coinGrade = $CollectionUnk->getCoinGrade();
  $collectfolderID = $CollectionUnk->getCollectionFolder();
  $collectionFolder->getCollectionFolderById($collectfolderID);
  $collectrollsID = $CollectionUnk->getCollectionRoll();
  $collectionRolls->getCollectionRollById($collectrollsID);

if($collectfolderID == '0' && $collectrollsID == '0') {
    $coinIcon = '<img align="absbottom" src="../img/'.$CollectionUnk->getCoinTypeImg($unknownCollectionID).'.jpg" width="20" height="20" />&nbsp;';
}
else if($collectfolderID != '0') {
    $coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
}
else if($collectrollsID != '0') {
   $coinIcon = '<a href="viewRollDetail.php?ID='.$Encryption->encode($collectrollsID).'" title="'.$collectionRolls->getRollNickname().'"><img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a>';
}

else { //Or else if($value == 'BB') if you might add more at some point
   $coinIcon = '<img align="absbottom" src="../img/'.$CollectionUnk->getCoinTypeImg($unknownCollectionID).'.jpg" width="20" height="20" />&nbsp;&nbsp;';
}
  
//$collection->getCollectionFolder()
//$collection->getCollectionRoll()
  echo '
   <tr class="gryHover" align="center">
	<td align="center" width="3%">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinUnkDetail.php?ID='.$Encryption->encode($unknownCollectionID).'">'.$CollectionUnk->getCoinYear().'</a></td>
	<td>'. $CollectionUnk->getCoinGrade() .'</td>
		<td>'.date("M j Y ",strtotime($CollectionUnk->getCoinDate())) .'</td>
	<td>'. $CollectionUnk->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td>&nbsp;</td>
    <td>Year / Mint</td>
    <td align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>
  <p>&nbsp;</p>
  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>