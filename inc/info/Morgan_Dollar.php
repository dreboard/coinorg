<table border="0" id="folderTbl" class="typeTbl" width="500">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h3>Seated Liberty Dime Variety &amp; Type Collection  of 3 (%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Morgan Dollar', $userID); ?>" alt="" width="100" height="100" /><br />
Morgan Dollar</td>  

<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Morgan Dollar 8 Tail Feathers', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>8 Tail Feathers</span> 
</td>

  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Morgan Dollar Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Morgan Dollar Proof</td>
  
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
 
 