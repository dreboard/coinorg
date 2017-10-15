<div class="well well-sm hidden-xs">
 <table class="table wellTbl">
  <tr class="setSixRow">
    <td>First Day </td>
    <td>Folders</td>
    <td> Rolls</td>
    <td> Mint Bags</td>
    <td> Boxes</td>
    <td> Certified</td>
  </tr>
  <tr class="setSixRow">
    <td><a href="viewFirstDayType.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><a href="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></a></td>
    <td><a href="coinTypeBoxes.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></a></td>
    <td><a href="viewCertTypeReport.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></a></td>
   </tr>
</table></div>

<!-- Single button -->
<div class="btn-group visible-xs">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Other Views</option>
          <option value="viewFirstDayType.php?coinType=<?php echo $_GET['coinType']; ?>">First Day Covers <?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></option>
    <option value="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>">Folders <?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></option>
   <option value="coinTypeRolls.php?coinType=<?php echo $_GET['coinType']; ?>">Rolls <?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></option>
    <option value="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>">Mint Bags <?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></option>
    <option value="coinTypeBoxes.php?coinType=<?php echo $_GET['coinType']; ?>">Boxes <?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></option>
    <option value="viewCertTypeReport.php?coinType=<?php echo $_GET['coinType']; ?>">Certified <?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></option>  
</select>
     
</div>



<div class="table-responsive">
<div class="visible-xs"><br /></div>

<table class="table">
  <tr valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Hot_Springs_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Hot_Springs_National_Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Hot Springs<br />
National Park</span> 
</td>
  <td><a href="viewCoinDesign.php?design=Yellowstone_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Yellowstone National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Yellowstone<br />
National Park</td>
  
<td><a href="viewCoinDesign.php?design=Yosemite_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Yosemite National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Yosemite<br />
National Park</td>
  
<td><a href="viewCoinDesign.php?design=Grand_Canyon_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Grand Canyon National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Grand Canyon<br />
National Park</td>
  
<td><a href="viewCoinDesign.php?design=Mount_Hood_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Mount Hood National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Mount Hood<br />
National Park </td>
  </tr>
  
  <tr valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=Gettysburg_National_Military_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Gettysburg National Military Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Gettysburg National<br />
Military Park</span> 
</td>
  <td><a href="viewCoinDesign.php?design=Glacier_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Glacier National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Glacier National Park</td>
  
<td><a href="viewCoinDesign.php?design=Olympic_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Olympic National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Olympic National Park</td>
  
<td><a href="viewCoinDesign.php?design=Vicksburg_National_Military_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Vicksburg National Military Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Vicksburg National<br />
Military Park</td>
  
<td><a href="viewCoinDesign.php?design=Chickasaw_National_Recreation_Area"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Chickasaw National Recreation Area', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Chickasaw National<br />
Recreation Area </td>
  </tr>
  
  <tr valign="top" class="setFiveRow"> 
  <td><a href="viewCoinDesign.php?design=El_Yunque_National_Forest"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('El Yunque National Forest', $userID); ?>" alt="" width="100" height="100" /></a><br />
  El Yunque National<br />
Forest</td>
  <td><a href="viewCoinDesign.php?design=Chaco_Culture_National_Historical_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Chaco Culture National Historical Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
Chaco Culture<br />
National Historical Park</td>
  
<td><a href="viewCoinDesign.php?design=Acadia_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Acadia National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Acadia National Park</td>
  
<td><a href="viewCoinDesign.php?design=Hawaii_Volcanoes_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Hawaii Volcanoes National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Hawaii Volcanoes<br />
National Park</td>
  
<td><a href="viewCoinDesign.php?design=Denali_National_Park"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Denali National Park', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Denali <br />
  National Park </td>
  </tr>
 </table>
 </div>