<?php 
session_start();
//error_reporting(0);
error_reporting (E_ALL);
ini_set('display_errors', '1');
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
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	
    $product_name = mysql_real_escape_string($_POST['product_name']);
	$price = mysql_real_escape_string($_POST['price']);
	$category = mysql_real_escape_string($_POST['category']);
	$subcategory = mysql_real_escape_string($_POST['subcategory']);
	$details = mysql_real_escape_string($_POST['details']);
	// See if that product name is an identical match to another product in the system
	$sql = mysql_query("SELECT id FROM products WHERE product_name='$product_name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
		exit();
	}
	// Add this product into the database now
	$sql = mysql_query("INSERT INTO products (product_name, price, details, category, subcategory, date_added) 
        VALUES('$product_name','$price','$details','$category','$subcategory',now())") or die (mysql_error());
     $pid = mysql_insert_id();
	// Place image in the folder 
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "../../inventory_images/$newname");
	header("location: inventory_list.php"); 
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
	header("location: inventory_list.php"); 
    exit();
}
?>

<?php 
// This block grabs the whole list for viewing
$product_list = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
	 $id = $row["id"];
	 $product_name = $row["product_name"];
	 $price = $row["price"];
	 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
	 $product_list .= "Product ID: $id - <strong>$product_name</strong> - $$price - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; <a href='inventory_edit.php?pid=$id'>edit</a> &bull; <a href='inventory_list.php?deleteid=$id'>delete</a><br />";
    }
} else {
	$product_list = "You have no products listed in your store yet";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow" />
<title>Admin Home Page</title>
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
//    } else if ( document.productForm.uName.value.length < 8 ) { 
//            alert ( "Your name must be at least 8 characters long" ); 
//            isValid = false;
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
<div><!--START TOPBOXNAV-->
<table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><a href="../home.php"><img src="../../img/home.png" alt="Home Page" name="homeBtn" width="156" height="40" id="homeBtn"></a></td>
<td><a href="../attendance.php"><img src="../../img/attendanceBtn.png" alt="Home Page" name="schedBtn" width="156" height="40" id="schedBtn"></a></td>
<td><a href="../mail.php"><img src="../../img/mailBtn.png" alt="Home Page" name="hisBtn" width="156" height="40" id="hisBtn"></a></td>
<td><a href="../eventCalendar.php"><img src="../../img/eventBtn.png" alt="Home Page" name="instructBtn" width="156" height="40" id="instructBtn"></a></td>
<td><a href="../students.php"><img src="../../img/manageBtn.png" alt="Home Page" name="contactBtn" width="126" height="40" id="contactBtn"></a></td>
</tr>
</table>
<table>
  <tr>
    <td width="370"><a href="../home.php"><img src="../../img/logoMainSm.png" alt="main logo" name="headerPic" width="352" height="129" border="0" id="headerPic"></a></td>
    <td width="325" valign="top"><h1>Admin Area</h1>
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
<div id="productList">
<h2>Inventory list</h2>
<?php echo $product_list; ?>
</div>
<a name="inventoryForm" id="inventoryForm"></a>
<h3>&darr; Add New Inventory Item Form &darr;</h3>
<form action="inventory_list.php" enctype="multipart/form-data" name="productForm" id="productForm" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          $
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
          <option value="Clothing">Clothing</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td align="right">Subcategory</td>
        <td><select name="subcategory" id="subcategory">
        <option value=""></option>
          <option value="Hats">Hats</option>
          <option value="Pants">Pants</option>
          <option value="Shirts">Shirts</option>
          </select></td>
      </tr>
      <tr>
        <td align="right">Product Details</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Add This Item Now" onclick="javascript:return validateMyForm();"/>
        </label></td>
      </tr>
    </table>
    </form>


<br class="clear" />
</div>
<!--END TOPBOXNAV-->
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
