<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['id'])) {
$Sites->getSiteById(intval($_GET['id']));
$siteID = intval($_GET['id']);
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Sites->getSiteName() ?> Products</title>
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


<table width="100%" border="0">
  <tr>
    <td width="67%"><h2><?php echo $Sites->getSiteName() ?> Products</h2></td>
    <td width="33%" align="right">
    <select id="select2" name="select3" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="report.php">Switch Site....</option>
<?php 
			$sql = mysql_query("SELECT * FROM sites WHERE siteID != '".$_GET['id']."' ORDER BY siteName ASC") or die(mysql_error());
			while ($row = mysql_fetch_array($sql)) {		
				echo '<option value="saleBySite.php?id='.intval($row['siteID']).'">'.strip_tags($row['siteName']).'</option>';
			}
			?>  
    </select>
    </td>
  </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td width="9%" class="darker">Products</td>
<td width="91%"><?php echo $Product->getProductBySiteCount(intval($_GET['id'])); ?></td>
  </tr>
<tr>
				<td class="darker">Cost</td>
				<td>$<?php echo $Product->getProductBySiteCost(intval($_GET['id'])); ?></td>
                </tr>   
</table>
<hr />
<table width="100%" border="0" class="sortTbl">
<thead class="darker">
  <tr>
    <td width="53%">Product</td>
    <td width="13%">Purchase Price</td>
    <td width="19%">Sale Price</td>
    <td width="15%">Added</td>
  </tr>
</thead>
<tbody>  
<?php 
$product_list = "";
$sql = mysql_query("SELECT * FROM products WHERE siteID = ".intval($_GET['id'])." ORDER BY date_added DESC");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
			 echo '
        <tr>
          <td valign="top"><a href="inventory_edit.php?id='.intval($row['productID']).'">'.substr($row["product_name"], 0, 60).'</a></td>
		  <td>' . $row["purchasePrice"] . '</td>
            <td>$' . $row["price"] . '</td>
           <td>' .strftime("%b %d, %Y", strtotime($row["date_added"])). '</td>
        </tr>';
    }
} else {
	echo "We have no products listed in our store yet";
}

?>  
</tbody>
<tfoot class="darker">
  <tr>
    <td width="53%">Product</td>
    <td width="13%">Purchase Price</td>
    <td width="19%">Sale Price</td>
    <td width="15%">Added</td>
  </tr>
</tfoot>
</table>

  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>