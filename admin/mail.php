<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
error_reporting(0);
$logtime = date("Y-m-d H:i:s");
$mailMonth = date("M");
$mailYear = date("Y");
$message = "";
$mailNote = "";
if (isset($_GET['mailNote'])) {
	// Put stored session variables into local php variable
    $mailNote = $_GET['mailNote'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Mail Home</title>
<script type="text/javascript" src="../scripts/jquery.tablesorter.js"></script>

<script type="text/javascript">
$(document).ready(function(){	
$("#mailPanelTable").tablesorter( {sortList: [[0,0], [3,0]]} ); 


});

function refreshParent(){
	window.location = "mail.php";
}
</script>  


<style type="text/css">
/*MAIL STYLES */
#messageScroller{
	max-height:600px;
	overflow:scroll;
	border:1px solid #000;
	padding:5px;
	min-height: 300px;
}
.headerClass {font-weight:bold;}
#mailLink {text-decoration:none;}
.mailRow{max-width:200px; overflow:hidden;border:1px solid #F0F0F0; white-space:nowrap;}
.mailRow2{max-width:380px; min-width:230px; overflow:hidden;border:1px solid #F0F0F0; white-space:nowrap;}
#mailPanelTable {width:100%; border:1px solid #F0F0F0;}
#mailPanelTable th {text-align:left;}

#mailPageForm {width:240px;}
#mailPageForm label{font-weight: bold;}
#mailPageForm input{width: 200px; margin-bottom: 5px;}
#mailPageForm #message{width: 200px; margin-bottom: 5px; height:250px;}
#mailPageForm select{width: 200px; margin-bottom: 5px;}
#mailPageForm legend{font-weight: bold;}

#searchMailAddressForm {width:240px;}
#searchMailAddressForm label{font-weight: bold;}
#searchMailAddressForm input{width: 200px; margin-bottom: 5px;}
#searchMailAddressForm #message{width: 200px; margin-bottom: 5px; height:250px;}
#searchMailAddressForm select{width: 200px; margin-bottom: 5px;}
#searchMailAddressForm legend{font-weight: bold;}

#searchMailMonthForm {width:240px;}
#searchMailMonthForm label{font-weight: bold;}
#searchMailMonthForm input{width: 200px; margin-bottom: 5px;}
#searchMailMonthForm #message{width: 200px; margin-bottom: 5px; height:250px;}
#searchMailMonthForm select{width: 200px; margin-bottom: 5px;}
#searchMailMonthForm legend{font-weight: bold;}

#searchBookForm {width:240px;}
#searchBookForm label{font-weight: bold;}
#searchBookForm input{width: 200px; margin-bottom: 5px;}
#searchBookForm #message{width: 200px; margin-bottom: 5px; height:250px;}
#searchBookForm select{width: 200px; margin-bottom: 5px;}
#searchBookForm legend{font-weight: bold;}


#mailForm {width:750px;}
#mailForm legend {font-weight: bold; margin-bottom:5px;}
#mailForm label{ float: left; width: 130px; font-weight: bold;}
#mailForm input, textarea{width: 200px; margin-bottom: 5px;}
#mailForm select {width: 200px; margin-bottom: 5px;}
#right {float:left; padding:15px;}
#left {float:left; padding:15px; min-height:250px;}

#panelMailForm {width:97%; height:100%;}
#panelMailForm label{ float: left; width: 40px; font-weight: bold;}
#panelMailForm #addAddress {width:500px;}
#panelMailForm #to {width:80%;}
#panelMailForm #title {width:80%;}
#panelMailForm, #mailArea {width:100%;}

#readMailForm {width:97%; height:100%; margin-bottom:0px; padding-bottom:0px;}
#readMailForm label{ float: left; width: 80px; font-weight: bold;}
#readMailForm #replyMail {width:450px;}
#readMailForm #to {width:80%;}
#readMailForm #replySubject {width:80%;}
#readMailForm, #replyMessage {width:100%;}

#readSavedMailForm {width:97%; height:100%; margin-bottom:0px; padding-bottom:0px;}
#readSavedMailForm label{ float: left; width: 80px; font-weight: bold;}
#readSavedMailForm #mailAddress {width:80%;}
#readSavedMailForm #subject {width:80%;}
#readSavedMailForm, #message {width:100%;}

#saveMailForm {padding:0px; margin:0px;}
#saveMailForm #message {padding:0px; margin:0px; display:none; margin-bottom:12px;}


#clear {width:60px;}
.innerBox5 {padding:2px 5px; background-image:url(../img/boxbody.png); background-position:bottom; background-repeat:repeat-x; min-height:350px; background-color:#fff; margin:5px auto; width:98%;}

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Mail Home</h1>

<div id="messageScroller"> 

<?php
$mailboxName = "admin@mycoinorganizer.com";
$host= '{secure140.sgcpanel.com/imap/ssl}INBOX';
$user='admin@mycoinorganizer.com';
$pass='ab198900';

$mail=@imap_open($host,$user,$pass) or die("Can't connect: " . imap_last_error());
$sorted = imap_sort($mail, SORTDATE, 1);
if($_REQUEST['delete']) {
    $number=$_REQUEST['delete'];
    imap_delete($mail,$number);
    imap_expunge($mail);
}

if($_REQUEST['see']) {
    $number=$_REQUEST['see'];
	$mailHeader = imap_headerinfo($mail, $number);
	$mailDate = date("Y-m-d H:i:s", $mailHeader->udate);
	$body = imap_fetchbody($mail, $number, "1.1");
     if ($body == "") {
    $body = imap_fetchbody($mail, $number, "1");
}

$body = trim(substr(quoted_printable_decode($body), 0, 3000)); 
	$theSender = $mailHeader->from;
	foreach ($theSender as $id => $object) {
    $fromname = $object->personal;
    $fromaddress = $object->mailbox . "@" . $object->host;
}
	$replySubject = $mailHeader->subject;
	?>
<form method="post" name="readMailForm" id="readMailForm" action="mailScripts.php">
<label for="replyMail">From:</label>
<input type="text" name='replyMail'  id="replyMail" value='<?php echo $fromaddress; ?>' />
<a href='javascript:history.back()'>Back To Inbox</a> | <?php echo "<a href='mail.php?delete=$number'>Delete</a>"; ?><br>
<label for="replySubject">Subject:</label><input type="text" name="replySubject" id="replySubject" value="<?php echo $replySubject; ?>" /><p>
<textarea name='replyMessage' rows="12" id="replyMessage"><?php echo $body; ?>
</textarea><p>
<input name="replyTo" type="hidden" value="1" />
<input type="submit" name='readMailFormBtn'  value='Reply' onclick='this.value="Sending Reply...";return true' /><br />
<input name="date" type="hidden" value="" />
<input type="button" value="Back to Inbox" onclick="refreshParent();" />
</form>
<form action="mailScripts.php" method="post" name="saveMailForm" id="saveMailForm">
<input type="submit" name='saveMailFormBtn'  value='Save Message' onclick='this.value="Saving...";return true' />
<input name="replySubject" type="hidden" value="<?php echo $replySubject; ?>" />
<input name="mailAddress" type="hidden" value="<?php echo $fromaddress; ?>" />
<input name="mailDate" type="hidden" value="<?php echo $mailDate; ?>" />
<input name="saveMail" type="hidden" value="1" />
<textarea name="message" id="message" ><?php echo strip_tags($body) ?>"</textarea>
</form>
<?php
    echo "<a href='javascript:history.back()'>Back to Inbox</a>";
    echo "<br /><a href='mail.php?delete=$number'>Delete</a>";
  
} else {
    if($_REQUEST['create']=="new") {
	  if($_POST['send_m']) {
$mailboxName = "admin@mycoinorganizer.com";
$host= '{secure140.sgcpanel.com/imap/ssl}INBOX';
$user='admin+mycoinorganizer.com';
$pass='ab198900';
$mail=@imap_open($host,$user,$pass) or die("Can't connect: " . imap_last_error());
   $to = $_POST['to'];
   $subject = $_POST['title'];
   $from = "admin@mycoinorganizer.com";
   // generate a random string to be used as the boundary marker
   $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
   // store the file information to variables for easier access
   $tmp_name = $_FILES['filename']['tmp_name'];
   $type = $_FILES['filename']['type'];
   $name = $_FILES['filename']['name'];
   $size = $_FILES['filename']['size'];
   // here we'll hard code a text message
   // again, in reality, you'll normally get this from the form submission
   $message = $_POST['mail'];
   // if the upload succeded, the file will exist
   if (file_exists($tmp_name)){
      // check to make sure that it is an uploaded file and not a system file
      if(is_uploaded_file($tmp_name)){
         // open the file for a binary read
         $file = fopen($tmp_name,'rb');
         // read the file content into a variable
         $data = fread($file,filesize($tmp_name));
         // close the file
         fclose($file);
         // now we encode it and split it into acceptable length lines
         $data = chunk_split(base64_encode($data));
     }
      // now we'll build the message headers
      $headers = "From: $from\r\n" .
         "MIME-Version: 1.0\r\n" .
         "Content-Type: multipart/mixed;\r\n" .
         " boundary=\"{$mime_boundary}\"";
      $message = "This is a multi-part message in MIME format.\n\n" .
         "--{$mime_boundary}\n" .
         "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
         "Content-Transfer-Encoding: 7bit\n\n" .
         $message . "\n\n";
      $message .= "--{$mime_boundary}\n" .
         "Content-Type: {$type};\n" .
         " name=\"{$name}\"\n" .
         "Content-Transfer-Encoding: base64\n\n" .
         $data . "\n\n" .
         "--{$mime_boundary}--\n";
      if (imap_mail($to, $subject, $message, $headers))
         echo "Message Sent";
      else
         echo "Failed to send";
   }
}
?>
<form method="post" name="panelMailForm" id="panelMailForm" action="" enctype="multipart/form-data">
<select name='addAddress' id='addAddress' onchange="UpdateAddress(this.selectedIndex);"><?php echo $mailNote; ?>
<option value='' selected="selected">Select Address</option>
<?php 
$result = mysql_query('SELECT * FROM contacts ORDER BY email ASC') or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $email = $row['email'];
  $last = $row['last'];
  $first = $row['first'];
  $wholeName = $last . ", " . $first;
echo "<option value='$email'>$wholeName&nbsp;&lt;$email&gt;</option>";
  }
?>
</select><br />
<label for="to">To: </label><input type="text" name="to" id="to" value="<?php if(isset($email)){echo $email;}?>" /><input name="clear" id="clear" type="button" value="Clear" onclick="clearTo();" /><br />
<label for="title">Title:</label><input type="text" name="title" id="title" /><br />
<label for='filename'>Attach:</label>
<input type="file" name="filename" />
<textarea name='mail' rows="12" id="mailArea">
</textarea>
<input type="submit" name='send_m'  value='Send' onclick='this.value="Sending...";return true' /><br />
<input type="button" value="Back to Inbox" onclick="refreshParent();" />
</form>
    <?php
    } else {
        $mails=imap_num_msg($mail);
        echo "<span class='headerClass'>" . $mailboxName . "</span>";
        if($mails==0) {
            echo "<i>no mails.</i>";
        } else {       
            echo " has <span class='headerClass'>$mails</span> e-mails in the inbox | <a href='mail.php?create=new'>Compose New mail</a><br /><br />";
			echo "<table id='mailPanelTable' width='550' border='0' cellspacing='0' cellpadding='0' class='tablesorter'>
			<thead><tr>
			<th>From</th>
			<th>Subject</th>
			<th>Date</th>
			</tr></thead><tbody> ";
            for ($i=0; $i<count($sorted); $i++) {
   				$mailHeader = imap_header($mail, $sorted[$i]);
				$date = date("m-d-Y H:i:s", $mailHeader->udate);  
				$mid=ltrim($mailHeader->Msgno);
				$fromaddress = $mailHeader->fromaddress; 
				$subject = $mailHeader->subject; 
                echo "<tr>
				<td width='25%'><div class='mailRow'>$fromaddress</div>&nbsp;</td>
				<td width='50%'><div class='mailRow2'><a id='mailLink' href='mail.php?see=$mid'>$subject</a></div>&nbsp;</td>
				<td width='25%'><div class='mailRow'>$date</div>&nbsp;</td></tr>";
            }
        }
        //echo "<p><a href='mail.php?create=new'>New mail</a><p>";
		echo "</tbody></table>";
    }
}
imap_close($mail);
?>

</div>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>