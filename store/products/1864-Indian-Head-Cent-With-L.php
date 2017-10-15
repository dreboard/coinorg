<?php 
include("../inc/config.php");
$coinType = 'Indian Head';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="1864 Indian Head Cent With L." />
<meta name="keywords" content="indian penny, civil war cent, 1864 with L proof, 1864 Indian Head Cent, Variety 3 Bronze With L." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>1864 Indian Head Cent With L</title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">

</style>

</head>

<body>
<div id="container">


<?php include("../inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("../inc/pageElements/nav2.php"); ?>
  <br />  
<h1 id="pageHdr">1864 Indian Head Cent With L</h1>
<img src="http://www.allsmallcents.com/img/articles/1864-Indian-Head-Cent-With-L.jpg" alt="1864 Indian Head Cent With L" width="520" height="500" align="left" /><p class="leftPic">A design change identified by the addition of an L, the initial for James Barton Longacre, the designer on the ribbon. The 1864 with L proof is the rarest Indian Head Cent</p>

<hr class="clear" />

<h2>1864 Indian Head Cent with L ANACS F12 DETAILS</h2>
<table width="100%" border="0">
  <tr valign="top">
    <td width="52%" align="center"><img src="http://www.allsmallcents.com/img/products/1864-Indian-Head-Cent-With-L.jpg" alt="1864 Indian Head Cent With L" width="500" height="500" /></td>
    <td width="48%">
    <img style="height:200px; width:auto;" src="http://www.allsmallcents.com/img/products/1864-Indian-Head-Cent-With-L_Obverse.jpg" alt="1941 S Large S" />
    <p>1864 Indian Head Cent with L. Nice Penny ANACS F12 DETAILS. Slabbed coin at Redbook price $160.. </p>
    <h2>$160.00</h2>
    <form id="addCartForm" name="addCartForm" method="post" action="../cart.php">
<input type="hidden" name="pid" id="pid" value="69" />
<input type="image" src="../img/addtoCartBtn.jpg" name="addCartBtn" id="addCartBtn" onclick="addCart();" />
<!--<input type="submit" name="button" id="button" value="Add to Shopping Cart" />-->
</form></td>
  </tr>
</table>

<h3>Similar items</h3>
  <table width="100%" border="0">
  <tr>
<?php 
if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1) {
	     $keys = array();
        foreach ($_SESSION["cart_array"] as $each_item) { 
		array_push($keys, $each_item['item_id']);
		
 }
 $IDS = mysql_real_escape_string(implode(',', $keys));
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND quantity >= '1' AND coinType = '".$coinType."' LIMIT 4");
		 if(mysql_num_rows($sql) == 0){
	  echo '<td width="250">No other products for '.$Product->getCoinType().'</td>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
echo '<td width="25%" valign="top" align="center"><a href="product.php?id='.intval($row['productID']).'"><img class="productLikeImg" src="'.$Product->getCoinImage1().'" alt="'.$Product->getProductName().'" /></a><br />'.$Product->getProductName().'<br />$'.$Product->getPrice().'</td>';
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE coinType = '".$coinType."' AND quantity >= '1' ORDER BY product_name ASC LIMIT 4");
    if(mysql_num_rows($sql) == 0){
	  echo '<td width="250">No other products for '.$Product->getCoinType().'</td>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
echo '<td width="25%" valign="top" align="center"><a href="product.php?id='.intval($row['productID']).'"><img class="productLikeImg" src="'.$Product->getCoinImage1().'" alt="'.$Product->getProductName().'" /></a><br />'.$Product->getProductName().'<br />$'.$Product->getPrice().'</td>';
  }
}
}
?>
</tr>
</table>  
<p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>