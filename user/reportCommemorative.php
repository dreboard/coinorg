<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$century = '19';
$collectTotal = $collection->getCollectionCountById($userID);

	
$totalHalfCent = $collection->getTotalCollectedCoinsByID('Half Cent', $userID);
$halfCentVal = '.005';
$HalffaceVal = $totalHalfCent * $halfCentVal;

$totalLargeCent = $collection->getTotalCollectedCoinsByID('Large Cent', $userID);
$largeCentVal = '.01';
$largefaceVal = $totalLargeCent * $largeCentVal;

$totalSmallCent = $collection->getTotalCollectedCoinsByID('Small Cent', $userID);
$smallCentVal = '.01';
$smallfaceVal = $totalSmallCent * $smallCentVal;

$totalHalfDime = $collection->getTotalCollectedCoinsByID('Half Dime', $userID);
$halfDimeVal = '.05';
$HalfdimefaceVal = $totalHalfDime * $halfDimeVal;

$totalNickel = $collection->getTotalCollectedCoinsByID('Nickel', $userID);
$nickelVal = '.05';
$nickelfaceVal = $totalNickel * $nickelVal;

$totalDime = $collection->getTotalCollectedCoinsByID('Dime', $userID);
$dimeVal = '.1';
$dimefaceVal = $totalDime * $dimeVal;

$totalTwentyCents = $collection->getTotalCollectedCoinsByID('Twenty Cent', $userID);
$twentyCentVal = '.2';
$TwentyfaceVal = $totalTwentyCents * $twentyCentVal;

$totalTwoCents = $collection->getTotalCollectedCoinsByID('Two Cent', $userID);
$twoCentVal = '.02';
$twofaceVal = $totalTwoCents * $twoCentVal;

$totalThreeCents = $collection->getTotalCollectedCoinsByID('Three Cent', $userID);
$threeCentVal = '.03';
$threefaceVal = $totalThreeCents * $threeCentVal;

$totalQuarter = $collection->getTotalCollectedCoinsByID('Quarter', $userID);
$quarterCentVal = '.25';
$quarterfaceVal = $totalQuarter * $quarterCentVal;

$totalHalfDollar = $collection->getTotalCollectedCoinsByID('Half Dollar', $userID);
$halfVal = '.5';
$HalfdollarfaceVal = $totalHalfDollar * $halfVal;

$totalDollar = $collection->getTotalCollectedCoinsByID('Dollar', $userID);
$dollarVal = '1';
$dollarfaceVal = $totalDollar * $dollarVal;




$coinfaceval = $HalffaceVal + $largefaceVal + $smallfaceVal = $twofaceVal + $threefaceVal + $HalfdimefaceVal + $nickelfaceVal + $dimefaceVal + $TwentyfaceVal + $quarterfaceVal + $HalfdollarfaceVal + $dollarfaceVal;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>19th Century U.S. Coin Type Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );

//
$('.valCount').each(function() {
     if ($(this).val() === "") {
        $(this).val("0.00");
      }
});​

     if ($(('#smallVal')).val() === "") {
        $(('#smallVal')).val("0.00");
      } else {
		  $('').val('');
	  }


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
<h1><img id="setTypes" src="../img/19thTypes.jpg" align="middle">My  19th Century Coin Collection</h1>
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
    <td>$<?php echo formatMoney($coinfaceval); ?></td>
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

