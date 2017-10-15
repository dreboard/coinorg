<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['type'])) { 
$type = strip_tags($_GET['type']);

}

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
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
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
<h1><img src="../img/myFolder.jpg" width="100" height="100" align="middle"> My <?php echo ucwords($type) ?>s </h1>
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
    <td width="41%" height="24"><?php echo ucwords($type) ?> Name</td>
    <td width="48%">Type</td>  
    <td width="11%" align="center">Coins</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectfolder WHERE folderType = '$type' AND folderCompany = 'Whitman' AND userID = '$userID' ORDER BY denomination DESC") or die(mysql_error());
  if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>You dont have any '.$type.'\'s in your Collection</td>
		  <td>&nbsp;</td><td>&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $folderID = strip_tags($row['folderID']); 
  $collectfolderID = strip_tags($row['collectfolderID']);
  $coinCategory = strip_tags($row['coinCategory']);
  $folderType = strip_tags($row['folderType']);
  $collectionFolder->getCollectionFolderById($row['collectfolderID']);
  $folder->getFolderByID($row['folderID']);
  echo '
    <tr class="gryHover">
    <td><a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'">'.$collectionFolder->getFolderNickname().'</a> </td>
	<td><a href="viewFolder.php?folderID='.intval($row['folderID']).'">'.$folder->getFolderName().'</a></td>	
	<td align="center">'.$collectionFolder->folderCoinsCount($collectfolderID, $userID).'</td>	

  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="41%">Folder Name</td>
    <td width="48%">Type</td>  
    <td align="center">Coins</td>    
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>