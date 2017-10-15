<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
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
<h1>Gold American Eagle Types</h1>
<table width="100%" class="coinTypeListTbl" id="nickelTbl">

  <tr align="center">
    <td><a href="addBullionType.php?coinVersion=Tenth_Ounce_Platinum"><img src="../img/Tenth_Ounce_Platinum.jpg" alt="Drapped_Bust_Dime" align="absmiddle" /></a><a href="addBullionType.php?coinVersion=Tenth_Ounce_Platinum"><br />
      $10 Tenth Ounce</a></td>
    <td><a href="addBullionType.php?coinVersion=Quarter_Ounce_Platinum"><img src="../img/Quarter_Ounce_Platinum.jpg" alt="Quarter_Ounce_Platinum" align="absmiddle" /></a><br />      
    <a href="addBullionType.php?coinVersion=Quarter_Ounce_Platinum">$25 Quarter Ounce</a></td>
    <td><a href="addBullionType.php?coinVersion=Half_Ounce_Platinum"><img src="../img/Half_Ounce_Platinum.jpg" alt="Half_Ounce_Platinum" align="absmiddle" /></a><br />      
    <a href="addBullionType.php?coinVersion=Half_Ounce_Platinum">$50 Half Ounce</a></td>
    <td><a href="addBullionType.php?coinVersion=One_Ounce_Platinum"><img src="../img/One_Ounce_Platinum.jpg" alt="Barber_Dime" align="absmiddle" /></a><a href="addBullionType.php?coinVersion=One_Ounce_Platinum"><br />
      $100 One Ounce</a></td>

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
