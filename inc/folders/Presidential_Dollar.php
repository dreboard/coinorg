<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Kennedy Half Dollar  Type &amp; Variety Collection  of 3 (%)</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidential George Washington ', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>George Washington </span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidential George Washington Proof', $userID); ?>" alt="" width="100" height="100" /><br />
George Washington<br />
Proof</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidential John Adams', $userID); ?>" alt="" width="100" height="100" /><br />
  John Adams </td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidential John Adams Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  John Adams<br />
Proof</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidential Thomas Jefferson', $userID); ?>" alt="" width="100" height="100" /><br />
  Thomas Jefferson</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Presidential Thomas Jefferson Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Thomas Jefferson<br />
Proof </td>
  
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedicentennial', $userID); ?>" alt="" width="100" height="100" /><br />
  Kennedcentennial</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedroof', $userID); ?>" alt="" width="100" height="100" /><br />
  Kenneroof </td>
  
<td>&nbsp;</td>
  
<td>&nbsp;</td>
  
  </tr>
 </table>
 <br />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%">Folders</td>
    <td width="20%"> Rolls</td>
    <td width="20%"> Bags</td>
    <td width="20%"> Boxes</td>
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>