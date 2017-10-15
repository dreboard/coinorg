<table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Kennedy Half Dollar  Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Kennedy Half Dollar </span> 
</td>
  <td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
Kennedy Half Dollar<br />
Proof</td>
  
  <td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar_Special_Mint"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar Special Mint', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kennedy Half Dollar  <br />
  Special Mint </td>
  
<td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar_Proof_Type_I"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar Proof Type I', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kennedy Half Dollar<br />
Proof 
  Type I</td>
  
<td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar_Proof_Type_II"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar Proof Type II', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kennedy Half Dollar  <br />
  Proof 
  Type II</td>
  
<td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar_Silver"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar Silver', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kennedy Half Dollar<br />
Silver </td>
  
  </tr>
  
    <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  
  <td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar_Bicentennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar Bicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kennedy Half Dollar  <br />
  Bicentennial</td>
  
<td><a href="viewCoinVersion.php?coinVersion=Kennedy_Half_Dollar_Bicentennial_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Kennedy Half Dollar  Bicentennial Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Kennedy Half Dollar  <br />
  Bicentennial Proof </td>
  
<td>&nbsp;</td>
  
<td>&nbsp;</td>
  
  </tr>
 </table>
<br />

<table width="600" border="0" align="center" class="typeTbl">
   <tr>
     <td colspan="3" align="center"><h3>Metal Content Collection</h3></td>
   </tr>
   <tr align="center" valign="top" class="dateHolder">
     <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getKennedyMetalImg($coinType, "90% Silver", $userID); ?>" alt="" width="100" height="100" /></td>
     <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getKennedyMetalImg($coinType, "40% Silver", $userID); ?>" alt="" width="100" height="100" /></td>
     <td align="center"><img class="coinSwitch" src="../img/<?php echo $collection->getKennedyMetalImg($coinType, "Clad Composition", $userID); ?>" alt="" width="100" height="100" /></td>
  </tr>
   <tr>
     <td align="center">90% Silver</td>
     <td align="center">40% Silver</td>
     <td align="center">Clad Composition</td>
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