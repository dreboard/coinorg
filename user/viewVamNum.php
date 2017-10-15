<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinCatLink = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
$coinYear = strip_tags($_GET["coinYear"]);
$vam = strip_tags($_GET["vam"]);
$mintMark = strip_tags($_GET["mintMark"]);
$coinCategory = $coin->getCategoryByType($coinType);
$coinMetal = $coin->getMetalByType($coinType);
$CoinTypes->getCoinByType($coinType);
$getDates = htmlentities($CoinTypes->getDates());
$mintedYearNumber = $collection->dateSetNums($coinType, $userID);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo str_replace('_', ' ', $_GET["coinYear"]); ?> <?php echo str_replace('_', ' ', $_GET["mintMark"]); ?> <?php echo str_replace('_', ' ', $_GET["coinType"]); ?>  <?php echo str_replace('_', ' ', $_GET["vam"]); ?> List</title>

<style type="text/css">
.byYearDiv {float:left; margin-right:5px;}
#content {overflow:hidden;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="40" height="40" align="absmiddle" /> <?php echo str_replace('_', ' ', $_GET["coinYear"]); ?> <?php echo str_replace('_', ' ', $_GET["mintMark"]); ?> <?php echo str_replace('_', ' ', $_GET["coinType"]); ?>  <?php echo str_replace('_', ' ', $_GET["vam"]); ?> List</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

<h3>By Year Vam</h3>
<table width="98%" border="0" cellpadding="3" class="autoCoinTbl">
<tr>
<?php 
$i = 1;
$imgURL = $CoinTypes->getMintedYearList($getDates);
$delimiter=",";
$itemList = array();
$itemList = explode($delimiter, $imgURL);
foreach($itemList as $item){
echo '<td><strong><a class="brownLink" href="snowYearReport.php?coinType='.str_replace(' ', '_', $coinType).'&coinYear='.$item.'">'.$item.'</a></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>

<hr />
<table width="100%" border="0">
  <tr>
    <td width="13%"><strong>Highest Grade:</strong></td>
    <td width="80%"><?php echo $collection->getHighGradeVam($coinType, $userID, $vam); ?></td>
    <td width="7%">&nbsp;</td>
  </tr>
</table>
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
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $_GET["coinType"])."' AND userID = '$userID' AND vam ='".str_replace('_', ' ', $_GET["vam"])."' AND mintMark = '".strip_tags($_GET["mintMark"])."' AND coinYear = '".strip_tags($_GET["coinYear"])."' ORDER BY coinYear DESC") or die(mysql_error());
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

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>