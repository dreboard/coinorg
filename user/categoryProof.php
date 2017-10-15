<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$categoryLink = strip_tags($_GET["coinCategory"]);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinCategory ?> Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
.coinsList:hover {background-color:#333; color:#fff;}
.coinsList a:hover {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<table width="100%" border="0">
  <tr>
    <td width="11%" rowspan="2"><img src="../img/<?php echo strip_tags($_GET["coinCategory"]) ?>.jpg" width="100" height="100" align="middle"></td>
    <td width="56%" rowspan="2"><h1><a href="<?php echo strip_tags($_GET["coinCategory"]) ?>.php"><?php echo $coinCategory ?></a> Proof Coins</h1>      <h3>&nbsp;</h3></td>
    <td align="right"><select id="select" name="select2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <option value="categoryProof.php?coinCategory=Half_Cent">Half Cents</option>
      <option value="categoryProof.php?coinCategory=Large_Cent">Large Cents</option>
      <option value="categoryProof.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="categoryProof.php?coinCategory=Two_Cent">Two Cents</option>
      <option value="categoryProof.php?coinCategory=Three_Cent">Three Cents</option>
      <option value="categoryProof.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="categoryProof.php?coinCategory=Nickel">Nickels</option>
      <option value="categoryProof.php?coinCategory=Dime">Dime</option>
      <option value="categoryProof.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
      <option value="categoryProof.php?coinCategory=Quarter">Quarters</option>
      <option value="categoryProof.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="categoryProof.php?coinCategory=Dollar">Dollar</option>
    </select></td>
  </tr>
  <tr>
    <td width="33%" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
<?php include("../inc/pageElements/categoryLinks.php"); ?>
<hr />
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="11%" align="right"><?php echo $collection->getTypeProofCountById($userID, $coinCategory); ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getProofDistinctCollected($userID, $coinCategory); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td align="right">$<?php echo $collection->getTypeProofCountInvestment($userID, $coinCategory); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="16%">Ungraded</td>
    <td width="16%">Certified</td>
    <td width="16%">Errors</td>
    <td width="16%">First Day</td>
    <td width="16%">Proofs</td>
    <td width="16%">Unknown</td>
  </tr>
  <tr align="center">
    <td><a href="viewNoGradeReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getUngradedCountById($userID, $coinCategory); ?></a></td>
    <td><a href="viewCertCatReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getTypeCertificationCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryErrors.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getTypeErrorCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryFirstDay.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $collection->getTypeFirstDayCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryProof.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $collection->getTypeProofCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryUnknown.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $CollectionUnk->getTotalCollectedCoinsByID($coinCategory, $userID); ?></a></td>
  </tr>
</table>
<br />


<table width="100%" border="0">
  <tr>
    <td width="17%"><a href="viewCoinCatFolder.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]); ?>&page=1" class="brownLink"><strong><img src="../img/folderIcon.jpg" width="14" height="20" align="absmiddle" />Folder View</strong></a>&nbsp;</td>
   
 <td width="55%"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <option selected="selected" value="">Switch Coin</option>
  <option value="categoryCoins.php?coinCategory=Half_Cent">Half Cents</option>
  <option value="categoryCoins.php?coinCategory=Large_Cent">Large Cent</option>
  <option value="categoryCoins.php?coinCategory=Small_Cent">Small Cents</option>
  <option value="categoryCoins.php?coinCategory=Two_Cent">Two Cent</option>
  <option value="categoryCoins.php?coinCategory=Three_Cent">Three Cent</option>
  <option value="categoryCoins.php?coinCategory=Half_Dime">Half Dime</option>
  <option value="categoryCoins.php?coinCategory=Nickel">Nickel</option>
  <option value="categoryCoins.php?coinCategory=Dime">Dime</option>
  <option value="categoryCoins.php?coinCategory=Quarter">Quarter</option>
  <option value="categoryCoins.php?coinCategory=Half_Dollar">Half Dollar</option>
  <option value="categoryCoins.php?coinCategory=Dollar">Dollar</option>
</select></td>  
    <td width="28%">
    <?php 
	if($collection->getTotalCollectedCoinsByID($coinCategory, $userID) != 0){
	?>   
    <a href="_downloadCategory.php?ID=<?php echo $Encryption->encode($userID); ?>&category=<?php echo $categoryLink ?>" title="Download to Excel" class="brownLink"><strong><img src="../img/excelIcon.jpg" alt="" width="14" height="20" align="absmiddle" /> Download Collection </strong></a>&nbsp;
    <?php }else { echo ''; } ?></td>
    
    
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
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $_GET["coinCategory"])."' AND userID = '$userID' AND coinYear < ".date("Y")." AND strike = 'Proof' ORDER BY coinYear DESC") or die(mysql_error());
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
  <tr class="gryHover" align="center">
	<td width="3%">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.$collectedCoinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'. $coin->getCoinType() .'</td>
	<td>'. $collection->getCoinGrade() .'</td>
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
    <td width="10%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>