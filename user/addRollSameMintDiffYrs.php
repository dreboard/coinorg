<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Coin Type</h1>
<table width="100%" border="0" align="center" id="rawTypeTbl">

  <tr align="center">
    <td><a href="addRollYear.php?coinCategory=Small_Cent"><img src="../img/Union_Shield.jpg" class="newImg" id="Union_Shield" /></a></td>
    <td><a href="addRollYear.php?coinCategory=Nickel"><img src="../img/Indian_Head_Nickel.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollYear.php?coinCategory=Dime"><img src="../img/Winged_Liberty_Dime.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollYear.php?coinCategory=Quarter"><img src="../img/Standing_Liberty.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollYear.php?coinCategory=Half_Dollar"><img src="../img/Walking_Liberty.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollYear.php?coinCategory=Dollar"><img src="../img/Morgan_Dollar.jpg" width="250" height="250" /></a></td>
  </tr>
  <tr align="center">
    <th scope="col"><a href="addRollYear.php?coinCategory=Small_Cent">Small Cents</a></th>
    <th scope="col"><a href="addRollYear.php?coinCategory=Nickel">Nickels</a></th>
    <th scope="col"><a href="addRollYear.php?coinCategory=Dime">Dimes</a></th>
    <th scope="col"><a href="addRollYear.php?coinCategory=Quarter">Quarters</a></th>
    <th scope="col"><a href="addRollYear.php?coinCategory=Half_Dollar">Half Dollars</a></th>
    <th scope="col"><a href="addRollYear.php?coinCategory=Dollar">Dollars</a></th>
  </tr>
</table>
<p><a href="addRollType.php">Back to roll types</a></p>
<a name="forms"></a>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
