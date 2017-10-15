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
$purchasePrice = $General->setToZero($_POST['purchasePrice']);
$coinGrade = mysql_real_escape_string($_POST['coinGrade']);
$refund = mysql_real_escape_string($_POST['refund']);
$serialNum = $General->setToNone($_POST['serialNum']);
$siteID = mysql_real_escape_string($_POST['siteID']);
$error = mysql_real_escape_string($_POST['error']);
$strike = mysql_real_escape_string($_POST['strike']);
$featured = mysql_real_escape_string($_POST['featured']);
$tags = mysql_real_escape_string($_POST['tags']);
$coinYear = mysql_real_escape_string($_POST['coinYear']);
$listingFee = $General->setToZero($_POST['listingFee']);
$coinLotID = mysql_real_escape_string($_POST['coinLotID']);
mysql_query("INSERT INTO products(product_name, quantity, price, purchasePrice, listingFee, details, category, coinType, coinYear, date_added, proGrader, coinGrade, refund, serialNum, error, strike, siteID, featured, tags, coinLotID) VALUES('$product_name', '$quantity', '$price', '$purchasePrice', '$listingFee', '$details', '$category', '$coinType', '$coinYear', '".date('Y-m-d')."', '$proGrader', '$coinGrade', '$refund', '$serialNum', '$error', '$strike', '$siteID', '$featured', '$tags', '$coinLotID')") or die(mysql_error()); 

$productID = mysql_insert_id();
$Product->createProductFolder($productID);

if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image 1 is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3145728); 
$Upload->UploadFile();
$coinPic1 = $productID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic1 = '$coinPic1' WHERE productID = '$productID'")  or die(mysql_error()); 
}
}
if(!empty($_FILES['file2']['tmp_name'])){	
if($_FILES['file2']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image 2 is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file2']['name']));
$Upload->SetTempName($_FILES['file2']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3145728); 
$Upload->UploadFile();
$coinPic2 = $productID."/" . str_replace(' ', '_', $_FILES['file2']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic2 = '$coinPic2' WHERE productID = '$productID'")  or die(mysql_error()); 
}
}
if(!empty($_FILES['file3']['tmp_name'])){	
if($_FILES['file3']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image 3 is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file3']['name']));
$Upload->SetTempName($_FILES['file3']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3145728); 
$Upload->UploadFile();
$coinPic3 = $productID."/" . str_replace(' ', '_', $_FILES['file3']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic3 = '$coinPic3' WHERE productID = '$productID'")  or die(mysql_error()); 
}
}
if(!empty($_FILES['file4']['tmp_name'])){	
if($_FILES['file4']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image 4 is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file4']['name']));
$Upload->SetTempName($_FILES['file4']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3145728); 
$Upload->UploadFile();
$coinPic4 = $productID."/" . str_replace(' ', '_', $_FILES['file4']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic4 = '$coinPic4' WHERE productID = '$productID'")  or die(mysql_error()); 
}
}

if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/productList.php"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/productList.php";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/productList.php" />';
	echo '</noscript>'; exit;
}

}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Item</title>
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
<h2>Add New Item</h2>
<p>Recent Products</p>

<table width="100%" border="0">
  <tr>
    <td width="53%">Product</td>
    <td width="12%">Price</td>
    <td width="20%">Category</td>
    <td width="15%">Added</td>
  </tr>
<?php 
$product_list = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $category = $row["category"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 echo '
        <tr>
          <td valign="top">' . $product_name . '</td>
            <td>$' . $price . '</td>
			<td>' . $category . '</td>
           <td>' .$date_added. '</td>
        </tr>
     ';
    }
} else {
	echo "We have no products listed in our store yet";
}

?>  
</table>


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
<td width="20%" align="right"><label for="product_name" id="product_nameLbl">Product Name</label></td>
<td width="80%">
<input name="product_name" type="text" id="product_name" size="80" value="<?php if(isset($_POST["product_name"])){echo $_POST["product_name"];} else { 	echo '';}?>" />
</td>
</tr>
<tr>
<td align="right"><label for="price" id="priceLbl">Product Price</label></td>
<td>
<input name="price" type="text" id="price" size="12" value="<?php if(isset($_POST["price"])){echo $_POST["price"];} else { 	echo '';}?>" /> 
*per unit
</td>
</tr>
<tr>
<td align="right"><label for="purchasePrice" id="purchasePriceLbl">Purchase Price</label></td>
<td>
<input name="purchasePrice" type="text" id="purchasePrice" size="12" value="<?php if(isset($_POST["purchasePrice"])){echo $_POST["purchasePrice"];} else { 	echo '';}?>" /> 
*purchase price or current value</td>
</tr>


