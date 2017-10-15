<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>America the Beautiful Quarter Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Hot_Springs_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Hot Springs National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Hot Springs<br />
National Park</span> 
</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Yellowstone_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Yellowstone National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Yellowstone<br />
National Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Yosemite_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Yosemite National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Yosemite<br />
National Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Grand_Canyon_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Grand Canyon National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Grand Canyon<br />
National Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Mount_Hood_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Mount Hood National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Mount Hood<br />
National Park </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=Gettysburg_National_Military_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Gettysburg National Military Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Gettysburg National<br />
Military Park</span> 
</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Glacier_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Glacier National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Glacier National Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Olympic_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Olympic National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Olympic National Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Vicksburg_National_Military_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Vicksburg National Military Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Vicksburg National<br />
Military Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Chickasaw_National_Recreation_Area"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Chickasaw National Recreation Area', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Chickasaw National<br />
Recreation Area </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=El_Yunque_National_Forest"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('El Yunque National Forest', $userID); ?>" alt="" width="100" height="100" /></a><br />
  El Yunque National<br />
Forest</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Chaco_Culture_National_Historical_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Chaco Culture National Historical Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Chaco Culture<br />
National Historical Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Acadia_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Acadia National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Acadia National Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Hawaii_Volcanoes_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Hawaii Volcanoes National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Hawaii Volcanoes<br />
National Park</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Denali_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Denali National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Denali <br />
  National Park </td>
  </tr>
 </table>
 <br />

 <br />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="14%">First Day </td>
    <td width="15%">Folders</td>
    <td width="18%"> Rolls</td>
    <td width="17%"> Mint Bags</td>
    <td width="19%"> Boxes</td>
    <td width="17%"> Certified</td>
  </tr>
  <tr align="center">
    <td><a href="viewFirstDayType.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><a href="viewBagReport.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>"><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>