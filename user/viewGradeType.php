<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["coinType"])){
	$coinType = strip_tags(str_replace('_', ' ', $_GET["coinType"])); 
	$categoryLink = str_replace(' ', '_', $coinType); 
	$categoryName = str_replace(' ', '', $coinType);
	$coinGrade = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinGrade"]);
	$reportLink = str_replace(' ', '', $coinType);
	$coinCatLink = strip_tags($_GET["coinType"]);
}else {
	$coinType = "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <a href="viewGradeReport.php?coinType=<?php echo $categoryLink ?>" class="brownLink"><?php echo $coinType ?>'s</a> Graded <?php echo $coinGrade ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
});
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $categoryLink ?>.jpg" width="50" height="50" align="absmiddle" /> My <a href="viewGradeReport.php?coinType=<?php echo $categoryLink ?>" class="brownLink"><?php echo $coinType ?>'s</a> Graded <?php echo $coinGrade ?></h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="14%" align="right">Purchase Price</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND proService = 'None' AND coinGrade = '$coinGrade' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>There are no '.$coinGrade.'\'s in your collection</td>
		  <td>&nbsp;</td>  
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
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
    <td width="14%" align="right">Purchase Price</td>
  </tr>
	</tfoot>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>