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
<title>My Collection</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h1><img class="hidden-xs" src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle"> My Collection</h1>
<table width="100%" class="table">
  <tr>
    <td width="36%"><strong> Collected </strong></td>
    <td width="64%"><?php echo $collection->getCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Unique</strong></td>
    <td><?php echo $collection->getUniqueCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Investment</strong></td>
    <td>$<?php echo $collection->getCoinSumByAccount($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Face Value</strong></td>
    <td>$<?php echo $collection->getCoinFaceValueByAccount($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Mint  Progress</strong></td>
    <td><?php echo $collection->getByMintCountByID($userID); ?> of <?php echo $coin->getCoinByMintCount(); ?> (<?php echo percent($collection->getByMintCountByID($userID), $coin->getCoinByMintCount()); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete  Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionById($userID); ?> of <?php echo $coin->getCoinProgressCount(); ?> (<?php echo percent($collection->getCompleteCollectionById($userID), $coin->getCoinProgressCount()) ?>%)</td>
  </tr>
  </table>
  <hr>

<h3>Collected Amounts By Category</h3>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#circulated" data-toggle="tab">Circulated</a></li>
  <li><a href="#commemorative" data-toggle="tab">Commemorative</a></li>
  <li><a href="#bullion" data-toggle="tab">Bullion</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="circulated">
<div class="table-responsive">
<table class="table table-hover">
    <tr class="active">
    <td class="darker"><strong>Types</strong></td>
    <td align="center" class="darker"><strong>Collected</strong></td>    
    <td align="center" class="darker"> <strong>Investment</strong></td>
  </tr>
  
  <tr>
  <td><a href="Half_Cent.php">Half Cents</a></td>
  <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Half Cent', $userID); ?></td>  
  <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Half Cent', $userID); ?></td>
</tr>
  <tr>
    <td><a href="Large_Cent.php">Large Cents</a></td>
     <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Large Cent', $userID); ?></td>  
     <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Large Cent', $userID); ?></td>
  </tr>
  

 <tr>
    <td><a href="Small_Cent.php">Small Cents</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Small Cent', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Small Cent', $userID); ?></td>
 </tr>

<tr>
    <td><a href="Two_Cent.php">Two Cents</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Two_Cent', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Two_Cent', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Three_Cent.php">Three Cents</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Three_Cent', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Three_Cent', $userID); ?></td>
 </tr> 
 
 <tr>
 <td><a href="Half_Dime.php">Half Dimes</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Half_Dime', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Half_Dime', $userID); ?></td>
 </tr>

 <tr>
    <td><a href="Nickel.php">Nickels</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Nickel', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Nickel', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Dime.php">Dimes</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Dime', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Dime', $userID); ?></td>
 </tr>

 <tr>
    <td><a href="Twenty_Cent.php">Twenty Cents</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Twenty_Cent', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Twenty_Cent', $userID); ?></td>
 </tr>

  <tr>
    <td><a href="Quarter.php">Quarters</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Quarter', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Quarter', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Half_Dollar.php">Half Dollars</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Half_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Half_Dollar', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Dollar.php">Dollars</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Dollar', $userID); ?></td>
 </tr>
 
 <tr class="active">
   <td><strong>Totals</strong></td>
   <td align="center"><strong><?php echo $collection->getCollectionCountById($userID); ?></strong></td>
   <td align="center"><strong><?php echo $collection->getCoinSumByAccount($userID); ?></strong></td>
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
  <div class="table-responsive">
<table class="table table-hover">
    <tr class="active">
    <td class="darker"><strong>Types</strong></td>
    <td align="center" class="darker"><strong>Collected</strong></td>    
    <td align="center" class="darker"> <strong>Investment</strong></td>
  </tr>
  
  <tr>
  <td><a href="Gold_Dollar.php">Gold Dollar</a></td>
  <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Gold_Dollar', $userID); ?></td>  
  <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Gold_Dollar', $userID); ?></td>
</tr>
  <tr>
    <td><a href="Quarter_Eagle.php">Quarter Eagle</a></td>
     <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Quarter_Eagle', $userID); ?></td>  
     <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Quarter_Eagle', $userID); ?></td>
  </tr>
  

 <tr>
    <td><a href="Three_Dollar.php">Three Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Three_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Three_Dollar', $userID); ?></td>
 </tr>

<tr>
    <td><a href="Four_Dollar.php">Four Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Four_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Four_Dollar', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Five_Dollar.php">Five Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Five_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Five_Dollar', $userID); ?></td>
 </tr> 
 
 <tr>
 <td><a href="Ten_Dollar.php">Ten Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Ten_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Ten_Dollar', $userID); ?></td>
 </tr>

 <tr>
    <td><a href="Twenty_Dollar.php">Twenty Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Twenty_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Twenty_Dollar', $userID); ?></td>
 </tr>
 
  <tr>
    <td><a href="Twenty_Five_Dollar.php">Twenty Five Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Twenty_Five_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Twenty_Five_Dollar', $userID); ?></td>
 </tr>

 <tr>
    <td><a href="Fifty_Dollar.php">Fifty Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('Fifty_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('Fifty_Dollar', $userID); ?></td>
 </tr>

  <tr>
    <td><a href="One_Hundred_Dollar.php">One Hundred Dollar</a></td>
    <td align="center"><?php echo $collection->getTotalCollectedCoinsByID('One_Hundred_Dollar', $userID); ?></td>
    <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory('One_Hundred_Dollar', $userID); ?></td>
 </tr>

 <tr class="active">
   <td><strong>Totals</strong></td>
   <td align="center"><strong><?php echo $collection->getCollectionCountById($userID); ?></strong></td>
   <td align="center"><strong><?php echo $collection->getCoinSumByAccount($userID); ?></strong></td>
 </tr>
</table>
</div>
  </div>
  
</div>

<p>&nbsp;</p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>