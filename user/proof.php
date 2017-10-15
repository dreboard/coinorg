<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$setType = 'Proof';
$setLink = 'Proof';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Proof Collection</title>
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
<h1><img src="../img/Eisenhower_Dollar_Proof.jpg" width="100" height="100" align="middle"> My Proof Collection</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="proofCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="proofErrors.php">Errors</a></td>
  </tr>
</table> 

<hr />

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="13%" align="right"><?php echo $collection->getProofCollectionCountById($userID); ?></td>
    <td width="34%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getUniqueProofCollectionCountById($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Coin Investment</strong></td>
    <td align="right">$<?php echo $collection->getProofCoinSumByAccount($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td><strong>Total Mint Set Investment</strong></td>
      <td align="right">$<?php echo number_format($CollectionSet->getUniqueSetTypeCountById($setType='Proof',$userID),2); ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Total Collection Investment</strong></td>
      <td align="right">$<?php echo number_format($CollectionSet->getUniqueSetTypeCountById($setType='Proof',$userID) + $collection->getProofCoinSumByAccount($userID),2); ?></td>
      <td>(Coins &amp; Sets)</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>
<hr />
<h2>Proof Coins</h2>

<table width="100%" border="0">     
  <tr align="center" class="darker">
    <td width="14%">Certified</td>
    <td width="14%">Raw</td>
    <td width="14%">Errors</td>
    <td width="14%">Commemorative</td>
    <td width="14%"> Gold</td>
    <td width="14%">Platinum</td>
    <td width="14%">Rolls</td>
    </tr>
  <tr align="center">
    <td><a href="viewCertProofReport.php"><?php echo $collection->getProofProCollectionCountById($userID); ?></a></td>
    <td><a href="proofCoins.php"><?php echo $collection->getProofRawCollectionCountById($userID); ?></a></td>
    <td><a href="proofErrors.php"><?php echo $collection->getProofErrorCountById($userID); ?></a><a href="reportErrors.php"></a></td>
    <td><a href="proofCommemorativeCoins.php"><?php echo $collection->getProofCommemorativeCountById($userID); ?></a></td>
    <td><a href="proofBullionCoins.php?coinMetal=Gold"><?php echo $collection->getProofBullionCountById($userID, $coinMetal='Gold'); ?></a></td>
    <td><a href="proofBullionCoins.php?coinMetal=Platinum"><?php echo $collection->getProofBullionCountById($userID, $coinMetal='Platinum'); ?></a></td>
    <td><a href="proofRolls.php"><?php echo $collectionRolls->getProofRollCount($userID); ?></a></td>
    </tr>
      <tr align="center" class="darker">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" class="darker">
    <td width="14%">DCAM</td>
    <td width="14%">CAM</td>
    <td width="14%"><span id="ctl00_ctl00_ctl00_MainContent_MainContent_MainContent_uxViewArticle">Ultra Cameo</span></td>
    <td width="14%">Cameo</td>
    <td width="14%"> No Designation</td>
    <td width="14%">Less than PR60</td>
    <td width="14%">Damaged</td>
    </tr>
  <tr align="center">
    <td><a href="viewCertProofReport.php"><?php echo $collection->getDesignationGradeCount($userID, 'DCAM'); ?></a></td>
    <td><a href="viewCertProofReport.php"><?php echo $collection->getDesignationGradeCount($userID, 'CAM'); ?></a><a href="proofCoins.php"></a></td>
    <td><a href="viewCertProofReport.php"><?php echo $collection->getDesignationGradeCount($userID, 'Genuine'); ?></a><a href="proofErrors.php"></a><a href="reportErrors.php"></a></td>
    <td><a href="viewCertProofReport.php"><?php echo $collection->getDesignationGradeCount($userID, 'Genuine'); ?></a><a href="proofCommemorativeCoins.php"></a></td>
    <td><a href="proofBullionCoins.php?coinMetal=Gold"><?php echo $collection->getProofBullionCountById($userID, $coinMetal='Gold'); ?></a></td>
    <td><a href="proofBullionCoins.php?coinMetal=Platinum"><?php echo $collection->getProofBullionCountById($userID, $coinMetal='Platinum'); ?></a></td>
    <td><a href="proofRolls.php"><?php echo $collectionRolls->getProofRollCount($userID); ?></a></td>
    </tr>
</table>
<hr />
<table width="100%" border="0">
     <tr align="center" class="darker">
       <td width="11%" align="left">Metal</td>
       <td width="11%"><a href="viewProofSetService.php?proService=PCGS&coinMetal=Clad">PCGS</a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ICG&coinMetal=Clad">ICG</a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=NGC&coinMetal=Clad">NGC</a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ANACS&coinMetal=Clad">ANACS</a></td>
    </tr>
     <tr align="center">
       <td align="left"><a href="viewMetalProofReport.php?coinMetal=Copper">Copper/Bronze</a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=PCGS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Copper', $proService='PCGS', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=IGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Copper', $proService='ICG', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=NGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Copper', $proService='NGC', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=ANACS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Copper', $proService='ANACS', $userID) ?></a></td>
     </tr>
     <tr align="center">
       <td align="left"><a href="viewMetalProofReport.php?coinMetal=Clad">Clad</a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Clad&proService=PCGS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Clad', $proService='PCGS', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Clad&proService=IGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Clad', $proService='ICG', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Clad&proService=NGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Clad', $proService='NGC', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Clad&proService=ANACS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Clad', $proService='ANACS', $userID) ?></a></td>
     </tr>
     <tr align="center">
       <td align="left"><a href="viewMetalProofReport.php?coinMetal=Silver">Silver</a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=PCGS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Silver', $proService='PCGS', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=IGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Silver', $proService='ICG', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=NGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Silver', $proService='NGC', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Silver&proService=ANACS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Silver', $proService='ANACS', $userID) ?></a></td>
    </tr>
     <tr align="center">
       <td align="left"><a href="viewMetalProofReport.php?coinMetal=Gold">Gold</a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Gold&proService=PCGS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Gold', $proService='PCGS', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Gold&proService=IGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Gold', $proService='ICG', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Gold&proService=NGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Gold', $proService='NGC', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Gold&proService=ANACS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Gold', $proService='ANACS', $userID) ?></a></td>
     </tr>
     <tr align="center">
       <td align="left"><a href="viewMetalProofReport.php?coinMetal=Platinum">Platinum</a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Platinum&proService=PCGS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Platinum', $proService='PCGS', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Platinum&proService=IGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Platinum', $proService='ICG', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Platinum&proService=NGC"><?php echo $collection->getProofMetalProCountByID($coinMetal='Platinum', $proService='NGC', $userID) ?></a></td>
       <td><a href="viewCertMetalProofReport.php?coinMetal=Platinum&proService=ANACS"><?php echo $collection->getProofMetalProCountByID($coinMetal='Platinum', $proService='ANACS', $userID) ?></a></td>
    </tr>
     <tr align="center" class="darker">
       <td align="left">Total</td>
       <td><?php echo $collection->getProofMetalProTotalByID($proService='PCGS', $userID) ?></td>
       <td><?php echo $collection->getProofMetalProTotalByID($proService='ICG', $userID) ?></td>
       <td><?php echo $collection->getProofMetalProTotalByID($proService='NGC', $userID) ?></td>
       <td><?php echo $collection->getProofMetalProTotalByID($proService='ANACS', $userID) ?></td>
     </tr>
     <tr align="center">
       <td align="left">&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
  </table>
