<?php 
include 'inc/config.php';
include "inc/classes/users/loginChecks.php";

//FORGOT PASSWORD

if(isset($_GET["note2"])){
	$note2 = $_GET["note2"];
} else {
	$note2 = "";
}

//Lost password form
   if(isset($_POST["recoverEmail"])){
   $email = mysql_real_escape_string($_POST['recoverEmail']);
   if($email==''){
   $note2 = "Email is blank";
   header("location: forgotPass.php?note2=$note2");
   }
   if (preg_match( "/[\r\n]/", $email ) ) {
	header("location: yahoo.com");	
}
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

   $result = mysql_query("SELECT * FROM users WHERE email='$email' LIMIT 1") or die(mysql_error());
   if(mysql_num_rows($result)==0){// Email address not in database
   $note2 =  $email . " is not a registered Email";
   }
   if(mysql_num_rows($result)==1){
	 while($row = mysql_fetch_array($result)){ 
		 $accountID = intval($row['accountID']);
		 $accountNumber = safe_b64encode($accountID);
	 }
  $passLink = generateRandomString($length = 10);
   mysql_query("INSERT INTO recover(email, passLink, recoverDate, recoverIP) VALUES ('$email', '$passLink', '$recoverDate', '$loginIP')") or die(mysql_error());
   $to = $email;
   $subject = "Lost Password Request";
   $message = "<p>Welcome to our website!<br />
   You, or someone using your email address has requested the password for your account. If this is an error, ignore this email and you will be removed from our mailing list.<br />
   Your lost link, or copy and paste link:<br>
https://www.mycoinorganizer.com/forgotPassReturn.php?passLink=".$passLink."&accountID=".$accountNumber."</p>";
   $headers = 'From: noreply@mycoinorganizer.com' . "\r\n";
	$headers .= 'Reply-To: noreply@mycoinorganizer.com' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   mail($to, $subject, $message, $headers);
  $note2 = "The reset password link has been sent to " .$email;
   } 
   } else {
	 $note2 = "E-mail is not valid";
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

#button {font-size:190%;}
#coinSubmitTbl {border-collapse:collapse;}
.totalIpt {border:none;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<?php include ("inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/header.php"); ?>
<div id="content" class="clear">

<h2>ANACS Submission Form</h2>
<form>
<table width="100%" border="0">
  <tr>
    <td width="10%"><strong>Name</strong></td>
    <td width="31%"><label for="name"></label>
      <input name="name" type="text" id="name" size="50"></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Phone</strong></td>
    <td><label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" size="50"></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Address</strong></td>
    <td colspan="3"><label for="address"></label>
      <input name="address" type="text" id="address" size="100"></td>
    </tr>
  <tr>
    <td><strong>City</strong></td>
    <td><label for="city"></label>
      <input name="city" type="text" id="city" size="50"></td>
    <td width="13%"><strong>State</strong>
<input name="state" type="text" id="state" size="7"></td>
    <td width="46%"><strong>Zip
      <label for="zip"></label>
      <input type="text" name="zip" id="zip">
    </strong></td>
  </tr>
  <tr>
    <td><strong>E-Mail</strong></td>
    <td><label for="email"></label>
      <input name="email" type="text" id="email" size="50"></td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" border="1" id="coinSubmitTbl" cellpadding="2">
  <tr class="darker">
    <td width="4%">#</td>
    <td width="6%">Qty.</td>
    <td width="9%">Date</td>
    <td width="8%">Mint</td>
    <td width="9%">Denom.</td>
    <td width="18%">Country (if not U.S.)</td>
    <td width="15%">Estimated Value *</td>
    <td width="31%">Attribution/Variety/KM#/Min. (if any)</td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td><input name="state2" type="text" id="state2" size="4"></td>
    <td><input name="textfield2" type="text" id="textfield2" size="10"></td>
    <td><input class="mint" name="state22" type="text" id="state22" size="4"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">2</td>
    <td><input name="state3" type="text" id="state3" size="4"></td>
    <td><input name="textfield3" type="text" id="textfield3" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">3</td>
    <td><input name="state4" type="text" id="state4" size="4"></td>
    <td><input name="textfield4" type="text" id="textfield4" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">4</td>
    <td><input name="state5" type="text" id="state5" size="4"></td>
    <td><input name="textfield5" type="text" id="textfield5" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">5</td>
    <td><input name="state6" type="text" id="state6" size="4"></td>
    <td><input name="textfield6" type="text" id="textfield6" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">6</td>
    <td><input name="state7" type="text" id="state7" size="4"></td>
    <td><input name="textfield7" type="text" id="textfield7" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">7</td>
    <td><input name="state8" type="text" id="state8" size="4"></td>
    <td><input name="textfield8" type="text" id="textfield8" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">8</td>
    <td><input name="state9" type="text" id="state9" size="4"></td>
    <td><input name="textfield9" type="text" id="textfield9" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">9</td>
    <td><input name="state10" type="text" id="state10" size="4"></td>
    <td><input name="textfield10" type="text" id="textfield10" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">10</td>
    <td><input name="state11" type="text" id="state11" size="4"></td>
    <td><input name="textfield11" type="text" id="textfield11" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">11</td>
    <td><input name="state12" type="text" id="state12" size="4"></td>
    <td><input name="textfield12" type="text" id="textfield12" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">12</td>
    <td><input name="state13" type="text" id="state13" size="4"></td>
    <td><input name="textfield13" type="text" id="textfield13" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">13</td>
    <td><input name="state14" type="text" id="state14" size="4"></td>
    <td><input name="textfield14" type="text" id="textfield14" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">14</td>
    <td><input name="state15" type="text" id="state15" size="4"></td>
    <td><input name="textfield15" type="text" id="textfield15" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">15</td>
    <td><input name="state16" type="text" id="state16" size="4"></td>
    <td><input name="textfield16" type="text" id="textfield16" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">16</td>
    <td><input name="state17" type="text" id="state17" size="4"></td>
    <td><input name="textfield17" type="text" id="textfield17" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">17</td>
    <td><input name="state18" type="text" id="state18" size="4"></td>
    <td><input name="textfield18" type="text" id="textfield18" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">18</td>
    <td><input name="state19" type="text" id="state19" size="4"></td>
    <td><input name="textfield19" type="text" id="textfield19" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">19</td>
    <td><input name="state20" type="text" id="state20" size="4"></td>
    <td><input name="textfield20" type="text" id="textfield20" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">20</td>
    <td><input name="state21" type="text" id="state21" size="4"></td>
    <td><input name="textfield21" type="text" id="textfield21" size="10"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <table id="totalTbl" width="100%">
  <tr>
    <td width="10%" align="right"><label for="totalCount"></label>
      <input name="totalCount" type="text" id="totalCount" size="4" readonly class="totalIpt" /></td>
    <td width="16%"><strong>Total Coin Count</strong></td>
    <td width="28%" align="right"><strong>Total Estimated Value</strong></td>
    <td width="15%" align="center"><label for="totalValue"></label>
      <input name="totalValue" type="text" id="totalValue" size="16" readonly class="totalIpt" /></td>
    <td width="6%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
  </tr>
</table>



<p>
  <input type="submit" name="button" id="button" value="Submit To ANACS">
</p>
</form>
<p>ICG Terms &amp; Conditions<br>
  1. ICG reserves the right to refuse to grade coins which ICG, at its sole discretion, decides not to encapsulate in its holders due to previous damage, <br>
  questionable toning or altered surfaces to such coins, or due to negative eye appeal, as determined by ICG.<br>
  2. ICG will credit the account of any Customer whose coins ICG decides not to encapsulate, with a deduction for administration and processing by ICG <br>
  at ICG’s option with the exception of coins ICG determines to be of questionable authenticity or with active corrosion or contamination. For such <br>
  coins you will be charged the full grading fee. At its sole discretion and at any time, ICG may decide to encapsulate any coins that ICG decided not to <br>
  encapsulate at the time of submission by Customer.<br>
  3. Coins submitted to ICG will be graded within a commercially reasonable time-period. ICG assumes no liability of any kind whatsoever to Customer for <br>
  any incidental or consequential damages due to ICG’s delay in grading any coins, or due to any other action or inaction of ICG. Turnaround times may <br>
  not be guaranteed.<br>
  4. Any coins damaged or lost while in the possession of ICG may result in compensation to Customer in accordance with ICG’s standard practices, which <br>
  compensation need not be based upon the stated value on the ICG Submission Form submitted by Customer.<br>
  5. ICG shall assume no liability of any kind whatsoever for damage to any coins due to the failure of an ICG holder or due to damage which occurs while <br>
  any coins are not in ICG’s control or possession.<br>
  6. In the event that coins submitted to ICG must be removed from their holders for re-grade or cross-over services, ICG shall assume no liability of any <br>
  kind whatsoever for removal of coins from their holders and the re-encapsulations of such coins.<br>
  7. All coins sent to Customer by ICG must be inspected by Customer when received. Any damage discovered by Customer must be reported to ICG within <br>
  five days of the Customer’s receipt of such coins.<br>
  8. The grading of coins is an exercise of professional judgment and opinion, which can be subjective and may change from time to time. As a result, ICG <br>
  shall assume no liability of any kind whatsoever and makes no warranties or representations to Customer for any grade assigned by ICG to any coins.<br>
  9. ICG shall assume no liability of any kind whatsoever to Customer for any personal injury or damage to any coin, or otherwise, which occurs as a result <br>
  of breaking open an ICG holder.<br>
  10. Except as expressly set forth herein, ICG disclaims any and all warranties, express or implied, regarding ICG’s grading service and all activities of ICG <br>
  related thereto.<br>
  11. ICG will always try to return any non-Mint holders and tags that are submitted with your coins; however, ICG is not responsible for them in the event <br>
  they are lost or damaged. <br>
  12. The parties understand and agree that these Terms and Procedures confer no rights, duties or obligation to third parties, but only to the parties <br>
  hereto, and that neither party hereto intends to confer any third-party beneficiary or other such rights to anyone not a party to this agreement. <br>
  Notwithstanding anything contained herein, the parties agree that if and to the extent ICG is liable to Customer for damages, such damage is limited <br>
  to and will not exceed the total value of compensation paid to ICG by customer on any particular coin or coins.</p>



</div>
<p>&nbsp;</p>
</div>

<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>