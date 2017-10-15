<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coinGrade = strip_tags($_GET['coinGrade']);

$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 
$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);
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

<h1>My Certified <a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>"><?php echo $coinName ?>'s</a> Graded <?php echo $coinGrade ?></h1>

<table width="100%" border="0">
    <tr align="center">
      <td width="20%" align="left"><img src="../img/coinIcon.jpg" width="21" height="20" align="absmiddle" /> <a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><strong>Main Report</strong></a></td>
    <td width="20%" align="left"><img src="../img/grades.jpg" alt="graded" width="25" height="25" align="absmiddle" />
      <a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><strong>Grade Report</strong></a></td>
    <td width="20%" align="left"><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /> <a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><strong><span class="brownLink">Financial Report</span></strong></a></td>
    <td width="20%" align="left"><img src="../img/timeIcon.jpg" width="25" height="25" align="absmiddle" /> <a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><strong>Collection History</strong></a></td>
    <td width="20%" align="left">&nbsp;</td>
  </tr>
  </table>
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>

<?php
$sql = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND proService != 'None' AND coinGrade = '$coinGrade' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());

	if(mysql_num_rows($sql) == 0){ 
	            $coin = new Coin();
				$coin->getCoinByID($coinID);
				echo    '<tr>
    <td><a class="brownLinkBold" href="addCoinID.php?coinID='.$coinID.'">No '.$coinGrade. ' '.$coin->getCoinName().'\'s collected</a></td>
	<td>&nbsp;</td>	
	<td class="purchaseTotals" align="right">&nbsp;</td>	    
  </tr>';
	  } else {
  while($row = mysql_fetch_array($sql))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
 }
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td><strong>Type</strong></td>    
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