<table width="478" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Liberty Cap Dime Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="127"><a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Dime_Heraldic"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Cap_Dime_Heraldic', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Dime_Heraldic">Heraldic Eagle Reverse<br />
(1809-1828)</a></td>
  
    <td width="137"><a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Dime_Reduced"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Cap_Dime_Reduced', $userID); ?>" alt="" width="100" height="100" /></a><br />
      <a href="viewCoinVersion.php?coinVersion=Liberty_Cap_Dime_Reduced">Reduced Size <br />
  (1828-1837)</a></td>
  
  </tr>
 </table>
<hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>