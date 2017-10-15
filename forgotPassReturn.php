<?php 
include 'inc/configSite.php';

if(isset($_POST["password"])){
	$password = mysql_real_escape_string($_POST['password']);
	$userID = mysql_real_escape_string($_POST['userID']);
	$securePassword = sha1($password);
	mysql_query("UPDATE user SET password = '$securePassword' WHERE userID = '$userID'") or die (mysql_error());
	$_SESSION['message'] = 'Your password has been changed <a href="login.php">Login to your account</a>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	

$("input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#recoverEmail").focus(function() {
		$(this).removeClass("errorInput");
		$("#note2").html("&nbsp;")
});

    $('#questionForm').ajaxForm({ 
        target: '#passChange', 
        success: function() { 
            $('#passChange').fadeIn('slow'); 
        } 
    });
	
	$("#questionForm").submit(function() {
      if ($("#answer").val() == "") {
        $("#questionBox").text("Please Enter Your answer...");
		$("#answer").addClass("errorInput");
        return false;
      }else {
	 $('#questionFormBtn').val("Checking Answer.....");	  
	  return true;
	  }
});
	
});
</script>  

<style type="text/css">
#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body class="no-js">
<?php include("inc/pageElements/nav.php"); ?>
<div id="content" class="clear">

<div>
<h1>Reset Password Page</h1>
<p id="passwordMsg">
<span id="note2"><?php echo $_SESSION['message']; ?></span></p>
<?php 
//Lost password form
if(isset($_GET["passLink"])){
	$passLink = mysql_real_escape_string($_GET['passLink']);
	$userID = safe_b64decode($_GET['userID']);
	$result = mysql_query("SELECT * FROM recover WHERE passLink = '$passLink' LIMIT 1") or die(mysql_error());
	if($result){
		echo '<h3>Step 2: Answer Your Security Question</h3>';
		$getQuestionResult = mysql_query("SELECT * FROM user WHERE userID='$userID' LIMIT 1") or die(mysql_error());
   if($result){
	   
	 while($row = mysql_fetch_array($getQuestionResult)){ 
		 $userID = intval($row['userID']);
		 $question = strip_tags($row['question']);
		 echo '
		 <form id="questionForm" name="questionForm" method="post" action="forgotPassChange.php" class="wideLable">
		 <p>'.$question.'</p>
		  <label for="answer">Security Answer:</label>
		  <input id="answer" name="answer" type="text" value="" />
		  <input name="userID" type="hidden" value="'.$userID.'">
		  <p id="questionBox">&nbsp;</p>
		  <label for="questionFormBtn">&nbsp;</label> <input name="questionFormBtn" type="submit" id="questionFormBtn" value="Check Answer" />
		  </form>';
	 }

   }
	} else {
		echo 'E-Mail link not supplied';
		
	}
}
?>

</div>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>