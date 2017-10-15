<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$commemorativeType = 'Gold American Eagle';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Gold American Eagle Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_GoldEagle.jpg" width="100" height="100" align="middle"> My Gold American Eagle Collection</h1>
<?php include("../inc/pageElements/categoryLinks.php"); ?> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getReportVersionCount($commemorativeType, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCommemorativeType($commemorativeType, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$collection->getTotalCommemorativeTypeFaceVal($commemorativeType, $userID), 2, '.', ''); ?></td>
  </tr>
  </table>
<br />

<div>
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Tenth_Ounce_Gold">$5 Tenth Ounce</a> (1986-Present)</td>
  <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Tenth_Ounce_Gold', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Tenth_Ounce_Gold', $userID)?>" /></td>

  <tr>
    <td><a href="viewListReport.php?coinType=Quarter_Ounce_Gold">$10 Quarter Ounce</a> (1986-Present)</td>
     <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Quarter_Ounce_Gold', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Quarter_Ounce_Gold', $userID)?>" /></td>
  </tr>
  

 <tr>
    <td><a href="viewListReport.php?coinType=Half_Ounce_Gold">$25 Half Ounce</a> (1986-Present)
    <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Half_Ounce_Gold', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Half_Ounce_Gold', $userID)?>" /></td>
 </tr>
 
 
 
 <tr>
 <td><a href="viewListReport.php?coinType=One_Ounce_Gold">$50 One Ounce</a> (1986-Present)</td>
    <td align="center"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('One_Ounce_Gold', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('One_Ounce_Gold', $userID)?>" /></td>
 </tr>

 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><?php echo $collection->getReportVersionCount($commemorativeType, $userID); ?></td>
   <td align="center"><?php echo $collection->getTotalInvestmentSumByCommemorativeType($commemorativeType, $userID); ?></td>
 </tr>
</table>
<p><br>
<a class="topLink" href="#top">Top</a></p></div>
<hr />
<table width="764" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="8"><h3>Gold American Eagle Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewListReport.php?coinType=Half_Ounce_Gold"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Half_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewListReport.php?coinType=Half_Ounce_Gold">Five Dollar</a></span> 
</td>
  <td><a href="viewListReport.php?coinType=Quarter_Ounce_Gold"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Quarter_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewListReport.php?coinType=Quarter_Ounce_Gold">Ten Dollar</a></td>
  
 
<td> <p><a href="viewListReport.php?coinType=Half_Ounce_Gold"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Half_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewListReport.php?coinType=Half_Ounce_Gold">Twenty Five Dollar</a></p>
  <p>&nbsp;</p></td>
  
  <td><a href="viewListReport.php?coinType=One_Ounce_Gold"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('One_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewListReport.php?coinType=One_Ounce_Gold">Fifty Dollar</a></td>
    
  </tr>
 </table>
<hr />
<table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h2>Mint Sets</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM mintset WHERE setType = 'American Eagle' ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
	echo '<tr class="setListRow">
    <td><a href="viewSet.php?ID=' . $row['mintsetID'] . '">' . $row['setName'] . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID($row['mintsetID'], $userID).'</td>
  </tr>';

	}
?>
</table>
<h2>All Gold American Eagle Coins</h2>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCommemorativeTypeProCount($commemorativeType, $userID); ?></td>
    <td>0</td>
    <td>0</td>
    <td><?php echo $collection->getCommemorativeTypeProofCount($commemorativeType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE commemorativeType = 'Gold American Eagle' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
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
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>