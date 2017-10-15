<table border="0" id="folderTbl" class="typeTbl" width="500">>
  <tr class="dateHolder" valign="top">
    <td colspan="6" align="center"><h3>Union Shield Variety &amp; Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Union Shield', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Union Shield</span> 
</td>

  
<td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Union Shield Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Union Shield Proof </td>
  
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