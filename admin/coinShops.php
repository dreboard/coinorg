<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if(isset($_POST["registerAccountBtn"])){

$username = mysql_real_escape_string($_POST['username']);
	
$name = mysql_real_escape_string($_POST['name']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = mysql_real_escape_string($_POST['zip']);
$phone = mysql_real_escape_string($_POST['phone']);
$clubEmail = mysql_real_escape_string($_POST['clubEmail']);

if(empty($_POST["ana"])){
	$ana = "0";
	$anaNum = 'None';
	} else {
	$ana = mysql_real_escape_string($_POST['ana']);	
	$anaNum = mysql_real_escape_string($_POST['anaNum']);	
}
if(empty($_POST["png"])){
	$png = "0";
	$pngNum = 'None';
	} else {
	$png = mysql_real_escape_string($_POST['png']);	
	$pngNum = mysql_real_escape_string($_POST['pngNum']);	
}
if($_POST["website"] == ""){
	$website = "None";
	} else {
	$website = mysql_real_escape_string($_POST['website']);	
}

if($_POST["clubDescription"] == ""){
	$clubDescription = "None";
	} else {
	$clubDescription = mysql_real_escape_string($_POST['clubDescription']);	
}


mysql_query("INSERT INTO coinclub(clubName, clubAddress, clubCity, clubState, clubZip, clubPhone, clubEmail, clubWebsite, clubDescription, enterDate, ana, anaNum, png, pngNum) VALUES('$name', '$address', '$city', '$state', '$zip', '$phone', '$clubEmail', '$website', '$clubDescription', '$theDate', '$ana', '$anaNum', '$png', '$pngNum')") or die(mysql_error()); 
$clubID = mysql_insert_id();

mysql_query("INSERT INTO user(username, firstname, lastname, email, password, website, question, answer, viewLevel, userDate, userType, clubID) VALUES('$username', '$firstname', '$lastname', '$email', '$password', '$website', '$question', '$answer', '$viewLevel', '$theDate', 'club', '$clubID')") or die(mysql_error()); 


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Manage Coin Shops</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Manage Coin Shops</h1>
<p>Save Coin Shop</p>
<form name="memberRegForm" id="memberRegForm" method="post" action="">
<fieldset>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3 class="hdrTxt">Club  Info</h3></td>
    <td colspan="3"><span id="clubMsg" class="errorTxt"></span></td>
    </tr>
  <tr>
    <td width="15%"><strong>
    <label for="name">Club Name:</label></strong></td>
    <td colspan="2">
      <input name="name" type="text" id="name" value="<?php if(isset($_POST["name"])){echo $_POST["name"];} else {echo "";}?>" size="50" /></td>
    <td width="48%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
    <label for="address">Address:</label></strong></td>
    <td colspan="2">
      <input name="address" type="text" id="address" value="<?php if(isset($_POST["address"])){echo $_POST["address"];} else {echo "";}?>" size="50" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="city">City:</label>
    </strong></td>
    <td colspan="2"><input name="city" type="text" id="city" value="<?php if(isset($_POST["city"])){echo $_POST["city"];} else {echo "";}?>" size="50" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="state">State:</label>
    </strong></td>
    <td colspan="2">
      <select name="state"  id="clubState">
        <option value="AL">Alabama</option>
        <option value="AK">Alaska</option>
        <option value="AZ">Arizona</option>
        <option value="AR">Arkansas</option>
        <option value="CA">California</option>
        <option value="CO">Colorado</option>
        <option value="CT">Connecticut</option>
        <option value="DE">Delaware</option>
        <option value="DC">Dist of Columbia</option>
        <option value="FL">Florida</option>
        <option value="GA">Georgia</option>
        <option value="HI">Hawaii</option>
        <option value="ID">Idaho</option>
        <option value="IN">Indiana</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="ME">Maine</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="MS">Mississippi</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NV">Nevada</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NM">New Mexico</option>
        <option value="NY">New York</option>
        <option value="NC">North Carolina</option>
        <option value="ND">North Dakota</option>
        <option value="OH" selected="selected">Ohio</option>
        <option value="OK">Oklahoma</option>
        <option value="OR">Oregon</option>
        <option value="PA">Pennsylvania</option>
        <option value="RI">Rhode Island</option>
        <option value="SC">South Carolina</option>
        <option value="SD">South Dakota</option>
        <option value="TN">Tennessee</option>
        <option value="TX">Texas</option>
        <option value="UT">Utah</option>
        <option value="VT">Vermont</option>
        <option value="VA">Virginia</option>
        <option value="WA">Washington</option>
        <option value="WV">West Virginia</option>
        <option value="WI">Wisconsin</option>
        <option value="WY">Wyoming</option>
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label for="zip">Zip:</label>
    </strong></td>
    <td colspan="2"><input id="zip" name="zip" type="text" value="<?php if(isset($_POST["zip"])){echo $_POST["zip"];} else {echo "";}?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="clubEmail">Club Email:</label></strong></td>
    <td colspan="2">
      <input name="clubEmail" type="text" id="clubEmail" value="<?php if(isset($_POST["clubEmail"])){echo $_POST["clubEmail"];} else {echo "";}?>" size="50" />
   </td>
    <td></td>
  </tr>
  <tr>
    <td><strong>
      <label for="clubPhone">Club Phone:</label></strong></td>
    <td colspan="2">
      <input name="phone" type="text" id="clubPhone" value="<?php if(isset($_POST["clubPhone"])){echo $_POST["clubPhone"];} else {echo "";}?>" size="50" />
   </td>
    <td></td>
  </tr>
  <tr>
    <td><strong><label for="website">Website:</label></strong></td>
    <td colspan="2">
      <input name="website" type="text" id="website" value="<?php if(isset($_POST["website"])){echo $_POST["website"];} else {echo "";}?>" size="50" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Ebay ID:</strong></td>
    <td colspan="2"><input name="anaNum" type="text" id="anaNum" value="<?php if(isset($_POST["anaNum"])){echo $_POST["anaNum"];} else {echo "";}?>" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>PNG Member:</strong></td>
    <td width="7%"><input id="png" name="png" type="checkbox" value="1"  />
      Yes</td>
    <td width="30%"># 
      <input name="pngNum" type="text" id="pngNum" value="<?php if(isset($_POST["pngNum"])){echo $_POST["pngNum"];} else {echo "";}?>" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Description:</strong></td>
    <td colspan="3" rowspan="2"><textarea name="clubDescription" id="clubDescription" cols="45" rows="5"></textarea></td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
  
</table>
<hr>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><h3 class="hdrTxt">Personal Info</h3></td>
    <td colspan="2"><span id="infoMsg" class="errorTxt"></span></td>
    </tr>
  <tr>
    <td width="15%"><strong><label for="firstname">First Name:</label></strong></td>
    <td width="32%">
      <input id="firstname" name="firstname" type="text" value="<?php if(isset($_POST["firstname"])){echo $_POST["firstname"];} else {echo "";}?>" /></td>
    <td width="53%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="lastname">Last Name:</label></strong></td>
    <td>
      <input id="lastname" name="lastname" type="text" value="<?php if(isset($_POST["lastname"])){echo $_POST["lastname"];} else {echo "";}?>" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><label for="email">Email:</label></strong></td>
    <td>
      <input id="email" name="email" type="text" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} else {echo "";}?>" />
   </td>
    <td><span id="emailChecker"></span></td>
  </tr>
  
  <tr>
    <td><strong><label for="username">User Name:</label></strong></td>
    <td>
      <input name="username" type="text" id="username" value="<?php if(isset($_POST["username"])){echo $_POST["username"];} else {echo "";}?>" maxlength="10" />
      <input type="button" name="checkUserBtn" id="checkUserBtn" value="Check Availability">
</td>
    <td><span id="availability_status">Max 10 Characters</span></td>
  </tr>
</table>
<hr>

</fieldset>

			<br>
	<fieldset>
			<table width="100%" border="0">
			  <tr>
			    <td width="5%"><input class="miniChk" id="termsBtn" name="Agree" type="checkbox" value="Agree"></td>
			    <td width="78%">I Agree To Terms</td>
			    <td width="17%">&nbsp;
                
                </td>
			  </tr>
			</table>
			<input id="registerAccountBtn" name="registerAccountBtn" type="submit" value="Register" /> <span id="endErrorMsg" class="errorTxt"></span>
			</fieldset>
  </form>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr class="darker">
    <td>User Name</td>
    <td>Join Date</td>
    <td>Coins</td>
    <td>User Level</td>
  </tr>
  <?php 
  $sql = mysql_query("SELECT * FROM ebaysellers ORDER BY SellerID ASC") or die(mysql_error());
while ($row = mysql_fetch_array($sql))
{
	$SellerID = $row["SellerID"];
	$addedDate = date("m/d/y", strtotime($row["addedDate"]));
	$ebaySellersID = $row["ebaySellersID"];
	$website = $row["website"];
	echo '
	  <tr>
    <td><a href="userEbaySeller.php?SellerID='.$SellerID.'">'.$SellerID.'</a></td>
    <td>'.$addedDate.'</td>
    <td></td>
    <td>'.$website.'</td>
  </tr>
	 ';
}
  
  ?>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<?php 
include"../inc/classes/calendar/Calendar.php";
echo monthControls($monthNumber=date('n'), $month=date('m'), $year=date('Y'));
echo draw_calendar(date('n'), date('Y'));
?>



<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>