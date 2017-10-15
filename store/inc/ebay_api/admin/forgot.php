<?php require_once('../Connections/conn.php'); ?>
<?php
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

// *** Rescue Password ***
$FX_RescueAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING']!="") $FX_RescueAction .= "?".htmlentities($_SERVER['QUERY_STRING']);
if (isset($_POST['email'])) {
  $FX_email = $_POST['email'];
  $FX_table = "ebapi_settings";
  $FX_emailcol = "login";
  $FX_passcol = "pass";
  $redirectUrl = "";
  mysql_select_db($database_conn, $conn);
   $query_FXRescue = sprintf("SELECT " . $FX_emailcol . ", " . $FX_passcol . " FROM " . $FX_table . " WHERE " . $FX_emailcol . " = '" . $FX_email . "'",quote_smart($_POST['email']));
  $FXRescue = mysql_query($query_FXRescue, $conn) or die(mysql_error());
  $row_FXRescue = mysql_fetch_assoc($FXRescue);
  // if email exists send the password 
  if ($FX_email != "") {
    if (mysql_num_rows($FXRescue) > 0) {
      $recipient = $row_FXRescue[$FX_emailcol];
      $sender = "eBay API Admin <email@email.com>";
      $subject = "Lost password";
      $message = "\n";
      $message .= "Your password is: " . $row_FXRescue[$FX_passcol] . "\n\n";
      $message .= "eBay API admin section";
      $headers = "From: " . $sender . "\r\n";
      mail($recipient, $subject, $message, $headers);
      $value = "1";
    } else {
      $value = "0";
    }
    if ($redirectUrl == "") $redirectUrl = $_SERVER['PHP_SELF'];
    header("Location: " . $redirectUrl . "?FX_RescueVal=" . urlencode($value));
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgotten Password</title>
<link href="../CSSSculptor/1ColumnLiquidCenteredHeaderandFooter_DeepJungle_css/screen.css" rel="stylesheet" type="text/css" />
<link href="form_styles.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1><br />
  Forgotten Password<br /> 
  <br />
</h1>
<div id="box">
  <form action="<?php echo $FX_RescueAction ?>" method="POST" id="form1">
    <legend></legend>
    <br />
   <?php 
// Show IF Conditional region1 
 if ( @$_GET['FX_RescueVal'] == "0") {
?>
    <span style="color:#900"><strong>This user email does not exists. Please insert a valid email</strong>.</span><br />
      <?php } 
// endif Conditional region1
?><?php 
// Show IF Conditional region2
if ( @$_GET['FX_RescueVal'] == "1") {
?><span style="color:#060"><strong>The password has been sent to the supplied email address.</strong></span><br /><?php }?> 
<table align="center" cellpadding="6" cellspacing="0" class="prodtable2">
      <tr>
        <td class="KT_th"> <label for="username">Email:</label></td>
        <td><span id="sprytextfield1">
        <input name="email" type="text" class="formTextfield_Large" id="email" /><br />
        <span class="textfieldRequiredMsg">A value is required. Invalid</span><span class="textfieldInvalidFormatMsg"> format.</span></span></td>
      </tr>
      <tr class="KT_buttons">
        <td colspan="2"><div align="right">
          <input name="kt_login1" type="submit" class="but" id="kt_login1" value="Send password" />
        </div></td>
      </tr>
    </table>
    <br />
    <br />
  </form>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
//-->
</script>
</body>
</html>