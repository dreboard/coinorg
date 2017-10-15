<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_POST["enterOpenCoinsBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
if($collectionFolder->addOpenFolderCoins($collectfolderID, $userID)){
$_SESSION['message'] = 'All Coins Added';
} else {
	$_SESSION['message'] = '<span class="errorTxt">No Coins Added</span>';
}
}
//All
if (isset($_POST["removeAllCoinsBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
$_SESSION['message'] = 'All Coins Removed';
}


//All
if (isset($_POST["deleteFolderBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
mysql_query("DELETE FROM collectfolder WHERE collectfolderID = '$collectfolderID' AND userID = '$userID'");
mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
header("location: myFolders.php");

}

if (isset($_POST["deleteFolderAndCoinsBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("DELETE FROM collection WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
if($sql){
	mysql_query("DELETE FROM collectfolder WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
	header("location: myFolders.php");
}
}
//One coin
if (isset($_POST["folderCoin"])) { 
$collectionID = $Encryption->decode($_POST['folderCoin']);
$collectfolderID = $Encryption->decode($_POST['folder']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderID = $collectionFolder->getFolderID();
$folder->getFolderByID($folderID);

$sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$collectionID'  AND userID = '$userID'");

}

if (isset($_POST["changeCoinBtn"])) { 
$newID = $Encryption->decode($_POST['newID']);
$collectfolderID = $Encryption->decode($_POST['changeRoll']);
$oldID = $Encryption->decode($_POST['oldID']);

$sql = mysql_query("UPDATE collection SET collectfolderID = '$collectfolderID' WHERE collectionID = '$newID' AND userID = '$userID' ");
$sql2 = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$oldID' AND userID = '$userID'");
header("location: viewFolderDetailList.php?ID=".$Encryption->encode($collectfolderID)."");
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
.coinList {min-width:128px;}
.slideshow {width:800px; margin:0px auto;}
#coinChangerTbl {margin:0px auto;}
.folderSwitchForm, .otherFolderCoinsForm  {display:inline; padding:0px; margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$('.otherFolderCoinsBtns').attr('disabled', 'disabled');

$('.idCheck').change(function() {
    if ($('.idCheck:checked').length) {
        $('#addCoinFormBtn').removeAttr('disabled');
    } else {
        $('#addCoinFormBtn').attr('disabled', 'disabled');
    }
});


$("#deleteFolderBtn").click(function(){
  $('#deleteFolderSpan').text('Deleting All, Please Wait...');
  $(this).attr('disabled', 'disabled');
});	
$("#enterOpenCoinsBtn").click(function(){
  $('#enterOpenCoinsSpan').text('Adding All, Please Wait...');
  $(this).attr('disabled', 'disabled');
});	


});

function toggleFolderButtons(x) {
	//alert(x);
    if (document.getElementById('newID'+x).value == '') {
		document.getElementById("changeBtn"+x).disabled = true; 
    } else {
        document.getElementById("changeBtn"+x).disabled = false;
    }	
}
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php echo $_SESSION['message']; ?>
<h1><?php echo $collectionFolder->getFolderNickname(); ?> Folder</h1>
<p><strong>Folder Type: </strong><a href="viewFolder.php?folderID=<?php echo $folderID ?>" class="brownLink"><?php echo $folder->getFolderName(); ?></a></p>
<table width="100%" border="0" cellpadding="3">  
  <tr align="center">
    <td width="25%" valign="top"><a href="viewFolderDetail.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><h3>Album View</h3></a></td>    
    <td width="25%" valign="top"><a href="addFolderCoins.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>" class="brownLinkBold"><h3>Add <?php echo $collectionFolder->getCoinType(); ?> Coins</h3></a></td>
    <td width="25%" valign="top"><h3><a href="http://mycoinorganizer.com/user/folders.php">All Folders/Albums</a></h3></td>
    <td width="25%" valign="top"><h3><a href="http://mycoinorganizer.com/user/addFolderBlank.php">New Folder</a></h3></td>
  </tr>
</table>
<hr />



<table width="100%" border="0">
  <tr>
     <td width="50%"><form action="" method="post" class="compactForm" id="enterOpenCoinsForm">
      <strong><img src="../img/Lincoln_Memorialplaceholder.jpg" width="30" height="30" align="absmiddle" /> Auto Fill Coins To Folder: </strong>
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
      <input name="enterOpenCoinsBtn" id="enterOpenCoinsBtn" type="submit" value="Enter All" onclick="return confirm('Enter All Available Coins?')" /> <br />
<span id="enterOpenCoinsSpan"> *Add All Available Coins From Collection</span>
    </form></td>   
    <td width="50%">
        <form action="" method="post" class="compactForm" id="removeAllCoinsForm">
        <strong><img src="../img/blank.jpg" width="30" height="30" align="absmiddle" /> Remove All Coins From Folder: </strong>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
    <input name="removeAllCoinsBtn" id="removeAllCoinsBtn" type="submit" value="Remove All" onclick="return confirm('Remove All Coins?')" /><br />
<span id="removeAllCoinsSpan">*Keep Folder</span>
    </form>
    </td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <form action="" method="post" class="compactForm" id="deleteFolderForm">
        <strong><img src="../img/noFolder.jpg" width="30" height="30" align="absmiddle" /> Delete Folder: </strong>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
    <input name="deleteFolderBtn" id="deleteFolderBtn" type="submit" value="Remove All" onclick="return confirm('Delete Folder And Keep Coins?')" /><br />
<span id="deleteFolderSpan">*Keep Coins</span>
    </form></td>
    
    <td>        <form action="" method="post" class="compactForm" id="deleteFolderAndCoinsForm">
        <strong><img src="../img/noFolderCoins.jpg" width="30" height="30" align="absmiddle" /> Delete All: </strong>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
    <input name="deleteFolderAndCoinsBtn" id="deleteFolderAndCoinsBtn" type="submit" value="Remove All" onclick="return confirm('Delete Folder And Coins?')" /><br />
<span id="deleteAllSpan">*Delete Folder &amp; Coins</span>
    </form></td>
  </tr>
</table>


<hr />
<div class="roundedWhite" id="albumDiv">
<p class="innerAlbum">Use the forms to search and add/update the folder coins.  The list will only be populated by the coins in your collection.  If you have coins that meets this folders criteria, you can go to the <a href="addFolderCoins.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>" class="brownLinkBold">Add <?php echo $collectionFolder->getCoinType(); ?> Coins</a> page and enter the collection data.</p>
<table width="98%" border="0" id="coinChangerTbl" cellpadding="3">
  <tr class="darker">
    <td width="33%">Coin</td>
    <td width="30%">Current Coin</td>
    <td width="32%">Other Coins In Collection</td>
    <td width="5%">&nbsp;</td>
  </tr>
<?php 
	$sql  = mysql_query("SELECT * FROM folders WHERE folderID = '".$collectionFolder->getFolderID()."'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
	$coinList = explode(",", $row['coins']);
	$i = 0;
	foreach ($coinList as $coinID)
		{
			$coin->getCoinById($coinID);
	echo '<tr class="gryHover">
    <td><a href="viewCoin.php?coinID='.$coinID.'" title="'.$coin->getCoinName().'">' .$General->summary($coin->getCoinName(), $limit=40, $strip = false). '</a>
	
	</td>
	<td>'.$collectionFolder->getFolderCoin($coinID, $collectfolderID, $userID).'</td>
    <td>'.$collectionFolder->otherCoinsList($coinID, $collectfolderID, $userID).'</td>
<td></td>    
  </tr>';
	}
}

?>
</table>


</div>
<hr />

<div class="slideshow">
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab" id="Player_f9ae2975-07b9-4c1e-9591-28f970c7d1fe"  WIDTH="800px" HEIGHT="200px"> <PARAM NAME="movie" VALUE="http://ws.amazon.com/widgets/q?rt=tf_ssw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Fxt0a-20%2F8003%2Ff9ae2975-07b9-4c1e-9591-28f970c7d1fe&Operation=GetDisplayTemplate"><PARAM NAME="quality" VALUE="high"><PARAM NAME="bgcolor" VALUE="#FFFFFF"><PARAM NAME="allowscriptaccess" VALUE="always"><embed src="http://ws.amazon.com/widgets/q?rt=tf_ssw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Fxt0a-20%2F8003%2Ff9ae2975-07b9-4c1e-9591-28f970c7d1fe&Operation=GetDisplayTemplate" id="Player_f9ae2975-07b9-4c1e-9591-28f970c7d1fe" quality="high" bgcolor="#ffffff" name="Player_f9ae2975-07b9-4c1e-9591-28f970c7d1fe" allowscriptaccess="always"  type="application/x-shockwave-flash" align="middle" height="200px" width="800px"></embed></OBJECT> <NOSCRIPT><A HREF="http://ws.amazon.com/widgets/q?rt=tf_ssw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Fxt0a-20%2F8003%2Ff9ae2975-07b9-4c1e-9591-28f970c7d1fe&Operation=NoScript">Amazon.com Widgets</A></NOSCRIPT>
</div>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
