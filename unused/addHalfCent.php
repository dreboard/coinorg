<?php 
include '../inc/config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/jquery-ui-1.8.18.custom/css/ui-lightness/jquery-ui-1.8.18.custom.css"/>

<script type="text/javascript" src="../scripts/main.js"></script>

<title>Add A Coin</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	


	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Half Cent Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3>Nickels</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Half_Cent"><img src="../img/Liberty_Cap_Half_Cent.jpg" alt="Nickel" align="absmiddle" /></a><a href="addCoinType.php?coinType=Liberty_Cap_Half_Cent"><br />
      Liberty Cap</a></td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Half_Cent"><img src="../img/Draped_Bust_Half_Cent.jpg" alt="Nickel" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</a></td>
    <td><a href="addCoinType.php?coinType=Classic_Head_Half_Cent"><img src="../img/Classic_Head_Half_Cent.jpg" alt="Nickel" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Classic_Head_Half_Cent">Classic Head</a></td>
    <td><a href="addCoinType.php?coinType=Braided_Hair_Half_Cent"><img src="../img/Braided_Hair_Half_Cent.jpg" alt="Nickel" align="absmiddle" /></a><a href="addCoinType.php?coinType=Braided_Hair_Half_Cent"><br />
      Braided Hair</a></td>
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
