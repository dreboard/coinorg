<?php 
include("inc/config.php");

$formErrors = "";
$loginIP = ip2long($_SERVER['REMOTE_ADDR']);
$lastlogin = date("Y-m-d H:i:s");
$recoverDate = date("Y-m-d H:i:s");
$logYear = date("Y");
$logMonth = date("F"); 

if (isset($_POST['loginFormBtn'])) {
$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']); 
		$loginQuery = mysql_query("SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1") or die(mysql_error());
		$num_rows = mysql_num_rows($loginQuery);
		if($num_rows == 0) {
				$_SESSION['message'] = 'Your email or password is incorrect';
						  } else {
						  while($row = mysql_fetch_array($loginQuery))
							  {
								  if(intval($row['active']) === 0){
									  $_SESSION['message'] = 'Your account has not been activated, please check your email.';
									  header("location: http://www.allsmallcents.com/login.php");
									  exit;
								  } else {
									    $userID = intval($row['userID']);
										$User->getUserById($userID);
										$_SESSION['userID'] = $userID;
										mysql_query("INSERT INTO logintrac (loginIP, userID, logintime) VALUES ('$loginIP','$userID', '".date("Y-m-d H:i:s")."')") or die (mysql_error());	
										if (!headers_sent()){    //If headers not sent yet... then do php redirect
											  header("location: http://www.allsmallcents.com/"); exit;
										  }else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
											  echo '<script type="text/javascript">';
											  echo 'window.location.href="http://www.allsmallcents.com";';
											  echo '</script>';
											  echo '<noscript>';
											  echo '<meta http-equiv="refresh" content="0";url="http://www.allsmallcents.com" />';
											  echo '</noscript>'; exit;
										  }			
								  }
						     }
						  }
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="All Small Cents has one of the largest selections of pennies for sale.  dealing in Flying Eagle, Indian Head and lincoln cents" />
<meta name="keywords" content="Indian Head Cent, Lincoln Wheat cent, lincoln memorial PCGS, lincoln bicentennial, Early Date Pennies." />
<meta name="revisit-after" content="7 Days">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Small Cents</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">

</script>
<style type="text/css">

</style>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
<h1>Certified Small Cents &amp; Supplies</h1>
<p>All Small Cents has one of the largest selections of pennies for sale.  Dealing in Flying Eagle, Indian Head and Lincoln cents</p>
<table width="100%" border="0">
  <tr>
    <td><div class="slider">
            <ul>
               <!-- <li rel="1" class="slide">
                	<a href="http://www.allsmallcents.com/Proof-Pennies.php" title="Proof Lincoln Wheat Cents"><img src="img/rotator/Proof-Wheat-Pennies.jpg" width="586" height="299" alt="Proof Lincoln Wheat Pennies" /></a>
                </li>  
                <li rel="2" class="slide">
               	  <a href="http://www.allsmallcents.com/Lincoln-Penny-Errors.php" title="Double Die Pennies"><img src="img/rotator/Error-and-Variety-Pennies.jpg" width="586" height="299" alt="Double Die Pennies" /></a>
                </li>-->
                <li rel="3" class="slide">
                	<a href="http://www.allsmallcents.com/Lincoln-Cent-Collections.php" title="Lincoln Cent Collections"><img src="img/rotator/Penny-Collections.jpg" width="586" height="299" alt="Penny Sets and Collections" /></a>
                </li>               
            </ul>
            <div class="clear controls">
                <img src="img/rotator/controls/arrow-left.png" width="10" height="13" alt="<" class="prev" />
                <span class="pages">
                </span>
                <img src="img/rotator/controls/arrow-right.png" width="10" height="13" alt=">" class="next" />
            </div>
		</div>
			<script type="text/javascript">
            
            $(function() 
            {
                $(".slider ul")
                .cycle({
                    prev:   '.slider .controls .prev', 
                    next:   '.slider .controls .next',
                    timeout: 6000,
                    pager:   '.slider .controls .pages',
                    pagerAnchorBuilder: pagerFactory,
                    before: function(Ec, En, o, f) 
                    {			
                        var classTarget = $(Ec);
                        var nextClassTarget = $(En);
                        
                        classTarget = classTarget.context.attributes.rel.value;
                        nextClassTarget = nextClassTarget.context.attributes.rel.value;
                        
                        $('.slider .controls .' + classTarget).removeClass('selected');
                        $('.slider .controls .' + nextClassTarget).addClass('selected');
                    }
                });
                
                // Pager Function
                function pagerFactory(idx, slide) 
                {
                    var selected = (idx == 0 ? 'selected' : null);
                    return '<img src="img/rotator/controls/blank.gif" width="13" height="14" class="number '+ selected + ' ' + parseInt(idx+1)+'" />';
                };
            });
            
            </script></td>
    <td valign="top">  
