<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$categoryLink = $_GET["coinCategory"];

}
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
<h1><img src="../img/<?php echo strip_tags($_GET["coinCategory"]) ?>.jpg" width="100" height="100" align="middle" id="setTypes"> My <?php echo $coinCategory ?> Key/Semi Key Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="50%" class="darker"><a href="viewKeyCategory.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>">Key Report</a></td>
    <td width="50%" class="darker"><a href="viewKeyCategoryList.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>">Checklist</a></td>   
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="28%"><strong>Total Collected </strong></td>
    <td width="72%"><?php echo $collection->getTotalCollectedKeyCoinsByID($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td width="28%"><strong>Total Unique </strong></td>
    <td width="72%"><?php echo $collection->getUniqueKeyByCategory($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByKeyCategory($coinCategory, $userID); ?></td>
  </tr>
  </table>
  <hr />
  <table width="100%" border="0">
  <tr align="center">
    <td width="25%"><strong>Ungraded </strong></td>
    <td width="25%"><strong>Certified </strong></td>
    <td width="25%"><strong>Proofs</strong></td>
    <td width="25%" rowspan="2" valign="middle">
    <select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category....</option>
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
  </tr>
  <tr align="center">
    <td><a href="viewKeyGrades.php"><?php echo $collection->getUngradedKeyByCategory($coinCategory, $userID); ?></a></td>
    <td><a href="viewKeyGrades.php"><?php echo $collection->getKeyGradedByCategory($coinCategory, $userID); ?></a></td>
    <td><?php echo $collection->getKeyProofCountById($userID); ?></td>
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
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND keyDate = '1' AND userID = '$userID' AND coinYear < ".date("Y")." ORDER BY coinYear DESC") or die(mysql_error());
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