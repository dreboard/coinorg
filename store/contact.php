<?php 
include("inc/config.php");

$errorTxt = '';
$mailMsg = '';
$captchaCode = "the coin";
$errors = "";

if(isset($_POST["mailFormBtn"])){
	
$from = strip_tags($_POST['email']);	
$to = "admin@mycoinorganizer.com";	
$subject = strip_tags($_POST['subject'])." from Lincoln Cents Web Store";
$captchaImg = strip_tags(strtolower($_POST['captchaImg']));
if($captchaImg !== $captchaCode){
	$errorTxt .= 'Your captcha code is wrong<br/>';  
}

if ($_POST['email'] != "") {  
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
        $errorTxt .= "$email is <strong>NOT</strong> a valid email address.<br/><br/>";  
    }  
} else {  
    $errorTxt .= 'Please enter your email address.<br/>';  
}
//THE MESSAGE
if ($_POST['body'] != "") {  
			$body = strip_tags($_POST['body']);
            $body = filter_var($body, FILTER_SANITIZE_STRING);  
            if ($_POST['body'] == "") {  
                $errorTxt .= 'Please enter a message to send.<br/>';  
            }  
        } else {  
            $errorTxt .= 'Please enter a message to send.<br/>';  
}  
if (!$errorTxt) {  

    $headers = "From: ".$email."\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "Return-Path: ".$email."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$message = '<html><body style="background-color:#CCCCCC;">';
	$message .= '<img style="width:100px; height:auto" src="https://www.mycoinorganizer.com/img/logo.jpg" alt="My Coin Organizer">';
	$message .= '<h1>Lincoln Store Customer Email</h1>';
	
	$message .= '<p>'.$body.'</p>';
	$message .= '</body></html>';
	
    mail($to,$subject,$message,$headers) ;
	header("location: mailReceived.php");
	exit();
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lincoln Cents</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">
#message {width:100%;}
</style>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
  <br />  
<h2 id="pageHdr">Contact Us</h2>

<table width="395" border="0">
  <tr>
    <td width="50%" align="center"><img src="img/callLogo.png" width="100" height="100" /></td>
    <td align="center"><iframe width="170" height="100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?oe=utf-8&amp;client=firefox-a&amp;q=map+toledo+ohio&amp;ie=UTF8&amp;hq=&amp;hnear=Toledo,+Lucas,+Ohio&amp;gl=us&amp;t=m&amp;ll=41.664192,-83.555145&amp;spn=0.051296,0.11673&amp;z=11&amp;iwloc=A&amp;output=embed"></iframe></td>
  </tr>
  <tr>
    <td width="50%" align="center"><h2>(419) 210-5062</h2></td>
    <td align="center">
    P.O. Box 5411<br />
Toledo, OH 43613    
    </td>
  </tr>
</table>
<hr />
<h3>Customer Service Form</h3>
<form action="" method="post" name="mailForm" id="mailForm">


<table width="100%" border="0">
  <tr>
    <td width="15%"><h3>Type of Service:</h3></td>
    <td width="85%" id="errorDisplay" class="errorTxt">&nbsp;</td>
  </tr>
</table>

<table width="300" border="0">
  <tr>
    <td width="39" align="center"><input name="subject" type="radio" class="labelStill" id="return" value="I Need to Return A Product" /></td>
    <td width="251"><label for="return">I Need to Return A Product</label></td>
  </tr>
  <tr>
    <td align="center"><input type="radio" name="subject" value="I Have A Product Question" id="question" class="labelStill" /></td>
    <td><label for="question">I Have A Product Question</label></td>
  </tr>
  <tr>
    <td align="center"><input type="radio" name="subject" value="Suggestions" id="suggestion" class="labelStill" /></td>
    <td><label for="suggestion">Suggestions</label></td>
  </tr>
  <tr>
    <td align="center"><input type="radio" name="subject" value="Other" id="other" class="labelStill" /></td>
    <td><label for="other">Other</label></td>
  </tr>
</table>
<br />
<table width="57%" border="0">
  <tr>
    <td width="13%"><label for="name">Name</label></td>
    <td width="87%"><input name="name" type="text" id="name" size="50" maxlength="50" /></td>
  </tr>
  <tr>
    <td><label for="email">Email</label></td>
    <td><input name="email" type="text" id="email" size="50" maxlength="50" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="message">Message</label></td>
    <td><textarea name="body" id="message"></textarea></td>
  </tr>
  <tr>
    <td colspan="2">
  <img src="http://www.mycoinorganizer.com/img/captchaImg.jpg" width="100" height="50" alt="captcha"><br>
<input id="captchaImg" name="captchaImg" type="text" value="" /> 
Enter the text from above
 
    </td>
    </tr>
  <tr>
    <td colspan="2"><input name="mailFormBtn" type="submit" value="Contact Me" id="mailFormBtn" onclick="return goService()" /></td>
    </tr>
</table>
<p id="senderMessage" class="clear"><?php echo $senderMessage; ?>&nbsp;</p>
&nbsp;&nbsp;
</form>

  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>