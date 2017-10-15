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
	"iDisplayLength": 250
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
<br />
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

<div id="galleryViewDiv">
<table width="100%">
<tr>
<?php
$i = 1;
$sql = mysql_query("SELECT * FROM collection WHERE coincollectID = '$coincollectID' ORDER BY coinYear DESC") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$collection->getCollectionById(intval($row['collectionID']));
$coin->getCoinById(intval($row['coinID']));
echo '<td width="25%" align="center"><a href="coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode(intval($row['collectionID'])).'"><img title="'.$coin->getCoinName().'" class="thumb" src="'.$collection->getCoinImage1().'" /><br>
'.$coin->getCoinName().' '.substr($coin->getCoinType(), 0, 50).'</a></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
?>
</tr></table>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>