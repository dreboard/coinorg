<script type="text/javascript">
$(document).ready(function(){	

$("#passRecoverForm").submit(function() {
      if ($("#password").val() == "") {
        $("#passwordMsg").text("Please Enter Your Password...");
		$("#password").addClass("errorInput");
        return false;
      }else if ($("#verify_password").val() == "") {
        $("#passwordMsg").text("Please Verify Your Password...");
		$("#verify_password").addClass("errorInput");
        return false;
      }else if ($("#password").val() !== $("#verify_password").val()) {
        $("#passwordMsg").text("Your Passwords Are Not The Same...");
        $("#password").addClass("errorInput");
		$("#verify_password").addClass("errorInput");
        return false;
      }else {
	 $('#passRecoverFormBtn').val("Accessing Account.....");	  
	  return true;
	  }
});
	
});
</script>  
<?php 
include 'inc/configSite.php';
/*if(isset($_POST["answer"])){
$sentAnswer = mysql_real_escape_string($_POST['answer']);
$accountID = mysql_real_escape_string($_POST['accountID']);
$result = mysql_query("SELECT * FROM users WHERE accountID = '$accountID' AND answer = '$sentAnswer' LIMIT 1") or die(mysql_error());
if($result){
	echo '<h3>Step 3: Change Password</h3>
<form id="passRecoverForm" name="passRecoverForm" method="post" action="" class="wideLable">
<br />
<label for="password">Password:</label>
<input id="password" name="password" type="password" value="" />
<br />
<label for="verify_password">Verify Password:</label>
<input id="verify_password" name="verify_password" type="password" value="" />
<br /><br />
 <label for="passRecoverFormBtn">&nbsp;</label> <input name="passRecoverFormBtn" type="submit" value="Reset My Password" />
</form>';
} else {
	echo "Your security answer is wrong";
	}
}*/

if(isset($_POST["answer"])){
$sentAnswer = mysql_real_escape_string($_POST['answer']);
$userID = mysql_real_escape_string($_POST['userID']);
$result = mysql_query("SELECT * FROM users WHERE userID = '$userID' LIMIT 1") or die(mysql_error());

while($row = mysql_fetch_array($result)){ 
if($sentAnswer === $row['answer']){
	echo '<h3>Step 3: Change Password</h3>
<form id="passRecoverForm" name="passRecoverForm" method="post" action="forgotPassReturn.php" class="wideLable">
<br />
<label for="password">Password:</label>
<input id="password" name="password" type="password" value="" />
<br />
<label for="verify_password">Verify Password:</label>
<input id="verify_password" name="verify_password" type="password" value="" />
<br /><br />
<input name="userID" type="hidden" value="'.$userID.'">
 <label for="passRecoverFormBtn">&nbsp;</label> <input name="passRecoverFormBtn" type="submit" value="Reset My Password" />
</form>';
} else {
	echo "<h3>Your security answer is wrong</h3>";
	}
}
}
?>