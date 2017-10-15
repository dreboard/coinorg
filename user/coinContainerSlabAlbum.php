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
<table width="100%" border="0">
  <tr>
    <td width="13%" class="darker">Coins</td>
    <td width="19%" align="right"><?php echo $Container->getCollectionContainerCount($containerID); ?></td>
    <td width="68%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $Container->getCollectionContainerSum($containerID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr class="darker">
    <td width="8%" align="center">1/2C</td>
    <td width="8%" align="center">1C</td>
    <td width="8%" align="center">2C</td>
    <td width="8%" align="center">3C</td>
    <td width="8%" align="center">5C</td>
    <td width="8%" align="center">10C</td>
    <td width="8%" align="center">20C</td>
    <td width="8%" align="center">25C</td>
    <td width="8%" align="center">50C</td>
    <td width="8%" align="center">$1</td>
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
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="darker">
    <td align="center">$2.5</td>
    <td align="center">$3</td>
    <td align="center">$4</td>
    <td align="center">$5</td>
    <td align="center">$10</td>
    <td align="center">$20</td>
    <td align="center">$25</td>
    <td align="center">$50</td>
    <td align="center">$100</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='2.500'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='3.000'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='4.000'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='5.000'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='10.000'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='20.000'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='25.000'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='50.000'); ?></td>
    <td align="center"><?php echo $Container->getCollectionDenomCount($containerID, $denomination='100.000'); ?></td>
    <td align="center">&nbsp;</td>
  </tr>
  </table>
<hr />
<h3>Album View | <a class="brownLink" href="coinContainerSlabReport.php?ID=<?php echo $Encryption->encode($containerID) ?>">Report View</a></h3>
<table width="100%" border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;

  function checkCoins($coinID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
{
	$coinVersion = str_replace(' ', '_', $show['coinVersion']);
}
	if($coinCount == 0){
		$image = "blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = $coinVersion.'.jpg';
	}
	 return $image;
 }
 
$result = mysql_query("SELECT * FROM collection WHERE containerID = '$containerID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($result) == 0){
	  echo '
		  <td colspan="4" align="center">You dont have any coins in this container</td>';
} else {
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$collectionID = intval($row['collectionID']);
	$coin->getCoinById($coinID);
	checkCoins($coinID);	
echo '<td width="14%" height="135">
	<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.checkCoins($coinID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'<br />
	'.$coin->getCoinType().'</td>';
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
}
?>
</tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>