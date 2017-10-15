<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Small Cent Rolls" />
<meta name="keywords" content="Philadelphia Mint Lincoln Wheat Cent Penny Roll, 2010 P & D LP 5, 2009 P & D LP 1, 2009 P & D LP 2, 2009 P & D LP 3, 2009 P & D LP 4, coin wrapper, Unsearched Small Cent Rolls, bank wrapped roll, penny rolls" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Small Cent Rolls</title>
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
<h1>Small Cent Rolls</h1>
<table width="100%" border="0" id="listTbl">
  <tr>
    <td align="center" width="16%"><strong><a title="Buy Lincoln Wheat Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Wheat-Rolls.php"><img src="http://www.allsmallcents.com/img/Lincoln_Wheat.jpg" alt="Lincoln Wheat Rolls" width="50" height="50" align="absmiddle" /></a> <a title="Buy Lincoln Wheat Rolls" class="brownLink" href="http://www.allsmallcents.com/Lincoln-Wheat-Rolls.php"><br />
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
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND siteID = '1' AND quantity >= '1' AND category = 'Rolls' ORDER BY product_name ASC");
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
	$sql = mysql_query("SELECT * FROM products WHERE category = 'Rolls' AND siteID = '1' AND quantity >= '1' ORDER BY product_name ASC");
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
      
  
  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>