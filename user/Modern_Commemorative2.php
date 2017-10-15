<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Dollar';
$coinVal = '1';
$collectTotal = $coin->getCoinCatCountByID($accountID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Commemorative Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_Dollars.jpg" width="100" height="100" align="middle">My Commemorative Collection (<?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $accountID); ?>) Coins</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="#coins">Coins</a></td>
    <td width="13%" class="darker"><a href="DollarRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="DollarFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="DollarGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="DollarError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="DollarBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="DollarBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $accountID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $accountID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $accountID) ?> of 11 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $accountID), '11'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $collection->getByMintCountByCategoryByMint($accountID, $coinCategory); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory); ?> (<?php echo percent($collection->getByMintCountByCategoryByMint($accountID, $coinCategory), $collection->getTotalByMintCountByCategory($coinCategory)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionCategoryById($accountID, $coinCategory); ?> of <?php echo $collection->getCompleteCollectionCategoryCount($coinCategory); ?> (<?php echo percent($collection->getCompleteCollectionCategoryById($accountID, $coinCategory), $collection->getCompleteCollectionCategoryCount($coinCategory)) ?>%)</td>
  </tr>
  </table>
<div class="roundedWhite">
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="Commemorative_Half_Dollar.php" class="brownLink">Half Dollars</a></td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowing Hair Dollar', $accountID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowing Hair Dollar', $accountID)?>" /></td>
</tr>

  <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Dollar" class="brownLink">Dollars</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Dollar', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Dollar', $accountID)?>" /></td>
  </tr>
  
  <tr>
    <td><a href="viewListReport.php?coinType=Gobrecht_Dollar" class="brownLink">Five Dollars</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Gobrecht Dollar', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Gobrecht Dollar', $accountID)?>" /></td>
  </tr>
  
    <tr>
    <td><a href="viewListReport.php?coinType=Seated_Liberty_Dollar" class="brownLink">Ten Dollars</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Seated Liberty Dollar', $accountID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Seated Liberty Dollar', $accountID)?>" /></td>
  </tr>
  
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo getCoinSubCatValByID($accountID, "Dollar") ?>" /></td>
 </tr>
</table>
<p><form action="reportPrint.php" method="post" class="compactForm">
<input name="coinCategory" type="hidden" value="<?php echo $coinCategory ?>" />
<input class="viewListBtns masterBtn" name="printBtn" type="button" value="Print Report"/ ></form>&nbsp;
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

<hr />
<table width="919" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Modern Commemorative Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=George_Washington_Anniversary"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('George_Washington_Anniversary', $userID); ?>" alt="" width="100" height="100" /></a><br />
1982 George Washington 250th Anniversary </td>
  <td><a href="viewCommemorativeReport.php?coinVersion=George_Washington_Anniversary_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('George_Washington_Anniversary_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1982 George Washington 250th Anniversary Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Discus_Thrower"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Discus Thrower', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1983 Olympic Silver Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Discus_Thrower_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Discus Thrower Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1983 Olympic Silver Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Coliseum"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic Coliseum', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1984 Olympic Silver Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Coliseum_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic Coliseum Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1984 Olympic Silver Dollar Proof</td>
  
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Ten_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Ten_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1984 Olympic $10 Gold</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1986 Statue of Liberty<br />
Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Statue of Liberty <br />
  Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Statue of Liberty<br />
  Half
Dollar</td>
  
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
    
<td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Statue of Liberty<br />
  Half
