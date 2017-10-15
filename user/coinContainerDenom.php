<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";





if (isset($_GET['ID'])) { 
$containerID = $Encryption->decode($_GET['ID']);
$Container->getContainerById($containerID);
$denomination = strip_tags($_GET['denomination']);



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
$('#addCoinListTbl, #coinTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 150
} );

$('#expandViewDiv').hide();
$('#expandViewLink').click(function () {
	$('#expandViewDiv').show();
});







$('#unCheckSpn').hide();	
$('#checkall').click(function () {
$('input:checkbox.collections').each(function () {
	$(this).prop('checked', true);
	});	
	$('#checkSpn').hide();
	$('#unCheckSpn').show();
	$('#checkall').prop('checked', false);
});
$('#unCheckall').click(function () {
$('input:checkbox.collections').each(function () {
	$(this).prop('checked', false);
	});	
	$('#checkSpn').show();
	$('#unCheckSpn').hide();	
	$('#unCheckall').prop('checked', false);
});


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><a href="coinContainer.php" class="brownLinkBold">All Containers</a>-><a href="coinContainerType.php?containerType=<?php echo str_replace(' ', '_', strip_tags($Container->getContainerType())); ?>" class="brownLink"><?php echo $Container->getContainerType(); ?></a>-><a href="coinContainerList.php?ID=<?php echo $Encryption->encode($containerID); ?>"><?php echo $Container->getContainerName(); ?></a></span>
<h1><?php echo $Container->getContainerName(); ?></h1>
<p>All <?php echo $coin->getCoinByDenomination($denomination); ?> Coins</p>
<table width="100%" border="0">
  <tr>
    <td class="darker">Denomination</td>
    <td align="right"><?php echo $coin->getCoinByDenomination($_GET['denomination']); ?></td>
    <td align="right"><a href="coinContainerNew.php"><strong>Add New Container</strong></a></td>
  </tr>
  <tr>
    <td width="15%" class="darker">Coins</td>
    <td width="28%" align="right"><?php echo $Container->getCollectionContainerCount($containerID); ?></td>
    <td width="57%" align="right"><a href="coinContainerEdit.php?ID=<?php echo $Encryption->encode($containerID) ?>"><strong>Edit Container</strong></a></td>
  </tr>
  <tr>
    <td class="darker">Rolls</td>
    <td align="right"><?php echo $Container->getCollectionContainerCount($containerID); ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Sets</td>
    <td align="right"><?php echo $Container->getCollectionContainerCount($containerID); ?></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td class="darker">Certified Coins</td>
    <td align="right"><?php echo $Container->getCertCount($containerID, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $Container->getCollectionContainerSum($containerID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />

<hr />
<table width="100%" border="0">
  <tr class="darker">
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.005">1/2C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.010">1C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.020">2C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.030">3C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.050">5C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.100">10C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.200">20C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.250">25C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.500">50C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=1.000">$1</a></td>
    </tr>
  <tr>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.005'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.010'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.020'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.030'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.050'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.100'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.200'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.250'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='0.500'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='1.000'); ?></td>
    </tr>
</table>
<hr />

<h3><a href="coinContainerAlbum.php?ID=<?php echo $Encryption->encode($containerID) ?>" class="brownLink">Album View</a> | <span class="brownLink" id="expandViewLink">List View | Add <?php echo $coin->getCoinByDenomination($_GET['denomination']) ?> to Collection</span></h3>

<div id="expandViewDiv">


<form action="" method="post" class="compactForm" id="addRollCoinsExpForm">
<span id="checkSpn"><strong>Check All:</strong> <input id="checkall" type="checkbox" value="" /></span><span id="unCheckSpn"><strong>Uncheck All:</strong> <input id="unCheckall" type="checkbox" value="" /></span>

<table width="100%" cellpadding="3" id="addCoinListTbl">
<thead class="darker">
  <tr>
    <td>Coin</td>
    <td>Grade</td>
    <td>Service</td>
    <td>Type</td>
  </tr>
</thead>
  <tbody>
<?php
$i = 0;
$result  = mysql_query("SELECT * FROM collection WHERE collectfolderID = '0' AND containerID = '0' AND denomination = '".strip_tags($_GET['denomination'])."' AND collectsetID = '0' AND userID = '$userID' ORDER BY coinYear DESC");
while($row = mysql_fetch_array($result)){
        $coin->getCoinById(intval($row['coinID']));
		$collection->getCollectionById(intval($row['collectionID']));
		$i++;
echo '<tr class="gryHover">
<td><input class="collections" name="selectID[]" type="checkbox" value="'.$Encryption->encode($row['collectionID']).'" id="coinNum'.$i.'" /> <label for="coinNum'.$i.'"><strong>' .$coin->getCoinName() . '</strong></label></td>
<td>' .$collection->getCoinGrade() . '</td>
<td>' .$collection->getGrader() . '</td>
<td>' .$coin->getCoinType() . '</td>
</tr>'; 
}//close the while loop
echo '' //close out the table
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td>Coin</td>
    <td>Grade</td>
    <td>Service</td>
    <td>Type</td>
  </tr>
</tfoot>
</table>
<br />
<input name="expandContainer" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
    <input name="addRollCoinsExpBtn" id="addRollCoinsExpBtn" type="submit" value="Add Coins" onclick="return confirm('Add All Coins to Box?')" /> 
</form>
</div>

<table width="100%" border="0" id="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE containerID = '$containerID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No '.$coin->getCoinByDenomination($_GET['denomination']).'\'s Saved In This Container</td>
	<td>&nbsp;</td><td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $collectionID = intval($row['collectionID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  echo '
    <tr class="gryHover">
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center"></td>
	<td class="purchaseTotals" align="right"></td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="right">Purchase</td>
  </tr>
	</tfoot>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>