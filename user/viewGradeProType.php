<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["coinType"])){
	$coinType = strip_tags(str_replace('_', ' ', $_GET["coinType"])); 
	$coinTypeLink = str_replace(' ', '_', $coinType); 
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
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('.coinTbl').dataTable( {
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

<h1><img src="../img/<?php echo $categoryLink ?>.jpg" width="50" height="50" align="absmiddle" /> My Certified <a href="viewGradeReport.php?coinType=<?php echo $coinTypeLink ?>" class="brownLink"><?php echo $coinType ?>'s</a> Graded <?php echo $coinGrade ?></h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />
<table width="100%" border="0" id="proTbl">
     <tr align="center">
       <td colspan="2" align="left"><h3>Grading Services</h3></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr align="center">
       <td width="11%"><a href="viewTypeService.php?proService=PCGS&coinType=<?php echo $coinTypeLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICG&coinType=<?php echo $coinTypeLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NGC&coinType=<?php echo $coinTypeLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ANACS&coinType=<?php echo $coinTypeLink; ?>"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=SEGS&coinType=<?php echo $coinTypeLink; ?>"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=PCI&coinType=<?php echo $coinTypeLink; ?>"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICCS&coinType=<?php echo $coinTypeLink; ?>"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=HALLMARK&coinType=<?php echo $coinTypeLink; ?>"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NTC&coinType=<?php echo $coinTypeLink; ?>"><strong>NTC</strong></a></td>
     </tr>
     <tr align="center">
       <td><a href="viewTypeService.php?proService=PCGS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('PCGS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICG&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICG', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=NGC&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NGC', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ANACS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ANACS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=SEGS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('SEGS', $coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=PCI&coinType=<?php echo $reportLink; ?>"><?php echo $collection->getTypeProGrader('PCI', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICCS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICCS',$coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=HALLMARK&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('HALLMARK', $coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=NTC&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NTC',$coinType,$userID); ?></a></td>
     </tr>
  </table>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="64%" height="24">Year / Mint</td>  
    <td width="12%">Grade</td>
    <td width="12%" align="right">Service</td>
    <td width="12%" align="right"> Price</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND proService != 'None' AND coinGrade = '$coinGrade' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
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
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewTypeService.php?proService='.$collection->getGrader().'&coinType='.$coinType.'">'.$collection->getCoinGrade().'</a></td>	
	<td align="right">'.$collection->getGrader().'</td>
	<td class="purchaseTotals" align="right">$'.$collection->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="64%" height="24">Year / Mint</td>  
    <td width="12%">Grade</td>
    <td width="12%" align="right">Service</td>
    <td align="right"> Price</td>
  </tr>
	</tfoot>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>