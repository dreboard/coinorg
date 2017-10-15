<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if(isset($_GET["commemorativeVersion"])){
	$commemorativeVersion = strip_tags(str_replace('_', ' ', $_GET["commemorativeVersion"])); 
	$commemorativeVersionLink = str_replace(' ', '_', $commemorativeVersion); 
	$coinGrade = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinGrade"]);
	$reportLink = str_replace(' ', '', $commemorativeVersion);
	//$proService = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["proService"]);
}else {
	$commemorativeVersion = "";
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
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My  <a href="<?php echo $commemorativeVersionLink ?>.php"><?php echo $commemorativeVersion ?></a>'s Graded <?php echo $coinGrade ?></h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="25%" class="darker"><a href="CommemorativeCoins.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Coins</a></td>
    <td width="25%" class="darker"><a href="CommemorativeAlbum.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Album View</a></td>
    <td width="25%" class="darker"> <a href="CommemorativeGrades.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Grade Report</a></td>
    <td width="25%" class="darker"><a href="CommemorativeError.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Errors</a></td>  
  </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong>Grader</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '$commemorativeVersion' AND proService = 'None' AND coinGrade = '$coinGrade' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>There are no '.$coinGrade.'\'s in your collection</td>
		  <td>&nbsp;</td>  
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
   $collectionID = intval($row['collectionID']);
  $collection-> getCollectionById($collectionID);   
  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getGrader().'</td>
	<td class="purchaseTotals" align="right">$'.$collection->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center">Grader</td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>