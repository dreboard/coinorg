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
<h1>Half Dollar Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3>Half Dollars</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Flowing_Hair_Half_Dollar"><img src="../img/Flowing_Hair_Half_Dollar.jpg" alt="Flowing_Hair_Half_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Flowing_Hair_Half_Dollar"><br />
      Flowing Hair</a><br />
(1794-1795)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Half_Dollar"><img src="../img/Draped_Bust_Half_Dollar.jpg" alt="Draped_Bust_Half_Dollar" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Draped_Bust_Half_Dollar">Draped Bust</a><br />
(1796-1807)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Half_Dollar"><img src="../img/Liberty_Cap_Half_Dollar.jpg" alt="Liberty_Cap_Half_Dollar" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap</a><br />
(1838-1891)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Half_Dollar"><img src="../img/Seated_Liberty_Half_Dollar.jpg" alt="Seated_Liberty_Half_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Seated_Liberty_Half_Dollar"><br />
      Seated Liberty </a><br />
(1839-1891)</td>
    <td><a href="addCoinType.php?coinType=Barber_Half_Dollar"><img src="../img/Barber_Half_Dollar.jpg" alt="Barber_Half_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Barber_Half_Dollar"><br />
     Barber</a><br />
(1892-1915)</td>
    <td><a href="addCoinType.php?coinType=Walking_Liberty"><img src="../img/Walking_Liberty.jpg" alt="Walking_Liberty" align="absmiddle" /></a><a href="addCoinType.php?coinType=Walking_Liberty"><br />
      Walking Liberty </a><br />
(1916-1947)</td>
  </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Franklin_Half_Dollar"><img src="../img/Franklin_Half_Dollar.jpg" alt="Franklin_Half_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Franklin_Half_Dollar"><br />
      Franklin</a><br />
(1948-1963)</td>
    <td><a href="addCoinType.php?coinType=Kennedy_Half_Dollar"><img src="../img/Kennedy_Half_Dollar.jpg" alt="Kennedy_Half_Dollar" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Kennedy_Half_Dollar">Kennedy</a><br />
(1964-Present)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
