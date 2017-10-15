<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">
table h2 {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1>Add Bags / Rolls</h1>
<!--<table width="100%" border="0" id="bulkLinksTbl">
  <tr align="center">
    <td><span class="darker"><a href="addMintRoll.php"><img src="../img/newRoll.jpg" alt=""  class="bulkLinks" align="texttop" /></a></span></td>
    <td><span class="darker"><a href="addRollType.php"><img src="../img/newMyRoll.jpg" alt=""  class="bulkLinks" align="texttop" /></a></span></td>
    <td><span class="darker"><a href="addMintBags.php"><img src="../img/newBag.jpg" alt=""  class="bulkLinks" align="texttop" /></a></span></td>
    <td><a href="addBags.php"><img src="../img/newMyBag.jpg" class="bulkLinks" /></a></td>
    <td><span class="darker"><a href="addBoxes.php"><img src="../img/newMyBox.jpg" alt=""  class="bulkLinks" align="texttop" /></a></span></td>
  </tr>
  <tr align="center">
    <th scope="col"><h2><a href="addMintRoll.php">Mint Rolls</a></h2></th>
    <th scope="col"><h2><a href="addRollType.php">Rolls</a></h2></th>
    <th scope="col"><h2><a href="addMintBags.php">Mint Bags</a></h2></th>
    <th scope="col"><h2><a href="addBags.php">Bags</a></h2></th>
    <th scope="col"><h2><a href="addBoxes.php">Boxes</a></h2></th>
  </tr>
</table>-->
<br />
<table width="100%" border="0">
  <tr align="center">
    <td colspan="2"><span class="darker"><img src="../img/coinRolls.jpg" align="texttop" /></span></td>
    <td colspan="2"><img src="../img/coinBags.jpg" /></td>
    <td colspan="2"><span class="darker"><img src="../img/coinBoxes.jpg" alt="" width="300" height="150" align="texttop" /></span></td>
  </tr>
  <tr align="center">
    <td width="162"><h3><a href="addMintRoll.php">Mint Rolls</a></h3></td>
    <td width="162"><h3><a href="addRollType.php">Rolls</a></h3></td>
    <td width="162"><h3><a href="addMintBags.php">Mint Series</a></h3></td>
    <td width="162"><h3><a href="addBags.php">Mint Bags</a></h3></td>
    <td width="162"><h3><a href="coinContainerNew.php">Boxes</a></h3></td>
    <td width="162"><h3><a href="addMintBoxes.php">Mint Box</a></h3></td>
  </tr>
  </table>
  <br />
<table width="100%" border="0">
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    <td><a href="addBulkLot.php"><img src="../img/coinBulk.jpg" /></a></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr align="center">
    <td width="162">&nbsp;</td>
    <td width="162">&nbsp;</td>
    <td><h3><a href="addBulkLot.php">Bulk Coins</a></h3></td>
    <td width="162">&nbsp;</td>
    <td width="162">&nbsp;</td>
  </tr>
  </table>
 <div class="spacer">&nbsp;</div>
 <p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
