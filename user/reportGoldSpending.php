<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$collectTotal = $Bullion->checkGoldCollection($userID);

	
$totalHalfCent = $Bullion->getTotalCollectedGoldByID('Liberty_Head_Gold_Dollar', $userID);
$halfCentVal = '1.000';
$HalffaceVal = $totalHalfCent * $halfCentVal;

$totalLargeCent = $Bullion->getTotalCollectedGoldByID('Indian_Princess_Gold_Dollar', $userID);
$largeCentVal = '1.000';
$largefaceVal = $totalLargeCent * $largeCentVal;

$totalSmallCent = $Bullion->getTotalCollectedGoldByID('Liberty_Cap_Quarter_Eagle', $userID);
$smallCentVal = '2.500';
$smallfaceVal = $totalSmallCent * $smallCentVal;

$totalHalfDime = $Bullion->getTotalCollectedGoldByID('Halime', $userID);
$halfDimeVal = '.05';
$HalfdimefaceVal = $totalHalfDime * $halfDimeVal;

$totalNickel = $Bullion->getTotalCollectedGoldByID('Nickel', $userID);
$nickelVal = '.05';
$nickelfaceVal = $totalNickel * $nickelVal;

$totalDime = $Bullion->getTotalCollectedGoldByID('Dime', $userID);
$dimeVal = '.1';
$dimefaceVal = $totalDime * $dimeVal;

$totalTwentyCents = $Bullion->getTotalCollectedGoldByID('Tweent', $userID);
$twentyCentVal = '.2';
$TwentyfaceVal = $totalTwentyCents * $twentyCentVal;

$totalTwoCents = $Bullion->getTotalCollectedGoldByID('Twent', $userID);
$twoCentVal = '.02';
$twofaceVal = $totalTwoCents * $twoCentVal;

$totalThreeCents = $Bullion->getTotalCollectedGoldByID('Threent', $userID);
$threeCentVal = '.03';
$threefaceVal = $totalThreeCents * $threeCentVal;

$totalQuarter = $Bullion->getTotalCollectedGoldByID('Quarter', $userID);
$quarterCentVal = '.25';
$quarterfaceVal = $totalQuarter * $quarterCentVal;

$totalHalfDollar = $Bullion->getTotalCollectedGoldByID('Halollar', $userID);
$halfVal = '.5';
$HalfdollarfaceVal = $totalHalfDollar * $halfVal;

$totalDollar = $Bullion->getTotalCollectedGoldByID('Dollar', $userID);
$dollarVal = '1';
$dollarfaceVal = $totalDollar * $dollarVal;




$coinfaceval = $HalffaceVal + $largefaceVal + $smallfaceVal = $twofaceVal + $threefaceVal + $HalfdimefaceVal + $nickelfaceVal + $dimefaceVal + $TwentyfaceVal + $quarterfaceVal + $HalfdollarfaceVal + $dollarfaceVal;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Spending Report</title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount Spent'],
          ['1 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Gold_Dollar', $userID) ?>],
          ['2 1/2',  <?php echo $collection->getTotalInvestmentSumByCategory('Quarter_Eagle', $userID) ?>],
          ['3 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Three_Dollar', $userID) ?>],
          ['4 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Four_Dollar', $userID) ?>],
		  ['5 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Five_Dollar', $userID) ?>],
          ['10 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Ten_Dollar', $userID) ?>],
          ['20 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Twenty_Dollar', $userID) ?>],
          ['25 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Twenty_Five_Dollar', $userID) ?>],
          ['50 Dollar',  <?php echo $collection->getTotalInvestmentSumByCategory('Fifty_Dollar', $userID) ?>]
		  
        ]);
		   var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['eBay', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='eBay'); ?>],
              ['U.S. Mint', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Mint'); ?>],
              ['Coin Shops', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Shop'); ?>],
              ['Undefined', <?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='None'); ?>]
            ]);

        var options = {
          title: 'Dollars Spent',
		  colors: ['#b39477'],
          hAxis: {title: 'All Small Cents', titleTextStyle: {color: 'black'}}
        };
		var formatter = new google.visualization.NumberFormat(
      {prefix: '$', negativeColor: 'red', negativeParens: true});
      formatter.format(data, 1); // Apply formatter to second column

        
	  
	  var options2 = {'title':'Investment Sources',
                           'width':300,
						   slices: {0: {color: '#b39477'}, 3: {color: '#907760'}},
                           'height':300};
      
	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      
	  
	  var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);		
			}				   
    </script>
<style type="text/css">
h1 {margin-bottom:0px;}
#monthInvestTbl {font-size:75%;}
.smallTxt {font-size:85%;}
#monthInvestTbl tr:hover
{
        background-color:#333;
		color:#fff;
}

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/Gold_Mixed.jpg" width="100" height="100" align="middle"> <?php echo $year ?>  Gold Investment Dashboard</h1>
<?php include("../inc/pageElements/dashboardGoldTbl.php"); ?>
<br />

