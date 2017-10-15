<?php 
session_start();
//error_reporting(0);
error_reporting (E_ALL);
ini_set('display_errors', '1');
include("../../connect.php");
$storeMessage = "";

$chooser = "
<select name='size' id='size'>
<option value='' selected='selected'>Select A Size....</option>
<option value='XX Large'>XX Large</option>
<option value='X Large'>X Large</option>
<option value='Large'>Large</option>
<option value='Medium'>Medium</option>
<option value='Small'>Small</option>
</select>";


?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {

$product_name = mysql_real_escape_string($_POST['product_name']);
$price = mysql_real_escape_string($_POST['price']);
$category = mysql_real_escape_string($_POST['category']);
$subcategory = mysql_real_escape_string($_POST['subcategory']);
$details = mysql_real_escape_string($_POST['details']);
$size = mysql_real_escape_string($_POST['size']);
$color = mysql_real_escape_string($_POST['color']);


// See if that product name is an identical match to another product in the system
$sql = mysql_query("SELECT id FROM products WHERE product_name='$product_name' LIMIT 1") or die (mysql_error());
$productMatch = mysql_num_rows($sql); // count the output amount
if ($productMatch > 0) {
$storeMessage = 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
$sql = "";
//exit();
}
// Add this product into the database now
$sql = mysql_query("INSERT INTO products (product_name, price, details, category, subcategory, date_added, color, size) 
  VALUES('$product_name', '$price', '$details', '$category', '$subcategory', now(), '$color', '$size')") or die(mysql_error());

$pid = mysql_insert_id();
$newname = "$pid.jpg";
move_uploaded_file($_FILES['fileField']['tmp_name'], "../../inventory_images/$newname");
header("location: inventory_list.php?readAll=1"); 
exit();
}

?>
<?php 
// Delete Item Question to Admin, and Delete Product if they choose
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	// remove item from system and delete its picture
	// delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	// unlink the image from server
	// Remove The Pic -------------------------------------------
    $pictodelete = ("../../inventory_images/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	header("location: storeInventory_list.php?readAll=1"); 
    exit();
}
?>

<?php 
$product_list = "";
$sql = mysql_query("SELECT * FROM products ORDER BY product_name ASC");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
while($row = mysql_fetch_array($sql)){ 
$id = $row["id"];
$product_name = $row["product_name"];
$price = $row["price"];
$category = $row["category"];
$subcategory = $row["subcategory"];
$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
$product_list .= "
<table width='508' cellspacing='0' cellpadding='0'>
<tr>
<td width='164' class='darker' scope='row'>Name</td>
<td width='163'>$product_name</td>
<th width='179' rowspan='6'><img class='productImage' src='../../inventory_images/$id.jpg' alt=' $product_name' border='0' /></th>
</tr>
<tr>
<td scope='row' class='darker'> Category</td>
<td><a href='productCat.php?category=$category'>$category</a></td>
</tr>
<tr>
<td scope='row' class='darker'>Subcategory</td>
<td><a href='productSub.php?subcategory=$subcategory'>$subcategory</a></td>
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
} else {
	$product_list = "We have no products listed in our store yet";
}
mysql_close();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow" />
<title>All Store Products</title>
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
<td width="325" valign="top"><h1>All Store Products</h1>
<p>Logged in as <?php echo $username ?>, <a href="../../logout.php">Log Out</a></p></td>
</tr>
</table>
<table width="79%" border="3" cellpadding="2" cellspacing="0" class="midTable">
<tr>
<td width="19%"><a href="index.php">Store Home</a></td>
<td width="23%"><a href="inventory_list.php?readAll=1">All Products</a></td>
<td width="34%"><a href="inventory_new.php">+ Add New  Item</a></td>
<td width="24%">Inventory</td>
</tr>
</table>
<div id="content">
<div id="productList">
<p id="senderMessage" class="redBold"><?php echo $storeMessage ?></p>
</div>
<!--  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div>
<?php 
include("../../connect.php");
if(isset($_GET["readAll"])){
if (isset($_GET["page"])) { 
$page  = $_GET["page"]; 
} else { 
$page=1; 
}; 
$start_from = ($page-1) * 5; 
$id = preg_replace('#[^0-9]#i', '', $_GET['readAll']); 

$resultAll = mysql_query("SELECT * FROM products ORDER BY product_name ASC LIMIT $start_from, 5") or die(mysql_error());

$fullCount = mysql_query("SELECT * FROM products") or die(mysql_error());
$allCount = mysql_num_rows($fullCount);

echo "<h2>You have $allCount Products</h2>";
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
<?php 
$sql = "SELECT COUNT(id) FROM products"; 
$rs_result = mysql_query($sql,$con); 
$row = mysql_fetch_array($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 5); 
 
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='inventory_list.php?readAll=$id&page=".$i."'>".$i."</a> "; 
}; 
echo "<br />Page " . $page;
?>
</div><!--END COMMENT DISPLAY-->
<a href="#top">Top</a><br class="clear" />
</div>
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
