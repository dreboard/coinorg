<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add A Coin</title>

</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Coin Type</h1>
<table width="100%" border="0" align="center" id="rawTypeTbl">
  <tr align="center">
    <td><a href="addRollCoinCategory.php?coinType=Shield_Nickel"><img src="../img/Shield_Nickel.jpg" alt="Shield_Nickel" name="Half_CentImg"  class="newImg" id="Half_CentImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Liberty_Head_Nickel"><img src="../img/Liberty_Head_Nickel.jpg" name="Liberty_Head_Nickel"  class="newImg" id="Indian_Head" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Indian_Head_Nickel"><img src="../img/Indian_Head_Nickel.jpg" class="newImg" id="Indian_Head_Nickel" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Jefferson_Nickel"><img src="../img/Jefferson_Nickel.jpg" class="newImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Westward_Journey"><img src="../img/Westward_Journey.jpg" class="newImg" /></a></td>
    <td><a href="addRollCoinCategory.php?coinType=Return_to_Monticello"><img src="../img/Return_to_Monticello.jpg" class="newImg" /></a></td>
  </tr>  
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Shield_Nickel">Shield</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Head_Nickel">Liberty Head</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Indian_Head_Nickel">Indian Head</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Jefferson_Nickel">Jefferson</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Westward_Journey">Westward Journey</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Return_to_Monticello">Return to Monticello</a></th>
  </tr>
</table>

 <p><a href="addRollType.php">Back to roll types</a></p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
