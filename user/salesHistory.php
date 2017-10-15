<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Sales History</title>
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
<h1>My Sales History</h1>

<table width="100%" border="0" cellpadding="2">
    <tr>
    <td><strong>Total Inventory SellListment</strong></td>
    <td><?php echo $collection->getCoinSumByAccount($userID); ?> (*Coins Labeled for Sale)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td width="25%"><strong>Total Sales To Date</strong></td>
    <td width="33%"><?php echo $SellList->totalSalesToDate($userID); ?></td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>  
  <tr>
    <td><strong>Total Profit/Loss</strong></td>
    <td><?php echo $SellList->totalSalesDifference($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<table width="100%" border="0" id="monthSellListTbl">
  <tr class="SemiKeyRow">
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
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Cent&year=<?php echo $year ?>">Half Cent</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Half_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Large_Cent&year=<?php echo $year ?>">Large Cent</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Large_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Large_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Small_Cent&year=<?php echo $year ?>">Small Cent</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Small_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Small_Cent', $userID,$year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Two_Cent&year=<?php echo $year ?>">Two Cent</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Two_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Two_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Three_Cent&year=<?php echo $year ?>">Three Cent</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Three_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Three_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dime&year=<?php echo $year ?>">Half Dime</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dime', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Half_Dime', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Nickel&year=<?php echo $year ?>">Nickels</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Nickel', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Nickel', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dime&year=<?php echo $year ?>">Dime</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dime', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Dime', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Twenty_Cent&year=<?php echo $year ?>">Twenty Cent</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Twenty_Cent', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Twenty_Cent', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Quarter&year=<?php echo $year ?>">Quarter</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Quarter', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Quarter', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong><a class="brownLink" href="reportSpendingCategory.php?coinCategory=Half_Dollar&year=<?php echo $year ?>">Half Dollar</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Half_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Half_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="200"><strong> <a class="brownLink" href="reportSpendingCategory.php?coinCategory=Dollar&year=<?php echo $year ?>">Dollar</a></strong></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $SellList->getMonthlySalesByCategory($coinCategory='Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right" class="keyRow"><strong><?php echo $SellList->getYearSellListmentCategory($coinCategory='Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr class="keyRow">
    <td width="200"><strong>Totals</strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='01', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='02', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='03', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='04', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='05', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='06', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='07', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='08', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='09', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='10', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='11', $year) ?></strong></td>
    <td align="right"><strong><?php echo $SellList->getMonthlySellListmentByID($userID, $month='12', $year) ?></strong></td>
    <td align="right">&nbsp;</td>
  </tr>
</table>

<br />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
  <thead class="darker">
  <tr>
    <td width="56%">Year / Mint</td>  
    <td width="18%" align="center">Purchase Date</td>    
    <td width="15%" align="center">Sale Date</td>
    <td width="11%" align="center">Diff</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM selllist WHERE userID = '$userID' ORDER BY sellDate DESC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coinID = intval($row['sellListID']);
  $SellList->getSellItemById(intval($row['sellListID']));
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $sellDate = date("F j, Y",strtotime($row["sellDate"]));
  echo '
    <tr>
    <td><a href="viewCoinSaleDetail.php?ID='.$Encryption->encode(intval($row['sellListID'])).'">'.substr($coinName, 0, 40).'</a> <a href="viewTypeSaleReport.php?coinType='.$coinLink.'">'.$coinType.'</a></td>
	<td align="center">'.date("F j, Y",strtotime($row["purchaseDate"])).'</td>	
	<td align="center">'.date("F j, Y",strtotime($row["sellDate"])).'</td>
	<td align="center">'.$SellList->thisSalesDifference(intval($row['sellListID']), $userID).'</td>	    
  </tr>
  ';
	  }
?>
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="56%">Year / Mint</td>  
    <td align="center">Purchase Date</td>    
    <td width="15%" align="center">Sale Price</td>
    <td width="11%" align="center">Diff</td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>