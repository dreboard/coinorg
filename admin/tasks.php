<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET['taskID'])){
$taskID = intval($_GET['taskID']);

$sql = mysql_query("SELECT * FROM tasks WHERE taskID = '$taskID' LIMIT 1") or die(mysql_error());
$num_rows = mysql_num_rows($sql);

		while($row = mysql_fetch_array($sql))
				  {
				  $websiteID = intval($row['websiteID']);
				  $taskID = strip_tags($row['taskID']);
				  $taskDate = strip_tags($row['taskDate']);
				  $taskType = strip_tags($row['taskType']);
				  $taskName = strip_tags($row['taskName']);
				  $taskStart = strip_tags($row['taskStart']);
				  $taskEnd = strip_tags($row['taskEnd']);
				  $taskDescription = noScriptTextReturn($row['taskDescription']);
				  $priority = strip_tags($row['priority']);


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
<h1>View Tasks</h1>
<p><a href="tasksNew.php">Create New Task</a></p>

<table width="100%" border="0" id="taskTbl" class="infoTbl"> 
<thead>
  <tr>
    <td width="80%"><strong>Task</strong></td>
    <td width="20%"><strong>Creation Date</strong></td>
    </tr>
</thead>
<tbody>
<?php 

$pennyQuery = mysql_query("SELECT * FROM tasks WHERE taskStatus = 'Open' ORDER BY taskStart ASC") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $taskID = intval($row['taskID']);
  $taskName = strip_tags($row['taskName']);
  $dayLink = date('Y-m-d', strtotime($row['taskDate']));
  $taskDateDisplay = date('d F Y', strtotime($row['taskDate']));
  $taskStart = date('d F Y', strtotime($row['taskStart']));  
  $taskEnd = date('d F Y', strtotime($row['taskEnd']));
  $taskStatus = strip_tags($row['taskStatus']);
  
 echo '
   <tr>
    <td><a href="taskView.php?taskID='. $taskID.'">'.$General->summary($taskName, $limit=50, $strip = false).'</a></td>
    <td><a href="day.php?day='.$row['taskStart'].'">'.date("m/d/y", strtotime($taskStart)).'</td>
    </tr>
  ';
  }
?>
</tbody>
<tfoot>
<tr>
    <td width="80%"><strong>Task</strong></td>
    <td><strong>Creation Date</strong></td>
    </tr>
</tfoot>
</table>
<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>