<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Half Dollar';
$coinVal = '.50';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;
$categoryLink = str_replace(' ', '_', $coinCategory);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Half Dollar Collection</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
<div class="container fill-height">
 <h1><img src="../img/Mixed_Half_Dollars.jpg" width="100" height="100" align="middle"> Half Dollars</h1>
<div class="table-responsive">
<table width="100%" class="table table-hover">
  <tr>
    <td width="31%"><strong>Total Collected </strong></td>
    <td width="69%"><?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?> (<?php echo $collection->getUniqueCollectionCountByCategory($userID, $coinCategory) ?> Unique)</td>
  </tr>
    <tr>
    <td><strong>Bulk Coins</strong></td>
    <td><?php echo $BulkCoin->getTotalCollectedCoinsByID($userID, $coinCategory) ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type  Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 8 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '8'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint  Progress</strong></td>
    <td><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory); ?> (<?php echo percent($collection->getByMintCountByCategoryByMint($userID, $coinCategory), $collection->getTotalByMintCountByCategory($coinCategory)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete  Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionCategoryById($userID, $coinCategory); ?> of <?php echo $collection->getCompleteCollectionCategoryCount($coinCategory); ?> (<?php echo percent($collection->getCompleteCollectionCategoryById($userID, $coinCategory), $collection->getCompleteCollectionCategoryCount($coinCategory)) ?>%)</td>
  </tr>
</table>
 </div> 
  
 <?php include("../inc/pageElements/categoryLinks.php"); ?>
 <br>
<div class="row">
  <div class="col-md-8">

<div class="visible-xs">    
<a href="reportGraphCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>"  role="button" class="btn btn-default btn-lg btn-block"><strong> Detailed Progress View</strong></a>
    <a href="reportSpendingCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>&year=<?php echo $year; ?>"  role="button" class="btn btn-default btn-lg btn-block"><strong> Financial Report</strong></a>
    <br />
</div>

<div class="hidden-xs">
    <a href="reportGraphCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>"  role="button" class="btn btn-default"><strong> Detailed Progress View</strong></a>
    <a href="reportSpendingCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>&year=<?php echo $year; ?>"  role="button" class="btn btn-default"><strong> Financial Report</strong></a>

    <a href="reportPrintCategory.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>" role="button" class="btn btn-default"><strong> Print View</strong></a>
</div>


  </div>
  <div class="col-md-4"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="Half_Cent.php">Half Cents</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="Large_Cent.php">Large Cent</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="Small_Cent.php">Small Cents</option>
        <option value="viewListReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewListReport.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="Two_Cent.php">Two Cent</option>
        <option value="viewListReport.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="Three_Cent.php">Three Cent</option>
        <option value="viewListReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewListReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="Half_Dime.php">Half Dime</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="Nickel.php">Nickel</option>
        <option value="viewListReport.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewListReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewListReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewListReport.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewListReport.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewListReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="Dime.php">Dime</option>
        <option value="viewListReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewListReport.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewListReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewListReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="Twenty_Cent.php">Twenty Cent Grades</option>
        <option value="viewListReport.php?coinType=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="Quarter.php">Quarter</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewListReport.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewListReport.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewListReport.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewListReport.php?coinType=State Quarter">State Quarter</option>
        <option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewListReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="Half_Dollar.php">Half Dollar</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewListReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewListReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewListReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="Dollar.php">Dollar</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewListReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewListReport.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewListReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewListReport.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewListReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewListReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewListReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></div>
</div>

    <br />
<h3>Half Dollar Type Collection <?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 8 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '8'); ?>%)</h3>


<div class="table-responsive">
<table class="table">
  <tr class="setSixRow" valign="top"> 

<td><a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Flowing Hair Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair</a> </td>

<td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust</a> </td>
  
<td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Liberty Cap Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap</a> </td>
  
<td><a href="viewListReport.php?coinType=Seated_Liberty_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Seated Liberty Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty</a> </td>  
  
<td><a href="viewListReport.php?coinType=Barber_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Barber Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Barber_Half_Dollar">Barber</a> </td>
  
<td><a href="viewListReport.php?coinType=Walking_Liberty"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Walking Liberty', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Walking_Liberty">Walking Liberty </a> </td>
  </tr>
  <tr class="setSixRow" valign="top"> 
<td><a href="viewListReport.php?coinType=Franklin_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Franklin Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Franklin_Half_Dollar">Franklin</a> </td>
  
<td> <a href="viewListReport.php?coinType=Kennedy_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Kennedy Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy</a> </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
 </table>
 </div>
 <hr />

 <div class="table-responsive">
<table class="table table-hover clearfix">
    <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
 <tr class="active darker">
  <td><a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar" class="brownLink">Flowing Hair</a> (1794-1795)</td>
  <td align="center"><?php echo $collection->getReportTypeCount('Flowing Hair Half Dollar', $userID); ?></td>  
  <td align="center"><?php echo $collection->getSumTypeCount('Flowing Hair Half Dollar', $userID)?></td>
</tr>

  <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar" class="brownLink">Draped Bust</a> (1796-1807)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Draped Bust Half Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Draped Bust Half Dollar', $userID)?></td>
  </tr>
  
  <tr>
    <td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Dollar" class="brownLink">Liberty Cap</a> (1807-1839)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Liberty Cap Half Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Liberty Cap Half Dollar', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Seated_Liberty_Half_Dollar" class="brownLink">Seated Liberty</a> (1839-1891)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Seated Liberty Half Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Seated Liberty Half Dollar', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Barber_Half_Dollar" class="brownLink">Barber</a> (1892-1916)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Barber Half Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Barber Half Dollar', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Walking_Liberty" class="brownLink">Walking Liberty</a> (1916-1947)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Walking Liberty', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Walking Liberty', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Franklin_Half_Dollar" class="brownLink">Franklin</a> (1948-1963)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Franklin Half Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Franklin Half Dollar', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Kennedy_Half_Dollar" class="brownLink">Kennedy</a> (1964-Present)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Kennedy Half Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Kennedy Half Dollar', $userID)?></td>
  </tr>


 <tr class="active darker">
   <td>Totals</td>
   <td align="center"><?php echo $collectTotal; ?></td>
   <td align="center"><?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
 </tr>
</table>
<br />
</div>

<p class="hidden-xs">
<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=11968&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/ads/Half_Dollar_ebay_ad.jpg" width="900" height="100" border="0" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&mpt=[CACHEBUSTER]"></p>
  <!--Content Below-->

  <p class="clearfix"><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>