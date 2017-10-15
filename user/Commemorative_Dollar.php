<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Commemorative Dollar';
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinVal = '1';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Commemorative Dollar Collection</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
<div class="container fill-height">
 <h1><img src="../img/Mixed_Dollars.jpg" width="100" height="100" align="middle">Commemorative Dollars</h1>
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
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 2 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '2'); ?>%)</td>
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

  
<p><a href="Commemorative_Dollar_View.php" class="btn btn-default btn-lg btn-block" role="button">Album View</a></p>

 <div class="table-responsive">
<table class="table table-hover clearfix">
    <tr>
      <td colspan="3" class="darker"><a href="Dollar.php" class="brownLink">Circulated</a> | <a href="Gold_Dollar.php" class="brownLink">Bullion</a> | <a href="Commemorative_Dollar.php" class="brownLink">Commemorative </a> | <a href="Silver_Dollar.php" class="brownLink">Silver Eagle</a></td>
      </tr>
    <tr>
    <td width="444" class="darker">Gold Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
<tr>
  <td><a href="viewCommemorativeReport.php?coinVersion=Discus_Thrower" class="brownLink">Olympic Coliseum </a>(1983)</td>
  <td align="center"><?php echo $collection->getReportVersionCount('Discus_Thrower', $userID); ?></td>  
  <td align="center"><?php echo $collection->getSumTypeCount('Discus_Thrower', $userID)?></td>
