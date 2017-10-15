<?php 
include '../inc/config.php';

if (isset($_SESSION['userID'])) {
	  $userID = intval($_SESSION['userID']);
} else {
header('Location: ../login.php');
}
$user->getUserById($userID);  
$user->getDisplayName(); 
$name = $user->getDisplayName();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	
$('#recoverDiv').hide();
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#loginForm").submit(function() {
      if ($("#email").val() == "") {
		$("#email").addClass("errorInput");
        $("#formErrors").text("Need email address...").show();
        return false;
      }else if ($("#password").val() == "") {
		$("#password").addClass("errorInput");  
        $("#formErrors").text("Need password...").show();
        return false;
      }else {
	 $('#loginFormBtn').val("Accessing Account.....");	  
	  return true;
	  }
});

$("#forgotTxt").click(function(event) {
	event.preventDefault();
	$('#recoverDiv').show();
});


$("#recoverEmail").focus(function() {
		$(this).removeClass("errorInput");
		$("#note2").html("&nbsp;");
});

$("#passRecoverForm").submit(function() {
      if ($("#recoverEmail").val() == "") {
		$("#recoverEmail").addClass("errorInput");
        $("#note2").text("Need email address...").addClass('errorTxt');
        return false;
      }else {
	 $('#passRecoverFormBtn').val("Accessing Account.....");	  
	  return true;
	  }
});


});
</script>  


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Admin Home</h1>
<br />

<?php echo $userID ?><br />
<?php echo $name; ?><br />
<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>