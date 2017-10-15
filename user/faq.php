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
<title>Frequently Asked Questions</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">



</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h2>Frequently Asked Questions</h2>
<p><strong>Why Coin Values Are Not Included In Program</strong><br>
Due to the several sources of coin values (red book, PCGS, NGC, errors
and varieties), coin values are not incorporated into mycoinorganizer.
</p>
<p><strong>Can I Import My Excel or CSV Files From USA Coin
Software or CoinManage </strong><br>
No. Due to the many different configurations of the files produced by
these programs.</p>
<p><strong></strong><br>
</p>
<p><strong></strong><br>
</p>
<p><strong></strong><br>
</p>
<p><strong></strong><br>
</p>
<br />

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>