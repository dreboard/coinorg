<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_POST["createTopicBtn"])){
$topic = mysql_real_escape_string($_POST['topic']);
$detail = mysql_real_escape_string($_POST['detail']);
$datetime = date("Y-m-d H:i:s"); 
$coinCategory = mysql_real_escape_string($_POST['coinCategory']);

$sql = mysql_query("INSERT INTO forum_question(topic, detail, userID, datetime, coinCategory)VALUES('$topic', '$detail', '$userID', '$datetime', '$coinCategory')");
$questionID = mysql_insert_id();

if(!empty($_FILES['file']['tmp_name'])){
  $upload = new Upload();
  $upload->SetFileName(str_replace(' ', '_', strtolower($_FILES['file']['name'])));
  $upload->SetTempName($_FILES['file']['tmp_name']);
  $upload->SetUploadDirectory("forumImg/");
  $upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
  $upload->SetMaximumFileSize(3000000); 
  
  $upload->UploadFile();
  $imageURL = "forumImg/" . $_FILES['file']['name'];
  $Forum->setImgURL($imageURL, $questionID);

}


if($sql){
header("location: forumViewTopic.php?questionID=$questionID");

}
else {
echo "ERROR";
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
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
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

<p><a href="forumMain.php">Back to main forum</a> | <a href="forumCreate.php"><strong>Post New Question</strong> </a></p>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="2" bgcolor="#E6E6E6"><strong>Post Question to Forum</strong> </td>
</tr>
<tr>
<td><strong>Title</strong></td>
<td width="84%"><input name="topic" type="text" id="topic" size="100" /></td>
</tr>
<tr>
<td valign="top"><strong>Question</strong></td>
<td><textarea name="detail" cols="50" rows="7" id="detail" class="wysiwyg"></textarea></td>
</tr>

<tr>
<td><strong>Category</strong></td>
<td>
  <select name="coinCategory">
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
  <td><strong>Image</strong></td>
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
 
$sql = mysql_query("SELECT * FROM forum_question WHERE userID = '6' ORDER BY questionID DESC LIMIT 5") or die(mysql_error()); 
while($rows = mysql_fetch_array($sql)){ 
$questionID = $rows['questionID'];
$Forum->forumQuestionByID($questionID);

echo '
<tr>
<td bgcolor="#FFFFFF"><a href="forumCategory.php?coinCategory='.str_replace(' ', '_', $Forum->getTopicCategory()).'">'.$Forum->getTopicCategory().'</a></td>
<td bgcolor="#FFFFFF"><a href="forumViewTopic.php?questionID='.$questionID.'">'.$rows['topic'].'</a></td>
<td align="center" bgcolor="#FFFFFF">'.$rows['view'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['reply'].'</td>
<td align="center" bgcolor="#FFFFFF">'.$rows['datetime'].'</td>
</tr>';
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