<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET["coinMetal"])){
$coinMetal = strip_tags(str_replace('_', ' ', $_GET['coinMetal']));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $coinMetal; ?> Proof Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('.clientTbl').dataTable( {
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
<h1><img src="../img/<?php echo $coinMetal ?>Proof.jpg" width="100" height="100" align="middle"> My <?php echo $coinMetal; ?> <a href="proof.php" class="brownLink">Proof</a>  Coins</h1>
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
    <td width="13%" align="right"><?php echo $collection->getProofBullionCountById($userID, $coinMetal); ?></td>
    <td width="34%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getUniqueBullionProofCollectionCountById($userID, $coinMetal); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Coin Investment</strong></td>
    <td align="right">$<?php echo $collection->getProofBullionSumByAccount($userID, $coinMetal); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td><strong>Total Mint Set Investment</strong></td>
      <td align="right">$<?php echo number_format($CollectionSet->getBullionProofSetSumByID($coinMetal, $userID),2); ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Total Collection Investment</strong></td>
      <td align="right">$<?php echo number_format($CollectionSet->getBullionProofSetSumByID($coinMetal, $userID) + $collection->getProofBullionSumByAccount($userID, $coinMetal),2); ?></td>
      <td>(Coins &amp; Sets)</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>
<hr />
<h3>Proof Sets</h3>
<table width="100%" border="0" class="clientTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Type</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectset WHERE coinMetal = '$coinMetal' AND userID = '$userID' AND strike = 'Proof' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>No Proof '.$coinMetal.' Sets Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
         $collectsetID = intval($row['collectsetID']);
		  $CollectionSet->getCollectionSetById($collectsetID);
  echo '
    <tr>
    <td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'" class="brownLink">'.$CollectionSet->getSetNickname().'</a></td>
	<td><a href="viewSetYear.php?year='.$CollectionSet->getCoinYear().'">'.$CollectionSet->getCoinYear().'</a></td>	
	<td align="center">'.$CollectionSet->getSetType().'</td>
	<td class="purchaseTotals" align="right">$'.$CollectionSet->getCoinPrice().'</td>	     
  </tr>
  ';
	  }
}
?>
</tbody>
    
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Type</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>
<br class="clear" />

<hr />

<h3>Proof Coins</h3>
<table width="100%" border="0" class="clientTbl">
  <thead class="darker">
  <tr>
    <td width="46%">Year / Mint</td>
    <td width="23%" align="center">Type</td>
    <td width="9%" align="center">Grade</td>  
    <td width="11%" align="center"> Collected</td>
    <td width="11%" align="center">Purchase </td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE strike = 'Proof' AND coinMetal = '$coinMetal' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  
		  <td>No Proof Gold Coins Collected</td><td>&nbsp;</td>
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
    $coinIcon = '<a href="viewFolderCoinsList.php?collectfolderID='.$collectfolderID.'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
}
else if($collectrollsID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" />';
}
else if($collectsetID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" />';
}
else { //Or else if($value == 'BB') if you might add more at some point
   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
}
  
//$collection->getCollectionFolder()
//$collection->getCollectionRoll()
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.$collectedCoinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'. $coin->getCoinType() .'</td>
	<td>'. $collection->getCoinGrade() .'</td>
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
    <td>Year / Mint</td>
    <td align="center">Type</td>
    <td align="center">Grade</td>  
    <td width="11%" align="center"> Collected</td>
    <td width="11%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>
<br class="clear" />
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>