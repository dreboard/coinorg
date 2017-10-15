<?php 
include '../../inc/configSite.php';
if (isset($_GET['id'])) {

$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
$sql = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	// get all the product details
	while($row = mysql_fetch_array($sql)){ 
		 $product_name = $row["product_name"];
		 $price = $row["price"];
		 $details = $row["details"];
		 $category = $row["category"];
		 $subcategory = $row["subcategory"];
		 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
	 }
	 
} else {
	echo "That item does not exist.";
	exit();
}
	
} else {
	echo "Data to render this page is missing.";
	exit();
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
<title><?php echo $product_name; ?></title>
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
<h1><?php echo $product_name; ?></h1>
<a href="../../MyOnlineStore - Copy/index.php">All Products</a> -> <a href="../../MyOnlineStore - Copy/productCat.php?category=<?php echo $category; ?>"><?php echo $category; ?></a> -> <a href="../../MyOnlineStore - Copy/productSub.php?subcategory=<?php echo $subcategory; ?>"><?php echo $subcategory; ?></a>
<table id="productDisplay" width="100%" border="0" cellspacing="0" cellpadding="15">
<tr>
<td width="19%" valign="top"><br />
<a href="inventory_images/<?php echo $id; ?>.jpg">View Full Size Image</a><a href="../inventory_images/<?php echo $id; ?>.jpg"><img class="productImg" src="../inventory_images/<?php echo $id; ?>.jpg" alt="<?php echo $product_name; ?>" /></a></td>
<td width="81%" valign="top"><h3><?php echo $product_name; ?></h3>
<p><?php echo "$".$price; ?><br />
<br />
<?php echo "$subcategory $category"; ?> <br />
<br />
<?php echo $details; ?>
<br />
</p>
<form id="addCartForm" name="addCartForm" method="post" action="../../MyOnlineStore - Copy/cart.php">
<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
<!--<input type="image" src="../img/addtoCartBtn.png" name="addCartBtn" id="addCartBtn" onclick="addCart();" />-->
<input type="submit" name="button" id="button" value="Add to Shopping Cart" />
</form>
</td>
</tr>
</table>






</div>
<p>&nbsp;</p>
</div>

<?php include("../../inc/pageElements/footer.php"); ?>
</body>
</html>