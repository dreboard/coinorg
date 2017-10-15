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
<h1> Dollar Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3> Dollars</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Flowing_Hair_Dollar"><img src="../img/Flowing_Hair_Dollar.jpg" alt="Flowing_Hair_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Flowing_Hair_Dollar"><br />
      Flowing Hair</a><br />
(1794-1795)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Dollar"><img src="../img/Draped_Bust_Dollar.jpg" alt="Draped_Bust_Dollar" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Draped_Bust_Dollar">Draped Bust</a><br />
(1795-1804)</td>
    <td><a href="addCoinType.php?coinType=Gobrecht_Dollar"><img src="../img/Gobrecht_Dollar.jpg" alt="Gobrecht_Dollar" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Gobrecht_Dollar">Gobrecht </a><br />
(1836-1839)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Dollar"><img src="../img/Seated_Liberty_Dollar.jpg" alt="Seated_Liberty_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Seated_Liberty_Dollar"><br />
      Seated Liberty </a><br />
(1840-1873)</td>
    <td><a href="addCoinType.php?coinType=Trade_Dollar"><img src="../img/Trade_Dollar.jpg" alt="Barber_Half_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Trade_Dollar"><br />
     Trade Dollar</a><br />
(1873-1885)</td>
    <td><a href="addCoinType.php?coinType=Morgan_Dollar"><img src="../img/Morgan_Dollar.jpg" alt="Morgan_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Morgan_Dollar"><br />
      Morgan </a><br />
(1878-1921)</td>
  </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Peace_Dollar"><img src="../img/Peace_Dollar.jpg" alt="Peace_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Peace_Dollar"><br />
      Peace</a><br />
(1921-1935)</td>
    <td><a href="addCoinType.php?coinType=Eisenhower_Dollar"><img src="../img/Eisenhower_Dollar.jpg" alt="Eisenhower_Dollar" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Eisenhower_Dollar">Eisenhower</a><br />
(1971-1978)</td>
    <td><a href="addCoinType.php?coinType=Susan_B_Anthony_Dollar"><img src="../img/Susan_B_Anthony_Dollar.jpg" alt="Susan_B_Anthony_Dollar" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Susan_B_Anthony_Dollar">Susan B Anthony</a><br />
(1979-1981 1999)</td>
    <td><a href="addCoinType.php?coinType=Sacagawea_Dollar"><img src="../img/Sacagawea_Dollar.jpg" alt="Sacagawea_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Sacagawea_Dollar"><br />
      Sacagawea Dollar</a><br />
(2000-Present)</td>
    <td><a href="addCoinType.php?coinType=Presidential_Dollar"><img src="../img/Presidential_Dollar.jpg" alt="Presidential_Dollar" align="absmiddle" /></a><a href="addCoinType.php?coinType=Presidential_Dollar"><br />
     Presidential</a><br />
(2007-2016)</td>
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
