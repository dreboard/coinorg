<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$coincollectID = $Encryption->decode($_GET['ID']);
$CoinCollect->getCoinCollectionById($coincollectID);
}
if (isset($_POST["removeAllCoinsBtn"])) { 
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Collection</span>';
header('Location: coinCollectionList.php?ID='.$Encryption->encode($coincollectID).'');
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
    <input name="removeAllCoinsBtn" id="removeAllCoinsBtn" type="submit" value="Remove All" onclick="return confirm('Remove All Items?')" />
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
<br />
<p><?php echo $CoinCollect->getCoinCollectionDesc(); ?></p>
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

<table width="100%" border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;

  function checkCoins($coinID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
{
	$coinVersion = str_replace(' ', '_', $show['coinVersion']);
}
	if($coinCount == 0){
		$image = "blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = $coinVersion.'.jpg';
	}
	 return $image;
 }
 
$result = mysql_query("SELECT * FROM collection WHERE coincollectID = '$coincollectID' ORDER BY coinYear ASC ") or die(mysql_error());
if(mysql_num_rows($result) == 0){
	  echo '
		  <td colspan="4" align="center">You dont have any coins in this collection, <a href="coinCollectionAdd.php?ID='.$Encryption->encode($coincollectID).'">Add Coins</a></td>';
} else {
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$collectionID = intval($row['collectionID']);
	$coin->getCoinById($coinID);
	checkCoins($coinID);	
echo '<td width="14%" height="135">
	<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.checkCoins($coinID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
}
?>
</tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>