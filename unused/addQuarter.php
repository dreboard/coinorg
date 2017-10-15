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
<h1>Quarter Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3>Quarters</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Draped_Bust_Quarter"><img src="../img/Draped_Bust_Quarter.jpg" alt="Draped_Bust_Quarter" align="absmiddle" /></a><a href="addCoinType.php?coinType=Draped_Bust_Quarter"><br />
      Draped Bust</a><br />
(1796-1807)</td>
    <td><a href="addCoinType.php?coinType=Capped_Bust_Quarter"><img src="../img/Capped_Bust_Quarter.jpg" alt="Capped_Bust_Quarter" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Capped_Bust_Quarter">Capped Bust</a><br />
(1815-1838)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Quarter"><img src="../img/Seated_Liberty_Quarter.jpg" alt="Seated_Liberty_Quarter" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Seated_Liberty_Quarter">Seated Liberty</a><br />
(1838-1891)</td>
    <td><a href="addCoinType.php?coinType=Barber_Quarter"><img src="../img/Barber_Quarter.jpg" alt="Barber_Quarter" align="absmiddle" /></a><a href="addCoinType.php?coinType=Barber_Quarter"><br />
      Barber </a><br />
(1892-1916)</td>
    <td><a href="addCoinType.php?coinType=Standing_Liberty"><img src="../img/Standing_Liberty.jpg" alt="Standing_Liberty" align="absmiddle" /></a><a href="addCoinType.php?coinType=Standing_Liberty"><br />
      Standing Liberty </a><br />
(1916-1930)</td>
    <td><a href="addCoinType.php?coinType=Washington_Quarter"><img src="../img/Washington_Quarter.jpg" alt="Washington_Quarter" align="absmiddle" /></a><a href="addCoinType.php?coinType=Washington_Quarter"><br />
      Washington Quarter </a><br />
(1932-1998)</td>
  </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=State_Quarter"><img src="../img/State_Quarter.jpg" alt="State_Quarter" align="absmiddle" /></a><a href="addCoinType.php?coinType=State_Quarter"><br />
      State Quarter</a><br />
(1999-2009)</td>
    <td><a href="addCoinType.php?coinType=District_of_Columbia_and_US_Territories"><img src="../img/District_of_Columbia_and_US_Territories.jpg" alt="District_of_Columbia_and_US_Territories" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</a><br />
(2010)</td>
    <td><a href="addCoinType.php?coinType=America_the_Beautiful_Quarter"><img src="../img/America_the_Beautiful_Quarter.jpg" alt="America_the_Beautiful_Quarter" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=America_the_Beautiful_Quarter">America the Beautiful</a><br />
(2010-2021)</td>
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
