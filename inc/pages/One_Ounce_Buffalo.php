<br />
<table width="528" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="2"><h3>One Ounce Buffalo Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td width="50%"><a href="viewCoinVersion.php?coinVersion=One_Ounce_Buffalo"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Buffalo', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinVersion.php?coinVersion=One_Ounce_Buffalo">One Ounce Buffalo</a></span> 
</td>
  <td><a href="viewCoinVersion.php?coinVersion=One_Ounce_Buffalo_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Buffalo_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
    <a href="viewCoinVersion.php?coinVersion=One_Ounce_Buffalo_Proof">One Ounce Buffalo Proof</a></td>
  
  </tr>
 </table>    <hr />
 <table width="100%" border="0" class="priceListTbl" cellpadding="3">
  <tr align="center">
    <td> Certified</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertCollectionCountByType($userID, $coinType) ?></td>
  </tr>
</table>