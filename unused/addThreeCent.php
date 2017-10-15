<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add A Coin</title>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Three Cent Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3>Three Cents</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Three_Cent"><img src="../img/Three_Cent.jpg" alt="Nickel" align="absmiddle" /></a><a href="addCoinType.php?coinType=Three_Cent"><br />
      Two Cent
    </a><br />(1864-1873)</td>
    <td><img src="../img/blank2.jpg" alt="Nickel" align="absmiddle" /><br />      
      &nbsp;</td>
    <td><img src="../img/blank2.jpg" alt="Nickel" align="absmiddle" /><br />      
      &nbsp;</td>
    <td><img src="../img/blank2.jpg" alt="Nickel" align="absmiddle" /><br />      
      &nbsp;</td>
    <td><img src="../img/blank2.jpg" alt="Nickel" align="absmiddle" /><br />      
      &nbsp;</td>
    <td><img src="../img/blank2.jpg" alt="Nickel" align="absmiddle" />&nbsp;</td>
  </tr>
    <tr align="center">
   <td colspan="6" align="left"><h3><a href="addCoinRaw.php">All Types</a></h3></td>
   </tr>
</table>

<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
