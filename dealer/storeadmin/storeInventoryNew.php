<?php 
include '../inc/config.php';

if (isset($_SESSION['accountID'])) {
	  $accountID = intval($_SESSION['accountID']);
} else {
header('Location: ../login.php');
}
$storeMessage = "";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////EDIT SCRIPTS///////////////////////////////////////////////////////////////////

// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {

$product_name = mysql_real_escape_string($_POST['product_name']);
$price = mysql_real_escape_string($_POST['price']);
$category = mysql_real_escape_string($_POST['category']);
$subcategory = mysql_real_escape_string($_POST['subcategory']);
$details = mysql_real_escape_string($_POST['details']);
// See if that product name is an identical match to another product in the system
$sql = mysql_query("UPDATE products SET product_name='$product_name', price='$price', details='$details', category='$category', subcategory='$subcategory' WHERE id='$pid'");
$pid = mysql_insert_id();
if ($_FILES['fileField']['tmp_name'] != "") {
// Place image in the folder 
$newname = "$pid.jpg";
move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
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
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	

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
<h1>Edit Item (<?php echo $product_name ?>)</h1>
<p id="senderMessage" class="errorTxt"><?php echo $storeMessage ?></p>
<table width="79%" border="3" cellpadding="2" cellspacing="0" class="midTable">
<tr>
<td width="19%"><a href="storeHome.php">Store Home</a></td>
<td width="23%"><a href="storeInventory_list.php?readAll=1">All Products</a></td>
<td width="34%"><a href="storeInventoryNew.php">+ Add New  Item</a></td>
<td width="24%"><a href="storeReports.php">Reports</a></td>
</tr>
</table>
<div id="productList">
<div id="content">
  <form action="" enctype="multipart/form-data" name="productForm" id="productForm" method="post">
  <table width="90%" border="0" cellspacing="0" cellpadding="6">
<tr>
<td width="20%" align="right"><label for="product_name" id="product_nameLbl">Product Name</label></td>
<td width="80%">
<input name="product_name" type="text" id="product_name" size="64" />
</td>
</tr>
<tr>
<td align="right"><label for="price" id="priceLbl">Product Price</label></td>
<td>
<input name="price" type="text" id="price" size="12" />
</td>
</tr>
<tr>
<td align="right"><label for="temple" id="templeLbl">Category</label></td>
<td>
<select name="category" id="category">
<option value="" selected="selected">Select A Category....</option>
<option value="Clothing">Clothing</option>
<option value="Weapons">Weapons</option>
<option value="Gear">Gear</option>
</select>
</td>
</tr>
<tr>
<td align="right">Subcategory</td>
<td><select name="subcategory" id="subcategory">
<option value="">Select A Subcategory....</option>
<option value="Misc">Misc</option>
<option value="Sets">Sets</option>
<optgroup label="Clothing">
<option value="Uniforms">Uniforms</option>
<option value="Shirts">Shirts</option>
<option value="Shoes">Shoes</option>
</optgroup>
<optgroup label="Weapons">
<option value="Staffs">Staffs</option>
<option value="Blades">Blades</option>
</optgroup>
<optgroup label="Gear">
<option value="Head Gear">Head Gear</option>
<option value="Gloves">Gloves</option>
<option value="Guards">Guards</option>
</optgroup>
</select></td>
</tr>
<tr>
  <td align="right" valign="top"><label for="details" id="detailsLbl">Product Description</label></td>
  <td>
  <textarea name="details" id="details" cols="64" rows="5"></textarea>
  </td>
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
<input type="submit" name="productFormBtn" id="productFormBtn" value="Add This Item Now" />
</label></td>
</tr>
</table>
</form>


<br class="clear" />
</div>
</div><!--END COMMENT DISPLAY-->
<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>