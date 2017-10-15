<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
$CoinTypes->getCoinByType($coinType);
$coinMetal = $coin->getMetalByType($coinType);

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

  $totalByTypeCount = $coin->getCoinCountType($coinType);
  $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
  $typePercent = $General->percent($uniqueCount, $byMintCount);
  $typeAllPercent = $General->percent($uniqueCount, $totalByTypeCount); 
$categoryLink = str_replace(' ', '_', $coin->getCategoryByType($coinType));

 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo str_replace('_', ' ', $_GET["coinType"]) ?> Report</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
<div class="container fill-height">
<div class="row">
  <div class="col-md-2  hidden-xs hidden-sm"><img src="../img/<?php echo $_GET["coinType"]; ?>.jpg" class="oneHundredWidth" title="<?php echo $coinType ?>" /></div>
  <div class="col-md-8"><h2> <?php echo str_replace('_', ' ', $_GET["coinType"]) ?><br /><small><strong>Type:</strong> <a href="<?php echo $categoryLink ?>.php" class="brownLinkBold"><?php echo $coin->getCategoryByType(str_replace('_', ' ', $_GET["coinType"])) ?></a></small></h2></div>
  <div class="col-md-2"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent&amp;year=<?php echo date('Y') ?>">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Cent&amp;year=<?php echo date('Y') ?>">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Half_Cent&amp;year=<?php echo date('Y') ?>">Classic Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Half_Cent&amp;year=<?php echo date('Y') ?>">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent&amp;year=<?php echo date('Y') ?>">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent&amp;year=<?php echo date('Y') ?>">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Large_Cent&amp;year=<?php echo date('Y') ?>">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Large_Cent&amp;year=<?php echo date('Y') ?>">Classic Head</option>
        <option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent&amp;year=<?php echo date('Y') ?>">Coronet Liberty Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent&amp;year=<?php echo date('Y') ?>">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewListReport.php?coinType=Flying_Eagle&amp;year=<?php echo date('Y') ?>">Flying Eagle Cent</option>
        <option value="viewListReport.php?coinType=Indian_Head&amp;year=<?php echo date('Y') ?>">Indian Head Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Wheat&amp;year=<?php echo date('Y') ?>">Lincoln Wheat Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Memorial&amp;year=<?php echo date('Y') ?>">Lincoln Memorial Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Bicentennial&amp;year=<?php echo date('Y') ?>">Lincoln Bicentennial</option>
        <option value="viewListReport.php?coinType=Union_Shield&amp;year=<?php echo date('Y') ?>">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="viewListReport.php?coinType=Two_Cent_Piece&amp;year=<?php echo date('Y') ?>">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="viewListReport.php?coinType=Nickel_Three_Cent&amp;year=<?php echo date('Y') ?>">Nickel Three Cent Piece</option>
        <option value="viewListReport.php?coinType=Silver_Three_Cent&amp;year=<?php echo date('Y') ?>">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime&amp;year=<?php echo date('Y') ?>">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dime&amp;year=<?php echo date('Y') ?>">Draped Bust</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime&amp;year=<?php echo date('Y') ?>">Liberty Cap Half Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime&amp;year=<?php echo date('Y') ?>">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="viewListReport.php?coinType=Shield_Nickel&amp;year=<?php echo date('Y') ?>">Shield</option>
        <option value="viewListReport.php?coinType=Liberty_Head_Nickel&amp;year=<?php echo date('Y') ?>">Liberty Head</option>
        <option value="viewListReport.php?coinType=Indian_Head_Nickel&amp;year=<?php echo date('Y') ?>">Indian Head</option>
        <option value="viewListReport.php?coinType=Jefferson_Nickel&amp;year=<?php echo date('Y') ?>">Jefferson</option>
        <option value="viewListReport.php?coinType=Westward_Journey&amp;year=<?php echo date('Y') ?>">Westward Journey</option>
        <option value="viewListReport.php?coinType=Return_to_Monticello&amp;year=<?php echo date('Y') ?>">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewListReport.php?coinType=Draped_Bust_Dime&amp;year=<?php echo date('Y') ?>">Drapped Bust Dime</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Dime&amp;year=<?php echo date('Y') ?>">Liberty Cap Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dime&amp;year=<?php echo date('Y') ?>">Liberty Seated Dime</option>
        <option value="viewListReport.php?coinType=Barber_Dime&amp;year=<?php echo date('Y') ?>">Barber Dime</option>
        <option value="viewListReport.php?coinType=Winged_Liberty_Dime&amp;year=<?php echo date('Y') ?>">Winged Liberty Dime</option>
        <option value="viewListReport.php?coinType=Roosevelt_Dime&amp;year=<?php echo date('Y') ?>">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="viewListReport.php?coinType=Twenty_Cent_Piece&amp;year=<?php echo date('Y') ?>">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="viewListReport.php?coinType=Draped_Bust_Quarter&amp;year=<?php echo date('Y') ?>">Draped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Capped_Bust_Quarter&amp;year=<?php echo date('Y') ?>">Capped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Quarter&amp;year=<?php echo date('Y') ?>">Liberty Seated Quarter</option>
        <option value="viewListReport.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewListReport.php?coinType=Standing_Liberty&amp;year=<?php echo date('Y') ?>">Standing Liberty</option>
        <option value="viewListReport.php?coinType=Washington_Quarter&amp;year=<?php echo date('Y') ?>">Washington Quarter</option>
        <option value="viewListReport.php?coinType=State Quarter&amp;year=<?php echo date('Y') ?>">State Quarter</option>
        <option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories&amp;year=<?php echo date('Y') ?>">D.C. and U. S. Territories</option>
        <option value="viewListReport.php?coinType=America_the_Beautiful_Quarter&amp;year=<?php echo date('Y') ?>">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar&amp;year=<?php echo date('Y') ?>">Flowing Hair Half</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar&amp;year=<?php echo date('Y') ?>">Draped Bust Half</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar&amp;year=<?php echo date('Y') ?>">Liberty Cap Half</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar&amp;year=<?php echo date('Y') ?>">Seated Liberty Half</option>
        <option value="viewListReport.php?coinType=Barber_Half_Dollar&amp;year=<?php echo date('Y') ?>">Barber Half</option>
        <option value="viewListReport.php?coinType=Walking_Liberty&amp;year=<?php echo date('Y') ?>">Walking Liberty Half</option>
        <option value="viewListReport.php?coinType=Franklin_Half_Dollar&amp;year=<?php echo date('Y') ?>">Franklin Half</option>
        <option value="viewListReport.php?coinType=Kennedy_Half_Dollar&amp;year=<?php echo date('Y') ?>">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="viewListReport.php?coinType=Flowing_Hair_Dollar&amp;year=<?php echo date('Y') ?>">Flowing Hair Dollar</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Dollar&amp;year=<?php echo date('Y') ?>">Draped Bust Dollar</option>
        <option value="viewListReport.php?coinType=Gobrecht_Dollar&amp;year=<?php echo date('Y') ?>">Gobrecht Dollar</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dollar&amp;year=<?php echo date('Y') ?>">Seated Liberty Dollar</option>
        <option value="viewListReport.php?coinType=Trade_Dollar&amp;year=<?php echo date('Y') ?>">Trade Dollar</option>
        <option value="viewListReport.php?coinType=Morgan_Dollar&amp;year=<?php echo date('Y') ?>">Morgan Dollar</option>
        <option value="viewListReport.php?coinType=Peace_Dollar&amp;year=<?php echo date('Y') ?>">Peace Dollar</option>
        <option value="viewListReport.php?coinType=Eisenhower_Dollar&amp;year=<?php echo date('Y') ?>">Eisenhower Dollar</option>
        <option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar&amp;year=<?php echo date('Y') ?>">Susan B. Anthony</option>
        <option value="viewListReport.php?coinType=Sacagawea_Dollar&amp;year=<?php echo date('Y') ?>">Sacagawea/Native American</option>
        <option value="viewListReport.php?coinType=Presidential_Dollar&amp;year=<?php echo date('Y') ?>">Presidential Dollar</option>
        </optgroup>
    </select></div>
