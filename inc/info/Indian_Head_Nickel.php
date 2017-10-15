<table width="636" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="4"><h3>Indian  Head  Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian_Head_Nickel_Mound ', $userID); ?>" alt="" width="100" height="100" /><br />
Type I<br />
Mound</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian_Head_Nickel_Mound_Proof ', $userID); ?>" alt="" width="100" height="100" /><br />
    Type I<br />
Mound
    Proof</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian_Head_Nickel_Line', $userID); ?>" alt="" width="100" height="100" /><br />
    Type II<br />
Line </td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian_Head_Nickel_Line_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Type II<br />
Line Proof </td>

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