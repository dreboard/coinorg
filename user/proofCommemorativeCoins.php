<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['commemorativeVersion'])) { 
$commemorativeVersion = strip_tags(str_replace('_', ' ', $_GET['commemorativeVersion']));
}

$collectTotal = $Commemorative->getTotalCollectedCommemorativeVersionByID($commemorativeVersion, $userID);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Commemorative Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
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
<h1><img src="../img/<?php echo str_replace(' ', '_', $commemorativeVersion) ?>.jpg" width="100" height="100" align="middle"> My <a class="brownLink" href="<?php echo str_replace(' ', '_', $commemorativeVersion); ?>.php"><?php echo $commemorativeVersion; ?></a> Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="25%" class="darker"><a href="CommemorativeCoins.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Coins</a></td>
    <td width="25%" class="darker"><a href="CommemorativeAlbum.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Album View</a></td>
    <td width="25%" class="darker"> <a href="CommemorativeGrades.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Grade Report</a></td>
    <td width="25%" class="darker"><a href="CommemorativeError.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Errors</a></td>  
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collectTotal; ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $Commemorative->getInvestmentCommemorativeVersionByID($commemorativeVersion, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format($Commemorative->getCommemorativeVersionFaceValByID($commemorativeVersion, $userID), 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collectTotal; ?> of <?php echo $Commemorative->getCompleteCommemorativeCount($commemorativeVersion); ?> (<?php echo percent($collectTotal, $Commemorative->getCompleteCommemorativeCount($commemorativeVersion)) ?>%)</td>
  </tr>
  </table>


  
 <hr />

<h1>Collected Commemoratives</h1>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Proof</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    </tr>
  <tr align="center">
    <td><?php echo $Commemorative->getTotalCertCommemorativeVersionByID($commemorativeVersion, $userID); ?></td>
    <td><?php echo $Commemorative->getTotalProofCommemorativeVersionByID($commemorativeVersion, $userID); ?></td>
    <td><?php echo $Commemorative->getTotalErrorCommemorativeVersionByID($commemorativeVersion, $userID); ?></td>
    </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="52%">Year / Mint</td>
    <td width="18%" align="center">Type</td>
    <td width="8%" align="center">Grade</td>  
    <td width="10%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '$commemorativeVersion' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td>
		  <td>No Coins Collected</strong></a></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {

  $collectionIDNum = strip_tags($row['collectionID']);
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
    <tr align="center">
	<td width="3%">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.$collectedCoinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'. $coin->getCoinType() .'</td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("M j Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="52%">Year / Mint</td>
    <td width="18%" align="center">Type</td>
    <td width="8%" align="center">Grade</td>  
    <td width="10%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>


</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>