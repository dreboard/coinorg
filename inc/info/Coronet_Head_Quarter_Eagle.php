<hr />

<table width="515" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Coronet Head Quarter Eagle Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Quarter_Eagle', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Coronet Head</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Coronet_Head_Quarter_Eagle Proof', $userID); ?>" alt="" width="100" height="100" /><br />
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