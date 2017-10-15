<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

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
<title>My Coin Collection</title>
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
//printSmallBtn

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
<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle">   Error Coin Report</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="13%" class="darker"><a href="myRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="viewFolderCollection.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="myError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="myBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="myBoxes.php">Boxes</a></td>    
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="32%"><strong>Total Collected </strong></td>
    <td width="68%"><?php echo $collection->getCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td><?php echo $collection->getUniqueCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getCoinSumByAccount($userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo formatMoney($coinfaceval); ?></td>
  </tr>
  </table>
  <br />
<?php include("../inc/pageElements/dashboardTbl.php"); ?>
<br />
  <table border="0" cellpadding="3" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h2>U.S. Error Type Collection</h2></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewErrorType.php?errorType=Off_Center"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Off Center'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Off_Center">Off Center</a> </td>
  
<td><a href="viewErrorType.php?errorType=Broadstrike"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Broadstrike'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Broadstrike">Broadstrike</a></td>
  
<td><a href="viewErrorType.php?errorType=Partial_Collar"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Partial_Collar'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Partial_Collar">Partial Collar</a></td>
  
<td><a href="viewErrorType.php?errorType=Multiple_Strike"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Multiple_Strike'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Multiple_Strike">Multiple Strike</a></td>
  
<td><a href="viewErrorType.php?errorType=Mated_Pair"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Mated_Pair'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Mated_Pair">Mated Pair</a></td>
  
<td><a href="viewErrorType.php?errorType=Brockage"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Brockage'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Brockage">Brockage</a></td>
  </tr>
  
  <tr class="dateHolder" valign="top"> 

<td><a href="viewErrorType.php?errorType=Capped_Die"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Capped_Die'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Capped_Die">Capped Die</a> </td>
  
<td><a href="viewErrorType.php?errorType=Indent"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Indent'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Indent">Indent</a> </td>
  
<td><a href="viewErrorType.php?errorType=Bonded"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Bonded'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Bonded">Bonded</a> </td>
  
<td><a href="viewErrorType.php?errorType=Wrong_Planchet"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Wrong Planchet'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Wrong_Planchet">Wrong Planchet</a> </td>
  
<td><a href="viewErrorType.php?errorType=Mule"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Mule'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Mule">Mule</a> </td>
  
<td><a href="viewErrorType.php?errorType=Weak_Strike"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Weak Strike'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Weak_Strike">Weak Strike</a> </td>
  </tr>
  
    <tr class="dateHolder" valign="top"> 

<td><a href="viewErrorType.php?errorType=Transitional_Error"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Transitional Error'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Transitional_Error">Transitional</a> </td>
  
<td><a href="viewErrorType.php?errorType=Double_Denomination"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Double Denomination'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Double_Denomination">Double Denomination</a> </td>
  
<td><a href="viewErrorType.php?errorType=Fold_Over"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Fold_Over'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Fold_Over">Fold Over</a> </td>
  
<td><a href="viewErrorType.php?errorType=Clipped_Planchet"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Clipped Planchet'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Clipped_Planchet">Clipped Planchet</a> </td>
  
<td><a href="viewErrorType.php?errorType=Lamination"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Lamination'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Lamination">Lamination</a> </td>
  
<td><a href="viewErrorType.php?errorType=Edge_Lettering"><img class="coinSwitch" src="../img/<?php echo $Errors->getErrorTypeImgByID($userID, $errorType='Edge_Lettering'); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewErrorType.php?errorType=Edge_Lettering">Edge Lettering</a> </td>
  </tr>
</table>
  <br />

  <h1>Errors  By  Type</h1>
<div class="roundedWhite">
  <table width="100%" border="1" cellpadding="3" id="masterCountTbl">
    <tr>
    <td width="206" class="darker">Types</td>
    <td width="306" align="center" class="darker">Collected </td>    
    <td width="452" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewErrorCategory.php?coinCategory=Half_Cent" class="brownLink">Half Cents</a></td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Cent', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" id="halfVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Cent', $userID); ?>" /></td>
</tr>
  <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Large_Cent" class="brownLink">Large Cents</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Large Cent', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Large Cent', $userID); ?>" /></td>
  </tr>
  

 <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Small_Cent" class="brownLink">Small Cents</a>
    <td align="center" id="Lincoln_WheatCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Small Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" id="smallVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Small Cent', $userID); ?>" /></td>
 </tr>
 
   <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Two_Cent" class="brownLink">Two Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Two Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Two Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Three_Cent" class="brownLink">Three Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Three Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Three Cent', $userID); ?>" /></td>
 </tr>
 
 <tr>
 <td><a href="viewErrorCategory.php?coinCategory=Half_Dime" class="brownLink">Half Dimes</a></td>
    <td align="center" id="Lincoln_MemorialCount"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Nickel" class="brownLink">Nickels</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Nickel', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Nickel', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Dime" class="brownLink">Dimes</a></td>
    <td align="center" id="Union_ShieldCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Twenty_Cent" class="brownLink">Twenty Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Twenty Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Twenty Cent', $userID); ?>" /></td>
 </tr>
  
  <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Quarter" class="brownLink">Quarters</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Quarter', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Quarter', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Half_Dollar" class="brownLink">Half Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Half Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Half Dollar', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewErrorCategory.php?coinCategory=Dollar" class="brownLink">Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCoinsByID('Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByCategory('Dollar', $userID); ?>" /></td>
 </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $collection->getCoinSumByAccount($userID); ?>" /></td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" id="printSmallBtn" type="button" value="Print Report"/ >&nbsp; | &nbsp;
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
      <option value="viewListReport.php?coinType=Twenty_Cent_Piece">Twenty Cents</option>
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