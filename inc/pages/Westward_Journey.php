<table border="0" id="folderTbl" class="typeTbl" width="100%">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h3>Westward Journey Variety &amp; Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td width="25%" align="center">
<a href="viewCoinDesign.php?design=Peace_Medal"> <img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('Peace_Medal', $userID); ?>" alt="" width="100" height="100" /></a><br />
<a href="viewCoinDesign.php?design=Peace_Medal">Peace Medal</a> 
</td>

  
<td width="25%" align="center"><a href="viewCoinDesign.php?design=Keelboat"><img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('Keelboat', $userID); ?>" alt="" width="100" height="100" /></a><br />
<a href="viewCoinDesign.php?design=Keelboat">Keelboat</a></td>
  

  <td width="25%" align="center">
  <a href="viewCoinDesign.php?design=American_Bison"><img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('American_Bison', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinDesign.php?design=American_Bison">American <br />
  Bison</a> 
</td>

  
<td width="25%" align="center"><a href="viewCoinDesign.php?design=Ocean_in_View"><img class="coinSwitch" src="../img/<?php echo $collection->getDesignImg('Ocean_in_View', $userID); ?>" alt="" width="100" height="100" /></a><br />
<a href="viewCoinDesign.php?design=Ocean_in_View">Ocean in View</a></td>
  
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
 
 