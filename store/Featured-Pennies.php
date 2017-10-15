<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Lincoln Memorial Coins, Sets, Rolls">
<meta name="keywords" content="Lincoln Memorial Coins, Lincoln penny, 1982 7 Coin Variety Set, copper coins">
<title>Featured Lincoln Pennies</title>
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
<h1>Featured Lincoln Pennies</h1>
<p>The <strong>Lincoln Memorial cent</strong> is a one cent copper coin (<em>penny</em>) that was produced in the United States between 1959 and 2008. </p>
<h2>Featured Coins, Sets, Rolls</h2>     
  <table width="100%" border="0" id="productTbl">
    <thead class="darker">
  <tr align="center">
    <td width="25%">&nbsp;</td>
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
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND quantity >= '1' AND siteID = '1' AND featured = '1' ORDER BY product_name ASC");
		 if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Lincoln Memorial coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
			 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
            <strong>$'.$Product->getPrice().'</strong>
            </td>';
			  $i = $i + 1; //add 1 to $i
			  if ($i == 5) { //when you have echoed 3 <td>'s
			  echo '</tr><tr valign="top" align="center">'; //echo a new row
			  $i = 1; //reset $i
			  } //close the if			 
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE featured = '1' AND quantity >= '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Lincoln Memorial coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
            <strong>$'.$Product->getPrice().'</strong>
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