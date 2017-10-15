<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['id'])) {
$Product->getProductById(intval($_GET['id']));
$productID = intval($_GET['id']);
}

if($_POST['noProductBtn']) {
	$Product->deleteProduct(mysql_real_escape_string($_POST['productID']));
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

if(isset($_POST["productFormBtn"])){
	
if($_POST['product_name'] == '' || $_POST['price'] == '') {
	$_SESSION['errorMsg'] = 'Enter Product Detail';
} else {





$productID = mysql_real_escape_string($_POST['productID']);
$sql = mysql_query("UPDATE products SET product_name = '".mysql_real_escape_string($_POST['product_name'])."', quantity = '".mysql_real_escape_string($_POST['quantity'])."', price = '".mysql_real_escape_string($_POST['price'])."', details = '".mysql_real_escape_string($_POST['details'])."', category = '".mysql_real_escape_string($_POST['category'])."', coinGrade = '".mysql_real_escape_string($_POST['coinGrade'])."', coinType = '".mysql_real_escape_string($_POST['coinType'])."', proGrader = '".mysql_real_escape_string($_POST['proGrader'])."', purchasePrice = '".mysql_real_escape_string($_POST['purchasePrice'])."', siteID = '".mysql_real_escape_string($_POST['siteID'])."', serialNum = '".mysql_real_escape_string($_POST['serialNum'])."', refund = '".mysql_real_escape_string($_POST['refund'])."', strike = '".mysql_real_escape_string($_POST['strike'])."', coinYear = '".mysql_real_escape_string($_POST['coinYear'])."', tags = '".mysql_real_escape_string($_POST['tags'])."', error = '".mysql_real_escape_string($_POST['error'])."', points = '".mysql_real_escape_string($_POST['points'])."' WHERE productID = '$productID'") or die(mysql_error()); 
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}


}
}

