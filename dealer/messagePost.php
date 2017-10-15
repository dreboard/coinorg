<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_POST['postMessageBtn'])) {
$messageTitle = strip_tags($_POST['messageTitle']);
$message = stripslashes($_POST['message']);
$clientID = '1';

/////// FILE UPLOADED
if($_FILES['file']['tmp_name']) {
$upload = new Upload();
$upload->SetFileName($_FILES['file']['name']);
$upload->SetTempName($_FILES['file']['tmp_name']);
$upload->SetUploadDirectory("../files/");
$upload->SetValidExtensions(array('jpg', 'png', 'gif', 'jpeg', 'txt', 'rtf', 'doc', 'swf', 'flv', 'pdf', 'wps', 'psd', 'doc', 'docx', 'csv', 'xls')); 
$upload->SetMaximumFileSize(3000000); 
$upload->UploadFile();
$fileName = $_FILES['file']['name'];
$fileURL = "../files/" . $_FILES['file']['name'];
$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$fileQuery = mysql_query("INSERT INTO projectfiles(clientID, fileNote, taskID, fileName, fileType, fileDate, fileURL, userID) VALUES('$clientID', '$fileNote', '0', '$fileName', '$ext', '$theDate', '$fileURL', '$userID')")  or die(mysql_error());

$fileID = mysql_insert_id();
$enter = mysql_query("INSERT INTO messages (mailto, messageTitle, messageDate, message, mailFrom, fileID) VALUES ('$value', '$messageTitle', '$theDate', '$message', '$userID', '$fileID')") or die(mysql_error()); 
$messageID = mysql_insert_id();

$_SESSION['message'] = 'File Uploaded';
header("location: index.php");
} else {

///////NO FILE UPLOADED
$enter = mysql_query("INSERT INTO messages (messageTitle, messageDate, message, mailFrom, clientID) VALUES ('$messageTitle', '$theDate', '$message', '$userID', '$clientID')") or die(mysql_error()); 
$messageID = mysql_insert_id();

header("location: index.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Create New Message</title>
<script type="text/javascript">
$(document).ready(function(){	

$("#newMsgForm2").submit(function() {
      if ($("#messageTitle").val() == "") {
        $("#mailMsg").text("Please enter message title...");
		$("#messageTitle").addClass("errorInput");
        return false;
      }else if ($("#message").text() == "") {
        $("#mailMsg").text("Please enter your message...");
		$("#message").addClass("errorInput");
        return false;
      } else {
	 $('#messageFormBtn').val("Sending.....");	  
      return true;
	  }
});	

});
</script>  

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">

<h2>Post Message to Home Page</h2>

<span id="formErrors" class="errorTxt">&nbsp;</span>
<form action="" method="post" enctype="multipart/form-data" id="newMsgForm">
<table width="700" border="0">
  <tr>
    <td class="darker">Message Title:</td>
    <td class="darker"><input name="messageTitle" type="text" id="messageTitle" value="" size="81" /></td>
  </tr>
    
  <tr>
    <td colspan="2">
      <textarea id="message" name="message" class="wysiwyg" cols="50" rows="15"></textarea>    </td>
    </tr>
  
  <tr>
    <td><strong>Attachement:</strong></td>
    <td><input type="file" name="file" id="file" /></td>
  </tr>
  <tr>
    <td width="135">
    <input name="mailFrom" type="hidden" value="<?php echo $userID ?>" />
   <input type="submit" name="postMessageBtn" id="postMessageBtn" value="Post Message" /></td>
    <td width="555"><img src="../img/wait.gif" id="waitComplete" width="220" height="19" alt="wait" /></td>
  </tr>
</table>
</form>
<br class="clear" />


<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>