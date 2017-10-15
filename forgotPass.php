<?php 
include 'inc/configSite.php';

//Lost password form
   if(isset($_POST["recoverEmail"])){
   $email = mysql_real_escape_string($_POST['recoverEmail']);
   if($email==''){
   $_SESSION['message'] = "Email is blank";
   header("location: forgotPass.php");
   }
   if (preg_match( "/[\r\n]/", $email ) ) {
	header("location: yahoo.com");	
}
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

   $result = mysql_query("SELECT password FROM user WHERE email='$email' LIMIT 1") or die(mysql_error());
   if(mysql_num_rows($result)==0){// Email address not in database
   $_SESSION['message'] =  $email . " is not a registered Email . <a href='forgotPass.php#contWmst'>Contact webmaster</a>";
   header("location: forgotPass.php");
   }
   if(mysql_num_rows($result)==1){
   $rows=mysql_fetch_array($result);
   $password = $rows['password'];
   
   $to = $email;
   $subject = "Lost Password Request";
   $message = "Welcome to our website!\r\r
   You, or someone using your email address,\r\r
   has requested the password for your account\r\r
   If this is an error, ignore this email and you will be removed from our mailing list.\r\r
   Lost password is $password.";
   $headers = 'From: noreply@mycoinorganizer.com' . "\r\n" .
   'Reply-To: noreply@mycoinorganizer.com' . "\r\n";
   mail($to, $subject, $message, $headers);
   $_SESSION['message'] = "<span style='color:#090'><strong>The password has been sent to $email.</strong></span>";
   
   } 
   } else {
	 $_SESSION['message'] = "E-mail is not valid";
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
<title>Password Recovery Page</title>
<script type="text/javascript">
$(document).ready(function(){	

$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#recoverEmail").focus(function() {
		$(this).removeClass("errorInput");
		$("#senderMessage").html("");
});

$("#passRecoverForm").submit(function() {
      if ($("#recoverEmail").val() == "") {
		$("#recoverEmail").addClass("errorInput");
        $("#senderMessage").text("Need email address...").addClass('errorTxt');
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
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body class="no-js">
<?php include("inc/pageElements/header.php"); ?>
<div id="content" class="clear">

<div>
<h1>Password Recovery Page</h1>
<p id="senderMessage"><?php if(isset($_SESSION['message'])){	echo  strip_tags($_SESSION['message'], '<span>');	} ?></span></p>
<form id="passRecoverForm" name="passRecoverForm" method="post" action="" onsubmit="return forgotPass();">
  <fieldset>
    <legend><strong>Recovery Form</strong></legend>
  <label for="recoverEmail">Enter E-Mail</label>
  <input name="recoverEmail" type="text" id="recoverEmail" /><br />
<p>A Password reset link will be mailed to your registered e-mail</p>
 <label for="passRecoverFormBtn">&nbsp;</label> <input name="passRecoverFormBtn" type="submit" value="Retreive My Password" />
  </fieldset>
</form>
</div>
<p>&nbsp;</p>

</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>