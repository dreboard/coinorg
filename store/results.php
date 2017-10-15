<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lincoln Cents</title>
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
  <br />  
<h2 id="pageHdr">Search Page</h2>

<table id="productList">
<?php 
if(isset($_POST["search"])){
$search = trim(mysql_real_escape_string($_POST["search"]));
$searchQuery = mysql_query("SELECT * FROM products WHERE product_name LIKE '%$search%' OR coinType LIKE'%$search%' ORDER BY product_name DESC") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 echo "<tr><td>Sorry, but we can not find an entry to match your query</td></tr>"; 
 } else {
  $counter = 1; 
 while ($row = mysql_fetch_array ($searchQuery)) {
   $product_name = strip_tags($row['product_name']);
   $productID = strip_tags($row['productID']);
   echo '
   <tr><td>'.$counter++.'. <a href="product.php?id='.$productID.'">' .$product_name.'</a> '.$product_name.'</td></tr>';
   
}
}
mysql_free_result($searchQuery);
}

?>
</table>

  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>