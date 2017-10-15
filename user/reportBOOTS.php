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
<title>Coin Reports</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h1><img class="hidden-xs" src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle">   Coin Reports</h1>
<table width="100%" class="table">
  <tr>
    <td width="36%"><strong> Collected </strong></td>
    <td width="64%"><?php echo $collection->getCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Unique</strong></td>
    <td><?php echo $collection->getUniqueCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getCoinSumByAccount($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
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
  


<a href="reportGraph.php" class="btn btn-default btn-lg btn-block"><strong> Progress Report</strong></a>
<a href="reportSpending.php?year=<?php echo date('Y'); ?>	" class="btn btn-default btn-lg btn-block"><strong> Financial Report</strong></a>
<h2 class="center-block">Type Collection <?php echo $collection->getTypeCollectionProgressByID($userID) ?> of 12 (<?php echo percent($collection->getTypeCollectionProgressByID($userID), '12'); ?>%)</h2>

<div class="table-responsive">
<table class="table" id="allTypeTbl">

<tr class="setSixRow" valign="top"> 

<td><a href="Half_Cent.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Half Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Half_Cent.php">Half Cent</a> </td>

<td><a href="Large_Cent.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Large_Cent.php">Large Cent</a> </td>
  
<td><a href="Small_Cent.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Small Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Small_Cent.php">Small Cent</a> </td>
  
<td><a href="Two_Cent.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Two Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Two_Cent.php">Two Cent</a> </td>  
  
<td><a href="Three_Cent.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Three Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Three_Cent.php">Three Cent</a> </td>
    
<td><a href="Half_Dime.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Half Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Half_Dime.php">Half Dime</a> </td>
  </tr>
  
  <tr class="setSixRow" valign="top"> 

<td><a href="Nickel.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Nickel', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Nickel.php">Nickel</a> </td>

<td><a href="Dime.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Dime.php">Dime</a> </td>
  
<td><a href="Twenty_Cent.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Twenty Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Twenty_Cent.php">Twenty Cent</a> </td>
  
<td><a href="Quarter.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Quarter.php">Quarter</a> </td>  
  
<td><a href="Half_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Half_Dollar.php">Half Dollar</a> </td>
    
<td><a href="Dollar.php"><img class="coinSwitch" src="../img/<?php echo $collection->getCatImage('Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Dollar.php"> Dollar</a> </td>
  </tr>
</table>
</div>
<h2> Custom  Reports</h2>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow">
    <td width="25%"><strong>Century/Year</strong></td>
    <td width="25%"><strong>By Metal/Strike</strong></td>
    <td width="25%"><strong>By Design</strong></td>
    <td width="25%"><strong>Key/Semi Key</strong></td>
    </tr>
  <tr class="setFourRow">
    <td class="setFourRow" valign="middle">
  <form action="viewSetYear.php" method="get" class="compactForm">  
 <table width="100%" border="0">
  <tr class="setThreeRow">
    <td> <select name="century" class="form-control">
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
      </select></td>
    <td><select name="theYear" class="form-control">
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
      </select></td>
    <td><button name="getYear" type="submit" class="btn btn-primary">Go</button></td>
  </tr>
</table>
</form></td>
    <td><a href="Silver_Dollar.php" class="btn btn-default btn-lg btn-block">Silver</a></td>
    <td><a href="reportDesign.php?design=Liberty_Cap" class="btn btn-default btn-lg btn-block">Liberty Cap</a></td>
    <td><a href="viewKeyReport.php" class="btn btn-default btn-lg btn-block">All</a></td>
    </tr>
  <tr class="setFourRow" valign="middle">
    <td><a href="reportEighteenth.php" class="btn btn-default btn-lg btn-block">18th Century</a></td>
    <td><a href="reportGold.php" class="btn btn-default btn-lg btn-block">Gold</a></td>
    <td><a href="reportDesign.php?design=Draped_Bust" class="btn btn-default btn-lg btn-block">Draped Bust</a></td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <option selected="selected" value="report.php">By Category</option>
  <option value="viewKeyCategory.php?coinCategory=Half_Cent">Half Cents</option>
  <option value="viewKeyCategory.php?coinCategory=Large_Cent">Large Cent</option>
  <option value="viewKeyCategory.php?coinCategory=Small_Cent">Small Cents</option>
  <option value="viewKeyCategory.php?coinCategory=Two_Cent">Two Cent</option>
  <option value="viewKeyCategory.php?coinCategory=Three_Cent">Three Cent</option>
  <option value="viewKeyCategory.php?coinCategory=Half_Dime">Half Dime</option>
  <option value="viewKeyCategory.php?coinCategory=Nickel">Nickel</option>
  <option value="viewKeyCategory.php?coinCategory=Dime">Dime</option>
  <option value="viewKeyCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
  <option value="viewKeyCategory.php?coinCategory=Quarter">Quarter</option>
  <option value="viewKeyCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
  <option value="viewKeyCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
    </tr> 
   <tr class="setFourRow">
     <td valign="middle"><a href="reportNineteenth.php" class="btn btn-default btn-lg btn-block">19th Century</a></td>
     <td valign="middle"><a href="Platinum_American_Eagle.php" class="btn btn-default btn-lg btn-block">Platinum</a></td>
     <td><a href="reportDesign.php?design=Seated_Liberty" class="btn btn-default btn-lg btn-block">Seated Liberty</a></td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Type</option>
      <optgroup label="Half Cents">
        <option value="viewKeyType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewKeyType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewKeyType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewKeyType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="viewKeyType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewKeyType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewKeyType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewKeyType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewKeyType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewKeyType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewKeyType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewKeyType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewKeyType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewKeyType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewKeyType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewKeyType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="viewKeyType.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="viewKeyType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewKeyType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewKeyType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewKeyType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewKeyType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewKeyType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>

      <optgroup label="Nickels">
        <option value="viewKeyType.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewKeyType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewKeyType.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewKeyType.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewKeyType.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewKeyType.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewKeyType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewKeyType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewKeyType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewKeyType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewKeyType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewKeyType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="viewKeyType.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="viewKeyType.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewKeyType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewKeyType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewKeyType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewKeyType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewKeyType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewKeyType.php?coinType=State Quarter">State Quarter</option>
        <option value="viewKeyType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewKeyType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="viewKeyType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewKeyType.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewKeyType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewKeyType.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewKeyType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewKeyType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewKeyType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewKeyType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="viewKeyType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewKeyType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewKeyType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewKeyType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewKeyType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewKeyType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewKeyType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewKeyType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewKeyType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewKeyType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewKeyType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
    </tr>
  <tr class="setFourRow">
    <td><a href="reportTwentieth.php" class="btn btn-default btn-lg btn-block">20th Century</a></td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">Metal Type Sets</option>
      <option value="viewBullionSets.php">All Bullion Sets</option>
      <option value="viewSetMetal.php?coinMetal=Copper">Copper</option>
      <option value="viewSetMetal.php?coinMetal=Clad">Clad</option>
      <option value="viewSetMetal.php?coinMetal=Silver">Silver</option>
      <option value="viewSetMetal.php?coinMetal=Gold">Gold</option>
      <option value="viewSetMetal.php?coinMetal=Platinum">Platinum</option>
    </select></td>
    <td><a href="reportDesign.php?design=Barber" class="btn btn-default btn-lg btn-block">Barber</a></td>
    <td>&nbsp;</td>
    </tr>
  <tr class="setFourRow">
    <td><a href="reportTwentyfirst.php" class="btn btn-default btn-lg btn-block">21st Century</a></td>
    <td><a href="proof.php" class="btn btn-default btn-lg btn-block"> Proofs</a></td>
    <td><a href="reportDesign.php?design=Flowing_Hair" class="btn btn-default btn-lg btn-block">Flowing Hair</a></td>
    <td>&nbsp;</td>
    </tr>
</table>
</div>

<h2>Additional/Supplemental</h2>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow">
    <td width="291">By Variety</td>
    <td width="205">Errors</td>
    <td width="190">Damaged</td>
    <td width="280">Grade Reports</td>
    </tr>
  <tr>
    <td valign="middle">
     <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
          <option selected="selected" value="report.php">By Reference</option>
          <option value="sheldonList.php">Sheldon</option>
          <option value="wexlerList.php">Wexler</option>
          <option value="conecaList.php">CONECA</option>
          <option value="fletcherList.php">Fletcher</option>
          <option value="fsList.php">Fivaz/Stanton</option>
          <option value="snowList.php">Snow</option>
          <option value="vamList.php">Van Allen/Mallis</option>          
          </select>
    </td>
    <td><a href="reportErrors.php" class="btn btn-default btn-lg btn-block">All</a></td>
    <td><a href="damageCoin.php" class="btn btn-default btn-lg btn-block">Coins (Raw)</a></td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="report.php" selected="selected">By Grading Service</option>
      <option value="viewService.php?proService=PCGS">PCGS</option>
      <option value="viewService.php?proService=ICG">ICG</option>
      <option value="viewService.php?proService=NGC">NGC</option>
      <option value="viewService.php?proService=ANACS">ANACS</option>
      <option value="viewService.php?proService=SEGS">SEGS</option>
      <option value="viewService.php?proService=PCI">PCI</option>
      <option value="viewService.php?proService=ICCS">ICCS</option>
      <option value="viewService.php?proService=HALLMARK">HALLMARK</option>
      <option value="viewService.php?proService=NTC">NTC</option>
    </select></td>
    </tr>
  <tr valign="middle">
    <td>
      <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="report.php">By Variety</option>
          <option value="varietyType.php?variety=RED">Re-Engraved Dies</option>
          <option value="varietyType.php?variety=DDO">Doubled Die Obverse</option>
          <option value="varietyType.php?variety=DDR">Doubled Die Reverse</option>
          <option value="varietyType.php?variety=RPM">Repunched Mintmark</option>
          <option value="varietyType.php?variety=OMM">Over Mint Mark</option>
          <option value="varietyType.php?variety=IMM">Inverted Mintmark</option>
          <option value="varietyType.php?variety=MMS">Mintmark Style</option>
          <option value="varietyType.php?variety=RDV">Reverse Design Variety</option>   
          <option value="varietyType.php?variety=ODV">Obverse Design Variety</option>                             
        </select></td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Error</option>
      <option value="viewErrorType.php?errorType=Off_Center">Off Center</option>
      <option value="viewErrorType.php?errorType=Broadstrike">Broadstrike </option>
      <option value="viewErrorType.php?errorType=Partial_Collar">Partial Collar</option>
      <option value="viewErrorType.php?errorType=Multiple_Strike">Multiple Strike</option>
      <option value="viewErrorType.php?errorType=Mated_Pair">Mated Pair</option>
      <option value="viewErrorType.php?errorType=Brockage">Brockage</option>
      <option value="viewErrorType.php?errorType=Capped_Die">Capped Die</option>
      <option value="viewErrorType.php?errorType=Indent">Indent</option>
      <option value="viewErrorType.php?errorType=Bonded">Bonded</option>
      <option value="viewErrorType.php?errorType=Wrong_Planchet">Wrong Planchet</option>
      <option value="viewErrorType.php?errorType=Mule">Mule</option>
      <option value="viewErrorType.php?errorType=Weak_Strike">Weak Strike</option>
      <option value="viewErrorType.php?errorType=Transitional_Error">Transitional Error</option>
      <option value="viewErrorType.php?errorType=Double_Denomination">Double Denomination</option>
      <option value="viewErrorType.php?errorType=Fold_Over">Fold Over</option>
      <option value="viewErrorType.php?errorType=Clipped_Planchet">Clipped Planchet</option>
      <option value="viewErrorType.php?errorType=Lamination">Lamination</option>
      <option value="viewErrorType.php?errorType=Edge_Lettering">Edge Lettering</option>
    </select></td>
    <td><a href="damageSlab.php" class="btn btn-default btn-lg btn-block">Coins (Slabbed)</a></td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Category</option>
      <option value="categoryGrades.php?coinCategory=Half_Cent">Half Cent</option>
      <option value="categoryGrades.php?coinCategory=Large_Cent">Large Cent</option>
      <option value="categoryGrades.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="categoryGrades.php?coinCategory=Two_Cent">Two Cent</option>
      <option value="categoryGrades.php?coinCategory=Three_Cent">Three Cent</option>
      <option value="categoryGrades.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="categoryGrades.php?coinCategory=Nickel">Nickel</option>
      <option value="categoryGrades.php?coinCategory=Dime">Dime</option>
      <option value="categoryGrades.php?coinCategory=Twenty_Cent">Twenty Cent</option>
      <option value="categoryGrades.php?coinCategory=Quarter">Quarter</option>
      <option value="categoryGrades.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="categoryGrades.php?coinCategory=Dollar">Dollar</option>
    </select></td>
    </tr> 
   <tr>
     <td>
       <select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
         <option selected="selected" value="report.php">By Attribute</option>
         <option value="fullHeadReport.php?coinType=Standing_Liberty">Standing Liberty Full Head</option>
         <option value="franklinBellReport.php?coinType=Franklin_Half_Dollar">Franklin Full Bell Lines </option>
         <option value="rooseveltBandReport.php?coinType=Roosevelt_Dime">Roosevelt Full Bands</option>
                  <option value="mercuryBandReport.php?coinType=Winged_Liberty_Dime">Mercury Full Bands</option>
      </select></td>
     <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
       <option selected="selected" value="">By Category</option>
       <option value="viewErrorCategory.php?coinCategory=Half_Cent">Half Cent</option>
       <option value="viewErrorCategory.php?coinCategory=Large_Cent">Large Cent</option>
       <option value="viewErrorCategory.php?coinCategory=Small_Cent">Small Cents</option>
       <option value="viewErrorCategory.php?coinCategory=Two_Cent">Two Cent</option>
       <option value="viewErrorCategory.php?coinCategory=Three_Cent">Three Cent</option>
       <option value="viewErrorCategory.php?coinCategory=Half_Dime">Half Dime</option>
       <option value="viewErrorCategory.php?coinCategory=Nickel">Nickel</option>
       <option value="viewErrorCategory.php?coinCategory=Dime">Dime</option>
       <option value="viewErrorCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
       <option value="viewErrorCategory.php?coinCategory=Quarter">Quarter</option>
       <option value="viewErrorCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
       <option value="viewErrorCategory.php?coinCategory=Dollar">Dollar</option>
     </select></td>
     <td><a href="damageSet.php" class="btn btn-default btn-lg btn-block">Sets (Mint)</a></td>
     <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
       <option selected="selected" value="report.php">By Type</option>
       <optgroup label="Half Cents">
         <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
         <option value="viewGradeReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
         <option value="viewGradeReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
         <option value="viewGradeReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
         </optgroup>
       <optgroup label="Large Cents">
         <option value="viewGradeReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
         <option value="viewGradeReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
         <option value="viewGradeReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
         <option value="viewGradeReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
         <option value="viewGradeReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
         <option value="viewGradeReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
         </optgroup>
       <optgroup label="Cents">
         <option value="viewGradeReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
         <option value="viewGradeReport.php?coinType=Indian_Head">Indian Head Cent</option>
         <option value="viewGradeReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
         <option value="viewGradeReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
         <option value="viewGradeReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
         <option value="viewGradeReport.php?coinType=Union_Shield">Union Shield</option>
         </optgroup>
       <optgroup label="Two Cents">
         <option value="viewGradeReport.php?coinType=Two_Cent_Piece">Two Cent Piece</option>
         </optgroup>
       <optgroup label="Three Cents">
         <option value="viewGradeReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
         <option value="viewGradeReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
         </optgroup>
       <optgroup label="Half Dimes">
         <option value="viewGradeReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
         <option value="viewGradeReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
         <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
         <option value="viewGradeReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
         </optgroup>
       <optgroup label="Nickels">
         <option value="viewGradeReport.php?coinType=Shield_Nickel">Shield</option>
         <option value="viewGradeReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
         <option value="viewGradeReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
         <option value="viewGradeReport.php?coinType=Jefferson_Nickel">Jefferson</option>
         <option value="viewGradeReport.php?coinType=Westward_Journey">Westward Journey</option>
         <option value="viewGradeReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
         </optgroup>
       <optgroup label="Dimes">
         <option value="viewGradeReport.php?coinType=Draped_Bust_Dime">Drapped Bust Dime</option>
         <option value="viewGradeReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
         <option value="viewGradeReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
         <option value="viewGradeReport.php?coinType=Barber_Dime">Barber Dime</option>
         <option value="viewGradeReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
         <option value="viewGradeReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
         </optgroup>
       <optgroup label="Twenty Cents">
         <option value="viewGradeReport.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
         </optgroup>
       <optgroup label="Quarters">
         <option value="viewGradeReport.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
         <option value="viewGradeReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
         <option value="viewGradeReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
         <option value="viewGradeReport.php?coinType=Barber_Quarter">Barber Quarter</option>
         <option value="viewGradeReport.php?coinType=Standing_Liberty">Standing Liberty</option>
         <option value="viewGradeReport.php?coinType=Washington_Quarter">Washington Quarter</option>
         <option value="viewGradeReport.php?coinType=State Quarter">State Quarter</option>
         <option value="viewGradeReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
         <option value="viewGradeReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
         </optgroup>
       <optgroup label="Half Dollars">
         <option value="viewGradeReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
         <option value="viewGradeReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
         <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
         <option value="viewGradeReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
         <option value="viewGradeReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
         <option value="viewGradeReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
         <option value="viewGradeReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
         <option value="viewGradeReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
         </optgroup>
       <optgroup label="Dollars">
         <option value="viewGradeReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
         <option value="viewGradeReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
         <option value="viewGradeReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
         <option value="viewGradeReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
         <option value="viewGradeReport.php?coinType=Trade_Dollar">Trade Dollar</option>
         <option value="viewGradeReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
         <option value="viewGradeReport.php?coinType=Peace_Dollar">Peace Dollar</option>
         <option value="viewGradeReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
         <option value="viewGradeReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
         <option value="viewGradeReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
         <option value="viewGradeReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
         </optgroup>
     </select></td>
    </tr>
  <tr>
    <td><a href="viewFolderCollection.php" class="btn btn-default btn-lg btn-block">Folders Style View</a></td>
    <td><a href="errors.php" class="btn btn-default btn-lg btn-block">Common Errors List</a></td>
    <td height="30">&nbsp;</td>
    <td><a href="certList.php" class="btn btn-default btn-lg btn-block">To Be Certified List</a></td>
    </tr>
</table>
</div>

<h2>Bulk Reports</h2>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow">
    <td width="25%">Sets</td>
    <td width="25%">Folders/Albums</td>
    <td width="25%">Rolls</td>
    <td width="25%">Boxes</td>
    </tr>
  <tr>
    <td height="30"><a href="viewSets.php?setType=Mint" class="btn btn-default btn-lg btn-block">Mint</a></td>
    <td height="30"><a href="folderType.php?type=folder" class="btn btn-default btn-lg btn-block">All Folders</a></td>
    <td height="30"><a href="viewKeyReport.php" class="btn btn-default btn-lg btn-block">All</a></td>
    <td height="30"><a href="viewKeyReport.php" class="btn btn-default btn-lg btn-block">All</a></td>
    </tr>
  <tr>
    <td height="30"><a href="viewSets.php?setType=Proof" class="btn btn-default btn-lg btn-block">Proof</a></td>
    <td height="30"><a href="folderType.php?type=album" class="btn btn-default btn-lg btn-block">All Albums</a></td>
    <td height="30"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Category</option>
      <option value="viewRollCategory.php?coinCategory=Half_Cent">Liberty Cap</option>
      <option value="viewRollCategory.php?coinCategory=Large_Cent">Flowing Hair </option>
      <option value="viewRollCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="viewRollCategory.php?coinCategory=Two_Cent">Two Cent Grades</option>
      <option value="viewRollCategory.php?coinCategory=Three_Cent">Three Cent</option>
      <option value="viewRollCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="viewRollCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="viewRollCategory.php?coinCategory=Dime">Dime</option>
      <option value="viewRollCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
      <option value="viewRollCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="viewRollCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="viewRollCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
    <td height="30"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Category</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Cent">Liberty Cap</option>
      <option value="viewKeyCategory.php?coinCategory=Large_Cent">Flowing Hair </option>
      <option value="viewKeyCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="viewKeyCategory.php?coinCategory=Two_Cent">Two Cent Grades</option>
      <option value="viewKeyCategory.php?coinCategory=Three_Cent">Three Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="viewKeyCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="viewKeyCategory.php?coinCategory=Dime">Dime</option>
      <option value="viewKeyCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="viewKeyCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
    </tr> 
   <tr>
     <td height="30"><a href="viewSets.php?setType=Commemorative" class="btn btn-default btn-lg btn-block">Commemorative</a></td>
     <td height="30"><a href="addFolderBlank.php" class="btn btn-default btn-lg btn-block">Add New</a></td>
    <td height="30"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Type</option>
      <optgroup label="Half Cents">
        <option value="viewRollType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewRollType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewRollType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewRollType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="viewRollType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewRollType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewRollType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewRollType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewRollType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewRollType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewRollType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewRollType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewRollType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewRollType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewRollType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewRollType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="viewRollType.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="viewRollType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewRollType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewRollType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewRollType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewRollType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewRollType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="viewRollType.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewRollType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewRollType.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewRollType.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewRollType.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewRollType.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewRollType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewRollType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewRollType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewRollType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewRollType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewRollType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="viewRollType.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="viewRollType.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewRollType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewRollType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewRollType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewRollType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewRollType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewRollType.php?coinType=State Quarter">State Quarter</option>
        <option value="viewRollType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewRollType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="viewRollType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewRollType.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewRollType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewRollType.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewRollType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewRollType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewRollType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewRollType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="viewRollType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewRollType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewRollType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewRollType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewRollType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewRollType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewRollType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewRollType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewRollType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewRollType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewRollType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
    <td height="30"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Type</option>
      <optgroup label="Half Cents">
        <option value="viewBoxType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewBoxType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewBoxType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewBoxType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="viewBoxType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewBoxType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewBoxType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewBoxType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewBoxType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewBoxType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewBoxType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewBoxType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewBoxType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewBoxType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewBoxType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewBoxType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="viewBoxType.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="viewBoxType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewBoxType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewBoxType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewBoxType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewBoxType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewBoxType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="viewBoxType.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewBoxType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewBoxType.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewBoxType.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewBoxType.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewBoxType.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewBoxType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewBoxType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewBoxType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewBoxType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewBoxType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewBoxType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="viewBoxType.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="viewBoxType.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewBoxType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewBoxType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewBoxType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewBoxType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewBoxType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewBoxType.php?coinType=State Quarter">State Quarter</option>
        <option value="viewBoxType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewBoxType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="viewBoxType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewBoxType.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewBoxType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewBoxType.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewBoxType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewBoxType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewBoxType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewBoxType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="viewBoxType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewBoxType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewBoxType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewBoxType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewBoxType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewBoxType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewBoxType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewBoxType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewBoxType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewBoxType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewBoxType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
    </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td height="30"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">Switch Set Type</option>
      <option value="viewSets.php?setType=Mint">Mint</option>
      <option value="viewSets.php?setType=Proof">Proof</option>
      <option value="viewSets.php?setType=Silver_Proof">Silver_Proof</option>
      <option value="viewSets.php?setType=Special_Mint">Special_Mint</option>
      <option value="viewSets.php?setType=Commemorative">Commemorative</option>
      <option value="viewSets.php?setType=American_Eagle">American Eagle</option>
      <option value="viewSets.php?setType=Platinum_American_Eagle">Platinum</option>
      <option value="viewBullionSets.php">All Bullion Sets</option>
    </select></td>
    <td height="30"><a href="RollTypes.php?rollType=Mint" class="btn btn-default btn-lg btn-block">Mint Issued</a></td>
    <td height="30"><a href="viewBagType.php?bagType=Mint" class="btn btn-default btn-lg btn-block">Mint Issued</a></td>
    </tr>
</table>
</div>

<h2>Storage/Collections</h2>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow">
    <td width="25%">&nbsp;</td>
    <td width="25%">Collections</td>
    <td width="25%">Container</td>
    <td width="25%">&nbsp;</td>
    </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><a href="coinCollection.php" class="btn btn-default btn-lg btn-block">All</a></td>
    <td><a href="coinContainer.php" class="btn btn-default btn-lg btn-block">View All</a></td>
    <td height="30">&nbsp;</td>
    </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Category</option>
      <option value="coinCollectionCategory.php?coinCategory=None">General</option>
      <option value="coinCollectionCategory.php?coinCategory=Half_Cent">Liberty Cap</option>
      <option value="coinCollectionCategory.php?coinCategory=Large_Cent">Flowing Hair </option>
      <option value="coinCollectionCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="coinCollectionCategory.php?coinCategory=Two_Cent">Two Cent Grades</option>
      <option value="coinCollectionCategory.php?coinCategory=Three_Cent">Three Cent</option>
      <option value="coinCollectionCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="coinCollectionCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="coinCollectionCategory.php?coinCategory=Dime">Dime</option>
      <option value="coinCollectionCategory.php?coinCategory=Twenty_Cent">Twenty Cent</option>
      <option value="coinCollectionCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="coinCollectionCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="coinCollectionCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">By Type</option>
      <option value="coinContainerType.php?containerType=Slabbed_Box">Slabbed Coin Box</option>
      <option value="coinContainerType.php?containerType=Set_Box">Mint/Proof Set Box</option>
      <option value="coinContainerType.php?containerType=Plastic_Tray">Plastic Tray </option>
      <option value="coinContainerType.php?containerType=Roll_Tray">Coin Roll Tray</option>
      <option value="coinContainerType.php?containerType=Roll_Bin">Coin Roll Bin</option>
      <option value="coinContainerType.php?containerType=Mint_Roll_Box">Mint Roll Box</option>
      <option value="coinContainerType.php?containerType=Other">Other</option>
    </select></td>
    <td height="30">&nbsp;</td>
    </tr> 
   <tr>
     <td height="30">&nbsp;</td>
     <td>&nbsp;</td>
     <td><a href="coinContainerNew.php" class="btn btn-default btn-lg btn-block">Add New</a></td>
     <td height="30">&nbsp;</td>
    </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    </tr>
</table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>