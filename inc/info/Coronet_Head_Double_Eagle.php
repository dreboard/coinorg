<table width="568" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="3"><h3>Coronet Head Double Eagle  Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Double_Eagle_No_Motto ', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Type I  (1849-1866)<br />
  No Motto </span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Double_Eagle_Motto', $userID); ?>" alt="" width="100" height="100" /><br /> 
    Type II (1866-1876)<br />
    Twenty D </td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Double_Eagle_Dollars', $userID); ?>" alt="" width="100" height="100" /><br />
Type III (1877-1907)<br />
Twenty Dollars </td>  
  
  </tr>
 </table>  <hr />
<table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%">Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>