<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";


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
<title>Add New Sale</title>
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

  <br />  
<h2>Add New Sale</h2>

<table width="100%" border="0" cellspacing="0" cellpadding="6">


 </table>
<!--<form action="inventory_list.php" enctype="multipart/form-data" name="productForm" id="productForm" method="post">-->
<form action="" enctype="multipart/form-data" name="productForm" id="productForm" method="post" onsubmit="return checkSize(3145728)">
<table width="90%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="left" class="errorTxt" id="errorDisplay"><?php echo $_SESSION['errorMsg'] ?></td>
  <td>&nbsp;</td>
  </tr>
<tr>
<td width="20%" align="right"><label for="productID" id="productIDLbl">Product Name</label></td>
<td width="80%"><select name="productID" id="productID" class="varieryChk">
  <?php 
  if(isset($_POST["productID"])){echo '<option value="'.$_POST["productID"].'" selected="selected">'.$_POST["productID"].'</option>';} else {
		echo '<option value="1" selected="selected">1</option>';}
$sql = mysql_query("SELECT * FROM products WHERE quantity >= '1' ORDER BY product_name ASC");
while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
	echo '<option value="'.intval($row['productID']).'">'.$Product->getProductName().' '.$Product->getPrice().'</option>';
}
?>
</select></td>
</tr>
<tr>
<td align="right"><label for="siteID" id="siteIDLbl">Site</label></td>
<td><select name="siteID" id="siteID" class="varieryChk">
<option value="0" selected="selected">None</option>
  <?php 	
		$sql = mysql_query("SELECT * FROM sites ORDER BY siteName ASC") or die(mysql_error()); 
		while($row = mysql_fetch_array($sql))
		  {
			echo '<option value="'.intval($row['siteID']).'">'.$Sites->getSiteNameByID(intval($row['siteID'])).'</option>';
		}
?>
</select>

</td>
</tr>
<tr>
  <td align="right"><label for="email" id="emailLbl">Buyer Email</label></td>
  <td><input type="text" name="email" id="email" /></td>
</tr>
<tr>
  <td align="right"><label for="quantity" id="templeLbl">Quantity</label></td>
  <td><select name="quantity" id="quantity" class="varieryChk">
    <?php if(isset($_POST["quantity"])){echo '<option value="'.$_POST["quantity"].'" selected="selected">'.$_POST["quantity"].'</option>';} else {
		echo '<option value="1" selected="selected">1</option>';}?>
    <?php 
for ($list_day = 2; $list_day <= 30; $list_day++) {
	echo '<option value="'.$list_day.'">'.$list_day.'</option>';
}
?>
    </select></td>
</tr>
<tr>
<td align="right"><label for="proGrader" id="proGraderLbl">Date</label></td>
<td><input type="text" name="purchaseDate" id="purchaseDate" /></td>
</tr>
<tr>
  <td align="right" valign="top"><label for="details" id="detailsLbl">Sale Detail</label></td>
  <td>
    <textarea name="details" id="details" class="wysiwyg"></textarea>
    </td>
</tr>
<tr>
  <td align="right"><label for="refund" id="refundLbl">Refund</label></td>
  <td><select name="refund" id="refund">
    <option value="No Refund for This Product" selected="selected">No Refund for This Product</option>
    <option value="15 Days in Unopened Package">15 Days in Unopened Package</option>
    </select></td>
</tr>
<tr>
  <td align="right"><label for="points" id="pointsLbl">Member Points</label></td>
  <td><select name="points" id="points">
    <option value="0" selected="selected">Select Point Value</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
  </select></td>
</tr>      
<tr>
<td>&nbsp;</td>
<td><label>
<input type="submit" name="productFormBtn" id="productFormBtn" value="Add This Item Now" />
</label></td>
</tr>
</table>
</form>  


  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>