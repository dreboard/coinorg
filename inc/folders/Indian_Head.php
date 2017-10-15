<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="5"><h3>Indian Head Type &amp; Variety Collection</h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian Head No Shield', $userID); ?>" alt="" width="100" height="100" /><br />
  Indian Head No Shield</td>
  
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian Head', $userID); ?>" alt="" width="100" height="100" /><br />
  Indian Head</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Indian Head Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Indian Head Proof</td>
  

  
<td><br /></td>
  
  </tr>
 </table>
 <br />
<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="5"><h3>Styles of "N" Collection</h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getIndianHeadFlatImg($userID); ?>" alt="" width="100" height="100" /><br />
  Indian Head<br />
  Flat N<br />
  1860-61</td>
  
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getIndianHeadShallowImg($userID); ?>" alt="" width="100" height="100" /><br />
  Indian Head<br />
  Shallow N<br />
1862-69 & 1877 </td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getIndianHeadBoldImg($userID); ?>" alt="" width="100" height="100" /><br />
Indian Head<br />
Bold N<br />
1870-76,1878-1909</td>
  

  
<td><br /></td>
  
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