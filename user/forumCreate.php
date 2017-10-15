<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


/*
if(isset($_POST["createTopicBtn"])){
$questionID = '10';
$folderName = "../forum/".$questionID."/";
$coinCategory = 'Small Cent';
if ( !file_exists($folderName) ) {
mkdir($folderName, 0777);
}

if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = 'Image is Too Large Max 3 mb';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($folderName);
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$imgURL = $folderName. str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("INSERT INTO forum_gallery (questionID, imgURL, userID, imgDate) VALUES ('$questionID', '$imgURL', '$userID', '$theDate')") or die(mysql_error()); 
}
}
if($fileQuery){
	echo 'File Saved';
} else {
	echo 'File Not Saved';
}
}
*/



if(isset($_POST["createTopicBtn"])){

if($_POST['topic'] == '') {
	$_SESSION['errorMsg'] = 'Please Enter A Question';
} else {
	
$topic = mysql_real_escape_string($_POST['topic']);
$detail = mysql_real_escape_string(nl2br($_POST['detail']));
$datetime = date("Y-m-d H:i:s"); 
$coinCategory = mysql_real_escape_string($_POST['coinCategory']);

$sql = mysql_query("INSERT INTO forum_question(topic, detail, userID, datetime, coinCategory)VALUES('$topic', '$detail', '$userID', '$datetime', '$coinCategory')");
$questionID = mysql_insert_id();


if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = 'Image is Too Large Max 3 mb';
}	 else {

$folderName = "../forum/".$questionID."/";
if ( !file_exists($folderName) ) {
mkdir($folderName, 0777);

$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($folderName);
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$imgURL = $folderName. str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("INSERT INTO forum_gallery (questionID, imgURL, userID, imgDate) VALUES ('$questionID', '$imgURL', '$userID', '$theDate')") or die(mysql_error()); 
}
}
}
if($sql){
header("location: forumViewTopic.php?ID=".$Encryption->encode($questionID)." ");

}
else {
$_SESSION['errorMsg'] = "Question Not Saved";
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Post New Question</title>
 <script type="text/javascript">
$(document).ready(function(){	
$(".question2").htmlarea({
    // Override/Specify the Toolbar buttons to show
    toolbar: [
["html"],
["bold", "italic", "underline"], 
["orderedlist", "unorderedlist"],
["indent", "outdent"],
["justifyleft", "justifycenter", "justifyright", "horizontalrule"],
["p", "h1", "h2", "h3", "h4", "h5", "h6"],
["cut", "copy", "paste"]
]
});  


//ADD MINT BAG FORM
$("#createTopicForm").submit(function() {
      if($("#topic").val() == "")  {
		$("#topicLbl").addClass("errorTxt");
		$("#errorMsg").text("Name Your Topic");
		
		$("#topic").addClass("errorInput");
      return false;
      } else {
		  $("#createTopicBtn").prop('value', 'Saving Question...');
	  return true;
	  }
});


});
</script> 
<style type="text/css">
#detail {width:99%;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<br />
<table width="100%" border="0">
  <tr>
    <td><a href="forumMain.php" class="brownLink"><strong>Back to main forum</strong></a><strong>&nbsp;</strong></td>
    <td>&nbsp;</td>
    <td align="right">    <form id="searchForumForm" name="searchForumForm" method="post" action="forumSearch.php" class="compactForm">
        <span>Search Forum: </span>
        <input name="search" id="search" type="text" />
        <input name="searchForumBtn" id="searchForumBtn" type="submit" value="Search" />
      </form></td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form action="" method="post" enctype="multipart/form-data" name="createTopicForm" id="createTopicForm">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="2" bgcolor="#E6E6E6"><strong>Post Question to Forum</strong> </td>
</tr>
<tr>
  <td colspan="2" class="errorTxt" id="errorMsg"><?php echo $_SESSION['errorMsg']; ?></td>
  </tr>
<tr>
<td><label for="topic" id="topicLbl">Title</label></td>
<td width="84%"><input name="topic" type="text" id="topic" size="100" /></td>
</tr>
<tr>
<td valign="top"><label for="detail">Question</label></td>
<td><textarea name="detail" cols="50" rows="7" id="detail" class="question"></textarea></td>
</tr>

<tr>
<td><label for="coinCategory">Category</label></td>
<td>
  <select name="coinCategory" id="coinCategory">
  <option value="General" selected="selected">General</option>
  <option value="Half Cent">Half Cents</option>
  <option value="Large Cent">Large Cents</option>
  <option value="Small Cent">Small Cents</option>
  <option value="Two Cent">Two Cents</option>
  <option value="Three Cent">Three Cents</option>
  <option value="Half Dime">Half Dimes</option>
  <option value="Nickel">Nickels</option>
  <option value="Dime">Dimes</option>
  <option value="Twenty Cent">Twenty Cents</option>
  <option value="Quarter">Quarters</option>
  <option value="Half Dollar">Half Dollars</option>
  <option value="Dollar">Dollars</option>
  <option value="Commemorative">Commemoratives</option>
  <option value="Gold">Gold</option>
  <option value="Platinum">Platinum</option>
  <option value="Silver Eagle">Silver Eagles</option>
  </select>
  
</td>
</tr>
<tr>
  <td><label for="file">Image</label></td>
  <td><input type="file" name="file" id="file" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="createTopicBtn" id="createTopicBtn" value="Create Topic" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<h3>My Recent Posts</h3>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="14%" align="center" bgcolor="#E6E6E6"><strong>Category</strong></td>
<td width="60%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="7%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Posted</strong></td>
</tr>

<?php
 
$sql = mysql_query("SELECT * FROM forum_question WHERE userID = '$userID' ORDER BY questionID DESC LIMIT 5") or die(mysql_error()); 

if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
<td width="14%" align="center">&nbsp;</td>
<td width="60%">You dont have any forum posts</td>
<td width="7%" align="center">&nbsp;</td>
<td width="6%" align="center">&nbsp;</td>
<td width="13%">&nbsp;</td>		  
</tr>  ';
} else {
while($rows = mysql_fetch_array($sql)){ 
$questionID = intval($rows['questionID']);
$Forum->forumQuestionByID($questionID);

echo '
<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory='.str_replace(' ', '_', $Forum->getTopicCategory()).'">'.$Forum->getTopicCategory().'</a></td>
<td bgcolor="#FFFFFF"><a href="forumViewTopic.php?ID='.$Encryption->encode(intval($rows['questionID'])).'">'.$rows['topic'].'</a></td>
<td align="center" bgcolor="#FFFFFF">'.$rows['view'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['reply'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['datetime'].'</td>
</tr>';
}
}
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="forumCreate.php"><strong>Create New Topic</strong> </a></td>
</tr>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>