<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$pageMsg = '';

$User->getUserById($userID);


if (isset($_POST['privacyBtn'])) {
	  $password = mysql_real_escape_string($_POST['privatePassword']);
	  $viewLevel = mysql_real_escape_string($_POST['viewLevel']);
	if($User->privacyUpdater($userID, $password, $viewLevel)){
		$_SESSION['pageMsg'] = "Account Privacy Updated";
	} else {
		$_SESSION['errorMsg'] = "Account Privacy Not updated";
	}
}

if (isset($_POST['emailBtn'])) {
	  $mailPassword = mysql_real_escape_string($_POST['mailPassword']);
	  $newEmail = mysql_real_escape_string($_POST['newEmail']);
	if($User->emailUpdater($userID,$mailPassword, $newEmail)){
		$_SESSION['pageMsg'] = "Account Email Updated";
	} else {
		$_SESSION['errorMsg'] = "Account Email Not updated";
	}
}

if (isset($_POST['passwordFormBtn'])) {
	  $oldPassword = mysql_real_escape_string($_POST['oldPassword']);
	  $newPassword = mysql_real_escape_string($_POST['password']);
	if($User->passwordUpdater($userID,$oldPassword, $newPassword)){
		$_SESSION['pageMsg'] = "Account Password Updated";
	} else {
		$_SESSION['errorMsg'] = "Account Password Not updated";
	}
}

if (isset($_POST['deleteAccountBtn'])) {
$password = mysql_real_escape_string($_POST['cancelPassword']);
$dirPath = 'user/'.$userID;
$loginQuery = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$password' LIMIT 1")or die(mysql_error());
       $login_check = mysql_num_rows($loginQuery);
           if($login_check > 0){ 
					$User->deleteUser($userID);
					header("location: ../index.php");
		}//End loginQuery

}


if (isset($_POST['photoBtn'])) {
$password = mysql_real_escape_string($_POST['photoPassword']);
$dirPath = 'user/'.$userID;
$loginQuery = mysql_query("SELECT * FROM user WHERE userID = '$userID' AND password = '$password' LIMIT 1")or die(mysql_error());
       $login_check = mysql_num_rows($loginQuery);
           if($login_check > 0){ 
		   
		   if(!empty($_FILES['file']['tmp_name'])){
			   
			$Upload->SetFileName($User->getUserName().str_replace(' ', '_', $_FILES['file']['name']));
			$Upload->SetTempName($_FILES['file']['tmp_name']);
			$Upload->SetUploadDirectory($userID."/");
			$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
			$Upload->SetMaximumFileSize(3000000); 
			$Upload->UploadFile();
			$imageURL = $userID."/" . $User->getUserName().$_FILES['file']['name'];
			$fileQuery = mysql_query("UPDATE user SET  imageURL = '$imageURL' WHERE userID = '$userID'")  or die(mysql_error()); 
			}  

		}//End loginQuery

}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit My Account</title>
<?php include("../secureScripts.php"); ?>
<style type="text/css">
.imageURL {width:100px; height:auto;}
</style>
<script type="text/javascript">
$(document).ready(function(){

$("#waitEmailComplete, #waitPassComplete, #waitPrivacyComplete, #waitPhotoComplete").hide();

$("#photoForm").submit(function() {
   if ($("#photoPassword").val() == "") {
	$("#photoPassword").addClass("errorInput");
	$("#photoPasswordLbl").addClass("errorTxt");
	$("#photoMsg").text("Your Password Please...").addClass("errorTxt");
	return false;
  }else if ($("#file").val() == "") {
	$("#file").addClass("errorInput");
	$("#fileLbl").addClass("errorTxt");
	$("#photoMsg").text("Select A Photo Please...").addClass("errorTxt");
	return false;
  }else {
	  $("#waitPhotoComplete").show();
 $('#photoBtn').val("Changing View Image.....");	  
  return true;
  }
});

$("#privacyForm").submit(function() {
   if ($("#privatePassword").val() == "") {
	$("#privatePassword").addClass("errorInput");
	$("#privatePasswordLbl").addClass("errorTxt");
	return false;
  }else {
	  $("#waitPrivacyComplete").show();
 $('#privacyBtn').val("Changing View Level.....");	  
  return true;
  }
});


$("#emailEditForm").submit(function() {
   if ($("#newEmail").val() == "") {
	$("#newEmail").addClass("errorInput");
	$("#newEmailLbl").addClass("errorTxt");
	return false;
  }else {
	  $("#waitPrivacyComplete").show();
 $('#emailBtn').val("Changing Email.....");	  
  return true;
  }
});

$("#emailEditForm").submit(function() {
   if ($("#newEmail").val() == "") {
	$("#newEmail").addClass("errorInput");
	$("#newEmailLbl").addClass("errorTxt");
	return false;
  }else {
	  $("#waitEmailComplete").show();
 $('#emailBtn').val("Changing Email.....");	  
  return true;
  }
});

$("#passwordForm").submit(function() {
  if ($("#password").val() == "") {
	$("#password").addClass("errorInput");
	$("#passwordLbl").text("Enter Password...").addClass("errorTxt");
	return false;
  }else if ($("#verify_password").val() == "") {
	$("#passwordMsg").text("Please Verify Your Password...");
	$("#verify_passwordLbl").text("Verify Password...").addClass("errorTxt");
	$("#verify_password").addClass("errorInput");
	return false;
  }else if ($("#password").val() !== $("#verify_password").val()) {
	$("#passwordMsg").text("Your Passwords Are Not The Same...");
	$("#password").addClass("errorInput");
	$("#verify_password").addClass("errorInput");
	return false;
  }else {
	  $("#waitPassComplete").show();
 $('#passwordFormBtn').val("Changing Password.....");	  
  return true;
  }
});

$('#cancelForm').submit(function(){
  if ($("#cancelPassword").val() == "") {
	$("#cancelPassword").addClass("errorInput");
	$("#cancelMsg").text("Enter Password...").addClass("errorTxt");
	return false;
  }else {
	  $( "#waitComplete").show();
 $('#deleteAccountBtn').val("Deleting Account.....");	  
  return true;
  }
});   
  
$('#cancelPassword').click(function(){
	$("#cancelPassword").removeClass("errorInput");
	$("#cancelMsg").text("");
}); 
$('#newEmail').click(function(){
	$("#newEmail").removeClass("errorInput");
	$("#newEmailLbl").removeClass("errorTxt");
}); 

});
</script>
</head>

