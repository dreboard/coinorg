<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
$coinMetal = $coin->getMetalByType($coinType);
$year = intval($_GET["year"]);

switch ($coinMetal)
{
case 'Gold':
  $byMintCount = $Bullion->getGoldTypeMintCount($coinType);
  break;
case 'Platinum':
  $byMintCount = $Bullion->getPlatinumTypeMintCount($coinType);
  break;  
default:
  $byMintCount = $coin->getCoinByTypeByMint($coinType);
}



$categoryLink = str_replace(' ', '_', $coin->getCategoryByType($coinType));
$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $buttonTxt = str_replace('_', ' ', $pageCategory); 
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  $pageCategory = str_replace(' ', '_', $pageCategory);

  }
 }
 
 $totalByTypeCount = $coin->getCoinCountType($coinType);
 
 $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
 
 $typePercent = percent($uniqueCount, $byMintCount);
 $typeAllPercent = percent($uniqueCount, $totalByTypeCount); 
 

$totalInvestment = $CollectionFirstday->getFirstDaySumByType($coinType, $userID) + $collectionBags->getCoinSumByType($coinType, $userID) + $CollectionBoxes->getCoinSumByType($coinType, $userID) + $collectionRolls->getCoinSumByType($coinType, $userID) +$collectionFolder->getCoinSumByType($coinType, $userID) +$CollectionSet->getCoinSumByType($coinType, $userID) +$Invest->getYearInvestmentByType($coinType, $userID, $year);


/*
$CollectionBoxes = new CollectionBoxes();
$collectionBags = new CollectionBags();
$collectionRolls = new CollectionRolls();
$collectionFolder = new CollectionFolder();
$CollectionSet = new CollectionSet();
$CollectionFirstday = new CollectionFirstday();
*/




 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );


});
</script>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="absmiddle" /> <?php echo $coinType ?> Investment Dashboard</h2>

<?php include("../inc/pageElements/viewTypeLinks.php"); ?>

<br />
<table width="266" border="0" cellspacing="3">
<td width="166"><strong>Total Investment</strong></td>
    <td width="87" align="right">$<?php echo $Invest->getMasterTypeTotal($userID, $coinType); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td align="right">$<?php echo $Invest->getCoinTypeFaceVal($coinType, $userID); ?></td>
    </tr>
  </table>

  <hr />
<table width="596" border="0">
  <tr>
    <td width="127">   
    <select id="yearSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Switch Year</option>
<?php 
   foreach(range(1990, date("Y")) as $newYear){
      echo "<option value='viewTypeFinance.php?coinType=$coinTypeLink&year=$newYear'>$newYear</option>";
   }
?>
</select>
    </td>
    <td width="51">&nbsp;</td>
    <td width="404"><?php echo $year ?>  Investment Total<strong> $<?php echo $Invest->getYearInvestmentByType($coinType, $userID, $year) ?></strong></td>
  </tr>
</table>
<table width="100%" border="0" id="monthInvestTbl">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><strong>Jan</strong></td>
    <td align="right"><strong>Feb</strong></td>
    <td align="right"><strong>Mar</strong></td>
    <td align="right"><strong>Apr</strong></td>
    <td align="right"><strong>May</strong></td>
    <td align="right"><strong>Jun</strong></td>
    <td align="right"><strong>Jul</strong></td>
    <td align="right"><strong>Aug</strong></td>
    <td align="right"><strong>Sep</strong></td>
    <td align="right"><strong>Oct</strong></td>
    <td align="right"><strong>Nov</strong></td>
    <td align="right"><strong>Dec</strong></td>
    </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="viewListReport.php?coinType=<?php echo $coinTypeLink ?>"><?php echo $coinType ?></a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='04', $year) ?>
    </td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestment($coinType, $userID, $month='12', $year) ?></td>
    </tr>
</table>
<hr />

<h3>All Time Coin Totals</h3>

<table width="100%" border="0" id="bulkTbl">
  <tr class="darker">
    <td width="20%" align="left">Coins</td>
    <td width="20%" align="left">Rolls</td>
    <td width="20%" align="left">Folders</td>
    <td width="20%" align="left">Bags</td>
    <td width="20%" align="left">Boxes</td>
    </tr>
  <tr>
    <td align="left">$<?php echo $collection->getCoinSumByType($coinType, $userID); ?></td>
    <td align="left">$<?php echo $collectionRolls->getCoinSumByType($coinType, $userID); ?></td>
    <td align="left">$<?php echo $collectionFolder->getCoinSumByType($coinType, $userID); ?></td>
    <td align="left">$<?php echo $collectionBags->getCoinSumByType($coinType, $userID); ?></td>
    <td align="left">$<?php echo $CollectionBoxes->getCoinSumByType($coinType, $userID); ?></td>
    </tr>
</table>

  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>