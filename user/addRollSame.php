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
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Single Coin Roll  Type</h1>
<table width="100%" border="0" align="center" id="rawTypeTbl">
<tr align="center">
    <th scope="col">Small Cent</th>
    <th scope="col">Nickel/Half Dime</th>
    <th scope="col">Dime</th>
    <th scope="col">Quarter</th>
    <th scope="col">Half Dollar</th>
    <th scope="col">Dollar</th>
  </tr>
  <tr align="center">
    <td><img src="../img/Union_Shield.jpg" class="newImg" id="Union_Shield" /></td>
    <td><img src="../img/Indian_Head_Nickel.jpg" width="250" height="250" /></td>
    <td><img src="../img/Winged_Liberty_Dime.jpg" width="250" height="250" /></td>
    <td><img src="../img/Standing_Liberty.jpg" width="250" height="250" /></td>
    <td><img src="../img/Walking_Liberty.jpg" width="250" height="250" /></td>
    <td><img src="../img/Morgan_Dollar.jpg" width="250" height="250" /></td>
  </tr>
  
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Flying_Eagle">Flying Eagle</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Draped_Bust_Dime">Draped Bust</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Draped_Bust_Quarter">Draped Bust</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Flowing_Hair_Dollar">Flowing Hair</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Indian_Head">Indian Head</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Draped_Bust_Half_Dime">Draped Bust</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Dime">Liberty Cap</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Quarter">Liberty Cap</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Barber_Half_Dollar">Barber</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Draped_Bust_Dollar">Draped Bust </a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Lincoln_Wheat">Lincoln Wheat</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap </a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Seated_Liberty_Dime">Seated Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Seated_Liberty_Quarter">Seated Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Walking_Liberty">Walking Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Gobrecht_Dollar">Gobrecht</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Lincoln_Memorial">Lincoln Memorial</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Barber_Dime">Barber</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Barber_Quarter">Barber</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Franklin_Half_Dollar">Franklin </a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Seated_Liberty_Dollar">Seated Liberty</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Shield_Nickel">Shield Nickel</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Winged_Liberty_Dime">Winged Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Standing_Liberty">Standing Liberty</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Kennedy_Half_Dollar">Kennedy</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Trade_Dollar">Trade</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Union_Shield">Union Shield</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Liberty_Head_Nickel">Liberty Head</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Roosevelt_Dime">Roosevelt</a></th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Washington_Quarter">Washington</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Morgan_Dollar">Morgan</a></th>
    </tr>  
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Indian_Head_Nickel">Indian Head</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=State_Quarter">State Quarter</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Peace_Dollar">Peace</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Jefferson_Nickel">Jefferson</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=District_of_Columbia_and_US_Territories">D.C. &amp; US Territories</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Eisenhower_Dollar">Eisenhower</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Westward_Journey">Westward Journey</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=America_the_Beautiful_Quarter">America the Beautiful</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Susan_B_Anthony_Dollar">Susan B Anthony</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Return_to_Monticello">Return to Monticello</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Sacagawea_Dollar">Sacagawea</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="addRollCoinCategory.php?coinType=Presidential_Dollar">Presidential</a></th>
    </tr>
</table>
 <p><a href="addRollType.php">Back to roll types</a></p>
<a name="forms"></a>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