</tr>

  <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Coliseum" class="brownLink">1984 Olympics</a></td>
     <td align="center"><?php echo $collection->getReportVersionCount('Olympic_Coliseum', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Olympic_Coliseum', $userID)?></td>
  </tr>
  
    <tr>
      <td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Dollar" class="brownLink">Statue of Liberty</a> (1986)</td>
      <td align="center"><?php echo $collection->getReportVersionCount('Statue_of_Liberty_Dollar', $userID); ?></td>  
      <td align="center"><?php echo $collection->getSumTypeCount('Statue_of_Liberty_Dollar', $userID)?></td>
    </tr>
  
    <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Constitution_Dollar" class="brownLink">U.S Constitution</a> (1987)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Constitution_Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Constitution_Dollar', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Silver_Dollar" class="brownLink">Olympics</a> (1988)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Olympic_Silver_Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Olympic_Silver_Dollar', $userID)?></td>
  </tr>
  
    <tr>
      <td><a href="viewCommemorativeReport.php?coinVersion=Congress_Dollar" class="brownLink">U.S Congress</a> (1989)</td>
      <td align="center"><?php echo $collection->getReportVersionCount('Congress_Dollar', $userID); ?></td>  
      <td align="center"><?php echo $collection->getSumTypeCount('Congress_Dollar', $userID)?></td>
    </tr>
      <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Eisenhower_Silver_Dollar" class="brownLink">Eisenhower</a> (1990)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Eisenhower_Silver_Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Eisenhower_Silver_Dollar', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Korean_War_Memorial" class="brownLink">Korean War Memorial</a> (1991)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Korean_War_Memorial', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Korean_War_Memorial', $userID)?></td>
  </tr>
      <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=USO_Silver_Dollar_Proof" class="brownLink">U.S.O</a> (1991)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('USO_Silver_Dollar_Proof', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('USO_Silver_Dollar_Proof', $userID)?></td>
  </tr>
  
    <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar" class="brownLink">Christoper Columbus</a> (1992)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('92_Olympic_Silver_Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('92_Olympic_Silver_Dollar', $userID)?></td>
  </tr>
  
      <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=92_Columbus_Dollar" class="brownLink">White House</a> (1992)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('92_Columbus_Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('92_Columbus_Dollar', $userID)?></td>
  </tr>
  
      <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Dollar" class="brownLink">Olympics</a> (1992)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Bill_of_Rights_Dollar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Bill_of_Rights_Dollar', $userID)?></td>
  </tr>
  
      <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Bill of Rights</a> (1993)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
  </tr>
  
      <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">World War II</a> (1993)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
  </tr>
  
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Thomas Jefferson</a> (1993)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>  
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
  
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Capitol Bicentennial</a> (1994)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">World Cup</a> (1994)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Vietnam Veterans Memorial</a> (1994)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Women in Military Service</a> (1994)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Olympic Cycling</a> (1995)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Olympic Gymnastics</a> (1995)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
  
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Olympic Track and Field</a> (1995)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Paralympics Blind Runner</a> (1995)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Civil War Battlefields</a> (1995)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Special Olympics World Games</a> (1995)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Olympic High Jump</a> (1996)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Olympic Rowing</a> (1996)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
  
      <tr>
        <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Olympic Tennis</a> (1996)</td>
        <td align="center"><?php echo $collection->getReportVersionCount('Presidellar', $userID); ?></td>  
        <td align="center"><?php echo $collection->getSumTypeCount('Presidenollar', $userID)?></td>
      </tr>
  
      <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Paralympics Wheelchair</a> (1996)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Paralympics Wheelchair', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Paralympics Wheelchair', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Smithsonian</a> (1996)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Smithsonian', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Smithsonian', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Community Service</a> (1996)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Community Service', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Community Service', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Botanic Garden</a> (1997)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Botanic Garden', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Botanic Garden', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Law Enforcement Memorial</a> (1997)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Law Enforcement', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Law Enforcement', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Jackie Robinson</a> (1997)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Jackie Robinson', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Jackie Robinson', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Black Revolutionary War Patriots</a> (1998)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Black Revolutionary', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Black Revolutionary', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Robert F Kennedy</a> (1998)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Robert F Kennedy', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Robert F Kennedy', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Dolley_Madison" class="brownLink">Dolley Madison </a> (1999)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Dolley Madison', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Dolley Madison', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Yellowstone </a> (1999)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Yellowstone', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Yellowstone', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Leif Ericson</a> (2000)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Leif Ericson', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Leif Ericson', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Library of Congress</a> (2000)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Library of Congress', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Library of Congress', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">American Buffalo</a> (2001)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('American Buffalo', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('American Buffalo', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Capitol Visitor Center</a> (2001)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Capitol Visitor Center', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Capitol Visitor Center', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Olympic Salt Lake City </a> (2002)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Olympic Salt Lake City ', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Olympic Salt Lake City ', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">West Point </a> (2002)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('West Point ', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('West Point ', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">First Flight </a> (2003)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('First Flight ', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('First Flight ', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Lewis and Clark</a> (2004)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Lewis and Clark', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Lewis and Clark', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Thomas Edison</a> (2004)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Thomas Edison', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Thomas Edison', $userID)?></td>
  </tr>
  
        <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">John Marshall</a> (2005)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('John Marshall', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('John Marshall', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Marine Corps </a> (2005)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Marine Corps', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Marine Corps', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Benjamin Franklin Founding Father & Scientist</a> (2006)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Benjamin Franklin', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Benjamin Franklin', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">San Francisco Old Mint </a> (2006)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('San Francisco Old Mint', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('San Francisco Old Mint', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Jamestown </a> (2007)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Jamestown', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Jamestown', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Little Rock</a> (2007)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Little Rock', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Little Rock', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Bald Eagle</a> (2008)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Bald Eagle', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Bald Eagle', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Abraham_Lincoln" class="brownLink">Abraham Lincoln</a> (2009)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Abraham Lincoln', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Abraham Lincoln', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Louis Braille</a> (2009)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Louis Braille', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Louis Braille', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Boy Scouts</a> (2010)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Boy Scouts', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Boy Scouts', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Disabled Veterans</a> (2010)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Disabled Veterans', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Disabled Veterans', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">U.S. Army</a> (2011)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Army', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Army', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Medal of Honor</a> (2011)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Medal of Honor', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Medal of Honor', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Star Spangled Banner</a> (2012)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Star Spangled Banner', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Star Spangled Banner', $userID)?></td>
  </tr>
  
          <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion=Presidential_Dollar" class="brownLink">Infantry Soldier</a> (2012)</td>
     <td align="center"><?php echo $collection->getReportVersionCount('Infantry Soldier', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Infantry Soldier', $userID)?></td>
  </tr>
      <tr class="active darker">
   <td>Totals</td>
   <td align="center"><?php echo $collectTotal; ?></td>
   <td align="center">$<?php echo $collection->getMasterCoinSumByCoinCategory($coinCategory, $userID); ?></td>
 </tr>
    </table>
</div>


  <!--Content Below-->
<p class="hidden-xs">
<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=11975&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/ads/Dollar_ebay_ad.jpg" width="900" height="100" border="0" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&mpt=[CACHEBUSTER]"></p>
  <p class="clearfix"><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>