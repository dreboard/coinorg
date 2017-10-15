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
<title>Help Section</title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<style type="text/css">
#helpDiv a {color:#6a5246; font-weight:bold;}
#helpDiv p {font-size:110%;}
#helpDiv img {-webkit-box-shadow: 0 8px 6px -6px black; -moz-box-shadow: 0 8px 6px -6px black; box-shadow: 0 8px 6px -6px black; border:1px solid #CCC;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<div id="helpDiv">
<form method="post" action="help_search.php" class="compactForm" id="helpForm"><input name="keywords" id="keywords"><input value="Find Help Files" name="helpBtn" id="helpBtn" type="submit"> or <a href="help.php">Return to User Guide</a><br>
</form>
<?php include('../inc/help/'.strip_tags($_GET["type"]).'.php'); ?>
</div>
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>