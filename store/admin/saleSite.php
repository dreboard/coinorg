<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";


if(isset($_POST["productFormBtn"])){
	
if($_POST['siteName'] == '' || $_POST['siteURL'] == '') {
	$_SESSION['errorMsg'] = 'Site info';
} else {

mysql_query("INSERT INTO sites(siteName, siteURL, details, added) VALUES('".mysql_real_escape_string($_POST['siteName'])."', '".mysql_real_escape_string($_POST['siteURL'])."', '".mysql_real_escape_string($_POST['details'])."', '".date('Y-m-d')."')") or die(mysql_error()); 

$siteID = mysql_insert_id();
if (!headers_sent()){    //If headers not sent yet... then do php redirect
	header("location: http://www.allsmallcents.com/admin/saleBySite.php?id=".$siteID." "); exit;
}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
	echo '<script type="text/javascript">';
	echo 'window.location.href="http://www.allsmallcents.com/admin/saleBySite.php?id='.$siteID.'";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com/admin/saleBySite.php?id='.$siteID.'" />';
	echo '</noscript>'; exit;
}

}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Websites</title>
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
<h2>Add New Sale Website</h2>
<h3>Current Sites</h3>
<table width="100%" border="0">
  <tr class="darker">
    <td width="31%">Site</td>
    <td width="13%">Products</td>
<td width="56%">Cost</td>
  </tr>
			<?php 
			$sql = mysql_query("SELECT * FROM sites ORDER BY siteName ASC") or die(mysql_error());
			while ($row = mysql_fetch_array($sql)) {		
				echo '<tr><td><a href="saleBySite.php?id='.intval($row['siteID']).'">'.strip_tags($row['siteName']).'</a></td>
				<td>'.$Product->getProductBySiteCount(intval($row['siteID'])).'</td>
				<td>$'.$Product->getProductBySiteCost(intval($row['siteID'])).'</td></tr>';
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
<td width="20%" align="right"><label for="siteName" id="siteNameLbl">Site Name</label></td>
<td width="80%"><input name="siteName" type="text" id="siteName" size="80" /></td>
</tr>
<tr>
<td width="20%" align="right"><label for="siteURL" id="siteURLLbl">Site URL</label></td>
<td width="80%"><input name="siteURL" type="text" id="siteURL" size="80" /></td>
</tr>
<tr>
  <td align="right" valign="top"><label for="details" id="detailsLbl">Site Description</label></td>
  <td>
    <textarea name="details" id="details" class="wysiwyg"></textarea>
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