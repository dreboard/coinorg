<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	
$errorMsg = '';
/*$images_dir = '../gallery/'.$eventID.'/';
$thumbs_dir = '../gallery/'.$eventID.'thumbs/';
$thumbs_width = 200;
$images_per_row = 3;*/

if (isset($_POST['albumBtn'])) {
$albumName = mysql_real_escape_string($_POST['albumName']);
$albumDescription = strip_tags($_POST['albumDescription']);
$sql = mysql_query("INSERT INTO album(albumName, albumDescription, coinClubID, userID) VALUES('$albumName', '$albumDescription', '$coinClubID', '$userID')") or die(mysql_error()); 
$albumID = mysql_insert_id();
if($sql){
header("location: albumView.php?ID=".$Encryption->encode($albumID)."");
exit();
} else {
	$errorMsg = 'Could Not Create Album';
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../js/lightbox.css">
<script type="text/javascript" src="../js/lightbox.js"></script>
<title>Photo Albums</title>

<script type="text/javascript">
$(document).ready(function(){	

//MEMBER SIGNUP
$("#albumNameForm").submit(function() {
      if ($("#albumName").val() == "") {
        $("#infoMsg").text("Please enter your albums name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#albumName").addClass("errorInput");
        return false;
      }else if ($("#albumDescription").val() == "") {
        $("#infoMsg").text("Please enter album description...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#albumDescription").addClass("errorInput");
        return false;
      } else {
	  return true;
	  }
});	

$("input[type=text], textarea").click(function(){
	  $(this).removeClass("errorInput");
	  $("#infoMsg").empty();
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
});

});
</script>  


<style type="text/css">
#albumDescription {width:100%;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
 <h2 class="blueHdrTxt2"><?php echo $CoinClub->getClubName(); ?></h2>
    <h2 class="blueHdrTxt2"><img src="../siteImg/galleryIcon.jpg" alt="" width="50" height="50" align="absmiddle"> Image Albums</h2>
	<span><?php echo $errorMsg ?></span>
    <div id="galleryListHolder">
 <table width="100%">
<tr>
<?php
$i = 1;
$sql = mysql_query("SELECT * FROM album WHERE coinClubID = '$coinClubID'") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$albumID = intval($row['albumID']);
$Album->getAlbumByID($albumID);
echo '<td width="25%"><a href="albumView.php?ID='.$Encryption->encode($albumID).'"><img title="'.$Album->getAlbumName().'" class="thumb" src="'.$Album->albumFirstPic($albumID).'" /></a><br />
<strong>Images:</strong> '.$Album->getAlbumImgCount($albumID).' <br /><a href="albumView.php?ID='.$Encryption->encode($albumID).'">'.$Album->getAlbumName().'</a></td>'; 
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
<h3>Add Album</h3>
        <form id="albumNameForm" action="" method="post">
        <table width="100%" border="0">
  <tr>
    <td width="8%"><label for="imgTitle">Title:</label></td>
    <td width="47%"><input name="albumName" type="text" id="albumName" size="55" maxlength="55"></td>
    <td width="45%" id="infoMsg" class="errorTxt">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label for="albumDescription">Description:</label></td>
    <td><textarea name="albumDescription" id="albumDescription" cols="45" rows="5"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="albumBtn" type="submit" value="Create"></td>
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