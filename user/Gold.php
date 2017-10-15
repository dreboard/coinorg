<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Dollar';
$coinVal = '1';
$collectTotal = $coin->getCoinCatCountByID($userID, $coinCategory);
$coinfaceval = $collectTotal * $coinVal;
$coinMetal = 'Gold';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Dollar Collection</title>
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
<h1><img src="../img/Gold_Mixed.jpg" width="100" height="100" align="middle">My Gold Collection (<?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?>) Coins</h1>
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
<table width="100%" id="reportListLinks">
  <tr>
    <td class="darker">Types</td>
    <td class="darker"><a href="#one">Dollar</a></td>
    <td class="darker"> <a href="#two">$2.50 Dollars</a></td>    
        <td class="darker"><a href="#three">$3 Dollars</a></td>
    <td class="darker"> <a href="#four">$4 Dollars</a></td>  
        <td class="darker"><a href="#five">$5 Dollars</a></td>
    <td class="darker"> <a href="#ten">$10 Dollars</a></td> 
            <td class="darker"><a href="#twenty">$20 Dollars</a></td>
    <td class="darker"> <a href="#fifty">$50 Dollars</a></td>  
  </tr>
</table>  
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collection->getTotalCollectedGoldByID($coinMetal, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getTotalInvestmentSumByCoinMetal($coinMetal, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format((float)$coinfaceval, 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Type Collection Progress</strong></td>
    <td><?php echo $collection->getTypeCollectionProgressByCoinMetal($coinMetal, $userID) ?> of 11 (<?php echo percent($collection->getTypeCollectionProgressByCoinMetal($coinMetal, $userID), '11'); ?>%)</td>
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
  <br />

  <div class="roundedWhite">
<img src="../img/Large_Indian_Head_Dollar.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Gold Dollars  </h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" class="darker">Collected Pieces</td>    
    <td width="228" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Liberty_Head_Gold_Dollar&page=1">Liberty Head Gold Dollar</a> (1849-1854)</td>
  <td align="center" id="ShieldNickelCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty Head Gold Dollar', $userID); ?>"/ ></td>  
  <td><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
  
  <tr>
    <td><a href="viewListReport.php?coinType=Indian_Princess_Gold_Dollar&page=1">Indian Head Gold Dollar</a> (1854-1889)</td>
     <td align="center" id="Indian_Princess_Gold_DollarCount"><input readonly class="collectCount" type="text" value="<?php echo $collection->getReportTypeCount('Indian_Princess_Gold_Dollar', $userID); ?>"/ ></td>  
     <td><input readonly class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Indian_Princess_Gold_Dollar', $userID)?>" /></td>
  </tr>

 <tr class="noHighlight">
   <td>Totals</td>

   <td align="center"><input id="total_quantity4" readonly class="collectCount4" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <?php echo include("../inc/pageElements/selectMenu.php");  ?><br>
<a class="topLink" href="#top">Top</a></p></div>

<br />

<div class="roundedWhite">
<img src="../img/Liberty_Cap_Quarter_Eagle.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Quarter Eagles</h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Liberty_Cap_Quarter_Eagle&page=1">Liberty Cap</a> (1796-1807)</td>
  <td align="center"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty_Cap_Quarter_Eagle', $userID); ?>"/ ></td>  
  <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
  
  <tr>
    <td><a href="viewListReport.php?coinType=Turban_Head_Quarter_Eagle&page=1">Turban Head </a> (1808-1834)</td>
     <td align="center" id="Indian_HeadCount"><input readonly class="collectCount" type="text" value="<?php echo $collection->getReportTypeCount('Turban Head Quarter Eagle', $userID); ?>"/ ></td>  
     <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
  </tr>

  
 <tr><td><a href="viewListReport.php?coinType=Classic_Head_Quarter_Eagle&page=1">Classic Head</a> (1834-1839)
    <td align="center" id="Classic_Head_Quarter_EagleCount"><input readonly class="collectCount" type="text" value="<?php echo $collection->getReportTypeCount('Classic Head Quarter Eagle', $userID); ?>"/ ></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
 </tr>
 

 <tr>
 <td><a href="viewListReport.php?coinType=Liberty_Head_Quarter_Eagle&page=1">Liberty Head</a> (1840-1907)</td>
    <td align="center" id="Liberty_Head_Quarter_EagleCount"><input readonly class="collectCount" type="text" value="<?php echo $collection->getReportTypeCount('Liberty Head Quarter Eagle', $userID); ?>"/ ></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
 </tr>
 
 
 <tr>
    <td><a href="viewListReport.php?coinType=Indian_Head_Quarter_Eagle&page=1">Indian Head</a> (1908-1929)</td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="collectCount" type="text" value="<?php echo $collection->getReportTypeCount('Indian Head Quarter Eagle', $userID); ?>" /></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
 </tr>
 
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="total_quantity" readonly class="collectCountTotal" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <?php echo include("../inc/pageElements/selectMenu.php");  ?><br>
<a class="topLink" href="#top">Top</a></p></div>
<br />

<div class="roundedWhite">
<img src="../img/Three_Dollar_Gold_Piece.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Three Dollars  </h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" class="darker">Collected Pieces</td>    
    <td width="228" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Three_Dollar_Gold_Piece&page=1">Three Gold Dollar</a> (1854-1889)</td>
  <td align="center" id="ShieldNickelCount"><input readonly class="collectCount" type="text" value="<?php echo $collection->getReportTypeCount('Three Gold Dollar Piece', $userID); ?>"/ ></td>  
  <td><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
  
 <tr class="noHighlight">
   <td>Totals</td>
   
   <td align="center"><input id="total_quantity4" readonly class="collectCount4" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <?php echo include("../inc/pageElements/selectMenu.php");  ?><br>
<a class="topLink" href="#top">Top</a></p></div>
<br />

<div class="roundedWhite">
<img src="../img/Stella_Gold_Four_Dollar.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Four Dollars  </h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" class="darker">Collected Pieces</td>    
    <td width="228" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Stella_Gold_Four_Dollar&page=1">Stella Gold Four Dollar</a> (1854-1889)</td>
  <td align="center" id="ShieldNickelCount"><input readonly class="collectCount" type="text" value="<?php echo $collection->getReportTypeCount('Stella Gold Four Dollar', $userID); ?>"/ ></td>  
  <td><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
  
 <tr class="noHighlight">
   <td>Totals</td>
   
   <td align="center"><input id="total_quantity4" readonly class="collectCount4" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <?php echo include("../inc/pageElements/selectMenu.php");  ?><br>
<a class="topLink" href="#top">Top</a></p></div>

<br />

<div class="roundedWhite">
<img src="../img/Liberty_Cap_Half_Eagle.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Five Dollars  </h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" class="darker">Collected Pieces</td>    
    <td width="228" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Turban_Head_Half_Eagle&page=1">Turban Head Half Eagle</a> (1795-1807)</td>
  <td align="center" id="ShieldNickelCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Turban Head Half Eagle', $userID); ?>"/ ></td>
  <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>  
  <tr>
    <td><a href="viewListReport.php?coinType=Liberty_Cap_Half_Eagle&page=1">Liberty Cap Half Eagle</a> (1807-1834)</td>
     <td align="center" id="Liberty_Cap_Half_EagleCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Liberty Cap Half Eagle', $userID); ?>"/ ></td>
     <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>  
     </tr>
  
 <tr><td><a href="viewListReport.php?coinType=Classic_Head_Half_Eagle&page=1">Classic Head Half Eagle</a> (1834-1838)
    <td align="center" id="Classic_Head_Half_EagleCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Classic Head Half Eagle', $userID); ?>"/ ></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
    </tr>
 
 <tr>
 <td><a href="viewListReport.php?coinType=Liberty_Head_Half_Eagle&page=1">Liberty Head Half Eagle</a> (1839-1908)</td>
    <td align="center" id="Liberty_Head_Half_EagleCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Liberty Head Half Eagle', $userID); ?>"/ ></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
    </tr>
 
 <tr>
    <td><a href="viewListReport.php?coinType=Indian_Head_Half_Eagle&page=1">Indian Head Half Eagle</a> (1908-1929)</td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Indian Head Half Eagle', $userID); ?>" /></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
    </tr>
 
  <tr>
    <td><a href="viewListReport.php?coinType=American_Eagle_Five_Dollar&page=1">American Eagle Five Dollar</a> (2006-Present)</td>
    <td align="center" id="American_Eagle_Five_DollarCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('American Eagle Five Dollar', $userID); ?>"/ ></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
 </tr>
 
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="total_quantity3" readonly class="collectCountTotal" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <?php echo include("../inc/pageElements/selectMenu.php");  ?><br>
<a class="topLink" href="#top">Top</a></p></div>
<br />

<div class="roundedWhite">
<img src="../img/Indian_Head_Eagle.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Ten Dollars  </h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" class="darker">Collected Pieces</td>    
    <td width="228" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Turban_Head_Eagle&page=1">Turban Head Eagle</a> (1795-1804)</td>
  <td align="center" id="ShieldNickelCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Turban Head Eagle', $userID); ?>"/ ></td>
  <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>  
  <tr>
    <td><a href="viewListReport.php?coinType=Liberty_Head_Eagle&page=1">Liberty Head Eagle</a> (1838-1907)</td>
     <td align="center" id="Liberty_Head_EagleCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Liberty Head Eagle', $userID); ?>"/ ></td>
     <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>  
     </tr>
  

 <tr><td><a href="viewListReport.php?coinType=Indian_Head_Eagle&page=1">Indian Head Eagle</a> (1907-1933)
    <td align="center" id="Indian_Head_EagleCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Indian Head Eagle', $userID); ?>"/ ></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
    </tr>

 <tr>
 <td><a href="viewListReport.php?coinType=American_Eagle_Ten_Dollar&page=1">American Eagle Ten Dollar</a> (1986-Present)</td>
    <td align="center" id="American_Eagle_Ten_DollarCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('American Eagle Ten Dollar', $userID); ?>"/ ></td>
    <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
    </tr>
 

 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="total_quantity3" readonly class="collectCountTotal" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <?php echo include("../inc/pageElements/selectMenu.php");  ?><br>
<a class="topLink" href="#top">Top</a></p></div>

<br />

<div class="roundedWhite">
<img src="../img/Coronet_Head_Double_Eagle.jpg" width="50" height="auto" align="left" class="coinHrdLogo">
<h3>Twenty Dollars  </h3>
<table width="936" class="reportList priceListTbl" border="1">
  <tr>
    <td width="444" class="darker">Types</td>
    <td width="210" class="darker">Collected Pieces</td>    
    <td width="228" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Coronet_Head_Double_Eagle&page=1">Coronet Head Double Eagle</a> (1849-1907)</td>
  <td align="center" id="ShieldNickelCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Coronet Head Double Eagle', $userID); ?>"/ ></td>
  <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>  
  <tr>
    <td><a href="viewListReport.php?coinType=Saint_Gaudens_Double_Eagle&page=1">Saint Gaudens Double Eagle</a> (1907-1933)</td>
     <td align="center" id="Saint_Gaudens_Double_EagleCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('Saint Gaudens Double Eagle', $userID); ?>"/ ></td>
     <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>  
     </tr>

 
 <tr>
   <td><a href="viewListReport.php?coinType=American_Eagle_Twenty_Dollar&page=1">American Eagle</a> (1986-Present)</td>
   <td align="center" id="American_Eagle_Twenty_DollarCount"><input readonly class="collectCount3" type="text" value="<?php echo $collection->getReportTypeCount('American Eagle Twenty Dollar', $userID); ?>"/ ></td>
   <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Liberty Head Gold Dollar', $userID)?>" /></td>
   </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="total_quantity3" readonly class="collectCountTotal" type="text" value="" /></td>
   <td>&nbsp;</td>
 </tr>
</table>
<p><input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <?php echo include("../inc/pageElements/selectMenu.php");  ?><br>
<a class="topLink" href="#top">Top</a></p></div>






<hr />
<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Silver/Clad Dollar Type Collection <?php echo $collection->getTypeCollectionProgressByCategory($coinCategory, $userID) ?> of 11 (<?php echo percent($collection->getTypeCollectionProgressByCategory($coinCategory, $userID), '11'); ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Flowing_Hair_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Flowing Hair Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair</a> </td>

<td><a href="viewListReport.php?coinType=Draped_Bust_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Draped Bust Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Draped_Bust_Dollar">Draped Bust</a> </td>
  
<td><a href="viewListReport.php?coinType=Gobrecht_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Gobrecht Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Gobrecht_Dollar">Gobrecht</a> </td>
  
<td><a href="viewListReport.php?coinType=Seated_Liberty_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Seated Liberty Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty</a> </td>  
  
<td><a href="viewListReport.php?coinType=Trade_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Trade Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Trade_Dollar">Trade</a> </td>
  

  
<td><a href="viewListReport.php?coinType=Morgan_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Morgan Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Morgan_Dollar">Morgan</a> </td>
  </tr>
  
  <tr class="dateHolder" valign="top"> 

<td><a href="viewListReport.php?coinType=Peace_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Peace Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Peace_Dollar">Peace</a> </td>

<td><a href="viewListReport.php?coinType=Eisenhower_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Eisenhower Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Eisenhower_Dollar">Eisenhower</a> </td>
  
<td><a href="viewListReport.php?coinType=Susan_B_Anthony_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Susan B Anthony Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Susan_B_Anthony_Dollar">Susan B Anthony</a> </td>
  
<td><a href="viewListReport.php?coinType=Sacagawea_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Sacagawea Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Sacagawea_Dollar">Sacagawea</a> </td>  
  
<td><a href="viewListReport.php?coinType=Presidential_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Presidential Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Presidential_Dollar">Presidential</a> </td>
    
<td>&nbsp;</td>
  </tr>
 </table>
<hr />
<a name="coins"></a>
<h1>All Dollars</h1>

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
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinMetal = 'coinMetal' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addBullion.php">None in collection, Add A Gold Coin</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
	<td>&nbsp;</td>		    
  </tr>
  ';
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
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>