<table width="396" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="7"><h3>Indian Head Eagle Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian Head Eagle No Motto', $userID); ?>" alt="" width="100" height="100" /><br />
  No Motto
</td>
  
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian Head Eagle', $userID); ?>" alt="" width="100" height="100" /><br />
With Motto</td>
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian Head Eagle Proof Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Proof</td>
  
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