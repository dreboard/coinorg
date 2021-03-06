<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="In 2009, four versions of Lincoln Bicentennial cents were minted, each of which has different reverse to commemorate different stages of Lincoln’s life." />
<meta name="keywords" content="Lincoln Bicentennial Coins, Rolls &amp; Sets, Lincoln Bicentennial Cents, Log Cabin penny, Formative Years penny, Professional Life penny, lincoln Presidency penny, Lincoln Birth Childhood Penny, commemorative pennies, 2009 proof set, commemorative penny, 2009 pennies, 2009 lincoln bicentennial one cent proof set" />
<title>2009 Lincoln Bicentennial Pennies</title>
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
<h1>2009 Lincoln Bicentennial Pennies</h1>
<p>The <strong>2009 pennies</strong>, four versions of <strong>Lincoln Bicentennial cents</strong> were minted, each of which has different reverse to commemorate different stages of Lincoln&rsquo;s life. 2009 lincoln bicentennial one cent proof sets were also issued</p>

<table width="100%">
  <tr align="center">
    <td width="25%"><img src="http://www.allsmallcents.com/img/Kentucky_Childhood.jpg" width="150" height="150" alt="Log Cabin penny" /></td>
    <td width="25%"><img src="http://www.allsmallcents.com/img/Indiana_Years.jpg" width="150" height="150" alt="Formative Years penny" /></td>
    <td width="25%"><img src="http://www.allsmallcents.com/img/Life_in_Illinois.jpg" width="150" height="150" alt="Professional Life penny" /></td>
    <td width="25%"><img src="http://www.allsmallcents.com/img/Presidency.jpg" width="150" height="150" alt="lincoln Presidency penny" /></td>
  </tr>
  <tr>
    <td width="25%" align="center" valign="top">Lincoln’s Birth and Early Childhood <br />
      in Kentucky</td>
    <td width="25%" align="center" valign="top">Lincoln’s Years Spent in Indiana</td>
    <td width="25%" align="center" valign="top">Lincoln&rsquo;s Professional Life in Illinois</td>
    <td width="25%" align="center" valign="top">Lincoln as President</td>
  </tr>
</table>
<hr />
<h2>Lincoln Bicentennial Cents, Sets and Rolls</h2>
<!--COINS LIST TABLE-->      
  <table width="100%" border="0" id="productTbl">
    <thead class="darker">
  <tr align="center">
    <td width="25%" align="left"><a title="Lincoln Bicentennial Penny Price List" href="http://www.allsmallcents.com/product_list.php?coinType=Lincoln_Bicentennial" class="brownLinkBold">List View</a></td>
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
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND siteID = '1' AND quantity >= '1' AND coinType = 'Lincoln Bicentennial' ORDER BY product_name ASC");
		 if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Lincoln Bicentennial coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
			 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
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
	$sql = mysql_query("SELECT * FROM products WHERE coinType = 'Lincoln Bicentennial' AND siteID = '1' AND quantity >= '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No Lincoln Bicentennial coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" /></a><br />
			<a href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
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
    <td width="25%" align="center" valign="top">&nbsp;</td>
    <td width="25%" align="center" valign="top">&nbsp;</td>
    <td width="25%" align="center" valign="top">&nbsp;</td>
    <td width="25%" align="center" valign="top">&nbsp;</td>
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