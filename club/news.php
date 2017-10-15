<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	

if (isset($_POST['deleteFileBtn'])) {
$News->deleteNewsItem(intval($_POST['newsID']));
}

if (isset($_POST['newsFormBtn'])) {
$newsTitle = mysql_real_escape_string($_POST['newsTitle']);
$newsDescription = mysql_real_escape_string($_POST['newsDescription']);
$newsType = 'Post';
$sql = mysql_query("INSERT INTO news (coinClubID, newsTitle, newsDescription, newsAddDate) VALUES ('$coinClubID', '$newsTitle', '$newsDescription', '$theDate')") or die(mysql_error());
}

if (isset($_POST['newsLtrBtn'])) {
$newsTitle = mysql_real_escape_string($_POST['newsTitle']);
$newsType = 'Letter';
$newsDescription = 'Club Newsletter';
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory("../album/".$coinClubID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png', 'pdf'));
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$newsURL = '../album/'.$coinClubID."/" . str_replace(' ', '_', $_FILES['file']['name']);

$sql = mysql_query("INSERT INTO news (coinClubID, newsTitle, newsDescription, newsURL, newsType, newsAddDate, fileName) VALUES ('$coinClubID', '$newsTitle', '$newsDescription', '$newsURL', '$newsType', '$theDate', '".str_replace(' ', '_', $_FILES['file']['name'])."')") or die(mysql_error());
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create News Announcement</title>
<?php include("../secureScripts.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	
$(".wysiwyg").htmlarea();
$("#newMsgForm").submit(function() {
      if ($("#newsTitle").val() == "") {
        $("#formErrors").text("Please enter message title...");
		$("#newsTitle").addClass("errorInput");
        return false;
      }else if ($("#newsDescription").text() == "") {
        $("#formErrors").text("Please enter your message...");
		$("#newsDescription").addClass("errorInput");
        return false;
      } else {
	 $('#newsFormBtn').val("Sending.....");	  
      return true;
	  }
});	

});
</script>
<style type="text/css">
#newsDescription {width:100%;}

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
<h2><img src="../siteImg/mailIcon.jpg" width="50" height="50" align="absmiddle"> Create News Announcement</h2>
<span id="formErrors"></span>

<form action="" method="post" enctype="multipart/form-data" name="newMsgForm" id="newMsgForm">
<table width="100%" border="0">
  
  <tr>
    <td width="9%" align="right">Title</td>
    <td colspan="2"><input name="newsTitle" type="text" id="newsTitle" size="65" maxlength="65" /></td>
    </tr>
  <tr>
    <td align="right">Type</td>
    <td colspan="2"><select name="newsType" id="newsType">
    <option value="post">Site Post</option>
    <option value="mail">Mail</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">Description</td>
    <td colspan="2" rowspan="2"><textarea name="newsDescription" id="newsDescription" cols="45" rows="5" class="wysiwyg"></textarea></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">File</td>
    <td colspan="2"><input name="file" type="file"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="76%"><input type="submit" name="newsFormBtn" id="newsFormBtn" value="Save" /></td>
    <td width="15%">&nbsp;</td>
  </tr>
</table>
</form>
<hr />
<h2><img src="../siteImg/newsIcon.jpg" alt="" width="50" height="50" align="absmiddle"> Upload Newsletter</h2>
<form action="" method="post" enctype="multipart/form-data" name="newsLtrForm" id="newsLtrForm">
<table width="100%" border="0">
  
  <tr>
    <td width="9%" align="right">Title</td>
    <td colspan="2"><input name="newsTitle" type="text" id="newsTitle" size="65" maxlength="65" /></td>
    </tr>
  <tr>
    <td align="right">File</td>
    <td colspan="2"><input name="file" type="file"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="76%"><input type="submit" name="newsLtrBtn" id="newsLtrBtn" value="Save" /></td>
    <td width="15%">&nbsp;</td>
  </tr>
</table>
</form>
<hr>

<div id="siteFilesBox" class="roundedWhite">

<span id="formErrors"></span>
<p><strong>Saved Announcements History</strong></p>
<table width="99%" border="0" id="seoDisplayTbl" class="viewSiteTbls">
<thead>
  <tr>
    <td width="676"><strong>Title</strong></td>
    <td width="186"><strong>Posted</strong></td>
    <td width="100" align="center"><strong>Delete</strong></td>
  </tr>
</thead>
<tbody>
<?php
  $result = mysql_query("SELECT * FROM news ORDER BY newsAddDate DESC") or die(mysql_error());
  if(mysql_num_rows($result) == 0){
	  echo "
  <tr class='seoRow'>
    <td colspan='2'>No Announcements Saved</td>
  </tr>
";
  } else
  while($row = mysql_fetch_array($result))
  {
$newsID = intval($row['newsID']);
$newsTitle = strip_tags($row['newsTitle']);
$newsAddDate = strip_tags($row['newsAddDate']);

echo "
  <tr class='seoRow'>
    <td><a href='newsView.php?newsID=".$newsID."'>".$newsTitle."</a></td>
    <td>".$newsAddDate."</td>
    <td align=\"center\"><form action='' method='post'>
	<input name='newsID' type='hidden' value='$newsID' /><input name='deleteFileBtn' type='submit' value='X' onclick=\"return confirm('Delete Article?')\" /></form></td>
  </tr>
";

}
  ?> 
</tbody>
<tfoot>
  <tr>
    <td width="676"><strong>Title</strong></td>
    <td width="186"><strong>Posted</strong></td>
    <td width="100" align="center"><strong>Delete</strong></td>
  </tr>
</tfoot>  
</table>
</div>
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