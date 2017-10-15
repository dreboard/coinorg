<table width="100%" border="0">
  <tr>
    <td align="center" valign="top"><h3><img src="../img/homeIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="viewCoinDetail.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Main View</a></h3></td>    
    <td align="center" valign="top"><h3><img src="../img/purchaseIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="viewCoinInvest.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Purchase Details</a></h3></td>
    <td align="center" valign="top"><h3><img src="../img/salesIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="viewCoinSales.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Sale Details</a></h3></td>
    <td align="center" valign="top"><h3><img src="../img/camIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="viewCoinGallery.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Image Gallery</a></h3></td>
  </tr>
  <tr>

<?php
//Edit coin or set
 if($collection->getCollectionSet() != '0'){?>
  
    <td width="25%" align="center" valign="top"><h3><img src="../img/pencilIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="editMintSet.php?ID=<?php echo $Encryption->encode($collection->getCollectionSet()) ?>">Edit This Set</a></h3></td>

<?php } else {  ?>    
  
    <td width="25%" align="center" valign="top"><h3><img src="../img/pencilIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="viewCoinEdit.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Edit This Coin</a></h3></td>  
  
  <?php }?>  
    
   <td width="25%" align="center" valign="top"><h3><img src="../img/purchaseIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="saleListByCoin.php?ID=<?php echo $Encryption->encode($collectionID); ?>" class="brownLinkBold">Add to Sell List&nbsp;</a> </h3></td>
   
   <td width="25%" align="center" valign="top"><h3><img src="../img/addIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="addCoinByID.php?coinID=<?php echo $coinID ?>" class="brownLinkBold">Add Another</a></h3></td>
  
   <td width="25%" align="center" valign="top"><h3><img src="../img/storageIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="viewCoinStorage.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Storage/Collection</a></h3></td>
   
  </tr>
</table>