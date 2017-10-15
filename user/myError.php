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
<title> Error Coin Report</title>
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
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td> 
  </tr>
</table> 

<hr />

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Errors</strong></td>
    <td width="11%" align="right"><?php echo $collection->getUserError($userID); ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Error Investment</strong></td>
    <td align="right">$<?php echo $collection->getUserErrorSum($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />





  <br />
<?php include("../inc/pageElements/dashboardTbl.php"); ?>
<br />
  <table border="0" cellpadding="3" class="typeTbl" id="folderTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h2> Error Type Collection</h2></td>
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

  <h1>Error  By Coin Type</h1>
<table width="100%" border="1" class="reportList priceListTbl" cellpadding="3">
    <tr class="keyRow">
      <td>Grade</td>
      <td align="center">Errors</td>
      <td align="center">Third Party Errors</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="SemiKeyRow">
      <td>Error Type</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td width="40%"><strong>Off Center</strong></td>
    <td width="12%" align="center"><?php echo $collection->getError('Off Center', $userID); ?></td>
    <td width="26%" align="center"><?php echo $collection->getProError('Off Center', $userID); ?></td>
    <td width="22%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Broadstrike</strong></td>
    <td align="center"><?php echo $collection->getError('Broadstrike', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Broadstrike', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Partial Collar</strong></td>
    <td align="center"><?php echo $collection->getError('Partial Collar', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Partial Collar', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Multiple Strike</strong></td>
    <td align="center"><?php echo $collection->getError('Multiple Strike', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Multiple Strike', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Mated Pair</strong></td>
    <td align="center"><?php echo $collection->getError('Mated Pair', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Mated Pair', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Brockage</strong></td>
    <td align="center"><?php echo $collection->getError('Brockage', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Brockage', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Capped Die</strong></td>
    <td align="center"><?php echo $collection->getError('Capped Die', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Capped Die', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Indent</strong></td>
    <td align="center"><?php echo $collection->getError('Indent', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Indent', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Bonded</strong></td>
    <td align="center"><?php echo $collection->getError('Bonded', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Bonded', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Wrong Planchet</strong></td>
    <td align="center"><?php echo $collection->getError('Wrong Planchet', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Wrong Planchet',  $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Mule</strong></td>
    <td align="center"><?php echo $collection->getError('Mule', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Mule', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Weak Strike</strong></td>
    <td align="center"><?php echo $collection->getError('Weak Strike', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Weak Strike', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Transitional Error</strong></td>
    <td align="center"><?php echo $collection->getError('Transitional Error', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Transitional Error', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Double Denomination</strong></td>
    <td align="center"><?php echo $collection->getError('Double Denomination', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Double Denomination', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Folded Over</strong></td>
    <td align="center"><?php echo $collection->getError('Folded Over', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Folded Over', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Clipped Planchet</strong></td>
    <td align="center"><?php echo $collection->getError('Clipped Planchet',  $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Clipped Planchet',  $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Lamination Error</strong></td>
    <td align="center"><?php echo $collection->getError('Lamination Error', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Lamination Error',  $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Missing Edge Lettering</strong></td>
    <td align="center"><?php echo $collection->getError('Missing Edge Lettering', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Missing Edge Lettering', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Minor Errors</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Die Cracks</strong></td>
    <td align="center"><?php echo $collection->getError('Die Cracks', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Die Cracks', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Machine Doubling</strong></td>
    <td align="center"><?php echo $collection->getError('Machine Doubling', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Machine Doubling', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Die Deterioration Doubling</strong></td>
    <td align="center"><?php echo $collection->getError('Die Deterioration Doubling', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Die Deterioration Doubling', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Flat Field Doubling</strong></td>
    <td align="center"><?php echo $collection->getError('Flat Field Doubling', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Flat Field Doubling', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Die Deterioration Doubling</strong></td>
    <td align="center"><?php echo $collection->getError('Die Deterioration Doubling', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Die Deterioration Doubling', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Ejection Doubling</strong></td>
    <td align="center"><?php echo $collection->getError('Ejection Doubling', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Ejection Doubling', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Punch Shoulder Outlines</strong></td>
    <td align="center"><?php echo $collection->getError('Punch Shoulder Outlines', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Punch Shoulder Outlines',  $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Plating Split Doubling</strong></td>
    <td align="center"><?php echo $collection->getError('Plating Split Doubling',  $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Plating Split Doubling',  $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Repunched Mint Mark</strong></td>
    <td align="center"><?php echo $collection->getError('Repunched Mint Mark', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Repunched Mint Mark', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Touch up Engraving Doubling</strong></td>
    <td align="center"><?php echo $collection->getError('Touch up Engraving Doubling', $userID); ?></td>
    <td align="center"><?php echo $collection->getProError('Touch up Engraving Doubling', $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>