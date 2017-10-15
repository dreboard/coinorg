<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', strip_tags($_GET["coinCategory"]));
$coinTypeLink = strip_tags($_GET["coinCategory"]);
$coinCategoryPage = str_replace('_', '', strip_tags($_GET["coinCategory"]));
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinCategory ?> Graded Report</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );

});
</script>
<style type="text/css">
#listTbl h3 {margin:0px;}

</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<table width="100%" border="0">
  <tr>
    <td><h1><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="100" align="middle"> Certified <a href="<?php echo $coinTypeLink ?>.php"><?php echo $coinCategory ?></a> Coins</h1></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
<option value="viewCertCatReport.php?coinCategory=Half_Cent">Half Cents</option>
<option value="viewCertCatReport.php?coinCategory=Large_Cent">Large Cents</option>
<option value="viewCertCatReport.php?coinCategory=Small_Cent">Small Cents</option>
<option value="viewCertCatReport.php?coinCategory=Two_Cent">Two Cents</option>
<option value="viewCertCatReport.php?coinCategory=Three_Cent">Three Cents</option>
<option value="viewCertCatReport.php?coinCategory=Half_Dime">Half Dime</option>
<option value="viewCertCatReport.php?coinCategory=Nickel">Nickels</option>
<option value="viewCertCatReport.php?coinCategory=Dime">Dime</option>
<option value="viewCertCatReport.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>

<option value="viewCertCatReport.php?coinCategory=Quarter">Quarters</option>
<option value="viewCertCatReport.php?coinCategory=Half_Dollar">Half Dollar</option>
<option value="viewCertCatReport.php?coinCategory=Dollar">Dollar</option>
    </select></td>
  </tr>
</table>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="<?php echo $coinTypeLink ?>.php">Coins</a></td>
    <td width="13%" class="darker"><a href="<?php echo $coinCategoryPage ?>Rolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="<?php echo $coinCategoryPage ?>Folders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="<?php echo $coinCategoryPage ?>Grades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="<?php echo $coinCategoryPage ?>Error.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="<?php echo $coinCategoryPage ?>Bags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="<?php echo $coinCategoryPage ?>Boxes.php">Boxes</a></td>    
  </tr>
</table>
<hr />

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="11%" align="right"><a href="viewCertCatReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getTypeCertificationCountById($userID, $coinCategory); ?></a></td>
    <td width="36%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getUniqueCollectionCountByCategory($userID, $coinCategory) ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="20%">Ungraded</td>
    <td width="20%">Certified</td>
    <td width="20%">Errors</td>
    <td width="20%">First Day</td>
    <td width="20%">Proofs</td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><a href="viewNoGradeReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getUngradedCountById($userID, $coinCategory); ?></a></td>
    <td><a href="viewCertCatReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getTypeCertificationCountById($userID, $coinCategory); ?></a></td>
    <td><?php echo $collection->getTypeErrorCountById($userID, $coinCategory); ?></td>
    <td><?php echo $collection->getTypeFirstDayCountById($userID, $coinCategory); ?></td>
    <td><a href="categoryProof.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $collection->getTypeProofCountById($userID, $coinCategory); ?></a></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<h2>Coin List</h2>
  <table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="74%">Year / Mint</td>  
    <td width="13%" align="center">Grade</td>
    <td width="13%" align="right">Purchase </td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '$coinCategory' AND userID = '$userID' AND proService != 'None' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td><a href="addCoin.php">None in collection, Add '.$coinCategory.'</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $collectionID = intval($row['collectionID']);
  $collection->getCollectionById($collectionID);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  echo '
    <tr class="gryHover">
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'" class="brownLink">'.$coinName.' '.$collection->getCoinType().'</a></td>
	<td align="center"><a href="viewCategoryService.php?proService='.$collection->getGrader().'&coinCategory='.$collection->getCoinCategory().'">'.$collection->getCoinGrade().'/'.$collection->getGrader().'</a></td>
	<td align="right">$'.$collection->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
	  }
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="74%">Year / Mint</td>  
    <td width="13%" align="center">Grade</td>
    <td width="13%" align="right">Purchase </td>
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