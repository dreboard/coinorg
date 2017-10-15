<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
 if (isset($_GET["folderID"])) { 
$folderID = intval($_GET["folderID"]);
$folder->getFolderByID($folderID);


 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $folder->getFolderName(); ?></title>
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
<h1><?php echo $folder->getFolderName(); ?></h1>

<table width="100%" border="0">
  <tr>
    <td><select id="mintsetID" name="mintsetID" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="">Switch Folder/Album</option>
      <optgroup label="Folders">All Folders</option>
      <?php 
	$getcoinType = mysql_query("SELECT * FROM folders WHERE folderType = 'folder' AND  folderCompany = 'Whitman' ORDER BY folderName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisfolderID = $row['folderID'];
		$folderName = $row['folderName'];
		$folderType = $row['folderType'];
	echo '<option value="viewFolder.php?folderID=' . $thisfolderID . '">' . $folderName . ' ('.ucwords($folderType).')</option>';

	}
?>
</optgroup>
      <optgroup label="Folders">All Albums</option>
      <?php 
	$getcoinType = mysql_query("SELECT * FROM folders WHERE folderType = 'album' AND folderCompany = 'Whitman' ORDER BY folderName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisfolderID = $row['folderID'];
		$folderName = $row['folderName'];
		$folderType = $row['folderType'];
	echo '<option value="viewFolder.php?folderID=' . $thisfolderID . '">' . $folderName . ' ('.ucwords($folderType).')</option>';

	}
?>
</optgroup>

    </select></td>
    </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Total Collected</strong></td>
    <td width="15%" align="right"><?php echo $collectionFolder->getFolderCountByFolderID($folderID, $userID); ?></td>
    <td width="69%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collectionFolder->getFolderIDSumById($folderID, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<br />
<hr />
<p><a href="folders.php" class="brownLinkBold">All Folders/Albums</a> | &nbsp;<a href="addFolderBlank.php" class="brownLinkBold">Add Folder/Album</a></p>

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Collected</td>
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Coins</td>
  </tr>
</thead>
  <tbody>

<?php
$sql = mysql_query("SELECT * FROM collectfolder WHERE folderID = '".$folder->getFolderID()."' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($sql)== 0){
	echo    '<tr class="gryHover">
    <td align="left"><strong><a href="addFolderBlank.php">No Folders Saved, Add</a></strong></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>';
} else {
  while($row = mysql_fetch_array($sql))
	  {
  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));   
  echo '
    <tr class="gryHover">
    <td align="left"><a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'">'.$collectionFolder->getFolderNickname().'</a></td>
		<td align="center">'.date("F j, Y",strtotime($collectionFolder->getCoinDate())) .'</td>
	<td align="center">'. $collectionFolder->folderCoinsCount(intval($row['collectfolderID']), $userID) .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="57%">Collected</td>
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Coins</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>