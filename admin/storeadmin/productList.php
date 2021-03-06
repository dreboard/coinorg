<?php 
include '../../inc/config.php';

if (isset($_SESSION['accountID'])) {
	  $accountID = intval($_SESSION['accountID']);
} else {
header('Location: ../login.php');
}
$user->getUserById($accountID);  
$user->getDisplayName(); 
$name = $user->getDisplayName();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../../secureScripts.php"); ?>
<title>Category Page</title>
<script type="text/javascript">
$(document).ready(function(){	
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

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


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="../../style.css"/>
<?php include ("../../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Product List</h1>
<p id="senderMessage" class="errorTxt"><?php echo $storeMessage ?></p>
<table width="79%" border="3" cellpadding="2" cellspacing="0" class="midTable">
<tr>
<td width="19%"><a href="index.php">Store Home</a></td>
<td width="23%"><a href="inventory_list.php?readAll=1">All Products</a></td>
<td width="34%"><a href="inventory_new.php">+ Add New  Item</a></td>
<td width="24%">Inventory</td>
</tr>
</table>
<?php 
$dynamicList = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="../../inventory_images/' . $id . '.jpg" alt="' . $product_name . '" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysql_close();
?>
<p><a href="../../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../../inc/pageElements/footer.php"); ?>
</body>
</html>