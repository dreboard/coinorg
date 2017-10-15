<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$century = '20';

$coinTypes = array('Indian Head','Liberty Head Nickel','Indian Head Nickel','Jefferson Nickel','Barber','Dime,Winged','Liberty Dime','Roosevelt Dime','Barber Quarter','Standing Liberty','Washington Quarter','State Quarter','Barber Half Dollar','Walking Liberty','Franklin','Kennedy Half Dollar','Morgan Dollar','Peace Dollar','Eisenhower Dollar','Susan B Anthony Dollar');

	$sql11 = mysql_query( "SELECT DISTINCT coinType FROM collection WHERE century = '".$century."' AND  userID = '".$userID."' AND coinType IN('".implode("', '", $coinTypes)."')");
	$centuryCount = mysql_num_rows($sql11);    	


$collectTotal = $collection->getCenturyCollectionCountById($userID, $century);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>20th Century U.S. Coin Type Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );

//

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
<h1><img id="setTypes" src="../img/20thTypes.jpg" align="middle"> My  20th Century Coin Collection</h1>
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
    <td width="51%"><?php echo $collection->getCenturyCollectionCountById($userID, $century); ?></td>
  </tr>
  <tr>
    <td width="49%"><strong>Total Unique </strong></td>
    <td width="51%"><?php echo $collection->getUniqueCenturyCollectionCountById($userID, $century); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getCenturySumByAccount($userID, $century); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format($collection->getCenturyFaceValByAccount($userID, $century),2); ?></td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $collection->getCenturyByMintCountByID($userID, $century); ?> of <?php echo $coin->getCenturyByMintCount($century); ?> (<?php echo percent($collection->getCenturyByMintCountByID($userID, $century), $coin->getCenturyByMintCount($century)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collection->getCenturyAllCollectionById($userID, $century); ?> of <?php echo $coin->getCenturyCount($century); ?> (<?php echo percent($collection->getCenturyAllCollectionById($userID, $century), $coin->getCenturyCount($century)) ?>%)</td>
  </tr>
  </table>
  <table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>
      <h3>U.S. Coin Type Sets</h3></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td><a href="reportEighteenth.php">18th Century Set</a></td>
    <td><a href="reportNineteenth.php">19th Century Set</a></td>
    <td><a href="reportTwentieth.php">20th Century Set</a></td>
    <td><a href="reportTwentyfirst.php">21st Century Set</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <hr />

  <table border="0" id="folderTbl" class="typeTbl">
  <tr align="center"><td colspan="6"><h3>20th Century U.S. Coin Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top">
    <td><a href="viewListReport.php?coinType=Indian_Head"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Indian Head', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Indian_Head">Indian Head</a></td>
      
    <td><a href="viewListReport.php?coinType=Lincoln_Wheat"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Lincoln Wheat', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat</a></td>
      
    <td><a href="viewListReport.php?coinType=Lincoln_Memorial"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Lincoln Memorial', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial</a></td>
      
    <td><a href="viewListReport.php?coinType=Liberty_Head_Nickel"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Liberty Head Nickel', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Liberty_Head_Nickel">Liberty Head<br />
        Nickel</a></td>
    <td><a href="viewListReport.php?coinType=Indian_Head_Nickel"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Indian Head Nickel', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Indian_Head_Nickel">Indian Head<br />
        Nickel</a></td>
    <td><a href="viewListReport.php?coinType=Jefferson_Nickel"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Jefferson Nickel', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Jefferson_Nickel">Jefferson Nickel</a></td>
    </tr>
  
  <tr class="dateHolder" valign="top">
    <td><a href="viewListReport.php?coinType=Barber_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Barber Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Barber_Dime">Barber Dime</a></td>
    <td><a href="viewListReport.php?coinType=Winged_Liberty_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Winged Liberty Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</a></td>
    <td><a href="viewListReport.php?coinType=Roosevelt_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Roosevelt Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</a></td>
    <td><a href="viewListReport.php?coinType=Barber_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Barber Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Barber_Quarter">Barber Quarter</a></td>
    <td><a href="viewListReport.php?coinType=Standing_Liberty"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Standing Liberty', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Standing_Liberty">Standing Liberty</a></td>
    <td><a href="viewListReport.php?coinType=Washington_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Washington Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Washington_Quarter">Washington Quarter</a></td>
    </tr>
  
  <tr class="dateHolder" valign="top">
    <td><a href="viewListReport.php?coinType=State_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'State Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=State_Quarter">State Quarter</a></td>
    <td><a href="viewListReport.php?coinType=Barber_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Barber Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Barber_Half_Dollar">Barber Half Dollar</a></td>
    <td><a href="viewListReport.php?coinType=Walking_Liberty"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Walking Liberty', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Walking_Liberty">Walking Liberty</a></td>
    <td><a href="viewListReport.php?coinType=Franklin_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Franklin Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Lincoln_Whe">Franklin</a></td>
    <td><a href="viewListReport.php?coinType=Kennedy_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Kennedy Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half Dollar</a></td>
    <td><a href="viewListReport.php?coinType=Morgan_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Morgan Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewListReport.php?coinType=Morgan_Dollar">Morgan Dollar</a></td>
    </tr>
 <tr class="dateHolder" valign="top">
   <td><a href="viewListReport.php?coinType=Peace_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Peace Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
     <a href="viewListReport.php?coinType=Peace_Dollar">Peace Dollar</a></td>
   <td><a href="viewListReport.php?coinType=Eisenhower_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Eisenhower Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
     <a href="viewListReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</a></td>
   <td><a href="viewListReport.php?coinType=Susan_B_Anthony_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Susan B Anthony Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
     <a href="viewListReport.php?coinType=Susan_B_Anthony_Dollar">Susan B Anthony Dollar</a></td> 

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>

  </tr> 
  </table>
  <hr />

<div class="roundedWhite">
  <table width="100%" id="masterCountTbl" border="1">
    <tr>
    <td width="206" class="darker">Types</td>
    <td width="306" align="center" class="darker">Collected </td>    
    <td width="452" align="center" class="darker"> Investment</td>
  </tr>
  

 <tr>
   <td><a href="Small_Cent.php" class="brownLink">Small Cents</a>
     <td align="center" id="Lincoln_WheatCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Small Cent', $userID, $century); ?>"/ ></td>
   <td align="center"><input readonly class="valCount" id="smallVal" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Small Cent', $userID, $century); ?>" /></td>
 </tr>

 <tr>
    <td><a href="Nickel.php" class="brownLink">Nickels</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Nickel', $userID, $century); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Nickel', $userID, $century); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Dime.php" class="brownLink">Dimes</a></td>
    <td align="center" id="Union_ShieldCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Dime', $userID, $century); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Dime', $userID, $century); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Quarter.php" class="brownLink">Quarters</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Quarter', $userID, $century); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Quarter', $userID, $century); ?>" /></td>
  </tr>
 
  <tr>
    <td><a href="Half_Dollar.php" class="brownLink">Half Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Half Dollar', $userID, $century); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Half Dollar', $userID, $century); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Dollar.php" class="brownLink">Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Dollar', $userID, $century); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Dollar', $userID, $century); ?>" /></td>
 </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $collection->getCenturySumByAccount($userID, $century); ?>" /></td>
 </tr>
