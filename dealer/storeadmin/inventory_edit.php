<?php 
session_start();
include("../../connect.php");
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////EDIT SCRIPTS///////////////////////////////////////////////////////////////////

// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {

$pid = mysql_real_escape_string($_POST['thisID']);
$product_name = mysql_real_escape_string($_POST['product_name']);
$price = mysql_real_escape_string($_POST['price']);
$category = mysql_real_escape_string($_POST['category']);
$subcategory = mysql_real_escape_string($_POST['subcategory']);
$details = mysql_real_escape_string($_POST['details']);
// See if that product name is an identical match to another product in the system
$sql = mysql_query("UPDATE products SET product_name='$product_name', price='$price', details='$details', category='$category', subcategory='$subcategory' WHERE id='$pid'");
if ($_FILES['fileField']['tmp_name'] != "") {
// Place image in the folder 
$newname = "$pid.jpg";
move_uploaded_file($_FILES['fileField']['tmp_name'], "../../inventory_images/$newname");
}
header("location: inventory_list.php?readAll=1"); 
exit();
}

// Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['id'])) {
$targetID = $_GET['id'];
$sql = mysql_query("SELECT * FROM products WHERE id='$targetID' LIMIT 1");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
while($row = mysql_fetch_array($sql)){ 
$id = $row["id"];
$product_name = $row["product_name"];
$price = $row["price"];
$category = $row["category"];
$subcategory = $row["subcategory"];
$details = $row["details"];
$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
}
} else {
	echo "Product does not exist.";
	exit();
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow" />
<title>Edit Inventory</title>
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
<!--START TOPBOXNAV-->
<?php include("../nav.php"); ?>
<table>
  <tr>
    <td width="370"><a href="../home.php"><img src="../../img/logoMainSm.png" alt="main logo" name="headerPic" width="352" height="129" border="0" id="headerPic"></a></td>
    <td width="325" valign="top"><h1>Product Update</h1>
<p>Logged in as <?php echo $username ?>, <a href="../../logout.php">Log Out</a></p></td>
  </tr>
</table>
<table width="79%" border="1" cellpadding="2" cellspacing="0" class="midTable">
  <tr>
    <td width="19%"><a href="index.php">Store Home</a></td>
    <td width="23%"><a href="inventory_list.php">All Products</a></td>
    <td width="34%"><a href="inventory_new.php">+ Add New  Item</a></td>
    <td width="24%">Inventory</td>
  </tr>
</table>
<div id="content">
<h2>Edit Item (<?php echo $product_name ?>)</h2>
<table width="429" cellspacing="0" cellpadding="0">
<tr>
<td width="125" class="darker" scope="row">Date Added</td>
<td width="148"><?php echo $date_added ?></td>
<th width="154">Current Image</th>
</tr>
<tr>
<td scope="row" class="darker"> Category</td>
<td><a href="productCat.php?category=<?php echo $category ?>"><?php echo $category ?></a></td>
<td rowspan="3"><img class="productImage" src="../inventory_images/<?php echo $id ?>.jpg" alt="<?php echo $product_name ?>" border="0" /></td>
</tr>
<tr>
<td scope="row" class="darker">Subcategory</td>
<td><a href="productSub.php?subcategory=<?php echo $subcategory ?>"><?php echo $subcategory ?></a></td>
</tr>
<tr>
<th scope="row">&nbsp;</th>
<td>&nbsp;</td>
</tr>
</table>


<form action="inventory_edit.php" enctype="multipart/form-data" name="productForm" id="productForm" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" value="<?php echo $product_name; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          $
          <input name="price" type="text" id="price" size="12" value="<?php echo $price; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
<option value="<?php echo $category ?>" selected="selected"><?php echo $category ?></option>
<option value="Clothing">Clothing</option>
<option value="Weapons">Weapons</option>
<option value="Gear">Gear</option>
</select>
        </label></td>
      </tr>
      <tr>
        <td align="right">Subcategory</td>
        <td><select name="subcategory" id="subcategory">
<option value="<?php echo $subcategory ?>"><?php echo $subcategory ?></option>
<option value="Sets">Sets</option>
<option value="Uniforms">Uniforms</option>
<option value="Shirts">Shirts</option>
<option value="Staffs">Staffs</option>
<option value="Blades">Blades</option>
<option value="Head Gear">Head Gear</option>
<option value="Gloves">Gloves</option>
</select></td>
      </tr>
      <tr>
        <td align="right">Product Details</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="5"><?php echo $details; ?></textarea>
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
          <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
          <input type="submit" name="button" id="button" value="Make Changes" onclick="javascript:return validateMyForm();"/>
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
