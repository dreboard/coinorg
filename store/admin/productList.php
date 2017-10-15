<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product List</title>
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


<?php include("../inc/pageElements/headerAdmin.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<br />
<h1>Product List</h1>
<p><a class="brownLinkBold" href="inventory_new.php">+ Add New  Item</a></p>

  <table width="100%" border="0" class="sortShortTbl">
    <thead class="darker">
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="75%">Coin</td>
    <td align="center">Price</td>
  </tr>
</thead>
  <tbody>
<?php 
$sql = mysql_query("SELECT * FROM products WHERE quantity >= '1' ORDER BY product_name ASC");
    if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
    <td width="14%">&nbsp;</td>
    <td width="75%" align="center">No '.str_replace('_', ' ', strip_tags($_GET["coinType"])).' coins In inventory</td>
    <td align="center">Price</td>
  </tr>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
  echo '
<tr>
<td width="14%" align="center" valign="middle"><img class="listImg" src="'.$Product->getCoinImage1().'" /></td>
<td width="75%"><a href="inventory_edit.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a></td>
<td align="right">$'.$Product->getPrice().'</td>
</tr>  
  ';
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
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>