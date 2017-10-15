<table width="100%" border="0" align="center" class="coinSwitchTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="8"><h3>Seated Liberty Half Dollar Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Liberty Half Dollar No Motto', $userID); ?>" alt="" width="100" height="100" /><br />
  No Motto 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Half Arrows And Rays', $userID); ?>" alt="" width="100" height="100" /><br />
Arrows &amp; Rays</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Half No Rays', $userID); ?>" alt="" width="100" height="100" /><br />
  Reverse Rays<br>
Removed</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Half First Arrows Removed', $userID); ?>" alt="" width="100" height="100" /><br />
  First
Arrows <br />
Removed</td>

  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Half with Motto', $userID); ?>" alt="" width="100" height="100" /><br />
  Motto Above <br />
  Eagle </td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Half Second Arrows', $userID); ?>" alt="" width="100" height="100" /><br />
2nd Arrows <br />
at Date<br>
</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Half Second No Arrows', $userID); ?>" alt="" width="100" height="100" /><br />
2nd Arrows<br>
Removed</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Seated Liberty Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Proof</td>  
  
  </tr>
  <tr align="center" valign="top" class="dateHolder">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" valign="top" class="dateHolder">
    <td>&nbsp;</td>
    <td colspan="3"><span class="coinDetailLinks"><a href="reportSeatedLiberty.php">Seated Liberty Report</a></span></td>
    <td colspan="3"><span class="coinDetailLinks"><a href="reportSeatedLibertyCoins.php">All Seated Liberty Coins</a></span></td>
    <td>&nbsp;</td>
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