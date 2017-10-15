<table width="468" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3> Draped Bust Half Dollar   Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="201">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Draped Bust Half Dollar Small Eagle', $userID); ?>" alt="" width="100" height="100" /><br />
Small Eagle</td>
  
  
  
<td width="211"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Draped Bust Half Dollar Heraldic Eagle', $userID); ?>" alt="" width="100" height="100" /><br />
Heraldic Eagle</td>
  
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