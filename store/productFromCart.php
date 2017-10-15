<?php 
include("inc/config.php");
$cookie_value = "";
$when_viewed = date("Y-m-d H:i:s");
$product_viewed = "";
$getIp = $_SERVER['REMOTE_ADDR'];
$ip = ip2long($getIp);
$cookieTime = time()+60*60*24*30;

if (isset($_GET['id'])) {
$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
$Product->getProductById(intval($_GET['id']));

$sql = mysql_query("SELECT * FROM products WHERE productID='$id' LIMIT 1") or die(mysql_error());
$productCount = mysql_num_rows($sql); 
if ($productCount > 0) {
while($row = mysql_fetch_array($sql)){ 
$id = $row["productID"];
$product_name = $row["product_name"];
$price = $row["price"];
$details = $row["details"];
$category = $row["category"];
$subcategory = $row["subcategory"];
$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));

mysql_query("INSERT INTO productViews (product_name, product_viewed, when_viewed, ip) VALUES ('$id', '$product_name', '$when_viewed', '$ip')") or die(mysql_error());

}

} else {
echo "That item does not exist.";
exit();
}

} else {
echo "Data to render this page is missing.";
exit();
}
if (isset($_POST['index_to_remove'])) {
 	$key_to_remove = $_POST['index_to_remove'];
	unset($_SESSION["cart_array"]["$key_to_remove"]);
	header("location: cart.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lincoln Cents | <?php echo $product_name; ?></title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
window.onload = function init(){

}
function addCart(){
	document.addCartForm.submit();
}
</script>
<style type="text/css">

</style>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
<h1><?php echo $Product->getProductName(); ?></h1>

<table id="productDisplay" width="100%" border="0" cellspacing="0" cellpadding="15">
<tr>
<td width="19%" valign="top">
<a href="<?php echo $Product->getCoinImage1(); ?>"><img class="productImg" src="<?php echo $Product->getCoinImage1(); ?>" alt="<?php echo $Product->getProductName(); ?>" /></a><a href="<?php echo $Product->getCoinImage1(); ?>">View Full Size Image</a></td>
<td width="81%" valign="top">

<table width="100%" border="0">
  <tr>
    <td width="14%"><strong>Type</strong></td>
    <td width="86%"><a class="brownLink" href="product_list.php?coinType=<?php echo str_replace(' ', '_', $Product->getCoinType()) ?>"><?php echo $Product->getCoinType(); ?></a> <?php echo "$subcategory $category"; ?></td>
  </tr>
  <tr>
    <td><strong>Price</strong></td>
    <td><?php echo "$".$Product->getPrice(); ?></td>
  </tr>
  <tr>
    <td><strong>Cert#</strong></td>
    <td><?php echo $Product->getSerialNum(); ?></td>
  </tr>
  <tr>
    <td colspan="2">
    <?php echo $Product->getDetails(); ?>
    
    </td>
    </tr>
</table>
<h3><a href="cart.php" class="brownLink">Back To Cart</a></h3>

</td>
</tr>
</table>
<hr />

<h4>Similar items</h4>
<table width="100%" border="0">
  <tr>
<?php 
$sql = mysql_query("SELECT * FROM products WHERE coinType ='".$Product->getCoinType()."' AND productID != '".$_GET['id']."' LIMIT 4") or die(mysql_error());
$productCount = mysql_num_rows($sql); 
if (mysql_num_rows($sql) == 0) {
	echo '<td width="250">No other products for '.$Product->getCoinType().'</td>';
} else {
while($row = mysql_fetch_array($sql)){ 
$Product->getProductById(intval($row['productID']));
echo '<td width="25%" valign="top" align="center"><a href="product.php?id='.intval($row['productID']).'"><img class="productLikeImg" src="'.$Product->getCoinImage1().'" alt="'.$Product->getProductName().'" /></a><br />'.$Product->getProductName().'<br />$'.$Product->getPrice().'</td>';
}
}
?>  
  
    <td width="250">&nbsp;</td>
    <td width="250">&nbsp;</td>
  </tr>
</table>



  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>