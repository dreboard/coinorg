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
<h1>Gold American Eagle Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">

  <tr align="center">
    <td><a href="addBullionType.php?coinVersion=Tenth_Ounce_Gold"><img src="../img/Tenth_Ounce_Gold.jpg" alt="Drapped_Bust_Dime" align="absmiddle" /></a><a href="addBullionType.php?coinVersion=Tenth_Ounce_Gold"><br />
      $5 Tenth Ounce</a></td>
    <td><a href="addBullionType.php?coinVersion=Quarter_Ounce_Gold"><img src="../img/Quarter_Ounce_Gold.jpg" alt="Quarter_Ounce_Gold" align="absmiddle" /></a><br />      <a href="addBullionType.php?coinVersion=Quarter_Ounce_Gold">$10 Quarter Ounce</a></td>
    <td><a href="addBullionType.php?coinVersion=Half_Ounce_Gold"><img src="../img/Half_Ounce_Gold.jpg" alt="Half_Ounce_Gold" align="absmiddle" /></a><br />      <a href="addBullionType.php?coinVersion=Half_Ounce_Gold">$25 Half Ounce</a></td>
    <td><a href="addBullionType.php?coinVersion=One_Ounce_Gold"><img src="../img/One_Ounce_Gold.jpg" alt="Barber_Dime" align="absmiddle" /></a><a href="addBullionType.php?coinVersion=One_Ounce_Gold"><br />
      $50 One Ounce</a></td>

  </tr>
      <tr align="center">
   <td colspan="4" align="left"><h3><a href="addCoinRaw.php">All Types</a></h3></td>
   </tr>
</table>

<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
