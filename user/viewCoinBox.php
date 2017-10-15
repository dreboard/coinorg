<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = $CoinTypes->getDenomination() * $count;


}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?> Boxes</h1>
<h3>  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>"><?php echo substr($coin->getCoinName(), 0, 4); ?></a>  | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> | <a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1"><?php echo $coinType ?></a></h3>
<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Total Collected</strong></td>
    <td width="10%" align="right"><?php echo $count ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%"><strong>Face Value</strong></td>
    <td width="25%">$<?php echo $denomination ?></td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collection->getCoinSumById($coinID, $userID) ?></td>
    <td>&nbsp;</td>
    <td><strong>Roll Progress</strong></td>
    <td><?php echo $CoinTypes->getCoinRollProgress($coinType, $userID, $coinID); ?></td>
  </tr>
</table>
<hr />

<?php include ("../inc/pageElements/coinLinks.php");?>

<hr />


<p><a href="addRollCoinCategory.php?coinType=<?php echo $coinLink ?>" class="brownLinkBold">Add <?php echo $coinName ?> Bags</a></p>

<table width="100%" border="0" id="rollListTbl">
<thead>
  <tr class="darker">
    <td width="82%" height="24"><strong>Year / Mint</strong></td>  
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="8%"><strong>Edit</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND coinID = '$coinID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinID.php?coinID='.$coinID.'"><strong>No '.$coinName.' Rolls Collected</strong></a></td>
		  <td width="14%" align="center">&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $rollNickname = strip_tags($row['rollNickname']);  
  $coinGrade = strip_tags($row['coinGrade']);  
  $coinID = intval($row['coinID']);
  $coinCategory = strip_tags($row['coinCategory']);
  $coinGrade = strip_tags($row['coinGrade']);
  $rollType = strip_tags($row['rollType']);
  $collectrollsID = intval($row['collectrollsID']);
  $rollTypeLink = str_replace(' ', '_', $rollType);
  $thePageCode = "Go to the view coin page to view this coin";

  $viewLink =  '<a href="viewRollSame.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a>';
  $editLink =  '<a href="editRollSameCoinSmallCentCoins.php?collectrollsID='.$collectrollsID.'">Edit</a>';

  echo '
    <tr>
    <td>'.$viewLink.'</td>
	<td align="center">'.$coinGrade.'</td>
	<td>'.$editLink.'</td>   
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot>
  <tr class="darker">
    <td width="82%" height="24"><strong>Year / Mint</strong></td>  
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td><strong>Edit</strong></td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>