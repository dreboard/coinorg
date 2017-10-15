<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>First Day Report</title>
<script type="text/javascript">
$(document).ready(function(){

$(".priceListTbl input .collectCount, .priceListTbl input #rollsValTotal").each(function(){
  $(this).val(parseFloat($(this).val()).toFixed(2));
});


$("#viewGraphBtn").click(function() {
   window.location = 'reportNickelGraph.php';
});

/*var total = 0;
$(".smallCentCollectCount").each(function() {
	if (!isNaN(this.value) && this.value.length != 0) {
		total += parseFloat(this.value);
	}
});
$("#smallCentCollectTotals").val(total);
*/

var rollFaceVal = $("#rollsCollectTotal").val() * 0.5;
$("#rollFaceVal").val("$"+rollFaceVal);

});
</script>  


<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#333; color:#FFF;}
#setList .setListRow a:hover{color:#FFF;}
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>My Mint Rolls</h1>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="20%"><h3>Sets Collected</h3></td>
    <td width="18%" align="right"><?php echo $CollectionFirstday-> getFirstDayCountById($userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $CollectionFirstday->totalFirstDayInvestment($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $CollectionFirstday->getCertificationFirstDayCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>

  <div>
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="4" align="left"><h2><strong>Certified Sets</strong></h2></td>
      </tr>
     <tr align="center">
       <td width="11%"><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><strong>ANACS</strong></a></td>
      </tr>
     <tr align="center">
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $CollectionSet->getSetProGrader('PCGS',$userID); ?></a></td>
       <td><?php echo $CollectionSet->getSetProGrader('ICG',$userID); ?></td>
       <td><?php echo $CollectionSet->getSetProGrader('NGC' ,$userID); ?></td>
       <td><?php echo $CollectionSet->getSetProGrader('ANACS',$userID); ?></td>
      </tr>
   </table>
   <br class="clear"> 

   <table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h2>Coin Set</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM rollsmint ORDER BY rollName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisrollMintID = $row['rollMintID'];
		$rollName = $row['rollName'];
	echo '<tr class="setListRow">
    <td><a href="viewMintRoll.php?rollMintID=' . $thisrollMintID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionFirstday->getFirstDayCountByFirstDayId($thisFirstdayID, $userID).'</td>
  </tr>';

	}
?>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>