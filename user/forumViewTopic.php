<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET["ID"])){
	$questionID = $Encryption->decode($_GET["ID"]);
	
	
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
$questionID = $Encryption->decode($_POST['ID']);
$Forum->forumQuestionByID($questionID);

$a_answer = $_POST['a_answer']; 
$datetime=date("Y-m-d H:i:s"); // create date and time
// Insert answer 
mysql_query("INSERT INTO forum_answer(question_id, userID, a_answer, a_datetime)VALUES('$questionID', '$userID', '$a_answer', '$datetime')");

$Forum->setReplyNumber($questionID);

//Send user mail


$mail->SetFrom('outbound@mycoinorganizer.com', 'My Coin Organizer');
$mail->AddReplyTo("outbound@mycoinorganizer.com","My Coin Organizer");
$mail->Subject = "New Question on My Coin Organizer Forum";
$mail->Body = $a_answer;
$mail->MsgHTML($a_answer);
$address = $User->getEmail();
$mail->AddAddress($address, "My Coin Organizer");
$mail->Body = '<h1>New Message</h1><p>'.$a_answer.'</p>';
$mail->AddReplyTo("admin@mycoinorganizer.com", "Replies for my site"); // indicates 
$mail->Send();

header("location: forumViewTopic.php?ID=".$Encryption->encode($questionID)." ");
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
.forumImg {height:auto; width:200px;}
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
<br />
<table width="100%" border="0">
  <tr>
    <td><a href="forumMain.php" class="brownLink">Back to main forum</a>&nbsp;</td>
    <td><a href="forumCreate.php" class="brownLinkBold">Post New Question </a>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">    <form id="searchForumForm" name="searchForumForm" method="post" action="forumSearch.php" class="compactForm">
        <span>Search Forum: </span>
        <input name="search" id="search" type="text" />
        <input name="searchForumBtn" id="searchForumBtn" type="submit" value="Search" />
      </form></td>
  </tr>
</table>


<h2><?php echo $Forum->getTopic(); ?></h2>
<table width="100%" border="0">
  <tr>
    <td width="10%"><strong>From:</strong></td>
    <td width="81%"><a href="viewUsersProfile.php?ID=<?php echo $Encryption->encode($Forum->getAsker()) ?>"><?php echo $Forum->getAskerUserNamer($questionID); ?></a></td>
    <td width="9%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Posted:</strong></td>
    <td><?php echo date("M j, Y g:i a",strtotime($Forum->getPostedDate())); ?></td>
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


<table width="100%" border="0">
  <tr>
 <?php 
$sql2 = mysql_query("SELECT * FROM forum_gallery WHERE questionID = '$questionID' ORDER BY galleryID DESC") or die(mysql_error()); 
	while($rows3 = mysql_fetch_array($sql2)){ 
	$galleryID = intval($rows3['galleryID']);
	$Forum->forumQuestionByID(intval($rows3['questionID']));
	$User->getUserByID($rows3['userID']);
    echo '<img src="'.strip_tags($rows3['imgURL']).'" class="forumImg" />';
}
 ?> 
  
    <td width="33%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
  </tr>
</table>


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
	$Forum->getAnswerById($rows3['a_id']);
	$RespondUser = new User();
	$RespondUser->getUserByID($rows3['userID']);
    echo '
<table width="100%" border="0">
  <tr>
    <td width="11%"><a href="viewUsersProfile.php?ID='.$Encryption->encode($rows3['userID']).'">'.$Forum->getReponderUserNamer($rows3['a_id']).'</a><br />
    '.$RespondUser->getCollectionAvatar($Forum->getResponder()).$RespondUser->getAnswerAvatar($Forum->getResponder()).$RespondUser->getInvestmentAvatar($Forum->getResponder()).'
    </td>
    <td width="89%"><strong>Posted</strong> '.date("M j, Y g:i a",strtotime($rows3['a_datetime'])).'
    <hr class="noMargin" />

    </td>
  </tr>
  <tr>
    <td><img src="'.$RespondUser->getImageURL().'" class="forumUserImg" /></td>
    <td valign="top">'.$Forum->getAnswer().'</td>
  </tr>
  <tr>
    <td><strong>Posts</strong><br />
    '.$Forum->getQuestionsByUser($rows3['userID']).'</td>
    <td valign="top"></td>
  </tr>
</table><hr />';
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
<td><input name="ID" type="hidden" value="<?php echo $_GET["ID"]; ?>" />  <input type="submit" name="forumAnswerBtn" value="Submit" id="forumAnswerBtn" />
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