<tr>
<td align="right"><label for="listingFee" id="listingFeeLbl">Listing Fees</label></td>
<td>
<input name="listingFee" type="text" id="listingFee" size="12" value="<?php if(isset($_POST["listingFee"])){echo $_POST["listingFee"];} else { 	echo '';}?>" /></td>
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
<td align="right"><label for="proGrader" id="proGraderLbl">Grader</label></td>
<td>
<select name="proGrader" id="proGrader">

    <?php if(isset($_POST["proGrader"])){echo '<option value="'.$_POST["proGrader"].'" selected="selected">'.$_POST["proGrader"].'</option>';} else {
		echo '<option value="None" selected="selected">Select A Grader....</option>';}?>

<option value="PCGS">PCGS</option>
<option value="NGC">NGC</option>
<option value="IGC">IGC</option>
<option value="ANACS">ANACS</option>
</select>
</td>
</tr>
<tr>
  <td align="right"><label for="strike" id="strikeLbl">Strike</label></td>
  <td><select name="strike" id="strike">
    <option value="Business" selected="selected">Business</option>
    <option value="Proof">Proof</option>
  </select></td>
</tr>

<tr>
  <td align="right"><label for="coinYear" id="coinYearLbl">Coin Year</label></td>
  <td><select name="coinYear" id="coinYear">
    <option value="0000" selected="selected">Select</option>
    <?php 
	for ($i = 1856; $i <= date('Y'); ++$i)
{
  echo '<option value="'.$i.'">'.$i.'</option>'; 
}
	?>    
  </select></td>
</tr>
<tr>
  <td align="right"><label for="error" id="errorLbl">Error Coin</label></td>
  <td><select name="error" id="error">
    <option value="0" selected="selected">Non Error</option>
    <option value="1">Error Coin</option>
  </select></td>
</tr>
<tr>
  <td align="right"><label for="coinGrade" id="coinGradeLbl">Coin Grade</label></td>
  <td><select name="coinGrade" id="coinGrade">
    <?php if(isset($_POST["coinGrade"])){echo '<option value="'.$_POST["coinGrade"].'" selected="selected">'.$_POST["coinGrade"].'</option>';} else {
		echo '<option value="No Grade" selected="selected">No Grade</option>';}?>
    <option value="No Grade" selected="selected">No Grade</option>
          <option value="About Uncirculated">About Uncirculated</option>
          <option value="Brilliant Uncirculated">Brilliant Uncirculated</option>
          <option value="Genuine">Genuine</option>
          <option value="Sample">Sample</option>
          <option value="Authentic">Authentic</option>
		  <option value="B0">(B-0) Basal 0 </option>
		  <option value="P1" >(PO-1) Poor</option>
		  <option value="FR2">(FR-2) Fair</option>
		  <option value="AG3">(AG-3) About Good</option>
		  <option value="G4">(G-4) Good</option>
		  <option value="G6">(G-6) Good</option>
		  <option value="VG8">(VG-8) Very Good</option>
		  <option value="VG10">(VG-10) Very Good</option>
		  <option value="F12">(F-12) Fine</option>
		  <option value="F15">(F-15) Fine</option>
		  <option value="VF20">(VF-20) Very Fine</option>
		  <option value="VF25">(VF-25) Very Fine</option>
		  <option value="VF30">(VF-30) Very Fine</option>
		  <option value="VF35">(VF-35) Very Fine</option>
		  <option value="EF40">(EF-40) Extremely Fine</option>
		  <option value="EF45">(EF-45) Extremely Fine</option>
		  <option value="AU50">(AU-50) About Uncirculated</option>
		  <option value="AU53">(AU-53) About Uncirculated</option>
		  <option value="AU55">(AU-55) About Uncirculated</option>
		  <option value="AU58">(AU-58) Very Choice About Uncirculated</option>
		  <option value="MS60">(MS-60) Mint State Basal</option>
		  <option value="MS61">(MS-61) Mint State Acceptable</option>
		  <option value="MS62">(MS-62) Mint State Acceptable</option>
		  <option value="MS63">(MS-63) Mint State Acceptable</option>
		  <option value="MS64">(MS-64) Mint State Acceptable</option>
		  <option value="MS65">(MS-65) Mint State Choice</option>
		  <option value="MS66">(MS-66) Mint State Choice</option>
		  <option value="MS67">(MS-67) Mint State Choice</option>
		  <option value="MS68">(MS-68) Mint State Premium</option>
		  <option value="MS69">(MS-69) Mint State All-But-Perfect</option>
		  <option value="MS70">(MS-70) Mint State Perfect</option>
		 <option value="PR35">(PR-35) Impaired Proof.</option>
		  <option value="PR40">(PR-40) Impaired Proof.</option>
		  <option value="PR45">(PR-45) Impaired Proof.</option>
		  <option value="PR50">(PR-50) Impaired Proof.</option>
		  <option value="PR55">(PR-55) Impaired Proof.</option>
		  <option value="PR58">(PR-58) Impaired Proof.</option>
		  <option value="PR60">(PR-60) Brilliant Proof.</option>
		  <option value="PR61">(PR-61) Brilliant Proof.</option>
		  <option value="PR62">(PR-62) Brilliant Proof.</option>
		  <option value="PR63">(PR-63) Brilliant Proof.</option>
		  <option value="PR64">(PR-64) Brilliant Proof.</option>
		  <option value="PR65">(PR-65) Gem Proof.</option>
		  <option value="PR66">(PR-66) Choice Gem Proof.</option>
		  <option value="PR67">(PR-67) Extraordinary Proof.</option>
		  <option value="PR68">(PR-68) Extraordinary Proof.</option>
		  <option value="PR69">(PR-69) Extraordinary Proof.</option>
		  <option value="PR70">(PR-70) Perfect Proof.</option>
  </select></td>
