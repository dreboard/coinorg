<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
//fileinclude"../inc/ebay/DisplayUtils.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>

<link rel="stylesheet" type="text/css" href="../inc/classes/ebay/facebox/facebox.css"/>
<script src="../inc/classes/ebay/facebox/facebox.js" type="text/javascript"></script> 
<script src="../inc/classes/ebay/functions/ready.js"></script>
<link rel="stylesheet" type="text/css" href="../inc/classes/ebay/eb_css.css"/>

<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	


});
</script> 
<style type="text/css">


</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Collection</h1>
<?php include("../inc/classes/ebay/ebay_search.php"); ?>
<hr />



<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>