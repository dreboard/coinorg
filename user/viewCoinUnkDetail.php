<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$unknownCollectionID = $Encryption->decode($_GET['ID']);
$CollectionUnk->getCollectionById($unknownCollectionID);
$coinType = $CollectionUnk->getCoinType();
$additional = $CollectionUnk->getAdditional(); 
$coinGrade = $CollectionUnk->getCoinGrade();
$coinCategory = $CollectionUnk->getCoinCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);


if($CollectionUnk->getCoinImage1() !== 'blankBig.jpg'){
$coinPic1 = '<img src="'.$CollectionUnk->getCoinImage1().'" class="coinImg" />';
} else {
$coinPic1 = '<img src="../img/'.$coinCategory.'.jpg" width="250" height="250" />';
}

}
//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$unknownCollectionID = $Encryption->decode($_POST["ID"]);
$coinID = $Encryption->decode($_POST["Coin"]);
mysql_query("DELETE FROM collection WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID' ") or die(mysql_error()); 
header("location: viewCoin.php?coinID=$coinID");
exit();
}


if (isset($_POST["collectionListBtn"])) { 
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["Collection"]));
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '$coincollectID' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'") or die(mysql_error()); 
header("location: coinCollectionView.php?ID=".$Encryption->encode($coincollectID)."");
exit();
}

