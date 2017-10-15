<?php 
session_start();
$toplinks = "";
if(isset($_SESSION["id"])){
	$userid = $_SESSION["id"];
	$username = $_SESSION["username"];
	$toplinks = "
	<li><a href='member_profile.php?id='$userid'>$username</a></li>
	<li><a href='member_account.php'>$username</a></li>
	<li><a href='logout.php'>Log Out</a></li>";
} else {
	$toplinks = "<li><a href='join_form.php'>Register</a></li><li><a href='login.php'>Login</a></li>";
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "../storescripts/connect_to_mysql.php"; 
$dynamicList = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '"><img src="../images/viewBtn.png" alt="viewBtn" name="viewBtn" width="179" height="58" id="viewBtn" /></a></td>
        </tr>
      </table>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Web Design, Dres Web Studio</title>
<meta name="keywords" content="Web development, flash animation, email campaigns, social media, web redesign, SEO, SEM, media placement, web video, mobile web, online marketing" />
<meta name="description" content="Dres Web Studio founded in 2010 to provide web page design, online video, web page redesign, and mobile web creation. Located in Toledo Ohio" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="sitemap" type="application/rss+xml" title="Sitemap" href="http://dreswebstudio.com/sitemap.xml" />
<meta name="author" content="Dre's Web Studio" />
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="http://dreboard.blogspot.com/feeds/posts/default?alt=rss" />
<link rel="shortcut icon" href="http://www.dreswebstudio.com/images/icon.ico" />
<link type="text/css" rel="stylesheet" href="../../styles.css" media="screen,projection" /> 
<script type="text/javascript" src="../../javascript/jquery.js"></script>
<script type="text/javascript" src="../../scripts.js"></script>
<style type="text/css">
/*#viewBtn {height:100%; width:auto;}*/
#dynamicList {margin-left:25px;}
</style>
<script type="text/javascript">
<!--
window.onload = function init(){

}
function validateMyForm ( ) { 
    var isValid = true;
    if ( document.productForm.product_name.value == "" ) { 
    alert ( "Please enter product name" ); 
    isValid = false;
//    } else if ( document.productForm.uName.value.length < 8 ) { 
//            alert ( "Your name must be at least 8 characters long" ); 
//            isValid = false;
    } else if ( document.productForm.price.value == "" ) { 
            alert ( "Please enter product price" ); 
            isValid = false;
    } else if ( document.productForm.details.value == "" ) { 
            alert ( "Please enter product details" ); 
            isValid = false;
    }
    return isValid;
}
//-->
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18051024-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="header">
<ul class="headList">
<li class="top">Clients</li>
<li class="bottom"><a href="../../login.php">Login to account</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Portfolio</li>
<li class="bottom"><a href="../../gallery.php">Go to Gallery</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Contact</li>
<li class="bottom"><a href="../../contact.php">E-Mail Form</a></li>
</ul>
<br class="clear" />

</div><!--END HEADER-->

<div id="container">
<div id="bigType">
<!--<div id="logoBox">
<img src="images/title.jpg" alt="Dre's Web Studio" name="headLogo" id="headLogo" />
</div>-->
<h1>manage Items.<br />
  <span class="smallType">Buy items, Web Video Production</span></h1>
</div>
<div id="paraLeft">
<div align="right" style="margin-right:32px;"><a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
<div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
<h1>Add Items </h1>
<div id="dynamicList">
<form action="inventory_list.php" enctype="multipart/form-data" name="productForm" id="productForm" method="post">
    <label>product_name</label>
          <input name="product_name" type="text" id="product_name" size="64" /><br />
        <label>price</label>
          <input name="price" type="text" id="price" size="12" /><br />
        <label>category</label>
          <select name="category" id="category">
          <option value="Clothing">Clothing</option>
          </select><br />
        <label>subcategory</label>
        <select name="subcategory" id="subcategory">
        <option value=""></option>
          <option value="Hats">Hats</option>
          <option value="Pants">Pants</option>
          <option value="Shirts">Shirts</option>
        </select><br />
          
          <label>details</label>
          <textarea name="details" id="details" cols="64" rows="5"></textarea><br />
        <label>image</label>
          <input type="file" name="fileField" id="fileField" /><br />
        <label>&nbsp;</label>
          <input type="submit" name="button" id="button" value="Add This Item Now" onclick="javascript:return validateMyForm();"/>
        
    </form>
</div>
<p>&nbsp;</p>
<br class="clear" />

</div>
<br />
<div id="paraRight">
<ul id="doList" class="noDot">
<li class="bottom">What We Do</li>
<?php echo $toplinks ?>
</ul>
</div>
<br class="clear" />
</div><!--END CONTAINER-->
<div id="footer">
<ul class="headList">
<li class="top">ALL CONTENT</li>
<li class="bottom"> &copy; Copyright <?php echo date("Y");?> <a href="../../index.php">Dre's Web Studio</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Portfolio</li>
<li class="bottom"><a href="../../gallery.php">Go to Gallery</a></li>
</ul>
<span class="headSpacer">&nbsp;</span>
<ul class="headList">
<li class="top">Valid Content</li>
<li class="bottom"></li>
</ul>
</div><!--END footer-->
</body>
</html>