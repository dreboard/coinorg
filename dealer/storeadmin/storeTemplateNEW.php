<?php 
session_start();

include("../../connect.php");
//$userImage = "noPic.jpg";
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
function clearDefault(x){
   if(x.defaultValue==x.value) x.value = "";
}
window.onload = function(){
//	sizeHome();
//	sizeHis();
//	sizeSched();
//	sizeInstruct();
//	sizeContact();
};

function doSomething(obj) {
	obj.style.border = "3px solid #b78727";
}
function doNothing(obj) {
	obj.style.border = "none";
}
</script>

</head>

<body>
<a name="top"></a>
<div id="container"><!--START CONTAINER--><!--END HEADER-->
<div><!--START TOPBOXNAV-->
<div id="navBox">
<table width="90%" border="0" cellpadding="2" cellspacing="0" class="midTable" id="mainMenu">
  <tr id="topRow">
    <td>Mail</td>
    <td>Students</td>
    <td>Calendar/Events</td>
    <td>Business</td>
  </tr>
  <tr id="bottomRow">
    <td><select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option value="">Choose a destination...</option>
    <option value="../mail.php">Mail Inbox</option>
    <option value="../mail.php?create=new">Compose New</option>
    <option value="../commentForm.php">New Comment</option>
    <option value="../contacts.php">My Contacts</option>
    <option value="../comments.php">Read Comments</option>
    <option value="../news/home.php">Newsletters</option>
</select></td>
    <td><select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option value="">Choose a destination...</option>
    <option value="../students.php">View All</option>
    <option value="../attendance.php">Attendance</option>
    <option value="../ranks.php">Promotions</option>
    <option value="../newStudent.php">New Student</option>
    <option value="../studentMonth.php">Student of the Month</option>
    <option value="../familyView.php">Family Accounts</option>
</select></td>
    <td><select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option value="">Choose a destination...</option>
    <option value="../eventMonth.php">View Monthly</option>
    <option value="../eventYear.php">View Year</option>
    <option value="../eventCalendar.php#addEvent">Add New Event</option>
    <option value="../eventMonth.php#monthEvents">This Month Events</option>
    <option value="../schedule.php">View/Edit Schedule</option>
    <option value="../events/demo.php">Demonstrations</option>
    <option value="../events/torney.php">Tournaments</option>
    <option value="../events/seminar.php">Seminars</option>
</select></td>
    <td><select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option value="">Choose a destination...</option>
    <option value="index.php">Manage Store</option>
    <option value="../biz/home.php">Manage Business</option>
    <option value="../instructors.php">Instructors</option>
    <option value="../events/seminar.php">Seminars</option>
</select></td>
  </tr>
</table>
</div>
<table>
  <tr>
    <td width="370"><a href="../home.php"><img src="../../img/logoMainSm.png" alt="main logo" name="headerPic" width="352" height="129" border="0" id="headerPic"></a></td>
    <td width="325" valign="top"><h1>Store Management Area</h1>
<p>Logged in as <?php echo $username ?>, <a href="../../logout.php">Log Out</a></p></td>
  </tr>
</table>
<div id="content">
<?php 
$eventMonth = date("F");// whole (July)
$classYear = date("Y");
$eventYear  = date("Y");
$inactResult = mysql_query("SELECT count(inactiveID) FROM inactiveTrac WHERE eventMonth = 'July' AND eventMonth= 'August' AND eventMonth = 'September' AND eventYear = '$eventYear'") or die(mysql_error());
$inactive_rows = mysql_num_rows($inactResult);
echo $inactive_rows;
?>

<a href="#top">Top</a>
<br class="clear" />
</div></div>
<!--END TOPBOXNAV-->

<p>&nbsp;</p>
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
