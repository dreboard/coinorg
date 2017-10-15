<h3>Bags Purchased From <?php echo $purchaseFrom ?></h3>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Bags</strong></td>
    <td width="33%"><?php echo $collectionBags->getAllTableCountByIDFrom($userID, $purchaseFrom); ?></td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Bags Investment</strong></td>
    <td><?php echo $collectionBags->getUserSumFrom($userID, $purchaseFrom); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Type</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase Price</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collectbags WHERE purchaseFrom = '$purchaseFrom' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>No Bags Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
	  $collectbagID = strip_tags($row['collectbagID']);
	  $collectionBags->getCollectionBagById($collectbagID);
  echo '
    <tr align="center">
    <td align="left"><a href="viewBagDetail.php?ID='.$Encryption->encode($collectbagID).'">'.$collectionBags->getBagNickname().'</a></td>
	<td><a href="viewBagType.php?bagType='.str_replace(' ', '_', $collectionBags->getBagType()).'">'. $collectionBags->getBagType() .'</a></td>
		<td>'.date("M j, Y",strtotime($collectionBags->getCoinDate())) .'</td>
	<td>$'. $collectionBags->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Type</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase Price</td>
  </tr>
	</tfoot>
</table>