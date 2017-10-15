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
<title>My Tools</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}


</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Tools</h1>
<table width="100%" border="0" id="userToolsTbl">
  <tr>
    <td width="25%"><h3><a href="userCalendar.php">Calendar</a></h3></td>
    <td width="25%"><h3><a href="userSupply.php">Supplies</a></h3></td>
    <td width="25%"><h3><a href="userTodo.php">My Tasks</a></h3></td>
    <td width="25%"><h3><a href="userNotes.php">Notebook</a></h3></td>
  </tr>
</table>
<p>Quick Links</p>
<table width="100%" border="0">
  <tr>
    <td width="14%" align="center">&nbsp;</td>
    <td width="14%" align="center">&nbsp;</td>
    <td width="14%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="userCalendar.php"><img src="../siteImg/calendar1.jpg" width="200" height="200" /></a></td>
    <td align="center"><a href="userNotes.php"><img src="../siteImg/notebook1.jpg" width="200" height="200" /></a></td>
    <td align="center">&nbsp;</td>
  </tr>
    <tr>
    <td align="center"><a href="userCalendar.php">My Calendar</a></td>
    <td align="center"><a href="userNotes.php">My Notebook</a></td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<br />



<hr />

<br />



<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>