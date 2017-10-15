<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Half Dollar';
$coinVal = '.50';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Half Dollar Collection</title>
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
<h1><img src="../img/Mixed_Half_Dollars.jpg" width="100" height="100" align="middle">My Commemorative Half Dollar Collection</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="#coins">Coins</a></td>
    <td width="13%" class="darker"><a href="HalfDollarRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="HalfDollarFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="HalfDollarGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="HalfDollarError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="HalfDollarBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="HalfDollarBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format($collection->getTotalFaceValSumByCategory($coinCategory, $userID), 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 8 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '8'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $collection->getByMintCountByCategoryByMint($userID, $coinCategory); ?> of <?php echo $collection->getTotalByMintCountByCategory($coinCategory); ?> (<?php echo percent($collection->getByMintCountByCategoryByMint($userID, $coinCategory), $collection->getTotalByMintCountByCategory($coinCategory)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collection->getCompleteCollectionCategoryById($userID, $coinCategory); ?> of <?php echo $collection->getCompleteCollectionCategoryCount($coinCategory); ?> (<?php echo percent($collection->getCompleteCollectionCategoryById($userID, $coinCategory), $collection->getCompleteCollectionCategoryCount($coinCategory)) ?>%)</td>
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
  <td><a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar" class="brownLink">Early Commemorative Half</a> (1794-1795)</td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowing Hair Half Dollar', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowing Hair Half Dollar', $userID)?>" /></td>
</tr>

  <tr>
    <td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar" class="brownLink">Modern Commemorative Half</a> (1796-1807)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Half Dollar', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Half Dollar', $userID)?>" /></td>
  </tr>


 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo getCoinSubCatValByID($userID, "Half Dollar") ?>" /></td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="printSmallBtn" type="button" value="Print Half Dollar Report"/ >&nbsp;
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
<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Modern Commemorative Half Dollars</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCoin.php?coinID=2353"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('George Washington Anniversary', $userID); ?>" alt="" width="100" height="100" /></a><br />
1982 George Washington 250th Anniversary </td>
  <td><a href="viewCoin.php?coinID=2986"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('George Washington 250th Anniversary Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1982 George Washington 250th Anniversary Proof</td>
  
<td><a href="viewCoin.php?coinID=Statue_of_Liberty_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Statue of Liberty<br />
Half
Dollar</td>
  
<td><a href="viewCoin.php?coinID=Statue_of_Liberty_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Statue of Liberty Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
Statue of Liberty<br />
Half
Dollar Proof</td>
  
<td><a href="viewCoin.php?coinID=Congress_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
Congress Half Dollar</td>
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
      <td><a href="viewCoin.php?coinID=Congress_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Congress_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
Congress Half Dollar Proof</td>
      <td><a href="viewCoin.php?coinID=Mount_Rushmore_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Mount Rushmore Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>Mount Rushmore Half Dollar Proof</span></td>
      
  <td><a href="viewCoin.php?coinID=92_Olympic_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1992 Olympic Half Dollar</td>
      
  <td><a href="viewCoin.php?coinID=92_Olympic_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Olympic_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1992 Olympic Half Dollar Proof</td>
      
  <td><a href="viewCoin.php?coinID=92_Columbus_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1992 Columbus Half Dollar</td>
    </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
      <td><a href="viewCoin.php?coinID=92_Columbus_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('92_Columbus_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1992 Columbus Half Dollar Proof</td>
      <td><a href="viewCoin.php?coinID=Bill_of_Rights_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Bill of Rights Half Dollar</td>
      
  <td><a href="viewCoin.php?coinID=Bill_of_Rights_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bill_of_Rights_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>Bill of Rights Half Dollar Proof</span></td>
      
  <td><a href="viewCoin.php?coinID=WW_II_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>1993 WW II Half Dollar</span></td>
      
  <td><a href="viewCoin.php?coinID=WW_II_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('WW_II_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1993 WW II Half Dollar Proof</td>
    </tr>
  
    <tr align="center" valign="top" class="dateHolder">
      <td><a href="viewCoin.php?coinID=World_Cup_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
        <span>1994 World Cup Half Dollar</span></td>
      <td><a href="viewCoin.php?coinID=World_Cup_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('World_Cup_Half_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      1994 World Cup Half Dollar Proof</td>
      <td><a href="viewCoin.php?coinID=Civil_War_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Civil War Half Dollar</td>
      <td><a href="viewCoin.php?coinID=Civil_War_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Civil_War_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Civil War Half Dollar Proof</td>
      <td><a href="viewCoin.php?coinID=Olympic_Baseball_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Baseball_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span>1995 Olympic Baseball Half Dollar</span></td>
    </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
      <td><a href="viewCoin.php?coinID=Olympic_Baseball_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Baseball_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Olympic Baseball Half Dollar Proof</td>
      <td><a href="viewCoin.php?coinID=Olympic_Gymnastics_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Gymnastics_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Olympic Gymnastics Half Dollar</td>
      
  <td><a href="viewCoin.php?coinID=Olympic_Gymnastics_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Gymnastics_Half_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1995 Olympic Gymnastics Half Dollar Proof</td>
      
  <td><a href="viewCoin.php?coinID=Olympic_Swimming_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Swimming_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Olympic Swimming Half Dollar</td>
      
  <td><a href="viewCoin.php?coinID=Olympic_Swimming_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Swimming_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Olympic Swimming Half Dollar Proof</td>
    </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCoin.php?coinID=Olympic_Soccer_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Soccer_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996   Olympic Soccer Half Dollar </td>
    <td><a href="viewCoin.php?coinID=Olympic_Soccer_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Olympic_Soccer_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
1996 Olympic Soccer Half Dollar  Proof</td>
    
  <td><a href="viewCoin.php?coinID=Capitol_Visitor_Center_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2001 Capitol Visitor Center Half Dollar</td>
    
  <td><a href="viewCoin.php?coinID=Capitol_Visitor_Center_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Capitol Visitor Center Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2001 Capitol Visitor Center Half Dollar Proof</td>
    
  <td><a href="viewCoin.php?coinID=First_Flight_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2003 First Flight Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCoin.php?coinID=First_Flight_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('First_Flight_Half_Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2003 First Flight Half Dollar Proof</td> 
    <td><a href="viewCoin.php?coinID=Bald_Eagle_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Half_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
2008 Bald Eagle <br />
Half Dollar</td>
    
  <td><a href="viewCoin.php?coinID=Bald_Eagle_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bald_Eagle_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2008 Bald Eagle <br />
Half Dollar Proof</td>
    
  <td><a href="viewCoin.php?coinID=Army_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <span>2011 U.S. Army Half Dollar</span></td>
    
  <td><a href="viewCoin.php?coinID=Army_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Army_Half_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
2011 U.S. Army Half Dollar Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
    <td><a href="viewCoin.php?coinID=Star_Spangled_Banner_Five_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Star Spangled Banner Five Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      Reserved</td>
    <td><a href="viewCoin.php?coinID=Isabella_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
      Reserved
  </td>
    
  <td><a href="viewCoin.php?coinID=Reserved_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Reserved</td>
    
  <td><a href="viewCoin.php?coinID=Reserved_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Reserved</td>
    
  <td><a href="viewCoin.php?coinID=Reserved_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Reserved', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Reserved</td>
  </tr>
 </table>
<hr />
<a name="coins"></a>
<h1>All Half Dollars</h1>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertificationCountById($userID) ?></td>
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
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinCategory = 'Half Dollar' AND commemorativeVersion = 'Modern Commemorative' OR  commemorativeVersion = 'Early Commemorative' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%" class="brownLink"><strong>No Commemorative Half Dollars Collected</strong></td>
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
    <td><a href="viewCoin.php?coinID='.$coinID.'" class="brownLink">'.$coinName.'</a></td>
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
<br />
<br />
<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Modern Commemorative Half Dollars</h3></td>
    </tr>
 <tr align="center" valign="top" class="dateHolder">   
<?php   
$i = 1;
//$countAll = mysql_query("SELECT * FROM coins WHERE denomination =  '0.500' AND (commemorativeVersion = 'Modern Commemorative' OR  commemorativeVersion = 'Early Commemorative') ORDER BY coinID ASC") or die(mysql_error());
$countAll = mysql_query("SELECT * FROM coins WHERE denomination =  '0.500' AND commemorative = '1' ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($countAll))
	  {
		
		$coinID = intval($row['coinID']);
		$coin-> getCoinById($coinID);  
		$coinName = $coin->getCoinName(); 
		$coinVersion = $coin->getCoinVersion();
		$i = $i + 1; //add 1 to $i
  echo '
  
  <td><img class="coinSwitch" src="../img/'.$collection->getVarietyImg($coin->getCoinVersion(), $userID).'" alt="" width="100" height="100" /><br />
<a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>';	    

if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder"> '; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>    
    
</table>



<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>