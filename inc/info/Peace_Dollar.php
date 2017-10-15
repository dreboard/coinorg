<table width="468" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3> Peace Dollar   Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="201">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Draped Bust Half Dollar Small Eagle', $userID); ?>" alt="" width="100" height="100" /><br /> 
  Peace Dollar
</td>
  
  
  
<td width="211"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Draped Bust Half Dollar Heraldic Eagle', $userID); ?>" alt="" width="100" height="100" /><br /> 
Proof
</td>
  
  </tr>
 </table>
 <br />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%">Folders</td>
    <td width="20%"> Rolls</td>
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>