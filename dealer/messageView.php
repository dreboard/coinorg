<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET["messageID"])) {
$messageID = intval($_GET["messageID"]);
$Message->getMessageById($messageID);
$Message->markRead($messageID);
if(intval($Message->getAttachment()) !== 0){
	$fileLink = '<br /><strong>Attachment</strong> '.$Message->getAttachmentLink($messageID, $Message->getAttachment());
} else {
	$fileLink = '';
}
/*$resultAll = mysql_query("SELECT * FROM messages WHERE messageID = '$messageID'") or die(mysql_error());
while($row2 = mysql_fetch_array($resultAll))
{
$messageDate = strip_tags($row2['messageDate']); 	
$message = noScriptTextReturn($row2['message']);
$status = strip_tags($row2['status']); 

if($row2['status'] == 'Read'){
	$statusView = "";
} else {
$statusView = '<form action="" method="post" class="readMsgForm">
<input name="messageID" type="hidden" value="'.$messageID.'" />
<input name="mailto" type="hidden" value="'.$userID.'" />
<input name="readMsgFormBtn" type="submit" value="Mark As Read" />
</form>';
}
}*/
}

if(isset($_POST["messageReplyBtn"])) {
$reply = noScriptText($_POST["reply"]);
$messageID = intval($_POST["messageID"]);
$Message->markUnRead($messageID);
$mailFrom = mysql_escape_string($_POST["mailFrom"]);
$replyTitle = mysql_escape_string($_POST["replyTitle"]);

$enter = mysql_query("INSERT INTO messagereply (replyTitle, replyDate, reply, mailFrom, messageID) VALUES('$replyTitle', '$theDate', '$reply', '$mailFrom', '$messageID')") or die(mysql_error()); 

$_SESSION['message'] = '(Message Sent)';
header("location: messageView.php?messageID=".$messageID."");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>View Message</title>
<script type="text/javascript">
$(document).ready(function(){	

$("#newMsgForm").submit(function() {
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

<h2><?php echo $Message->getMessageTitle(); ?></h2>

<p>Posted: <?php echo $Message->getMessageDate(); ?> from <?php echo $Message->getMailFrom(); ?></p>
<div><?php echo $Message->getMessage(); ?></div>
<?php echo $fileLink; ?>
<br />
<?php echo $Message->getStatusView($messageID, $userID) ?>
<hr />
<div>

<?php 
$resultAll = mysql_query("SELECT * FROM messagereply WHERE messageID = '$messageID' ORDER BY replyID DESC") or die(mysql_error());
while($row2 = mysql_fetch_array($resultAll))
{
$replyID = intval($row2['replyID']); 
$messageID = intval($row2['messageID']); 
$replyTitle = strip_tags($row2['replyTitle']); 
$replyDate = strip_tags($row2['replyDate']); 
$reply = noScriptTextReturn($row2['reply']);
$mailFrom = intval($row2['mailFrom']);
$users->getUserById($mailFrom);



 echo '<h3>'. $replyTitle.'</h3>
 <span>Posted: '.$replyDate.' from '.$users->getDisplayName(). '</span>
<div>'.$reply.'</div>
';


}
?>

</div>
<p>Reply</p>
<form action="" method="post" id="newMsgForm2">
<table width="700" border="0">
  <tr>
    <td colspan="2" class="darker">Message Title:
      <input type="text" id="replyTitle" name="replyTitle" value="" /></td>
  </tr>
  <tr>
    <td colspan="2">
      <textarea id="reply" name="reply" class="wysiwyg" cols="50" rows="15"></textarea>    </td>

    </tr>
  
  <tr>
    <td width="183">
    <input name="messageID" type="hidden" value="<?php echo $messageID; ?>" />
    <input name="mailFrom" type="hidden" value="<?php echo $userID; ?>" />
    <input type="submit" name="messageReplyBtn" id="messageReplyBtn" value="Send Message" /></td>
    <td width="507"><img src="../images/wait.gif" id="waitComplete" width="220" height="19" alt="wait" /></td>
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