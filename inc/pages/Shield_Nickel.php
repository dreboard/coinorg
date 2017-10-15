<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
<table class="table">
  <tr class="setFourRow"> 
  <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_With_Rays"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_With_Rays', $userID); ?>" alt="" width="100" height="100" /></a></td>
  <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_With_Rays_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_With_Rays_Proof', $userID); ?>" alt="" width="100" height="100" /></a></td>
  <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_No_Rays"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_No_Rays', $userID); ?>" alt="" width="100" height="100" /></a></td>
  <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_No_Rays_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Shield_Nickel_No_Rays_Proof', $userID); ?>" alt="" width="100" height="100" /></a></td>

  </tr>
  <tr class="setFourRow">
    <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_With_Rays">With Rays</a></td>
    <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_With_Rays_Proof">With Rays<br />
Proof</a></td>
    <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_No_Rays">Without Rays </a></td>
    <td><a href="viewCoinVersion.php?coinVersion=Shield_Nickel_No_Rays_Proof">Without Rays <br />
Proof </a></td>
  </tr>
 </table>
 </div>
<hr />
<table class="table table-condensed">
  <tr class="setThreeRow">
    <td>Folders</td>
    <td>Rolls</td>
    <td>Certified</td>
  </tr>
  <tr class="setThreeRow">
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>