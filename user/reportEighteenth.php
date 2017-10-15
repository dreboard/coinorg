<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$century = '18';
$collectTotal = $collection->getCenturyCollectionCountById($userID, $century);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>18th Century U.S. Coin Type Collection</title>
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
<h1><img id="setTypes" src="../img/18thTypes.jpg" align="middle"> My  18th Century Coin Collection</h1>
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
    <td>$<?php echo number_format($collection->getCenturyFaceValByAccount($userID, $century),3); ?></td>
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
  
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>18th Century U.S. Coin  Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Liberty Cap Half Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap Half Cent</a> </td>

<td><a href="viewListReport.php?coinType=Flowing_Hair_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Flowing Hair Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair Large Cent</a> </td>
  
<td><a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Liberty Cap Large Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap Large Cent </a> </td>
  
<td><a href="viewListReport.php?coinType=Flowing_Hair_Half_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Flowing Hair Half Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair Half Dime</a> </td>  
  
<td><a href="viewListReport.php?coinType=Draped_Bust_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Draped Bust Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Dime">Draped Bust Dime</a> </td>
    
<td><a href="viewListReport.php?coinType=Draped_Bust_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Draped Bust Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</a> </td>
  </tr>
  
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Flowing Hair Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half Dollar</a> </td>

<td><a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Draped Bust Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half Dollar</a> </td>
  
<td><a href="viewListReport.php?coinType=Flowing_Hair_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Flowing Hair Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair<br />
Dollar</a> </td>
  
<td><a href="viewListReport.php?coinType=Liberty_Cap_Quarter_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Liberty Cap Quarter Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Quarter_Eagle">Liberty Cap Quarter Eagle</a> </td>  
  
<td><a href="viewListReport.php?coinType=Capped_Bust_Half_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Capped Bust Half Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Capped_Bust_Half_Eagle">Capped Bust Half Eagle</a> </td>
    
<td><a href="viewListReport.php?coinType=Liberty_Cap_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getCenturyTypeImage($century, 'Liberty Cap Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Liberty_Cap_Eagle"> Liberty Cap Eagle</a> </td>
  </tr>
  </table>
  <hr />

<div>
  <table width="100%" id="masterCountTbl" border="1">
    <tr>
    <td width="206" class="darker">Types</td>
    <td width="306" align="center" class="darker">Collected </td>    
    <td width="452" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="Half_Cent.php" class="brownLink">Half Cents</a></td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Half Cent', $userID, $century); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" id="halfVal" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Half Cent', $userID, $century); ?>" /></td>
</tr>
  <tr>
    <td><a href="Large_Cent.php" class="brownLink">Large Cents</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Large Cent', $userID, $century); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Large Cent', $userID, $century); ?>" /></td>
  </tr>
 
 
 <tr>
   <td><a href="Half_Dime.php" class="brownLink">Half Dimes</a></td>
   <td align="center" id="Lincoln_MemorialCount"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getTotalCollectedCenturyCategoryByID('Half Dime', $userID, $century); ?>"/ ></td>
   <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalCenturyInvestmentSumByCategory('Half Dime', $userID, $century); ?>" /></td>
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
<p><a class="topLink" href="#top">Top</a></p></div>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>