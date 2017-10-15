<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coin Bag Report</title>
</head>
<body>
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/myBags.jpg" width="100" height="100" align="middle">   Coin Bags</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>   
  </tr>
</table> 
<br>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="20%"><strong>Bags Collected</strong></td>
    <td width="18%" align="right"><?php echo $collectionBags->getAllBagCountByID($userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collectionBags->getUserSum($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td align="right">$<?php echo number_format($collectionBags->getBagsFaceVal($userID) ,2); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Coins</strong></td>
    <td align="right"><?php echo $collectionBags->getCoinCountByID($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<hr>
<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr class="keyRow">
      <td><strong>Bag Type</strong></td>
      <td align="right"><strong>Collected</strong></td>
      <td align="right"><strong>Investment</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><a href="viewBagType.php?bagType=Mint">Mint Bag</a></td>
      <td width="10%" align="right"><?php echo $collectionBags->getBagTypeCount($bagType='Mint', $userID) ?></td>
      <td width="15%" align="right"><?php echo $collectionBags->getCoinSumByBagType($bagType='Mint', $userID)?></td>
      <td width="57%">&nbsp;</td>
    </tr>
    <tr>
      <td><a href="viewBagType.php?bagType=Mint_Series">Mint Series</a></td>
      <td align="right"><?php echo $collectionBags->getBagTypeCount($bagType='Mint_Series', $userID) ?></td>
      <td align="right"><?php echo $collectionBags->getCoinSumByBagType($bagType='Mint_Series', $userID)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="viewBagType.php?bagType=Same_Type">By Coin Type</a></td>
      <td align="right"><?php echo $collectionBags->getBagTypeCount($bagType='Same Type', $userID) ?></td>
      <td align="right"><?php echo $collectionBags->getCoinSumByBagType($bagType='Same Type', $userID)?></td>
      <td>&nbsp;</td>
    </tr>
    
  </tbody>
</table>
<hr>
<table width="100%" border="1" cellpadding="3" id="masterRollTbl">
  <tr class="keyRow">
    <td width="20%"><strong>Denomination</strong></td>
    <td width="20%" align="center">Mint Bags</td>
    <td width="20%" align="center">Mint Series Bags</td>
    <td width="20%" align="center">By Type</td>
    <td width="20%" align="center"><strong>Total</strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Half_Cent">Half Cent</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Half Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Half Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Half Cent') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Half Cent' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Large_Cent">Large Cent</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Large Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Large Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Large Cent') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Large Cent' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Small_Cent">Small Cent</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Small Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Small Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Small Cent') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Small Cent' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Two_Cent">Two Cent</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Two Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Two Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Two Cent') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Two Cent' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Three_Cent">Three Cent</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Three Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Three Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Three Cent') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Three Cent' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Half_Dime">Half Dime</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Half Dime') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Half Dime') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Half Dime') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Half Dime' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Nickel">Nickels</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Nickel') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Nickel') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Nickel') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Nickel' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Dime">Dimes</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Dime') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Dime') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Dime') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Dime' ); ?></strong></td>
    </tr>

  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Twenty_Cent">Twenty Cent</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Twenty Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Twenty Cent') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Twenty Cent') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Twenty Cent' ); ?></strong></td>
    </tr> 
   <tr>
   <td><strong><a href="categoryBags.php?coinCategory=Quarter">Quarters</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Quarter') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Quarter') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Quarter') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Quarter' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Half_Dollar">Half Dollars</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Half Dollar') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Half Dollar') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Half Dollar') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Half Dollar' ); ?></strong></td>
    </tr>
  <tr>
    <td><strong><a href="categoryBags.php?coinCategory=Dollar">Dollars</a></strong></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint', $userID, $coinCategory='Dollar') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Mint_Series', $userID, $coinCategory='Dollar') ?></td>
    <td align="center"><?php echo $collectionBags->getBagTypeCountByCoinCategory($bagType='Same Type', $userID, $coinCategory='Dollar') ?></td>
    <td align="center" class="rounded"><strong><?php echo $collectionBags->getBagCountByCategory($userID, 'Dollar' ); ?></strong></td>
    </tr>
</table>
<hr class="clear">
  <div>
<h2>Bags List</h2>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Type</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase Price</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>No Bags Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
	  $collectbagID = intval($row['collectbagID']);
	  $collectionBags->getCollectionBagById($collectbagID);
  echo '
    <tr align="center">
    <td align="left"><a href="bagDetail.php?ID='.$Encryption->encode(intval($row['collectbagID'])).'">'.$collectionBags->getBagNickname().'</a></td>
	<td><a href="viewBagType.php?bagType='.str_replace(' ', '_', $collectionBags->getBagType()).'">'. $collectionBags->getBagType() .'</a></td>
		<td>'.date("M j, Y",strtotime($collectionBags->getCoinDate())) .'</td>
	<td>$'. $collectionBags->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Type</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase Price</td>
  </tr>
	</tfoot>
</table>
   
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>