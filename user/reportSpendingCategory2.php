<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$coinCategoryLink = $_GET["coinCategory"];
$year = intval($_GET["year"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $coinCategory ?> Finance Report</title>
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
#chart_div {margin:0px;}
#monthInvestTbl {font-size:75%;}
#monthInvestTbl tr:hover
{
        background-color:#333;
		color:#fff;
}
#chart_div {margin:0px; padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<?php include("../inc/finance/".$coinCategoryLink.".php"); ?>


<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>