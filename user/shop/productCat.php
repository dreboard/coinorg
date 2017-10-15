<?php 
include '../../inc/configSite.php';

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


});
</script>  


<style type="text/css">
.productImage {height:200px; width:auto;}
#cartTable input[type=text] {padding:0px; margin:0px;}
</style>
<link rel="stylesheet" type="text/css" href="../../style.css"/>
<?php include ("../../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../../inc/pageElements/storeHeader.php"); ?>
<div id="content" class="clear">
<div>
<?php 
if(isset($_GET["category"])){
$category = $_GET['category'];
$resultAll = mysql_query("SELECT * FROM products WHERE category='$category' ORDER BY product_name ASC") or die(mysql_error());
$allCount = mysql_num_rows($resultAll);
echo "<h2>$allCount $category Products</h2>";
while($row = mysql_fetch_array($resultAll))
{
$id = $row["id"];
$product_name = $row["product_name"];
$price = $row["price"];
$category = $row["category"];
$subcategory = $row["subcategory"];
$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));

echo "
<table width='100%' cellspacing='0' cellpadding='2'>
<tr>
<td class='darker' scope='row'>Name</td>
<td>$product_name</td>
<th rowspan='6'><a href='product.php?id=$id'><img class='productImage' src='../inventory_images/$id.jpg' alt=' $product_name' border='0' /></a></th>
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
<td class='darker' scope='row'><a href='product.php?id=$id'>View</a></td>
<td>&#36;$price</td>
</tr>
</table>
<hr />";
}
}
?>
</div>
</div>
<p>&nbsp;</p>
</div>

<?php include("../../inc/pageElements/footer.php"); ?>
</body>
</html>