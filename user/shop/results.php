<?php 
include '../../inc/configSite.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  


<style type="text/css">
#cartTable {width:780px; max-width:800px;}
.deleteBtnForm {padding:0px; margin:0px; width:90px; height:40px;}
.payPalForm {padding:0px; margin:0px;}
#cartTable input[type=text] {padding:0px; margin:0px;}
</style>
<link rel="stylesheet" type="text/css" href="../../style.css"/>
<?php include ("../../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../../inc/pageElements/storeHeader.php"); ?>
<div id="content" class="clear">

<h2>Search Results</h2>

<?php if (isset($_POST['search'])) {

	$search = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["search"]);

	$sql = mysql_query("SELECT * FROM products WHERE product_name LIKE '%$search%'");
		while($row = mysql_fetch_array($sql)){ 
		    $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $details = $row["details"];
			 $category = $row["category"];
			 $subcategory = $row["subcategory"];
			 echo $product_name;
         }
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}?>


</div>
<p>&nbsp;</p>
</div>

<?php include("../../inc/pageElements/footer.php"); ?>
</body>
</html>