if (isset($_POST["collectionRemoveBtn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '0' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Collection</span>';
}


if (isset($_POST["img1RemoveBtn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($unknownCollectionID);
if($collection->getCoinImage1() != '../img/noPic.jpg'){
	unlink($collection->getCoinImage1());
	mysql_query("UPDATE collection SET coinPic1 = '../img/noPic.jpg' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'") or die(mysql_error()); 
 $_SESSION['message'] = '<span class="greenLink">Removed From Album</span>';	
 header('Location: viewCoinDetail.php?ID='.$Encryption->encode($unknownCollectionID).'');
exit();
} else {
	 $_SESSION['message'] = '<span class="errorTxt">No Image Uploaded</span>';	
}

}


//Image 1	  
if (isset($_POST["coinPic1Btn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($unknownCollectionID);

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
$fileQuery = mysql_query("UPDATE collection SET coinPic1 = '$coinPic1' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($unknownCollectionID).'');
exit();
}
}
}

if (isset($_POST["coinPic2Btn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($unknownCollectionID);

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
$fileQuery = mysql_query("UPDATE collection SET coinPic2 = '$coinPic2' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($unknownCollectionID).'');
exit();
}
}
}

if (isset($_POST["coinPic3Btn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($unknownCollectionID);

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
$fileQuery = mysql_query("UPDATE collection SET coinPic3 = '$coinPic3' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($unknownCollectionID).'');
exit();
}
}
}

if (isset($_POST["coinPic4Btn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$collection->getCollectionById($unknownCollectionID);

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
$fileQuery = mysql_query("UPDATE collection SET coinPic4 = '$coinPic4' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($unknownCollectionID).'');
exit();
}
}
}


if (isset($_POST["certRemoveBtn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["certCoinID"]));
mysql_query("UPDATE collection SET certlist = '0' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID' ") or die(mysql_error());
$_SESSION['message'] = '<span class="greenLink">Coin List Updated</span>';
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($unknownCollectionID).'');
exit();
}


if (isset($_POST["containerListBtn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$containerID = mysql_real_escape_string($Encryption->decode($_POST["Collection"]));
mysql_query("UPDATE collection SET containerID = '$containerID' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Added To Container</span>';
}
if (isset($_POST["containerRemoveBtn"])) { 
$unknownCollectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET containerID = '0' WHERE unknownCollectionID = '$unknownCollectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Container</span>';
}

if (isset($_POST["folderCoinBtn"])) { 
$unknownCollectionID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE unknownCollectionID = '$unknownCollectionID'  AND userID = '$userID'");
if(!$sql){
	$_SESSION['message'] = '<span class="errorTxt">Coin Not Removed</span>';
	}	 else {
	$_SESSION['message'] = '<span class="greenLink">Removed From Folder</span>';
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

<title>Unknown <?php echo $coinCategory ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


$("#editRow").hide();


//Image 1
$("#coinPic1Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic2Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic3Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic4Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic1Frm").submit(function() {
      if ($("#coinPic1").val() == "") {
		$("#coinPic1").addClass("errorInput");
		$('#imgMsg1').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic1Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 2
$("#coinPic2Lnk").click(function() {
  $("#editTD2").toggle();
  });

$("#coinPic2Frm").submit(function() {
      if ($("#coinPic2").val() == "") {
		$("#coinPic2").addClass("errorInput");
		$('#imgMsg2').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic2Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 1
$("#coinPic3Lnk").click(function() {
  $("#editTD3").toggle();
  });

$("#coinPic3Frm").submit(function() {
      if ($("#coinPic3").val() == "") {
		$("#coinPic3").addClass("errorInput");
		$('#imgMsg3').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic3Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 4
$("#coinPic4Lnk").click(function() {
  $("#editTD4").toggle();
  });

$("#coinPic4Frm").submit(function() {
      if ($("#coinPic4").val() == "") {
		$("#coinPic4").addClass("errorInput");
		$('#imgMsg4').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic4Btn').val("Uploading...");	  
	  return true;
	  }
});



});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
.imgRow img {width:230px; height:auto;}
.imgRow {height:240px; width:240px; overflow:hidden;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><?php echo $_SESSION['message']; ?></span>

<h1>Unknown <?php echo $coinCategory ?></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="134" rowspan="12" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo '<img src="../img/'.str_replace(' ', '_', $CollectionUnk->getCoinCategory()).'.jpg" width="100" height="100" />'; ?></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo str_replace(' ', '_', $CollectionUnk->getCoinCategory()) ?>.php"><?php echo $CollectionUnk->getCoinCategory() ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="164" class="tdHeight"><span class="darker">Type: </span></td>
<td width="590" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $CollectionUnk->getCoinType()) ?>"><?php echo $CollectionUnk->getCoinType(); ?></a></td>
<td width="22"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Year:</strong></td>
    <td class="tdHeight"><a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear() ?>"><?php echo $CollectionUnk->getCoinYear() ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?>
    
    
    </td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><span class="darker">Purchase Date: </span></td>
    <td class="tdHeight"><?php echo date("F j, Y",strtotime($CollectionUnk->getCoinDate())); ?></td>
    <td></td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Price:</strong></td>
  <td class="tdHeight">$<?php echo $CollectionUnk->getCoinPrice(); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight">&nbsp;</td>
  <td class="tdHeight">&nbsp;</td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
      </td>
    </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center" valign="top"><h3><a href="viewCoinEdit.php?ID=<?php echo $Encryption->encode($unknownCollectionID) ?>">Edit This Coin</a></h3></td>
   <td width="25%" align="center" valign="top"><h3><a href="sellList.php?ID=<?php echo $Encryption->encode($unknownCollectionID); ?>" class="brownLinkBold">Add to Sell List&nbsp;</a> </h3></td>
   <td width="25%" align="center" valign="top"><h3><a href="add<?php echo str_replace(' ', '', $CollectionUnk->getCoinCategory()) ?>.php" class="brownLinkBold">&nbsp;Add Another Unknown <?php echo $coinCategory ?></a></h3></td>
   <td width="25%" align="center" valign="top"><h3><form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">
<input name="Coin" type="hidden" value="<?php echo $Encryption->encode($coinID); ?>" />
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID); ?>" />
<input name="deleteCoinFormBtn" type="submit" value="Delete Coin From Collection" onclick="return confirm('Delete this Coin?')" />
</form></h3></td>
  </tr>
</table>

<hr />
<h3>Additional Details</h3>
<p><?php echo $CollectionUnk->getCoinNote(); ?></p>

<hr />

<h3>Purchase Details</h3>
<?php
$purchaseFrom = $CollectionUnk->getPurchaseFrom();

switch ($purchaseFrom) {
    case 'eBay':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>eBay</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Seller ID: </strong></td>
    <td width="434">'.$CollectionUnk->getEbaySellerID().'</td>
  </tr>
  <tr>
    <td><strong>Auction #:</strong></td>
    <td>'.$CollectionUnk->getAuctionNumber().'</td>
  </tr>
</table>
	 ';
     break;	
	 case 'Coin Shop':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>Coin Shop</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Shop Name: </strong></td>
    <td width="434">'.$CollectionUnk->getShopName().'</td>
  </tr>
  <tr>
    <td><strong>Website:</strong></td>
    <td>'.$CollectionUnk->getShopURL().'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	 ';
     break;	  
	 case 'Coin Show':
     echo '
	 <table width="600" border="0" id="purchaseTbl">
  <tr>
    <td colspan="2"><h3>Coin Shop</h3></td>
    </tr>
  <tr>
    <td width="150"> <strong>Show Name: </strong></td>
    <td width="434">'.$CollectionUnk->getShowName().'</td>
  </tr>
  <tr>
    <td><strong>City:</strong></td>
    <td>'.$CollectionUnk->getShowCity().'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	 ';
     break;	 
	 
	 case 'Mint':
     echo '
<table width="100%" border="0" id="purchaseTbl">
  <tr>
    <td ><h3>'.$CollectionUnk->getPurchaseFrom().'</h3></td>
    </tr>
  <tr>
    <td></td>
  </tr>
  </table>
	 ';
	 break;	 
	 
	 case 'Other':
     echo '
<table width="100%" border="0" id="purchaseTbl">
  <tr>
    <td ><h3>'.$CollectionUnk->getAdditional().'</h3></td>
    </tr>
  <tr>
    <td></td>
  </tr>
  </table>
	 ';
	 break;
    //default:
	case 'None':
        echo 'None';
        break;
}
?>
<p><?php echo $additional; ?></p>
<hr />

<h3>Image Gallery</h3>

<table width="960" border="0">
  <tr align="center">
    <td width="240" class="imgRow"><a href="<?php echo $CollectionUnk->getCoinImage1() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$CollectionUnk->getCoinImage1().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $CollectionUnk->getCoinImage2() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$CollectionUnk->getCoinImage2().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $CollectionUnk->getCoinImage3() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$CollectionUnk->getCoinImage3().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $CollectionUnk->getCoinImage4() ?>" rel="lightbox[coin]" title="<?php echo $collection->getCoinNickname() ?>"><?php echo '<img class="collectionImg" src="'.$CollectionUnk->getCoinImage4().'" class="coinTblImg" />'; ?></a></td>
  </tr>
  <tr align="center">
    <td><a href="javascript:void(0)" id="coinPic1Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic2Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic3Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic4Lnk">Edit</a></td>
  <tr align="center" id="editRow">
    <td><span id="imgMsg1">Upload/Switch:</span> 
    <form id="coinPic1Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
    <input name="coinPic1" id="coinPic1" type="file" />
    <input name="coinPic1Btn" id="coinPic1Btn" type="submit" value="Upload" /></form>
    </td>
    <td><span id="imgMsg2">Upload/Switch: </span>
    <form id="coinPic2Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
    <input name="coinPic2" id="coinPic2" type="file" />
    <input name="coinPic2Btn" id="coinPic2Btn" type="submit" value="Upload" /></form>
    </td>
        <td><span id="imgMsg3">Upload/Switch: </span>
        <form id="coinPic3Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
        <input name="coinPic3" id="coinPic3" type="file" />
        <input name="coinPic3Btn" id="coinPic3Btn" type="submit" value="Upload" /></form>
        </td>
            <td><span id="imgMsg4">Upload/Switch: </span>
            <form id="coinPic4Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
            <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
            <input name="coinPic4" id="coinPic4" type="file" />
            <input name="coinPic4Btn" id="coinPic4Btn" type="submit" value="Upload" /></form>
            </td>
  </tr>
  <tr align="center">
    <td>
    <?php if ($CollectionUnk->getCoinImage1() != '../img/noPic.jpg') {?>
    <form id="coinPic1DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
    <input name="img1RemoveBtn" id="img1RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
    <?php if ($CollectionUnk->getCoinImage2() != '../img/noPic.jpg') {?>
    <form id="coinPic2DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
    <input name="img2RemoveBtn" id="img2RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
  <?php  } else { echo ''; }?>  
  
    </td>
    <td>
        <?php if ($CollectionUnk->getCoinImage3() != '../img/noPic.jpg') {?>
    <form id="coinPic3DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
    <input name="img3RemoveBtn" id="img3RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
        <?php if ($CollectionUnk->getCoinImage4() != '../img/noPic.jpg') {?>
    <form id="coinPic4DeleteFrm" class="compactForm" action="" method="post">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($unknownCollectionID) ?>" />
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