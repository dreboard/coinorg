<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#wideContent {
	margin:10px auto;
	border-radius: 5px;
	padding:5px;
	width:1000px;
	overflow:auto;
	background-color:#FFFFFF;
	text-align: left;
}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="wideContent" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Collection</h1>



<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>