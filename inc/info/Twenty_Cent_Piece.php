<table width="636" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Classic Head Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="50%">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twenty_Cent_Piece', $userID); ?>" alt="" width="100" height="100" /><br />
  Twenty Cent</td>
  <td width="50%"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Twenty_Cent_Piece_Proof ', $userID); ?>" alt="" width="100" height="100" /><br />
Twenty Cent Proof</td>
  
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