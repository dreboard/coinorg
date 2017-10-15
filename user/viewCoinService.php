<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$coinID = $Encryption->decode($_GET['ID']);
$coin->getCoinById($coinID);


$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 
$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$proService = strip_tags($_GET['proService']);



}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#clientTbl_filter input {text-align:right; margin-right:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2 class="brownLink"><img src="../img/<?php echo $coinVersion ?>.jpg" width="100" height="100" align="absmiddle" /> My <a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><?php echo $coinName ?></a>'s Graded by <?php echo $proService ?></h2>
<h3>  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLinkBold"><?php echo substr($coin->getCoinName(), 0, 4); ?></a>  | <a href="<?php echo $categoryLink ?>.php" class="brownLinkBold"><?php echo $coinCategory ?></a> | <a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLinkBold"><?php echo $coinType ?></a></h3>
<table width="100%" border="0" id="coinIdTbl">
    <tr align="center">
      <td width="3%" align="left"><img src="../img/coinIcon.jpg" width="21" height="20" align="absmiddle" /></td>
      <td width="15%" align="left"><a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><strong>Main Report</strong></a></td>
    <td width="3%" align="left"><a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><img src="../img/grades.jpg" alt="graded" width="25" height="25" align="absmiddle" /></a></td>
    <td width="14%" align="left"><a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><strong>Grade Report</strong></a></td>
    <td width="5%" align="center"><a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /></a></td>
    <td width="15%" align="left"><a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><strong><span class="brownLink">Financial Report</span></strong></a></td>
    <td width="3%" align="left"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><img src="../img/timeIcon.jpg" width="25" height="25" align="absmiddle" /></a></td>
    <td width="15%" align="left"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><strong>Collection History</strong></a></td>
    <td align="center"><img src="../img/addIcon.jpg" width="20" height="20" /></td>
    <td align="left"><a href="addCoinID.php?coinID=<?php echo $coinID ?>" class="brownLinkBold">Add</a></td>
    </tr>
  
  <tr align="center">
    <td width="3%" align="left"><strong><a href="viewCoinCert.php?coinID=<?php echo $coinID ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinCert.php?coinID=<?php echo $coinID ?>">Certified</a> <?php echo $collection->getCoinCertifiedCountByID($coinID, $userID) ?></strong></td>
    <td width="3%" align="left"><strong><a href="viewCoinRoll.php?coinID=<?php echo $coinID ?>"><img src="../img/rollReportIcon.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="14%" align="left"><strong><a href="viewCoinRoll.php?coinID=<?php echo $coinID ?>">Rolls </a><?php echo $collection->getCoinRollCountByID($coinID, $userID) ?></strong></td>
    <td width="5%" align="center"><strong><a href="viewCoinError.php?coinID=<?php echo $coinID ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinError.php?coinID=<?php echo $coinID ?>"> Errors </a><?php echo $Errors->getErrorTypeCoinCount($coinID, $userID) ?></strong></td>
    <td width="3%" align="left"><strong><a href="viewCoinBag.php?coinID=<?php echo $coinID ?>v"><img src="../img/bagIcon2.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinBag.php?coinID=<?php echo $coinID ?>v">Bags </a><?php echo $collectionBags->getBagCountByCoin($userID, $coinID) ?></strong></td>
    <td width="4%" align="center"><strong><a href="viewCoinBox.php?coinID=<?php echo $coinID ?>"><img src="../img/boxIcon2.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="23%" align="left"><strong><a href="viewCoinBox.php?coinID=<?php echo $coinID ?>">Boxes </a><?php echo $collectionBoxes->getBoxCountByCoin($userID, $coinID); ?></strong></td>
  </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr>
    <td width="14%"><strong>Highest Grade</strong></td>
    <td width="86%"><?php echo $Grade->getServiceHighGradeNumberByCoinID($coinID, $userID, $strike=$coin->getCoinStrike(), $proService) ?></td>
  </tr>
</table>


<hr />

<table width="100%" border="0">
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
      <td width="11%"><a href="viewCoinService.php?proService=PCGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>PCGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICG&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>ICG</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NGC&amp;ID=<?php echo $Encryption->encode($coinID) ?>"><strong>NGC</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ANACS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>ANACS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=SEGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>SEGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=PCI&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>PCI</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICCS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>ICCS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=HALLMARK&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>HALLMARK</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NTC&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><strong>NTC</strong></a></td>
    </tr>
    <tr align="center">
      <td><a href="viewCoinService.php?proService=PCGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('PCGS', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICG&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('ICG', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NGC&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('NGC', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ANACS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('ANACS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=SEGS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('SEGS', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=PCI&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('PCI', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICCS&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('ICCS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=HALLMARK&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('HALLMARK', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NTC&amp;ID=<?php echo $Encryption->encode($coinID); ?>"><?php echo $Grade->getCoinIDProGrader('NTC',$coinID ,$userID); ?></a></td>
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
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND proService = '$proService' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
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


<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>