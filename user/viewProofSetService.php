<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$setLink = 'Proof';
if(isset($_GET["setType"])){
	$setType = 'Proof'; 
	
	$proService = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["proService"]);
}else {
	$setType = "";

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

<h1><img src="../img/Eisenhower_Dollar_Proof.jpg" width="100" height="100" align="middle"> My <a href="proof.php" class="brownLink">Proof</a> Sets's Graded by <?php echo $proService ?></h1>
<table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h3>Certified Proof &amp; Date Sets</h3></td>
    </tr>
     <tr align="center">
       <td width="11%"><a href="viewProofSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ICG&setType=<?php echo $setLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=NGC&setType=<?php echo $setLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ANACS&setType=<?php echo $setLink; ?>"><strong>ANACS</strong></a></td>
    </tr>
     <tr align="center">
       <td><a href="viewSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID); ?></a></td>
       <td><?php echo $CollectionSet->getSetProofProGrader('ICG',$userID); ?></td>
       <td><?php echo $CollectionSet->getSetProofProGrader('NGC' ,$userID); ?></td>
       <td><?php echo $CollectionSet->getSetProofProGrader('ANACS',$userID); ?></td>
    </tr>
  </table>
<table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h3><strong>Certified Sets</strong></h3></td>
      </tr>
     <tr align="center">
       <td width="11%"><a href="viewProofSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ICG&setType=<?php echo $setLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=NGC&setType=<?php echo $setLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ANACS&setType=<?php echo $setLink; ?>"><strong>ANACS</strong></a></td>
      </tr>
     <tr align="center">
       <td><a href="viewSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><?php echo $CollectionSet->getSetProGrader('PCGS',$userID); ?></a></td>
       <td><?php echo $CollectionSet->getSetTypeProGrader($setType,'ICG',$userID); ?></td>
       <td><?php echo $CollectionSet->getSetTypeProGrader($setType,'NGC' ,$userID); ?></td>
       <td><?php echo $CollectionSet->getSetTypeProGrader($setType,'ANACS',$userID); ?></td>
      </tr>
   </table>
   <hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Set</td>  
    <td width="25%">Year</td>
    <td width="10%" align="center">Grade</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectset WHERE strike = 'Proof' AND proService = '$proService' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>No Proofs Graded by '.$proService.'</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
		  $collectsetID = intval($row['collectsetID']);
		  $CollectionSet->getCollectionSetById($collectsetID);
  echo '
    <tr>
    <td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'" class="brownLink">'.$CollectionSet->getSetNickname().'</a></td>
	<td><a href="viewCoinYear.php?year='.$CollectionSet->getCoinYear().'">'.$CollectionSet->getCoinYear().'</a></td>	
	<td align="center">'.$CollectionSet->getCoinGrade().'</td>
	<td class="purchaseTotals" align="right">$'.$CollectionSet->getCoinPrice().'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Set</td>  
    <td width="25%">Year</td>
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