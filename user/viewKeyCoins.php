<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Key/Semi Key Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );


});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:130%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle" id="setTypes"> My Key/Semi Key Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="25%" class="darker"><a href="viewKeyReport.php">Key Report</a></td>
    <td width="25%" class="darker"><a href="viewKeyCoins.php">Key Coins</a></td>
    <td width="25%" class="darker"> <a href="viewKeyGrades.php">Grade Report</a></td>  
    <td width="25%" class="darker"><a href="viewKeyCheck.php">Checklist</a></td>   
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="28%"><strong>Total Collected </strong></td>
    <td width="72%"><?php echo $collection->getKeyCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td width="28%"><strong>Total Unique </strong></td>
    <td width="72%"><?php echo $collection->getKeyCollectionById($userID)	; ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getKeySumByAccount($userID); ?></td>
  </tr>
  </table>
  <hr />
  <table width="100%" border="0">
  <tr align="center">
    <td width="25%"><strong>Ungraded </strong></td>
    <td width="25%"><strong>Certified </strong></td>
    <td width="25%"><strong>Proofs</strong></td>
    <td width="25%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><a href="viewKeyGrades.php"><?php echo $collection->getKeyUngradedCountById($userID); ?></a></td>
    <td><a href="viewKeyGrades.php"><?php echo $collection->getKeyCertificationCountById($userID); ?></a></td>
    <td><?php echo $collection->getKeyProofCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0">
  <tr>
    <td width="17%"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Coin Categories....</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Cent">Half Cents</option>
      <option value="viewKeyCategory.php?coinCategory=Large_Cent">Large Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="viewKeyCategory.php?coinCategory=Two_Cent">Two Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Three_Cent">Three Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="viewKeyCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="viewKeyCategory.php?coinCategory=Dime">Dime</option>
      <option value="viewKeyCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="viewKeyCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
 <td width="55%">&nbsp;</td>  
    <td width="28%">
    <?php 
	if($collection->getKeyCollectionCountById($userID) != 0){
	?>   
    <a href="_downloadKey.php?ID=<?php echo $Encryption->encode($userID); ?>" title="Download to Excel" class="brownLink"><strong><img src="../img/excelIcon.jpg" alt="" width="14" height="20" align="absmiddle" /> Download Collection </strong></a>&nbsp;
    <?php }else { echo ''; } ?></td>
    
    
  </tr>
</table>
<hr />


<table width="100%" border="0" id="clientTbl">
  <thead>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="52%"><strong>Year / Mint</strong></td>
    <td width="18%" align="center"><strong>Type</strong></td>
    <td width="8%" align="center"><strong>Grade</strong></td>  
    <td width="10%" align="center"> <strong>Collected</strong></td>
    <td width="9%" align="center"><strong>Purchase</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE keyDate = '1' AND userID = '$userID' AND coinYear < ".date("Y")." ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td>
		  <td>No Key Dates Collected</td>
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
    <tr align="center" class="coinsList">
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


<tfoot>
  <tr class="darker">
    <td>&nbsp;</td>
    <td>Year / Mint</td>
    <td align="center">Type</td>
    <td align="center">Grade</td>  
    <td width="10%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>

<p><a class="topLink" href="#top">Top</a></p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>