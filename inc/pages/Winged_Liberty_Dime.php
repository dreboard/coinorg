<div class="well well-sm hidden-xs">
 <table class="table wellTbl">
  <tr class="setFourRow">
    <td>Folders</td>
    <td>Rolls</td>
    <td>Bags</td>
    <td>Full Bands</td>
  </tr>
  <tr class="setFourRow">
    <td><a href="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ;?></a></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID); ?></a></td>
    <td><a href="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBagCountByType($coinType, $userID); ?></a></td>
    <td><a href="viewFullReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getTypeFullBandCount($userID, $coinType, $fullAtt='FB'); ?></a></td>
   </tr>
</table></div>

<!-- Single button -->
<div class="btn-group visible-xs">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Other Views</option>
      <option value="coinTypeFolders.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>">Folders (<?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?>)</option>
   <option value="coinTypeRolls.php?coinType=<?php echo $coinType ?>">Rolls (<?php echo $collection->getCoinRollCountByType($coinType, $userID) ?>)</option>
    <option value="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>">Folders (<?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?>)</option>
    <option value="viewFullReport.php?coinType=<?php echo $_GET['coinType']; ?>">Full Bands (<?php echo $collection->getTypeFullBandCount($userID, $coinType, $fullAtt='FB'); ?>
    0</option>  
</select>      
</div>

<h3>Variety &amp; Type Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr class="setTwoRow" valign="top"> 
  <td ><a href="viewCoinVersion.php?coinVersion=Winged_Liberty_Dime"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Winged_Liberty_Dime', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Winged_Liberty_Dime">Winged Liberty Dime</a></td>
  
    <td><a href="viewCoinVersion.php?coinVersion=Winged_Liberty_Dime_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Winged_Liberty_Dime_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Winged_Liberty_Dime_Proof">Proof</a></td>
  
  </tr>
 </table>
</div>