<?php 
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>New Supplier</title>
<script type="text/javascript">
$(document).ready(function(){	

});
</script>  


<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>New Supplier</h1>
<table class="midTable" width="60%" border="2" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="supplierAll.php">Suppliers</a></td>
    <td><a href="supplierNew.php">New Supplier</a></td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="100%" border="0">
  <tr class="darker">
    <td>Company</td>
    <td>Category</td>
    <td>Added</td>
  </tr>
  <?php 
$eventMonth = date("F");// whole (July)
$classYear = date("Y");
$eventYear  = date("Y");
$activeResult = mysql_query("SELECT * FROM suppliers WHERE supplyStatus = 'Active'") or die(mysql_error());
$active_rows = mysql_num_rows($activeResult);
echo $active_rows;
while($row = mysql_fetch_array($activeResult))
  {
  $supplyID = $row['supplyID'];
  $supplyName = $row['supplyName'];
  $dateAdded = $row['dateAdded'];  
  $supplyCategory = $row['supplyCategory'];
echo "
  <tr>
    <td><a href='supplierView.php?supplyID=$supplyID'>$supplyName</a></td>
    <td>$supplyCategory</td>
    <td>$dateAdded</td>
  </tr>
";
  }

?>
  <tr class="darker">
    <td>Company</td>
    <td>Category</td>
    <td>Added</td>
  </tr>
</table>

<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>