<tr align="center"><td colspan="6"><h3>19th Century U.S. Coin Variety Type Collection <?php echo $collection->getTypeCollectionProgressByID($userID) ?> of 34 (<?php echo percent($collection->getTypeCollectionProgressByID($userID), '34'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lafayette', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar"> Lafayette Dollar</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Louisiana Purchase', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar"> Jefferson Louisiana Purchase </a> </td>
  
<td><a href="viewListReport.php?coinType=Braided_Hair_Half_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('McKinley Louisiana Purchase', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Braided_Hair_Half_Cent">McKinley Louisiana Purchase</a> </td>  
<td><a href="viewListReport.php?coinType=Draped_Bust_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lewis and Clark Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Large_Cent">1904 Lewis and Clark Gold Dollar</a> </td>
  
<td><a href="viewListReport.php?coinType=Classic_Head_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lewis and Clark Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Large_Cent">1905 Lewis and Clark Gold Dollar</a><a href="viewListReport.php?coinType=Classic_Head_Large_Cent"></a> </td>
  
<td><a href="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Panama Pacific Fifty Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Panama Pacific Fifty Dollar</a> </td> 

  </tr>
  
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Panama Pacific Exposition ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar"> Panama Pacific Exposition <br />
  Half Dollar
  </a> </td> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Panama Pacific Exposition Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Panama Pacific Exposition Dollar</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiaead', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Indad</a> </td>
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Twent</a> </td>  
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silvent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Silveent</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Nickent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Nickent</a> </td>
  </tr>
  
    <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Braideent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Braident </a> </td> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flyinagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Flyiagle</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiaead', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Indad</a> </td>
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Twent</a> </td>  
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silvent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Silveent</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Nickent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Nickent</a> </td>
  </tr>
  
  
    <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Braideent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Braident </a> </td> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flyinagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Flyiagle</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiaead', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Indad</a> </td>
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Twent</a> </td>  
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silvent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Silveent</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Nickent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Nickent</a> </td>
  </tr>
  
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Braideent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braident </a> </td> 

<td><a href="viewListReport.php?coinType=Flying_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flyinagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flying_Eagle">Flyiagle</a> </td>

<td><a href="viewListReport.php?coinType=Indian_Head"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiaead', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Indian_Head">Indad</a> </td>
  
<td><a href="viewListReport.php?coinType=Two_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Two_Cent">Twent</a> </td>  
  
<td><a href="viewListReport.php?coinType=Silver_Three_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silvent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Silver_Three_Cent">Silveent</a> </td>

<td><a href="viewListReport.php?coinType=Nickel_Three_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Nickent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Nickel_Three_Cent">Nickent</a> </td>
  </tr>
  
    <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Braideent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Braident </a> </td> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flyinagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Flyiagle</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiaead', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Indad</a> </td>
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Twent</a> </td>  
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silvent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Silveent</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Nickent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Nickent</a> </td>
  </tr>
  
    <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Braideent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Braident </a> </td> 

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flyinagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Flyiagle</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiaead', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Indad</a> </td>
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twent ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Twent</a> </td>  
  
<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silvent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Silveent</a> </td>

<td><a href="viewListReport.php?coinType=Commemorative_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Nickent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Commemorative_Dollar">Nickent</a> </td>
  </tr>
  
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Gobrecht_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Gobrecht Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</a> </td>

<td><a href="viewListReport.php?coinType=Seated_Liberty_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Liberty Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty</a> </td>  
  
<td><a href="viewListReport.php?coinType=Trade_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Trade Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Trade_Dollar">Trade</a> </td>
  

  
<td><a href="viewListReport.php?coinType=Morgan_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Morgan Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Morgan_Dollar">Morgan</a> </td>
  
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
<div class="roundedWhite">
  <table width="100%" id="masterCountTbl" border="1">
    <tr>
    <td width="206" class="darker">Types</td>
    <td width="306" align="center" class="darker">Collected </td>    
    <td width="452" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="Half_Cent.php" class="brownLink">Half Cents</a></td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Cent', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" id="halfVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Cent', $userID); ?>" /></td>
</tr>
  <tr>
    <td><a href="Large_Cent.php" class="brownLink">Large Cents</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Large Cent', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Large Cent', $userID); ?>" /></td>
  </tr>
  

 <tr>
    <td><a href="Small_Cent.php" class="brownLink">Small Cents</a>
    <td align="center" id="Lincoln_WheatCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Small Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" id="smallVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Small Cent', $userID); ?>" /></td>
 </tr>
 
 
 <tr>
 <td><a href="Half_Dime.php" class="brownLink">Half Dimes</a></td>
    <td align="center" id="Lincoln_MemorialCount"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="Nickel.php" class="brownLink">Nickels</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Nickel', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Nickel', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Dime.php" class="brownLink">Dimes</a></td>
    <td align="center" id="Union_ShieldCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="Twenty_Cent.php" class="brownLink">Twenty Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Twenty Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Twenty Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Two_Cent.php" class="brownLink">Two Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Two Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Two Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Three_Cent.php" class="brownLink">Three Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Three Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Three Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Quarter.php" class="brownLink">Quarters</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Quarter', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Quarter', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Half_Dollar.php" class="brownLink">Half Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Dollar', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="Dollar.php" class="brownLink">Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Dollar', $userID); ?>" /></td>
 </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $collection->getCoinSumByAccount($userID); ?>" /></td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="printSmallBtn" type="button" value="Print Small Cent Report"/ >&nbsp; | &nbsp;<input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <select onChange="window.open(this.options[this.selectedIndex].value,'_top')">
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
  <a href="viewCollectionSubType.php?coinSubCategory=Small_Cent">View Cent Collection </a><br>
<a class="topLink" href="#top">Top</a></p></div>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>