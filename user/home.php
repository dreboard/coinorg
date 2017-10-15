<?php 
include '../inc/config.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="../scripts/main.js"></script>
<script type="text/javascript" src="../scripts/DataTables-1.8.2/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/DataTables-1.8.2/media/css/demo_table.css"/>
<title>My Collection</title>
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
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>My Collection (<?php echo $collection->getCollectionCountById($accountID); ?>) Coins</h1>
<p>&nbsp;</p>

<table width="100%" border="1" id="masterCountTbl" cellpadding="3">
  <tr class="keyRow">
    <td><strong>Denomination</strong></td>
    <td><strong>Coins</strong></td>
    <td><strong>Rolls</strong></td>
    <td><strong>Folders</strong></td>
    <td><strong>Bags</strong></td>
    <td><strong>Boxes</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Half Cent</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Large Cent</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" class="SemiKeyRow"><strong><a href="Small_Cent.php">Small Cent</a></strong></td>
    <td width="10%"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="10%"><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td width="41%">&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Two Cent</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Three Cent</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Half Dime</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Nickels</strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Nickel', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Dimes</strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Dime', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Twenty Cent</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Quarters</strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Quarter', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Half Dollars</strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Half Dollar', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Dollars</strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Dollar', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Gold</strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Gold', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow"><strong>Commemoratives</strong></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Commemorative', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td><?php echo $collection->getMasterCoinCountByCoinCategory('Small Cent', $accountID) ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="SemiKeyRow">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<hr />
<h1>All Coins</h1>
<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
  <?php
/*
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND accountID = '$accountID' ORDER BY coinID ASC") or die(mysql_error());

  while($row = mysql_fetch_array($countAll))
	  {
		  
		  
  $collectionID = strip_tags($row['collectionID']);
  $collection->getCollectionById($collectionID);  
  
  $coinType = strip_tags($row['coinType']);
  $additional = strip_tags($row['additional']);
  $coinID = intval($row['coinID']);
  
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $collectedCoinName = $coin->getCoinName();
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?rWeuTTresw='.base64_encode($thePageCode).'&TTrqpUU='.base64_encode($collectionID).'">'.$collectedCoinName.'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	    
	<td>'.date("F j, Y",strtotime($collection->getCoinDate())) .'</td>

  </tr>
  ';
	  }
  */
  ?>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE accountID = '$accountID' ORDER BY coinID ASC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $accountID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $accountID).'</td>	    
  </tr>
  ';
	  }
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>