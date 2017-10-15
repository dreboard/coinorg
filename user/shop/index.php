<?php 
include '../../inc/configSite.php';
$eventMonth = date('F');
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $category = $row["category"];
			 $subcategory = $row["subcategory"];
    }
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
<title>Products</title>
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
<h1>Our Products</h1>

<table class="midTable" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option value="productCat.php?category=Coin Storage">Coin Storage</option>
<option value="productSub.php?subcategory=Roll Box">Roll Box</option>
<option value="productSub.php?subcategory=Roll Trays">Roll Trays</option>
<option value="productSub.php?subcategory=Plastic Tray">Plastic Tray</option>
</select>
</td>
<td>
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option value="">Coins</option>
    <option value="productCat.php?category=Graded Coins">Coins</option>
    <option value="productSub.php?subcategory=Collections">Collections</option>
    <option value="productSub.php?subcategory=Staffs">Staffs</option>
</select>
</td>
<td>
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option value="">Gear</option>
    <option value="productCat.php?category=Gear">All Gear</option>
</select>
</td>
</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0">
<tr align="center">
<td><a href="../../MyOnlineStore - Copy/productCat.php?category=Coin Storage"><img src="../../inventory_images/Coin_Storage.jpg" alt="Our Products" width="250" height="200" border="0"></a></td>
<td><a href="../../MyOnlineStore - Copy/productCat.php?category=Weapons"><img src="../../inventory_images/Coins.jpg" alt="Our Products" width="250" height="200" border="0"></a></td>
<td><a href="../../MyOnlineStore - Copy/productCat.php?category=Gear"><img src="../../img/allGear.jpg" alt="Our Products" width="250" height="200" border="0"></a></td>
</tr>  
<tr align="center">
<th scope="col">Coin Storage</th>
<th scope="col">Coins</th>
<th scope="col">Gear</th>
</tr>
</table>

<p><img src="../../inventory_images/paypal.jpg" width="73" height="56" alt="paypal verified"></p>
</div>

</div>

<?php include("../../inc/pageElements/footer.php"); ?>
</body>
</html>