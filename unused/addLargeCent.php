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
<h1>Large Cent Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3>Nickels</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Flowing_Hair_Large_Cent"><img src="../img/Flowing_Hair_Large_Cent.jpg" alt="Nickel" align="absmiddle" /></a><a href="addCoinType.php?coinType=Flowing_Hair_Large_Cent"><br />
      Flowing Hair</a><br />
(1793)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Large_Cent"><img src="../img/Liberty_Cap_Large_Cent.jpg" alt="Nickel" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</a><br />
(1793-1796)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Large_Cent"><img src="../img/Draped_Bust_Large_Cent.jpg" alt="Nickel" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</a><br />
(1796-1807)</td>
    <td><a href="addCoinType.php?coinType=Classic_Head_Large_Cent"><img src="../img/Classic_Head_Large_Cent.jpg" alt="Nickel" align="absmiddle" /></a><a href="addCoinType.php?coinType=Classic_Head_Large_Cent"><br />
      Classic Head</a><br />
(1808-1814)</td>
    <td><a href="addCoinType.php?coinType=Coronet_Liberty_Head_Large_Cent"><img src="../img/Coronet_Liberty_Head_Large_Cent.jpg" alt="Nickel" align="absmiddle" /></a><a href="addCoinType.php?coinType=Coronet_Liberty_Head_Large_Cent"><br />
      Coronet Liberty Head</a><br />
(1816-1839)</td>
    <td><a href="addCoinType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent"><img src="../img/Braided_Hair_Liberty_Head_Large_Cent.jpg" alt="Nickel" align="absmiddle" /></a><a href="addCoinType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent"><br />
      Braided Hair</a><br />
(1839-1857)</td>
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
