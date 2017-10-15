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


    $pageQuery = $db->dbhc->prepare("SELECT * FROM pages WHERE pageName = :coinType");
    $pageQuery->execute([':coinType' => $coinType]);

//$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = $pageQuery->fetch(PDO::FETCH_ASSOC))
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
  <h2>
    <?php include("../inc/pageElements/reportLinks.php"); ?>
  </h2>
  <h2><img src="../img/<?php echo $_GET["coinType"]; ?>.jpg" alt="Obverse and reverse" name="obvRev2" width="50" height="50" align="absmiddle" title="<?php echo $coinType; ?>" /> <?php echo $coinType; ?> Coins</h2>

<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  <hr />
<table width="100%" border="0">  
  <tr>
    <td>Type</td>
    <td><a href="<?php echo str_replace(' ', '_', $coin->getCategoryByType($coinType)); ?>.php"><?php echo $coin->getCategoryByType($coinType) ?></a></td>
  </tr>
  <tr>
    <td>Total Collected</td>
    <td><?php echo $collection->getCollectionCountByType($userID, $coinType); ?></td>
    </tr>
  <tr>
    <td width="14%" valign="top">Total Unique</td>
    <td width="86%" valign="top"><?php echo $uniqueCount; ?></td>
    </tr>
</table>  
<br />

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
    <td width="53%">Year / Mint</td>
    <td width="17%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$stmt = $db->dbhc->prepare("
            SELECT * FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType  ORDER BY coins.coinYear DESC
            ");
$stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
$stmt->bindValue(':coinType', str_replace('_', ' ', $_GET['coinType']), PDO::PARAM_STR);
$stmt->execute();

$countAll = $db->dbhc->prepare("SELECT COUNT(*) FROM collection 
            INNER JOIN coins ON collection.coinID = coins.coinID 
            WHERE collection.userID = :userID AND coins.coinType = :coinType");
$countAll->bindParam(':userID', $userID, PDO::PARAM_INT);
$countAll->bindValue(':coinType', str_replace('_', ' ', $_GET['coinType']), PDO::PARAM_STR);
$countAll->execute();

if($countAll->fetchColumn() == 0){
	  echo '
    <tr>
	<td>&nbsp;</td>
    <td>No '. $coinType.' collected</td>
	<td></td><td></td>
	<td></td>	   
  </tr> ';
} else {

  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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
	<td>'. $collection->getCoinGrade().str_replace(' ', '', $collection->getCoinAttribute(intval($row['collectionID']), $userID)).$grader.'</td>
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







  <p>&nbsp;</p>
  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>