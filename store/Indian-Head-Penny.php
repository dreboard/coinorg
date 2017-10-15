<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Indian Head Cents, Sets and Rolls">
<meta name="keywords" content="Indian Head Coins, indian pennies, copper coins">
<title>Indian Head Cents, Sets and Rolls</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">
.productTD {padding:5px;}
</style>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
<h1>Indian Head Cents, Sets and Rolls</h1>
<p>The <strong>Indian Head cent</strong> is a one cent copper coin (<em>penny</em>) that was produced in the United States between 1859 and 1909. </p>


<div id="ebayBanner"><script type="text/javascript" src='http://adn.ebay.com/files/js/min/jquery-1.6.2-min.js'></script>
<script type="text/javascript" src='http://adn.ebay.com/files/js/min/ebay_activeContent-min.js'></script>
<script charset="utf-8" type="text/javascript">
document.write('\x3Cscript type="text/javascript" charset="utf-8" src="http://adn.ebay.com/cb?programId=1&campId=5337343394&toolId=10026&keyword=indian+head+cents&width=728&height=90&font=1&textColor=000000&linkColor=0000AA&arrowColor=8b755e&color1=ffffff&color2=[COLORTWO]&format=ImageLink&contentType=TEXT_AND_IMAGE&enableSearch=y&usePopularSearches=n&freeShipping=n&topRatedSeller=n&itemsWithPayPal=n&descriptionSearch=n&showKwCatLink=n&excludeCatId=&excludeKeyword=&catId=267&disWithin=200&ctx=n&autoscroll=n&flashEnabled=' + isFlashEnabled + '&pageTitle=' + _epn__pageTitle + '&cachebuster=' + (Math.floor(Math.random() * 10000000 )) + '">\x3C/script>' );
</script>
</div>
<hr />

<!--COINS LIST TABLE-->      
  <table width="100%" border="0" id="productTbl">
    <thead class="darker">
  <tr align="center">
    <td width="25%" align="left"><a title="Indian Head Penny Price List" href="http://www.allsmallcents.com/product_list.php?coinType=Indian_Head" class="brownLinkBold">List View</a></td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
</thead>
  <tbody>
  <tr align="center" valign="top">
<?php 
$i = 1;
if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1) {
	     $keys = array();
        foreach ($_SESSION["cart_array"] as $each_item) { 
		array_push($keys, $each_item['item_id']);
		
 }
 $IDS = mysql_real_escape_string(implode(',', $keys));
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND siteID = '1' AND quantity >= '1' AND coinType = 'Indian Head' ORDER BY product_name ASC");
		 if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Indian Head coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
 echo '<td valign="top" class="productTD">
 <div class="productBox">
 <a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
            <strong>$'.$Product->getPrice().'</strong>
			</div>
<form id="addCartForm" name="addCartForm" method="post" action="cart.php">
<input type="hidden" name="pid" id="pid" value="'.intval($row['productID']).'" />
<input type="image" src="img/addCartBtn.jpg" name="addCartBtn" id="addCartBtn" onclick="addCart();" />
</form>			
            </td>';
			  $i = $i + 1; //add 1 to $i
			  if ($i == 5) { //when you have echoed 3 <td>'s
			  echo '</tr><tr valign="top" align="center">'; //echo a new row
			  $i = 1; //reset $i
			  } //close the if			 
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE coinType = 'Indian Head' AND siteID = '1' AND quantity >= '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Indian Head coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
 echo '<td valign="top" class="productTD">
 <div class="productBox">
 <a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
            <strong>$'.$Product->getPrice().'</strong>
			</div>
<form id="addCartForm" name="addCartForm" method="post" action="cart.php">
<input type="hidden" name="pid" id="pid" value="'.intval($row['productID']).'" />
<input type="image" src="img/addCartBtn.jpg" name="addCartBtn" id="addCartBtn" onclick="addCart();" />
</form>			
            </td>';
			  $i = $i + 1; //add 1 to $i
			  if ($i == 5) { //when you have echoed 3 <td>'s
			  echo '</tr><tr valign="top" align="center">'; //echo a new row
			  $i = 1; //reset $i
			  } //close the if		
  }
}
}
?>
</tr>
  </tbody>
    <tfoot class="darker">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
</tfoot>

</table>
  <!--COINS LIST TABLE-->     
      
  
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>