<table width="100%" border="0"   class="coinSwitchTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h3>Seated Liberty Quarter Variety &amp; Type </h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter No Drapery Obverse', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>No Drapery</span> 
</td>
  <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter Drapery Added', $userID); ?>" alt="" width="100" height="100" /><br />
Drapery Added</td>
  
<td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter Arrows and Rays', $userID); ?>" alt="" width="100" height="100" /><br />
 Arrows and Rays</td>
  
<td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter Arrows No Rays', $userID); ?>" alt="" width="100" height="100" /><br />
 Arrows No Rays</td>

  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter First No Arrows', $userID); ?>" alt="" width="100" height="100" /><br />First No Arrows</td>
  
  <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter With Motto', $userID); ?>" alt="" width="100" height="100" /><br />
No Motto</td>
  
  
<td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter Second Arrows At Date', $userID); ?>" alt="" width="100" height="100" /><br />
  Obverse Legend Proof</td>
  
  <td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Quarter Second No Arrows', $userID); ?>" alt="" width="100" height="100" /><br />
 Second No Arrows</td>
  
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center">&nbsp;</td>
    <td colspan="3" align="center"><span class="coinDetailLinks"><a href="reportSeatedLiberty.php">Seated Liberty Report</a></span></td>
    <td colspan="3" align="center"><span class="coinDetailLinks"><a href="reportSeatedLibertyCoins.php">All Seated Liberty Coins</a></span></td>
    <td align="center">&nbsp;</td>
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
 
 