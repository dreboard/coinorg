<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Gold Report</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><img src="../img/Mixed_Ten.jpg" width="100" height="100" align="middle" class="hidden-xs">   Gold Report</h2>

<table class="table">
  <tr>
    <td width="36%"><strong> Collected </strong></td>
    <td width="64%"><?php echo $Bullion->getCompleteGoldCollectionById($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Investment</strong></td>
    <td>$<?php echo $Bullion->getGoldReportSumByAccount($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Certified</strong></td>
    <td><?php echo $Bullion->getGoldCertificationCountById($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Face Value</strong></td>
    <td>$<?php echo $collection->getTotalGoldFaceValSumByCategory($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Mint  Progress</strong></td>
    <td><?php echo $Bullion->getByMintCountByID($userID); ?> of <?php echo $Bullion->getTotalByMintCount(); ?> (<?php echo percent($Bullion->getByMintCountByID($userID), $Bullion->getTotalByMintCount()); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete  Progress</strong></td>
    <td><?php echo $Bullion->getCompleteGoldCollectionById($userID); ?> of <?php echo $Bullion->getTotalGoldCount(); ?> (<?php echo percent($Bullion->getCompleteGoldCollectionById($userID), $Bullion->getTotalGoldCount()) ?>%)</td>
  </tr>
  </table>
  
  <h3>Type Collection <?php echo $Bullion->getGoldCollectionProgressByID($userID) ?> of 9 (<?php echo percent($Bullion->getGoldCollectionProgressByID($userID), '9'); ?>%)</h3>
  <div class="table-responsive">
  <table class="table">
  <tr class="setSixRow" valign="top">
    <td><a href="Gold_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Gold Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Gold_Dollar.php">One Dollar</a></td>
    <td><a href="Quarter_Eagle.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Quarter_Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Quarter_Eagle.php">Quarter Eagle</a></td>
    <td><a href="Three_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Three Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Three_Dollar.php">Three Dollar</a></td>
    <td><a href="Four_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Four Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Four_Dollar.php">Four Dollar</a></td>
    <td><a href="Five_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Five_Dollar.php">Five Dollar</a></td>
    <td><a href="Ten_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Ten Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Ten_Dollar.php">Ten Dollar</a></td>
  </tr>
  <tr class="setSixRow" valign="top">
    <td><a href="Twenty_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Twenty Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Twenty_Dollar.php">Twenty Dollar</a></td>
    <td><a href="Twenty_Five_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Twenty_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Twenty_Five_Dollar.php">Twenty Five Dollar</a></td>
    <td><a href="Fifty_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Fifty Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="Fifty_Dollar.php">Fifty Dollar</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
 </div> 

  <h3>U.S. Gold Custom Type Reports</h3>
<div class="table-responsive">
<table class="table">
    <tr class="setFourRow">
    <td><strong>By Century</strong></td>
    <td><strong> Commemorative</strong></td>
    <td><strong>Type</strong></td>
    <td><strong>By Year</strong></td>
    </tr>
  <tr class="setFourRow">
    <td><a href="reportEighteenthGold.php" class="brownLink">18th Century Gold</a></td>
    <td><a href="goldCommemorative.php?coinCategory=Dollar" class="brownLink">Dollar</a></td>
    <td><a href="viewKeyReport.php" class="brownLink">American Eagle</a></td>
    <td><form action="viewGoldYear.php" method="get" class="compactForm">
  <select name="century">
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  </select>
  <select name="theYear">
  <option value="00">00</option>
  <?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?>
  </select>
      
  <input name="getYear" type="submit" value="Go" />
</form></td>
    </tr>
  <tr class="setFourRow">
    <td><a href="reportNineteenthGold.php" class="brownLink">19th Century Gold</a></td>
    <td><a href="goldCommemorative.php?coinCategory=Quarter_Eagle" class="brownLink">Quarter Eagle</a></td>
    <td><a href="viewKeyReport.php" class="brownLink">American Buffalo</a></td>
    <td>&nbsp;</td>
    </tr> 
  <tr class="setFourRow">
     <td><a href="reportTwentiethGold.php" class="brownLink">20th Century Gold</a></td>
    <td><a href="goldCommemorative.php?coinCategory=Five_Dollar" class="brownLink">Five Dollar</a></td>
    <td><a href="proofBullionCoins.php?coinMetal=Gold">Proof</a></td>
    <td>&nbsp;</td>
    </tr>
 <tr class="setFourRow">
    <td><a href="reportTwentyfirstGold.php" class="brownLink">21st Century Gold</a></td>
    <td><a href="goldCommemorative.php?coinCategory=TenDollar" class="brownLink">Ten Dollar</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
 <tr class="setFourRow">
    <td>&nbsp;</td>
    <td><a href="goldCommemorative.php?coinCategory=Fifty_Dollar" class="brownLink">Fifty Dollar</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
</div>



<ul class="nav nav-tabs">
  <li class="active"><a href="#circulated" data-toggle="tab">Coins</a></li>
  <li><a href="#commemorative" data-toggle="tab">Commemorative</a></li>
  <li><a href="#bullion" data-toggle="tab">Mint Sets</a></li>
</ul>


<div class="tab-content">
  <div class="tab-pane active" id="circulated">
<div class="table-responsive">
<table class="table table-hover">
    <tr class="active darker">
    <td width="291" class="darker">Types</td>
    <td width="335" align="center">Collected </td>    
    <td width="338" align="center"> Investment</td>
  </tr>
  
 <tr>
   <td><a href="Gold_Dollar.php" class="brownLink"> Dollar</a>
     <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Gold Dollar', $userID); ?></td>
   <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Gold Dollar', $userID); ?></td>
 </tr>

 <tr>
    <td><a href="Quarter_Eagle.php" class="brownLink">Quarter Eagle</a></td>
    <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Quarter Eagle', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Quarter Eagle', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Dime.php" class="brownLink">Three Dollars</a></td>
    <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Three Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Three Dollar', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Four_Dollar.php" class="brownLink">Four Dollars</a></td>
    <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Four Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Four Dollar', $userID); ?></td>
  </tr>
 <tr>
   <td><a href="Five_Dollar.php" class="brownLink">Five Dollars</a>
     <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Five Dollar', $userID); ?></td>
   <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Five Dollar', $userID); ?></td>
 </tr>

 <tr>
    <td><a href="Ten_Dollar.php" class="brownLink">Ten Dollars</a></td>
    <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Ten Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Ten Dollar', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Twenty_Dollar.php" class="brownLink">Twenty Dollars</a></td>
    <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Twenty Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Twenty Dollar', $userID); ?></td>
 </tr>
   <tr>
    <td><a href="Twenty_Five_Dollar.php" class="brownLink">Twenty Five Dollars</a></td>
    <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Twenty Five Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Twenty Five Dollar', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Fifty_Dollar.php" class="brownLink">Fifty Dollars</a></td>
    <td align="center"><?php echo  $collection->getTotalCollectedCoinsByID('Fifty Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Fifty Dollar', $userID); ?></td>
  </tr>
 
 <tr class="active darker">
   <td>Totals</td>
   <td align="center"><?php echo $Bullion->getCompleteGoldCollectionById($userID); ?></td>
   <td align="center"><?php echo $Bullion->getGoldReportSumByAccount($userID); ?></td>
 </tr>
</table>
</div>  
  </div><!--/END HOME TAB-->
  <div class="tab-pane" id="commemorative">
  <div class="table-responsive">
<table class="table table-hover">
    <tr class="active">
    <td class="darker"><strong>Types</strong></td>
    <td align="center" class="darker"><strong>Collected</strong></td>    
    <td align="center" class="darker"> <strong>Investment</strong></td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Commemorative_Quarter">Quarter</a></td>
  <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Commemorative_Quarter', $userID); ?></td>  
  <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Commemorative_Quarter', $userID); ?></td>
</tr>
  <tr>
    <td><a href="viewListReport.php?coinType=Commemorative_Half_Dollar">Half Dollar</a></td>
     <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Commemorative_Half_Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Commemorative_Half_Dollar', $userID); ?></td>
  </tr>
  

 <tr>
    <td><a href="viewListReport.php?coinType=Commemorative_Dollar">Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Commemorative_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Commemorative_Dollar', $userID); ?></td>
 </tr>

<tr>
    <td><a href="viewListReport.php?coinType=Commemorative_Quarter_Eagle">Quarter Eagle</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Commemorative_Quarter_Eagle', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Commemorative_Quarter_Eagle', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="viewListReport.php?coinType=Commemorative_Five_Dollar">Five Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Commemorative_Five_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Commemorative_Five_Dollar', $userID); ?></td>
 </tr> 
 
 <tr>
 <td><a href="viewListReport.php?coinType=Commemorative_Ten_Dollar">Ten Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Commemorative_Ten_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Commemorative_Ten_Dollar', $userID); ?></td>
 </tr>

 <tr>
    <td><a href="viewListReport.php?coinType=Commemorative_Fifty_Dollar">Fifty Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Commemorative_Fifty_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Commemorative_Fifty_Dollar', $userID); ?></td>
 </tr>
 
 <tr class="active">
   <td><strong>Totals</strong></td>
   <td align="center"><strong><?php echo $collection->getCollectionCountById($userID); ?></strong></td>
   <td align="center"><strong><?php echo $collection->getCoinSumByAccount($userID); ?></strong></td>
 </tr>
</table>
</div>
  </div>
  <div class="tab-pane" id="bullion">
  <div class="table-responsive" id="goldTabs">
<table class="table table-hover">
  <tr class="active darker">
    <td width="72%"><h3>Coin Set</h3></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM mintset WHERE coinMetal = 'Gold' ORDER BY coinYear DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisMintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewSet.php?ID=' . $thisMintsetID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID($thisMintsetID, $userID).'</td>
  </tr>';

	}
?>
</table>
</table>
</div>
  </div>
  
</div>








<p><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>