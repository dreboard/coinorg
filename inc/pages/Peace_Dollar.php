<table width="541" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3> Peace Dollar   Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="50%"><a href="viewCoinVersion.php?coinVersion=Peace_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Peace_Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
    <a href="viewCoinVersion.php?coinVersion=Peace_Dollar">Peace Dollar</a></td>
  
  
  
<td width="50%"><a href="viewCoinVersion.php?coinVersion=Peace_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Peace_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
  <a href="viewCoinVersion.php?coinVersion=Peace_Dollar_Proof">Proof</a></td>
  
  </tr>
 </table>
<hr />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="25%">Folders</td>
    <td width="25%"> Rolls</td>
    <td width="25%"> Certified</td>
    <td width="25%">Assigned Vam</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
    <td><a href="vamReport.php?coinType=Peace_Dollar"><?php echo $collection->getVAMCount($userID, $coinType); ?></a></td>
  </tr>
</table>