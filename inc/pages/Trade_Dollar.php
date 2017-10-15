<table width="646" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Trade Dollar Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCoinVersion.php?coinVersion=Trade_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Trade_Dollar ', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span><a href="viewCoinVersion.php?coinVersion=Trade_Dollar">Trade  Dollar</a></span> 
</td>

  
<td><a href="viewCoinVersion.php?coinVersion=Trade_Dollar_Proof"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Trade_Dollar_Proof', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <a href="viewCoinVersion.php?coinVersion=Trade_Dollar_Proof">Proof</a></td>
  
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