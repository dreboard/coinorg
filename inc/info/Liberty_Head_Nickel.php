<table width="636" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="4"><h3>Liberty Head  Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Head_Nickel_No_Cents ', $userID); ?>" alt="" width="100" height="100" /><br />
No Cents </td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Head_Nickel_No_Cents_Proof ', $userID); ?>" alt="" width="100" height="100" /><br />
    No Cents<br />
    Proof</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Head_Nickel_With_Cents', $userID); ?>" alt="" width="100" height="100" /><br />
    With Cents     </td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Head_Nickel_With_Cents_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
With Cents<br />
Proof </td>

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