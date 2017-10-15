<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Coin Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>My Coin Collection</h1>

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="11%" align="right"><?php echo $collection->getCollectionCountById($userID); ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getUniqueCollectionCountById($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td align="right"><a href="reportSpending.php">$<?php echo $collection->getCoinSumByAccount($userID); ?></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>
  </tr>
</table>
<h3><a href="viewFolderCollection.php" class="brownLink"><strong><img src="../img/folderIcon.jpg" width="14" height="20" align="absmiddle" /> </strong>Folder Views<strong> | </strong></a><a href="_downloadCollection.php?collection=<?php echo $Encryption->encode($userID); ?>" title="Download to Excel" class="brownLink"><strong><img src="../img/excelIcon.jpg" alt="" width="14" height="20" align="absmiddle" /> </strong>Download Collection</a></h3>
<hr />

<table width="100%" border="1" id="masterCountTbl" cellpadding="3">
  <tr class="keyRow">
    <td><strong>Denomination</strong></td>
    <td><strong>Coins</strong></td>
    <td><strong>Rolls</strong></td>
    <td><strong>Folders</strong></td>
    <td><strong>Bags</strong></td>
    <td><strong>Boxes</strong></td>
    <td align="center"><strong>Manage</strong></td>
  </tr>
  <tr>
    <td><strong><a href="Half_Cent.php">Half Cent</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Half_Cent"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Cent', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Half_Cent"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Half Cent' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Half_Cent"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Half Cent'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Half_Cent"><?php echo $collectionBags->getBagCountByCategory($userID, 'Half Cent'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Half_Cent"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Half Cent'); ?></a></td>
    <td align="center">
    
    <a href="coinCategoryManage.php?coinCategory=Half_Cent">Manage/Remove Coins</a> 
    </td>
  </tr>
  <tr>
    <td><strong><a href="Large_Cent.php">Large Cent</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Large_Cent"><?php echo $collection->getMasterCoinCountByCoinCategory('Large Cent', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Large_Cent"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Large Cent' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Large_Cent"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Large Cent'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Large_Cent"><?php echo $collectionBags->getBagCountByCategory($userID, 'Large Cent'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Large_Cent"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Large Cent'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Large_Cent">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td width="20%"><strong><a href="Small_Cent.php">Small Cent</a></strong></td>
    <td width="10%"><a href="categoryCoins.php?coinCategory=Small_Cent"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $userID); ?></a></td>
    <td width="10%"><a href="categoryRolls.php?coinCategory=Small_Cent"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Small Cent' ); ?></a></td>
    <td width="10%"><a href="categoryFolders.php?coinCategory=Small_Cent"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Small Cent'); ?></a></td>
    <td width="10%"><a href="categoryBags.php?coinCategory=Small_Cent"><?php echo $collectionBags->getBagCountByCategory($userID, 'Sment'); ?></a></td>
    <td width="10%"><a href="categoryBoxes.php?coinCategory=Small_Cent"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Small Cent'); ?></a></td>
    <td width="41%" align="center"><a href="coinCategoryManage.php?coinCategory=Small_Cent">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Two_Cent.php">Two Cent</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Two_Cent"><?php echo $collection->getMasterCoinCountByCoinCategory('Two Cent', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Two_Cent"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Two Cent' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Two_Cent"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Two Cent'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Two_Cent"><?php echo $collectionBags->getBagCountByCategory($userID, 'Two Cent'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Two_Cent"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Two Cent'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Two_Cent">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Three_Cent.php">Three Cent</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Three_Cent"><?php echo $collection->getMasterCoinCountByCoinCategory('Three Cent', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Three_Cent"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Three Cent' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Three_Cent"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Three Cent'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Three_Cent"><?php echo $collectionBags->getBagCountByCategory($userID, 'Three Cent'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Three_Cent"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Three Cent'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Three_Cent">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Half_Dime.php">Half Dime</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Half_Dime"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dime', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Half_Dime"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Half Dime' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Half_Dime"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Half Dime'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Half_Dime"><?php echo $collectionBags->getBagCountByCategory($userID, 'Half Dime'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Half_Dime"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Half Dime'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Half_Dime">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Nickel.php">Nickels</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Nickel"><?php echo $collection->getMasterCoinCountByCoinCategory('Nickel', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Nickel"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Nickel' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Nickel"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Nickel'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Nickel"><?php echo $collectionBags->getBagCountByCategory($userID, 'Nickel'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Nickel"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Nickel'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Nickel">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Dime.php">Dimes</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Dime"><?php echo $collection->getMasterCoinCountByCoinCategory('Dime', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Dime"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Dime' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Dime"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Dime'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Dime"><?php echo $collectionBags->getBagCountByCategory($userID, 'Dime'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Dime"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Dime'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Dime">Manage/Remove Coins</a></td>
  </tr>

  <tr>
    <td><strong><a href="Twenty_Cent.php">Twenty Cent</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Twenty_Cent"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty Cent', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Twenty_Cent"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Twenty Cent' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Twenty_Cent"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Twenty Cent'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Twenty_Cent"><?php echo $collectionBags->getBagCountByCategory($userID, 'Twenty Cent'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Twenty_Cent"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Twenty Cent'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Twenty_Cent">Manage/Remove Coins</a></td>
  </tr> 
   <tr>
   <td><strong><a href="Quarter.php">Quarters</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Quarter"><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Quarter"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Quarter' ); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Quarter"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Quarter'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Quarter"><?php echo $collectionBags->getBagCountByCategory($userID, 'Quarter'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Quarter"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Quarter'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Quarter">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Half_Dollar.php">Half Dollars</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Half_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dollar', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Half_Dollar"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Half Dollar'); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Half_Dollar"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Half Dollar'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Half_Dollar"><?php echo $collectionBags->getBagCountByCategory($userID, 'Half Dollar'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Half_Dollar"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Half Dollar'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Half_Dollar">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Dollar.php">Dollars</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Dollar', $userID); ?></a></td>
    <td><a href="categoryRolls.php?coinCategory=Dollar"><?php echo $collectionRolls->getRollCountByCategory($userID, 'Dollar'); ?></a></td>
    <td><a href="categoryFolders.php?coinCategory=Dollar"><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Dollar'); ?></a></td>
    <td><a href="categoryBags.php?coinCategory=Dollar"><?php echo $collectionBags->getBagCountByCategory($userID, 'Dollar'); ?></a></td>
    <td><a href="categoryBoxes.php?coinCategory=Dollar"><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Dollar'); ?></a></td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Dollar">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="keyRow">
    <td><strong>Bullion</strong></td>
    <td><strong>Coins</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong><a href="Quarter_Eagle.php">Quarter Eagles</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Quarter_Eagle"><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter_Eagle', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Quarter Eagle' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Quarter_Eagle">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Three_Dollar.php">Three Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Three_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Three_Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Three_Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Three_Dollar">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Four_Dollar.php">Four Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Four_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Four_Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Four_Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Half_Cent">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Five_Dollar.php">Five Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Five_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Five Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Five Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Five_Dollar">Manage/Remove Coins</a></td>
  </tr>

  <tr>
    <td><strong><a href="Ten_Dollar.php">Ten Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Ten_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Ten_Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Ten_Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Ten_Dollar">Manage/Remove Coins</a></td>
  </tr> 
   <tr>
   <td><strong><a href="Twenty_Dollar.php">Twenty Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Twenty_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty_Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Twenty_Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Twenty_Dollar">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Twenty_Five_Dollar.php">Twenty Five Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Twenty_Five_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Twenty Five Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Twenty Five Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Twenty_Five_Dollar">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="Fifty_Dollar.php">Fifty Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=Fifty_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Fifty_Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Fifty_Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=Fifty_Dollar">Manage/Remove Coins</a></td>
  </tr>
  <tr>
    <td><strong><a href="One_Hundred_Dollar.php">$100 Dollar</a></strong></td>
    <td><a href="categoryCoins.php?coinCategory=One_Hundred_Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('One_Hundred_Dollar', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'One_Hundred_Dollar' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="coinCategoryManage.php?coinCategory=One_Hundred_Dollar">Manage/Remove Coins</a></td>
  </tr>
  <tr class="keyRow">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

    <td><strong><a href="Platinum_American_Eagle.php">Platinum</a></strong></td>
    <td align="left"><a href="categoryCoins.php?coinCategory=Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Platinum', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Platinum' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td><strong><a href="Commemorative.php">Commemoratives</a></strong></td>
    <td align="left"><a href="categoryCoins.php?coinCategory=Dollar"><?php echo $collection->getMasterCoinCountByCoinCategory('Commemorative', $userID); ?></a></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Commemorative' ); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" border="1" id="masterCountTbl" cellpadding="3">
  <tr class="keyRow">
    <td width="20%"><strong>Sets</strong></td>
    <td width="10%"><strong>Mint</strong></td>
    <td width="10%"><strong>Proof</strong></td>
    <td width="10%"><strong>Commem</strong></td>
    <td width="10%"><strong>Bags</strong></td>
    <td width="10%"><strong>Boxes</strong></td>
    <td width="41%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="Half_Cent.php">Half Cent</a></strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Half Cent', $userID); ?></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Half Cent' ); ?></td>
    <td><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Half Cent'); ?></td>
    <td><?php echo $collectionBags->getBagCountByCategory($userID, 'Half Cent'); ?></td>
    <td><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Half Cent'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="Large_Cent.php">Large Cent</a></strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Large Cent', $userID); ?></td>
    <td><?php echo $collectionRolls->getRollCountByCategory($userID, 'Large Cent' ); ?></td>
    <td><?php echo $collectionFolder->getFolderCountByCategory($userID, 'Large Cent'); ?></td>
    <td><?php echo $collectionBags->getBagCountByCategory($userID, 'Large Cent'); ?></td>
    <td><?php echo $CollectionBoxes->getBoxCountByCategory($userID, 'Large Cent'); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />

<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>