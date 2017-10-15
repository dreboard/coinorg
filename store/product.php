<?php 
include("inc/config.php");
$cookie_value = "";
$when_viewed = date("Y-m-d H:i:s");
$product_viewed = "";
$getIp = $_SERVER['REMOTE_ADDR'];
$ip = ip2long($getIp);
$cookieTime = time()+60*60*24*30;

if (isset($_GET['id'])) {
$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
$Product->getProductById(intval($_GET['id']));
$Product->setPageView(intval($_GET['id']));
mysql_query("INSERT INTO productViews (product_viewed, when_viewed, ip) VALUES ('".intval($_GET['id'])."', '".date("Y-m-d H:i:s")."', '".ip2long($getIp)."')") or die(mysql_error());
} else {
echo "That item does not exist.";
exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Product->getProductName(); ?></title>

<link rel="icon" type="image/png" href="http://www.mycoinorganizer.com/img/icon.png"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://www.allsmallcents.com/scripts/scripts.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-40370174-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><link rel="stylesheet" type="text/css" href="css/style.css"/>

<script type="text/javascript">
$(document).ready(function(){
	
$('#productImage1').click(function(){
  $('#productImage').attr('src', '<?php echo $Product->getNoImage1(); ?>'); 
});
$('#productImage2').click(function(){
  $('#productImage').attr('src', '<?php echo $Product->getNoImage2(); ?>'); 
});
$('#productImage3').click(function(){
  $('#productImage').attr('src', '<?php echo $Product->getNoImage3(); ?>'); 
});
$('#productImage4').click(function(){
  $('#productImage').attr('src', '<?php echo $Product->getNoImage4(); ?>'); 
});
});

window.onload = function init(){

}
function addCart(){
	document.addCartForm.submit();
}
</script>
<style type="text/css">
.productMiniImg {width:45px; height:auto; cursor:pointer;}
</style>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
<h1><?php echo $Product->getProductName(); ?></h1>

<table id="productDisplay" width="100%" border="0" cellspacing="0" cellpadding="15">
<tr>
<td width="19%" valign="top">
<a href="<?php echo $Product->getCoinImage1(); ?>"><img title="<?php echo $Product->getProductName() ?>" id="productImage" class="productImg" src="<?php echo $Product->getCoinImage1(); ?>" alt="<?php echo $Product->getProductName(); ?>" /></a></td>
<td width="81%" rowspan="2" valign="top">

<table width="100%" border="0">
  <tr>
    <td width="14%"><strong>Type</strong></td>
    <td width="86%"><a title="<?php echo $Product->getCoinType() ?>" class="brownLink" href="product_list.php?coinType=<?php echo str_replace(' ', '_', $Product->getCoinType()) ?>"><?php echo $Product->getCoinType(); ?></a> <?php echo "$subcategory $category"; ?></td>
  </tr>
  <tr>
    <td><strong>Price</strong></td>
    <td><?php echo "$".$Product->getPrice(); ?></td>
  </tr>
  <tr>
    <td><strong>Cert#</strong></td>
    <td><?php echo $Product->getSerialNum(); ?></td>
  </tr>
  <tr>
    <td colspan="2"><br />

    <?php echo $Product->getDetails(); ?>
    
    </td>
    </tr>
</table>
<?php if ($Product->getListedSite() == '1'){ ?>
<form id="addCartForm" name="addCartForm" method="post" action="cart.php">
<input type="hidden" name="pid" id="pid" value="<?php echo intval($_GET['id']); ?>" />
<input type="image" src="img/addtoCartBtn.jpg" name="addCartBtn" id="addCartBtn" onclick="addCart();" />
<!--<input type="submit" name="button" id="button" value="Add to Shopping Cart" />-->
</form>
<?php } else { echo '<span class="errorTxt">This item has been sold</span>';}  ?>
</td>
</tr>
<tr>
  <td valign="top" align="center">

<table width="300" border="0" id="imgTbl">
  <tr align="center">
    <td><img id="productImage1" class="productMiniImg" src="<?php echo $Product->getNoImage1(); ?>" /></td>
    <td><img id="productImage2" class="productMiniImg" src="<?php echo $Product->getNoImage2(); ?>" /></td>
    <td><img id="productImage3" class="productMiniImg" src="<?php echo $Product->getNoImage3(); ?>" /></td>
    <td><img id="productImage4" class="productMiniImg" src="<?php echo $Product->getNoImage4(); ?>" /></td>
  </tr>
</table>  
  
  
  </td>
</tr>
</table>
<hr />

<h3>Similar items</h3>
  <table width="100%" border="0">
  <tr>
<?php 
if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1) {
	     $keys = array();
        foreach ($_SESSION["cart_array"] as $each_item) { 
		array_push($keys, $each_item['item_id']);
		
 }
 $IDS = mysql_real_escape_string(implode(',', $keys));
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND siteID = '1' AND quantity >= '1' AND coinType = '".$Product->getCoinType()."' AND productID != '".intval($_GET['id'])."' LIMIT 4");
		 if(mysql_num_rows($sql) == 0){
	  echo '<td width="250">No other products for '.$Product->getCoinType().'</td>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
echo '<td width="25%" valign="top" align="center"><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img class="productLikeImg" src="'.$Product->getCoinImage1().'" alt="'.$Product->getProductName().'" /></a><br /><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'<br />$'.$Product->getPrice().'</a></td>';
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE coinType = '".$Product->getCoinType()."' AND siteID = '1' AND quantity >= '1' AND productID != '".intval($_GET['id'])."' ORDER BY product_name ASC LIMIT 4");
    if(mysql_num_rows($sql) == 0){
	  echo '<td width="250">No other products for '.$Product->getCoinType().'</td>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
echo '<td width="25%" valign="top" align="center"><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img class="productLikeImg" src="'.$Product->getCoinImage1().'" alt="'.$Product->getProductName().'" /></a><br /><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'<br />$'.$Product->getPrice().'</a></td>';
  }
}
}
?>
</tr>
</table>  
<p>&nbsp;</p>
<div id="ebayBanner">

<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=31373&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="img/pennies-for-sale-on-ebay.jpg" width="554" height="100" alt="pennies-for-sale-on-ebay" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=&mpt=[CACHEBUSTER]"></div>
<p>&nbsp;</p>
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>