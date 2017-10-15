<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) {
$CoinLots->getCoinLotById(intval($_GET['ID']));
$coinLotID = intval($_GET['ID']);
}
if(isset($_POST["productFormBtn"])){
	
if($_POST['product_name'] == '' || $_POST['price'] == '') {
	$_SESSION['errorMsg'] = 'Enter Product Detail';
} else {
	
$product_name = mysql_real_escape_string($_POST['product_name']);
$quantity = mysql_real_escape_string($_POST['quantity']);
$price = mysql_real_escape_string($_POST['price']);
$details = mysql_real_escape_string($_POST['details']);
$category = mysql_real_escape_string($_POST['category']);
$subcategory = mysql_real_escape_string($_POST['subcategory']);
$coinType = mysql_real_escape_string($_POST['coinType']);
$proGrader = mysql_real_escape_string($_POST['proGrader']);
$purchasePrice = mysql_real_escape_string($_POST['purchasePrice']);
$coinGrade = mysql_real_escape_string($_POST['coinGrade']);
$refund = mysql_real_escape_string($_POST['refund']);
$serialNum = $General->setToNone($_POST['serialNum']);

mysql_query("INSERT INTO products(product_name, quantity, price, purchasePrice, details, category, coinType, date_added, proGrader, coinGrade, refund, serialNum) VALUES('$product_name', '$quantity', '$price', '$purchasePrice', '$details', '$category', '$coinType', '".date('Y-m-d')."', '$proGrader', '$coinGrade', '$refund', '$serialNum')") or die(mysql_error()); 

$productID = mysql_insert_id();

header("location: productList.php");
exit();

}
}
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
      <td colspan="2">
      <form action="" method="post" name="lotForm" class="compactForm">
      <input type="text" />
      <input name="lotBtn" type="submit" />
      </form>
      </td>
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