<hr />
<h2>Proof Sets</h2>
<table width="100%" border="0">     
     <tr align="center">
       <td width="11%" align="left"><strong>Proof &amp; Date Sets</strong></td>
       <td width="11%">Mint</td>
       <td width="11%"><a href="viewProofSetService.php?proService=PCGS&setType=<?php echo $setLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ICG&setType=<?php echo $setLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=NGC&setType=<?php echo $setLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewProofSetService.php?proService=ANACS&setType=<?php echo $setLink; ?>"><strong>ANACS</strong></a></td>
    </tr>
     <tr align="center">
       <td align="left"> <a href="viewSetMetal.php?coinMetal=Clad">Proof Sets</a></td>
       <td><a href="viewSets.php?setType=Proof"><?php echo $CollectionSet->getSetCountByTypeByUserID($setType, $userID); ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=Clad"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal='Clad'); ?></a></td>
       <td><a href="viewSetService.php?proService=IGC&setType=Proof&coinMetal=Clad"><?php echo $CollectionSet->getSetProofProGrader('ICG',$userID, $coinMetal='Clad'); ?></a></td>
       <td><a href="viewSetService.php?proService=NGC&setType=Proof&coinMetal=Clad"><?php echo $CollectionSet->getSetProofProGrader('NGC' ,$userID, $coinMetal='Clad'); ?></a></td>
       <td><a href="viewSetService.php?proService=ANACS&setType=Proof&coinMetal=Clad"><?php echo $CollectionSet->getSetProofProGrader('ANACS',$userID, $coinMetal='Clad'); ?></a></td>
    </tr>
     <tr align="center">
       <td align="left"><a href="viewSetMetal.php?coinMetal=Silver">Silver Proof</a></td>
       <td><a href="viewSets.php?setType=Silver_Proof"><?php echo $CollectionSet->getSetCountByTypeByUserID($setType, $userID); ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=Silver"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal='Silver'); ?></a></td>
       <td><a href="viewSetService.php?proService=IGC&setType=Proof&coinMetal=Silver"><?php echo $CollectionSet->getSetProofProGrader('ICG',$userID, $coinMetal='Silver'); ?></a></td>
       <td><a href="viewSetService.php?proService=NGC&setType=Proof&coinMetal=Silver"><?php echo $CollectionSet->getSetProofProGrader('NGC' ,$userID, $coinMetal='Silver'); ?></a></td>
       <td><a href="viewSetService.php?proService=ANACS&setType=Proof&coinMetal=Silver"><?php echo $CollectionSet->getSetProofProGrader('ANACS',$userID, $coinMetal='Silver'); ?></a></td>
     </tr>
     <tr align="center">
       <td align="left"><a href="viewSetMetal.php?coinMetal=Gold">Gold Proof</a></td>
       <td><a href="viewSets.php?setType=Proof"><?php echo $CollectionSet->getSetCountByTypeByUserID($setType, $userID); ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=Gold"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal='Gold'); ?></a></td>
       <td><a href="viewSetService.php?proService=IGC&setType=Proof&coinMetal=Gold"><?php echo $CollectionSet->getSetProofProGrader('ICG',$userID, $coinMetal='Gold'); ?></a></td>
       <td><a href="viewSetService.php?proService=NGC&setType=Proof&coinMetal=Gold"><?php echo $CollectionSet->getSetProofProGrader('NGC' ,$userID, $coinMetal='Gold'); ?></a></td>
       <td><a href="viewSetService.php?proService=ANACS&setType=Proof&coinMetal=Gold"><?php echo $CollectionSet->getSetProofProGrader('ANACS',$userID, $coinMetal='Gold'); ?></a></td>
     </tr>
     <tr align="center">
       <td align="left"><a href="viewSetMetal.php?coinMetal=Platinum">Platinum Proof</a></td>
       <td><a href="viewSets.php?setType=Platinum"><?php echo $CollectionSet->getSetCountByTypeByUserID($setType, $userID); ?></a></td>
       <td><a href="viewSetService.php?proService=PCGS&setType=Proof&coinMetal=Platinum"><?php echo $CollectionSet->getSetProofProGrader('PCGS',$userID, $coinMetal='Platinum'); ?></a></td>
       <td><a href="viewSetService.php?proService=IGC&setType=Proof&coinMetal=Platinum"><?php echo $CollectionSet->getSetProofProGrader('ICG',$userID, $coinMetal='Platinum'); ?></a></td>
       <td><a href="viewSetService.php?proService=NGC&setType=Proof&coinMetal=Platinum"><?php echo $CollectionSet->getSetProofProGrader('NGC' ,$userID, $coinMetal='Platinum'); ?></a></td>
       <td><a href="viewSetService.php?proService=ANACS&setType=Proof&coinMetal=Platinum"><?php echo $CollectionSet->getSetProofProGrader('ANACS',$userID, $coinMetal='Platinum'); ?></a></td>
     </tr>
     <tr align="center">
       <td align="left"> <a href="viewSets.php?setType=Year_Set">Year Sets</a></td>
       <td>&nbsp;</td>
       <td><a href="viewSetService.php?proService=PCGS&amp;setType=Year_Set"><?php echo $CollectionSet->getSetYearSetProofProGrader('PCGS',$userID); ?></a></td>
       <td><?php echo $CollectionSet->getSetYearSetProofProGrader('ICG',$userID); ?></td>
       <td><?php echo $CollectionSet->getSetYearSetProofProGrader('NGC' ,$userID); ?></td>
       <td><?php echo $CollectionSet->getSetYearSetProofProGrader('ANACS',$userID); ?></td>
     </tr>
     <tr align="center">
       <td align="left"><strong>Total</strong></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
    </tr>
  </table>
  <br />
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Type</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectset WHERE userID = '$userID' AND strike = 'Proof' ORDER BY coinID ASC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
         $collectsetID = intval($row['collectsetID']);
		  $CollectionSet->getCollectionSetById($collectsetID);
  echo '
    <tr>
    <td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'" class="brownLink">'.$CollectionSet->getSetNickname().'</a></td>
	<td><a href="viewCoinYear.php?year='.$CollectionSet->getCoinYear().'">'.$CollectionSet->getCoinYear().'</a></td>	
	<td align="center">'.$CollectionSet->getSetType().'</td>
	<td class="purchaseTotals" align="right">$'.$CollectionSet->getCoinPrice().'</td>	     
  </tr>
  ';
	  }
?>
</tbody>
    
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Type</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>