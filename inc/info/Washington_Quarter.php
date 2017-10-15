<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Washington Quarter Type &amp; Variety Collection  of 8 (%)</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Washington Quarter</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Washington Quarter Proof</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Special Mint', $userID); ?>" alt="" width="100" height="100" /><br />
  Washington Quarter Special Mint </td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Proof Type I', $userID); ?>" alt="" width="100" height="100" /><br />
  Washington Quarter Proof <br />
  Type I</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Proof Type II', $userID); ?>" alt="" width="100" height="100" /><br />
  Washington Quarter Proof <br />
  Type II</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Silver', $userID); ?>" alt="" width="100" height="100" /><br />
  Washington Quarter Silver </td>
  
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Bicentennial', $userID); ?>" alt="" width="100" height="100" /><br />
  Washington Quarter Bicentennial</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Washington Quarter Bicentennial Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Washington Quarter Bicentennial Proof </td>
  
<td>&nbsp;</td>
  
<td>&nbsp;</td>
  
  </tr>
 </table>
 <hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="20%"><img src="../../img/folderIcon.jpg" width="14" height="20" align="absmiddle" /> Folders</td>
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