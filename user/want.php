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
<title>My Want List</title>

<style type="text/css">
#coinHdr {margin:0px;}
#wantIcon {width:100px; height:auto;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/wantIcon.jpg" alt="want list" name="wantIcon" align="absmiddle" id="wantIcon" />My Want List</h1>


<table width="500" border="0">
  <tr>
    <td><a href="addWant.php">Add to Want List</a>&nbsp;</td>
    <td><select name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">View By Type</option>
      <optgroup label="Half Cents">
        <option value="viewWantCategory.php?coinCategory=Half_Cent">Half Cents</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewWantType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewWantType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="reportCent.php">All Cents</option>
        <option value="viewWantCategory.php?coinCategory=Large_Cent">Flowing Hair</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewWantType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewWantType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewWantType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewWantCategory.php?coinCategory=Small_Cent">All Cents</option>
        <option value="viewWantType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewWantType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewWantType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="Three_Cent">Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewWantCategory.php?coinCategory=Half_Dime">All Half Dimes</option>
        <option value="viewWantType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewWantType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="viewWantCategory.php?coinCategory=Nickel">Nickels</option>
        <option value="viewWantType.php?coinType=Shield_Nickel">Shield Nickel</option>
        <option value="viewWantType.php?coinType=Indian_Head">Indian Head</option>
        <option value="viewWantType.php?coinType=Lincoln_Wheat">Draped Bust Large Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Memorial">Classic Head Large Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial Series</option>
        <option value="viewWantType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewWantType.php?coinType=reportHalf.php">All Half Dollars</option>
        <option value="viewWantType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewWantType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewWantType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewWantType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewWantType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="Twenty Cents">Twenty Cent Piece</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="reportHalf.php">All Half Dollars</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewWantType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewWantType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewWantType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewWantType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewWantType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewWantType.php?coinType=State Quarter">State Quarter</option>
        <option value="viewWantType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewWantType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="reportHalf.php">All Half Dollars</option>
        <option value="viewWantType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewWantType.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewWantType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewWantType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewWantType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewWantType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="reportHalf.php">All Half Dollars</option>
        <option value="viewWantType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewWantType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewWantType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewWantType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewWantType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewWantType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewWantType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewWantType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewWantType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewWantType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
</table>


<p></p>
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Grade</td>
    <td width="14%" align="right">Purchase Price</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM wantlist WHERE userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());

$check = mysql_num_rows($countAll);
  if($check == 0){ 
 echo '
    <tr>
    <td>You have 0 coins in your want list, <a href="addWant.php" class="brownLink">Add to Want List</a></td>
	<td>&nbsp;</td>	
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
  } else {

  while($row = mysql_fetch_array($countAll))
	  {
$wantlistID = intval($row['wantlistID']);  
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  echo '
    <tr>
    <td><a href="viewWantDetail.php?wantlistID='.$wantlistID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewWantType.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
  }
?>
</tbody>
     
<tfoot>
  <tr class="darker">
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="10%" align="center">Grade</td>
    <td width="14%" align="right">Purchase Price</td>
  </tr>
	</tfoot>
</table>

<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
