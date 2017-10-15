<?php 
include 'inc/config.php';
include_once "inc/pageElements/logSession.php";

$captchaCode = 'the coin';

/////////////////////////////////////////////////// REGISTER//////////////////////////////////////////////////////////////////
if(isset($_POST["registerAccountBtn"])){
$captchaImg = strip_tags(strtolower($_POST['captchaImg']));
if($captchaImg !== $captchaCode){
	$_SESSION['errorMsg'] = '<div id="msgDiv" class="alert alert-danger">Your captcha code is wrong</div>';  
}	elseif ($User->checkEmail($_POST['email']) == true){
	$_SESSION['errorMsg'] = '<div id="msgDiv" class="alert alert-danger">Email is already in use</div>';  
} else {
$username = $General->sanitize($_POST['username']);
$email = $General->sanitize($_POST['email']);

$password = $General->sanitize($_POST['password']);
$firstname = $General->sanitize($_POST['firstname']);
$lastname = $General->sanitize($_POST['lastname']);

$zip = $General->sanitize($_POST['zip']);

$activateCode = $General->random_string(); 
$question = mysql_real_escape_string($_POST['question']);
$answer = mysql_real_escape_string($_POST['answer']);
$viewLevel = mysql_real_escape_string($_POST['viewLevel']);

$sql = mysql_query("INSERT INTO user(username, firstname, lastname, email, password, website, question, answer, viewLevel, userDate, ip, youtube, ebayID) VALUES('$username', '$firstname', '$lastname', '$email', '$password', '".$General->setToNone($_POST['website'])."', '$question', '$answer', '$viewLevel', '$theDate', '".ip2long($_SERVER['REMOTE_ADDR'])."', '".$General->setToNone($_POST['youtube'])."', '".$General->setToNone($_POST['ebayID'])."')") or die(mysql_error()); 

$userID = mysql_insert_id();

$User->sendWelcomeMail($userID, $email, $lastname, $firstname);

header("location: regSuccess.php");
exit();
  } 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>header</title>
<?php include("headItems.php"); ?>
<script type="text/javascript" src="scripts/site/register.js"></script>
<script type="text/javascript">
$(document).ready(function(){	


 



});
</script>  


</head>

<body>
<?php include("inc/pageElements/nav.php"); ?>
     
<div class="container">
<?php echo $_SESSION['message']; ?>
<h2 class="blueHdrTxt2"><span class="glyphicon glyphicon-user"></span>Basic Account Setup</h2>
<form class="form-horizontal" role="form" action="" method="post" name="memberRegForm" id="memberRegForm">


  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">First</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  id="firstname" name="firstname" value="<?php if(isset($_POST["firstname"])){echo $_POST["firstname"];} else {echo "";}?>" placeholder="Your first name" autocomplete="on" required>
    </div>
  </div>


  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Last</label>
    <div class="col-sm-10">
      <input id="lastname" name="lastname" type="text" value="<?php if(isset($_POST["lastname"])){echo $_POST["lastname"];} else {echo "";}?>" class="form-control"  placeholder="Your last name" autocomplete="on" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input id="email" name="email" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} else {echo "";}?>" onBlur="checkEmail();" type="email" class="form-control" placeholder="Valid Email address" autocomplete="on" required>
      <span class="help-block" id="emailHelp"></span>
    </div>
  </div>
  
  
     <div class="form-group">
    <label for="zip" class="col-sm-2 control-label">Zip</label>
    <div class="col-sm-10">
      <input type="text" name="zip" id="zip" value="<?php if(isset($_POST["zip"])){echo $_POST["zip"];} else {echo "";}?>" class="form-control" placeholder="4 digit zip code" autocomplete="on" required>
    </div>
  </div> 
  
       <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" name="username" id="username" value="<?php if(isset($_POST["username"])){echo $_POST["username"];} else {echo "";}?>" class="form-control" autocomplete="on" placeholder="Select a user name" required>
      <span class="help-block" id="infoMsg"></span>
      
    </div>
  </div> 
  <hr>

 <h3 class="hdrTxt">Account Info (All Required)</h3> 
  
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="verify_password" class="col-sm-2 control-label">Verify Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="verify_password" required>
      <span class="help-block" id="passMsg"></span>
    </div>
  </div>
  
     <div class="form-group">
    <label for="question" class="col-sm-2 control-label">Security Question</label>
    <div class="col-sm-10">
      <select name="question" id="question" class="form-control">
      <option value="">Select A Security Question</option>
      <option value="What is the firstname name of your favorite aunt?">What is the firstname name of your favorite aunt?</option>
      <option value="Whats your favorite book?">Whats your favorite book?</option>
      <option value="Whats your favorite sport?">Whats your favorite sport?</option>
      <option value="Whats the name of your elementary school?">Whats the name of your elementary school?</option>
    </select>
    </div>
  </div> 
  
       <div class="form-group">
    <label for="answer" class="col-sm-2 control-label">Security Answer</label>
    <div class="col-sm-10">
      <input type="text" name="answer" id="answer" value="<?php if(isset($_POST["answer"])){echo $_POST["answer"];} else {echo "";}?>" class="form-control" placeholder="answer" required>
    </div>
  </div>   
