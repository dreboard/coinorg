<hr />
<h3>Bulk Coins</h3>

<table width="100%" border="0" id="bulkTbl">
  <tr>
    <td><strong>Type</strong></td>
    <td width="9%" align="right"><strong>Rolls</strong></td>
    <td width="12%" align="right"><strong>Folders</strong></td>
    <td align="right"><strong>Bags</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="8%"><strong>Totals</strong></td>
    <td width="9%" align="right">$<?php echo $collectionRolls->getCoinSumByType($coinType, $userID) ?></td>
    <td width="12%" align="right">$<?php echo $collectionFolder->getCoinSumByType($coinType, $userID) ?></td>
    <td width="11%" align="right">$<?php echo $collectionBags->getCoinSumByType($coinType, $userID) ?></td>
    <td width="60%">&nbsp;</td>
  </tr>
</table>