if (isset($_POST["img1RemoveBtn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);
if($Product->getCoinImage1() != 'None'){
	unlink("../productImg/".$Product->getCoinImage1());
}
$sql = mysql_query("UPDATE products SET coinPic1 = 'None' WHERE productID = '$productID'") or die(mysql_error()); 
if($sql){
 $_SESSION['errorMsg'] = '<span class="greenLink">Removed From Album</span>';	
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
} else {
	 $_SESSION['errorMsg'] = '<span class="errorTxt">No Image Uploaded</span>';	
}
}

if (isset($_POST["img2RemoveBtn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);
if($Product->getCoinImage2() != 'None'){
	unlink("../productImg/".$Product->getCoinImage2());
}
$sql = mysql_query("UPDATE products SET coinPic2 = 'None' WHERE productID = '$productID'") or die(mysql_error()); 
if($sql){
 $_SESSION['errorMsg'] = '<span class="greenLink">Removed From Album</span>';	
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
} else {
	 $_SESSION['errorMsg'] = '<span class="errorTxt">No Image Uploaded</span>';	
}
}


if (isset($_POST["img3RemoveBtn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);
if($Product->getCoinImage3() != 'None'){
	unlink("../productImg/".$Product->getCoinImage3());
}
$sql = mysql_query("UPDATE products SET coinPic3 = 'None' WHERE productID = '$productID'") or die(mysql_error()); 
if($sql){
 $_SESSION['errorMsg'] = '<span class="greenLink">Removed From Album</span>';	
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
} else {
	 $_SESSION['errorMsg'] = '<span class="errorTxt">No Image Uploaded</span>';	
}
}

if (isset($_POST["img4RemoveBtn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);
if($Product->getCoinImage4() != 'None'){
	unlink("../productImg/".$Product->getCoinImage4());
}
$sql = mysql_query("UPDATE products SET coinPic4 = 'None' WHERE productID = '$productID'") or die(mysql_error()); 
if($sql){
 $_SESSION['errorMsg'] = '<span class="greenLink">Removed From Album</span>';	
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
} else {
	 $_SESSION['errorMsg'] = '<span class="errorTxt">No Image Uploaded</span>';	
}
}



//Image 1	  
if (isset($_POST["coinPic1Btn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);

if(!empty($_FILES['coinPic1']['tmp_name'])){	
if($_FILES['coinPic1']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
if($Product->getCoinImage1() != 'None'){
	unlink('../productImg/'.$Product->getCoinImage1());
}		
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic1']['name']));
$Upload->SetTempName($_FILES['coinPic1']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $productID."/" . str_replace(' ', '_', $_FILES['coinPic1']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic1 = '$coinPic1' WHERE productID = '$productID'")  or die(mysql_error()); 
$_SESSION['errorMsg'] = 'Image Saved';
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
}
}
}

if (isset($_POST["coinPic2Btn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);

if(!empty($_FILES['coinPic2']['tmp_name'])){	
if($_FILES['coinPic2']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
if($Product->getCoinImage2() != 'None'){
	unlink('../productImg/'.$Product->getCoinImage2());
}		
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic2']['name']));
$Upload->SetTempName($_FILES['coinPic2']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic2 = $productID."/" . str_replace(' ', '_', $_FILES['coinPic2']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic2 = '$coinPic2' WHERE productID = '$productID'")  or die(mysql_error()); 
$_SESSION['errorMsg'] = 'Image Saved';
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
}
}
}

if (isset($_POST["coinPic3Btn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);

if(!empty($_FILES['coinPic3']['tmp_name'])){	
if($_FILES['coinPic3']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
if($Product->getCoinImage3() != 'None'){
	unlink('../productImg/'.$Product->getCoinImage3());
}		
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic3']['name']));
$Upload->SetTempName($_FILES['coinPic3']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic3 = $productID."/" . str_replace(' ', '_', $_FILES['coinPic3']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic3 = '$coinPic3' WHERE productID = '$productID'")  or die(mysql_error()); 
$_SESSION['errorMsg'] = 'Image Saved';
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
}
}
}

if (isset($_POST["coinPic4Btn"])) { 
$productID = mysql_real_escape_string($_POST["productID"]);
$Product->getProductById($productID);

if(!empty($_FILES['coinPic4']['tmp_name'])){	
if($_FILES['coinPic4']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
if($Product->getCoinImage4() != 'None'){
	unlink('../productImg/'.$Product->getCoinImage4());
}		
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic4']['name']));
$Upload->SetTempName($_FILES['coinPic4']['tmp_name']);
$Upload->SetUploadDirectory("../productImg/".$productID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic4 = $productID."/" . str_replace(' ', '_', $_FILES['coinPic4']['name']);
$fileQuery = mysql_query("UPDATE products SET coinPic4 = '$coinPic4' WHERE productID = '$productID'")  or die(mysql_error()); 
$_SESSION['errorMsg'] = 'Image Saved';
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/inventory_edit.php?id=$productID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/inventory_edit.php?id='.$productID.'" />';
	echo '</noscript>'; exit;
}
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Product->getProductName(); ?></title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){

$("#editRow").hide();


//Image 1
$("#coinPic1Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic2Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic3Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic4Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic1Frm").submit(function() {
      if ($("#coinPic1").val() == "") {
		$("#coinPic1").addClass("errorInput");
		$('#imgMsg1').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic1Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 2
$("#coinPic2Lnk").click(function() {
  $("#editTD2").toggle();
  });

$("#coinPic2Frm").submit(function() {
      if ($("#coinPic2").val() == "") {
		$("#coinPic2").addClass("errorInput");
		$('#imgMsg2').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic2Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 1
$("#coinPic3Lnk").click(function() {
  $("#editTD3").toggle();
  });

$("#coinPic3Frm").submit(function() {
      if ($("#coinPic3").val() == "") {
		$("#coinPic3").addClass("errorInput");
		$('#imgMsg3').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic3Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 4
$("#coinPic4Lnk").click(function() {
  $("#editTD4").toggle();
  });

$("#coinPic4Frm").submit(function() {
      if ($("#coinPic4").val() == "") {
		$("#coinPic4").addClass("errorInput");
		$('#imgMsg4').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic4Btn').val("Uploading...");	  
	  return true;
	  }
});

});
</script>
<style type="text/css">
.imgRow img {width:230px; height:auto;}
.imgRow {height:240px; width:240px; overflow:hidden;}
#details {width:99%; height:300px;}
</style>

</head>

<body>
<div id="container">

<?php include("../inc/pageElements/headerAdmin.php"); ?>

<div id="contentHolder" class="wide">

<div id="content" class="inner">

  <br />  
<h2><?php echo $Product->getProductName(); ?></h2>

<table width="100%" border="0">
  <tr>
    <td width="17%"><strong>Listed</strong></td>
    <td width="33%"><?php echo date("M j, Y",strtotime($Product->getDateAdded())); ?> (<strong><?php echo $General->dateDiff($Product->getDateAdded(), date('Y-m-d')) ; ?></strong> Days Listed)</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Site</strong></td>
    <td><a class="brownLinkBold" href="saleBySite.php?id=<?php echo $Product->getListedSite(); ?>"><?php echo $Sites->getSiteNameByID($Product->getListedSite()); ?></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Sale Price</strong></td>
    <td>$<?php echo $Product->getPrice(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Value/Paid</strong></td>
    <td>$<?php echo $Product->getPurchasePrice(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Projected Profit</strong></td>
    <td>$<?php echo $Product->productProfitProjection(intval($_GET['id'])) ?></td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td><strong>Page Views</strong></td>
    <td><?php echo $Product->getPageViews(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Times Listed</strong></td>
    <td>
  
    
    
    Ebay: <?php echo $Product->getTimesListed(); ?></td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>
 <form action="" method="post" class="compactForm">
 <input name="productID" type="hidden" value="<?php echo $productID ?>" />
 <input name="noProductBtn" type="submit" value="Remove Product" onclick="return confirm('Delete This Product?')" />
 </form>   
    </td>
    <td><a class="brownLinkBold" href="saleProductByID.php?id=<?php echo intval($_GET['id']); ?>">Mark As Sold</a></td>
    <td>&nbsp;</td>
  </tr>
</table>

<hr />
<h3> Product Details Update/Change</h3>
<form action="" enctype="multipart/form-data" name="productForm" id="productForm" method="post" onsubmit="return checkSize(3145728)">
<table width="90%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="left" class="errorTxt" id="errorDisplay"><?php echo $_SESSION['errorMsg'] ?></td>
  <td>&nbsp;</td>
  </tr>
<tr>
<td width="20%" align="right"><label for="product_name" id="product_nameLbl">Product Name</label></td>
<td width="80%">
<input name="product_name" type="text" id="product_name" size="80" value="<?php echo $Product->getProductName(); ?>" />
</td>
</tr>
<tr>
<td align="right"><label for="price" id="priceLbl">Product Price</label></td>
<td>
<input name="price" type="text" id="price" size="12" value="<?php echo $Product->getPrice(); ?>" /> 
*per unit
</td>
</tr>
<tr>
<td align="right"><label for="purchasePrice" id="purchasePriceLbl">Purchase Price/Value</label></td>
<td>
<input name="purchasePrice" type="text" id="purchasePrice" size="12" value="<?php echo $Product->getPurchasePrice(); ?>" /> 
*per unit
</td>
</tr>


<tr>
  <td align="right"><label for="quantity" id="templeLbl">Times Listed</label></td>
  <td><select name="quantity" id="quantity" class="varieryChk">
  <option value="0">0</option>
   <option value="<?php echo $Product->getTimesListed(); ?>" selected="selected"><?php echo $Product->getTimesListed(); ?></option>
    <?php 
for ($list_day = 1; $list_day <= 30; $list_day++) {
	echo '<option value="'.$list_day.'">'.$list_day.'</option>';
}
?>
  </select></td>
</tr>


<tr>
  <td align="right"><label for="quantity" id="templeLbl">Quantity</label></td>
  <td><select name="quantity" id="quantity" class="varieryChk">
  <option value="0">0</option>
   <option value="<?php echo $Product->getQuantity(); ?>" selected="selected"><?php echo $Product->getQuantity(); ?></option>
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
<option value="<?php echo $Product->getProGrader(); ?>" selected="selected"><?php echo $Product->getProGrader(); ?></option>
<option value="PCGS">PCGS</option>
<option value="NGC">NGC</option>
<option value="ANACS">ANACS</option>
</select>
</td>
</tr>
<tr>
  <td align="right"><label for="strike" id="strikeLbl">Strike</label></td>
  <td><select name="strike" id="strike">
<option value="<?php echo $Product->getStrike(); ?>" selected="selected"><?php echo $Product->getStrike(); ?></option>  
    <option value="Business">Business</option>
    <option value="Proof">Proof</option>
  </select></td>
</tr>
<tr>
  <td align="right"><label for="coinYear" id="coinYearLbl">Coin Year</label></td>
  <td><select name="coinYear" id="coinYear">
<option value="<?php echo $Product->getCoinYear(); ?>" selected="selected"><?php echo $Product->getCoinYear(); ?></option>  
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
  <option value="<?php echo $Product->getError(); ?>" selected="selected"><?php echo $Product->getError(); ?></option>
    <option value="0">Non Error</option>
    <option value="1">Error Coin</option>
  </select></td>
</tr>
<tr>
  <td align="right"><label for="coinGrade" id="coinGradeLbl">Coin Grade</label></td>
  <td><select name="coinGrade" id="coinGrade">
    <option value="<?php echo $Product->getCoinGrade(); ?>" selected="selected"><?php echo $Product->getCoinGrade(); ?></option>
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
		  <option value="MS70">(MS-70) Mint State Perfect</option>';
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
  <td><input type="text" name="serialNum" id="serialNum" value="<?php echo $Product->getSerialNum(); ?>" /></td>
</tr>
<tr>
<td align="right"><label for="category" id="categoryLbl">Category</label></td>
<td><select name="category" id="category">
<option value="<?php echo $Product->getCategory(); ?>"><?php echo $Product->getCategory(); ?></option>
<option value="Coins">Coins</option>
<option value="Sets">Sets</option>
<option value="Supplies">Supplies</option>
<option value="Collections">Collections</option>
<option value="Rolls">Rolls</option>
</select></td>
</tr>
<tr>
<td align="right"><label for="tags" id="tagsLbl">Tags</label></td>
<td>
<select name="tags" id="tags">
<option selected="selected" value="<?php echo $Product->getTags(); ?>"><?php echo $Product->getTags(); ?></option>
<option value="Double Die">Double Die</option>
<option value="Special Mint">Special Mint</option>
<option value="RPM">RPM</option>
<option value="Mint Mark Variety">Mint Mark Variety</option>
<option value="Off Center">Off Center</option>
<option value="Date Variety">Date Variety</option>
<option value="Design Variety">Design Variety</option>
<option value="Steel Penny">Steel Penny</option> 
</select>
</td>
</tr>
<tr>
<td align="right"><label for="coinType" id="coinTypeLbl">Coin Type</label></td>
<td><label>
<select name="coinType" id="coinType">
<option value="<?php echo $Product->getCoinType(); ?>" selected="selected"><?php echo $Product->getCoinType(); ?></option>
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
<td align="right" valign="top"><label for="details" id="detailsLbl">Product Description</label></td>
<td>
<textarea name="details" id="details"  class="wysiwyg"><?php echo $Product->getDetails(); ?></textarea>
</td>
</tr>
<tr>
  <td align="right"><label for="refund" id="refundLbl">Refund</label></td>
  <td><select name="refund" id="refund">
    <option value="<?php echo $Product->getRefundType(); ?>" selected="selected"><?php echo $Product->getRefundType(); ?></option>
    <option value="No Refund for This Product">No Refund for This Product</option>
    <option value="15 Days in Unopened Package">15 Days in Unopened Package</option>
    </select></td>
</tr>
<tr>
  <td align="right"><label for="points" id="pointsLbl">Member Points</label></td>
  <td><select name="points" id="points">
  <option value="<?php echo $Product->getPoints(); ?>" selected="selected"><?php echo $Product->getPoints(); ?></option>
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
  </select></td>
</tr>       
<tr>
<td><input name="productID" type="hidden" value="<?php echo $_GET['id'] ?>" /></td>
<td><label>
<input type="submit" name="productFormBtn" id="productFormBtn" value="Update Product" />
</label></td>
</tr>
</table>
</form>  
<hr />
<h2>Image Gallery</h2>

<table width="960" border="0">
  <tr align="center">
    <td width="240" class="imgRow"><a href="<?php echo $Product->getCoinImage1() ?>" rel="lightbox[coin]" title="<?php echo $Product->getProductName() ?>"><?php echo '<img class="collectionImg" src="'.$Product->getCoinImage1().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $Product->getCoinImage2() ?>" rel="lightbox[coin]" title="<?php echo $Product->getProductName() ?>"><?php echo '<img class="collectionImg" src="'.$Product->getCoinImage2().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $Product->getCoinImage3() ?>" rel="lightbox[coin]" title="<?php echo $Product->getProductName() ?>"><?php echo '<img class="collectionImg" src="'.$Product->getCoinImage3().'" class="coinTblImg" />'; ?></a></td>
    <td width="240" class="imgRow"><a href="<?php echo $Product->getCoinImage4() ?>" rel="lightbox[coin]" title="<?php echo $Product->getProductName() ?>"><?php echo '<img class="collectionImg" src="'.$Product->getCoinImage4().'" class="coinTblImg" />'; ?></a></td>
  </tr>
  <tr align="center">
    <td><a href="javascript:void(0)" id="coinPic1Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic2Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic3Lnk">Edit</a></td>
    <td><a href="javascript:void(0)" id="coinPic4Lnk">Edit</a></td>
  <tr align="center" id="editRow">
    <td><span id="imgMsg1">Upload/Switch:</span> 
    <form id="coinPic1Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
    <input name="coinPic1" id="coinPic1" type="file" />
    <input name="coinPic1Btn" id="coinPic1Btn" type="submit" value="Upload" /></form>
    </td>
    <td><span id="imgMsg2">Upload/Switch: </span>
    <form id="coinPic2Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
    <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
    <input name="coinPic2" id="coinPic2" type="file" />
    <input name="coinPic2Btn" id="coinPic2Btn" type="submit" value="Upload" /></form>
    </td>
        <td><span id="imgMsg3">Upload/Switch: </span>
        <form id="coinPic3Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
        <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
        <input name="coinPic3" id="coinPic3" type="file" />
        <input name="coinPic3Btn" id="coinPic3Btn" type="submit" value="Upload" /></form>
        </td>
            <td><span id="imgMsg4">Upload/Switch: </span>
            <form id="coinPic4Frm" class="compactForm" action="" method="post" enctype="multipart/form-data">
            <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
            <input name="coinPic4" id="coinPic4" type="file" />
            <input name="coinPic4Btn" id="coinPic4Btn" type="submit" value="Upload" /></form>
            </td>
  </tr>
  <tr align="center">
    <td>
    <?php if ($Product->getCoinImage1() != 'None') {?>
    <form id="coinPic1DeleteFrm" class="compactForm" action="" method="post">
    <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
    <input name="img1RemoveBtn" id="img1RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
    <?php if ($Product->getCoinImage2() != 'None') {?>
    <form id="coinPic2DeleteFrm" class="compactForm" action="" method="post">
    <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
    <input name="img2RemoveBtn" id="img2RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
  <?php  } else { echo ''; }?>  
  
    </td>
    <td>
        <?php if ($Product->getCoinImage3() != 'None') {?>
    <form id="coinPic3DeleteFrm" class="compactForm" action="" method="post">
    <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
    <input name="img3RemoveBtn" id="img3RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
    <td>
        <?php if ($Product->getCoinImage4() != 'None') {?>
    <form id="coinPic4DeleteFrm" class="compactForm" action="" method="post">
    <input name="productID" type="hidden" value="<?php echo $productID; ?>" />
    <input name="img4RemoveBtn" id="img4RemoveBtn" type="submit" value="Delete" onclick="return confirm('Delete this Image?')"/></form>
    <?php  } else { echo ''; }?>  
    </td>
  </tr>
</table>


  <p>&nbsp;</p>
  
  
  
  
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>