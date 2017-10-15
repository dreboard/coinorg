<table width="554" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="4"><h3>Flying Eagle Type &amp; Variety Collection</h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="203">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle', $userID); ?>" alt="" width="100" height="100" /><br />
  Flying Eagle</td>
  <td width="228"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle Large Letter', $userID); ?>" alt="" width="100" height="100" /><br />
    Large Letters</td>    
  <td width="203">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle Small Letter', $userID); ?>" alt="" width="100" height="100" /><br />
  Small Letters</td>
  <td width="228"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flying Eagle Proof', $userID); ?>" alt="" width="100" height="100" /><br /> 
  Proof
</td>
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