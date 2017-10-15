<?php require_once('../Connections/conn.php'); ?>
<?php 
// Show IF Conditional region1 
if (@$_GET['install'] == "ok") {
@unlink("../setup/install.php");}
?>
<?php require_once("functions.inc.php");
function quote_smart($value)
{
    // если magic_quotes_gpc включена - используем stripslashes
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }
    // Если переменная - число, то экранировать её не нужно
    // если нет - то окружем её кавычками, и экранируем
    if (!is_numeric($value)) {
        $value = "'" . mysql_real_escape_string($value) . "'";
    }
    return $value;
}
// *** Start the session
if (!session_id()) session_start();
// *** Validate request to log in to this site.
$FX_LoginAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING']!="") $FX_LoginAction .= "?".htmlentities($_SERVER['QUERY_STRING']);
if (isset($_POST['username'])) {
  $FX_valUsername=$_POST['username'];
  $FX_valPassword=$_POST['password'];
  $FX_fldUserAuthorization="";
  $FX_redirectLoginSuccess="index.php";
  $FX_redirectLoginFailed="login.php?blogin=true";
  $FX_rsUser_Source="SELECT login, pass ";
  if ($FX_fldUserAuthorization != "") $FX_rsUser_Source .= "," . $FX_fldUserAuthorization;
  $FX_rsUser_Source .= sprintf(" FROM ebapi_settings WHERE login= '" . $FX_valUsername . "' AND pass= '" . $FX_valPassword . "'",quote_smart($_POST['username']),quote_smart($_POST['password']));
  mysql_select_db($database_conn, $conn);
  $FX_rsUser=mysql_query($FX_rsUser_Source, $conn) or die(mysql_error());
  $row_FX_rsUser = mysql_fetch_assoc($FX_rsUser);
  if(mysql_num_rows($FX_rsUser) > 0) {
    // username and password match - this is a valid user
    $eb_usr=$FX_valUsername;
    KT_session_register("eb_usr");
    if ($FX_fldUserAuthorization != "") {
      $eb_pas=$row_FX_rsUser[$FX_fldUserAuthorization];
    } else {
      $eb_pas="";
    }
    KT_session_register("eb_pas");
    if (isset($_SESSION['url_eb_usr']) && false) {
      $FX_redirectLoginSuccess = $_SESSION['url_eb_usr'];
    }
    mysql_free_result($FX_rsUser);
    KT_session_register("FX_eb_usr_failed");
    $FX_eb_usr_failed = false;
    header ("Location: $FX_redirectLoginSuccess");
    exit;
  }
  mysql_free_result($FX_rsUser);
  KT_session_register("FX_eb_usr_failed");
  $FX_eb_usr_failed = true;
  header ("Location: $FX_redirectLoginFailed");
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login page</title>
<link href="form_styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #8AB573;
}
-->
</style>
<link href="../CSSSculptor/1ColumnLiquidCenteredHeaderandFooter_DeepJungle_css/screen.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center">
  <h1><br />
    <br />
    Admin Login<br />
    <br />
  </h1>
</div>
<div id="box">
<form action="<?php echo $FX_LoginAction?>" method="POST" id="form1">
    <legend></legend>
    <br />
 <?php 
// Show IF Conditional region1 
if (@$_GET['install'] == "ok") {?>
    <p><br />
        <span class="homeFeatureHeadline"><strong>You've successfully installed Stcript.</strong></span></p>
    <p class="homeFeatureHeadline"><strong>First time :</strong></p>
    <p class="homeFeatureHeadline"><strong>login=admin@email.com</strong></p>
    <p class="homeFeatureHeadline"><strong>password=pass </strong></p>
    <?php } 
// endif Conditional region1
?><?php if(@$_GET['blogin']=="true"){?><span style="color:#C00"><strong>   You have entered wrong login or password</span><br /><?php }?>
    <table align="center" cellpadding="6" cellspacing="0" class="prodtable2">
      <tr>
        <td class="KT_th"><label for="username">Username:</label></td>
        <td><input name="username" type="text" class="formTextfield_Large" id="username" size="32" /></td>
      </tr>
      <tr>
        <td class="KT_th"><label for="password">Password:</label></td>
        <td><input name="password" type="password" class="formTextfield_Large" id="password" value="" size="32" /></td>
      </tr>
      <tr class="KT_buttons">
        <td colspan="2"><div align="right">
          <input name="kt_login1" type="submit" class="but" id="kt_login1" value="Login" />
        </div></td>
      </tr>
    </table>
    <a href="forgot.php">Forgot your Password? </a><br />
    <br />
</form>
</div>
</body>
</html>