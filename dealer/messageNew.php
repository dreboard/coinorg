<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_POST["messageFormBtn"])) {

	if (is_array($_POST['mailto'])){
	  foreach($_POST["mailto"] as $usersID){
	  $From = $user->getEmail();
	  $Subject = strip_tags($_POST['messageTitle']);
	  $Message = "From: ".$user->getEmail(). "<br />".stripslashes($_POST['message']);
	  
	  $users = new User;
	  $users->getUserById($usersID);
	  $mail->IsSMTP(); // telling the class to use SMTP
	  $mail->Host = "stmp.gmail.com"; // SMTP server
	  $mail->SMTPDebug  = 1;  // enables SMTP debug information (for testing)
	  $mail->SMTPAuth   = true;   // enable SMTP authentication
	  $mail->SMTPSecure = "ssl";  // sets the prefix to the servier
	  $mail->Host = "smtp.gmail.com";  // sets GMAIL as the SMTP server
	  $mail->Port = 465;  // set the SMTP port for the GMAIL server
	  $mail->Username = "outbound@mycoinorganizer.com";  // GMAIL username
	  $mail->Password = "G0ldf!sH987";  // GMAIL password
	  $mail->SetFrom('outbound@mycoinorganizer.com', 'NGF');
	  $mail->AddReplyTo('outbound@mycoinorganizer.com',"NGF");
	  $mail->Subject = $Subject;
	  $mail->Body = $Message;
	  $mail->MsgHTML($Message);
	  $address = $users->getEmail();
	  $mail->AddAddress($address, "NGF");
	  $mail->Send();
	  }
	}
////////////////////////////////////////////////////////////////////	
$message = noScriptText($_POST["message"]);
$messageTitle = mysql_escape_string($_POST["messageTitle"]);
$enter = mysql_query("INSERT INTO messages 
(mailto, messageTitle, messageDate, message, mailFrom) VALUES
('$value', '$messageTitle', '$theDate', '$message', '$userID')") or die(mysql_error()); 
$siteNoteTitle = "Message Sent: ". $messageTitle;
$siteEvent = "Message Sent";
$siteNote = "Message Sent". $messageTitle. " by ". $user->getFirstname();
$noteQuery = mysql_query("INSERT INTO sitenotes(siteEvent, siteNoteTitle, siteEventDate, siteNote, userID, addedDate) VALUES('$siteEvent', '$siteNoteTitle', '$theDate', '$siteNote', '$userID', '$theDate')") or die(mysql_error()); 


$_SESSION['message'] = 'Message Sent';
header("location: messages.php");
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


<h2>New Message</h2>
<span id="mailMsg" class="errorTxt"></span>
<form action="" method="post" enctype="multipart/form-data" id="newMsgForm">
<table width="700" border="0">
  <tr>
    <td class="darker">Message Title:</td>
    <td class="darker"><input name="messageTitle" type="text" id="messageTitle" value="" size="55" /></td>
  </tr>
    <tr>
    <td valign="top" class="darker">To:
      </td>
    <td class="darker">


<table id="GroupTable" cellpadding="3"><tr>
<?php
$i = 1;
$result = mysql_query("SELECT * FROM user WHERE status = 'Active' AND userLevel != 'client'") or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$usersID = $row['userID'];	
echo '<td>'. $lastname . " " .$firstname .'</td><td><input type="checkbox" name="mailto[]" value="' .$usersID . '"></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 3) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
</tr></table>


    </td>
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
   <input type="submit" name="messageFormBtn" id="messageFormBtn" value="Send Message" /></td>
    <td width="555">&nbsp;</td>
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