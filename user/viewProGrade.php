<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["coinCategory"])){
	$coinCategory = strip_tags(str_replace('_', ' ', $_GET["coinCategory"])); 
	$categoryLink = str_replace(' ', '_', $coinCategory); 
	$coinGrade = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinGrade"]);
	$reportLink = str_replace(' ', '', $coinCategory);
	//$proService = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["proService"]);
}else {
	$coinCategory = "";
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

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Certified <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a>'s Graded <?php echo $coinGrade ?></h1>
<p><a href="categoryGrades.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>" class="brownLink">Back to Grade Report</a></p>

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Grader</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '$coinCategory' AND proService != 'None' AND coinGrade = '$coinGrade' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
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
   $collectionID = intval($row['collectionID']);
  $collection-> getCollectionById($collectionID);   
  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).' '.$collection->getVarietyForCoin(intval($row['collectionID'])).' '.$Errors->getErrorForCoin(intval($row['collectionID'])).'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getGrader().'</td>
	<td class="purchaseTotals" align="right">$'.$collection->getCoinPrice().'</td>	    
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
    <td width="10%" align="center">Grader</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>