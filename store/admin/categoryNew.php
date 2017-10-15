<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";


if(isset($_POST["productFormBtn"])){
	
if($_POST['categoryName'] == '') {
	$_SESSION['errorMsg'] = 'Enter category name';
} else {
	
mysql_query("INSERT INTO category(categoryName) VALUES('".mysql_real_escape_string($_POST['categoryName'])."')") or die(mysql_error()); 

$categoryID = mysql_insert_id();

if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/categoryView.php?ID=$categoryID"); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/categoryView.php?ID='.$categoryID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/categoryView.php?ID='.$categoryID.'" />';
	echo '</noscript>'; exit;
}


}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Category</title>
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
<h2>Add New Category</h2>

<table width="100%" border="0" cellspacing="0" cellpadding="6">


 </table>
<!--<form action="inventory_list.php" enctype="multipart/form-data" name="productForm" id="productForm" method="post">-->
<form action="" name="productForm" id="productForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td align="left" class="errorTxt" id="errorDisplay"><?php echo $_SESSION['errorMsg'] ?></td>
  <td>&nbsp;</td>
  </tr>
<tr>
<td width="20%" align="right"><label for="categoryName" id="categoryNameLbl">Category Name</label></td>
<td width="80%"><input name="categoryName" type="text" id="categoryName" size="80" value="<?php if(isset($_POST["categoryName"])){echo $_POST["categoryName"];} else { 	echo '';}?>" /></td>
</tr>      
<tr>
  <td>&nbsp;</td>
  <td><label>
    <input type="submit" name="productFormBtn" id="productFormBtn" value="Add Category" />
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