<hr>

  <h3 class="hdrTxt">Social Info (Not Required)</h3>
  
  
       <div class="form-group">
    <label for="website" class="col-sm-2 control-label">Yor Website</label>
    <div class="col-sm-10">
      <input type="text" name="website" id="website" value="<?php if(isset($_POST["website"])){echo $_POST["website"];} else {echo "";}?>" class="form-control" placeholder="URL">
    </div>
  </div>     
  
        <div class="form-group">
    <label for="youtube" class="col-sm-2 control-label">youtube Channel</label>
    <div class="col-sm-10">
      <input type="text" name="youtube" id="youtube" value="<?php if(isset($_POST["youtube"])){echo $_POST["youtube"];} else {echo "";}?>" class="form-control" placeholder="youtube Channel Name">
    </div>
    
  </div>  
         <div class="form-group">
    <label for="ebayID" class="col-sm-2 control-label">ebayID</label>
    <div class="col-sm-10">
      <input type="text" name="ebayID" id="ebayID" value="<?php if(isset($_POST["ebayID"])){echo $_POST["ebayID"];} else {echo "";}?>" class="form-control" placeholder="eBay User Name">
    </div>
  </div>   
<hr>

<h3 class="blueHdrTxt">Website Terms of Use</h3>
<div id="termsHolder">
<div id="terms">
<p><strong>PRIVACY</strong></p>
  <p>Please review our <a href="privacy.php">Privacy Policy</a>, which also governs your visit to MyCoinOrganizer.com, to understand our privacy practices.</p>
  <p><strong>ELECTRONIC COMMUNICATIONS</strong></p>
  <p>When you visit MyCoinOrganizer.com or send e-mails to us, you are communicating with us electronically. You consent to receive communications from us electronically. We will communicate with you by e-mail or by posting notices on this site. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.</p>
  <p><strong>COPYRIGHT</strong></p>
  <p>Unless otherwise stated, all content included on this site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of MyCoinOrganizer or its suppliers and protected by United States and international copyright laws. The compilation of all content on this site is the exclusive property of MyCoinOrganizer and protected by U.S. and international copyright laws.</p>
  <p><strong>LICENSE AND SITE ACCESS</strong></p>
  <p>MyCoinOrganizer grants you a limited license to access and make personal use of this site and not to download (other than page caching) or modify it, or any portion of it, except with express written consent of MyCoinOrganizer. This license does not include any resale or commercial use of this site or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this site or its contents; any downloading or copying of account information for the benefit of another merchant; or any use of data mining, robots, or similar data gathering and extraction tools. This site or any portion of this site may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of MyCoinOrganizer. You may not frame or utilize framing techniques to enclose any trademark, logo, or other proprietary information (including images, text, page layout, or form) of MyCoinOrganizer without express written consent. You may not use any meta tags or any other "hidden text" utilizing MyCoinOrganizer's name or trademarks without the express written consent of MyCoinOrganizer. Any unauthorized use terminates the permission or license granted by MyCoinOrganizer. You are granted a limited, revocable, and nonexclusive right to create a hyperlink to the home page of MyCoinOrganizer.com so long as the link does not portray MyCoinOrganizer, or its products or services in a false, misleading, derogatory, or otherwise offensive matter. You may not use any MyCoinOrganizer logo or other proprietary graphic or trademark as part of the link without express written permission.</p>
  <p><strong>YOUR ACCOUNT</strong></p>
  <p>If you use this site, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under your account or password. MyCoinOrganizer does sell products for children, but it sells them to adults, who can purchase with a credit card or other permitted payment method. If you are under 18, you may use MyCoinOrganizer.com only with involvement of a parent or guardian. MyCoinOrganizer reserves the right to refuse service, terminate accounts, remove or edit content, or cancel orders in their sole discretion.</p>
  <p><strong>REVIEWS, COMMENTS, COMMUNICATIONS, AND OTHER CONTENT</strong></p>
  <p>Visitors may post reviews so long as the content is not illegal, obscene, threatening, defamatory, invasive of privacy, infringing of intellectual property rights, or otherwise injurious to third parties or objectionable and does not consist of or contain software viruses, political campaigning, commercial solicitation, chain letters, mass mailings, or any form of "spam." You may not use a false e-mail address, impersonate any person or entity, or otherwise mislead as to the origin of the content. MyCoinOrganizer reserves the right (but not the obligation) to remove or edit such content, but does not regularly review posted content.</p>
  <p>If you do post content or submit material, and unless we indicate otherwise, you grant MyCoinOrganizer a nonexclusive, royalty-free, perpetual, irrevocable, and fully sublicensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content throughout the world in any media. You grant MyCoinOrganizer and sublicensees the right to use the name that you submit in connection with such content, if they choose. You represent and warrant that you own or otherwise control all of the rights to the content that you post; that the content is accurate; that use of the content you supply does not violate this policy and will not cause injury to any person or entity; and that you will indemnify MyCoinOrganizer for all claims resulting from content you supply. MyCoinOrganizer has the right but not the obligation to monitor and edit or remove any activity or content. MyCoinOrganizer takes no responsibility and assumes no liability for any content posted by you or any third party.</p>
  <p><strong>PRODUCT DESCRIPTIONS</strong></p>
