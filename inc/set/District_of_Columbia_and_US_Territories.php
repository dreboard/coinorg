<table border="0" align="center" class="typeTbl" id="folderTbl" width="100%">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>D.C. and US Territories Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewSubCategory.php?coinSubCategory=District_of_Columbia"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('District of Columbia', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>District of Columbia</span> 
</td>
  <td><a href="viewSubCategory.php?coinSubCategory=Puerto_Rico"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Puerto Rico', $userID); ?>" alt="" width="100" height="100" /></a><br />
Puerto Rico</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Guam"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Guam', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Guam</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=American_Samoa"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('American Samoa', $userID); ?>" alt="" width="100" height="100" /></a><br />
  American Samoa</td>
  
<td><a href="viewSubCategory.php?coinSubCategory=Virgin_Islands"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Virgin Islands', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Virgin Islands </td>
  
  <td><a href="viewSubCategory.php?coinSubCategory=Northern_Mariana_Islands"><img class="coinSwitch" src="../img/<?php echo $collection->getQuarterImg('Northern Mariana Islands', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Northern Mariana Islands</span> 
</td>

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