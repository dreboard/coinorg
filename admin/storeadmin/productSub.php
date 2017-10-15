<?php 
session_start();
//error_reporting(0);
error_reporting (E_ALL);
ini_set('display_errors', '1');
include("../../connect.php");
$storeMessage = "";
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
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow" />
<title>Category Page</title>
<link href="http://www.alikaimartialarts.com/img/aliKai.ico" rel="shortcut icon" />
<link href="../../css/mystyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://www.dreswebstudio.com/javascript/jquery.js"></script>
<script type="text/javascript" src="../../scripts/main.js"></script>
<style type="text/css">

</style>
<script type="text/javascript">

function validateMyForm ( ) { 
var isValid = true;
if ( document.productForm.product_name.value == "" ) { 
alert ( "Please enter product name" ); 
isValid = false;

} else if ( document.productForm.price.value == "" ) { 
		alert ( "Please enter product price" ); 
		isValid = false;
} else if ( document.productForm.details.value == "" ) { 
		alert ( "Please enter product details" ); 
		isValid = false;
}
return isValid;
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
<td width="325" valign="top"><h1>Product Category Page</h1>
<p>Logged in as <?php echo $username ?>, <a href="../../logout.php">Log Out</a></p></td>
</tr>
</table>
<div id="content">
<table width="79%" border="3" cellpadding="2" cellspacing="0" class="midTable">
<tr>
<td width="19%"><a href="index.php">Store Home</a></td>
<td width="23%"><a href="inventory_list.php?readAll=1">All Products</a></td>
<td width="34%"><a href="inventory_new.php">+ Add New  Item</a></td>
<td width="24%">Inventory</td>
</tr>
</table>
<div id="productList">
<p id="senderMessage" class="redBold"><?php echo $storeMessage ?></p>
</div>
<!--  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div>
<?php 
include("../../connect.php");
if(isset($_GET["subcategory"])){
$subcategory = $_GET['subcategory'];
$resultAll = mysql_query("SELECT * FROM products WHERE subcategory='$subcategory' ORDER BY product_name ASC") or die(mysql_error());
$allCount = mysql_num_rows($resultAll);
echo "<h2>You have $allCount $subcategory Products</h2>";
while($row = mysql_fetch_array($resultAll))
{
$id = $row["id"];
$product_name = $row["product_name"];
$price = $row["price"];
$category = $row["category"];
$subcategory = $row["subcategory"];
$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));

echo "
<table width='508' cellspacing='0' cellpadding='0'>
<tr>
<td width='164' class='darker' scope='row'>Name</td>
<td width='163'>$product_name</td>
<th width='179' rowspan='6'><img class='productImage' src='../../inventory_images/$id.jpg' alt=' $product_name' border='0' /></th>
</tr>
<tr>
<td scope='row' class='darker'> Category</td>
<td><a href='productCat.php?category=$category&readAll=1'>$category</a></td>
</tr>
<tr>
<td scope='row' class='darker'>Subcategory</td>
<td><a href='productSub.php?subcategory=$subcategory&readAll=1'>$subcategory</a></td>
</tr>
<tr>
<td width='164' class='darker' scope='row'>Date Added</td>
<td>$date_added</td>
</tr>
<tr>
<td width='164' class='darker' scope='row'>Product ID</td>
<td>$id</td>
</tr>
<tr>
<td width='164' class='darker' scope='row'><a href='inventory_edit.php?id=$id'>Edit</a></td>
<td>&#36;$price</td>
</tr>
</table>
<hr />";
}
}
?>
</div><!--END COMMENT DISPLAY-->
<br class="clear" />
<a href="#top">Top</a></div>
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
