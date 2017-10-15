<table width="784" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Susan B Anthony Type &amp; Variety Collection  of 3 (%)</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan B Anthony Dollar ', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Susan B Anthony Dollar</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan B Anthony Dollar Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Susan B Anthony Dollar Proof</td>

  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan B Anthony Dollar Proof Type I', $userID); ?>" alt="" width="100" height="100" /><br />
  Susan B Anthony Dollar Proof <br />
  Type I</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan B Anthony Dollar Proof Type II', $userID); ?>" alt="" width="100" height="100" /><br />
  Susan B Anthony Dollar<br />
  Type II</td>
  
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