</div>

  <div class="visible-xs">    
    <br />
</div>

<div class="table-responsive">
<table width="100%" class="table table-hover">  
  <tr>
    <td width="23%"><strong> Collected</strong></td>
    <td width="77%"><a href="viewCoinType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>"><?php echo $collection->getCollectionCountByType($userID, $coinType) ?></a></td>
  </tr>
  <tr>
    <td><strong> Unique</strong></td>
    <td><?php echo $uniqueCount ?></td>
  </tr>
  <tr>
    <td><strong>Certified</strong></td>
    <td><a href="viewCertTypeReport.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></a></td>
  </tr>
<?php if (in_array($coinType, $bulkTypes)) {?>
  <tr>
    <td><strong>Bulk</strong></td>
    <td><?php echo $BulkCoin->getCollectionCountByType($userID, $coinType); ?></td>
  </tr>
 <?php } ?>     
  <tr>
    <td><strong> Investment</strong></td>
    <td><a href="viewTypeFinance.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>&amp;year=<?php echo $year ?>">$<?php echo $collection->getCoinSumByType($coinType, $userID) ?></a></td>
  </tr>
  <tr>
    <td><strong>Type  Progress</strong></td>
    <td> <?php echo $uniqueCount  ?> of <?php echo $byMintCount ?> (<?php echo $typePercent ?>%)</td>
  </tr>
  <tr>
    <td valign="top"><strong>Complete  Progress</strong></td>
    <td valign="top"><?php echo $uniqueCount ?>  of <?php echo $totalByTypeCount ?> (<?php echo $typeAllPercent ?>%)</td>
  </tr>
</table>
</div> 




  <hr />
  <?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  <hr />



<?php include("../inc/pages/$coinCatLink.php"); ?>
<!--Content Below-->
<br>
<p><a class="topLink" href="#top">Top</a></p>
<div class="hidden-xs">    
<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&AuctionwithBIN=1&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=<?php echo $CoinTypes->getEbay(); ?>&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="left" /><img src="../img/ebay-type.jpg" width="454" height="100" border="0" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&mpt=[CACHEBUSTER]">
</div> 
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>