Dollar Proof</td>
  
  <td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Statue of Liberty Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Statue_of_Liberty_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Statue of Liberty Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Constitution_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Constitution_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Constitution Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Constitution_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Constitution_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Constitution Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Constitution_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Constitution Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Constitution Five Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Constitution_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Constitution Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Constitution Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Panamollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Olympic Silver Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Illinois_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Illinoientennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Olympic Silver Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Olympic Five Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Olympic Five Dollar</span> Proof
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Congress_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
Congress Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Congress_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Congress Half Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Congress_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Congress Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Congress_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Congress Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Congress_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Congress Five Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Congress_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
Congress Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Eisenhower_Silver_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Eisenhower_Silver_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Eisenhower Silver Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Eisenhower_Silver_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Eisenhower_Silver_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Eisenhower Silver Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Mount_Rushmore_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Mount_Rushmore_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Mount Rushmore Half Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Mount_Rushmore_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Mount Rushmore Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Mount Rushmore Half Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Mount_Rushmore_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Mount_Rushmore_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Mount Rushmore Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Mount_Rushmore_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Mount_Rushmore_Five_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Mount Rushmore Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Korean_War_Memorial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Korean_War_Memorial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Korean War Memorial</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Korean_War_Memorial_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Korean_War_Memorial_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Korean War Memorial Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=USO_Silver_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('USO_Silver_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>USO Silver Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=USO_Silver_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('USO_Silver_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
USO Silver Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1992 Olympic Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1992 Olympic Half Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Silver_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar"></a><br />
  1992 Olympic  Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Silver_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Silver_Dollar_Proof"></a><br />
    1992 Olympic  Dollar Proof</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><a href="viewCommemorativeReport.php?coinVersion="></a><br />
    1992 Olympic Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=92_Olympic_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><a href="viewCommemorativeReport.php?coinVersion="></a><br />
  1992 Olympic Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=92_Columbus_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1992 Columbus Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=92_Columbus_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1992 Columbus Half Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=92_Columbus_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1992 Columbus Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=92_Columbus_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1992 Columbus Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Columbus_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Columbus_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
 1992 Columbus Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Columbus_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Columbus_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
 1992 Columbus Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Bill of Rights Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Bill of Rights Half Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Bill of Rights Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Bill of Rights Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Bill of Rights Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bill_of_Rights_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Bill of Rights Five Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1992 White House Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1992 White House Dollar Proof</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>1993 WW II Half Dollar</span></td>
  <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1993 WW II Half Dollar Proof</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1993 WW II Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=WW_II_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Dollar Prrof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1993 WW II Dollar Proof</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Maine_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1993 WW II Five Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Isabella_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span> 1993 WW II Five Dollar Proof</span></td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Jefferson_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Jefferson_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1993 Thomas Jefferson Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Jefferson_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Jefferson_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1993 Thomas Jefferson Dollar Proof</td>
    </tr>
  
    <tr align="center" valign="top" class="dateHolder">
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        <span>1994 World Cup Half Dollar</span></td>
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Half_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1994 World Cup Half Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        <span>1994 World Cup Dollar</span></td>
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        1994 World Cup Dollar Proof</td>
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        <span>1994 World Cup Five Dollar</span></td>
    </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
      <td><a href="viewCommemorativeReport.php?coinVersion=World_Cup_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
        <span>1994 World Cup Five Dollar Proof</span></td>
        
  <td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Bicentennial_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol_Bicentennial_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 Capitol Bicentennial Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Bicentennial_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol_Bicentennial_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1994 Capitol Bicentennial Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Vietnam_Veterans_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Vietnam_Veterans_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1994 Vietnam Veterans Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Vietnam_Veterans_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Vietnam_Veterans_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1994 Vietnam Veterans Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Women_in_Service_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Women_in_Service_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1994 Women In Service Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Women_in_Service_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Women_in_Service_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1994 Women In Service Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Civil War Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
 1995 Civil War Half Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Civil War Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1995 Civil War Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Civil War Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Civil_War_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Civil War Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Basketball_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Basketball_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Basketball Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Basketball_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Basketball_Half_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Basketball Half Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Baseball_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Baseball_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1995 Olympic Baseball Half Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Baseball_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Baseball_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Olympic Baseball Half Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Gymnastics_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Gymnastics_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Olympic Gymnastics Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Gymnastics_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Gymnastics_Half_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Olympic Gymnastics Half Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Track_and_Field_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Track_and_Field_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Olympic Track &amp; Field  Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Track_and_Field_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Track_and_Field_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1995 Olympic Track &amp; Field Dollar Proof</td>
    
  <td><a href="viewCommemorativeReport.php?coinVersion=Cycling_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Cycling_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1995 Olympic Cycling Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Cycling_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Cycling_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Olympic Cycling Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Blind_Runner_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Blind_Runner_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Paralympics Blind Runner Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Blind_Runner_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Blind_Runner_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Paralympics Blind Runner Dollar Proof</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Torch_Runner_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Torch_Runner_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1995 Olympic Torch Runner Five Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Torch_Runner_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Torch_Runner_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Olympic Torch Runner Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Stadium_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Stadium_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Olympic Stadium Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Stadium_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Stadium_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Olympic Stadium Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Special_Olympics_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Special_Olympics_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1995 Special Olympics Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Special_Olympics_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Special_Olympics_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1995 Special Olympics Dollar Proof</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Swimming_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Swimming_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Olympic Swimming Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Swimming_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Swimming_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Olympic Swimming Half Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Soccer_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Soccer_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996   Olympic Soccer Half Dollar  </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Soccer_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Soccer_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Olympic Soccer Half Dollar  Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Tennis_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Tennis_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1996 Olympic Tennis Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Tennis_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Tennis_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  1996 Olympic Tennis Dollar Proof
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Rowing_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Rowing_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Olympic Rowing Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Rowing_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Rowing_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Olympic Rowing Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_High_Jump_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_High_Jump_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Olympic High Jump Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_High_Jump_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_High_Jump_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1996 Olympic High Jump Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Wheelchair_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Wheelchair_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Paralympics Wheelchair Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Paralympics_Wheelchair_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Paralympics_Wheelchair_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Paralympics Wheelchair Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Flag_Bearer_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Flag_Bearer_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Olympic Flag Bearer Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Flag_Bearer_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Flag_Bearer_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Olympic Flag Bearer Five Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Cauldron_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Cauldron_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1996 Olympic Cauldron Five Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Cauldron_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Cauldron_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Olympic Cauldron Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Community_Service_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Community_Service_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Community Service Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Community_Service_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Community_Service_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Community Service Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Smithsonian_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Smithsonian_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Smithsonian Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Smithsonian_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Smithsonian_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1996 Smithsonian Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Smithsonian_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Smithsonian_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  1996 Smithsonian Five Dollar
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Smithsonian_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Smithsonian_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1996 Smithsonian Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Botanic_Garden_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Botanic_Garden_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1997 Botanic Garden Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Botanic_Garden_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Botanic_Garden_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1997 Botanic Garden Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Jackie_Robinson_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jackie_Robinson_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1997 Jackie Robinson Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Jackie_Robinson_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jackie_Robinson_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1997 Jackie Robinson Dollar Proof</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Jackie_Robinson_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jackie_Robinson_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>1997 Jackie Robinson Five Dollar</span></td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Jackie_Robinson_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jackie_Robinson_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    1997 Jackie Robinson Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Roosevelt_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Roosevelt_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1997 Roosevelt Five Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Roosevelt_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Roosevelt_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1997 Roosevelt Five Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Law_Enforcement_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Law_Enforcement_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1997 Law Enforcement Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Law_Enforcement_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Law_Enforcement_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1997 Law Enforcement Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Black_Revolutionary_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Black_Revolutionary_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1998 Black Revolutionary Dollar </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Black_Revolutionary_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Black_Revolutionary_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1998 Black Revolutionary Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Robert_F_Kennedy_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Robert_F_Kennedy_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1998 Robert F Kennedy Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Robert_F_Kennedy_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Robert_F_Kennedy_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
    1998 Robert F Kennedy Dollar Proof
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=George_Washington_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('George Washington Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1999 George Washington Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=George_Washington_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('George Washington Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1999 George Washington Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Yellowstone_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Yellowstone Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1999 Yellowstone Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Yellowstone_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Yellowstone Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>1999 Yellowstone Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Dolley_Madison_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Dolley_Madison_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1999 Dolley Madison Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Dolley_Madison_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Dolley_Madison_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  1999 Dolley Madison Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Leif_Ericson_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Leif Ericson Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2000 Leif Ericson Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Leif_Ericson_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Leif Ericson Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2000 Leif Ericson Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Library of Congress Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2000 Library of Congress Dollar  </span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Library of Congress Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  2000 Library of Congress Dollar Proof
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Ten_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Library of Congress Ten Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2000 Library of Congress Ten Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Library_of_Congress_Ten_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Library of Congress Ten Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2000 Library of Congress Ten Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=American_Buffalo_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('American Buffalo Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2001 American Buffalo Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=American_Buffalo_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('American Buffalo Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2001 American Buffalo Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2001 Capitol Visitor Center Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2001 Capitol Visitor Center Half Dollar Proof</td>
<td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center  Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2001 Capitol Visitor Center Dollar</td>
<td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2001 Capitol Visitor Center Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2001 Capitol Visitor Center Five Dollar</td>
    <td><a href="viewCommemorativeReport.php?coinVersion=Capitol_Visitor_Center_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2001 Capitol Visitor Center Five Dollar Proof</td> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Salt_Lake_City_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Salt_Lake_City_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    2002 Olympic Salt lake City Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Salt_Lake_City_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Salt_Lake_City_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2002 Olympic Salt lake City Dollar Proof</td>
<td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Salt_Lake_City_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Salt_Lake_City_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2002 Olympic Salt lake City Five Dollar </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Olympic_Salt_Lake_City_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Salt_Lake_City_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      2002 Olympic Salt lake City Five Dollar Proof</td> 
  <td><a href="viewCommemorativeReport.php?coinVersion=West_Point_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('West_Point_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    2002   West Point <br />
    Dollar </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=West_Point_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('West_Point_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2002   West Point <br />
  Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2003 First Flight Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Half_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2003 First Flight Half Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2003 First Flight Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2003 First Flight Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=First_Flight_Ten_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Ten_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2003 First Flight Ten Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Illinois_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Illinoientennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2003 First Flight Ten Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Edison_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Edison_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2004 Thomas Edison Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Thomas_Edison_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Thomas_Edison_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2004 Thomas Edison Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Lewis_and_Clark_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lewis_and_Clark_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
    2004 Lewis and Clark Dollar
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Lewis_and_Clark_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lewis_and_Clark_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2004 Lewis and Clark Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=John_Marshall_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('John_Marshall_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2005 John Marshall Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=John_Marshall_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('John_Marshall_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2005 John Marshall Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Marine_Corps_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Marine_Corps_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2005 Marine Corps Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Marine_Corps_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Marine_Corps_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2005 Marine Corps Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Founding_Father"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin_Franklin_Founding_Father', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2006 Benjamin Franklin Founding Father</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Founding_Father_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin_Franklin_Founding_Father_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2006 Benjamin Franklin Founding Father Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Scientist_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin Franklin Scientist Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2006 Benjamin Franklin Scientist</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Benjamin_Franklin_Scientist_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Benjamin_Franklin_Scientist_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2006 Benjamin Franklin Scientist Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=San_Francisco_Old_Mint_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('San_Francisco_Old_Mint_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2006 San Francisco Old Mint Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=San_Francisco_Old_Mint_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('San_Francisco_Old_Mint_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2006 San Francisco Old Mint Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=San_Francisco_Old_Mint_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('San Francisco Old Mint Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2006 San Francisco Old Mint Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=San_Francisco_Old_Mint_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('San Francisco Old Mint Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2006 San Francisco Old Mint Five Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Jamestown_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jamestown Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2007 Jamestown <br />
  Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Jamestown_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jamestown Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2007 Jamestown <br />
Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Jamestown_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jamestown_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2007 Jamestown <br />
  Five Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Jamestown_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jamestown_Five_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2007 Jamestown <br />
  Five Dollar Proof</td>
  Five 
<td><a href="viewCommemorativeReport.php?coinVersion=Little_Rock_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Little_Rock_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2007 Little Rock <br />
  Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Little_Rock_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Little_Rock_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2007 Little Rock <br />
  Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2008 Bald Eagle <br />
Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2008 Bald Eagle <br />
  Half Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2008 Bald Eagle<br />
Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2008 Bald Eagle <br />
  Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Five_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2008 Bald Eagle <br />
  Five Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Bald_Eagle_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2008 Bald Eagle <br />
Five Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Abraham_Lincoln_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Abraham Lincoln Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2009 Abraham Lincoln Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Abraham_Lincoln_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Abraham_Lincoln_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
 2009 Abraham Lincoln Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Louis_Braille_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Louis Braille Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2009 Louis Braille Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Louis_Braille_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Louis_Braille_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2009 Louis Braille Dollar Proof</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Disabled_Veterans_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Disabled Veterans Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  2010 American Veterans Disabled for Life  
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Disabled_Veterans_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Disabled_Veterans_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2010 American Veterans Disabled for Life Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Boy_Scouts_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Boy Scouts Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2010 Boy Scouts Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Boy_Scouts_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Boy Scouts Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2010 Boy Scouts Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Army_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2011 U.S. Army Half Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Army_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2011 U.S. Army Half Dollar Proof</td>
  
  <td><a href="viewCommemorativeReport.php?coinVersion=Army_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2011 U.S. Army Dollar</span> 
</td>
  
  <td><a href="viewCommemorativeReport.php?coinVersion=Army_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2011 U.S. Army Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Army_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>2011 U.S. Army Five Dollar</span> 
</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Army_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army_Five_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2011 U.S. Army Five Dollar Proof</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Medal_of_Honor_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Medal of Honor Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  2011   Medal of Honor  Dollar   
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Medal_of_Honor_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Medal of Honor Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2011   Medal of Honor  Dollar Proof  </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Medal_of_Honor_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Medal of Honor Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2011   Medal of Honor Five Dollar  </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Medal_of_Honor_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Medal of Honor Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2011 Medal of Honor Five Dollar Proof  </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Infantry_Soldier_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Infantry_Soldier_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2012 Infantry Solider Dollar
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Infantry_Soldier_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Infantry_Soldier_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2012 Infantry Solider Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Star_Spangled_Banner_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Star_Spangled_Banner_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2012   Star Spangled Banner Dollar  </td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Star_Spangled_Banner_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Star_Spangled_Banner_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2012 Star Spangled Banner Dollar Proof</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Star_Spangled_Banner_Five_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Star Spangled Banner Five Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2012 Star Spangled Banner Five Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Star_Spangled_Banner_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Star Spangled Banner Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  2012 Star Spangled Banner Five Dollar Proof
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Isabella_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  Reserved
</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Reserved_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Reserved</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Reserved_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Reserved</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Reserved_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Reserved</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Isabella_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Isabeluarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Isabearter</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Isabella_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Columbiollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Columbiaollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Panamollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Panamollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Illinois_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Illinoientennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Illinoiollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Maine_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Mainentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Mainollar</td>
  </tr>
 </table>
 <hr />

<a name="coins"></a>
<h1>Collected Commemoratives</h1>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertificationCountById($accountID) ?></td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE commemorativeVersion = 'Modern Commemorative' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%" class="brownLink"><strong>No Modern Commemorative Coins Collected</strong></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCommemorativeReport.php?coinVersion='.$coinID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>








  <table border="0" align="center" class="typeTbl" id="folderTbl" width="100%">
  <tr align="center" valign="top" class="dateHolder">
<?php   
$i = 1;
$countAll = mysql_query("SELECT * FROM coins WHERE commemorativeVersion = 'Modern Commemorative'  ORDER BY coinYear	 ASC") or die(mysql_error());
while($row = mysql_fetch_array($countAll))
	  {
		$coinID = intval($row['coinID']);
		$coin-> getCoinById($coinID);  
		$coinName = $coin->getCoinName(); 
		$coinVersion = $coin->getCoinVersion();
		$coinVersionLink = str_replace(' ', '_', $coin->getCoinVersion());
  echo '<td><a href="viewCommemorativeReport.php?coinVersion='.$coinVersionLink.'"><img class="coinSwitch" src="../img/'.$collection->getVarietyImg($coin->getCoinVersion(), $userID).'" alt="" width="100" height="100" /></a><br />
'.$coinVersion.'</td>';    
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
  
 </table>

















</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>