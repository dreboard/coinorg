<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	
$message = '';
if(isset($_GET['ID'])) {  
	$albumID = $Encryption->decode($_GET['ID']); 
	$Album->getAlbumByID($albumID); 
} 

/*$images_dir = '../gallery/'.$albumID.'/';
$thumbs_dir = '../gallery/'.$albumID.'thumbs/';
$thumbs_width = 200;
$images_per_row = 3;*/

$allowed_filetypes = array('.jpg','.gif','.bmp','.png');
$max_filesize = 3145728; 

if (isset($_POST['fileBtn'])) {
$albumID = $Encryption->decode($_POST['ID']);
$imgTitle = trim(mysql_real_escape_string($_POST['imgTitle']));
$imgDescription = strip_tags($_POST['imgDescription']);

if(!empty($_FILES['file']['tmp_name'])){

if($_FILES['file']['size'] > $max_filesize){
	$message = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {

$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory("../album/".$coinClubID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png'));
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$imgURL = '../album/'.$coinClubID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$sql = mysql_query("INSERT INTO albumpics(albumID, imgDescription, imgTitle, imgDate, imgURL, imgName, userID) VALUES('$albumID', '$imgDescription', '$imgTitle', '$theDate', '$imgURL', '".$_FILES['file']['name']."', '$userID')") or die(mysql_error());
}
}
}

if (isset($_POST['picID'])) {
$albumpicID = $Encryption->decode($_POST['picID']);
$Album->deleteImg($albumpicID);
}
if (isset($_POST['albumID'])) {
$albumID = intval($_POST['albumID']);
$Album->deleteAlbum($albumID);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="http://mycoinorganizer.com/scripts/lightbox.css">
<script type="text/javascript" src="http://mycoinorganizer.com/scripts/lightbox.js"></script>
<title><?php echo $Album->getAlbumName(); ?></title>

<script type="text/javascript">
$(document).ready(function(){	
$("#photoForm").submit(function() {
   if ($("#imgTitle").val() == "") {
	$("#imgTitle").addClass("errorInput");
	$("label[for='" + this.id + "']").addClass("errorTxt");
	$("#photoMsg").text("Add A Title...");
	return false;
  }else if ($("#file").val() == "") {
	$("#file").addClass("errorInput");
	$("label[for='" + this.id + "']").addClass("errorTxt");
	$("#photoMsg").text("Select A Photo Please...");
	return false;
  }else {
	  $("#waitPhotoComplete").show();
 $('#photoBtn').val("Changing View Image.....");	  
  return true;
  }
});

});
</script>  


<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
    <h2 class="blueHdrTxt2"><?php echo $Album->getAlbumName(); ?></h2>
<span><?php echo $message; ?></span>
<div id="imgAlbumDiv2">
  <table width="100%">
<tr>
<?php
$i = 1;
$sql = mysql_query("SELECT * FROM albumpics WHERE albumID = '$albumID'") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$albumpicID = intval($row['albumpicID']);
$Album->getAlbumpicByID($albumpicID);

echo '<td width="25%"><a href="'.$Album->getImgURL().'" rel="lightbox[albumImgs]"><img title="'.$Album->getImgTitle().'" class="thumb" src="../'.$Album->getImgURL().'" /><br>
'.$Album->getImgTitle().'</a>
<br>
<form action="" method="post">
<input name="picID" type="hidden" value="'.$Encryption->encode($albumpicID).'">
<input value="Delete" name="deleteImg'.$i.'" type="submit" onclick="return confirm(\'Save this Action?\')">
</form>
</td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
?>
</tr></table>
</div>
<hr>
<h3>Add New Image To Album</h3>
        <form action="" method="post" enctype="multipart/form-data" id="photoForm">
        <table width="100%" border="0">
  <tr>
    <td width="10%"><strong>
      <label for="imgTitle">Title:</label>
    </strong></td>
    <td width="38%"><input name="imgTitle" type="text" id="imgTitle" size="55" maxlength="55"></td>
    <td width="52%" class="errorTxt" id="photoMsg">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="file">Image:</label>
    </strong></td>
    <td><input name="file" type="file"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><strong>
      <label for="imgDescription">Description:</label>
    </strong></td>
    <td><textarea name="imgDescription" id="imgDescription" cols="45" rows="5"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="hidden" name="ID" id="hiddenField" value="<?php echo $Encryption->encode($albumID) ?>"></td>
    <td><input name="fileBtn" type="submit" value="Upload"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
      </form><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


</div>                
</div>
</div>
<?php include("../inc/pageElements/footerClub.php"); ?>
</div><!--End container-->
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>