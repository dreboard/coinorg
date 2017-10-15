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
<div class="visible-xs"><br /></div>
<div class="table-responsive">
<table class="table">
  <tr align="center" valign="top" class="setSixRow"> 
  <td><a href="viewCoinDesign.php?design=District_of_Columbia"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('District of Columbia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinDesign.php?design=District_of_Columbia">District of Columbia</a></span> 
</td>
  <td><a href="viewCoinDesign.php?design=Puerto_Rico"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Puerto Rico', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinDesign.php?design=Puerto_Rico">Puerto Rico</a></td>
  
<td><a href="viewCoinDesign.php?design=Guam"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Guam', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinDesign.php?design=Guam">Guam</a></td>
  
<td><a href="viewCoinDesign.php?design=American_Samoa"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('American Samoa', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinDesign.php?design=American_Samoa">American Samoa</a></td>
  
<td><a href="viewCoinDesign.php?design=Virgin_Islands"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Virgin Islands', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinDesign.php?design=Virgin_Islands">Virgin Islands</a></td>
  
  <td><a href="viewCoinDesign.php?design=Northern_Mariana_Islands"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Northern Mariana Islands', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinDesign.php?design=Northern_Mariana_Islands">Northern Mariana Islands</a></td>

  </tr>
 </table>
</div>