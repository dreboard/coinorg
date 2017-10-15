<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";


if(isset($_POST["productFormBtn"])){
	
if($_POST['name'] == '' || $_POST['purchasePrice'] == '') {
	$_SESSION['errorMsg'] = 'Enter Product Detail';
} else {
	
mysql_query("INSERT INTO coinLots(name, purchasePrice, description, purchaseDate) VALUES('".mysql_real_escape_string($_POST['name'])."', '".mysql_real_escape_string($_POST['purchasePrice'])."', '".$General->setToNone($_POST['description'])."', '".date("Y-m-d",strtotime($_POST["purchaseDate"]))."')") or die(mysql_error()); 

$coinLotID = mysql_insert_id();

if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/coinLotView.php?ID=$coinLotID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/coinLotView.php?ID='.$coinLotID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/coinLotView.php?ID='.$coinLotID.'" />';
	echo '</noscript>'; exit;
}


}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Coin Lot</title>
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
<h2>Add New Coin Lot</h2>

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
<td width="20%" align="right"><label for="name" id="nameLbl">Lot Name</label></td>
<td width="80%"><input name="name" type="text" id="name" size="80" value="<?php if(isset($_POST["name"])){echo $_POST["name"];} else { 	echo '';}?>" /></td>
</tr>
<tr>
  <td align="right"><label for="purchasePrice" id="purchasePriceLbl">Purchase Price</label></td>
  <td><input type="text" name="purchasePrice" id="purchasePrice" /></td>
</tr>
<tr>
  <td align="right"><label for="proGrader" id="proGraderLbl">Purchase Date</label></td>
  <td><input type="text" name="purchaseDate" id="purchaseDate" class="showDate" /></td>
</tr>
<tr>
  <td align="right" valign="top"><label for="description" id="descriptionLbl">Sale Detail</label></td>
  <td>
    <textarea name="description" id="details" class="wysiwyg"></textarea>
    </td>
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