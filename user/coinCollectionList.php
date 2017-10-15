<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$coincollectID = $Encryption->decode($_GET['ID']);
$CoinCollect->getCoinCollectionById($coincollectID);

}
if (isset($_POST["removeAllCoinsBtn"])) { 
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '0' WHERE coincollectID = '$coincollectID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Collection</span>';
header('Location: coinCollectionList.php?ID='.$Encryption->encode($coincollectID).'');
exit();
}

if (isset($_POST["noID"])) { 
$collectionID= $Encryption->decode($_POST['noID']);
mysql_query("UPDATE collection SET coincollectID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Coin Removed From Collection</span>';
header('Location: coinCollectionList.php?ID='.$_POST["collectNum"].'');
exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $CoinCollect->getCoinCollectionName(); ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/Small_Cent_Mix.jpg" width="50" height="50" align="absmiddle" /> <?php echo $CoinCollect->getCoinCollectionName(); ?></h1>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td class="darker">Type</td>
    <td align="right"><?php echo $CoinCollect->getCoinCategory(); ?></td>
    <td align="right"><a href="coinCollection.php"><strong>All Collections</strong></a></td>
  </tr>
  <tr>
    <td width="15%" class="darker">Coins</td>
    <td width="28%" align="right"><?php echo $CoinCollect->getCoinsCount($coincollectID); ?></td>
    <td width="57%" align="right"><a href="addCollection.php" class="brownLinkBold">Start New Collection</a></td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $CoinCollect->getCollectionSum($coincollectID); ?></td>
    <td align="right"><form action="" method="post" class="compactForm" id="removeAllCoinsForm">
              <strong>Remove All:
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID); ?>" />
    <input name="removeAllCoinsBtn" id="removeAllCoinsBtn" type="submit" value="Remove All" onclick="if (confirm('Remove All Items?')) { document.getElementById('removeAllCoinsBtn').setAttribute('value', 'Removing.....');}" />
              </strong>
        </form></td>
  </tr>
  
  <tr>
    <td class="darker">Certified Coins</td>
    <td align="right"><?php echo $CoinCollect->getCertCount($coincollectID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Created</td>
    <td align="right"><?php echo date("F j, Y",strtotime($CoinCollect->getCoinCollectionDate()));; ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<p><?php echo $CoinCollect->getCoinCollectionDesc(); ?></p>
<hr />
<table width="100%" border="0">

  <tr>
    <td width="10%"><img src="../img/ebayIcon2.jpg" width="91" height="40" /></td>
    <td width="21%">Prepare Auction Template</td>
    <td width="69%">
    <form class="compactForm" method="get" action="auctionCollectionForm.php" id="addEbayForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID); ?>" /><input id="addEbayBtn" type="submit" value=" Create " class="revenueBtn" />
</form>
    </td>
  </tr>
  <tr>
    <td width="10%"><img src="../img/soldIcon.jpg" width="91" height="40" /></td>
    <td width="21%">Mark Collection As Sold</td>
    <td width="69%">
    <form class="compactForm" method="get" action="soldCollectionForm.php" id="addEbayForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID); ?>" /><input id="soldBtn" type="submit" value=" Create " class="revenueBtn" />
</form>
    </td>
  </tr>
  <tr>
    <td width="10%"><img src="../img/saleIcon.jpg" width="91" height="40" /></td>
    <td width="21%">Mark Collection For Sale</td>
    <td width="69%">
    <form class="compactForm" method="get" action="saleCollectionForm.php" id="saleCoinForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID); ?>" /><input id="saleCoinBtn" type="submit" value=" Create " class="revenueBtn" />
</form>
    </td>
  </tr>
</table>
<hr />

<table width="100%" border="0">
  <tr class="darker">
    <td width="16%" align="center" valign="middle"><img src="../img/homeIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="coinCollectionList.php?ID=<?php echo $Encryption->encode($coincollectID) ?>" class="brownLink">Main View</a></td>
    <td align="center" valign="middle"><img src="../img/coinIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> <a href="coinCollectionView.php?ID=<?php echo $Encryption->encode($coincollectID) ?>">Album View</a></td>    
    <td width="16%" align="center" valign="middle"><img src="../img/pencilIcon.jpg" alt="" width="40" height="40" align="absmiddle" /> <a href="editCollection.php?ID=<?php echo $Encryption->encode($coincollectID) ?>">Edit Details</a></td>
    <td width="16%" align="center" valign="middle"><img src="../img/addIcon.jpg" width="20" height="20" align="absmiddle" /> <a href="coinCollectionAdd.php?ID=<?php echo $Encryption->encode($coincollectID) ?>">Add Coins</a></td>
    <td width="16%" align="center" valign="middle"><img src="../img/notepadIcon.jpg" width="40" height="40" align="absmiddle" /><a href="coinCollectionNote.php?ID=<?php echo $Encryption->encode($coincollectID) ?>"> Notes</a></td>
    <td width="16%" align="center" valign="middle"><img src="../img/camIcon.jpg" width="40" height="40" align="absmiddle" /> <a href="coinCollectionGallery.php?ID=<?php echo $Encryption->encode($coincollectID) ?>"> Gallery</a>
    </td>
  </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr class="darker">
    <td width="8%" align="center">1/2C</td>
    <td width="8%" align="center">1C</td>
    <td width="8%" align="center">2C</td>
    <td width="8%" align="center">3C</td>
    <td width="8%" align="center">5C</td>
    <td width="8%" align="center">10C</td>
    <td width="8%" align="center">20C</td>
    <td width="8%" align="center">25C</td>
    <td width="8%" align="center">50C</td>
    <td width="8%" align="center">$1</td>
    </tr>
  <tr>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.005'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.010'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.020'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.030'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.050'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.100'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.200'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.250'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='0.500'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='1.000'); ?></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="darker">
    <td align="center">$2.5</td>
    <td align="center">$3</td>
    <td align="center">$4</td>
    <td align="center">$5</td>
    <td align="center">$10</td>
    <td align="center">$20</td>
    <td align="center">$25</td>
    <td align="center">$50</td>
    <td align="center">$100</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='2.500'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='3.000'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='4.000'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='5.000'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='10.000'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='20.000'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='25.000'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='50.000'); ?></td>
    <td align="center"><?php echo $CoinCollect->getCollectionDenomCount($coincollectID, $denomination='100.000'); ?></td>
    <td align="center">&nbsp;</td>
  </tr>
  </table>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="61%" height="24">Year / Mint</td>  
    <td width="13%">Price</td>
    <td width="14%" align="center">Collected</td>
    <td width="12%" align="right"></td>
  </tr>
