<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["coinCategory"])){
	$coinCategory = strip_tags(str_replace('_', ' ', $_GET["coinCategory"])); 
	$categoryLink = str_replace(' ', '_', $coinCategory); 
	$categoryName = str_replace(' ', '', $coinCategory);
	$proService = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["proService"]);
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
#clientTbl_filter input {text-align:right; margin-right:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My <a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a>'s Graded by <?php echo $proService ?></h1>
<a href="<?php echo $categoryName ?>Grades.php">Grade Report</a>
<table width="100%" border="0">
     <tr align="center">
       <td width="11%"><a href="viewCategoryService.php?proService=PCGS&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICG&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NGC&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ANACS&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=SEGS&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=PCI&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICCS&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=HALLMARK&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NTC&amp;coinCategory=<?php echo $categoryLink; ?>"><strong>NTC</strong></a></td>
     </tr>
     <tr align="center">
       <td><a href="viewCategoryService.php?proService=PCGS&amp;coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('PCGS', $coinCategory,$userID); ?></a></td>
       <td><?php echo $collection->getProGrader('ICG', $coinCategory ,$userID); ?></td>
       <td><?php echo $collection->getProGrader('NGC', $coinCategory ,$userID); ?></td>
       <td><?php echo $collection->getProGrader('ANACS', $coinCategory ,$userID); ?></td>
       <td><?php echo $collection->getProGrader('SEGS', $coinCategory,$userID); ?></td>
      <td><?php echo $collection->getProGrader('PCI', $coinCategory,$userID); ?></td>
       <td><?php echo $collection->getProGrader('ICCS', $coinCategory ,$userID); ?></td>
      <td><?php echo $collection->getProGrader('HALLMARK', $coinCategory ,$userID); ?></td>
      <td><?php echo $collection->getProGrader('NTC', $coinCategory ,$userID); ?></td>
     </tr>
   </table>
   <hr />
<?php include("../inc/coinGrade/".$categoryLink."_Service.php"); ?>
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong>Grade</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '$coinCategory' AND proService = '$proService' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>No '.$proService.' '.$coinCategory.' coins In Your Collection</td> 
		  <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
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
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinGrade().'</td>
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
    <td>Type</td>    
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