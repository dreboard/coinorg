<br />
<table width="580" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Quarter Ounce Gold Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="50%"><a href="viewCoinVersion.php?coinVersion=Quarter_Ounce_Gold"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinVersion.php?coinVersion=Quarter_Ounce_Gold">Quarter Ounce Gold</a></span> 
</td>
  <td><a href="viewCoinVersion.php?coinVersion=Quarter_Ounce_Gold_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Gold_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Quarter_Ounce_Gold_Proof">Quarter Ounce Gold Proof</a></td>
  
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