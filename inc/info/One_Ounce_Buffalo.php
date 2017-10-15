<br />
<table width="444" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>One Ounce Buffalo Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Buffalo', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>One Ounce Buffalo</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Buffalo Proof', $userID); ?>" alt="" width="100" height="100" /><br />
One Ounce Buffalo Proof</td>
  
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