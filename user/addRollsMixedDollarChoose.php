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
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Dollar Size</h1>
<table width="100%" border="0" align="center" id="rawTypeTbl">
  <tr align="center">
    <td><a href="addRollsMixedDollarLarge.php"><img src="../img/Morgan_Dollar.jpg" class="newImg" /></a></td>
    <td><a href="addRollsMixedDollarSmall.php"><img src="../img/Susan_B_Anthony_Dollar.jpg" class="newImg" /></a></td>
  </tr>  
  <tr align="center">
    <th scope="col"><a href="addRollsMixedDollarLarge.php">Large</a></th>
    <th scope="col"><a href="addRollsMixedDollarSmall.php">Small</a></th>
  </tr>
  <tr align="center">
    <th scope="col">Liberty Seated, Trade, Morgan, Peace, Eisenhower Dollars</th>
    <th scope="col">Sacagawea Dollar, Susan B. Anthony Dollar, Presidential Dollar</th>
  </tr>
</table>
 <div class="spacer"></div>
<p><a href="addRollType.php">Back to Type of Roll</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
