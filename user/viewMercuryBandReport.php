<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?> Full Bands Report</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 3, "desc" ]],
	"iDisplayLength": 50
} );


$("#listSwitcher").change(function() {   
	 $('#changeMsg').text("generating list.....");	  
});


});

</script> 

<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?>  Full Bands Report</h2>
<h3><a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLink"><?php echo $coinType ?></a>  |  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink"><?php echo substr($coin->getCoinName(), 0, 4); ?> Date Set</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear(); ?>" class="brownLink"><?php echo $coin->getCoinYear(); ?> Mint Marks</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a></h3>

<hr />

<?php include ("../inc/pageElements/coinLinks.php");?>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td colspan="2"><img src="../img/Winged_Liberty_Dime.jpg" alt="11" width="20" height="20" align="absmiddle" /> Full Bands</td>
    <td colspan="2">Unclassified</td>
    </tr>
  <tr align="center">
    <td width="13%">Slabbed</td>
    <td width="12%">Raw</td>
    <td colspan="2"><?php echo $collection->getCoinColorCount($userID, $fullAtt='None', intval($_GET['coinID'])); ?></td>
    </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinDesignationProCount($userID, $fullAtt='FB', intval($_GET['coinID'])); ?></td>
    <td><?php echo $collection->getCoinDesignationRawCount($userID, $fullAtt='FB', intval($_GET['coinID'])); ?></td>
    <td width="12%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    </tr>
  <tr align="center">
    <td colspan="4"><a href="mercuryBandReport.php?coinType=<?php echo str_replace(' ', '_', $coin->getCoinType()); ?>" class="brownLinkBold"><?php echo $coin->getCoinType(); ?>  Designation Report</a></td>
    </tr>
</table>
<hr />

<div id="redDiv">
<h3><img src="../img/Winged_Liberty_Dime.jpg" alt="11" width="30" height="30" align="absmiddle" /> Full Bands Coins</h3>

<table width="395" border="0">
  <tr>
    <td colspan="2" class="darker">Highest Graded </td>
    </tr>
	  <tr>
    <td><?php echo $Grade->getDesignationHighGradeNumberByCoinID($coinID, $fullAtt='FB', $userID, $strike='Business');?></td>
    </tr>
  
</table>


<table width="100%" border="0" class="clientTbl">
<thead class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' AND fullAtt = 'FB' ORDER BY coinGradeNum ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No Coins Designated Full Bands</strong></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr align="center" class="gryHover">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'. $collection->getCoinGrade().$collection->getCoinAttribute(intval($row['collectionID']), $userID).$grader.' '.$collection->getVarietyForCoin(intval($row['collectionID'])).' '.substr($Errors->getErrorForCoin(intval($row['collectionID'])), 0, 30).'</a></td>
		<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}

?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
</div>
<p class="clear">&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>