<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Buy Rolls of circulated and uncirculated Lincoln Wheat pennies">
<meta name="keywords" content="Lincoln Wheat Coins, Sets, Rolls, lincoln wheat penny rolls, wheat reverse, steel cent rollss, old copper coin rollss">
<title>Lincoln Wheat Penny Rolls</title>
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
<h1>Lincoln Wheat Penny Rolls</h1>
<table width="100%" border="0" id="listTbl">
  <tr>
    <td align="center" width="16%"><strong><a title="Lincoln Wheat Penny Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Wheat-Rolls.php"><img src="http://www.allsmallcents.com/img/Lincoln_Wheat.jpg" alt="Lincoln Wheat Rolls" width="50" height="50" align="absmiddle" /></a> <a title="Buy Lincoln Wheat Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Wheat-Rolls.php"><br />
      Lincoln 
      Wheat Rolls</a></strong></td>
    <td align="center" width="16%"><strong><a title="Lincoln Memorial Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Memorial-Rolls.php"><img src="http://www.allsmallcents.com/img/Lincoln_Memorial.jpg" alt="Lincoln
      Memorial Rolls" width="50" height="50" align="absmiddle" /></a> <a title="Lincoln Memorial Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Memorial-Rolls.php"><br />
      Lincoln Memorial Rolls</a></strong></td>
    <td align="center" width="16%"><strong><a title="Lincoln Bicentennial Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Bicentennial-Rolls.php"><img src="http://www.allsmallcents.com/img/Lincoln_Bicentennial.jpg" alt="Lincoln
      Bicentennial Rolls" width="50" height="50" align="absmiddle" /></a> <a title="Lincoln Bicentennial Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Bicentennial-Rolls.php"><br />
      Lincoln Bicentennial Rolls</a></strong></td>
    <td align="center" width="16%"><strong><a title="Buy Union Shield Coin Rolls" class="brownLink" href="http://www.allsmallcents.com/Union-Shield-Rolls.php"><img src="http://www.allsmallcents.com/img/Union_Shield.jpg" alt="Preservation of the Union Rolls" width="50" height="50" align="absmiddle" /></a> <a title="Buy Union Shield Coin Rolls" class="brownLink" href="http://www.allsmallcents.com/Union-Shield-Rolls.php"><br />
      Union
      Shield Rolls</a></strong></td>    
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<p>Buy <strong><a title="penny rolls" href="http://www.allsmallcents.com/Small-Cent-Rolls.php">Rolls</a></strong> of circulated and uncirculated <a title="Lincoln Wheat Penny" href="http://www.allsmallcents.com/Lincoln-Wheat-Cents.php">Lincoln Wheat</a> pennies</p>
<h2>Lincoln Wheat Coins, Sets, Rolls</h2> 
<!--COINS LIST TABLE-->      
  <table width="100%" border="0" id="productTbl">
    <thead class="darker">
  <tr align="center">
    <td width="25%" align="left"><a href="http://www.allsmallcents.com/product_list.php?coinType=Lincoln_Wheat" class="brownLinkBold">List View</a></td>
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
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND siteID = '1' AND quantity >= '1' AND coinType = 'Lincoln Wheat' AND category = 'Rolls' ORDER BY product_name ASC");
		 if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Lincoln Wheat rolls In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
			 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
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
	$sql = mysql_query("SELECT * FROM products WHERE coinType = 'Lincoln Wheat' AND quantity >= '1' AND category = 'Rolls' AND siteID = '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Lincoln Wheat rolls In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a title="'.$Product->getProductName().'" href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
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
  
  
<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=&icep_uq=rolls&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=39455&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="img/pennies-for-sale-on-ebay.jpg" width="554" height="100" alt="pennies-for-sale-on-ebay" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=&uq=rolls&mpt=[CACHEBUSTER]">  
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>