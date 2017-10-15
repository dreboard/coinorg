  <table width="638" border="0" align="center" class="coinSwitchTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Seated Liberty Dollar Type &amp; Variety Collection</h3></td>
    </tr>

  <tr align="center" valign="top" class="dateHolder"> 
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Dollar No Motto', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>No Motto </span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Dollar Proof No Motto', $userID); ?>" alt="" width="100" height="100" /><br />
<span>No Motto Proof</span></td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Dollar Motto On Reverse', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Motto</span></td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Dollar Proof Motto', $userID); ?>" alt="" width="100" height="100" /><br />
<span>Motto Proof</span></td>
  
  </tr>  <tr align="center" valign="top" class="dateHolder">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><span class="coinDetailLinks"><a href="reportSeatedLiberty.php">Seated Liberty Report</a></span></td>
    <td colspan="2"><span class="coinDetailLinks"><a href="reportSeatedLibertyCoins.php">All Seated Liberty Coins</a></span></td>
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