<?php 
include '../inc/config.php';

if (isset($_SESSION['accountID'])) {
	  $accountID = intval($_SESSION['accountID']);
} else {
header('Location: ../login.php');
}
$storeMessage = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	
$('#recoverDiv').hide();
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#loginForm").submit(function() {
      if ($("#email").val() == "") {
		$("#email").addClass("errorInput");
        $("#formErrors").text("Need email address...").show();
        return false;
      }else if ($("#password").val() == "") {
		$("#password").addClass("errorInput");  
        $("#formErrors").text("Need password...").show();
        return false;
      }else {
	 $('#loginFormBtn').val("Accessing Account.....");	  
	  return true;
	  }
});

$("#forgotTxt").click(function(event) {
	event.preventDefault();
	$('#recoverDiv').show();
});


$("#recoverEmail").focus(function() {
		$(this).removeClass("errorInput");
		$("#note2").html("&nbsp;");
});

$("#passRecoverForm").submit(function() {
      if ($("#recoverEmail").val() == "") {
		$("#recoverEmail").addClass("errorInput");
        $("#note2").text("Need email address...").addClass('errorTxt');
        return false;
      }else {
	 $('#passRecoverFormBtn').val("Accessing Account.....");	  
	  return true;
	  }
});


});
</script>  


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Product List</h1>
<p id="senderMessage" class="errorTxt"><?php echo $storeMessage ?></p>
<table width="79%" border="3" cellpadding="2" cellspacing="0" class="midTable">
<tr>
<td width="19%"><a href="storeHome.php">Store Home</a></td>
<td width="23%"><a href="storeInventory_list.php?readAll=1">All Products</a></td>
<td width="34%"><a href="storeInventoryNew.php">+ Add New  Item</a></td>
<td width="24%"><a href="storeReports.php">Reports</a></td>
</tr>
</table>
<?php 
if(isset($_GET["category"])){
$category = $_GET['category'];
$resultAll = mysql_query("SELECT * FROM products WHERE category='$category' ORDER BY product_name ASC") or die(mysql_error());
$allCount = mysql_num_rows($resultAll);
echo "<h2>You have $allCount $category Products</h2>";
while($row = mysql_fetch_array($resultAll))
{
$id = $row["id"];
$product_name = $row["product_name"];
$price = $row["price"];
$category = $row["category"];
$subcategory = $row["subcategory"];
$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));

echo "
<table width='100%' cellspacing='0' cellpadding='0'>
<tr>
<td width='101' class='darker' scope='row'>Name</td>
<td width='401'>$product_name</td>
<th width='277' rowspan='6'><img class='productImage' src='../inventory_images/$id.jpg' alt=' $product_name' border='0' /></th>
</tr>
<tr>
<td scope='row' class='darker'> Category</td>
<td><a href='productCat.php?category=$category&readAll=1'>$category</a></td>
</tr>
<tr>
<td scope='row' class='darker'>Subcategory</td>
<td><a href='productSub.php?subcategory=$subcategory&readAll=1'>$subcategory</a></td>
</tr>
<tr>
<td width='101' class='darker' scope='row'>Date Added</td>
<td>$date_added</td>
</tr>
<tr>
<td width='101' class='darker' scope='row'>Product ID</td>
<td>$id</td>
</tr>
<tr>
<td width='101' class='darker' scope='row'><a href='inventory_edit.php?id=$id'>Edit</a></td>
<td>&#36;$price</td>
</tr>
</table>
<hr />";
}
}
?>
<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>