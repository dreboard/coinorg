<?php 
include("inc/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lincoln Cents | My Home Page</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
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
  <br />  
  <h1 id="pageHdr">My Home Page</h1>

<p>Recent Purchasess</p>
<?php echo $User->getEmail() ?>
<table width="100%" border="0">
  <tr class="darker">
    <td width="53%">Product</td>
    <td width="12%">Price</td>
    <td width="20%">Transaction #</td>
    <td width="15%">Added</td>
  </tr>
<?php 
$product_list = "";
$sql = mysql_query("SELECT * FROM transactions WHERE payer_email = '".$User->getEmail()."' ORDER BY id DESC") or die(mysql_error()); 
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount == 0) {
	echo "We have no products listed under your account";
} else {
	while($row = mysql_fetch_array($sql)){ 
			$transactionID = $row["id"];
			$arr = explode('-', rtrim($row["product_id_array"], ","));
			echo '<tr><td valign="top"><ol>';
				foreach ($arr as $val) {
					$parts = explode('-', $val);
					$Product->getProductById($parts[0]);
					 echo '<li>' . $Product->getProductName(). '</li>';
					}
			 echo '</ol><br />Purchase Total: $' .$row['mc_gross']. '</td>
            <td>$' .$row['payment_date']. '</td>
			<td>' .$row['txn_id']. '</td>
           <td>&nbsp;</td>
        </tr>
     ';
    }
}

?>  
</table>


  <p>&nbsp;</p>
  
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>