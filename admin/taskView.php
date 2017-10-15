<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET['taskID'])){
$taskID = intval($_GET['taskID']);

$sql = mysql_query("SELECT * FROM tasks WHERE taskID = '$taskID' LIMIT 1") or die(mysql_error());
$num_rows = mysql_num_rows($sql);

		while($row = mysql_fetch_array($sql))
				  {
				  $taskID = strip_tags($row['taskID']);
				  $taskDate = strip_tags($row['taskDate']);
				  $taskType = strip_tags($row['taskType']);
				  $taskName = strip_tags($row['taskName']);
				  $taskStart = strip_tags($row['taskStart']);
				  $taskEnd = strip_tags($row['taskEnd']);
				  $taskDescription = $General->htmlTagFilter($row['taskDescription']);

 }

}

if (isset($_POST['changeEndDateFormBtn'])) {

$taskEnd = date("Y-m-d",strtotime($_POST["taskEnd"]));
$taskID = mysql_real_escape_string($_POST['taskID']);

$updateQuery = mysql_query("UPDATE tasks SET taskEnd = '$taskEnd' WHERE taskID = '$taskID'") or die(mysql_error());  

$noteQuery = mysql_query("INSERT INTO taskNote(taskID, taskNote, taskNoteDate, userID) VALUES('$taskID', 'Date Changed', '$theDate', '$userID')") or die(mysql_error());

$_SESSION['message'] = 'Update Successful';
header("location: taskView.php?taskID=$taskID");

}


if (isset($_POST['newTaskFormBtn'])) {
$taskID = mysql_real_escape_string($_POST['taskID']);
$taskNote = mysql_real_escape_string($_POST['taskNote']);

$noteQuery = mysql_query("INSERT INTO taskNote(taskID, taskNote, taskNoteDate, userID) VALUES('$taskID', '$taskNote', '$theDate', '$userID')") or die(mysql_error());
header("location: taskView.php?taskID=$taskID");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	
$(".showDate").datepicker();
$(".wysiwyg").htmlarea();

    $("input[type=text]").click(function() {
        $(this).removeClass("errorInput");
    });
    $("input[type=text]").click(function() {
        $(this).removeClass("errorHint");
    });


$("#newTaskForm").submit(function() {
      if ($("#taskName").val() == "") {
		$("#errorMsg").text("Enter Event Name");
		$("label[for='taskName']").addClass("errorTxt");
		$("#taskName").addClass("errorInput");
        return false;
    }else if ($("#taskStart").val() == "") {
	  $("#taskStart").addClass("errorInput");
	  $("#errorMsg").text("Enter Date");
	  $("label[for='taskStart']").addClass("errorTxt");
	  return false;
	}else {
		return true;
		}
});	
	
	
	
});
</script>  

<style type="text/css">

</style>

<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>View Task</h1>
<p><?php echo $taskName ?></p>
<div class="roundedWhite"><table width="100%" border="0" cellpadding="5">

  <tr>
    <td width="129"><strong>Created</strong>:</td>
    <td width="209"><a href="day.php?day=<?php echo $taskStart ?>"><?php echo  $taskDate; ?></a></td>
    <td width="562">&nbsp;</td>
  </tr>
  <tr>
    <td width="129"><strong>Start</strong>:</td>
    <td><a href="day.php?day=<?php echo $taskStart ?>"><?php echo $taskStart; ?></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Due</strong>:</td>
    <td><a href="day.php?day=<?php echo $taskEnd ?>"><?php echo  $taskEnd; ?></a></td>
    <td><form action="" method="post" class="taskForms" id="changeEndDateForm">
    <input name="taskEnd" type="text" id="taskEnd" value="" class="showDate" />
   <input name="taskID" type="hidden" value="<?php echo $taskID ?>" /><input name="websiteID" type="hidden" value="<?php echo $websiteID ?>" />  <input name="taskName" type="hidden" value="<?php echo $taskName ?>" />
<input name="changeEndDateFormBtn" type="submit" value="Change Due Date" onclick="return confirm('Save this Action?')" /> 
</form></td>
  </tr>
    
    <tr>
      <td><strong><a href="tasksEdit.php?taskID=<?php echo $taskID ?>">Edit</a></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><form action="_taskComplete.php" method="post" class="taskForms">
<input name="taskStatus" type="hidden" value="Complete" />
<input name="taskID" type="hidden" value="<?php echo $taskID ?>" />
<input name="taskName" type="hidden" value="<?php echo $taskName ?>" />
<input name="taskCompleteBtn" type="submit" value="Mark This Task Complete" onclick="return confirm('Save this Action?')" />
</form></td>
      </tr>
</table>


<h3>Task Notes</h3>
<form action="" enctype="multipart/form-data" name="newTaskForm" id="newTaskForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="right" valign="top"><label for="taskNote" id="taskNoteLbl"> Description</label></td>
  <td>
  <textarea name="taskNote" id="taskNote" cols="64" rows="3" class="wysiwyg"></textarea></td>
</tr>      
<tr>
<td><input name="taskID" type="hidden" value="<?php echo $taskID ?>" /></td>
<td><label>
<input type="submit" name="newTaskFormBtn" id="newTaskFormBtn" value="Add This Item Now" />
</label></td>
</tr>
</table>
</form>
<br>

<table width="100%" border="0">
  <tr>
    <td width="82%"><strong>Title</strong></td>
    <td width="18%"><strong> Date</strong></td>
  </tr>
  <?php 
  $sql = mysql_query("SELECT * FROM taskNote WHERE taskID = '$taskID' ORDER BY taskID ASC") or die(mysql_error());
while ($row = mysql_fetch_array($sql))
{
	$taskNoteID = $row["taskNoteID"];
	$taskID = $row["taskID"];
	$taskNoteDate = date("m/d/y", strtotime($row["taskNoteDate"]));
	$taskNote = $row["taskNote"];
	$usersID = $row["userID"];
	echo '
	  <tr>
    <td><a href="taskNoteView.php?taskNoteID='.$taskNoteID.'">'.$taskNote.'</a></td>
    <td>'.$taskNoteDate.'</td>
  </tr>
	 ';
	
}
  
  ?>
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
</table>
</div>



<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>