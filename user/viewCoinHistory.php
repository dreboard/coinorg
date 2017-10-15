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
	"aaSorting": [[ 2, "desc" ]],
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
<h1><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?> History</h1>
<h3>  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>"><?php echo substr($coin->getCoinName(), 0, 4); ?></a>  | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> | <a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1"><?php echo $coinType ?></a></h3>
<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Total Collected</strong></td>
    <td width="9%" align="right"><?php echo $count ?></td>
    <td width="75%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collection->getCoinSumById($coinID, $userID) ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<?php include ("../inc/pageElements/coinLinks.php");?>
<hr />

<h4>Collection History</h4>

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="62%">Purchased From</td>
    <td width="12%" align="center">Grade</td>  
    <td width="13%" align="center">Date </td>
    <td width="13%" align="center"> Price</td>
  </tr>
</thead>
  <tbody>
  <?php
/*
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());

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
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' ORDER BY collectionID DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinID.php?coinID='.$coinID.'"><strong>No '.$coinName.' Collected</strong></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {

  $collectionIDNum = strip_tags($row['collectionID']);
  $collection->getCollectionById($collectionIDNum);  
  
  $coinID = intval($row['coinID']);
  $coinGrade = $collection->getCoinGrade();
  $coinID = $collection-> getCoinID($coinID);  
  
  $coinName = $coin->getCoinName(); 
  $collectedCoinName = $coin->getCoinName();
  
  $collectfolderID = $collection->getCollectionFolder();
  $collectionFolder->getCollectionFolderById($collectfolderID);
  $collectrollsID = $collection->getCollectionRoll();
  
  $collectsetID = $collection->getCollectionSet();
  
  $proService = $collection->getGrader();
if($collectfolderID == '0' && $collectrollsID == '0' && $proService == 'None' && $collectsetID == '0') {
    $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;';
}
else if($proService != 'None') {
    $coinIcon = '<a href="viewCoinService.php?proService='.$collection->getGrader().'&ID='.$Encryption->encode($coinID).'"><img align="absbottom" src="../img/graded.jpg" width="20" height="20" alt="'.$collection->getGrader().'" /></a> ';
}
else if($collectfolderID != '0') {
    $coinIcon = '<a href="viewFolderCoinsList.php?collectfolderID='.$collectfolderID.'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
}
else if($collectrollsID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" />';
}
else if($collectsetID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" />';
}
else { //Or else if($value == 'BB') if you might add more at some point
   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
}
  
//$collection->getCollectionFolder()
//$collection->getCollectionRoll()
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.$collection->getPurchaseFrom().'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("F j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot>
  <tr class="darker">
    <td>Purchased From</td>
    <td align="center">Grade</td>  
    <td width="13%" align="center">Date </td>
    <td width="13%" align="center"> Price</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>