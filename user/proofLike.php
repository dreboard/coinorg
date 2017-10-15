<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["morganDesignation"])){
	$coinType = strip_tags(str_replace('_', ' ', $_GET["coinType"])); 
	$categoryLink = str_replace(' ', '_', $coinType); 
	$categoryName = str_replace(' ', '', $coinType);
	$reportLink = str_replace(' ', '', $coinType);
	$coinCatLink = strip_tags($_GET["coinType"]);
	$morganDesignation = strip_tags($_GET["morganDesignation"]);
	switch(strip_tags(str_replace('_', ' ', $_GET["morganDesignation"]))){
		case 'SPL': 
		$prooflike = 'Semi-Prooflike';
		break;
		case 'PL': 
		$prooflike = 'Proof Like';
		break;
		case 'DMPL': 
		$prooflike = 'Deep Mirror Proof Like';
		break;
		case 'UPL': 
		$prooflike = 'Ultra Prooflike';
		break;
	}	
}else {
	$coinType = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Morgan Dollar <?php echo $prooflike;?> Report</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
});
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $categoryLink ?>.jpg" width="50" height="50" align="absmiddle" /> Morgan Dollar <?php echo $prooflike;?> Report</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

<table width="100%" border="0">
  <tr class="darker" align="center">
    <td width="25%">Ultra Prooflike</td>
    <td width="25">Deep Mirror Prooflike</td>
    <td width="25%">Proof Like</td>
    <td width="25%">Semi Prooflike</td>
  </tr>
  <tr align="center">
    <td><a href="proofLike.php?morganDesignation=UPL&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='UPL'); ?></a></td>
    <td><a href="proofLike.php?morganDesignation=DMPL&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='DMPL'); ?></a></td>
    <td><a href="proofLike.php?morganDesignation=PL&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='PL'); ?></a></td>
    <td><a href="proofLike.php?morganDesignation=SPL&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='SPL'); ?></a></td>
  </tr>
</table>
<hr />
<h3>Prooflike By Year Count</h3>
<table width="100%" border="0" cellpadding="3" class="autoCoinTbl">
<tr align="center">
<?php 
$i = 1;
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '$coinType' ORDER BY coinYear ASC") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
echo '<td width="10%"><a class="brownLink" href="viewCoinYear.php?coinType='.str_replace(' ', '_', $coinType).'&year='.intval($row['coinYear']).'">'.intval($row['coinYear']).'</a> ('.$collection->getMorganDesignationTypeCountByYear(intval($row['coinYear']), $userID, $morganDesignation).')</td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 11) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center">'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>



<hr />

<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="53%">Year / Mint</td>
    <td width="17%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '".strip_tags(str_replace('_', ' ', $_GET["coinType"]))."' AND morganDesignation = '".strip_tags(str_replace('_', ' ', $_GET["morganDesignation"]))."' AND userID = '$userID' ORDER BY coinYear ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
	<td>&nbsp;</td>
    <td>No '. $coinType.' prooflike coins collected</td>
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
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="middle" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="middle" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="middle" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="middle" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr class="gryHover" align="center"> 
	<td width="3%" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).' '.$collection->getVarietyForCoin(intval($row['collectionID'])).'</a></td>
	<td>'. $collection->getCoinGrade().$collection->getCoinAttribute(intval($row['collectionID']), $userID).$grader.'</td>
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
    <td width="53%">Year / Mint</td>
    <td width="17%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>