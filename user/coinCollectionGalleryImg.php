<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_POST["removeAllCoinsBtn"])) { 
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Collection</span>';
header('Location: coinCollectionList.php?ID='.$Encryption->encode($coincollectID).'');
exit();
}
//Image 1	  
if (isset($_POST["coinPic1Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic1']['tmp_name'])){	
if($_FILES['coinPic1']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic1']['name']));
$Upload->SetTempName($_FILES['coinPic1']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . str_replace(' ', '_', $_FILES['coinPic1']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
}
}
}
if (isset($_POST["img1RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage1() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage1());
	mysql_query("UPDATE collection SET coinPic1 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}
if (isset($_POST["coinPic2Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic2']['tmp_name'])){	
if($_FILES['coinPic2']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic2']['name']));
$Upload->SetTempName($_FILES['coinPic2']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic2 = $userID."/" . str_replace(' ', '_', $_FILES['coinPic2']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic2 = '$coinPic2' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
}
}
}

if (isset($_POST["img2RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage2() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage2());
	mysql_query("UPDATE collection SET coinPic2 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}

if (isset($_POST["coinPic3Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic3']['tmp_name'])){	
if($_FILES['coinPic3']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic3']['name']));
$Upload->SetTempName($_FILES['coinPic3']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic3 = $userID."/" . str_replace(' ', '_', $_FILES['coinPic3']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic3 = '$coinPic3' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
}
}
}

if (isset($_POST["img3RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage2() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage3());
	mysql_query("UPDATE collection SET coinPic3 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}

if (isset($_POST["coinPic4Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic4']['tmp_name'])){	
if($_FILES['coinPic4']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic1']['name']));
$Upload->SetTempName($_FILES['coinPic4']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic4 = $userID."/" . str_replace(' ', '_', $_FILES['coinPic4']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic4 = '$coinPic4' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
}
}
}

if (isset($_POST["img4RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage4() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage4());
	mysql_query("UPDATE collection SET coinPic4 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
header('Location: coinCollectionGalleryImg.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}

if (isset($_POST["collectionRemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["coin"]));
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Collection</span>';
header('Location: coinCollectionList.php?ID='.$Encryption->encode($coincollectID).'&coin='.$Encryption->encode($collectionID).'');
}

if (isset($_GET['ID'])) { 
$coincollectID = $Encryption->decode($_GET['ID']);
$CoinCollect->getCoinCollectionById($coincollectID);
$collectionID = $Encryption->decode($_GET['coin']);
$collection->getCollectionById(intval($collectionID));
$coin->getCoinById($collection->getCoinID());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<script type="text/javascript" src="../scripts/images.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
<script type="text/javascript" src="../scripts/lightbox.js"></script>
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


<table width="100%" border="0">
  <tr>
    <td width="60%"><h3><?php echo $coin->getCoinName(); ?> Image Gallery </h3></td>
    <td width="16%"></td>
    <td width="24%" align="right">&nbsp;<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />
	    <input id="collectionRemoveBtn" name="collectionRemoveBtn" type="submit" value="Remove From Collection" onclick="return confirm('Remove From Collection?')" />
	  </form></td>
  </tr>
</table>
<br />
<table width="960" border="0">
  <tr align="center">
    <td width="240" class="imgRow"><a href="<?php echo $collection->getCoinImage1() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage1().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $collection->getCoinImage2() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage2().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $collection->getCoinImage3() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage3().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $collection->getCoinImage4() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$collection->getCoinImage4().'" class="coinTblImg" />'; ?></a></td>
  </tr>
  <tr align="center">
    <td><a href="javascript:void(0)" id="coinPic1Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic2Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic3Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic4Lnk">Edit</a></td>
  <tr align="center" id="editRow">
    <td><span id="imgMsg1">Upload/Switch:</span> 
    <form id="coinPic1Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />    
    <input name="coinPic1" id="coinPic1" type="file" />
    <input name="coinPic1Btn" id="coinPic1Btn" type="submit" value="Upload" /></form>
    </td>
    <td><span id="imgMsg2">Upload/Switch: </span>
    <form id="coinPic2Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />    
    <input name="coinPic2" id="coinPic2" type="file" />
    <input name="coinPic2Btn" id="coinPic2Btn" type="submit" value="Upload" /></form>
    </td>
        <td><span id="imgMsg3">Upload/Switch: </span>
        <form id="coinPic3Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />    
        <input name="coinPic3" id="coinPic3" type="file" />
        <input name="coinPic3Btn" id="coinPic3Btn" type="submit" value="Upload" /></form>
        </td>
            <td><span id="imgMsg4">Upload/Switch: </span>
            <form id="coinPic4Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />    
            <input name="coinPic4" id="coinPic4" type="file" />
            <input name="coinPic4Btn" id="coinPic4Btn" type="submit" value="Upload" /></form>
            </td>
  </tr>
  <tr align="center">
    <td>
    <?php if ($collection->getCoinImage1() != '../img/noPic.jpg') {?>
    <form id="coinPic1DeleteFrm" class="compactForm" action="" method="post">
    <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />       
    <input name="img1RemoveBtn" id="img1RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
    <?php if ($collection->getCoinImage2() != '../img/noPic.jpg') {?>
    <form id="coinPic2DeleteFrm" class="compactForm" action="" method="post">
    <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />    
    <input name="img2RemoveBtn" id="img2RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
  <?php  } else { echo ''; }?>  
  
    </td>
    <td>
        <?php if ($collection->getCoinImage3() != '../img/noPic.jpg') {?>
    <form id="coinPic3DeleteFrm" class="compactForm" action="" method="post">
     <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />    
    <input name="img3RemoveBtn" id="img3RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
        <?php if ($collection->getCoinImage4() != '../img/noPic.jpg') {?>
    <form id="coinPic4DeleteFrm" class="compactForm" action="" method="post">
    <input name="coin" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />    
    <input name="img4RemoveBtn" id="img4RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>