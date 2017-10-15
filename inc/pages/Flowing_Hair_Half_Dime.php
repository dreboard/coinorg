<table width="636" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td><h3>Flowing Hair    Half Dime Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
    <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Flowing_Hair_Half_Dime', $userID); ?>" alt="" width="100" height="100" /><br /> 
    <br />(1794-1795)</td>
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