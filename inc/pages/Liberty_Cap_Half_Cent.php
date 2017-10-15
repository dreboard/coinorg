<table width="473" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Liberty Cap Half Cent Type &amp; Variety Collection</h3></td>
    </tr>
  

  <tr align="center" valign="top" class="dateHolder"> 

  <td><a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Cent_Facing_Left"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Cent Facing Left', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Cent_Facing_Left">Liberty Cap <br />
    Half Cent Left</a></td>

  <td><a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Cent"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty Cap Half Cent', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Half_Cent">Liberty Cap <br />
    Half Cent Right</a></td>

</tr>
 </table>  <hr />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>