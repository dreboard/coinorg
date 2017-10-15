<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Folder Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#folderListTbl').dataTable( {
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#folderListTbl tr:hover {color:#fff; background-color:#333;}
#folderListTbl tr a:hover {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/myFolder.jpg" width="100" height="100" align="middle"> My  Coin Folders</h1>
<p><a href="folders.php" class="brownLinkBold">All Folders/Albums</a> | &nbsp;<a href="addFolderBlank.php" class="brownLinkBold">Add Folder/Album</a></p>

<table width="100%" border="0">
  <tr>
    <td><a class="brownLinkBold" href="folderType.php?type=folder">Folders</a></td>
    <td><a href="folderType.php?type=album" class="brownLinkBold">Albums</a></td>
  </tr>
  <tr>
    <td width="12%"><?php echo $collectionFolder->getCompanyCountByUser($folderType='folder',$folderCompany='Whitman', $userID); ?></td>
    <td width="76%"><?php echo $collectionFolder->getCompanyCountByUser($folderType='album',$folderCompany='Whitman', $userID); ?></td>
    </tr>
</table>

<hr />

<table width="100%" border="0" id="folderListTbl">
  <thead class="darker">
  <tr>
    <td width="60%" height="24">Folder Name</td>
    <td width="22%">Category</td>
    <td width="8%">Type</td>  
    <td width="10%" align="center">Collected</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM folders WHERE folderCompany = 'Whitman' ORDER BY denomination ASC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $folderID = intval($row['folderID']);  
  $folderName = strip_tags($row['folderName']);  
  $coinCategory = strip_tags($row['coinCategory']);
  $folderType = strip_tags($row['folderType']);

  echo '
    <tr>
    <td><a href="viewFolder.php?folderID='.$folderID.'">'.$folderName.'</a> </td>
	<td>'.$coinCategory.'</td>	
	<td>'.ucwords($folderType).'</td>	
	<td align="center">'.$collectionFolder->getFolderCountByFolderID($folderID, $userID).'</td>	
  </tr>';
	  }
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td>Folder Name</td>
    <td>Category</td>
    <td width="8%">Type</td>  
    <td align="center">Collected</td>    
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>