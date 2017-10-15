<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="https://www.mycoinorganizer.com/img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="My Coin Organizer, Home of the Worlds Best Coin Collecting Software" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar, Coin Collecting Software" />
<?php include("../secureScripts.php"); ?>
<title>Small Cent Types</title>

<style type="text/css">
#content table img {width:100px; height:100px;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body>

<?php include("../inc/pageElements/navUser.php"); ?>


<div id="content" class="clear">

<h1>Small Cent Types</h1>

   <table width="100%" class="coinTypeListTbl" id="pennyTbl">
    <tr align="center">
   <td colspan="6" align="left"><h3>Small Cents</h3></td>
   </tr>
 <tr align="center">
   <td width="126"><a href="addCoinType.php?coinType=Flying_Eagle"><img src="../img/Flying_Eagle.jpg" align="absmiddle" /></a><a href="addCoinType.php?coinType=Flying_Eagle"><br />
     Flying Eagle</a></td>
   <td width="192"><a href="addCoinType.php?coinType=Indian_Head"><img src="../img/Indian_Head.jpg" align="absmiddle" /></a><br />     <a href="addCoinType.php?coinType=Indian_Head">Indian Head</a></td>
   <td width="161" valign="top"><a href="addCoinType.php?coinType=Lincoln_Wheat"><img src="../img/Lincoln_Wheat.jpg" align="absmiddle" /><br />
     Lincoln Wheat</a></td>
   <td width="141"><a href="addCoinType.php?coinType=Lincoln_Memorial"><img src="../img/Lincoln_Memorial.jpg" align="absmiddle" /></a><a href="addCoinType.php?coinType=Lincoln_Memorial"><br />
     Lincoln Memorial</a></td>
   <td width="120"><a href="addCoinType.php?coinType=Lincoln_Bicentennial"><img src="../img/Lincoln_Bicentennial.jpg" align="absmiddle" /></a><br />     <a href="addCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</a></td>
   <td width="105"><a href="addCoinType.php?coinType=Union_Shield"><img src="../img/Union_Shield.jpg" align="absmiddle" /></a><a href="addCoinType.php?coinType=Union_Shield"><br />
     Union Shield</a></td>
 </tr>
 <tr align="center">
   <td colspan="6" align="left"><h3><a href="addCoinRaw.php">All Types</a></h3></td>
   </tr>
  </table>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<br class="clear" />

<p>My Coin Organizer Ver 1.0 <?php echo date("Y"); ?></p>

</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>