<table width="221" border="0" cellspacing="3">
<td width="139"><strong>Total Investment</strong></td>
    <td width="37">$<?php echo $Bullion->getGoldSumByID($userID); ?></td>
  </tr>

    </table>
  <h3>All Time Gold Investments</h3>  
 <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="82%" rowspan="14" valign="top">
        <div id="chart_div" style="width:100%; height: 350px;"></div>
      </td>
    </tr>
    <tr class="smallTxt">
      <td height="20"><strong><a href="Gold_Dollar.php">One</a></strong></td>
    <td width="8%" height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Gold_Dollar', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="Quarter_Eagle.php">Quarter Eagle</a><a href="Half_Cent.php"></a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Quarter_Eagle', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td width="10%" height="20"><strong><a href="Three_Dollar.php">Three </a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Three_Dollar', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="Four_Dollar.php">Four </a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Four_Dollar', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="Five_Dollar.php">Five </a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Five_Dollar', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="Ten_Dollar.php">Ten </a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Ten_Dollar', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="Twenty_Dollar.php">Twenty </a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Twenty_Dollar', $userID); ?></td>
    </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="Twenty_Five_Dollar.php">Twenty Five </a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Twenty_Five_Dollar', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20"><strong><a href="Fifty_Dollar.php">Fifty</a></strong></td>
    <td height="20" align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory='Fifty_Dollar', $userID); ?></td>
   </tr>
  <tr class="smallTxt">
    <td height="20">&nbsp;</td>
    <td height="20" align="right">&nbsp;</td>
   </tr>
  <tr class="smallTxt">
    <td height="9">&nbsp;</td>
    <td height="9" align="right">&nbsp;</td>
   </tr>
  <tr class="smallTxt">
    <td height="20">&nbsp;</td>
    <td height="20" align="right">&nbsp;</td>
    </tr>
  <tr class="smallTxt">
    <td height="4">&nbsp;</td>
    <td height="4" align="right">&nbsp;</td>
  </tr>
  <tr class="smallTxt">
    <td height="20">&nbsp;</td>
    <td height="20" align="right">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
 </table>
 <hr />

<h3><?php echo $year ?>  Report</h3>
<table width="500" border="0">
  <tr>
    <td width="87">   
    <select id="yearSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Switch Year</option>
<?php 
   foreach(range(1990, date("Y")) as $newYear){
      echo "<option value='reportSpendingCategory.php?coinCategory=Small_Cent&year=$newYear'>$newYear</option>";
   }
?>
</select>
    </td>
    <td width="313">&nbsp;</td>
    <td width="86">&nbsp;</td>
  </tr>
</table>
<h3>Gold Coins</h3>
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
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="Gold_Dollar.php">One</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Gold_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Gold_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Quarter_Eagle.php">Quarter Eagle</a><a href="Half_Cent.php"></a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Quarter_Eagle', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="10%"><strong><a href="Three_Dollar.php">Three </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Three_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Three_Dollar', $userID,$year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Four_Dollar.php">Four </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Four_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Four_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Five_Dollar.php">Five </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Five_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Ten_Dollar.php">Ten </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Ten_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Twenty_Dollar.php">Twenty </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Twenty_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Twenty_Five_Dollar.php">Twenty Five </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Five_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Twenty_Five_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Fifty_Dollar.php">Fifty</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Fifty_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="10%"><strong>Totals</strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='01', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='02', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='03', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='04', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='05', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='06', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='07', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='08', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='09', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='10', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='11', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='12', $year) ?></strong></td>
    <td align="right">&nbsp;</td>
  </tr>
</table>

<br />
<h3>Commemorative Only</h3>
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
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="Quarter_Eagle.php">Quarter Eagle</a><a href="Half_Cent.php"></a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Quarter_Eagle', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Quarter_Eagle', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Five_Dollar.php">Five </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Five_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Five_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Ten_Dollar.php">Ten </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Ten_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Ten_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Twenty_Dollar.php">Twenty </a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Twenty_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Twenty_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td><strong><a href="Fifty_Dollar.php">Fifty</a></strong></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='01', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='02', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='03', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='04', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='05', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='06', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='07', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='08', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='09', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='10', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='11', $year) ?></td>
    <td width="70" align="right"><?php echo $Invest->getMonthlyInvestmentByCategory($coinCategory='Fifty_Dollar', $userID, $month='12', $year) ?></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentCategory($coinCategory='Fifty_Dollar', $userID, $year) ?></strong></td>
  </tr>
  <tr>
    <td width="10%"><strong>Totals</strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='01', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='02', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='03', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='04', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='05', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='06', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='07', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='08', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='09', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='10', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='11', $year) ?></strong></td>
    <td align="right"><strong><?php echo $Invest->getMonthlyInvestmentByID($userID, $month='12', $year) ?></strong></td>
    <td align="right">&nbsp;</td>
  </tr>
</table>
<hr />


<table width="900" border="0">
  <tr>
    <td colspan="2"><h3>Purchase Sources</h3></td>
    <td width="580" rowspan="7" valign="top">
      <div id="chart_div2" style="width: 300px; height: 300px;"></div>
    </td>
    <td width="93">&nbsp;</td>
  </tr>
  <tr>
    <td width="114"><strong>Sources</strong></td>
    <td width="95"><strong># Bought</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="114"><strong>eBay</strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='eBay'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>U.S. Mint</strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Mint'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Coin Shops</strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Shop'); ?></td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><strong>Undefined</strong></td>
    <td valign="top"><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='None'); ?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>