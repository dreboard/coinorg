<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);

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
 
 $byMintCount = $coin->getCoinByTypeByMint($coinType);
 $uniqueCount = $collection->getCertCollectionUniqueCountByType($userID, $coinType);
 
 $typePercent = percent($uniqueCount, $byMintCount);
 $typeAllPercent = percent($uniqueCount, $totalByTypeCount); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );
$("#viewFolderBtn").click(function() {
   window.location = 'viewFolder.php?coinType=<?php echo $coinType ?>';
});
$("#viewReportBtn").click(function() {
   window.location = 'report<?php echo $pageCategory ?>.php';
});

 

});
</script>
<style type="text/css">
#listTbl h3 {margin:0px;}

</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>.jpg" width="50" height="50" align="absmiddle" /> My Certified <a href="viewGradeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>" class="brownLink"><?php echo $coinType ?>'s</a></h1>

  <?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

<table width="100%" border="0" id="proTbl">
     <tr align="center">
       <td colspan="2" align="left"><h3>Grading Services</h3></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr align="center">
       <td width="11%"><a href="viewTypeService.php?proService=PCGS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICG&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NGC&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ANACS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=SEGS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=PCI&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICCS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=HALLMARK&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NTC&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><strong>NTC</strong></a></td>
     </tr>
     <tr align="center">
       <td><a href="viewTypeService.php?proService=PCGS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('PCGS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICG&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('ICG', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=NGC&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('NGC', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ANACS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('ANACS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=SEGS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('SEGS', $coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=PCI&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('PCI', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICCS&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('ICCS',$coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=HALLMARK&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('HALLMARK', $coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=NTC&coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>"><?php echo $collection->getTypeProGrader('NTC',$coinType,$userID); ?></a></td>
     </tr>
   </table>
   <hr />


  <table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="56%">Year / Mint</td>
    <td width="15%" align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID' AND proService != 'None' ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
	<td>&nbsp;</td>
    <td>No '. $coinType.' collected</td>
	<td></td><td></td>
	<td></td>	   
  </tr> ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img class="typeIcon" align="middle" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="middle" src="../img/graded.jpg" width="20" height="20" /> ';
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="middle" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="middle" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		}
		else { 
		   $coinIcon = '<img align="middle" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		}
  
  echo '
    <tr class="gryHover" align="center"> 
	<td width="3%" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).'</a></td>
	<td>'. $collection->getCoinGrade() .'/'. $collection->getGrader() .'</td>
		<td>'.date("M j Y ",strtotime($collection->getCoinDate())) .'</td>
	<td>'. $collection->getCoinPrice() .'</td>	   	  
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="56%">Year / Mint</td>
    <td width="15%" align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<br class="clear" />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>