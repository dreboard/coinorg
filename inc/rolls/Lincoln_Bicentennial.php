<table border="0" id="folderTbl" class="typeTbl" width="500">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h3>Lincoln Wheat Variety &amp; Type Collection  of 3 (%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kentucky Childhood', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Kentucky Childhood</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kentucky Childhood Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Kentucky Childhood Proof</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiana Years', $userID); ?>" alt="" width="100" height="100" /><br />
  Indiana Years</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indiana Years Proof', $userID); ?>" alt="" width="100" height="100" /><br />
 Indiana Years Proof</td>

  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Life in Illinois', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Life in<br />
Illinois</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Life in Illinois Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Life in<br />
Illinois Proof</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidency', $userID); ?>" alt="" width="100" height="100" /><br />
  Presidency</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidency Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Presidency Proof</td>
  </tr>
 </table>
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
 
 