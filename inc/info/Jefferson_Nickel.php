<table border="0" id="folderTbl" class="typeTbl" width="100%">
  <tr class="dateHolder" valign="top">
    <td colspan="8" align="center"><h3>Jefferson Nickel Variety &amp; Type Collection</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td align="center">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Jefferson Nickel</span> 
</td>
  <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Jefferson Nickel <br />
Proof</td>
  
<td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Proof Type I', $userID); ?>" alt="" width="100" height="100" /><br />
   Proof<br />
Type I</td>
  
<td align="center"> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Proof Type II', $userID); ?>" alt="" width="100" height="100" /><br />
   Proof <br />
   Type II</td>

  <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Special Frosted Matte', $userID); ?>" alt="" width="100" height="100" /><br />
Special Frosted <br />
Matte</td>
  
<td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Jefferson Nickel Silver', $userID); ?>" alt="" width="100" height="100" /><br />
  Jefferson Nickel <br />
  Silver</td>
  
  </tr>
 </table>
<hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
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
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>
 
 