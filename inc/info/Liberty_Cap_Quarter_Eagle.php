<table width="543" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Liberty Cap Quarter Eagle  Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Cap_Quarter_Eagle_No_Stars ', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>No Stars </span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Cap_Quarter_Eagle', $userID); ?>" alt="" width="100" height="100" /><br /> 
    Stars
</td>  
  
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