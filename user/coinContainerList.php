<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$containerID = $Encryption->decode($_GET['ID']);
$Container->getContainerById($containerID);

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
<span><a href="coinContainer.php" class="brownLinkBold">All Containers</a>-><a href="coinContainerType.php?containerType=<?php echo str_replace(' ', '_', strip_tags($Container->getContainerType())); ?>" class="brownLink"><?php echo $Container->getContainerType(); ?></a>-><?php echo $Container->getContainerName(); ?></span>
<h1><?php echo $Container->getContainerName(); ?></h1>

<table width="100%" border="0">
  <tr>
    <td class="darker">Type</td>
    <td align="right"><?php echo $Container->getContainerType(); ?></td>
    <td align="right"><a href="coinContainerNew.php"><strong>Add New Container</strong></a></td>
  </tr>
  <tr>
    <td width="15%" class="darker">Coins</td>
    <td width="22%" align="right"><?php echo $Container->getCollectionContainerCount($containerID); ?></td>
    <td width="63%" align="right"><a href="coinContainerEdit.php?ID=<?php echo $Encryption->encode($containerID) ?>"><strong>Edit Container</strong></a></td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $Container->getCollectionContainerSum($containerID); ?></td>
    <td align="right"><select id="mintsetID" name="mintsetID" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="">Other <?php echo $Container->getContainerType(); ?></a>-></option>
      <option value="mintset.php">All Sets</option>
      <?php 
	$getcoinType = mysql_query("SELECT * FROM containers WHERE containerTypeID = '".$Container->getContainerTypeID()."' ") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$Container->getContainerById(intval($row['containerID']));
	echo '<option value="'.$Container->getContainerTypeURLByID(intval($row['containerID'])).'">'.strip_tags($row['containerName']).'</option>';

	}
?>
    </select></td>
  </tr>
  
  <tr>
    <td class="darker">Certified Coins</td>
    <td align="right"><?php echo $Container->getCertCount($containerID, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Collected</td>
    <td align="right"><?php echo date("F j, Y",strtotime($Container->getContainerDate()));; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Description</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><?php echo $Container->getContainerDesc(); ?></td>
    </tr>
</table>
<br />
<p>&nbsp;</p>
<hr />
<table width="100%" border="0">
  <tr class="darker">
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.005">1/2C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.010">1C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.020">2C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.030">3C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.050">5C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.010">10C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.020">20C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.025">25C</a></td>
    <td width="8%" align="center"><a href="coinContainerDenom.php?ID=<?php echo $Encryption->encode($containerID) ?>&denomination=0.050">50C</a></td>
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

<h3><a href="coinContainerAlbum.php?ID=<?php echo $Encryption->encode($containerID) ?>" class="brownLink">Album View</a> | List View</h3>

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
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
    <td>No Coins Saved In This Container</td>
	<td>&nbsp;</td><td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coin-> getCoinById(intval($row['coinID']));  
  $collection->getCollectionById(intval($row['collectionID']));
  echo '
    <tr class="gryHover">
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'"  title="'.$coin->getCoinName().'">'.substr($coin->getCoinName(), 0, 60).'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'.$coin->getCoinType().'</a></td>	
	<td align="center">'.$collection->getCoinPrice().'</td>
	<td class="purchaseTotals" align="right">'.date("M j, Y",strtotime($collection->getCoinDate())).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot class="darker">
  <tr>
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
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