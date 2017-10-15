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
<title>Add A Commemorative Coin</title>

<link rel="stylesheet" type="text/css" href="../style.css"/>
<style type="text/css">
table img {width:15px; height:15px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Add Commemorative</h1>

<h2>Commemorative Categories</h2>
<p><a href="addBullion.php" class="brownLink"><strong>Add Bullion Coin</strong></a> | <a href="addCoinRaw.php" class="brownLink"><strong>Add Circulated Coin</strong></a></p>
    
    
   <table width="100%" border="0"> 
    <tr>
      <td><h3>Coins<a name="halfDollar" id="halfCent6"></a></h3></td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <td><img src="../img/Commemorative_Half_Dollar.jpg" width="8" height="250" alt="Commemorative_Half_Dollar" /> Half Dollar</td>
    <td><a href="addCoinType.php?coinType=Commemorative_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Commemorative_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Commemorative_Half_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Commemorative_Dollar.jpg" alt="Commemorative_Dollar" align="bottom" /> Dollar</td>
    <td><a href="addCoinType.php?coinType=Commemorative_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Commemorative_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Commemorative_Dollar">View Check List</a></td>
  </tr>
  <tr>
    <td><img src="../img/Commemorative_Quarter_Eagle.jpg" alt="Commemorative_Quarter_Eagle" align="bottom" /> Quarter Eagle</td>
    <td><a href="addCoinType.php?coinType=Commemorative_Quarter_Eagle">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Commemorative_Quarter_Eagle">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Commemorative_Quarter_Eagle">View Check List</a></td>
  </tr>
  <tr>
    <td><img src="../img/Commemorative_Five_Dollar.jpg" alt="Commemorative_Five_Dollar" align="bottom" /> Five Dollar</td>
    <td><a href="addCoinType.php?coinType=Commemorative_Five_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Commemorative_Five_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Commemorative_Five_Dollar">View Check List</a></td>
  </tr>
  <tr>
    <td><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" align="bottom" /> Ten Dollar</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Seated_Liberty_Half_Dollar">View Check List</a></td>
    </tr>
   <tr>
    <td><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" align="bottom" /> Twenty Dollar</td>
    <td><a href="addCoinType.php?coinType=Barber_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Barber_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Barber_Half_Dollar">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/Tenth_Ounce_Gold.jpg" alt="Liberty_Cap_Half_Cent" align="bottom" /> Fifty Dollar</td>
    <td><a href="addCoinType.php?coinType=Walking_Liberty">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Walking_Liberty">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Walking_Liberty">View Check List</a></td>
    </tr>
      <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>

<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
