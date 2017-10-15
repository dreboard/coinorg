<table width="587" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3><?php echo $coinType ?> Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="50%"><a href="viewCoinVersion.php?coinVersion=Return_to_Monticello"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Return_to_Monticello', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Return_to_Monticello">Return to Monticello </a></td>
  
<td><a href="viewCoinVersion.php?coinVersion=Return_to_Monticello_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Return_to_Monticello_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Return_to_Monticello_Proof">Proof</a></td>
  
  </tr>
 </table>
 <hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="20%">Folders</td>
    <td width="20%"> Rolls</td>
    <td width="20%"> Bags</td>
    <td width="20%"> Boxes</td>
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><a href="coinTypeFolders.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><a href="viewBagReport.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeBoxes.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></a></td>
    <td><a href="viewCertTypeReport.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></a></td>
  </tr>
</table>