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
<table width="100%" border="0" align="center" id="rawTypeTbl">
  <tr align="center">
    <td><a href="addRollCoinCategory.php?coinType=Draped_Bust_Dime"><img src="../img/Draped_Bust_Dime.jpg" alt="Shield_Nickel" name="Half_CentImg"  class="newImg" id="Half_CentImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Dime"><img src="../img/Liberty_Cap_Dime.jpg" name="Indian_Head"  class="newImg" id="Indian_Head" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Seated_Liberty_Dime"><img src="../img/Seated_Liberty_Dime.jpg" class="newImg" id="Lincoln_Wheat" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Barber_Dime"><img src="../img/Barber_Dime.jpg" class="newImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Winged_Liberty_Dime"><img src="../img/Winged_Liberty_Dime.jpg" class="newImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Roosevelt_Dime"><img src="../img/Roosevelt_Dime.jpg" class="newImg" /></a></td>
  </tr>  
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Draped_Bust_Dime">Draped Bust</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Dime">Liberty Cap</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Seated_Liberty_Dime">Seated Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Barber_Dime">Barber</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Winged_Liberty_Dime">Winged Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Roosevelt_Dime">Roosevelt</a></th>
  </tr>
</table>
 <p><a href="addRollType.php">Back to roll types</a></p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
