<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Lincoln Memorial Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Memorial', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Lincoln Memorial</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Memorial Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Lincoln Memorial Proof</td>
  
<td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Memorial Small Date', $userID); ?>" alt="" width="100" height="100" /><br />
  Lincoln Memorial Small Date</td>
  
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Memorial Large Date', $userID); ?>" alt="" width="100" height="100" /><br />
  Lincoln Memorial Large Date</td>
  
<td><a href="viewListReport.php?coinType=Lincoln_Bicentennial&page=1"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Memorial Special Mint', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Lincoln Memorial Special Mint </td>
  
<td><a href="viewListReport.php?coinType=Union_Shield&page=1"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lincoln Memorial Type II Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
 Lincoln Memorial Type II Proof </td>
  </tr>
 </table>
 <br />
<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="7"><h3>1982 Variety Set</h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCoin.php?coinID=3881"><img class="coinSwitch" src="../img/<?php echo $collection->getEightyTwoVarietyImg('3881', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoin.php?coinID=3881">1982 P Copper<br />
Large Date</a></span> 
</td>
  <td><a href="viewCoin.php?coinID=3882"><img class="coinSwitch" src="../img/<?php echo $collection->getEightyTwoVarietyImg('3882', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
    <a href="viewCoin.php?coinID=3882">1982 P Copper<br />
Small Date</a></td>
  
<td><a href="viewCoin.php?coinID=3883"><img class="coinSwitch" src="../img/<?php echo $collection->getEightyTwoVarietyImg('3883', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=3883">1982 P Zinc<br />
Large Date</a></td>
  
<td><a href="viewCoin.php?coinID=3884"><img class="coinSwitch" src="../img/<?php echo $collection->getEightyTwoVarietyImg('3884', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=3884">1982 P Zinc<br />
Small Date</a></td>
  
<td><a href="viewCoin.php?coinID=3885"><img class="coinSwitch" src="../img/<?php echo $collection->getEightyTwoVarietyImg('3885', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoin.php?coinID=3885">1982 D Copper<br />
Large Date</a></td>

<td><a href="viewCoin.php?coinID=3886"><img class="coinSwitch" src="../img/<?php echo $collection->getEightyTwoVarietyImg('3886', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoin.php?coinID=3886">1982 D Zinc<br />
Large Date</a></span> 
</td>
  <td><a href="viewCoin.php?coinID=3887"><img class="coinSwitch" src="../img/<?php echo $collection->getEightyTwoVarietyImg('3887', $userID); ?>" alt="" width="100" height="100" /></a><br /> 
    <a href="viewCoin.php?coinID=3887">1982 D Zinc<br />
Small Date</a></td>  
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
    <td><?php echo $collection->getFoldersCollectedByCoinType($coinType, $userID) ?></td>
    <td><a href="coinTypeRolls.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getCoinRollCountByType($coinType, $userID) ?></a></td>
    <td><?php echo $collection->getCoinBagCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinBoxCountByType($coinType, $userID) ?></td>
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>