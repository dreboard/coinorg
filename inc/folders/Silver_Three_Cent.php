<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Silver Three Cent Type &amp; Variety Collection  of 3 (%)</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('No Outlines', $userID); ?>" alt="" width="100" height="100" /><br />
  No Outlines</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Three Outlines', $userID); ?>" alt="" width="100" height="100" /><br />
Three Outlines</td>
    <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Three Outlines Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Three Outlines Proof</td>
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Two Outlines', $userID); ?>" alt="" width="100" height="100" /><br />
  Two Outlines</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Two Outlines Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Two Outlines Proof</td>
  
  </tr>
 </table>
 <br />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%">Folders</td>
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
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>