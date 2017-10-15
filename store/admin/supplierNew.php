<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";

if (isset( $_POST["supplyFormBtn"])) {  
$supplyName = mysql_real_escape_string($_POST["supplyName"]);
$supplyFirstName = mysql_real_escape_string($_POST["supplyFirstName"]);
$supplyLastName = mysql_real_escape_string($_POST["supplyLastName"]);
$supplyPhone = preg_replace("/[^0-9]/", "", $_POST["supplyPhone"]);
$supplyAddress = mysql_real_escape_string($_POST["supplyAddress"]);
$supplyCity = mysql_real_escape_string($_POST["supplyCity"]);
$supplyState = mysql_real_escape_string($_POST["supplyState"]);
$supplyZip = preg_replace("/[^0-9]/", "", $_POST["supplyZip"]);
$supplyEmail = mysql_real_escape_string($_POST["supplyEmail"]);
$supplyWeb = mysql_real_escape_string($_POST["supplyWeb"]);
$supplyDetail = mysql_real_escape_string($_POST["supplyDetail"]);
$supplyStatus = mysql_real_escape_string($_POST["supplyStatus"]);
$supplyCategory = mysql_real_escape_string($_POST["supplyCategory"]);

$enterContact = mysql_query("INSERT INTO addressbook (email, firstName, lastName, phone, address, city, state, zip, details, website, bizName)
VALUES ('$email', '$firstName', '$lastName', '$phone', '$address', '$city', '$state', '$zip', '$details', '$website', '$bizName')") or die (mysql_error());

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>New Supplier</title>
<script type="text/javascript">
$(document).ready(function(){	
$('#recoverDiv').hide();
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });


});
</script>  


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>New Supplier</h1>
<table class="midTable" width="60%" border="2" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="supplierAll.php">Suppliers</a></td>
    <td><a href="supplierNew.php">New Supplier</a></td>
    <td>&nbsp;</td>
  </tr>
</table>
<form id="supplyForm" action="" method="post">
<fieldset><legend class="bigLegend">Contact Info</legend>
<label for="supplyName">Business</label>
<input name="supplyName" id="supplyName" type="text" value="<?php if(isset($supplyName)){ echo $supplyName;}?>" /><span class="required"> *</span><br />

<label for="supplyFirstName">Contact First</label>
<input name="supplyFirstName" id="supplyFirstName" type="text" value="<?php if(isset($supplyFirstName)){ echo $supplyFirstName;}?>" /><span class="required"> *</span><br />

<label for="supplyLastName">Contact Last</label>
<input name="supplyLastName" id="supplyLastName" type="text" value="<?php if(isset($supplyLastName)){ echo $supplyLastName;}?>" /><span class="required"> *</span><br />

<label for="supplyAddress">Address</label>
<input name="supplyAddress" id="supplyAddress" type="text" value="<?php if(isset($supplyAddress)){ echo $supplyAddress;}?>" /><span class="required"> *</span><br />

<label for="supplyCity">City</label>
<input name="supplyCity" id="supplyCity" type="text" value="<?php if(isset($supplyCity)){ echo $supplyCity;}?>" /><span class="required"> *</span><br />

<label for="supplyState">State</label>
<select id="supplyState" name="supplyState">
  <option value="">Select One</option>
  <option value="AK">Alaska</option>
  <option value="AL">Alabama</option>
  <option value="AR">Arkansas</option>
  <option value="AZ">Arizona</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DC">District of Columbia</option>
  <option value="DE">Delaware</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="IA">Iowa</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="MA">Massachusetts</option>
  <option value="MD">Maryland</option>
  <option value="ME">Maine</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MO">Missouri</option>
  <option value="MS">Mississippi</option>
  <option value="MT">Montana</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="NE">Nebraska</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NV">Nevada</option>
  <option value="NY">New York</option>
  <option value="OH" selected>Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="PR">Puerto Rico</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VA">Virginia</option>
  <option value="VT">Vermont</option>
  <option value="WA">Washington</option>
  <option value="WI">Wisconsin</option>
  <option value="WV">West Virginia</option>
  <option value="WY">Wyoming</option>
</select><span class="required"> *</span><br />


<label for="supplyZip">Zip</label>
<input name="supplyZip" id="supplyZip" type="text" value="<?php if(isset($supplyZip)){ echo $supplyZip;}?>" /><span class="required"> *</span><br />

<label for="supplyPhone">Phone</label>
<input name="supplyPhone" id="supplyPhone" type="text" value="<?php if(isset($supplyPhone)){ echo $supplyPhone;}?>" /><span class="required"> *</span><br />

<label for="supplyEmail">E-Mail</label>
<input name="supplyEmail" id="supplyEmail" type="text" value="<?php if(isset($supplyEmail)){ echo $supplyEmail;}?>" /><br />

<label for="supplyWeb">Website</label>
<input name="supplyWeb" id="supplyWeb" type="text" value="<?php if(isset($supplyWeb)){ echo $supplyWeb;}?>" /><br />

<label for="supplyFax">Fax</label>
<input name="supplyFax" id="supplyFax" type="text" value="<?php if(isset($supplyFax)){ echo $supplyFax;}?>" /><br />
</fieldset>
<br />
<fieldset><legend class="bigLegend">Supplier Account</legend>
<label for="supplyNumber">Account #</label>
<input name="supplyNumber" id="supplyNumber" type="text" value="<?php if(isset($supplyNumber)){ echo $supplyNumber;}?>" /><br />

<label for="supplyCategory">Supply Type</label>
<select id="supplyCategory" name="supplyCategory">
  <option value="">Select One</option>
  <option value="Equipment">Equipment</option>
  <option value="Uniforms">Uniforms</option>
  <option value="Building">Building</option>
  <option value="Service">Service</option>
  <option value="Other">Other</option>
  </select><span class="required"> *</span><br />

<label for="supplyDetail">Details</label>
<textarea name="supplyDetail" id="supplyDetail"><?php if(isset($supplyDetail)){ echo $supplyDetail;}?> </textarea><br />

</fieldset>
<input type="submit" name="supplyFormBtn" id="supplyFormBtn" value="Add Supplier" />
</form>
<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>