<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=main&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=11633&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="img/small-cents-on-ebay.jpg" width="355" height="300" alt="small cents on ebay" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337343394&customid=main&mpt=[CACHEBUSTER]"></td>
  </tr>
</table>

<br class="clear" />

<hr class="clear" />


  <table width="100%" border="0">
    <tr align="center" valign="top">
      <td width="41%"><h3>Coin Supplies</h3></td>
      <td width="59%"><h3>Newest Items</h3></td>
    </tr>
    <tr>
      <td><a href="Small-Cent-Roll-Trays.php"><img src="http://www.allsmallcents.com/img/Coin-Supplies.jpg" width="384" height="450" alt="Coin Supplies" /></a>&nbsp;</td>
      <td valign="top">
        
        
  <!--COINS LIST TABLE-->      
        <table width="100%" border="0">
          <tr>
            <td align="center"></td>
            </tr>
  <?php 
$sql = mysql_query("SELECT * FROM products WHERE siteID = '1' ORDER BY productID DESC LIMIT 7") or die(mysql_error());

if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any coins In your inventory</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
  echo '
<tr>
<td width="14%" align="center" valign="middle"><img alt="'.$Product->getProductName().'" class="listImg" src="'.$Product->getCoinImage1().'" title="'.$Product->getProductName().'" /></td>
<td width="75%"><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.wordwrap($Product->getProductName(), 45, "<br />\n").'</a></td>
<td align="right" valign="middle">$'.$Product->getPrice().'</td>
</tr>  
  ';
  }
}
?>
  </table>
        <!--COINS LIST TABLE-->     
        
        
        
        </td>
    </tr>
    </table>
<hr />  
<h2>Early Date Pennies</h2>  
    <table width="100%" border="0" id="productTbl">
    <thead class="darker">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
</thead>
  <tbody>
  <tr align="center" valign="top">
<?php 
$i = 1;
if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1) {
	     $keys = array();
        foreach ($_SESSION["cart_array"] as $each_item) { 
		array_push($keys, $each_item['item_id']);
		
 }
 $IDS = mysql_real_escape_string(implode(',', $keys));
		$sql = mysql_query("SELECT * FROM products WHERE  (NOT FIND_IN_SET(productID, '$IDS')) AND quantity >= '1' AND siteID = '1' AND category = 'Coins' ORDER BY product_name ASC LIMIT 20");
		 if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {
		while ($row = mysql_fetch_array($sql)) {
			$Product ->getProductById($row["productID"]);
			 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" title="'.$Product->getProductName().'" /></a><br />
			<a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
            <strong>$'.$Product->getPrice().'</strong>
            </td>';
			  $i = $i + 1; //add 1 to $i
			  if ($i == 5) { //when you have echoed 3 <td>'s
			  echo '</tr><tr valign="top" align="center">'; //echo a new row
			  $i = 1; //reset $i
			  } //close the if			 
           }
    }
} else {
	$sql = mysql_query("SELECT * FROM products WHERE quantity >= '1' AND category = 'Coins' AND siteID = '1' ORDER BY product_name ASC LIMIT 20");
    if(mysql_num_rows($sql) == 0){
	  echo '
    <td width="25%">No coins In inventory</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>';
} else {

while($row = mysql_fetch_array($sql))
  {
  $Product->getProductById(intval($row['productID']));
 echo '<td valign="top" class="productTD"><a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'"><img alt="'.$Product->getProductName().'" class="productPageImg" src="'.$Product->getCoinImage1().'" title="'.$Product->getProductName().'" /></a><br />
			<a title="'.$Product->getProductName().'" href="http://www.allsmallcents.com/product.php?id='.intval($row['productID']).'">'.$Product->getProductName().'</a><br />
            <strong>$'.$Product->getPrice().'</strong>
            </td>';
			  $i = $i + 1; //add 1 to $i
			  if ($i == 5) { //when you have echoed 3 <td>'s
			  echo '</tr><tr valign="top" align="center">'; //echo a new row
			  $i = 1; //reset $i
			  } //close the if		
  }
}
}
?>
</tr>
  </tbody>
    <tfoot class="darker">
  <tr>
    <td width="25%" align="center" valign="top">&nbsp;</td>
    <td width="25%" align="center" valign="top">&nbsp;</td>
    <td width="25%" align="center" valign="top">&nbsp;</td>
    <td width="25%" align="center" valign="top">&nbsp;</td>
  </tr>
</tfoot>

</table>

    <p><a href="http://www.allsmallcents.com/all-smal-cents-for-sale.php" title="View All Pennies for Sale" class="brownLinkBold">View All Small Cents for Sale</a></p>
   <p>&nbsp;</p> 
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>