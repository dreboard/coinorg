<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinYear'])) { 
$coinYear = strip_tags($_GET['coinYear']);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo intval($coinYear); ?> Bags</title>
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
  <h1><img id="newBag" src="../img/newBag.jpg" align="absmiddle" /> <?php echo intval($coinYear); ?> Bags</h1>
  <hr />

 <table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="14%" align="left"><strong>Collected</strong></td>
      <td width="18%" align="right"><?php echo $collectionBags->getBagTypeCountByYear($coinYear, $userID) ?></td>
      <td width="68%">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><strong>Investment</strong></td>
      <td align="right">$<?php echo $collectionBags->getCoinSumByYear($coinYear, $userID)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><strong>Face Value</strong></td>
      <td align="right">$<?php echo number_format($collectionBags->getCoinFaceValByYear($coinYear, $userID) ,2); ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><strong>Total Coins</strong></td>
      <td align="right"><?php echo $collectionBags->getCoinCountSumByYear($coinYear, $userID) ?></td>
      <td>&nbsp;</td>
    </tr>
    
  </tbody>
</table> 
  
<hr />
  
  <table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Bag</td>
    <td width="14%" align="center">Date Collected</td>
    <td width="18%" align="center">Purchase Price</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collectbags WHERE coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());

  while($row = mysql_fetch_array($countAll))
	  {
  $collectbagID = intval($row['collectbagID']); 
  $collectionBags->getCollectionBagById($collectbagID);
  echo '
    <tr align="center">
    <td align="left"><a href="viewBagDetail.php?ID='.$Encryption->encode($collectbagID).'">'.$collectionBags->getBagNickname().'</a></td>
		<td>'.date("F j, Y",strtotime($collectionBags->getCoinDate())) .'</td>
	<td>$'. floatval($collectionBags->getCoinPrice()) .'</td>	   
  </tr>
  ';
	  }
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="57%">Bag</td>
    <td width="14%" align="center">Date Collected</td>
    <td width="18%" align="center">Purchase Price</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>