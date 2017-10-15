<?php 
include("inc/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lincoln Cents | Customer Service</title>
<?php include("inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">
#shippara {margin-bottom:50px;}
</style>

</head>

<body>
<div id="container">


<?php include("inc/pageElements/header.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
<?php include("inc/pageElements/nav2.php"); ?>
  <br />  
  <h1>Customer Service</h1>
  <h2>Payment</h2>
<!-- PayPal Logo --><table width="875" border="0" cellpadding="2" cellspacing="0"><tr><td width="165" align="center"></td>
  <td width="670" align="center"></td>
</tr>
  <tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_payments_by_pp_2line.png" border="0" alt="Payments by PayPal"></a><div style="text-align:center"><a href="https://www.paypal.com/webapps/mpp/how-paypal-works"><font size="2" face="Arial" color="#0079CD">How Pay Pal Works</font></a></div></td>
    <td align="left" valign="top">All payments must be made through paypal. No exceptions</td>
  </tr>
</table><!-- PayPal Logo -->
<hr />

  <h2>Shipping & Returns</h2>
  <p><strong>Shipping</strong></p>
 <p id="shippara"><img src="img/shipping.png" width="120" height="100" align="left" /> All packages are shipped using U.S. Postal Service (USPS)<br />
   <strong> No International Shipping.</strong></p>
<br />
 <hr class="clear" />

<p><strong>Returns</strong></p>
 <p id="shippara"><img src="img/returns.png" width="120" height="100" align="left" /> You may return any unopened items within 10 days of delivery for a full refund. We'll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.). Refunds will be processed through pay pal after it is determined that the original undamaged product was returned.<br />
   <strong> No Returns Non Error For Opened Items.</strong></p>
*Error Items: <strong><strong>You must notify us within 3 days of receipt of item</strong></strong>. Refunds are not processed until the item is received and inspected.<br />
  
    <p>&nbsp;</p>
</div>

</div>



<?php include("inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>