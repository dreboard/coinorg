<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Washington Quarter Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="166"><a href="viewCoinType.php?coinType=Washington_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Washington Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinType.php?coinType=Washington_Quarter">Washington Quarter</a></span> 
</td>
  <td width="166"><a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Proof">Washington Quarter Proof</a></td>
  
  <td width="166"><a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Special_Mint"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Special Mint', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Special_Mint">Special Mint </a></td>
  
<td width="166"><a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Proof_Type_I"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Proof Type I', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Proof_Type_I">Proof Type I</a></td>
  
<td width="166"><a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Proof_Type_II"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Proof Type II', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Proof_Type_II">Proof Type II</a></td>
  
<td width="166"><a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Silver"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Silver', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Silver">Washington Quarter Silver </a></td>
  
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  
  <td><a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Bicentennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Bicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Bicentennial">Bicentennial</a></td>
  
<td><a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Bicentennial_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Bicentennial Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Washington_Quarter_Bicentennial_Proof">Bicentennial Proof </a></td>
  
<td>&nbsp;</td>
  
<td>&nbsp;</td>
  
  </tr>
    <tr align="center" valign="top" class="dateHolder">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><a href="viewCoinSeries.php?series=Bicentennial">All Bicentennial Designs</a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
 </table>
 <hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="20%"><img src="../../img/folderIcon.jpg" width="14" height="20" align="absmiddle" /> Folders</td>
    <td width="20%"> Rolls</td>
    <td width="20%"> Bags</td>
    <td width="20%"> Boxes</td>
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>