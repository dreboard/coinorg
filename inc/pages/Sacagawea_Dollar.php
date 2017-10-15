 <table width="100%" border="0">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="5"><h3>Sacagawea Dollar Type &amp; Variety Collection</h3></td>
   </tr>
  <tr align="center" valign="top" class="dateHolder">
    <td width="20%"><a href="viewCoinType.php?coinType=Sacagawea_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getReportImage('Sacagawea Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar">Sacagawea</a></span></td>
    <td width="20%"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Proof">Sacagawea Proof</a></td>
    <td width="20%"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Spread_of_Three_Sisters"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Spread of Three Sisters', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Spread_of_Three_Sisters">Three Sisters</a></td>
    <td width="20%"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Spread_of_Three_Sisters_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Spread of Three Sisters Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <span><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Spread_of_Three_Sisters_Proof">Three Sisters Proof</a></span></td>
    <td width="20%"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Great_Tree"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Great Tree', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Great_Tree">Great Tree</a></td>
  </tr>
  <tr align="center" valign="top">
    <td class="dateHolder"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Great_Tree_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Great Tree Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Great_Tree_Proof">Great Tree Proof</a></td>
    <td class="dateHolder"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Wampanoag_Treaty"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Wampanoag Treaty', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Wampanoag_Treaty">Wampanoag Treaty</a></td>
    <td class="dateHolder"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Wampanoag_Treaty_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Wampanoag Treaty Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Wampanoag_Treaty_Proof">Wampanoag Treaty Proof</a></td>
    <td class="dateHolder"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Trade_Routes"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Trade Routes', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Trade_Routes">Trade Routes</a></td>
    <td class="dateHolder"><a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Trade_Routes_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sacagawea Dollar Trade Routes Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Sacagawea_Dollar_Trade_Routes_Proof">Trade Routes Proof</a></td>
  </tr>
  <tr>
    <td class="dateHolder">&nbsp;</td>
    <td class="dateHolder">&nbsp;</td>
    <td class="dateHolder">&nbsp;</td>
    <td class="dateHolder">&nbsp;</td>
    <td class="dateHolder">&nbsp;</td>
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
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>