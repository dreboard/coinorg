<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_POST["readMsgFormBtn"])){
$mailto = mysql_escape_string($_POST["mailto"]);
$messageID = mysql_escape_string($_POST["messageID"]);
$result = mysql_query("UPDATE messages SET status = 'Read' WHERE mailto = '$userID' AND  messageID = '$messageID'") or die(mysql_error()); 
}
if (isset($_POST["markAllBtn"])){
$mailto = mysql_escape_string($_POST["mailto"]);
$result = mysql_query("UPDATE messages SET status = 'Read' WHERE mailto = '$userID'") or die(mysql_error()); 
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

$('#msgDisplayTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 50
} );

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

<h2>Sent Messages</h2>
<table width="100%" border="0" id="msgDisplayTbl">
<thead>
  <tr>
    <td width="37%"><strong>Subject</strong></td>
    <td width="18%"><strong>Date</strong></td>
    <td width="19%"><strong>To</strong></td>
    </tr>
</thead>
<tbody>
<?php 
$sentAll = mysql_query("SELECT * FROM messages WHERE mailFrom = '$userID'") or die(mysql_error());
$sent_rows = mysql_num_rows($sentAll);
if($sent_rows == 0){
	 echo '
   <tr>
    <td class="greenLink">No Sent Messages</td>
    <td></td>
    <td></td>
  </tr>
';
} else {
while($row2 = mysql_fetch_array($sentAll))
{
$messageID = intval($row2['messageID']); 
$messageDate = strip_tags($row2['messageDate']); 
$messageTitle = strip_tags($row2['messageTitle']);
$users->getUserById($row2['mailto']);

 echo '
   <tr>
    <td><a href="messageView.php?messageID='.$messageID.'">'.summary($messageTitle, $limit=50, $strip = false).'</a></td>
    <td>'.$messageDate.'</td>
    <td>'. $users->getDisplayName() .'</td>
  </tr>
';
}
}
?>
</tbody>
<tfoot>
  <tr>
    <td width="37%"><strong>Subject</strong></td>
    <td width="18%"><strong>Date</strong></td>
    <td width="19%"><strong>To</strong></td>
  </tr>
</tfoot>
</table>

<br class="clear" />


<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>