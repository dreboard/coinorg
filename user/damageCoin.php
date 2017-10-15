<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Small Cent';
$smallCentRollCount = '50';
$smallCentRollVal = '.50';
$coinVal = '.01';

$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_Cents.jpg" width="100" height="100" align="middle">My  Damaged Coins </h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>  
  </tr>
</table> 

<hr />

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="11%" align="right"><?php echo $collection->getCollectionCountById($userID); ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getUniqueCollectionCountById($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td align="right">$<?php echo $collection->getCoinSumByAccount($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />


<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getTypeCertificationCountById($userID, $coinCategory); ?></td>
    <td><a href="reportErrors.php">0</a></td>
    <td><a href="FirstDay.php">0</a></td>
    <td><a href="proof.php">0</a></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<h3><a href="viewFolderCollection.php" class="brownLink"><img src="../img/folderIcon.jpg" width="14" height="20" align="absmiddle" /> Folder Views | </a><a href="_downloadCollection.php?userID=<?php echo $Encryption->encode($userID); ?>" title="Download to Excel" class="brownLink"><img src="../img/excelIcon.jpg" alt="" width="14" height="20" align="absmiddle" /> Download Collection | </a><a href="viewCollection.php" class="brownLink"><img src="../img/folderIcon.jpg" alt="" width="14" height="20" align="absmiddle" /> All Coin Views </a></h3>
<hr />

<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="8%">&nbsp;</td>
    <td width="31%">Year / Mint</td>
    <td width="31%" align="center">Type</td>
    <td width="10%" align="center">Grade</td>  
    <td width="11%" align="center">Collected</td>
    <td width="9%" align="center">Purchase </td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE problem != 'None' AND userID = '$userID' AND coinYear < ".date("Y")." ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr class="gryHover">
		  <td>&nbsp;</td>
		  <td><a href="addCoinRaw.php">None in collection, Add A Coin</a></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {

  $collectionIDNum = intval($row['collectionID']);
  $collection->getCollectionById($collectionIDNum);  
  
  $coinID = intval($row['coinID']);
  
  $coinGrade = $collection->getCoinGrade();
  $coinID = $collection-> getCoinID($coinID);  
  $coin-> getCoinByID($coinID); 
  $coinName = $coin->getCoinName(); 
  $collectedCoinName = $coin->getCoinName();
  
  $collectfolderID = $collection->getCollectionFolder();
  $collectionFolder->getCollectionFolderById($collectfolderID);
  $collectrollsID = $collection->getCollectionRoll();
  
  $collectsetID = $collection->getCollectionSet();
  
  $proService = $collection->getGrader();
if($collectfolderID == '0' && $collectrollsID == '0' && $proService == 'None' && $collectsetID == '0') {
    $coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
}
else if($proService != 'None') {
    $coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
}
else if($collectfolderID != '0') {
    $coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
}
else if($collectrollsID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" />';
}
else if($collectsetID != '0') {
   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a>';
}
else { //Or else if($value == 'BB') if you might add more at some point
   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
}
  
//$collection->getCollectionFolder()
//$collection->getCollectionRoll()
  echo '
  <tr class="gryHover" align="center">
	<td width="3%">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'. $coin->getCoinType() .'</td>
	<td>'.substr($coin->getCoinName(), 0, 40).'</td>
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
    <td>&nbsp;</td>
    <td>Year / Mint</td>
    <td align="center">Type</td>
    <td align="center">Grade</td>  
    <td width="11%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>