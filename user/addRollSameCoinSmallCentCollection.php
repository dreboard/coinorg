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

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	

	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Coin Type</h1>
<table width="100%" border="0" align="center" id="rawTypeTbl">
  <tr align="center">
    <td><a href="addRollSameCoinSmallCentFormCollection.php?coinType=Flying_Eagle"><img src="../img/Flying_Eagle.jpg" alt="Flying_Eagle" name="Half_CentImg"  class="newImg" id="Half_CentImg" /></a></td>
    <td><a href="addRollSameCoinSmallCentForm.php?coinType=Indian_Head"><img src="../img/Indian_Head.jpg" name="Indian_Head"  class="newImg" id="Indian_Head" /></a></td>
    <td><a href="addRollSameCoinSmallCentForm.php?coinType=Lincoln_Wheat"><img src="../img/Lincoln_Wheat.jpg" class="newImg" id="Lincoln_Wheat" /></a></td>
    <td><a href="addRollSameCoinSmallCentForm.php?coinType=Lincoln_Memorial"><img src="../img/Lincoln_Memorial.jpg" class="newImg" /></a></td>
    <td><a href="addRollSameCoinSmallCentForm.php?coinType=Lincoln_Bicentennial"><img src="../img/Lincoln_Bicentennial.jpg" class="newImg" /></a></td>
    <td><a href="addRollSameCoinSmallCentForm.php?coinType=Union_Shield"><img src="../img/Union_Shield.jpg" class="newImg" /></a></td>
  </tr>  
  <tr align="center">
    <th scope="col"><a href="addHalfCent.php">Flying Eagle</a></th>
    <th scope="col"><a href="addLargeCent.php">Indian Head</a></th>
    <th scope="col"><a href="addRollsMixedSmallCent">Wheat</a></th>
    <th scope="col"><a href="addTwoCent.php">Memorial</a></th>
    <th scope="col"><a href="addThreeCent.php">Bicentennial</a></th>
    <th scope="col"><a href="addHalfDime.php">Union Sheild</a></th>
  </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th colspan="2" scope="col"><a href="addRollSameAllSmallCentForm.php"><img src="../img/MixedSmallCents.jpg" alt="mixed" class="newImg" id="Lincoln_Wheat2" /></a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th colspan="2" scope="col">Mixed Cents</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
</table>
 <p><a href="addRollType.php">Back to roll types</a></p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
