<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinID'])) { 

$year = intval($_GET['year']);
$month = preg_replace('#[^0-9]#i', '', $_GET['month']);
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
<title><?php echo $coinName ?> <?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year ?> Investments</title>
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
<h2><img src="../img/<?php echo $coinVersion ?>.jpg" width="70" height="70" align="middle"> <?php echo $coinName ?> Investment Dashboard</h2>

<h3 class="brownLink">  <a class="brownLink" href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>"><?php echo substr($coin->getCoinName(), 0, 4); ?></a>  | <a class="brownLink" href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> | <a class="brownLink" href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1"><?php echo $coinType ?></a></h3>
<?php include ("../inc/pageElements/coinLinks.php");?>

<table width="221" border="0" cellspacing="3">
<td width="139"><strong>Total Investment</strong></td>
    <td width="37" align="right">$<?php echo $Invest->getMonthlyInvestmentByCoin($coinID, $userID, $month, $year) ?></td>
  </tr>
  </table>
  <hr />

<table width="489" border="0" cellspacing="3" id="investmentTbl">
  <td width="331" valign="middle"><h3><img src="../img/purchases.jpg" alt="purchaes" width="50" height="50" align="absmiddle" /> <?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year ?> Investments</h3></td>
    <td width="145" align="left" valign="middle"><select name="yearSwitch" id="yearSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<?php     

switch ($year)
{
case date('Y'):

$listMonth=date('m');

foreach(range(12,1) as $i)
{
  if($i<=$listMonth):    
  echo "<option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=".date('m',mktime(0,0,0,$i))."'>".date('F',mktime(0,0,0,$i))."</option>";
  endif;
} 
  break;
default:

  echo "
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=01'>January</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=02'>February</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=03'>March</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=04'>April</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=05'>May</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=06'>June</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=07'>July</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=08'>August</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=09'>September</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=10'>October</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=11'>November</option>
  <option value='viewCoinFinanceDetail.php?coinID=$coinID&year=$year&month=12'>December</option>
  
  
  ";
}

   
?>    
 </select></td>
  </tr>
</table>


<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="53%">Year / Mint</td>
    <td width="17%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("
SELECT * 
FROM collection
WHERE MONTH( purchaseDate ) =  '".$month."'
AND YEAR( purchaseDate ) =  '".$year."'
AND coinID =  '".$coinID."'
AND userID =  '".$userID."'
") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
	<td>&nbsp;</td>
    <td>None collected during the month of '. date( 'F', mktime(0, 0, 0, $month) ).'</td>
	<td></td><td></td>
	<td></td>	   
  </tr> ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img class="typeIcon" align="middle" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />';
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="middle" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="middle" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="middle" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="middle" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr class="gryHover" align="center"> 
	<td width="3%" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).' '.$collection->getVarietyForCoin(intval($row['collectionID'])).'</a></td>
	<td>'. $collection->getCoinGrade().str_replace(' ', '', $collection->getCoinAttribute(intval($row['collectionID']), $userID)).$grader.'</td>
		<td>'.date("M j Y ",strtotime($collection->getCoinDate())) .'</td>
	<td>'. $collection->getCoinPrice() .'</td>	   	  
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="53%">Year / Mint</td>
    <td width="17%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>