<p>MyCoinOrganizer attempts to be as accurate as possible. However, MyCoinOrganizer does not warrant that product descriptions or other content of this site is accurate, complete, reliable, current, or error-free. If a product offered by MyCoinOrganizer is not as described, your sole remedy is to return it in unused condition.</p>
  <p><strong>DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY</strong></p>
<p>THIS SITE AND ALL INFORMATION, CONTENT, MATERIALS, PRODUCTS  AND SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE ARE PROVIDED BY MyCoinOrganizer ON AN "AS IS" AND "AS AVAILABLE" BASIS, UNLESS OTHERWISE SPECIFIED IN WRITING. MyCoinOrganizer MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE OPERATION OF THIS SITE OR THE INFORMATION, CONTENT, MATERIALS, PRODUCTS OR SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE, UNLESS OTHERWISE SPECIFIED IN WRITING. YOU EXPRESSLY AGREE THAT YOUR USE OF THIS SITE IS AT YOUR SOLE RISK.</p>
  <p>TO THE FULL EXTENT PERMISSIBLE BY APPLICABLE LAW, MyCoinOrganizer DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. MyCoinOrganizer DOES NOT WARRANT THAT THIS SITE; INFORMATION, CONTENT, MATERIALS, PRODUCTS OR SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE; THEIR SERVERS; OR E-MAIL SENT FROM MyCoinOrganizer ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. MyCoinOrganizer WILL NOT BE LIABLE FOR ANY DAMAGES OF ANY KIND ARISING FROM THE USE OF THIS SITE OR FROM ANY INFORMATION, CONTENT, MATERIALS, PRODUCTS OR SERVICES INCLUDED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE, INCLUDING, BUT NOT LIMITED TO DIRECT, INDIRECT, INCIDENTAL, PUNITIVE, AND CONSEQUENTIAL DAMAGES, UNLESS OTHERWISE SPECIFIED IN WRITING.</p>
  <p>CERTAIN STATE LAWS DO NOT ALLOW LIMITATIONS ON IMPLIED WARRANTIES OR THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES. IF THESE LAWS APPLY TO YOU, SOME OR ALL OF THE ABOVE DISCLAIMERS, EXCLUSIONS, OR LIMITATIONS MAY NOT APPLY TO YOU, AND YOU MIGHT HAVE ADDITIONAL RIGHTS.</p>
  <p><strong>APPLICABLE LAW</strong></p>
  <p>By visiting MyCoinOrganizer.com, you agree that the laws of the State of Ohio, without regard to principles of conflict of laws, will govern these Terms and Conditions and any dispute of any sort that might arise between you and MyCoinOrganizer.</p>
  <p><strong>DISPUTES</strong></p>
  <p>Any dispute relating in any way to your visit to MyCoinOrganizer.com or to products or services sold or distributed by MyCoinOrganizer or through MyCoinOrganizer.com shall be adjudicated in any state or federal court in Fairfax County, Virginia, and you consent to exclusive jurisdiction and venue in such courts.</p>
  <p><strong>SITE POLICIES, MODIFICATION, AND SEVERABILITY</strong></p>
  <p>We reserve the right to make changes to our site, policies, and these Terms and Conditions at any time. If any of these conditions shall be deemed invalid, void, or for any reason unenforceable, that condition shall be deemed severable and shall not affect the validity and enforceability of any remaining condition.</p>
			  </div>	
			  </div>  
   <br />
 <div class="checkbox">
  <label>
    <input type="checkbox" id="termsBtn" value="">
    I Agree To Terms
  </label>
</div> 
 <br />


  <div class="form-group">
    <img src="img/captchaImg.jpg" width="100" height="50" alt="captcha">
    <div class="col-xs-3">
      <input  id="captchaImg" name="captchaImg" type="text" value="" class="form-control" required>
     <span class="help-block">Enter the text from the image</span> 
    </div>
  </div>

 <br />
   <br />
  <div class="form-group">
      <button type="submit" class="btn btn-primary" id="registerAccountBtn" name="registerAccountBtn"> Create Account </button>
  </div>
</form>

<p><a class="topLink" href="#top">Top</a></p>


<?php include("inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>