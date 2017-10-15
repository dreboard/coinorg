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
<title>Add New Coin Roll</title>

<style type="text/css">
#bulkLinksTbl td {width:16%;}
#rollList {margin:0px auto;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Add New Coin Roll</h1>
<p><strong>Types of Coin Rolls</strong></p>

<table width="100%" border="0" cellpadding="3">
  <tr class="darker">
    <td>Roll Type</td>
    <td>Description</td>
    <td>Example</td>
  </tr>
  <tr>
    <td width="26%"><a href="addMintRoll.php">Mint Roll</a></td>
    <td width="43%">U.S. Mint Issued Roll Sets</td>
    <td width="31%">1999 New Jersey P&amp;D 2 Roll Set</td>
  </tr>
  <tr>
    <td><a href="addRollSameCoin.php">Single Coin</a></td>
    <td>Same Year &amp; Same Mint Mark</td>
    <td>1970 S Large Date</td>
  </tr>  
  <tr>
    <td><a href="addRollSameType.php">By Coin Type</a></td>
    <td>Same the Same Type.  etc.</td>
    <td>Lincoln Wheat, Indian Head</td>
  </tr>
 
  <tr>
    <td><a href="addRollDateRange.php">Date Range</a></td>
    <td>All Same Denomination with A Specific date range. </td>
    <td>1940-1949, 1950's</td>
  </tr>
  <tr>
    <td><a href="addRollSameMintDiffYrs.php">Same Year Mixed Mint</a></td>
    <td>Same the Same Type but different mint marks.</td>
    <td>1982 P,D,S</td>
  </tr>
  <tr>
    <td><a href="addRollSameCoinCollection.php">Coin By Coin</a></td>
    <td>Enter each coin and assign a grade, mint mark etc.</td>
    <td>1950 D MS60, 1955 P MS64... </td>
  </tr>
  <tr>
    <td>Bulk Rolls</td>
    <td>
    <form action="addBulkType.php" method="get" class="compactForm">
      <select name="coinType">
        <option selected="selected" value="report.php">By Type</option>
        <optgroup label="Half Cents">
          <option value="Liberty_Cap_Half_Cent">Liberty Cap</option>
          <option value="Draped_Bust_Half_Cent">Draped Bust</option>
          <option value="Classic_Head_Half_Cent">Classic Head</option>
          <option value="Braided_Hair_Half_Cent">Braided Hair</option>
          </optgroup>
        <optgroup label="Large Cents">
          <option value="Flowing_Hair_Large_Cent">Flowing Hair</option>
          <option value="Liberty_Cap_Large_Cent">Liberty Cap</option>
          <option value="Draped_Bust_Large_Cent">Draped Bust</option>
          <option value="Classic_Head_Large_Cent">Classic Head</option>
          <option value="Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
          <option value="Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
          </optgroup>
        <optgroup label="Cents">
          <option value="Flying_Eagle">Flying Eagle Cent</option>
          <option value="Indian_Head">Indian Head Cent</option>
          <option value="Lincoln_Wheat">Lincoln Wheat Cent</option>
          <option value="Lincoln_Memorial">Lincoln Memorial Cent</option>
          <option value="Lincoln_Bicentennial">Lincoln Bicentennial</option>
          <option value="Union_Shield">Union Shield</option>
          </optgroup>
        <optgroup label="Two Cents">
          <option value="Two_Cent">Two Cent Piece</option>
          </optgroup>
        <optgroup label="Three Cents">
          <option value="Nickel_Three_Cent">Nickel Three Cent Piece</option>
          <option value="Silver_Three_Cent">Silver Three Cent Piece</option>
          </optgroup>
        <optgroup label="Half Dimes">
          <option value="Flowing_Hair_Half_Dime">Flowing Hair</option>
          <option value="Draped_Bust_Half_Dime">Draped Bust</option>
          <option value="Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
          <option value="Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
          </optgroup>
        </optgroup>
        <optgroup label="Nickels">
          <option value="Shield_Nickel">Sheild</option>
          <option value="Liberty_Head_Nickel">Liberty Head</option>
          <option value="Indian_Head_Nickel">Indian Head</option>
          <option value="Jefferson_Nickel">Jefferson</option>
          <option value="Westward_Journey">Westward Journey</option>
          <option value="Return_to_Monticello">Return to Monticello</option>
          </optgroup>
        <optgroup label="Dimes">
          <option value="Drapped_Bust_Dime">Drapped Bust Dime</option>
          <option value="Liberty_Cap_Dime">Liberty Cap Dime</option>
          <option value="Seated_Liberty_Dime">Liberty Seated Dime</option>
          <option value="Barber_Dime">Barber Dime</option>
          <option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
          <option value="Roosevelt_Dime">Roosevelt Dime</option>
          </optgroup>
        <optgroup label="Twenty Cents">
          <option value="addBulkType.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
          </optgroup>
        <optgroup label="Quarters">
          <option value="addBulkType.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
          <option value="Capped_Bust_Quarter">Capped Bust Quarter</option>
          <option value="Liberty_Seated_Quarter">Liberty Seated Quarter</option>
          <option value="Barber_Quarter">Barber Quarter</option>
          <option value="Standing_Liberty">Standing Liberty</option>
          <option value="Washington_Quarter">Washington Quarter</option>
          <option value="State Quarter">State Quarter</option>
          <option value="District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
          <option value="America the Beautiful Quarter">America the Beautiful Quarter</option>
          </optgroup>
        <optgroup label="Half Dollars">
          <option value="Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
          <option value="addBulkType.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
          <option value="Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
          <option value="addBulkType.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
          <option value="Barber_Half_Dollar">Barber Half</option>
          <option value="Walking_Liberty">Walking Liberty Half</option>
          <option value="Franklin_Half_Dollar">Franklin Half</option>
          <option value="Kennedy_Half_Dollar">Kennedy Half</option>
          </optgroup>
        <optgroup label="Dollars">
          <option value="Flowing_Hair_Dollar">Flowing Hair Dollar</option>
          <option value="Draped_Bust_Dollar">Draped Bust Dollar</option>
          <option value="Gobrecht_Dollar">Gobrecht Dollar</option>
          <option value="Seated_Liberty_Dollar">Seated Liberty Dollar</option>
          <option value="Trade_Dollar">Trade Dollar</option>
          <option value="Morgan_Dollar">Morgan Dollar</option>
          <option value="Peace_Dollar">Peace Dollar</option>
          <option value="Eisenhower_Dollar">Eisenhower Dollar</option>
          <option value="Susan_B_Anthony_Dollar">Susan B. Anthony</option>
          <option value="Sacagawea_Dollar">Sacagawea/Native American</option>
          <option value="Presidential_Dollar">Presidential Dollar</option>
          </optgroup>
      </select>
   <input type="submit" value=" Load " /> 
    
    </form>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>




