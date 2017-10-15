<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="PCGS Certified and Raw Proof Lincoln Cents" />
<meta name="keywords" content="PCGS PR69, Proof Lincoln Cents, S-Mint Proof pennies, proof pennies, Lincoln Memorial Proof Collection" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proof Pennies</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){
$('.displayTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );

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
<h1>Proof Pennies</h1>
<p><a href="http://www.allsmallcents.com/Lincoln-Memorial-Penny.php">Lincoln Memorial</a> and <a href="http://www.allsmallcents.com/Lincoln-Wheat-Penny.php">Wheat Penny</a> Proof Coins</p>
<!--COINS LIST TABLE-->      
  <table width="100%" border="0" class="displayTbl2" cellpadding="3">
    <thead class="darker">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
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
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND siteID = '1' AND quantity >= '1' AND  strike = 'Proof' ORDER BY product_name ASC");
		 if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
		  <td width="25%">No proof coins In inventory</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
         </tr>';
} else {
	echo '<tr class="dateHolder" valign="top" align="center">';
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
 echo '<td valign="top" class="productTD" align="center">
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
			  echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
			  $i = 1; //reset $i
			  } //close the if
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE  strike = 'Proof' AND siteID = '1' AND quantity >= '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
		  <td width="25%">No proof coins In inventory</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
         </tr>';
} else {
echo '<tr class="dateHolder" valign="top" align="center">';
while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
 echo '<td valign="top" class="productTD" align="center">
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
		  echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
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
      
  <p><a href="http://www.allsmallcents.com/all-smal-cents-for-sale.php" title="View All Pennies for Sale" class="brownLinkBold">View All Small Cents for Sale</a></p> 
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>