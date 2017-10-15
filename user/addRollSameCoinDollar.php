<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinSubCategory"])) { 
$coinSubCategory = intval($_GET["coinSubCategory"]);
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinSubCategory = '$coinSubCategory'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubType = $row['coinSubType'];
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Coin Type</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">
  <tr align="center">
   <td colspan="6" align="left"><h3> Dollars</h3></td>
   </tr>
  <tr align="center">
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Flowing_Hair_Dollar"><img src="../img/Flowing_Hair_Dollar.jpg" alt="Flowing_Hair_Dollar" align="absmiddle" /></a><a href="addRollSameCoinLargeDollar.php?coinType=Flowing_Hair_Dollar"><br />
      Flowing Hair</a><br />
(1794-1795)</td>
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Draped_Bust_Dollar"><img src="../img/Draped_Bust_Dollar.jpg" alt="Draped_Bust_Dollar" align="absmiddle" /></a><br />      <a href="addRollSameCoinLargeDollar.php?coinType=Draped_Bust_Dollar">Draped Bust</a><br />
(1795-1804)</td>
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Gobrecht_Dollar"><img src="../img/Gobrecht_Dollar.jpg" alt="Gobrecht_Dollar" align="absmiddle" /></a><br />      <a href="addRollSameCoinLargeDollar.php?coinType=Gobrecht_Dollar">Gobrecht </a><br />
(1836-1839)</td>
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Seated_Liberty_Dollar"><img src="../img/Seated_Liberty_Dollar.jpg" alt="Seated_Liberty_Dollar" align="absmiddle" /></a><a href="addRollSameCoinLargeDollar.php?coinType=Seated_Liberty_Dollar"><br />
      Seated Liberty </a><br />
(1840-1873)</td>
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Trade_Dollar"><img src="../img/Trade_Dollar.jpg" alt="Barber_Half_Dollar" align="absmiddle" /></a><a href="addRollSameCoinLargeDollar.php?coinType=Trade_Dollar"><br />
     Trade Dollar</a><br />
(1873-1885)</td>
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Morgan_Dollar"><img src="../img/Morgan_Dollar.jpg" alt="Morgan_Dollar" align="absmiddle" /></a><a href="addRollSameCoinLargeDollar.php?coinType=Morgan_Dollar"><br />
      Morgan </a><br />
(1878-1921)</td>
  </tr>
  <tr align="center">
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Peace_Dollar"><img src="../img/Peace_Dollar.jpg" alt="Peace_Dollar" align="absmiddle" /></a><a href="addRollSameCoinLargeDollar.php?coinType=Peace_Dollar"><br />
      Peace</a><br />
(1921-1935)</td>
    <td><a href="addRollSameCoinLargeDollar.php?coinType=Eisenhower_Dollar"><img src="../img/Eisenhower_Dollar.jpg" alt="Eisenhower_Dollar" align="absmiddle" /></a><br />      <a href="addRollSameCoinLargeDollar.php?coinType=Eisenhower_Dollar">Eisenhower</a><br />
(1971-1978)</td>
    <td><a href="addRollSameCoinSmallDollar.php?coinType=Susan_B_Anthony_Dollar"><img src="../img/Susan_B_Anthony_Dollar.jpg" alt="Susan_B_Anthony_Dollar" align="absmiddle" /></a><br />      <a href="addRollSameCoinSmallDollar.php?coinType=Susan_B_Anthony_Dollar">Susan B Anthony</a><br />
(1979-1981 1999)</td>
    <td><a href="addRollSameCoinSmallDollar.php?coinType=Sacagawea_Dollar"><img src="../img/Sacagawea_Dollar.jpg" alt="Sacagawea_Dollar" align="absmiddle" /></a><a href="addRollSameCoinSmallDollar.php?coinType=Sacagawea_Dollar"><br />
      Sacagawea Dollar</a><br />
(2000-Present)</td>
    <td><a href="addRollSameCoinSmallDollar.php?coinType=Presidential_Dollar"><img src="../img/Presidential_Dollar.jpg" alt="Presidential_Dollar" align="absmiddle" /></a><a href="addRollSameCoinSmallDollar.php?coinType=Presidential_Dollar"><br />
     Presidential</a><br />
(2007-2016)</td>
    <td>&nbsp;</td>
  </tr>
  
    <tr align="center">
   <td colspan="6" align="left"><h3><a href="addCoinRaw.php">All Types</a></h3></td>
   </tr>
</table>
 <p><a href="addRollType.php">Back to roll types</a></p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
