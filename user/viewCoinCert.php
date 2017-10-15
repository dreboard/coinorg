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

<h1><img src="../img/<?php echo $coinVersion ?>.jpg" width="100" height="100" align="middle"> My Certified <a href="viewCoin.php?coinID=<?php echo $coinID; ?>.php"><?php echo $coinName ?></a>'s</h1>
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
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" id="coinServiceTbl">
    <tr align="center">
      <td colspan="2" align="left"><h3><strong>Grading Services</strong></h3></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td width="11%"><a href="viewCoinService.php?proService=PCGS&amp;coinID=<?php echo $coinID; ?>"><strong>PCGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICG&amp;coinID=<?php echo $coinID; ?>"><strong>ICG</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NGC&amp;coinID=<?php echo $coinID; ?>"><strong>NGC</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ANACS&amp;coinID=<?php echo $coinID; ?>"><strong>ANACS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=SEGS&amp;coinID=<?php echo $coinID; ?>"><strong>SEGS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=PCI&amp;coinID=<?php echo $coinID; ?>"><strong>PCI</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=ICCS&amp;coinID=<?php echo $coinID; ?>"><strong>ICCS</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=HALLMARK&amp;coinID=<?php echo $coinID; ?>"><strong>HALLMARK</strong></a></td>
      <td width="11%"><a href="viewCoinService.php?proService=NTC&amp;coinID=<?php echo $coinID; ?>"><strong>NTC</strong></a></td>
    </tr>
    <tr align="center">
      <td><a href="viewCoinService.php?proService=PCGS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('PCGS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICG&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('ICG', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NGC&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('NGC', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ANACS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('ANACS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=SEGS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('SEGS', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=PCI&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('PCI', $coinID,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=ICCS&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('ICCS', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=HALLMARK&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('HALLMARK', $coinID ,$userID); ?></a></td>
      <td><a href="viewCoinService.php?proService=NTC&amp;coinID=<?php echo $coinID; ?>"><?php echo $collection->getCoinIDProGrader('NTC',$coinID ,$userID); ?></a></td>
    </tr>
  </table>
   <hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Service</strong></td>
    <td width="10%" align="center"><strong>Grade</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND proService != 'None' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());

if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%">No Certified '.$coinName.'</td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
$collectionID = intval($row['collectionID']);
  $collection-> getCollectionById($collectionID);   
  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewCoinService.php?proService='.$collection->getGrader().'&amp;coinID='.$coinID.'">'.$collection->getGrader().'</a></td>	
	<td align="center"><a href="viewCoinByGrade.php?coinGrade='.$collection->getCoinGrade().'&coinID='.$coinID.'">'.$collection->getCoinGrade().'</a> </td>
	<td class="purchaseTotals" align="right">$'.$collection->getCoinPrice().'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Service</td>    
    <td width="10%" align="center"><strong>Grade</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>