<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_POST['newTaskFormBtn'])) {

$taskType = mysql_real_escape_string($_POST['taskType']);
$taskName = mysql_real_escape_string($_POST['taskName']);
$assigned = mysql_real_escape_string($_POST['assigned']);
$taskStart = date("Y-m-d",strtotime($_POST["taskStart"]));

if (empty($_POST['taskEnd'])){
$taskEnd = $taskStart;
} else {
$taskEnd = date("Y-m-d",strtotime($_POST["taskEnd"]));
}

$taskDescription = mysql_real_escape_string($_POST['taskDescription']);
$priority = mysql_real_escape_string($_POST['priority']);


$insertTask = mysql_query("INSERT INTO tasks(taskType, taskName, taskStart, taskEnd, taskDescription, priority, addedBy, taskDate, assigned) VALUES ('$taskType', '$taskName', '$taskStart', '$taskEnd', '$taskDescription', '$priority', '$userID', '$theDate', '1')") or die(mysql_error()); 
$taskID = mysql_insert_id();

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
<h1>New Task</h1>
<span id="errorMsg" class="errorTxt">&nbsp;</span>
<form action="" enctype="multipart/form-data" name="newTaskForm" id="newTaskForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="right">Task Type</td>
  <td colspan="3"><select name="taskType" id="taskType">
<option value="None" selected="selected">None</option>
<option value="Web Coding">Web Coding</option>
Web Coding
</select></td>
</tr>
<tr>
<td width="13%" align="right"><label for="taskName" id="taskNameLbl">Task Name</label></td>
<td colspan="3">
<input name="taskName" type="text" id="taskName" size="64" /></td>
</tr>
<tr>
<td align="right"><label for="price" id="priceLbl"></label></td>
<td>Start Date</td>
<td>Due Date</td>
<td>&nbsp;</td>
</tr>
<tr>
  <td align="right">&nbsp;</td>
  <td width="21%"><input name="taskStart" type="text" id="taskStart" size="25" class="showDate" /></td>
  <td width="20%"><input name="taskEnd" type="text" id="taskEnd" size="25" value="" class="showDate" /></td>
  <td width="46%">&nbsp;</td>
</tr>

<tr>
<td align="right" valign="top"><label for="priority" id="priorityLbl">Priority</label></td>
<td colspan="3"><select name="priority" id="priority">
<option value="None" selected="selected">None</option>
<option value="High">High</option>
<option value="Medium">Medium</option>
<option value="Low">Low</option>
</select></td>
</tr>

<tr>
<td align="right" valign="top"><label for="taskDescription" id="taskDescriptionLbl"> Description</label></td>
<td colspan="3">
<textarea name="taskDescription" id="taskDescription" cols="64" rows="5" class="wysiwyg"></textarea></td>
</tr>
<tr>
<td align="right"> File</td>
<td colspan="3"><label>
<input type="file" name="file" id="file" />
</label></td>
</tr>      
<tr>
<td><input name="websiteID" type="hidden" id="websiteID2" size="64" value="1" /></td>
<td colspan="3"><label>
<input type="submit" name="newTaskFormBtn" id="newTaskFormBtn" value="Add This Item Now" />
</label></td>
</tr>
</table>
</form>



<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>