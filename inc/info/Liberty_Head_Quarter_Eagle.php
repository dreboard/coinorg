<table width="543" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td><h3>Liberty Head Quarter Eagle  Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Head_Quarter_Eagle', $userID); ?>" alt="" width="100" height="100" /><br /> 
    Proof</td>
  </tr>
 </table>  <br />
<table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%">Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>