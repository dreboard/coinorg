<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3> Coronet Head Eagle  Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle_Old_Style', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Type 1 <br />
  (1838-1839)</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle_Old_Style_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Type I Proof</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle', $userID); ?>" alt="" width="100" height="100" /><br />
Type II <br />
(1839-1866)</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Type II Proof</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle_Motto', $userID); ?>" alt="" width="100" height="100" /><br />
  Type III <br />
  (1866-1907)</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Eagle_Motto_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
 Type III Proof </td>
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