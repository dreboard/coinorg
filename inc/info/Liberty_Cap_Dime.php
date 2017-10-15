<table width="478" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>Liberty Cap Dime Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="127">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Cap_Dime Heraldic', $userID); ?>" alt="" width="100" height="100" /><br />
  Heraldic Eagle Reverse<br />
(1809-1828)</td>
  
    <td width="137">
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Liberty_Cap_Dime Reduced', $userID); ?>" alt="" width="100" height="100" /><br />
  Reduced Size <br />
  (1828-1837)</td>
  
  </tr>
 </table>
<hr />

 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr class="SemiKeyRow" align="center">
    <td width="20%"> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCoinCertifiedCountByType($coinType, $userID) ?></td>
  </tr>
</table>