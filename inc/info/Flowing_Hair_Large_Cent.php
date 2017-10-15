<table width="636" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Flowing Hair   Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flowing Hair Large Cent Chain ', $userID); ?>" alt="" width="100" height="100" /><br /> 
  Chain Reverse
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flowing Hair Large Cent Wreath ', $userID); ?>" alt="" width="100" height="100" /><br />
    Wreath Reverse</td>

  </tr>
 </table>
<hr />

<table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>