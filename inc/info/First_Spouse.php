<table width="396" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>First Spouse Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $Bullion->getSpouseImg($userID); ?>" alt="" width="100" height="100" /><br />
  <span>First Spouse</span> 
</td>
  
  
<td><img class="coinSwitch" src="../img/<?php echo $Bullion->getProofSpouseImg($userID); ?>" alt="" width="100" height="100" /><br />
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