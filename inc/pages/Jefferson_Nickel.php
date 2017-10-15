<div class="well well-sm hidden-xs">
 <table class="table wellTbl">
  <tr class="setFourRow">
    <td>Folders</td>
    <td>Rolls</td>
    <td>Bags</td>
    <td>Full Steps</td>
  </tr>
  <tr class="setFourRow">
    <td><a href="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ;?></a></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID); ?></a></td>
    <td><a href="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBagCountByType($coinType, $userID); ?></a></td>
    <td><a href="viewFullReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getTypeFullBandCount($userID, $coinType, $fullAtt='FS'); ?></a></td>
   </tr>
</table></div>

<!-- Single button -->
<div class="btn-group visible-xs">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Other Views</option>
      <option value="coinTypeFolders.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>">Folders (<?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?>)</option>
   <option value="coinTypeRolls.php?coinType=<?php echo $coinType ?>">Rolls (<?php echo $collection->getCoinRollCountByType($coinType, $userID) ?>)</option>
    <option value="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>">Folders (<?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?>)</option>
    <option value="viewFullReport.php?coinType=<?php echo $_GET['coinType']; ?>">Full Steps (<?php echo $collection->getTypeFullBandCount($userID, $coinType, $fullAtt='FS'); ?>
    0</option>  
</select>      
</div>

<h3>Variety &amp; Type Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow" valign="top"> 
  <td><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel">Jefferson Nickel</a></span> 
</td>
  <td><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Proof">Jefferson Nickel <br />
Proof</a></td>
  
<td><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Proof_Type_I"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Proof Type I', $userID); ?>" alt="" width="100" height="100" /></a><br />
   <a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Proof_Type_I">Proof<br />
Type I</a></td>
  
<td><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Proof_Type_II"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Proof Type II', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Proof_Type_II">Proof <br />
    Type II</a></td>

  </tr>
  <tr class="setFourRow" valign="top"> 
    <td><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Special_Frosted_Matte"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Special Frosted Matte', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Special_Frosted_Matte">Special Frosted <br />
        Matte</a></td>
    <td><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Silver"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Silver', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Silver">Jefferson Nickel <br />
        Silver</a></td>
        <td><a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Special_Mint"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson_Nickel_Special_Mint', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Jefferson_Nickel_Special_Mint">Special Mint</a></td>
    <td>&nbsp;</td>
    </tr>
 </table>
 </div>