<?php 
include 'inc/configSite.php';

$errorTxt = '';
$mailMsg = '';
$captchaCode = "the coin";
$errors = "";

if(isset($_POST["mailFormBtn"])){
	
$from = strip_tags($_POST['from']);	
$to = "dre_board@yahoo.com";	
$subject = "Coin Organizer Message from " . $from;
$captchaImg = strip_tags(strtolower($_POST['captchaImg']));
if($captchaImg !== $captchaCode){
	$errors .= 'Your captcha code is wrong<br/>';  
}

if ($_POST['email'] != "") {  
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
        $errors .= "$email is <strong>NOT</strong> a valid email address.<br/><br/>";  
    }  
} else {  
    $errors .= 'Please enter your email address.<br/>';  
}
//THE MESSAGE
if ($_POST['body'] != "") {  
			$body = strip_tags($_POST['body']);
            $body = filter_var($body, FILTER_SANITIZE_STRING);  
            if ($_POST['body'] == "") {  
                $errors .= 'Please enter a message to send.<br/>';  
            }  
        } else {  
            $errors .= 'Please enter a message to send.<br/>';  
}  
if (!$errors) {  

    $headers = "From: ".$email."\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "Return-Path: ".$email."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$message = '<html><body style="background-color:#CCCCCC;">';
	$message .= '<img style="width:100px; height:auto" src="https://www.mycoinorganizer.com/img/logo.jpg" alt="My Coin Organizer">';
	$message .= '<h1>Hello, World!</h1>';
	
	$message .= '<p>'.$body.'</p>';
	$message .= '</body></html>';
	
    mail($to,$subject,$message,$headers) ;
       $errorTxt = "Email sent";
	   unset($email);
	   unset($from);
	   unset($body);
    } else {
       $errorTxt = "Email could not be sent";
    }
	
} /*else {
	$errorTxt = "Email message not sent";
}*/


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="https://www.mycoinorganizer.com/img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Shop for Coin Supplies" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar, Coin Collecting Software" />


<title>Contact Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){	

$("#mailForm").submit(function() {
      if ($("#name").val() == "") {
        $("#infoMsg").text("Please enter your name...");
		$("#name").addClass("errorInput");
        return false;
      }else if ($("#email").val() == "") {
        $("#infoMsg").text("Please enter your email...");
		$("#email").addClass("errorInput");
        return false;
      } else if ($("#message").val() == "") {
        $("#infoMsg").text("Please enter a message..");
		$("#message").addClass("errorInput");
        return false;
      } else {
	  return true;
	  }
});	

});
</script>  


<style type="text/css">

#message {width:500px;;}

</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body>

<?php include("inc/pageElements/header.php"); ?>

<div id="content" class="clear">


<form name="mailForm" id="mailForm" method="post" action="" class="wideLable">

<fieldset class="editOne">
<h2>Contact Form</h2>
<p id="infoMsg" class="errorTxt"><?php echo $errorTxt; ?><br>
<?php echo $errors; ?></p>
<label for="from">Name:</label>
<input id="from" name="from" type="text" value="<?php if(isset($from)){echo $from;} else {echo "";} ?>" /><br />
<label for="email">E-Mail:</label>
<input id="email" name="email" type="text" value="<?php if(isset($email)){echo $email;} else {echo "";} ?>" /><br>
<label for="body">Message:</label>
<textarea name="body" cols="" rows="" id="body"><?php if(isset($body)){echo $body;} else {echo "";} ?></textarea>
<br>
<p><img src="img/captchaImg.jpg" width="100" height="50" alt="captcha"><br>
<input id="captchaImg" name="captchaImg" type="text" value="" /> 
Enter the text from above
</p>
<br />
<input id="mailFormBtn" name="mailFormBtn" type="submit" value="Send" alt="accountBtn" /> 
<p><img style="width:100px; height:auto; background-color:#CCCCCC;" src="https://www.mycoinorganizer.com/img/logo.jpg" alt="My Coin Organizer"></p>	
</fieldset>

  </form>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="54%">&nbsp;</td>
    <td width="46%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/frontFooter.php"); ?>
</body>
</html>