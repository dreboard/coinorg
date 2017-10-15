<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 
$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);
$year = intval($_GET["year"]);
$denomination = $coin->getDenomination();

$coinfaceval = $collection->getCoinIDCount($coinID) * $denomination;

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?> Investment Dashboard</title>
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
          ['Flying Eagle',  <?php echo $Invest->getTotalInvestmentByType('Flying_Eagle', $userID) ?>],
          ['Indian Head',  <?php echo $Invest->getTotalInvestmentByType('Indian_Head', $userID) ?>],
          ['Lincoln Wheat',  <?php echo $Invest->getTotalInvestmentByType('Lincoln_Wheat', $userID) ?>],
          ['Lincoln Memorial',  <?php echo $Invest->getTotalInvestmentByType('Lincoln_Memorial', $userID) ?>],
		  ['Lincoln Bicentennial',  <?php echo $Invest->getTotalInvestmentByType('Lincoln_Bicentennial', $userID) ?>],
          ['Union Shield',  <?php echo $Invest->getTotalInvestmentByType('Union_Shield', $userID) ?>]
        ]);
		   var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['eBay', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='eBay'); ?>],
              ['U.S. Mint', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Mint'); ?>],
              ['Coin Shops', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='Coin Shop'); ?>],
              ['Undefined', <?php echo $Invest->getCategoryPurchaseFrom($coinCategory, $userID, $purchaseFrom='None'); ?>]
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
#investmentTbl h3 {margin:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><img src="../img/<?php echo $coinVersion ?>.jpg" width="100" height="100" align="absmiddle" /> My <a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><?php echo $coinName ?></a> Investment Dashboard</h2>

<h3>  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLinkBold"><?php echo substr($coin->getCoinName(), 0, 4); ?></a>  | <a href="<?php echo $categoryLink ?>.php" class="brownLinkBold"><?php echo $coinCategory ?></a> | <a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLinkBold"><?php echo $coinType ?></a></h3>
<?php include ("../inc/pageElements/coinLinks.php");?><br />

<table width="221" border="0" cellspacing="3">
<td width="139"><strong>Total Investment</strong></td>
    <td width="37" align="right">$<?php echo $collection->getCoinSumById($coinID, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td align="right">$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
    </tr>
  </table>
  <hr />
<h3><?php echo $coinName ?> Price Guide</h3>
<table width="100%" border="1" id="priceListTbl" cellpadding="3">
  <tr class="keyRow">
    <td>G-4</td>
    <td>VG-8</td>
    <td>F-12</td>
    <td>VF-20</td>
    <td>EF-40</td>
    <td>AU-50</td>
    <td>MS-60</td>
    <td>MS-63</td>
    <td>MS-65</td>
    <td>PR63</td>
    <td>PR65</td>
  </tr>

  <tr>
    <td><?php echo $coin->getG4(); ?></td>
    <td><?php echo $coin->getVG8() ?></td>
    <td><?php echo $coin->getF12() ?></td>
    <td><?php echo $coin->getVF20() ?></td>
    <td><?php echo $coin->getEF40() ?></td>
    <td><?php echo $coin->getAU50() ?></td>
    <td><?php echo $coin->getMS60() ?></td>
    <td><?php echo $coin->getMS63() ?></td>
    <td><?php echo $coin->getMS65() ?></td>
    <td><?php echo $coin->getPR63() ?></td>
    <td><?php echo $coin->getPR65() ?></td>
  </tr>
</table>

<hr />

<h3>Investment History</h3>
<table width="745" border="0" cellspacing="3">
    <td width="183"><strong>Most Recent Purchase:</strong></td>
    <td width="549" align="left"><?php echo $Invest->getMostRecentByCoin($coinID, $userID) ?></td>
  </tr><tr>
    <td><strong>Largest Purchase:</strong></td>
    <td align="left"><?php echo $Invest->getMaxPurchaseCoinID($coinID, $userID);?></td>
  </tr>
  </table>
<hr />

<table width="489" border="0" cellspacing="3" id="investmentTbl">
  <td width="239"><h3><img src="../img/purchases.jpg" alt="purchaes" width="50" height="50" align="absmiddle" /> <?php echo $year ?> Investments</h3></td>
    <td width="237" align="left"><select name="yearSwitch" id="yearSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Year</option>
      <?php 
   foreach(range(1990, date("Y")) as $newYear){
      echo "<option value='viewCoinFinance.php?coinID=$coinID&year=$newYear'>$newYear</option>";
   }
?>
    </select></td>
  </tr>
  </table>

<table width="100%" border="0" id="monthInvestTbl">
  <tr align="left">
    <td><strong>Jan</strong></td>
    <td><strong>Feb</strong></td>
    <td><strong>Mar</strong></td>
    <td><strong>Apr</strong></td>
    <td><strong>May</strong></td>
    <td><strong>Jun</strong></td>
    <td><strong>Jul</strong></td>
    <td><strong>Aug</strong></td>
    <td><strong>Sep</strong></td>
    <td><strong>Oct</strong></td>
    <td><strong>Nov</strong></td>
    <td><strong>Dec</strong></td>
    <td align="right"><strong>Total</strong></td>
  </tr>
  <tr align="left">
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='01'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='01', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='02'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='02', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='03'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='03', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='04'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='04', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='05'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='05', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='06'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='06', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='07'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='07', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='08'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='08', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='09'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='09', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='10'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='10', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='11'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='11', $year) ?></a></td>
    <td width="70"><a href="viewCoinFinanceDetail.php?coinID=<?php echo $coinID ?>&month='12'&year=<?php echo $year ?>"><?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month='12', $year) ?></a></td>
    <td width="70" align="right"><strong><?php echo $Invest->getYearInvestmentByCoin($coinID, $userID, $year) ?></strong></td>
  </tr>
</table>


<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>