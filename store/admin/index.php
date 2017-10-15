<?php
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reports</title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">
#adminTbl {clear:both; margin-top:12px;}
</style>

</head>

<body>
<div id="container">


<?php include("../inc/pageElements/headerAdmin.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
  <br /> 
   <table width="100%" border="0" id="adminTbl">
  <tr align="center">
    <td width="25%"><img src="../img/admin/inventory.jpg" width="150" height="150" /></td>
    <td width="25%"><img src="../img/admin/sales.jpg" width="150" height="150" /></td>
    <td width="25%"><img src="../img/admin/customer.jpg" width="150" height="150" /></td>
    <td width="25%"><img src="../img/admin/supply.jpg" width="150" height="150" /></td>
  </tr>
  <tr class="darker">
   <td width="25%" align="center">Inventory</td>
    <td width="25%" align="center">Sales</td>
   <td width="25%" align="center">Customes/User Accounts</td>
    <td width="25%" align="center">Supplier</td>
  </tr>
  <tr>
    <td width="25%" align="center"><a href="reportInventory.php">Inventory Report</a></td>
    <td width="25%" align="center"><a href="saleProduct.php">Enter New Sale</a> (Existing Product)</td>
    <td width="25%" align="center">Enter New Customer</td>
    <td width="25%" align="center"><a href="supplierNew.php">Add Supplier</a></td>
  </tr>
  <tr>
    <td align="center"><a href="inventory_new.php">Add Inventory</a></td>
    <td align="center"><a href="saleNew.php">Enter New Sale</a> (New Product)</td>
    <td align="center">All Users/Customers</td>
    <td align="center"><a href="supplierAll.php">All Suppliers</a></td>
  </tr>
  <tr>
    <td align="center"><a href="addFetaured.php">Featured</a></td>
    <td align="center"><a href="reportSales.php">Sales Report</a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="coinLotNew.php">Add New Lot</a></td>
    <td align="center"><a href="saleSite.php">New Sales Site</a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="coinLots.php">All Coin Lots</a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  </table>
<br />
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


  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>