<table width="100%" border="0" id="bulkLinksTbl">
  <tr align="center" valign="top">
    <th width="50%" scope="col"><a href="addRollSameCoinCollection.php"><img src="../img/Union_Shield_Same.jpg" alt=""  class="bulkLinks" align="texttop" /></a></th>
    <th width="50" scope="col"><a href="addRollsMixed.php"><img src="../img/Union_Shield_Same.jpg" alt=""  class="bulkLinks" align="texttop" /></a></th>
    </tr>
  <tr align="center" valign="top">
    <th scope="col"><a href="addRollSameCoinCollection.php">Coin By Coin</a><br /> 
      (New Coins)</th>
    <th scope="col"><a href="addRollsMixed.php">Coin By Coin</a><br />
      (From Collection)</th>
    </tr>
  <tr align="center" valign="top">
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    </tr>
</table>


 <div class="roundedWhite">
 
<table width="550" border="0" cellpadding="3" id="rollList">
  <tr class="darker">
    <td colspan="3" align="center"><h3>U.S. Coin Roll Guide</h3></td>
    </tr>
  <tr class="darker">
    <td>Type</td>
    <td>Amount</td>
    <td>Color</td>
  </tr>
  <tr>
    <td>Cent:</td>
    <td>50 coins, $0.50</td>
    <td>Red</td>
  </tr>
  <tr>
    <td>Nickel:</td>
    <td>40 coins, $2.00</td>
    <td>Blue</td>
  </tr>
  <tr>
    <td>Dime:</td>
    <td>50 coins, $5.00</td>
    <td>Green</td>
  </tr>
  <tr>
    <td>Quarter:</td>
    <td>40 coins, $10.00</td>
    <td>Orange</td>
  </tr>
  <tr>
    <td>Half Dollar:</td>
    <td>20 coins, $10.00</td>
    <td>Tan, brown or yellow</td>
  </tr>
  <tr>
    <td>Large Dollar:</td>
    <td>20 coins, $20.00</td>
    <td>White</td>
  </tr>
  <tr>
    <td>Small Dollar:</td>
    <td>25 coins, $25.00</td>
    <td>Yellow</td>
  </tr>
</table></div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
