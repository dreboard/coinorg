<?php 
//error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("../../connect.php");
$eventMonth = date('F');
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $category = $row["category"];
			 $subcategory = $row["subcategory"];
    }
} 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Ali Kai Martial Arts, Shop for Martial Arts Products." />
<meta name="keywords" content="Martial Arts weapons, Martial Arts video, Martial Arts gear." />
<title>Our Martial Arts Products</title>
<link href="../../css/mystyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript"src="http://www.dreswebstudio.com/javascript/jquery.js"></script>
<script src="http://www.dreswebstudio.com/javascript/jquery.anchor.js" type="text/javascript"></script> 
<script type="text/javascript" src="../../scripts/main.js"></script>
<style type="text/css">
#senderMessage {color:#900;}
.labelfocus {color:#b78727;}
</style>
<script type="text/javascript">
$(document).ready(function(){
$("form :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
}).blur(function() {
  $("label").removeClass("labelfocus");
});
});

</script>

</head>

<body>
<div id="container"><!--START CONTAINER--><!--END HEADER-->

<div id="nav"><!--START NAV-->
<table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><a href="../../index.php"><img src="../../img/homeBtn2.jpg" alt="Home Page" name="homeBtn" width="100" height="34" id="homeBtn"></a></td>
<td><a href="../../schedule.php"><img src="../../img/schedBtn2.jpg" alt="Home Page" name="schedBtn" width="128" height="40" id="schedBtn"></a></td>
<td><a href="../../history.php"><img src="../../img/hisBtn.jpg" alt="Home Page" name="hisBtn" width="128" height="40" id="hisBtn"></a></td>
<td><a href="../../instructors.php"><img src="../../img/instructBtn.jpg" alt="Home Page" name="instructBtn" width="128" height="40" id="instructBtn"></a></td>
<td><a href="../../contact.php"><img src="../../img/contactBtn.jpg" alt="Home Page" name="contactBtn" width="128" height="40" id="contactBtn"></a></td>
</tr>
</table>
</div><!--END NAV-->
<div><!--START TOPBOXNAV-->
<table>
<tr>
<td width="370"><a href="../../manage/home.php"><img src="../../img/logoMainSm.png" alt="main logo" name="headerPic" width="352" height="129" border="0" id="headerPic"></a></td>
<td width="325" valign="top"><h1>Product Categories</h1>
<p>Your <a href="../../MyOnlineStore - Copy/cart.php">Cart</a></p></td>
</tr>
</table>
  <h1>Our Martial Arts Products</h1>
<table class="midTable" width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td><select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option value="productCat.php?category=Clothing">All Clothing</option>
<option value="productSub.php?subcategory=Uniforms">YAHOO</option>
<option value="productSub.php?subcategory=Shirts">Shirts</option>
</select>
</td>
<td>
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
<option value="">Weapons</option>
    <option value="productCat.php?category=Weapons">All Weapons</option>
    <option value="productSub.php?subcategory=Blades">Blades</option>
    <option value="productSub.php?subcategory=Staffs">Staffs</option>
</select>
</td>
<td>
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option value="productCat.php?category=Gear">Gear</option>
    <option value="product.php">YAHOO</option>
    <option value="http://www.google.com/">GOOGLE</option>
    <option value="http://www.altavista.com/">ALTAVISTA</option>
    <option value="http://www.amazon.com/">AMAZON</option>
    <option value="http://artlung.com/">ARTLUNG</option>
</select>
</td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td><img src="../../img/allClothing.jpg" width="250" height="200" alt="Our Products"></td>
<td><img src="../../img/allWeapons.jpg" width="250" height="200" alt="Our Products"></td>
<td><img src="../../img/allGear.jpg" width="250" height="200" alt="Our Products"></td>
</tr>  
<tr>
<th scope="col">Clothing</th>
<th scope="col">Weapons</th>
<th scope="col">Gear</th>
</tr>
</table>

<p>DATA HERE</p>
<!--DATA HERE--> 

<p><a href="#top" class="anchorLink"><span class="linkDecorater">Top</span></a></p>

<br class="clear" />
</div><!--END TOPBOXNAV-->
</div>
<div id="footer">
<ul class="events" id="footerLinks">
<li><a href="../../login.php">Student Login</a></li>
<li><a href="../../contact.php">Contact</a></li>
<li><a href="../../schedule.php">Schedule</a></li>
</ul>
<p>Content © Ali Kai Martial Arts  <?php echo date("Y"); ?>,  <br>
Created by <a href="http://www.dreswebstudio.com" title="Dre's Web Studio">dreswebstudio.com</a></p>
</div>

</div><!--END CONTAINER-->
</body>
</html>
