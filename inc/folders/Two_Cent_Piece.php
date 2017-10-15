<table border="0" id="folderTbl" class="typeTbl" width="500">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h3>Seated Liberty Dime Variety &amp; Type Collection  of 3 (%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Two Cent', $userID); ?>" alt="" width="100" height="100" /><br />
Two Cent</td>  

<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Two Cent Small Motto', $userID); ?>" alt="" width="100" height="100" /><br />
  Small Motto</td>

<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Two Cent Proof', $userID); ?>" alt="" width="100" height="100" /><br />
   Proof</td>
  
  </tr>
 </table>
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
 
 