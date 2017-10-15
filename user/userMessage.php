<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$mailto = $Encryption->decode($_GET['ID']);
$SiteUser = new User();
$SiteUser->getUserById($mailto);
}


if(isset($_POST["sendMsgBtn"])){

if($_POST['messageTitle'] == '') {
	$_SESSION['errorMsg'] = 'Please Enter A Subject';
} else {
	
$messageTitle = mysql_real_escape_string($_POST['messageTitle']);
$message = mysql_real_escape_string(nl2br($_POST['message']));
$datetime = date("Y-m-d H:i:s"); 

$mailto = $Encryption->decode($_POST['mailto']);
$User2 = new User();
$User2->getUserById($mailto);



$sql = mysql_query("INSERT INTO messages(topic, mailFrom, userID, messageDate, messageTitle, message)VALUES('$mailto', '$userID', '$userID', '$datetime', '$messageTitle', '$message')") or die(mysql_error()); 
$messageID = mysql_insert_id();
//go to user messages under new tab with calendar and notes.....
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Send User Message</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );

$("#sendMsgForm").submit(function() {
      if($("#messageTitle").val() == "")  {
		$("#messageTitleLbl").addClass("errorTxt");
		$("#errorMsg").text("Enter A Subject");
		$("#messageTitle").addClass("errorInput");
      return false;
      } else {
		  $("#sendMsgBtn").prop('value', 'Sending.....');
	  return true;
	  }
});


});
</script> 
<style type="text/css">
#message {width:99%;}

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>Send User Message</h1>
<p>To: </p>

<form action="" method="post" id="sendMsgForm">
<table width="100%" border="0">
  <tr>
    <td width="13%"><label for="messageTitle" id="messageTitleLbl">Title</label></td>
    <td width="51%"><input name="messageTitle" type="text" id="messageTitle" size="80" /></td>
    <td colspan="2" id="errorMsg" class="errorTxt"><?php echo $_SESSION['errorMsg']; ?></td>
    </tr>
  <tr>
    <td valign="top"><label for="message" id="messageLbl">Message</label></td>
    <td colspan="3">
    <textarea name="message" rows="11" id="message"></textarea>
    </td>
    </tr>
    <tr>
    <td>
    <input name="mailto" type="hidden" value="<?php echo $_GET['ID'] ?>" />
    <input type="submit" name="sendMsgBtn" id="sendMsgBtn" value="Send Message" /></td>
    <td>&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
  </tr>
</table>
</form>
<br />
<hr />

<br />




<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>