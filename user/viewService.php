<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$regLink = '';
$verifyLink = '';

if(isset($_GET["proService"])){
	$proService = strip_tags($_GET["proService"]);
switch ($proService)
		  {
		  case 'PCGS':
			$regLink = '<a href="regSet.php?proService='.$proService.'" class="brownLinkBold">PCGS Registry</a>';
			$verifyLink = '<a href="http://www.pcgs.com/cert/" class="brownLinkBold">Cert Verification</a>';
			break;
		  case 'NGC':
			$regLink = '<a href="regSet.php?proService='.$proService.'" class="brownLinkBold">NGC Registry</a>';
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
	
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Coins's Graded by <?php echo $proService ?></title>
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

<h1>My Coins's Graded by <?php echo $proService ?></h1>
<p><a href="myGrades.php" class="brownLinkBold">Grade Report</a> | <?php echo $regLink ?> | <?php echo $verifyLink ?></p>
<table width="100%" border="0">
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
     <tr align="center" class="darker">
       <td width="11%"><a href="viewService.php?proService=PCGS">PCGS</a></td>
       <td width="11%"><a href="viewService.php?proService=ICG">ICG</a></td>
       <td width="11%"><a href="viewService.php?proService=NGC">NGC</a></td>
       <td width="11%"><a href="viewService.php?proService=ANACS">ANACS</a></td>
       <td width="11%"><a href="viewService.php?proService=SEGS">SEGS</a></td>
       <td width="11%"><a href="viewService.php?proService=PCI">PCI</a></td>
       <td width="11%"><a href="viewService.php?proService=ICCS">ICCS</a></td>
       <td width="11%"><a href="viewService.php?proService=HALLMARK">HALLMARK</a></td>
       <td width="11%"><a href="viewService.php?proService=NTC">NTC</a></td>
     </tr>
     <tr align="center">
       <td><a href="viewService.php?proService=PCGS"><?php echo $collection->getMasterProGrader('PCGS',$userID); ?></a></td>
       <td><a href="viewService.php?proService=ICG"><?php echo $collection->getMasterProGrader('ICG',$userID); ?></a></td>
       <td><a href="viewService.php?proService=NGC"><?php echo $collection->getMasterProGrader('NGC' ,$userID); ?></a></td>
       <td><a href="viewService.php?proService=ANACS"><?php echo $collection->getMasterProGrader('ANACS', $userID); ?></a></td>
       <td><a href="viewService.php?proService=SEGS"><?php echo $collection->getMasterProGrader('SEGS',$userID); ?></a></td>
      <td><a href="viewService.php?proService=PCI"><?php echo $collection->getMasterProGrader('PCI',$userID); ?></a></td>
       <td><a href="viewService.php?proService=ICCS"><?php echo $collection->getMasterProGrader('ICCS',$userID); ?></a></td>
      <td><a href="viewService.php?proService=HALLMARK"><?php echo $collection->getMasterProGrader('HALLMARK',$userID); ?></a></td>
      <td><a href="viewService.php?proService=NTC"><?php echo $collection->getMasterProGrader('NTC',$userID); ?></a></td>
     </tr>
   </table>
   <hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Grade</td>
    <td width="14%" align="right">Purchase Price</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE proService = '$proService' AND userID = '$userID' ORDER BY denomination ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr class="gryHover">
		      <td width="51%" height="24">You Dont Have Any Coins Graded By '.$proService.'</td>  
			  <td width="25%"></td>
			  <td width="10%" align="center"></td>
			  <td width="14%" align="right"></td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coin-> getCoinById(intval($row['coinID'])); 
  $collection->getCollectionById(intval($row['collectionID'])); 
  echo '
    <tr class="gryHover">
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'" class="brownLink">'.$coin->getCoinName().'</a></td>
	<td><a href="viewTypeService.php?proService='.strip_tags($_GET["proService"]).'&coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'.$coin->getCoinType().'</a></td>	
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
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="10%" align="center">Grade</td>
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