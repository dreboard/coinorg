<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$containerID = $Encryption->decode($_GET['ID']);
$Container->getContainerById($containerID);
$coinCategory = $Container->getCoinCategory();

$ContainerType->getContainerTypeById($Container->getContainerTypeID());
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $Container->getContainerName(); ?></title>
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
<h1><img src="../img/<?php echo str_replace(' ', '_', $ContainerType->getContainerTypeName()) ?>.jpg" width="200" height="100" align="absmiddle" /> <?php echo $Container->getContainerName(); ?></h1>
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center"><h3><a href="coinContainerSlabEdit.php?ID=<?php echo $Encryption->encode($containerID) ?>">Manage Coins &amp; Container</a></h3></td>    
    <td width="25%" align="center"><h3><a href="coinContainer.php" class="brownLinkBold">All Containers</a></h3></td>
    <td width="25%" align="center"><h3><a href="coinContainerType.php?containerType=<?php echo str_replace(' ', '_', strip_tags($Container->getContainerType())); ?>" class="brownLink"><?php echo $Container->getContainerType(); ?></a></h3></td>

    <td width="25%" align="center"><h3><a href="coinContainerNew.php">Add New Container</a></h3></td>        
  </tr>
</table>
<hr />
<h3><a href="coinContainerSlabAlbum.php?ID=<?php echo $Encryption->encode($containerID) ?>" class="brownLink">Album View</a> | Report View</h3>

<table width="100%" border="0">
  <tr>
    <td width="13%" class="darker">Coins</td>
    <td width="17%" align="right"><?php echo $Container->getSlabBoxCount($containerID, $userID); ?></td>
    <td width="70%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $Container->getCollectionContainerSum($containerID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" border="0" id="clientTbl" cellpadding="3">
<thead class="darker">
  <tr>
    <td width="58%">Coin</td>
    <td width="14%">Grade</td>
    <td width="13%">Grader</td>
    <td width="15%" align="right">Investment</td>
    </tr>
</thead>
  <tbody>
<?php 
	$sql2  = mysql_query("SELECT * FROM collection WHERE containerID = '".$containerID."' AND userID = '$userID' LIMIT ".$Container->getFull()." ") or die(mysql_error()); 
	$rollCount = mysql_num_rows($sql2); 
if(mysql_num_rows($sql2)== 0){
	  echo '
    <tr>
    <td><a href="addCoin.php" class="brownLinkBold">No Coins Saved In Box</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td><td>&nbsp;</td>	    
  </tr>
  ';
} else {
	while($row = mysql_fetch_array($sql2)){
        $coin->getCoinById(intval($row['coinID']));
		$collection->getCollectionById(intval($row['collectionID']));
	echo '<tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">' .$coin->getCoinName() . ' ' .$coin->getCoinType() . '</a></td>
    <td>' .$collection->getCoinGrade() . '</td>
	<td>' .$collection->getGrader() . '</td>
	<td align="right">$' .$collection->getCoinPrice() . '</td>
  </tr>';
}
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="58%">Coin</td>
    <td width="14%">Grade</td>
    <td width="13%">Grader</td>
    <td width="15%" align="right">Investment</td>
    </tr>
</tfoot>
</table>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>