<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CoinLots->getLotName(); ?></title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">

</script>
<style type="text/css">
#details {width:99%; height:300px;}
</style>

</head>

<body>
<div id="container">

<?php include("../inc/pageElements/headerAdmin.php"); ?>

<div id="contentHolder" class="wide">

<div id="content" class="inner">

<h2><?php echo $CoinLots->getLotName(); ?></h2>

<table width="295" border="0">
  <tr>
    <td width="151"><strong>Purchased</strong></td>
    <td width="134"><?php echo date("M j, Y",strtotime($CoinLots->getPurchaseDate())); ?></td>
  </tr>
  <tr>
    <td><strong>Price</strong></td>
    <td>$<?php echo $CoinLots->getPurchasePrice(); ?></td>
  </tr>
  <tr>
    <td><strong>Sales from Lot</strong></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Revenue from Lot</strong></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>


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
  	$sql = mysql_query("SELECT * FROM products WHERE coinLotID = '".intval($_GET['ID'])."' ") or die(mysql_error());
    if(mysql_num_rows($sql) == 0){
	  echo '
	    <tr>
    <td width="14%">&nbsp;</td>
    <td width="75%" align="center">No products listed for this lot</td>
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