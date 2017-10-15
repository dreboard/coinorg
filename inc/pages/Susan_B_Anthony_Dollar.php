<div class="well well-sm hidden-xs">
 <table class="table wellTbl">
  <tr class="setFourRow">
    <td>Folders</td>
    <td>Rolls</td>
    <td>Bags</td>
    <td>Boxes</td>
  </tr>
  <tr class="setFourRow">
    <td><a href="coinTypeFolders.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ;?></a></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID); ?></a></td>
    <td><a href="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBagCountByType($coinType, $userID); ?></a></td>
    <td><a href="coinTypeBoxes.php?coinType=<?php echo $_GET['coinType']; ?>"><?php echo $collection->getCoinBoxCountByType($coinType, $userID); ?></a></td>
   </tr>
</table></div>

<!-- Single button -->
<div class="btn-group visible-xs">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Other Views</option>
      <option value="coinTypeFolders.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>">Folders (<?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?>)</option>
   <option value="coinTypeRolls.php?coinType=<?php echo $coinType ?>">Rolls <?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></option>
    <option value="viewBagReport.php?coinType=<?php echo $_GET['coinType']; ?>">Mint Bags <?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></option>
    <option value="coinTypeBoxes.php?coinType=<?php echo $_GET['coinType'] ?>">Boxes <?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></option>
    <option value="viewCertTypeReport.php?coinType=<?php echo $_GET['coinType']; ?>">Certified <?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></option>  
</select>      
</div>


<h3>Variety &amp; Type Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow" valign="top"> 
  <td><a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan_B_Anthony_Dollar ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar">Susan B Anthony Dollar</a></span> 
</td>
  <td><a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan_B_Anthony_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar_Proof">Susan B Anthony Dollar Proof</a></td>

  
<td><a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar_Proof_Type_I"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan_B_Anthony_Dollar_Proof_Type_I', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar_Proof_Type_I">Susan B Anthony Dollar Proof <br />
  Type I</a></td>
  
<td><a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar_Proof_Type_II"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Susan_B_Anthony_Dollar_Proof_Type_II', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Susan_B_Anthony_Dollar_Proof_Type_II">Susan B Anthony Dollar<br />
  Type II</a></td>
  
  </tr>

 </table>
 </div>
 