<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinID = $collectionRolls->getCoinID();
$coin->getCoinById($coinID);
}
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
<h1>Change or Select Same Coin Type</h1>
<p><strong>Current Type:</strong> <a href="editRollSameCoinForm.php?coinType=<?php echo str_replace(' ', '_', $collectionRolls->getCoinType()); ?>&ID=<?php echo $Encryption->encode($collectrollsID) ?>" class="brownLinkBold"><?php echo $collectionRolls->getCoinType(); ?></a><br />
  <strong>Current Coin:</strong> <?php echo $coin->getCoinName(); ?> <?php echo $collectionRolls->getCoinType(); ?>  </p>
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
    <td><img src="../img/Union_Shield.jpg" name="Union_Shield" class="newImg" id="Union_Shield" /></td>
    <td><img src="../img/Indian_Head_Nickel.jpg" width="250" height="250" /></td>
    <td><img src="../img/Winged_Liberty_Dime.jpg" width="250" height="250" /></td>
    <td><img src="../img/Standing_Liberty.jpg" width="250" height="250" /></td>
    <td><img src="../img/Walking_Liberty.jpg" width="250" height="250" /></td>
    <td><img src="../img/Morgan_Dollar.jpg" width="250" height="250" /></td>
  </tr>
  
  <tr align="center">
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Flying_Eagle&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Flying Eagle</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Draped_Bust_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Draped Bust</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Draped_Bust_Quarter&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Draped Bust</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Flowing_Hair_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Flowing Hair</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Indian_Head&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Indian Head</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Draped_Bust_Half_Dime">Draped Bust</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Liberty_Cap_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Liberty Cap</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Liberty_Cap_Quarter&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Liberty Cap</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Barber_Half_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Barber</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Draped_Bust_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Draped Bust </a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Lincoln_Wheat&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Lincoln Wheat</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Liberty_Cap_Half_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Liberty Cap </a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Seated_Liberty_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Seated Liberty</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Seated_Liberty_Quarter&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Seated Liberty</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Walking_Liberty&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Walking Liberty</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Gobrecht_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Gobrecht</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Lincoln_Memorial&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Lincoln Memorial</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Seated_Liberty_Half_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Seated Liberty</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Barber_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Barber</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Barber_Quarter&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Barber</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Franklin_Half_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Franklin </a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Seated_Liberty_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Seated Liberty</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Lincoln_Bicentennial&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Lincoln Bicentennial</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Shield_Nickel&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Shield Nickel</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Winged_Liberty_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Winged Liberty</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Standing_Liberty&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Standing Liberty</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Kennedy_Half_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Kennedy</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Trade_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Trade</a></th>
    </tr>
  <tr align="center">
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Union_Shield&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Union Shield</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Liberty_Head_Nickel&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Liberty Head</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Roosevelt_Dime&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Roosevelt</a></th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Washington_Quarter&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Washington</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Morgan_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Morgan</a></th>
    </tr>  
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Indian_Head_Nickel&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Indian Head</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=State_Quarter&ID=<?php echo $Encryption->encode($collectrollsID) ?>">State Quarter</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Peace_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Peace</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Jefferson_Nickel&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Jefferson</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=District_of_Columbia_and_US_Territories&ID=<?php echo $Encryption->encode($collectrollsID) ?>">D.C. &amp; US Territories</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Eisenhower_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Eisenhower</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Westward_Journey&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Westward Journey</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=America_the_Beautiful_Quarter&ID=<?php echo $Encryption->encode($collectrollsID) ?>">America the Beautiful</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Susan_B_Anthony_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Susan B Anthony</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Return_to_Monticello&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Return to Monticello</a></th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Sacagawea_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Sacagawea</a></th>
    </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col"><a href="editRollSameCoinForm.php?coinType=Presidential_Dollar&ID=<?php echo $Encryption->encode($collectrollsID) ?>">Presidential</a></th>
    </tr>
</table>
 <p><a href="addRollType.php">Back to roll types</a></p>
<a name="forms"></a>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
