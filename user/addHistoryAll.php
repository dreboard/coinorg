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
<title>My Collection History</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>My Collection History</h1>
<table width="100%" border="0" cellpadding="2" class="clear" id="listTbl">
  <tr valign="top" class="darker">
    <td width="30" align="center" valign="middle"><h3><img src="../img/coinIcon.jpg" alt="" width="21" height="20" align="texttop" /><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"></a></h3></td>
    <td width="138" valign="middle"><a href="addHistoryCoins.php"> Coins</a><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"></a></td>
    
    <td width="34" align="center" valign="middle"><h3><img src="../img/rollReportIcon.jpg" alt="" width="14" height="20" align="texttop" /></h3></td>
    <td width="120" valign="middle"><a href="addHistoryRolls.php"> Rolls</a></td>
    
    <td width="30" align="center" valign="middle"><h3><img src="../img/bagIcon2.jpg" alt="" width="21" height="20" align="texttop" /></h3></td>
    <td width="137" valign="middle"><a href="addHistoryBag.php"> Bags</a></td>
    <td width="33" align="center" valign="middle"><h3><img src="../img/boxIcon2.jpg" alt="" width="21" height="20" align="texttop" /></h3></td>
    <td width="174" valign="middle"><a href="addHistoryBox.php"> Boxes</a></td>
    <td width="248" align="center" valign="middle"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">By Coin</option>
      <optgroup label="Half Cents">
        <option value="viewCoinHistory.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewCoinHistory.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewCoinHistory.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewCoinHistory.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="viewCoinHistory.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewCoinHistory.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewCoinHistory.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewCoinHistory.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewCoinHistory.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewCoinHistory.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewCoinHistory.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewCoinHistory.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewCoinHistory.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewCoinHistory.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewCoinHistory.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewCoinHistory.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="viewCoinHistory.php?coinType=Two_Cent_Piece">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="viewCoinHistory.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewCoinHistory.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewCoinHistory.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewCoinHistory.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewCoinHistory.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewCoinHistory.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="viewCoinHistory.php?coinType=Shield_Nickel">Shield</option>
        <option value="viewCoinHistory.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewCoinHistory.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewCoinHistory.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewCoinHistory.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewCoinHistory.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewCoinHistory.php?coinType=Draped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewCoinHistory.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewCoinHistory.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewCoinHistory.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewCoinHistory.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewCoinHistory.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="viewCoinHistory.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="viewCoinHistory.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewCoinHistory.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewCoinHistory.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewCoinHistory.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewCoinHistory.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewCoinHistory.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewCoinHistory.php?coinType=State Quarter">State Quarter</option>
        <option value="viewCoinHistory.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewCoinHistory.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="viewCoinHistory.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewCoinHistory.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewCoinHistory.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewCoinHistory.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewCoinHistory.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewCoinHistory.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewCoinHistory.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewCoinHistory.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="viewCoinHistory.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewCoinHistory.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewCoinHistory.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewCoinHistory.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewCoinHistory.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewCoinHistory.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewCoinHistory.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewCoinHistory.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewCoinHistory.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewCoinHistory.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewCoinHistory.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="115"><strong>eBay</strong></td>
    <td width="104"><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='eBay'); ?></td>
    <td width="483">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>U.S. Mint</strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Mint'); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td><strong>Coin Shops</strong></td>
      <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Shop'); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td width="115"><strong>Coin Shows</strong></td>
    <td><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='Coin Show'); ?></td>
    <td width="483">&nbsp;</td>
    <td width="133">&nbsp;</td>
    <td width="133">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><strong>Undefined</strong></td>
    <td valign="top"><?php echo $Invest->getPurchaseFrom($userID, $purchaseFrom='None'); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" border="0" id="clientTbl" class="coinTbl">
  <thead>
  <tr class="darker">
    <td width="57%" height="24"><strong>Item</strong></td>  
    <td width="19%"><strong>From</strong></td>
    <td width="10%" align="center"><strong> Entered</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php 
	$sql = mysql_query("SELECT * FROM purchases WHERE userID = '$userID'") or die(mysql_error()); 
 while($row = mysql_fetch_array($sql))
	  {
	$purchaseType = $row['purchaseType'];
	$purchaseID = $row['purchaseID'];
	$userID = $row['userID'];

if ($row['purchaseType'] = 'coins') {
	$collection->getCollectionById($row['collectionID']);
	$coin-> getCoinById($collection->getCoinID());  
     echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$collection->getCoinID().'">'.$coin->getCoinName().' '.$coin->getCoinType().'</a></td>
	<td><a href="purchaseFrom.php?collectionID='.$row['collectionID'].'">'.$purchaseFrom.'</a></td>	
	<td align="center">'.date("M j, Y",strtotime($collection->getCoinDate())).'</td>
	<td align="center">$'.$collection->getCoinPrice().'</td>	    
  </tr> ';
} else if($row['purchaseType'] = 'sets'){
	$collection->getCollectionById($row['collectionID']);
	$coin-> getCoinById($collection->getCoinID());  
	
     echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$collection->getCoinID().'">'.$coin->getCoinName().' '.$coin->getCoinType().'</a></td>
	<td><a href="purchaseFrom.php?collectionID='.$collectionID.'">'.$purchaseFrom.'</a></td>	
	<td align="center">'.date("F j, Y",strtotime($collection->getCoinDate())).'</td>
	<td align="center">$'.$collection->getCoinPrice().'</td>	    
  </tr> ';
}
}

?>
</tbody>
     
<tfoot>
  <tr class="darker">
    <td width="57%"><strong>Item</strong></td>  
    <td>From</td>    
    <td width="10%" align="center"><strong> Entered</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>




<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>