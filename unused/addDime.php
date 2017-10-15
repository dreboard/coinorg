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
<h1>Dime Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3>Dimes</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addCoinType.php?coinType=Drapped_Bust_Dime"><img src="../img/Drapped_Bust_Dime.jpg" alt="Drapped_Bust_Dime" align="absmiddle" /></a><a href="addCoinType.php?coinType=Drapped_Bust_Dime"><br />
      Draped Bust</a><br />
(1796-1807)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Dime"><img src="../img/Liberty_Cap_Dime.jpg" alt="Liberty_Cap_Dime" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Liberty_Cap_Dime">Liberty Cap</a><br />
(1809-1837)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Dime"><img src="../img/Seated_Liberty_Dime.jpg" alt="Seated_Liberty_Dime" align="absmiddle" /></a><br />      <a href="addCoinType.php?coinType=Seated_Liberty_Dime">Seated Liberty </a><br />
(1837-1891)</td>
    <td><a href="addCoinType.php?coinType=Barber_Dime"><img src="../img/Barber_Dime.jpg" alt="Barber_Dime" align="absmiddle" /></a><a href="addCoinType.php?coinType=Barber_Dime"><br />
      Barber</a><br />
(1892-1916)</td>
    <td><a href="addCoinType.php?coinType=Winged_Liberty_Dime"><img src="../img/Winged_Liberty_Dime.jpg" alt="Winged_Liberty_Dime" align="absmiddle" /></a><a href="addCoinType.php?coinType=Winged_Liberty_Dime"><br />
     Winged Liberty</a><br />
(1916-1945)</td>
    <td><a href="addCoinType.php?coinType=Roosevelt_Dime"><img src="../img/Roosevelt_Dime.jpg" alt="Roosevelt_Dime" align="absmiddle" /></a><a href="addCoinType.php?coinType=Roosevelt_Dime"><br />
      Roosevelt</a><br />
(1946-Present)</td>
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
