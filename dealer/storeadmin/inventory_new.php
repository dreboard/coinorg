<?php 

//error_reporting(0);
error_reporting (E_ALL);
ini_set('display_errors', '1');
include("../../inc/config.php");
$storeMessage = "";
$username = "Dre"; 
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
$product_list = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $product_list .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="../../inventory_images/' . $id . '.jpg" alt="' . $product_name . '" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="inventory_edit.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
	$product_list = "We have no products listed in our store yet";
}
mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="../scripts/main.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<title>Admin Home</title>

<style type="text/css">
#priceListForm input[type=text]{width:80px;}
.errorTxt {color:#900; font-weight:bold;}
.errorInput {border:solid 1px #900;}
</style>
<link rel="stylesheet" type="text/css" href="../../style.css"/>
<script type="text/javascript">
$(document).ready(function(){
$("form :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
}).blur(function() {
  $("label").removeClass("labelfocus");
});

$("#product_name").focus(function() {
  $("#product_nameLbl").text("Product Name").removeClass("errorTxt");
  $(this).removeClass("errorInput");
});
$("#category").focus(function() {
  $("#categoryLbl").text("Category").removeClass("errorTxt");
  $(this).removeClass("errorInput");
});



$("input#color").focus(function() {
  $(this).val("");
  $("#color").removeClass("errorInput");
  $("#colorLbl").text("Color").removeClass("errorTxt");  
});

$("input:radio[name=color]").click(function(){ 
  $("input#color").val($(this).val()); 

});

$("#productForm").submit(function() {
  if ($("#product_name").val() == "") {
	$("#product_name").addClass("errorInput");
	$("#product_nameLbl").text("Add Product Name...").addClass("errorTxt");
	return false;
  }else if ($("#price").val() == "") {
	$("#price").addClass("errorInput");
	$("#priceLbl").text("Add Product Price...").addClass("errorTxt");
	return false;
  }else if ($("#temple").val() == "") {
	$("#temple").addClass("errorInput");
	$("#templeLbl").text("Select A Temple...").addClass("errorTxt");
	return false;
  }else if ($("#color").val() == "") {
	$("#color").addClass("errorInput");
	$("#colorLbl").text("Select A Color...").addClass("errorTxt");
	return false;
  }else {
 $('#productFormBtn').val("Adding Product.....");	  
  return true;
  }
});
	
$(".wysiwyg").htmlarea();
$(".wysiwyg").htmlarea({
	// Override/Specify the Toolbar buttons to show
	toolbar: [
		["bold", "italic", "underline", "|", "forecolor"],
		["p", "h1", "h2", "h3", "h4", "h5", "h6"],
		["link", "unlink", "|", "image"],                    
		[{
			// This is how to add a completely custom Toolbar Button
			css: "custom_disk_button",
			text: "Save",
			action: function(btn) {
				// 'this' = jHtmlArea object
				// 'btn' = jQuery object that represents the <A> "anchor" tag for the Toolbar Button
				alert('SAVE!\n\n' + this.toHtmlString());
			}
		}]
	],

	// Override any of the toolbarText values - these are the Alt Text / Tooltips shown
	// when the user hovers the mouse over the Toolbar Buttons
	// Here are a couple translated to German, thanks to Google Translate.
	toolbarText: $.extend({}, jHtmlArea.defaultOptions.toolbarText, {
			"bold": "fett",
			"italic": "kursiv",
			"underline": "unterstreichen"
		}),

	// Specify a specific CSS file to use for the Editor
	css: "scripts//jHtmlArea.Editor.css",

	// Do something once the editor has finished loading
	loaded: function() {
		//// 'this' is equal to the jHtmlArea object
		//alert("jHtmlArea has loaded!");
		//this.showHTMLView(); // show the HTML view once the editor has finished loading
	}
});
});
</script>
</head>

<body>
<a name="top"></a>
<?php include("../../inc/pageElements/navAdmin.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<table width="79%" border="3" cellpadding="2" cellspacing="0" class="midTable">
<tr>
<td width="19%"><a href="index.php">Store Home</a></td>
<td width="23%"><a href="inventory_list.php?readAll=1">All Products</a></td>
<td width="34%"><a href="storeInventoryNew.php">+ Add New  Item</a></td>
<td width="24%">Inventory</td>
</tr>
</table>


<table>
  <tr>
    <td width="370"><a href="../home.php"><img src="../../img/logoMainSm.png" alt="main logo" name="headerPic" width="352" height="129" border="0" id="headerPic"></a></td>
    <td width="325" valign="top"><h1>Add New Item</h1>
<p>Logged in as <?php echo $username ?>, <a href="../../logout.php">Log Out</a></p></td>
  </tr>
</table>

<p id="senderMessage" class="redBold"><?php echo $storeMessage ?></p>
<a name="inventoryForm" id="inventoryForm"></a>
<h3 class="goldBold">&darr; Add New Inventory Item Form &darr;</h3>


<!--<form action="inventory_list.php" enctype="multipart/form-data" name="productForm" id="productForm" method="post">-->
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
<td align="right"><label for="temple" id="templeLbl">Temple Length</label></td>
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
<td align="right" valign="top"><span id="colorLbl">Color</span></td>
<td>

<table width="262" id="colorTbl">
  <tr>
    <td width="109"><label>
      <input type="radio" name="color" value="Silver" id="colorRed" />
      Silver</label></td>
    <td width="141">
    <label>
      <input type="radio" name="color" value="Brown" id="colorRed" />
      Brown</label>
    </td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="color" value="Gold" id="colorWhite" />
      Gold</label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="color" value="Black" id="colorBlack" />
      Black</label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Other: 
      <input name="color2" id="color" type="text" /></td>
    </tr>
</table>


</td>
</tr>
<tr>
<td align="right">Size</td>
<td><label>
<select name="size" id="size">
<option value="Blank" selected="selected">Select A Size....</option>
<option value="XX Large">XX Large</option>
<option value="X Large">X Large</option>
<option value="Large">Large</option>
<option value="Medium">Medium</option>
<option value="Small">Small</option>
</select>
</label></td>
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

<a href="#top">Top</a>
<br class="clear" />


<p>&nbsp;</p>

</div>

</div><!--END CONTAINER-->
</body>
</html>
