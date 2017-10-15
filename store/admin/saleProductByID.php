<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['id'])) {
$Product->getProductById(intval($_GET['id']));
$productID = intval($_GET['id']);
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

<p>Add New Sale</p>
<h2><?php echo $Product->getProductName(); ?></h2>

<form action="" enctype="multipart/form-data" name="auctionForm" id="auctionForm" method="post" onsubmit="return checkSize(3145728)">
<table width="90%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td width="20%" align="left" class="errorTxt" id="errorDisplay"><?php echo $_SESSION['errorMsg'] ?></td>
  <td width="80%">&nbsp;</td>
  </tr>
  <tr>
<td align="right"><label for="siteID" id="siteIDLbl">Site</label></td>
<td><select name="siteID" id="siteID" class="varieryChk">

		<option value="<?php echo $Product->getListedSite(); ?>" selected="selected"><?php echo $Sites->getSiteNameByID($Product->getListedSite()); ?></option>
  <?php 		
		$sql = mysql_query("SELECT * FROM sites WHERE siteID != '".$Product->getListedSite()."' AND active = '1' ORDER BY siteName ASC") or die(mysql_error()); 
		while($row = mysql_fetch_array($sql))
		  {
			echo '<option value="'.intval($row['siteID']).'">'.$Sites->getSiteNameByID(intval($row['siteID'])).'</option>';
		}
?>
</select>

</td>
</tr>
<tr>
  <td align="right"><label for="salePrice" id="salePriceLbl">Sale Price</label></td>
  <td>
  <input name="salePrice" type="text" id="salePrice" size="12" value="" /></td>
</tr>
<tr>
<td align="right"><label for="listingFee" id="listingFeeLbl">Total  Fees</label></td>
<td>
<input name="listingFee" type="text" id="listingFee" size="12" value="" /></td>
</tr>
<tr>
  <td align="right"><label for="quantity" id="templeLbl">Quantity Sold</label></td>
  <td><select name="quantity" id="quantity" class="varieryChk">
   <option value="1" selected="selected">1</option>
   <?php echo $Product->quantityList(intval($_GET['id']));?>
  </select></td>
</tr>
<tr>
<td align="right"><label for="proGrader" id="proGraderLbl">Date Listed</label></td>
<td><input type="text" name="purchaseDate" id="purchaseDate" class="showDate" /></td>
</tr>
<tr>
<td align="right"><label for="proGrader" id="proGraderLbl">Date Sold</label></td>
<td><input type="text" name="purchaseDate" id="purchaseDate" class="showDate" /></td>
</tr>
<tr>
  <td align="right"><label for="email" id="emailLbl">Buyer Email</label></td>
  <td><input type="text" name="email" id="email" /></td>
</tr>  
<tr>
  <td align="right" valign="top"><label for="details" id="detailsLbl">Product Description</label></td>
  <td>
  <textarea name="details" id="details"  class="wysiwyg"></textarea>
  </td>
</tr>     
<tr>
  <td><input name="productID" type="hidden" value="<?php echo $_GET['id'] ?>" /></td>
  <td><label>
  <input type="submit" name="auctionBtn" id="auctionBtn" value="Record Sale" />
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