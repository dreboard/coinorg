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
<title>Add A Coin</title>   
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Coin Type</h1>
<table width="100%" border="0" align="center" id="rawTypeTbl">
  <tr align="center">
    <td><a href="addRollCoinCategory.php?coinType=Draped_Bust_Quarter"><img src="../img/Draped_Bust_Quarter.jpg" alt="Draped_Bust_Quarter" name="Half_CentImg"  class="newImg" id="Half_CentImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Quarter"><img src="../img/Liberty_Cap_Quarter.jpg" name="Liberty_Cap_Quarter"  class="newImg" id="Indian_Head" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Liberty_Seated_Quarter"><img src="../img/Liberty_Seated_Quarter.jpg" class="newImg" id="Lincoln_Wheat" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Barber_Quarter"><img src="../img/Barber_Quarter.jpg" class="newImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Standing_Liberty"><img src="../img/Standing_Liberty.jpg" class="newImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Washington_Quarter"><img src="../img/Washington_Quarter.jpg" class="newImg" /></a></td>
  </tr>  
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Draped_Bust_Quarter">Draped Bust</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Dime">Liberty Cap</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Seated_Quarter">Seated Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Barber_Quarter">Barber</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Standing_Liberty">Standing_Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Washington_Quarter">Washington_Quarter</a></th>
  </tr>
  
    <tr align="center">
    <td colspan="2"><a href="addRollCoinCategory.php?coinType=State_Quarter"><img src="../img/State_Quarter.jpg" alt="State_Quarter" class="newImg" id="Lincoln_Wheat2" /></a></td>
    <td colspan="2"><a href="addRollCoinCategory.php?coinType=District_of_Columbia_and_US_Territories"><img src="../img/District_of_Columbia_and_US_Territories.jpg" class="newImg" id="Lincoln_Wheat" /></a></td>
    <td colspan="2"><a href="addRollCoinCategory.php?coinType=America_the_Beautiful_Quarter"><img src="../img/America_the_Beautiful_Quarter.jpg" class="newImg" /></a></td>
    </tr>  
  <tr align="center">
    <th colspan="2" scope="col"><a href="addRollCoinCategory.php?coinType=State_Quarter">Statehood</a></th>
    <th colspan="2" scope="col"><a href="addRollCoinCategory.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</a></th>
    <th colspan="2" scope="col"><a href="addRollCoinCategory.php?coinType=America_the_Beautiful_Quarter">America the Beautiful</a></th>
    </tr>
</table>
 <p><a href="addRollType.php">Back to roll types</a></p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
