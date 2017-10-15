<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="PCGS Certified and Raw Proof Lincoln Cents" />
<meta name="keywords" content="PCGS PR69, Proof Lincoln Cents, S-Mint Proof pennies, proof pennies" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Small Cent Proof Coins</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
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
<h1>Small Cent Proof Coins</h1>
<!--COINS LIST TABLE-->      
  <table width="100%" border="0" class="sortTbl">
    <thead class="darker">
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="75%">Coin</td>
    <td align="center">Price</td>
  </tr>
</thead>
  <tbody>
<?php 
$i = 1;
if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1) {
	     $keys = array();
        foreach ($_SESSION["cart_array"] as $each_item) { 
		array_push($keys, $each_item['item_id']);
		
 }
 $IDS = mysql_real_escape_string(implode(',', $keys));
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND quantity >= '1' AND strike = 'Proof' ORDER BY product_name ASC");
		 if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
    <td width="14%">&nbsp;</td>
    <td width="75%" align="center">No proof coins In inventory</td>
    <td align="center">Price</td>
  </tr>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
			  echo '
				<tr>
				<td width="14%" align="center" valign="middle"><img alt="'.$Product->getProductName().'" class="listImg" src="'.$Product->getCoinImage1().'" /></td>
				<td width="75%"><a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a>'.$_SESSION["cart_array"]['item_id'].'</td>
				<td align="right">$'.$Product->getPrice().'</td>
				</tr>';
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE strike = 'Proof' AND quantity >= '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
    <td width="14%">&nbsp;</td>
    <td width="75%" align="center">No proof coins In inventory</td>
    <td align="center">Price</td>
  </tr>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
  echo '
<tr>
<td width="14%" align="center" valign="middle"><img alt="'.$Product->getProductName().'" class="listImg" src="'.$Product->getCoinImage1().'" /></td>
<td width="75%"><a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a></td>
<td align="right">$'.$Product->getPrice().'</td>
</tr>  
  ';
  }
}
}
?>
  </tbody>
    <tfoot class="darker">
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="75%">Coin</td>
    <td align="center">Price</td>
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