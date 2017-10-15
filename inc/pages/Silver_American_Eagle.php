<table width="638" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Silver American Eagle Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCoinVersion.php?coinVersion=Silver_American_Eagle"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silver_American_Eagle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinVersion.php?coinVersion=Silver_American_Eagle">Business Strike</a></span> 
</td>
  <td><a href="viewCoinVersion.php?coinVersion=Silver_American_Eagle_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silver_American_Eagle_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Silver_American_Eagle_Proof">Proof</a></td>
  
 
<td><a href="viewCoinVersion.php?coinVersion=Silver_American_Eagle_Reverse_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Silver_American_Eagle_Reverse_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Silver_American_Eagle_Reverse_Proof">Reverse Proof</a></td>
  
  </tr>
 </table>
 <hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="33%">Folders</td>
    <td width="33%"> Rolls</td>
    <td width="33%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>