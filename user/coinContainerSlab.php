<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$containerID = $Encryption->decode($_GET['ID']);
$Container->getContainerById($containerID);
$coinCategory = $Container->getCoinCategory();
$ContainerType->getContainerTypeById($Container->getContainerTypeID());
$coinNote = $Container->getCoinNote();
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
    <td width="25%" align="center"><h3><a href="editContainerSlab.php?ID=<?php echo $Encryption->encode($containerID) ?>" class="brownLinkBold">Edit Container</a></h3></td>
    <td width="25%" align="center"><h3><a href="coinContainerType.php?containerType=<?php echo str_replace(' ', '_', strip_tags($Container->getContainerType())); ?>" class="brownLink"><?php echo $Container->getContainerType(); ?></a></h3></td>

    <td width="25%" align="center"><h3><a href="coinContainerNew.php">Add New Container</a></h3></td>        
  </tr>
</table>
<hr />

<table width="100%" border="0">
  <tr>
    <td width="18%"><h3><a href="coinContainerSlabAlbum.php?ID=<?php echo $Encryption->encode($containerID) ?>" class="brownLink">Album View</a></h3></td>
    <td width="20%"><h3><a href="coinContainerSlabReport.php?ID=<?php echo $Encryption->encode($containerID) ?>">Report View</a></h3></td>
    <td width="59%"><select id="containerSwitch" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="">Other <?php echo $Container->getContainerType(); ?></a>-&gt;</option>
      <option value="coinContainer.php">All Containers</option>
      <?php 
	$sql = mysql_query("SELECT * FROM containers WHERE containerTypeID = '".$Container->getContainerTypeID()."' ") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
	echo '<option value="'.$Container->getContainerTypeURLByID(intval($row['containerID'])).'">'.strip_tags($row['containerName']).'</option>';

	}
?>
    </select></td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>


<table width="100%" border="0">
  <tr>
    <td class="darker">Type</td>
    <td align="right"><?php echo $Container->getContainerType(); ?></td>
    <td align="right"></td>
  </tr>
  <tr>
    <td class="darker">Category</td>
    <td align="right"><?php echo $Container->getCoinCategory(); ?></td>
    <td align="right"></td>
  </tr>
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
  
  <tr>
    <td class="darker">Capacity</td>
    <td align="right"><?php echo $Container->getFull(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Description</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
	<p><?php echo $coinNote; ?></p>
    </td>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>