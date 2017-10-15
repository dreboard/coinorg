<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectionID = $Encryption->decode($_GET['ID']);

if($collection->getCollectionById($collectionID) == NULL){
header("location: myCoins.php");
} else {

$coinType = $collection->getCoinType();
$coinID = $collection->getCoinID();
$coin-> getCoinById($coinID);
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinGrade = $collection->getCoinGrade();
$proService = $collection->getGrader();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);

if($collection->getCoinImage1() !== '../img/noPic.jpg'){
  $coinPic1 = '<img src="'.$collection->getCoinImage1().'" class="coinImg" />';
	} else {
	$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';
	}
  }
}

if (isset($_POST["img1RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage1() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage1());
	mysql_query("UPDATE collection SET coinPic1 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
 header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}
if (isset($_POST["img2RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage2() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage2());
	mysql_query("UPDATE collection SET coinPic2 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
 header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}
if (isset($_POST["img3RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage3() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage3());
	mysql_query("UPDATE collection SET coinPic3 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
 header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}
if (isset($_POST["img4RemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);
if($collection->getCoinImage4() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage4());
	mysql_query("UPDATE collection SET coinPic4 = '../img/noPic.jpg' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
 header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}

//Image 1	  
if (isset($_POST["coinPic1Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic1']['tmp_name'])){	
if($_FILES['coinPic1']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic1']['name']));
$Upload->SetTempName($_FILES['coinPic1']['tmp_name']);
$Upload->SetUploadDirectory($userID."/".$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/".$collectionID."/".str_replace(' ', '_', $_FILES['coinPic1']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinGallery.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
}
}

if (isset($_POST["coinPic2Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic2']['tmp_name'])){	
if($_FILES['coinPic2']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic2']['name']));
$Upload->SetTempName($_FILES['coinPic2']['tmp_name']);
$Upload->SetUploadDirectory($userID."/".$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic2 = $userID."/".$collectionID."/".str_replace(' ', '_', $_FILES['coinPic2']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic2 = '$coinPic2' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinGallery.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
}
}

if (isset($_POST["coinPic3Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic3']['tmp_name'])){	
if($_FILES['coinPic3']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic3']['name']));
$Upload->SetTempName($_FILES['coinPic3']['tmp_name']);
$Upload->SetUploadDirectory($userID."/".$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic3 = $userID."/".$collectionID."/".str_replace(' ', '_', $_FILES['coinPic3']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic3 = '$coinPic3' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinGallery.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
}
}

if (isset($_POST["coinPic4Btn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($collectionID);

if(!empty($_FILES['coinPic4']['tmp_name'])){	
if($_FILES['coinPic4']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic1']['name']));
$Upload->SetTempName($_FILES['coinPic4']['tmp_name']);
$Upload->SetUploadDirectory($userID."/".$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic4 = $userID."/".$collectionID."/".str_replace(' ', '_', $_FILES['coinPic4']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic4 = '$coinPic4' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinGallery.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
<script type="text/javascript" src="../scripts/lightbox.js"></script>
<script type="text/javascript" src="../scripts/images.js"></script>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


$("#wantForm").submit(function() {
      if ($("#coinGrade").val() == "") {
		$("#coinGrade").addClass("errorInput");
        return false;
      }else {
	 $('#wantBtn').val("Adding to list.....");	  
	  return true;
	  }
});

$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#collectionListForm").submit(function() {
      if ($("#Collection").val() == "") {
		$("#Collection").addClass("errorInput");
        return false;
      }else {
	 $('#collectionListBtn').val("Adding to collection.....");	  
	  return true;
	  }
});






});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><?php echo $_SESSION['message']; ?></span>

<table width="100%" border="0">
  <tr>
    <td><h1 class="tblH1"><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h1></td>
  </tr>
  <tr>
    <td class="brownLink"><?php echo $collection->getVarietyForCoin(intval($collectionID)).' '.$Errors->getErrorForCoin(intval($collectionID)) ?></td>
  </tr>
</table>
<hr />

<?php include('../inc/pageElements/viewCoinLinks.php'); ?>
<hr />
<h2>Image Gallery</h2>

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
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="coinPic1" id="coinPic1" type="file" />
    <input name="coinPic1Btn" id="coinPic1Btn" type="submit" value="Upload" /></form>
    </td>
    <td><span id="imgMsg2">Upload/Switch: </span>
    <form id="coinPic2Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="coinPic2" id="coinPic2" type="file" />
    <input name="coinPic2Btn" id="coinPic2Btn" type="submit" value="Upload" /></form>
    </td>
        <td><span id="imgMsg3">Upload/Switch: </span>
        <form id="coinPic3Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <input name="coinPic3" id="coinPic3" type="file" />
        <input name="coinPic3Btn" id="coinPic3Btn" type="submit" value="Upload" /></form>
        </td>
            <td><span id="imgMsg4">Upload/Switch: </span>
            <form id="coinPic4Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
            <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
            <input name="coinPic4" id="coinPic4" type="file" />
            <input name="coinPic4Btn" id="coinPic4Btn" type="submit" value="Upload" /></form>
            </td>
  </tr>
  <tr align="center">
    <td>
    <?php if ($collection->getCoinImage1() != '../img/noPic.jpg') {?>
    <form id="coinPic1DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="img1RemoveBtn" id="img1RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
    <?php if ($collection->getCoinImage2() != '../img/noPic.jpg') {?>
    <form id="coinPic2DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="img2RemoveBtn" id="img2RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
  <?php  } else { echo ''; }?>  
  
    </td>
    <td>
        <?php if ($collection->getCoinImage3() != '../img/noPic.jpg') {?>
    <form id="coinPic3DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="img3RemoveBtn" id="img3RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
        <?php if ($collection->getCoinImage4() != '../img/noPic.jpg') {?>
    <form id="coinPic4DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input name="img4RemoveBtn" id="img4RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
  </tr>
</table>
<script>
document.forms[0].addEventListener('submit', function() {
    var file = document.getElementById('file').files[0];

    if(file && file.size < 3145728) { // 10 MB (this size is in bytes)
        //Submit form        
    } else {
        //Display enter
    }
}, false);
</script>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>