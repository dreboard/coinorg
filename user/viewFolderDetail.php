<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
include_once"../inc/classes/PaginateFolder.php";
$pages = new PaginateFolder;

  function folderCoinLink($coinID, $collectfolderID, $userID){
	  $coin = new Coin();
	  $Encryption = new Encryption();
	  $coin->getCoinById($coinID);
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID' AND userID = '$userID'");
	$coinCount = mysql_num_rows($pageQuery);
	if($coinCount == 0){
		if($coin->getCoinYear() <= date('Y')){
		$image = '<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/blank.jpg" alt="" width="100" height="100" /></a>';
		} else {
			$image = '<img class="coinSwitch" src="../img/blank.jpg" alt="" width="100" height="100" />';
		}
		
	} else {
		while ($row2 = mysql_fetch_array($pageQuery))
		{
			$collection = new Collection();
			$coinVersion = str_replace(' ', '_', strip_tags($row2['coinVersion']));
			$coinID = intval($row2['coinID']);
			$collectionID = $Encryption->encode(intval($row2['collectionID']));
			$collection->getCollectionById(intval($row2['collectionID'])); 
		}
		$image = '<a href="viewCoinDetail.php?ID='.$collectionID.'"  title="'.$coin->getCoinName().' '.$collection->getCoinGrade().'"><img class="coinSwitch" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" alt="" width="100" height="100" /></a>';
	}
	 return $image;
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

</style>
<script type="text/javascript">
$(document).ready(function(){	
//coinSwitch


});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><?php echo $collectionFolder->getFolderNickname(); ?></h2>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="3" align="left"><strong>Folder Type: </strong><a href="viewFolder.php?folderID=<?php echo $folderID ?>"><?php echo $folder->getFolderName(); ?></a></td>
    </tr>
  <tr>
    <td width="23%"><strong>Total Coins</strong></td>
    <td width="12%" align="right"><?php echo $collectionFolder->folderCoinsCount($collectfolderID, $userID); ?>/<?php echo $folder->getCoinSlots(); ?></td>
    <td width="65%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Created</strong></td>
    <td align="right"><?php echo date("M j, Y",strtotime($collectionFolder->getCoinDate())); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong> Investment (Folder)</strong></td>
    <td align="right">$<?php echo $collectionFolder->getCoinPrice($collectfolderID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong> Investment (Coins)</strong></td>
    <td align="right">$<?php echo $collectionFolder->getFolderCoinPrice($collectfolderID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total</strong></td>
    <td align="right"><strong>$<?php echo $collectionFolder->getCoinPrice($collectfolderID) +  $collectionFolder->getFolderCoinPrice($collectfolderID); ?></strong></td>
    <td>&nbsp;</td>
  </tr>
</table>  
<hr />
<table width="100%" border="0" cellpadding="3">  
  <tr align="center">
    <td width="25%"><a href="viewFolderDetail.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><h3>Album View</h3></a></td>    
    <td width="25%"><a href="viewFolderDetailList.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><h3>Manage Folder &amp; Coins</h3></a></td>
    <td width="25%"><h3><a href="http://mycoinorganizer.com/user/folders.php">All Folders/Albums</a></h3></td>
    <td width="25%"><h3><a href="http://mycoinorganizer.com/user/addFolderBlank.php">New Folder</a></h3></td>
  </tr>
</table>
<hr />
<h3><?php echo ucfirst($folder->getFolderType()); ?> View</h3>
<p>


<div class="roundedWhite" id="albumDiv">
<br />
<table width="100%" border="0" cellpadding="3" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
/*$result = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinName ASC ".$pages->limit." ") or die(mysql_error());*/

$result = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID'") or die(mysql_error());


while($row = mysql_fetch_array($result)){
$coinList = explode(",", $row['coins']);
	foreach ($coinList as $coinID)
		{
			$coin->getCoinById($coinID);
echo '<td width="14%" height="135">
	'.folderCoinLink($coinID, $collectfolderID, $userID).'<br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 7) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}
}

?>
</tr></table>
<br />
</div>

<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