</thead>
  <tbody>
<?php
$i=0;
$countAll = mysql_query("SELECT * FROM collection WHERE coincollectID = '$coincollectID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No Coins In Collection, <a href="coinCollectionAdd.php?ID='.$Encryption->encode($coincollectID).'">Add Coins</a></td>
	<td>&nbsp;</td><td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collection->getCollectionById(intval($row['collectionID']));
  $coin-> getCoinById(intval($row['coinID']));  
  $i++;
  echo '
    <tr class="gryHover">
    <td>
	<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'" title="'.$coin->getCoinName().'">' .$General->summary($coin->getCoinName(), $limit=50, $strip = false). ' '.substr($coin->getCoinType(), 0, 30).'</a>
	<td>'.$collection->getCoinPrice().'</td>	
	<td align="center">'.date("M j, Y",strtotime($collection->getCoinDate())).'</td>
	<td class="purchaseTotals" align="center">
	
	&nbsp;
		<form action="" method="post" class="compactForm">
	    <input name="collectNum" type="hidden" value="'.$Encryption->encode(intval($row['coincollectID'])).'" />	
        <input name="noID" type="hidden" value="'.$Encryption->encode(intval($row['collectionID'])).'" />
	    <input id="collectionRemoveBtn'.$i.'" name="collectionRemoveBtn" type="submit" value="Remove" onclick="if (confirm(\'Remove From Collection?\')) { document.getElementById(\'collectionRemoveBtn'.$i.'\').setAttribute(\'value\', \'Wait...\');}" />
	  </form>
</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="61%" height="24">Year / Mint</td>  
    <td width="13%">Price</td>
    <td width="14%" align="center">Collected</td>
    <td width="12%" align="right"></td>
  </tr>
	</tfoot>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>