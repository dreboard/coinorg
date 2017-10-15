<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$coinCategoryLink = $_GET["coinCategory"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $coinCategory ?> Collection Progress</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
h1 {margin-bottom:0px;}
#graphRow {padding-left:20px;}
#chart_div {margin:0px; padding:0px;}
#graphRow {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $coinCategoryLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinCategory ?> Collection Progress</h1>


<table width="100%" border="0">
  <tr>
  <td><img src="../img/coinIcon.jpg" width="25" height="24" align="absmiddle" /> <a class="brownLink" href="<?php echo $coinCategoryLink ?>.php"><strong>Main Report</strong></a></td>
    <td><img src="../img/chartIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportGraphCategory.php?coinCategory=<?php echo $coinCategoryLink ?>" class="brownLink"><strong>  Detailed Progress View</strong></a></td>
    <td><img src="../img/printIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportPrintCategory.php?coinCategory=<?php echo $coinCategoryLink ?>" class="brownLink"><strong> Print View</strong></a></td>
    <td><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /><a href="reportSpendingCategory.php?coinCategory=<?php echo $coinCategoryLink ?>&year=<?php echo $year; ?>" class="brownLink"><strong> Financial Report</strong></a></td>
    <td><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
      <option value="reportGraphCategory.php?coinCategory=Half_Cent">Half Cents</option>
      <option value="reportGraphCategory.php?coinCategory=Large_Cent">Large Cent</option>
      <option value="reportGraphCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="reportGraphCategory.php?coinCategory=Two_Cent">Two Cent Grades</option>
      <option value="reportGraphCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="reportGraphCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="reportGraphCategory.php?coinCategory=Dime">Dime</option>
      <option value="reportGraphCategory.php?coinCategory=Twenty_Cent">Twenty Cent Grades</option>
      <option value="reportGraphCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="reportGraphCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="reportGraphCategory.php?coinCategory=Dollar">Dollar</option>
      
    </select></td>
  </tr>
</table>
<?php include("../inc/charts/".$coinCategoryLink.".php"); ?>
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>