</tr>
<tr>
  <td align="right"><label for="serialNum" id="serialNumLbl">Serial Number</label></td>
  <td><input type="text" name="serialNum" id="serialNum" /></td>
</tr>
<tr>
<td align="right"><label for="category" id="categoryLbl">Category</label></td>
<td><select name="category" id="category">
<option value="">Select A Category....</option>
<option value="Coins">Coins</option>
<option value="Sets">Sets</option>
<option value="Supplies">Supplies</option>
<option value="Collections">Collections</option>
<option value="Rolls">Rolls</option>
</select></td>
</tr>

<tr>
<td align="right"><label for="coinType" id="coinTypeLbl">Coin Type</label></td>
<td><label>
<select name="coinType" id="coinType">
<option value="General" selected="selected">General</option>
<option value="Union Shield">Union Shield</option>
<option value="Lincoln Bicentennial">Bicentennial</option>
<option value="Lincoln Memorial">Memorial</option>
<option value="Lincoln Wheat">Wheat</option>
<option value="Indian Head">Indian Head</option>
<option value="Flying Eagle">Flying Eagle</option>
</select>
</label></td>
</tr>
<tr>
  <td align="right"><label for="tags" id="tagsLbl">Tags</label></td>
  <td><select name="tags" id="tags">
    <option value="None" selected="selected">None</option>
    <option value="Double Die">Double Die</option>
    <option value="Special Mint">Special Mint</option>
    <option value="RPM">RPM</option>
    <option value="Mint Mark Variety">Mint Mark Variety</option>
    <option value="Off Center">Off Center</option>
    <option value="Date Variety">Date Variety</option>
    <option value="Design Variety">Design Variety</option>
    <option value="Steel Penny">Steel Penny</option>    
  </select></td>
</tr>

<tr>
<td align="right"><label for="siteID" id="siteIDLbl">Site</label></td>
<td><select name="siteID" id="siteID" class="varieryChk">
  <?php 
  if(isset($_POST["siteID"])){echo '<option value="'.$_POST["siteID"].'" selected="selected">'.$Sites->getSiteNameByID(intval($_POST["siteID"])).'</option>';} else {
		echo '<option value="1" selected="selected">All Small Cents</option>';}
		
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
<td align="right"><label for="coinLotID" id="coinLotIDLbl">Coin Lot</label></td>
<td><select name="coinLotID" id="coinLotID" class="varieryChk">
  <?php 
  if(isset($_POST["coinLotID"])){echo '<option value="'.$_POST["coinLotID"].'" selected="selected">'.$CoinLots->getLotNameByID(intval($_POST["coinLotID"])).'</option>';} else {
		echo '<option value="1" selected="selected">All Small Cents</option>';}
		
		$sql = mysql_query("SELECT * FROM coinLots ORDER BY name ASC") or die(mysql_error()); 
		while($row = mysql_fetch_array($sql))
		  {
			echo '<option value="'.intval($row['coinLotID']).'">'.strip_tags($row['name']).'</option>';
		}
?>
</select>

</td>
</tr>
<tr>
<td align="right"><label for="featured" id="featuredLbl">Featured</label></td>
<td><label>
<select name="featured" id="featured">
<option value="0" selected="selected">No</option>
<option value="1">Yes</option>
</select>
</label></td>
</tr>

<tr>
<td align="right" valign="top"><label for="details" id="detailsLbl">Product Description</label></td>
<td>
<textarea name="details" id="details" class="wysiwyg"></textarea>
</td>
</tr>
<tr>
<td align="right"><label for="file" id="fileLbl">Product Images</label></td>
<td>
<input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
<input type="file" name="file" id="file" /> 
*Max 3mb
</td>
</tr>
<tr>
<td align="right"><label for="file2" id="fileLbl">Product Images</label></td>
<td>
<input type="file" name="file2" id="file2" />
*Max 3mb </td>
</tr>
<tr>
<td align="right"><label for="file3" id="fileLbl">Product Images</label></td>
<td><input type="file" name="file3" id="file3" />
*Max 3mb </td>
</tr>
<tr>
<td align="right"><label for="file4" id="fileLbl">Product Images</label></td>
<td>
<input type="file" name="file4" id="file4" />
*Max 3mb </td>
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