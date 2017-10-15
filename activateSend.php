<?php 
include 'inc/config.php';
  
if(isset($_POST["codeEmail"])){
   $email = mysql_real_escape_string($_POST['codeEmail']);
   
   if($email==''){
   $_SESSION['message'] = "Email is blank";
   } elseif ($User->checkActivation($email)){
	$_SESSION['errorMsg'] = '<p>The email address <strong>'.$email.'</strong> is already activated.<br />If you have lost your password go to <a href="forgotPass.php">Forgot my Password.</a></p>';
	}else {
	   if(!$User->getActivationCode($email)){
		   $_SESSION['message'] = "<span class='errorTxt'>Your Verification Code Could Not be Sent</span>";
	   } else {
		   $_SESSION['message'] = "<span style='color:#090'><strong>Your Verification Code Was Sent</strong></span>";
	   }
   }
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
<title>Re-Send Activation Code</title>
<script type="text/javascript">
$(document).ready(function(){	
$("#codeRecoverForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });


$("#codeEmail").focus(function() {
		$(this).removeClass("errorInput");
		$("#note2").html("&nbsp;");
});

$("#codeRecoverForm").submit(function() {
      if ($("#codeEmail").val() == "") {
		$("#codeEmail").addClass("errorInput");
        $("#note2").text("Need email address...").addClass('errorTxt');
        return false;
      }else {
	 $('#codeRecoverBtn').val("Sending Code.....");	  
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
<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>
<div id="content" class="clear">
<p id="note2"><?php if(isset($_SESSION['message'])){	echo  $_SESSION['message'];	} ?>
<?php 
if(isset($_SESSION['errorMsg'])){
echo '<span class="errorTxt">'.strip_tags($_SESSION['errorMsg'], '<a><br>').'</span>'; 
} else {
	 unset($_SESSION['errorMsg']);
echo ''; 
}
?>
&nbsp;</p>
<div id="codeDiv">
<h2>Re-Send Activation Code</h2>
<form id="codeRecoverForm" name="codeRecoverForm" method="post" action="" class="wideLable">

  <label for="codeEmail">Enter E-Mail</label>
  <input name="codeEmail" type="text" id="codeEmail" />
<p>Your email activation code link will be mailed to you</p>
 <label for="codeRecoverBtn">&nbsp;</label> <input name="codeRecoverBtn" id="codeRecoverBtn" type="submit" value="Send My Code" />

</form>

</div>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>