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
<h1><img src="../img/<?php echo str_replace(' ', '_', $ContainerType->getContainerTypeName()) ?>.jpg" width="100" height="100" align="absmiddle" /> <?php echo $Container->getContainerName(); ?></h1>
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center"><h3><a href="coinContainerTrayEdit.php?ID=<?php echo $Encryption->encode($containerID) ?>">Manage Container</a></h3></td>    
    <td width="25%" align="center"><h3><a href="coinContainer.php" class="brownLinkBold">All Containers</a></h3></td>
    <td width="25%" align="center"><h3><a href="coinContainerType.php?containerType=<?php echo str_replace(' ', '_', strip_tags($Container->getContainerType())); ?>" class="brownLink"><?php echo $Container->getContainerType(); ?></a></h3></td>

    <td width="25%" align="center"><h3><a href="coinContainerNew.php">Add New Container</a></h3></td>        
  </tr>
</table>
<hr />


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
    <td width="13%" class="darker">Rolls</td>
    <td width="17%" align="right"><?php echo $Container->getBinCount($containerID, $userID); ?></td>
    <td width="70%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $Container->getCollectionContainerSum($containerID); ?></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td class="darker">Capacity</td>
    <td align="right"><?php echo $ContainerType->getRollCount(); ?></td>
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
<hr />

<h3><a href="coinContainerAlbum.php?ID=<?php echo $Encryption->encode($containerID) ?>" class="brownLink">Album View</a> | List View</h3>

<table width="100%" border="0" id="rollListTbl">
  <thead class="darker">
  <tr>
    <td width="63%">Roll Name</td>  
    <td width="17%" align="center">Grade Range</td>
    <td width="20%" align="center">Roll Type</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND containerID = '$containerID'") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addBulk.php" class="brownLinkBold">No Rolls Saved In Tray</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
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
  $coinType = strip_tags($row['coinType']);
  $coinCategoryLink = str_replace(' ', '_', $coinCategory);
  $rollTypeLink = str_replace(' ', '_', $rollType);

switch($row['rollType']){
			case 'Same Coin':
			$detailLink = '<a href="viewSameRollDetail.php?ID=' .$Encryption->encode($collectrollsID). '">' . $rollNickname . '</a>';
			break;
			case 'Mint':
			$detailLink = '<a href="viewMintRollDetail.php?ID=' .$Encryption->encode($collectrollsID). '">' . $rollNickname . '</a>';
			break;
			case 'Date Range':
			$detailLink = '<a href="viewDateRollDetail.php?ID=' .$Encryption->encode($collectrollsID). '">' . $rollNickname . '</a>';
			break;
			case 'Mixed Type':
			$detailLink = '<a href="viewMixedRollDetail.php?ID=' .$Encryption->encode($collectrollsID). '">' . $rollNickname . '</a>';
			break;
			case 'Same Year':
			$detailLink = '<a href="viewYearRollDetail.php?ID=' .$Encryption->encode($collectrollsID). '">' . $rollNickname . '</a>';
			break;
			case 'Same Type':
			$detailLink = '<a href="viewTypeRollDetail.php?ID=' .$Encryption->encode($collectrollsID). '">' . $rollNickname . '</a>';
			break;
		}


  echo '
    <tr>
    <td>'.$detailLink.'</td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollTypes.php?rollType='.$rollTypeLink.'&coinCategory='.$coinCategory.'">'.$rollType.'</a></td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="63%">Roll Name</td>  
    <td width="17%" align="center">Grade Range</td>
    <td width="20%" align="center">Roll Type</td>
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