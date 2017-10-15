<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="PCGS Certified and Raw Error Lincoln and Indian Head Cents">
<meta name="keywords" content="Double Die pennies, die crack lincoln, error small cents, pennies with errors, RPM penny, doubled penny, Wheat Penny Errors">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lincoln Penny Errors</title>
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
<h1>Lincoln Penny Errors</h1>
<p>Lincoln Memorial Errors and Wheat Penny Error Coins</p>
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
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND siteID = '1' AND quantity >= '1' AND  error = '1' ORDER BY product_name ASC");
		 if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
		  <td width="25%">No Rolls In inventory</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
         </tr>';
} else {
	echo '<tr class="dateHolder" valign="top">';
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
echo '<td width="25%" height="150" align="center">
	<img class="productLikeImg" src="'.$Product->getCoinImage1().'" /><br />
	<a href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
 <strong>$'.$Product->getPrice().'</strong>
	</td>';
			  $i = $i + 1; //add 1 to $i
			  if ($i == 5) { //when you have echoed 3 <td>'s
			  echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
			  $i = 1; //reset $i
			  } //close the if
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE  error = '1' AND siteID = '1' AND quantity >= '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
		  <td width="25%">No Rolls In inventory</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
		  <td width="25%">&nbsp;</td>
         </tr>';
} else {
echo '<tr class="dateHolder" valign="top">';
while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
echo '<td width="25%" height="150" align="center">
	<img class="productLikeImg" src="'.$Product->getCoinImage1().'" /><br />
	<a href="product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
 <strong>$'.$Product->getPrice().'</strong>
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
 <div id="ebayBanner">
 
 <a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=&icep_uq=lincoln&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=524&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="img/pennies-for-sale-on-ebay.jpg" width="554" height="100" alt="pennies-for-sale-on-ebay" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=&uq=lincoln&mpt=[CACHEBUSTER]">
</div>
<p>&nbsp;</p>      
  
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>