<br />
<table width="444" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Tenth Ounce Gold Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Tenth Ounce Gold</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Gold Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Tenth Ounce Gold Proof</td>
  
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