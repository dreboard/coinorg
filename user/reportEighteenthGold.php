<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
//getCenturyCollectionCountById

$century = '18';
$collectTotal = $Bullion->checkGoldCollection($userID);

	
$totalGoldDollar = $Bullion->getTotalCollectedCategoryByID('Dollar', $userID);
$GoldDollarVal = '1';
$GoldDollarFaceVal = $totalGoldDollar * $GoldDollarVal;

$totalQuarterEagle = $Bullion->getTotalCollectedCategoryByID('Quarter Eagle', $userID);
$QuarterEagleVal = '2.5';
$QuarterEagleFaceVal = $totalQuarterEagle * $QuarterEagleVal;

$totalThreeDollar = $Bullion->getTotalCollectedCategoryByID('Three Dollar', $userID);
$ThreeDollarVal = '3';
$ThreeDollarFaceVal = $totalThreeDollar * $ThreeDollarVal;

$totalFourDollar = $Bullion->getTotalCollectedCategoryByID('Four Dollar', $userID);
$FourDollarVal = '4';
$FourDollarFaceVal = $totalFourDollar * $FourDollarVal;

$totalFiveDollar = $Bullion->getTotalCollectedCategoryByID('Five Dollar', $userID);
$FiveDollarVal = '5';
$FiveDollarFaceVal = $totalFiveDollar * $FiveDollarVal;

$totalTenDollar = $Bullion->getTotalCollectedCategoryByID('Ten Dollar', $userID);
$TenDollarVal = '10';
$TenDollarFaceVal = $totalTenDollar * $TenDollarVal;

$totalTwentyDollar = $Bullion->getTotalCollectedCategoryByID('Twenty Dollar', $userID);
$TwentyDollarVal = '20';
$TwentyfaceVal = $totalTwentyDollar * $TwentyDollarVal;

$totalTwentyFiveDollar = $Bullion->getTotalCollectedCategoryByID('Twenty Five Dollar', $userID);
$TwentyFiveDollarVal = '25';
$TwentyFiveDollarFaceVal = $totalTwentyFiveDollar * $TwentyFiveDollarVal;

$totalFiftyDollar = $Bullion->getTotalCollectedCategoryByID('Fifty Dollar', $userID);
$FiftyDollarVal = '.03';
$FiftyDollarFaceVal = $totalFiftyDollar * $FiftyDollarVal;






$coinfaceval = $GoldDollarFaceVal + $QuarterEagleFaceVal + $ThreeDollarFaceVal = $TwentyFiveDollarFaceVal + $FiftyDollarFaceVal + $FourDollarFaceVal + $FiveDollarFaceVal + $TenDollarFaceVal + $TwentyfaceVal;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My 18th Century Gold Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );


});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:130%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_18Gold.jpg" width="100" height="100" align="middle" id="setTypes"> My 18th Century Gold Collection</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="13%" class="darker"><a href="myRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="myFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="myError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="myBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="myBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $Bullion->getCenturyCollectionCountById($userID, $century); ?></td>
  </tr>
  <tr>
    <td width="49%"><strong>Total Unique </strong></td>
    <td width="51%"><?php echo $Bullion->getUniqueCenturyCollectionCountById($userID, $century); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $Bullion->getCenturySumByAccount($userID, $century); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo formatMoney($coinfaceval); ?></td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $Bullion->getUniqueCenturyCollectionCountById($userID, $century); ?> of <?php echo $Bullion->getCenturyByMintCount($century); ?> (<?php echo percent($Bullion->getCenturyByMintCountByID($userID, $century), $coin->getCenturyByMintCount($century)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $Bullion->getUniqueCenturyCollectionCountById($userID, $century); ?> of <?php echo $Bullion->getCenturyAllGoldCount($century); ?> (<?php echo percent($Bullion->getUniqueCenturyCollectionCountById($userID, $century), $Bullion->getCenturyAllGoldCount($century)) ?>%)</td>
  </tr>
  </table>
  <br />
  <table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>18th Century Gold Type Collection <?php echo $Bullion->getTypeBullionCollectionProgressByID($userID, $century) ?> of 3 (<?php echo percent($Bullion->getTypeBullionCollectionProgressByID($userID, $century), '3'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td>&nbsp;</td>
<td><a href="Quarter_Eagle.php"><img class="coinSwitch" src="../img/<?php echo $Bullion->getGoldCategoryImg('Quarter Eagle ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Quarter_Eagle.php">Quarter Eagle</a></td>

<td colspan="2"><a href="Five_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $Bullion->getGoldCategoryImg('Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Five_Dollar.php">Five Dollar</a></td>
<td><a href="Ten_Dollar.php"><img class="coinSwitch" src="../img/<?php echo $Bullion->getGoldCategoryImg('Ten Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="Ten_Dollar.php">Ten Dollar</a></td>
<td>&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>
      <h3>U.S. Gold Type Sets</h3>
      </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td><a href="reportEighteenthGold.php">18th Century Gold</a></td>
    <td><a href="reportNineteenthGold.php">19th Century Gold</a></td>
    <td><a href="reportTwentiethGold.php">20th Century Gold</a></td>
    <td><a href="reportTwentyfirstGold.php">21st Century Gold</a></td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <br />
<div class="roundedWhite">
  <table width="100%" id="masterCountTbl" border="1">
    <tr>
    <td width="291" class="darker">Types</td>
    <td width="335" align="center" class="darker">Collected </td>    
    <td width="338" align="center" class="darker"> Investment</td>
  </tr>

 <tr>
   <td><a href="Quarter_Eagle.php" class="brownLink">Quarter Eagle</a></td>
   <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $Bullion->getTotalCenturyCategoryByID('Quarter Eagle', $userID, $century); ?>" /></td>
   <td align="center"><input readonly class="valCount" type="text" value="<?php echo $Bullion->getGoldSumByCenturyByID('Quarter Eagle', $userID, $century); ?>" /></td>
 </tr>
 <tr>
   <td><a href="Five_Dollar.php" class="brownLink">Five Dollars</a>
     <td align="center" id="Lincoln_WheatCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $Bullion->getTotalCenturyCategoryByID('Five Dollar', $userID, $century); ?>"/ ></td>
   <td align="center"><input readonly class="valCount" id="smallVal" type="text" value="<?php echo $Bullion->getGoldSumByCenturyByID('Five Dollar', $userID, $century); ?>" /></td>
 </tr>

 <tr>
    <td><a href="Ten_Dollar.php" class="brownLink">Ten Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $Bullion->getTotalCenturyCategoryByID('Ten Dollar', $userID, $century); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $Bullion->getGoldSumByCenturyByID('Ten Dollar', $userID, $century); ?>" /></td>
 </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $Bullion->getCenturyCollectionCountById($userID, $century); ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $Bullion->getCenturySumByAccount($userID, $century); ?>" /></td>
 </tr>
</table>
<br />
<form action="reportPrintGold.php" method="post" class="compactForm">
<input name="coinMetal" type="hidden" value="Gold" />
<input class="viewListBtns masterBtn" id="printBtn" type="submit" value="Print Report"/ ></form>&nbsp; | &nbsp;
<select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
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
    <option value="Two_Cent.php">Two Cent Grades</option>
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
    <option value="viewListReport.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
    </optgroup>
  <optgroup label="Quarters">
    <option value="Quarter.php">Quarter</option>
    <option value="viewListReport.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
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
    <option value="viewListReport.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
    <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
    <option value="viewListReport.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
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
</select>
<br>
<a class="topLink" href="#top">Top</a></p></div>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>