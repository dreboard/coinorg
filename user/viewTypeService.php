<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$regLink = '';
$verifyLink = '';
if(isset($_GET["coinType"])){
	$coinType = strip_tags(str_replace('_', ' ', $_GET["coinType"])); 
	$coinTypeLink = str_replace(' ', '_', $coinType); 
	$proService = strip_tags($_GET["proService"]);
	$coinCatLink = strip_tags($_GET["coinType"]);
	  switch ($proService)
		  {
		  case 'PCGS':
			$regLink = '<a href="regSetType.php?proService='.$proService.'&amp;coinType='.strip_tags($_GET["coinType"]).'" class="brownLinkBold">Create PCGS Set Registry</a>';
			$verifyLink = '<a href="http://www.pcgs.com/cert/" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'NGC':
			$regLink = '<a href="regSetType.php?proService='.$proService.'&amp;coinType='.strip_tags($_GET["coinType"]).'" class="brownLinkBold">Create NGC Bulk Import</a>';
			$verifyLink = '<a href="http://www.ngccoin.com/index.aspx" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'IGC':
			$regLink = '';
			$verifyLink = '<a href="http://www.icgcoin.com/" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'ANACS':
			$regLink = '';
			$verifyLink = '<a href="http://anacs.inetlogic.com/" class="brownLinkBold">Cert Verification</a>';
			break;						
          }	
	
	
	
	
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

<h1><img src="../img/<?php echo $coinTypeLink; ?>.jpg" width="50" height="50" align="absmiddle" /> My <a href="viewGradeReport.php?coinType=<?php echo strip_tags($_GET["coinType"]) ?>" class="brownLinkBold"><?php echo $coinType ?></a>'s Graded by <?php echo $proService ?></h1>
<p><?php echo $regLink ?> | <?php echo $verifyLink ?> | <a href="viewGradeReport.php?coinType=<?php echo strip_tags($_GET["coinType"]) ?>" class="brownLinkBold">Grade Report</a></p>
<hr />

<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

<table width="100%" border="0">
     <tr align="center" class="darker">
       <td width="11%"><a href="viewTypeService.php?proService=PCGS&amp;coinType=<?php echo $coinTypeLink; ?>">PCGS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICG&amp;coinType=<?php echo $coinTypeLink; ?>">ICG</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NGC&amp;coinType=<?php echo $coinTypeLink; ?>">NGC</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ANACS&amp;coinType=<?php echo $coinTypeLink; ?>">ANACS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=SEGS&amp;coinType=<?php echo $coinTypeLink; ?>">SEGS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=PCI&amp;coinType=<?php echo $coinTypeLink; ?>">PCI</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICCS&amp;coinType=<?php echo $coinTypeLink; ?>">ICCS</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=HALLMARK&amp;coinType=<?php echo $coinTypeLink; ?>">HALLMARK</a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NTC&amp;coinType=<?php echo $coinTypeLink; ?>">NTC</a></td>
     </tr>
     <tr align="center">
       <td><a href="viewTypeService.php?proService=PCGS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('PCGS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICG&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICG', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=NGC&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NGC', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ANACS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ANACS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=SEGS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('SEGS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=PCI&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('PCI', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICCS&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICCS',$coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=HALLMARK&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('HALLMARK', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=NTC&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NTC',$coinType,$userID); ?></a></td>
     </tr>
  </table>
   <hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Grade</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND proService = '$proService' AND userID = '$userID' ORDER BY coinYear ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
    <td>No '. $coinType.'\'s Graded by '.$proService.'</td>
	<td></td>
	<td></td>	   
  </tr>
  ';
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
	
	<td align="center">'.$collection->getCoinGrade().'</td>
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
    <td width="10%" align="center">Grade</td>
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