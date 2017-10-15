<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

if (isset($_POST["newNoteBtn"])) { 

if($_POST['noteTitle'] == '') {
	$_SESSION['errorMsg'] = 'Please Enter A Title';
} else {

$noteTitle = mysql_real_escape_string($_POST["noteTitle"]);
$note = mysql_real_escape_string($_POST["note"]);

mysql_query("INSERT INTO notes(noteTitle, note, noteDate, userID) VALUES('$noteTitle', '$note', '$theDate', '$userID')") or die(mysql_error()); 	
$noteID = mysql_insert_id();

header("location: userNote.php?ID=".$Encryption->encode($noteID)."");

}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>New Dealer Notes</title>
 <script type="text/javascript">
$(document).ready(function(){	
$("textarea").htmlarea();

$("#notesForm").submit(function() {
      if($("#noteTitle").val() == "")  {
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#noteTitle").addClass("errorTxt");
      return false;
      } else {
		  $("#newNoteBtn").prop('value', ' Saving Note... ');
	  return true;
	  }
});
$("#noteReset").click(function() {
$('#notepad').htmlarea("html", "  ");
$('#notepad').focus();
});
});
</script> 
<style type="text/css">
#notepad {width:99%; height:600px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="http://mycoinorganizer.com/siteImg/notebook1.jpg" width="50" height="50" align="absmiddle" /> New Note</h1>
<table width="100%" border="0" id="userToolsTbl">
  <tr>
    <td width="25%"><h3><a href="userCalendar.php">Calendar</a></h3></td>
    <td width="25%"><h3><a href="userSupply.php">Supplies</a></h3></td>
    <td width="25%"><h3><a href="userTodo.php">My Tasks</a></h3></td>
    <td width="25%"><h3><a href="userNotes.php">Notebook</a></h3></td>
  </tr>
</table>
<hr />

<form action="" method="post" id="notesForm">
<table width="100%" border="0">
  <tr>
    <td width="12%"><label for="noteTitle" id="noteTitleLbl">Note Title:</label></td>
    <td width="88%">
      <input name="noteTitle" type="text" id="noteTitle" value="<?php if(isset($_POST["noteTitle"])){echo $_POST["noteTitle"];} else {echo "";}?>" size="70" /><input type="reset" name="noteReset" id="noteReset" value="Clear Note" /></td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="note" class="wysiwyg" id="notepad" rows="75">
    <?php if(isset($_POST["note"])){echo $_POST["note"];} else {echo "";}?>
    </textarea></td>
  </tr>
  <tr valign="middle">
    <td height="50">
    <input name="newNoteBtn" id="newNoteBtn" type="submit" value=" Save Note " />
    </td>
    <td height="50" id="endErrorMsg">&nbsp;</td>
  </tr>
</table>

</form>

<br />



<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>