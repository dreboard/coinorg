<table width="478" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Liberty Cap Half Dollar Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="127">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Dollar 50 C Reverse', $userID); ?>" alt="" width="100" height="100" /><br />
  50 C Reverse</td>
  
    <td width="137">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Dollar 50 Reverse', $userID); ?>" alt="" width="100" height="100" /><br />
  50 Cents Reverse</td>
  
<td width="169"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Dollar Half Reverse', $userID); ?>" alt="" width="100" height="100" /><br />
  Half Dol Reverse</td>
  
  </tr>
 </table>
 <hr />

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