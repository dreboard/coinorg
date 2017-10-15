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
<br />
<table width="100%" border="0" id="clientTbl" class="coinTbl">
  <thead>
  <tr class="darker">
    <td width="57%" height="24"><strong>Year / Mint</strong></td>  
    <td width="19%"><strong>From</strong></td>
    <td width="10%" align="center"><strong> Entered</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE userID = '$userID' ORDER BY purchaseDate DESC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $collectionID = intval($row['collectionID']);
  $purchaseFrom = strip_tags($row['purchaseFrom']);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.' '.$coinType.'</a></td>
	<td><a href="purchaseFrom.php?collectionID='.$collectionID.'">'.$purchaseFrom.'</a></td>	
	<td align="center">'.$purchaseDate.'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
?>
</tbody>
     
<tfoot>
  <tr class="darker">
    <td width="57%"><strong>Year / Mint</strong></td>  
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