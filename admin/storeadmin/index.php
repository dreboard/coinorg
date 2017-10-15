<?php 
session_start();
include("../../connect.php");
//$userImage = "noPic.jpg";
if (!isset($_SESSION['accountID'])) { 
header("location: ../../login.php");
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
  if(isset($_GET["searchMessage"])){
	$searchMessage = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["searchMessage"]);
}else {
	$searchMessage = "";
} 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow" />
<title>Manage Store</title>
<link href="http://www.alikaimartialarts.com/img/aliKai.ico" rel="shortcut icon" />
<link href="../../css/mystyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://www.dreswebstudio.com/javascript/jquery.js"></script>
<script type="text/javascript" src="../../scripts/main.js"></script>
<style type="text/css">
#searchProductForm{width:275px;}
</style>
<script type="text/javascript">
function clearDefault(x){
   if(x.defaultValue==x.value) x.value = "";
}
function searchVal(){
var searchMessage = document.getElementById("searchMessage");
var searchEventsBox = document.getElementById("searchEventsBox");
valid = true; 
if (searchEventsBox.value === ""){ 
searchEventsBox.style.border = "solid #900 2px";
searchEventsBox.focus();
searchMessage.innerHTML = "Enter Search"; 
valid = false;
}
return valid;
}

function doProduct(obj) {
	var newProduct = document.getElementById("newProduct");
	var explainCell = document.getElementById("explainCell");
	explainCell.innerHTML = "Add A New Product"
	newProduct.style.border = "3px solid #b78727";
}

//////
function doAll(obj) {
	var allProduct = document.getElementById("allProduct");
	var explainCell = document.getElementById("explainCell");
	explainCell.innerHTML = "View All Products"
	allProduct.style.border = "3px solid #b78727";
}

//////
function doCustomer(obj) {
	var customers = document.getElementById("customers");
	var explainCell = document.getElementById("explainCell");
	explainCell.innerHTML = "Store Customer Managenent"
	customers.style.border = "3px solid #b78727";
}

//////
function doMail(obj) {
	var mailCatalog = document.getElementById("mailCatalog");
	var explainCell = document.getElementById("explainCell");
	explainCell.innerHTML = "Send Customer Mail Catalogs"
	mailCatalog.style.border = "3px solid #b78727";
}

function doNothing(obj) {
	obj.style.border = "none";
}
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
    <td width="325" valign="top"><h1>Manage Store</h1>
<p>Logged in as <?php echo $username ?>, <a href="../../logout.php">Log Out</a></p></td>
  </tr>
</table>
<div id="content">
<table id="adminTable">
<tr>
<td colspan="4" id="explainCell">&nbsp;</td>
</tr>
<tr>
<td width="294" rowspan="2" valign="top">
<p>Quick Links</p>
<ul>
<li><a href="inventory_list.php?readAll=1">All Products</a></li>
<li><a href="../newStudent.php">Add New Product</a></li>
<li><a href="supply.php">Suppliers</a> (Mail)</li>
<li><a href="../commentForm.php">New Message</a> (Comment)</li>
</ul>
<form id="searchProductForm" name="searchProductForm" method="post" action="" onsubmit="return searchVal();">
<label for="searchEventsBox">Search </label>
<input name="searchEventsBox" type="text" id="searchEventsBox" value="" /><br />
<input name="searchEventsBtn" id="searchEventsBtn" type="submit" value="Find A Product" onclick="this.value='Searching....'" />
</form>
<p id="searchMessage" class="redBold"><?php echo $searchMessage; ?>&nbsp;</p>
</td>
<td width="214"><a href="inventory_new.php"><img src="../../img/productNew.jpg" alt="New Product" name="newProduct" width="182" height="140" id="newProduct" onMouseOver="doProduct(this)" onMouseOut="doNothing(this)"></a></td>
    <td width="214"><a href="inventory_list.php?readAll=1"><img src="../../img/productAll.jpg" alt="All Products" name="allProduct" width="182" height="140" id="allProduct" onMouseOver="doAll(this)" onMouseOut="doNothing(this)"></a></td>
    <td width="200"><a href="supply.php"><img src="../../img/manageSupply.jpg" width="182" height="140" alt="suppliers"></a></td>
  </tr>
  <tr>
    <td><a href="accounts.php"><img src="../../img/productAccounts.jpg" alt="Customer Accounts" name="customers" width="182" height="140" id="customers" onMouseOver="doCustomer(this)" onMouseOut="doNothing(this)"></a></td>
    <td><a href="catalog.php"><img src="../../img/productMailCat.jpg" alt="Mail Catalog" name="mailCatalog" width="182" height="140" id="mailCatalog" onMouseOver="doMail(this)" onMouseOut="doNothing(this)"></a></td>
    <td><img src="../../img/manageFinance.jpg" width="182" height="140" alt="finance"></td>
  </tr>
  <tr>
    <td class="bizCell headCell">Pending Orders <a href="orders.php">0</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<br class="clear" />
</div><!--END TOPBOXNAV-->
<a href="#top">Top</a>
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
