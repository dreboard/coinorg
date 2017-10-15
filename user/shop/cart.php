<?php 
include '../../inc/configSite.php';
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart.php"); 
    exit();
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)
// dreswebstudio.com/MyOnlineStore/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
$cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
// Start PayPal Checkout Button
$pp_checkout_btn .= '<form class="payPalForm" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="admin_1318741279_biz@alikaimartialarts.com">';
// Start the For Each loop
$i = 0; 
foreach ($_SESSION["cart_array"] as $each_item) { 
$item_id = $each_item['item_id'];
$sql = mysql_query("SELECT * FROM products WHERE id='$item_id' LIMIT 1");
while ($row = mysql_fetch_array($sql)) {
$product_name = $row["product_name"];
$price = $row["price"];
$details = $row["details"];
}
$pricetotal = $price * $each_item['quantity'];
$cartTotal = $pricetotal + $cartTotal;
setlocale(LC_MONETARY, "en_US");
$pricetotal = number_format($pricetotal, 2);

// Dynamic Checkout Btn Assembly
$x = $i + 1;
$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
<input type="hidden" name="amount_' . $x . '" value="' . $price . '">
<input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
// Create the product array variable
$product_id_array .= "$item_id-".$each_item['quantity'].","; 
// Dynamic table row assembly
$cartOutput .= "<tr>";
$cartOutput .= '<td><a href="product.php?id=' . $item_id . '">' . $product_name . '</a><br /><img src="../inventory_images/' . $item_id . '.jpg" class="cartImg" alt="' . $product_name. '" width="40" height="52" border="1" /></td>';
//$cartOutput .= '<td>' . $details . '</td>';
$cartOutput .= '<td>$' . $price . '</td>';
$cartOutput .= '<td><form action="cart.php" method="post" class="deleteCartForm">
<input id="quantity" name="quantity" type="text" value="' . $each_item['quantity'] . '" size="10" maxlength="2" />
<input name="adjustBtn' . $item_id . '" type="submit" value="change" class="smDelete" />
<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
</form></td>';
//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
$cartOutput .= '<td>' . $pricetotal . '</td>';
$cartOutput .= '<td><form class="deleteBtnForm" action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" id="deleteBtn" class="smDelete" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
$cartOutput .= '</tr>';
$i++; 
} 
setlocale(LC_MONETARY, "en_US");
$cartTotal = number_format($cartTotal, 2);
//$cartTotal = money_format("%10.2n", $cartTotal);
$cartTotal = "<div style='font-size:18px; margin-top:12px;' align='right'>Cart Total : ".$cartTotal." USD</div>";
// Finish the Paypal Checkout Btn
$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
<input type="hidden" name="notify_url" value="http://www.alikaimartialarts.com/MyOnlineStore/storescripts/my_ipn.php">
<input type="hidden" name="return" value="http://www.alikaimartialarts.com/MyOnlineStore/checkout_complete.php">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="cbt" value="Return to The Store">
<input type="hidden" name="cancel_return" value="http://www.alikaimartialarts.com/MyOnlineStore/paypal_cancel.php">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="currency_code" value="USD">
<input class="paypalImg" type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
</form>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  


<style type="text/css">
#cartTable {width:780px; max-width:800px;}
.deleteBtnForm {padding:0px; margin:0px; width:90px; height:40px;}
.payPalForm {padding:0px; margin:0px;}
#cartTable input[type=text] {padding:0px; margin:0px;}
</style>
<link rel="stylesheet" type="text/css" href="../../style.css"/>
<?php include ("../../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../../inc/pageElements/storeHeader.php"); ?>
<div id="content" class="clear">

<h2>My Shopping Cart</h2>
<p><span class="darker">To All Customers:</span> My Coin Organizer does not collect credit card information.  All transactions are conducted at the <a href="https://www.paypal.com/" title="PayPal homepage" target="_blank">PayPal</a> checkout web page.</p>
<a href="../../MyOnlineStore - Copy/cart.php?cmd=emptycart">Empty My Shopping Cart</a>
<div>
<table id="cartTable" border="1" cellpadding="6" cellspacing="0">
<tr>
<td width="221" bgcolor="#DDDDDD"><strong>Product</strong></td>
<td width="65" bgcolor="#DDDDDD"><strong> Price</strong></td>
<td width="86" bgcolor="#DDDDDD"><strong>Quantity</strong></td>
<td width="161" bgcolor="#DDDDDD"><strong>Total</strong></td>
<td width="175" bgcolor="#DDDDDD"><strong>Remove</strong></td>
</tr>
<?php echo $cartOutput; ?>
</table>
<?php echo $cartTotal; ?>
<br />
<br />
<?php echo $pp_checkout_btn; ?>
<br />
<form action="../../MyOnlineStore - Copy/results.php" method="post" name="searchForm" id="searchForm">
<label class="top" for="search">Find an Item</label>
<input type="text" name="search" id="search" />
<input type="submit" value="Search" id="searchFormBtn" />
</form>
</div>

<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="#" onclick="javascript:window.open('https://www.paypal.com/us/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');"><img  src="https://www.paypal.com/en_US/i/bnr/horizontal_solution_PPeCheck.gif" border="0" alt="Solution Graphics"></a></td></tr></table><!-- PayPal Logo -->
</div>
<p>&nbsp;</p>
</div>

<?php include("../../inc/pageElements/footer.php"); ?>
</body>
</html>