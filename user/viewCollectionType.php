<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinCategory"])) { 
$rawcoinCategory = strip_tags($_GET["coinCategory"]);
$coinCategory = str_replace('_', ' ', mysql_real_escape_string($_GET["coinCategory"]));


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
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
<h1>My <?php echo $coinCategory ?> Collection  (<?php echo $collection->getCollectionCountById($userID); ?>) Coins</h1>
<p>&nbsp;</p>

<table width="100%" border="0" id="collectTbl">
  <thead>
  <tr class="darker">
    <td width="39%"><strong>Year / Mint</strong></td>  
    <td width="29%"><strong>Type</strong></td>
    <td width="11%"><strong>Grade</strong></td>
    <td width="21%"><strong>Date</strong></td>
  </tr>
</thead>
  <tbody>
  <?php

$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '$coinCategory' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());

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
    <td><a href="viewCoinDetail.php? rWeuTTresw='.base64_encode($thePageCode).'&TTrqpUU='.base64_encode($collectionID).'">'.$collectedCoinName.'</a></td>
	
	<td>'. $collection->getCoinType() .'</td>
	<td>'. $collection->getCoinGrade() .'</td>	    
	<td>'.date("F j, Y",strtotime($collection->getCoinDate())) .'</td>

  </tr>
  ';
	  }
  
  ?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="39%"><strong>Year / Mint</strong></td>  
    <td width="29%">Type</td>
    <td width="11%"><strong>Grade</strong></td>
    <td width="21%"><strong>Date</strong></td>
  </tr>
	</tfoot>
</table>

<hr />
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>