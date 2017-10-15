<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_POST["readMsgFormBtn"])){
$messageID = mysql_escape_string($_POST["messageID"]);
$result = mysql_query("UPDATE messages SET status = 'Read' WHERE mailto = '$userID' AND  messageID = '$messageID'") or die(mysql_error()); 
}
if (isset($_POST["markAllBtn"])){
$result = mysql_query("UPDATE messages SET status = 'Read' WHERE mailto = '$userID'") or die(mysql_error()); 
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>My Messages</title>
<script type="text/javascript">
$(document).ready(function(){	
$('#msgDisplayTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 10
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
<h2>My Messages (<?php echo $read_rows ?> Unread)</h2>

<form action="" method="post">
<input name="mailto" type="hidden" value="<?php echo $userID ?>" />
<input name="markAllBtn" type="submit" value="Mark All As Read" />
</form><br />
<table width="100%" border="0" id="msgDisplayTbl">
<thead>
  <tr>
    <td width="37%"><strong>Subject</strong></td>
    <td width="18%"><strong>Date</strong></td>
    <td width="19%"><strong>From</strong></td>
    <td width="15%"><strong>Status</strong></td>
    <td width="11%">&nbsp;</td>    
    </tr>
</thead>
<tbody>
<?php 
$resultAll = mysql_query("SELECT * FROM messages WHERE mailto = '$userID' ORDER BY messageID DESC ") or die(mysql_error());
while($row2 = mysql_fetch_array($resultAll))
{
$messageID = intval($row2['messageID']); 
$mailFrom = intval($row2['mailFrom']); 

$users->getUserById($mailFrom);

$messageDate = strip_tags($row2['messageDate']); 
$messageTitle = strip_tags($row2['messageTitle']);
$status = $row2['status'];

if($row2['status'] == 'Read'){
	$statusView = "";
} else {
$statusView = '<form action="" method="post" class="readMsgForm">
<input name="messageID" type="hidden" value="'.$messageID.'" />
<input name="mailto" type="hidden" value="'.$userID.'" />
<input name="readMsgFormBtn" type="submit" value="Mark As Read" />
</form>';
} 


 echo '
   <tr>
    <td><a class="greenLink" href="messageView.php?messageID='.$messageID.'">'.summary($messageTitle, $limit=50, $strip = false).'</a></td>
    <td>'.$messageDate.'</td>
    <td>'. $users->getDisplayName() .'</td>
	<td>'.$status.'</td>
	<td>'.$statusView.'</td>
  </tr>
 
 
';
}
?>
</tbody>
<tfoot>
  <tr>
    <td width="37%"><strong>Subject</strong></td>
    <td width="18%"><strong>Date</strong></td>
    <td width="19%"><strong>From</strong></td>
    <td width="15%"><strong>Status</strong></td>
    <td width="11%">&nbsp;</td>        
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