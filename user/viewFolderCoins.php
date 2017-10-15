<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_POST["folderCoin"])) { 
$collectionID = $Encryption->decode($_POST['folderCoin']);
$collectfolderID = $Encryption->decode($_POST['folder']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderID = $collectionFolder->getFolderID();
$folder->getFolderByID($folderID);

$sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$collectionID' ");

}
 
if (isset($_GET["ID"])) { 
$collectfolderID = $Encryption->decode($_GET['ID']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderID = $collectionFolder->getFolderID();
$folder->getFolderByID($folderID);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $collectionFolder->getFolderNickname(); ?></title>

<style type="text/css">
.compactForm {width:40px !important;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

$('#folderTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );


});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><?php echo $collectionFolder->getFolderNickname(); ?></h2>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="2" align="left"><a href="viewFolder.php?folderID=<?php echo $folderID ?>"><?php echo $folder->getFolderName(); ?></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="23%"><strong>Total Coins</strong></td>
    <td width="12%" align="right"><?php echo $collectionFolder->folderCoinsCount($collectfolderID); ?></td>
    <td width="65%">&nbsp;</td>
  </tr>
 
  <tr>
    <td><strong>Total Investment (Coins)</strong></td>
    <td align="right">$<?php echo $collectionFolder->getFolderCoinPrice($collectfolderID); ?></td>
    <td>&nbsp;</td>
  </tr>    
</table>
<hr />
<table width="100%" border="0" cellpadding="3">  
  <tr>
    <td width="20%"><a href="viewFolderDetail.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><h3>Album View</h3></a></td>    
    <td width="22%"><a href="viewFolderDetailList.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><h3>Add/Update Coins</h3></a></td>
    <td width="20%"><a href="viewFolderCoins.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><h3>View Coin Details</h3></a></td>
    <td width="38%">&nbsp;</td>
  </tr>
</table>
<hr />

<table width="834" border="0" cellpadding="4">
    <tr class="darker"> 
    <td width="82%" align="left">Coin</td>
    <td width="12%" align="center">Grade</td>
    <td width="6%" align="right"></td>
    </tr>
<?php 
$result = mysql_query("SELECT * FROM collection WHERE collectfolderID = '$collectfolderID' ORDER BY coinYear ASC") or die(mysql_error());
if(mysql_num_rows($result)== 0){
	echo    ' <tr>
    <td align="left"><strong>No Coin Saved In Folders</strong></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>';
} else {
while($row = mysql_fetch_array($result)){
	$coinID = strip_tags($row['coinID']);
	$collectionID = strip_tags($row['collectionID']);
	$collection->getCollectionById($collectionID);
	$coin->getCoinById($coinID);
echo '<tr align="center">
    <td width="14%" align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">'.$coin->getCoinName().'</a></td>
	<td>'.$collection->getCoinGrade().'<td />
	<td align="left">
	  <form action="" method="post" class="compactForm">
	  <input name="folder" type="hidden" value="'.$Encryption->encode($collectfolderID).'" />
	  <input name="folderCoin" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	  <input name="removeCoinBtn" type="submit" value="X" onclick="return confirm(\'Remove Coin?\')"" class="removeCoinBtn" />
	  </form>
	</td>
	</tr>';
 }
}
?>
</table>


<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
