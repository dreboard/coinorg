<table border="0" id="folderTbl" class="typeTbl" width="100%">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h3>Westward Journey Variety &amp; Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Peace Medal', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Peace Medal</span> 
</td>
  <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Peace Medal Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Peace Medal <br />
Proof</td>
  
<td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Keelboat', $userID); ?>" alt="" width="100" height="100" /><br />
  Keelboat</td>
  
<td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Keelboat Proof', $userID); ?>" alt="" width="100" height="100" /><br />
 Keelboat <br />
 Proof</td>

  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('American Bison', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>American <br />
  Bison</span> 
</td>
  <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('American Bison Proof', $userID); ?>" alt="" width="100" height="100" /><br />
American<br />
Bison Proof</td>
  
<td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Ocean in View', $userID); ?>" alt="" width="100" height="100" /><br />
  Ocean in View</td>
  
<td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Ocean in View Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Ocean in View Proof</td>
  </tr>
 </table>
<hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
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
 
 