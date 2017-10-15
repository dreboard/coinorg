<table width="636" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="4"><h3>Shield_Nickel  Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_With_Rays ', $userID); ?>" alt="" width="100" height="100" /><br />
With Rays </td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_With_Rays_Proof ', $userID); ?>" alt="" width="100" height="100" /><br />
With Rays<br />
Proof</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_No_Rays', $userID); ?>" alt="" width="100" height="100" /><br />
Without Rays </td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_No_Rays_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Without Rays <br />
Proof  </td>

  </tr>
 </table>
  <br />
<table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>