<?php 
session_start();
include("../../connect.php");
if (!isset($_SESSION['accountID'])) { 
header("location: ../login.php");
}
if (isset($_SESSION['accountID'])) {
	// Put stored session variables into local php variable
	$accountID = preg_replace('#[^0-9]#i', '', $_SESSION['accountID']); 
	$userLevel = preg_replace('#[^A-Za-z]#i', '', $_SESSION["userLevel"]);
} 
$result = mysql_query("SELECT * FROM accounts WHERE accountID='$accountID'") or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $accountaccountID = $row['accountID'];
  $accountfirstname = $row['firstname'];
  $accountlastname = $row['lastname'];
  $accountrank = $row['rank'];
  $accountuserImage = $row['userImage'];
  $username = $accountlastname. ", " .$accountfirstname;
  }

if (isset( $_POST["addCnt"])) {  
$enterContact = "";
$email = mysql_real_escape_string($_POST["email"]);

$supplyPhone = preg_replace("/[^0-9]/", "", $_POST["supplyPhone"]);
$address = mysql_real_escape_string($_POST["address"]);

$city = mysql_real_escape_string($_POST["city"]);
$state = mysql_real_escape_string($_POST["state"]);

$supplyZip = preg_replace("/[^0-9]/", "", $_POST["supplyZip"]);

$lastName = mysql_real_escape_string($_POST["lastName"]);
$firstName = mysql_real_escape_string($_POST["firstName"]);
$details = strip_tags($_POST['details']);

$website = mysql_real_escape_string($_POST["website"]);
$bizName = mysql_real_escape_string($_POST["bizName"]);

//SET TABLE DEFAULT VALUES
if($address == ""){
	$address = "Blank";
}
if($city == ""){
	$city = "Blank";
}
if($state == ""){
	$state = "Blank";
}
if($zip == ""){
	$zip = "00000";
}
if($website == ""){
	$website = "Blank";
}
if($details == ""){
	$details = "No details for this contact.";
}

if($supplyEmail == ""){
	$supplyEmail = "Blank";
}
if($supplyEmail !== ""){
	$supplyEmail = "Blank";
}
if($supplyEmail !== "" && !filter_var($supplyEmail, FILTER_VALIDATE_EMAIL)) {
    $userMessage .= "$supplyEmail is a  bad E-Maill Address";
	$enterContact = "";
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$sqlChk = mysql_query("SELECT * FROM addressbook WHERE email = '$email'");
$numRows = mysql_num_rows($sqlChk);
if($numRows > 0){
	$userMessage = $email . " already exists";
	$enterContact = "";
}
	
}
elseif($firstName == ""){
	$userMessage .= "Please enter a first name<br />";
	$enterContact = "";
}
elseif($lastName == ""){
	$userMessage .= "Please enter a last name<br />";
	$enterContact = "";
} 
elseif($bizName == ""){
	$userMessage .= "Please enter a business name<br />";
	$enterContact = "";
}else{
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
$enterContact = mysql_query("INSERT INTO addressbook (email, firstName, lastName, phone, address, city, state, zip, details, website, bizName)
VALUES ('$email', '$firstName', '$lastName', '$phone', '$address', '$city', '$state', '$zip', '$details', '$website', '$bizName')") or die (mysql_error());
$userMessage = "New Supplier Created";
unset($supplyName);
unset($supplyFirstName);
unset($supplyLastName);
unset($supplyAddress);
unset($supplyCity);
unset($supplyState);
unset($supplyPhone);
unset($supplyEmail);
unset($supplyWeb);
} else {
	$userMessage = "E-Mail is not valid";
}
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow" />
<title>Store Management Area</title>
<link href="http://www.alikaimartialarts.com/img/aliKai.ico" rel="shortcut icon" />
<link href="../../css/mystyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://www.dreswebstudio.com/javascript/jquery.js"></script>
<script type="text/javascript" src="../../scripts/main.js"></script>
<style type="text/css">

</style>
<script type="text/javascript">


</script>

</head>

<body>
<a name="top"></a>
<div id="container"><!--START CONTAINER--><!--END HEADER-->
<!--START TOPBOXNAV-->
<?php include("../nav.php"); ?>
<table>
  <tr>
    <td width="370"><a href="../home.php"><img src="../../img/logoMainSm.png" alt="main logo" name="headerPic" width="352" height="129" border="0" id="headerPic"></a></td>
    <td width="325" valign="top"><h1>Suppliers List</h1>
<p>Logged in as <?php echo $username ?>, <a href="../../logout.php">Log Out</a></p></td>
  </tr>
</table>
<div id="content">

<table class="midTable" width="60%" border="2" cellspacing="0" cellpadding="0">
  <tr>
    <td>All Suppliers</td>
    <td>New Supplier</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div id="supplyListBox">
<?php 
$eventMonth = date("F");// whole (July)
$classYear = date("Y");
$eventYear  = date("Y");
$activeResult = mysql_query("SELECT count(supplyStatus) FROM suppliers WHERE supplyStatus = 'Active'") or die(mysql_error());
$active_rows = mysql_num_rows($activeResult);
echo $active_rows;
while($row = mysql_fetch_array($activeResult))
  {
  $supplyID = $row['supplyID'];
  $supplyName = $row['supplyName'];
  
  $supplyFirstName = $row['supplyFirstName'];
  $supplyLastName = $row['supplyLastName'];
  
  $supplyAddress = $row['supplyAddress'];
  $supplyCity = $row['supplyCity'];
  $supplyState = $row['supplyState'];
  
  $supplyZip = $row['supplyZip'];
  $supplyPhone = $row['supplyPhone'];
  $supplyEmail = $row['supplyEmail'];
  $supplyWeb = $row['supplyWeb'];
  $supplyDetail = $row['supplyDetail'];
  $supplyStatus = $row['supplyStatus'];
  
  $supplyCategory = $row['supplyCategory'];

  
  $contactName = $supplyLastName. ", " .$supplyFirstName;
  }

?>

</div>



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
<a href="#top">Top</a>
<br class="clear" />
</div>
<!--END TOPBOXNAV-->
<p>&nbsp;</p>
<p>&nbsp;</p></div>
<div id="footer">
  <ul class="events" id="footerLinks">
  <li><a href="../home.php">Home</a></li>
  <li><a href="../attendance.php">Attendance Tracker</a></li>
  <li><a href="../ranks.php">Promote</a></li>
  <li><a href="../newStudent.php">New Student</a></li>
  <li><a href="../students.php">Manage Students</a></li>
  <li><a href="../eventCalendar.php">Events</a></li>
</ul>
<p>Content © Ali Kai Martial Arts  <?php echo date("Y"); ?>,  <br>
Created by <a href="http://www.dreswebstudio.com" title="Dre's Web Studio">dreswebstudio.com</a></p>
</div>

</div><!--END CONTAINER-->
</body>
</html>