<body>
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">

<h2 id="pageHdr"><img src="<?php echo $User->getImageURL() ?>" alt="" align="left" class="imageURL" />&nbsp; Edit Users Account Details<br />
&nbsp;&nbsp;(<?php echo $User->getLastname() ?>, <?php echo $User->getFirstname() ?>)</h2>

<br class="clear" />
<span><?php 
if(isset($_SESSION['pageMsg'])){
echo '<span class="greenLink">'.addslashes($_SESSION['pageMsg']).'</span>'; 
} else {
echo ''; 
}
if(isset($_SESSION['errorMsg'])){
echo '<span class="errorTxt">'.addslashes($_SESSION['errorMsg']).'</span>'; 
} else {
echo ''; 
}
?>

</span>

<h2>Change Photo</h2>
<form action="" method="post" enctype="multipart/form-data" name="photoForm" id="photoForm">
		<table width="100%" border="0" cellspacing="0" cellpadding="6" id="imgFormTbl">
		<tr>
		<td colspan="4" align="left">Please enter your password to update your photo.</td>
		</tr>
		<tr>
		  <td align="right" valign="top"><label for="privatePassword" id="photoPasswordLbl">Password</label></td>
		  <td><input name="photoPassword" id="photoPassword" type="password" /></td>
		  <td id="cancelMsg2">&nbsp;</td>
		  <td width="17%" rowspan="3" id="cancelMsg2">&nbsp;</td>
		  </tr>
		<tr>
		<td width="17%" align="right" valign="top"><label for="file" id="fileLbl">New Photo:</label></td>
		<td width="27%"><input type="file" name="file" id="file" /></td>
		<td width="39%" id="photoMsg">&nbsp;</td>
		</tr>      
		<tr>
		<td>&nbsp;</td>
		<td colspan="2"><label>
		  <input type="submit" name="photoBtn" id="photoBtn" value="Change Image" onclick="return confirm('Change Site Image')" />
		  <img src="../img/progress.gif" alt="" name="waitPhotoComplete" width="200" height="30" align="absmiddle" id="waitPhotoComplete" /></label></td>
		</tr>
		</table>
		</form>

<hr />

