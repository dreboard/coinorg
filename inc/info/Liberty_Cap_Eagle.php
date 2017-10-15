<table width="481" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Liberty Cap Eagle  Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle_Old_Style', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Small Eagle  <br />
  (1795-1797)</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle_Old_Style_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Heraldic Eagle<br />
(1797-1804)</td>
  
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