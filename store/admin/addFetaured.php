<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";


if(isset($_POST["productFormBtn"])){
	
if($_POST['auctionNum'] == '') {
	$_SESSION['errorMsg'] = 'Enter Auction Number';
   } else {
mysql_query("INSERT INTO featuredEbay(auctionNum) VALUES('".mysql_real_escape_string($_POST['auctionNum'])."')") or die(mysql_error()); 
$_SESSION['errorMsg'] = '<span class="greenTxt">Auction Entered</span>';
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Update/Add Featured Auction</title>
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
<h2>Update/Add Featured Auction</h2>

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
<td width="20%" align="right"><label for="auctionNum" id="productIDLbl">Auction #</label></td>
<td width="80%"><input name="auctionNum" type="text" id="auctionNum" size="80" value="<?php if(isset($_POST["auctionNum"])){echo $_POST["auctionNum"];} else { 	echo '';}?>" /></td>
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