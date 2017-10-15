<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET["questionID"])){
	$questionID = intval($_GET["questionID"]);
	$sql = mysql_query("SELECT * FROM forum_question WHERE questionID = '$questionID'") or die(mysql_error()); 
	
	$Forum->forumQuestionByID($questionID);
	$Forum->setViewNumber($questionID, $userID);
	while($rows1 = mysql_fetch_array($sql)){ 
	$topic = $rows1['topic'];
	$detail = $rows1['detail'];
	$asker = $rows1['userID'];
	$datetime = $rows1['datetime'];
	}
}
// Get value of id that sent from hidden field 
if(isset($_POST["forumAnswerBtn"])){
$questionID = $_POST['questionID'];
$Forum->forumQuestionByID($questionID);

$a_answer = $_POST['a_answer']; 
$datetime=date("Y-m-d H:i:s"); // create date and time
$userID = '6';
// Insert answer 
mysql_query("INSERT INTO forum_answer(question_id, userID, a_answer, a_datetime)VALUES('$questionID', '$userID', '$a_answer', '$datetime')");

$Forum->setReplyNumber($questionID);

//Send user mail


$mail->SetFrom('outbound@neongoldfish.com', 'NGF');
$mail->AddReplyTo("outbound@neongoldfish.com","NGF");
$mail->Subject = "New Todo, from NGF";
$mail->Body = $Message;
$mail->MsgHTML($Message);
$address = $user->getEmail();
$mail->AddAddress($address, "NGF");
$mail->Body = '<h1>New Message</h1><p>'.$Message.'</p>';
$mail->AddReplyTo("dre_board@yahoo.com", "Replies for my site"); // indicates 
$mail->Send();


header("location: forumViewTopic.php?questionID=$questionID");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View Forum Question</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );

$("#forumAnswerForm").submit(function() {
      if ($("#a_answer").val() == "") {
        $("#errorMsg").text("Please enter your response");
		$("#a_answer").addClass("errorInput");
        return false;
      }else if ($("#topicChecker").val() !== 'the coin') {
	$("#errorMsg").text("Please enter the text from the image");
	$("#topicChecker").addClass("errorInput");
	return false;
  }else {
		$("#waitComplete").show();
        $('#forumAnswerBtn').val("Adding Response");	  
	  return true;
	  }
});	

$('a#trigger').hover(function(e) {
    $('div#pop-up').show()
      .css('top', e.pageY)
      .css('left', e.pageX)
      .appendTo('body');
  }, function() {
    $('div#pop-up').hide();
  });
  
$("#a_answer, #topicChecker").click(function(){
	  $(this).removeClass("errorInput");
	  $("#errorMsg").empty();
	  $("#waitComplete").hide();
});

});
</script> 
<style type="text/css">
.forumImg {height:100px; width:auto;}
/* HOVER STYLES */
div#pop-up {
  display: none;
  position: absolute;
  width: 280px;
  padding: 10px;
  background: #eeeeee;
  color: #000000;
  border: 1px solid #1a1a1a;
  font-size: 90%;
}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<p><a href="forumMain.php">Back to main forum</a> | <a href="forumCreate.php"><strong>Post New Question</strong> </a></p>
<h2><?php echo $topic; ?></h2>
<table width="100%" border="0">
  <tr>
    <td width="10%"><strong>From:</strong></td>
    <td width="81%"><?php echo $Forum->getReponderUserNamer($asker); ?></td>
    <td width="9%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Posted:</strong></td>
    <td><?php echo $datetime; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Category:</strong></td>
    <td><a href="forumCategory.php?coinCategory=<?php echo str_replace(' ', '_', $Forum->getTopicCategory()); ?>"><?php echo $Forum->getTopicCategory(); ?></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Views:</strong></td>
    <td><?php echo $Forum->getViews(); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<div><?php echo $detail; ?></div>
<br />
<?php if ($Forum->getImgURL() !== 'None'){
	echo '<a href="forumImg.php?questionID='.$questionID.'"><img class="forumImg" src="'.$Forum->getImgURL().'" /></a>';
} else {
	echo '';
}
?>
<br />
<h3>Responses</h3>
<?php
$result2 = mysql_query("SELECT * FROM forum_answer WHERE question_id = '$questionID' ORDER BY a_id DESC") or die(mysql_error()); 
	while($rows3 = mysql_fetch_array($result2)){ 
	$answerID = $rows3['a_id'];
	$Forum->getAnswerById($answerID);
    echo '
	<p>Posted '.$rows3['a_datetime'].' by '.$Forum->getReponderUserNamer($rows3['userID']).' '.$Forum->getAnswerAvatar($rows3['userID']).'</p>
	<div>'.$Forum->getAnswer().'</div>
	';
	}
?>

<h3><strong>Add A Response </strong></h3>
<div id="pop-up" class="errorTxt">
      <h3>Spam Will Not Be Tolerated</h3>
      <p>Any user posting spam or adding offensive content or content unrelated to coins will be banned from the forum area.</p>
    </div>
<table width="800" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
<form name="forumAnswerForm" id="forumAnswerForm" method="post" action="">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
  <td valign="top"><img src="../img/nospam.jpg" alt="no spam" width="30" height="30" align="absmiddle" /> <a href="#" id="trigger"><span class="errorTxt">No Spam Policy</span></a></td>
  </tr>
<tr valign="middle">
  <td valign="middle"><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
  </tr>
<tr>
  <td valign="top"><img src="../img/captchaImg.jpg" width="100" height="50" /><br />
    <input type="text" name="topicChecker" id="topicChecker" />
    Enter Words from the image</td>
  </tr>
<tr>
<td><input name="questionID" type="hidden" value="<?php echo $questionID; ?>" />  <input type="submit" name="forumAnswerBtn" value="Submit" id="forumAnswerBtn" />
  <img src="../img/progress.gif" alt="" name="waitComplete" width="200" height="30" align="absmiddle" id="waitComplete" /><span id="errorMsg" class="errorTxt"></span></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>