</table>
<p><select onChange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Quick Menu</option>
<optgroup label="Half Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
</optgroup>
<optgroup label="Large Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
<option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
<option value="viewListReport.php?coinType=Indian_Head">Indian Head Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
<option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
</optgroup>
<optgroup label="Two Cents">
<option value="Two_Cent">Two Cent Piece</option>
</optgroup>
<optgroup label="Three Cents">
<option value="Three_Cent">Three Cent Piece</option>
</optgroup>
<optgroup label="Half Dimes">
<option value="reportHalf_Dime.php">All Half Dimes</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
</optgroup>
<optgroup label="Nickels">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Shield_Nickel">Flowing Hair Large Cent</option>
<option value="viewListReport.php?coinType=Indian_Head">Indian Head</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat">Draped Bust Large Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial">Classic Head Large Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial Series</option>
<option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
</optgroup>
<optgroup label="Dimes">
<option value="viewListReport.php?coinType=reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
<option value="viewListReport.php?coinType=Barber_Dime">Barber Dime</option>
<option value="viewListReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
<option value="viewListReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
</optgroup>
<optgroup label="Twenty Cents">
<option value="Twenty Cents">Twenty Cent Piece</option>
</optgroup>
<optgroup label="Quarters">
<option value="reportHalf.php">All Half Dollars</option>
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
<option value="reportHalf.php">All Half Dollars</option>
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
<option value="reportHalf.php">All Half Dollars</option>
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


<p><a href="http://www.amazon.com/gp/product/0794836887/ref=as_li_tf_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=0794836887&linkCode=as2&tag=xt0a-20" target="_blank"><img src="../siteImg/albumBanner.jpg" width="980" height="206" /></a><img src="http://www.assoc-amazon.com/e/ir?t=xt0a-20&l=as2&o=1&a=0794836887" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>