<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['bagType'])) { 
$bagType = str_replace('_', ' ', $_GET['bagType']);
$bagTypeLink = strip_tags($_GET['bagType']);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo str_replace('_', ' ', $bagType); ?> Bags</title>
 <script type="text/javascript">
$(document).ready(function(){	

$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1><img id="newBag" src="../img/newBag.jpg" align="absmiddle" /> <?php echo str_replace('_', ' ', $bagType); ?> Bags</h1>
  <hr />

 <table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td align="left"><a href="myBags.php"><strong>All Bags</strong></a></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="14%" align="left"><strong>Collected</strong></td>
      <td width="18%" align="right"><?php echo $collectionBags->getBagTypeCount($bagType, $userID) ?></td>
      <td width="68%">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><strong>Investment</strong></td>
      <td align="right">$<?php echo $collectionBags->getCoinSumByBagType($bagType, $userID)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><strong>Face Value</strong></td>
      <td align="right">$<?php echo number_format($collectionBags->getCoinFaceValByBagType($bagType, $userID) ,2); ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><strong>Total Coins</strong></td>
      <td align="right"><?php echo $collectionBags->getCoinCountSumByBagType($bagType, $userID) ?></td>
      <td>&nbsp;</td>
    </tr>
    
  </tbody>
</table> 
  
<hr />
<p>
<?php 
if($bagType == 'Mint Series'){
echo '<a class="brownLink" href="bags.php">View All Mint Series Bags</a>';
  } else {
	echo '';
}
?>  
  </p>
  
  
  <table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="50%">Bag</td>
    <td width="32%">Type</td>
    <td width="9%" align="center"> Collected</td>
    <td width="9%" align="center"> Price</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collectbags WHERE bagType = '$bagType' AND userID = '$userID'") or die(mysql_error());

  while($row = mysql_fetch_array($countAll))
	  {
  $collectbagID = intval($row['collectbagID']); 
  $collectionBags->getCollectionBagById($collectbagID);
  echo '
    <tr align="center">
    <td align="left"><a href="viewBagDetail.php?ID='.$Encryption->encode($collectbagID).'">'.$collectionBags->getBagNickname().'</a></td>
	<td align="left"><a href="categoryBags.php?coinCategory='.str_replace(' ', '_', $collectionBags->getCoinCategory()).'">'.$collectionBags->getCoinCategory().'</a></td>
	<td>'.date("M j, Y",strtotime($collectionBags->getCoinDate())) .'</td>
	<td>$'. floatval($collectionBags->getCoinPrice()) .'</td>	   
  </tr>
  ';
	  }
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="50%">Bag</td>
    <td width="32%">Type</td>
    <td width="9%" align="center"> Collected</td>
    <td width="9%" align="center"> Price</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>