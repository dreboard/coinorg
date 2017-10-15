<table width="522" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Tenth Ounce Gold Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCoinVersion.php?coinVersion=Tenth_Ounce_Gold"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinVersion.php?coinVersion=Tenth_Ounce_Gold">Tenth Ounce Gold</a></span> 
</td>
  <td><a href="viewCoinVersion.php?coinVersion=Tenth_Ounce_Gold_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Gold_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Tenth_Ounce_Gold_Proof">Tenth Ounce Gold Proof</a></td>
  
  </tr>
 </table>
   <hr />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>