<h2>Change Privacy Level</h2>
		<form action="" name="privacyForm" id="privacyForm" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="6" id="accountFormTbl">
		<tr>
		<td colspan="3" align="left">Please enter your password to cancel your account with <span id="TopPanelDF"><span id="gh-ug"><strong>My Coin Organizer</strong></span></span>, and to delete all account files.</td>
		</tr>
		<tr>
		  <td align="right" valign="top"><label for="privatePassword">Password</label></td>
		  <td><input name="privatePassword" id="privatePassword" type="password" /></td>
		  <td id="cancelMsg2">&nbsp;</td>
		  </tr>
		<tr>
		<td width="20%" align="right" valign="top"><label for="viewLevel" id="viewLevelLbl">Privacy Level:</label></td>
		<td width="19%"><select id="viewLevel" name="viewLevel">
        <option value="<?php echo $User->getPrivacyLevel() ?>" selected="selected"><?php echo $User->getPrivacyLevel() ?></option>
            <option value="private">Private</option>
            <option value="public">Public</option>
            </select></td>
		<td width="61%" id="cancelMsg">&nbsp;</td>
		</tr>      
		<tr>
		<td>&nbsp;</td>
		<td colspan="2"><label>
		<input type="submit" name="privacyBtn" id="privacyBtn" value="Change View Settings" onclick="return confirm('Change Privacy Level')" />
		<img src="../img/progress.gif" alt="" name="waitPrivacyComplete" width="200" height="30" align="absmiddle" id="waitPrivacyComplete" /></label></td>
		</tr>
		</table>
		</form>
        <hr />

<h2>Change Users Email</h2>
<form action="" name="accountForm" id="emailEditForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6" id="accountFormTbl">
<tr>
  <td width="20%" align="right" valign="top"><label for="mailPassword">Password</label></td>
  <td width="80%"><input name="mailPassword" id="mailPassword" type="password" /></td>
</tr>
<tr>
  <td width="20%" align="right" valign="top"><label id="newEmailLbl">New Email</label></td>
  <td width="80%"><input name="newEmail" id="newEmail" type="text" /></td>
</tr>      
<tr>
<td><input name="userID" type="hidden" value="<?php echo $userID ?>" /></td>
<td><label>
<input type="submit" name="emailBtn" id="emailBtn" value="Change Email" />
<img src="../img/progress.gif" alt="" name="waitEmailComplete" width="200" height="30" align="absmiddle" id="waitEmailComplete" /></label></td>
</tr>
</table>
</form>
<hr />

<h2>Change Users Password</h2>
<form action="" name="passwordForm" id="passwordForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6" id="accountFormTbl">
<tr>
  <td align="right"><label for="password2" id="passwordLbl">Old Password</label></td>
  <td><input id="oldPassword" name="oldPassword" type="password" value="" /></td>
  <td id="passwordMsg3">&nbsp;</td>
</tr>
<tr>
  <td width="20%" align="right"><label for="password" id="passwordLbl">New Password</label></td>
  <td width="17%">
  <input id="password" name="password" type="password" value="" /></td>
  <td width="63%" id="passwordMsg">&nbsp;</td>
</tr>
<tr>
<td align="right" valign="top"><label for="verify_password" id="verify_passwordLbl">Verify New Password:</label></td>
<td colspan="2"><input id="verify_password" name="verify_password" type="password" value="" /></td>
</tr>      
<tr>
<td>&nbsp;</td>
<td colspan="2"><label>
<input type="submit" name="passwordFormBtn" id="passwordFormBtn" value="Change Password" />
<img src="../img/progress.gif" alt="" name="waitPassComplete" width="200" height="30" align="absmiddle" id="waitPassComplete" /></label></td>
</tr>
</table>
</form>
<hr />

<h2>Cancel Account</h2>
		<form action="" name="cancelForm" id="cancelForm" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="6" id="accountFormTbl">
		<tr>
		<td colspan="3" align="left">Please enter your password to cancel your account with <span id="TopPanelDF"><span id="gh-ug"><strong>My Coin Organizer</strong></span></span>, and to delete all account files.</td>
		</tr>
		<tr>
		<td width="20%" align="right" valign="top"><label for="verify_password" id="verify_passwordLbl">Verify Password:</label></td>
		<td width="19%"><input id="cancelPassword" name="cancelPassword" type="password" value="" /></td>
		<td width="61%" id="cancelMsg">&nbsp;</td>
		</tr>      
		<tr>
		<td>&nbsp;</td>
		<td colspan="2"><label>
		<input type="submit" name="deleteAccountBtn" id="deleteAccountBtn" value="Delete My Account" onclick="return confirm('Delete My Account?')" />
		<img src="../img/progress.gif" alt="" name="waitComplete" width="200" height="30" align="absmiddle" id="waitComplete" /></label></td>
		</tr>
		</table>
		</form>
<br />



</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
