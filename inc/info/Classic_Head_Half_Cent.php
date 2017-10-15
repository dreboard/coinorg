<table width="636" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Classic Head Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="50%">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Classic_Head_Half_Cent', $userID); ?>" alt="" width="100" height="100" /><br />
  Classic Head</td>
  <td width="50%"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Classic_Head_Half_Cent_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Classic Head Proof</td>
  
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