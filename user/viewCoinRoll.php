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

$collectedRolls = $collectionRolls->getRollCountByCoinID($coinID, $userID);


$faceValue = number_format($collectionRolls->getCollectionCoinIDFaceVal($coinID, $userID),2);


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
<h1><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?> Rolls</h1>
<h3>  <a class="brownLink" href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>"><?php echo substr($coin->getCoinName(), 0, 4); ?></a>  | <a class="brownLink" href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>">All Mint Marks</a> | <a class="brownLink" href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> | <a class="brownLink" href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1"><?php echo $coinType ?></a></h3>
<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Total Collected</strong></td>
    <td width="10%" align="right"><?php echo $collectedRolls; ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%"><strong>Face Value</strong></td>
    <td width="25%">$<?php echo $faceValue ?></td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collectionRolls->getRollSumByCoinID($coinID, $userID); ?></td>
    <td>&nbsp;</td>
    <td><strong>Roll Progress</strong></td>
    <td><?php echo $CoinTypes->getCoinRollProgress($coinType, $userID, $coinID); ?></td>
  </tr>
</table>
<hr />

<?php include ("../inc/pageElements/coinLinks.php");?>

<hr />


<p><a href="addRollCoinCategory.php?coinType=<?php echo $coinLink ?>" class="brownLinkBold">Add <?php echo $coinName ?> Roll</a></p>



<table width="100%" border="0" id="rollListTbl">
<thead class="darker">
  <tr>
    <td width="82%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Collected</td>
    <td width="8%">Edit</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND coinID = '$coinID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr class="gryHover">
		  <td><a href="addRollByCoinID.php?coinID='.intval($_GET['coinID']).'"><strong>No '.$coinName.' Rolls Collected</strong></a></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
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

  $viewLink =  '<a href="viewSameRollDetail.php?ID='.$Encryption->encode($collectrollsID).'">'.$rollNickname.'</a>';
  $editLink =  '<a href="viewSameRollEdit.php?ID='.$Encryption->encode($collectrollsID).'">Edit</a>';

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

<tfoot class="darker">
  <tr>
    <td width="82%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Collected</td>
    <td width="8%">Edit</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>