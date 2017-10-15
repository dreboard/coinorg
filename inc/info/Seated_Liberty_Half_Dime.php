<table border="0" id="folderTbl" class="typeTbl" width="100%">
  <tr class="dateHolder" valign="top">
    <td colspan="7" align="center"><h3>Seated Liberty Dime Variety &amp; Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated_Liberty_Half_Dime_No_Stars', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>No Stars</span> 
</td>
  
<td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Liberty Half Dime Drapery', $userID); ?>" alt="" width="100" height="100" /><br />
  Drapery Added</td>
  
<td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Liberty Half Dime No Arrows', $userID); ?>" alt="" width="100" height="100" /><br />
 No Arrows</td>

  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Liberty Half Dime Stars', $userID); ?>" alt="" width="100" height="100" /><br />
  Arrows at Date</td>

<td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Half Dime Legend', $userID); ?>" alt="" width="100" height="100" /><br />
  Obverse Legend</td>
  <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Liberty Half Dime Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Proof</td>
  
  </tr>
  <tr class="dateHolder" valign="top">
    <td colspan="3" align="center">&nbsp;</td>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td colspan="3" align="center"><span class="coinDetailLinks"><a href="reportSeatedLiberty.php">Seated Liberty Report</a></span></td>
    <td colspan="3" align="center"><span class="coinDetailLinks"><a href="reportSeatedLibertyCoins.php">All Seated Liberty Coins</a></span></td>
  </tr>
 </table>
<br />
<table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%">Folders</td>
    <td width="20%"> Rolls</td>
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>
 
 