<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

if (isset($_POST["saveNoteBtn"])) { 

if($_POST['noteTitle'] == '') {
	$_SESSION['errorMsg'] = 'Please Enter A Title';
} else {

$noteTitle = mysql_real_escape_string($_POST["noteTitle"]);
$note = mysql_real_escape_string($_POST["note"]);

mysql_query("INSERT INTO notes(noteTitle, note, noteDate, userID) VALUES('$noteTitle', '$note', '$theDate', '$userID')") or die(mysql_error()); 	
$noteID = mysql_insert_id();

header("location: dealerNote.php?ID=".$Encryption->encode($noteID)."");

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
$('#notepad').focus();
$("textarea").htmlarea();

$("#addCoinForm").submit(function() {
      if($("#noteTitle").val() == "")  {
		$("#noteTitleLbl").addClass("errorTxt.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#noteTitle").addClass("errorTxt");
      return false;
      } else {
		  $("#saveNoteBtn").prop('value', ' Saving Note... ');
	  return true;
	  }
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

<h1>My Dealer Notepad</h1>
<table width="100%" border="0">
  <tr>
    <td width="16%"><h3><a href="dealerClients.php">Clients</a></h3></td>
    <td width="16%"><h3><a href="delaerShows.php">Shows</a></h3></td>
    <td width="16%"><h3><a href="dealerCalendar.php">Calendar</a></h3></td>
    <td width="16%"><h3><a href="dealerInventory.php">Inventory</a></h3></td>
    <td width="16%"><h3><a href="dealerFinance.php">Finance</a></h3></td>
    <td><h3><a href="dealerNotes.php">Notebook</a></h3></td>
  </tr>
</table>
<hr />

<table width="100%" border="0">
  <tr>
    <td width="10%"><span class="darker" id="waitMsg">Load Note:</span></td>
    <td width="90%"><form class="compactForm">
      <select id="noteLoader" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <?php 
  	$sql = mysql_query("SELECT * FROM notes WHERE userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	  echo '<option value="" selected="selected">No Saved Notes</option>';
} else {
	echo '<option value="" selected="selected">Select Note</option>';
		while($row = mysql_fetch_array($sql))
		{
			echo '<option value="dealerNote.php?ID='.$Encryption->encode(intval($row['noteID'])).'">'.strip_tags($row['noteTitle']).'</option>';
		}
}
  ?>        
      
      </select>
    </form></td>
  </tr>
</table>

<form action="" method="post" id="notesForm">
<table width="100%" border="0">
  <tr>
    <td width="12%"><label for="noteTitle" id="noteTitleLbl">Note Title:</label></td>
    <td width="88%">
      <input name="noteTitle" type="text" id="noteTitle" value="<?php if(isset($_POST["noteTitle"])){echo $_POST["noteTitle"];} else {echo "";}?>" size="70" /></td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="note" class="wysiwyg" id="notepad" rows="75">
    <?php if(isset($_POST["note"])){echo $_POST["note"];} else {echo "";}?>
    </textarea></td>
  </tr>
  <tr valign="middle">
    <td height="50">
    <input name="saveNoteBtn" id="saveNoteBtn" type="submit" value=" Save Note " />
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