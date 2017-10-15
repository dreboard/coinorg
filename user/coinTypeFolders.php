<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);

$CoinTypes->getCoinByType($coinType);
$getDates = htmlentities($CoinTypes->getDates());

$categoryLink = str_replace(' ', '_', $coin->getCategoryByType($coinType));
$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $buttonTxt = str_replace('_', ' ', $pageCategory); 
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  if($pageCategory == "Half Dime"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  if($pageCategory == "Half Dollar"){
	  $pageCategory = "Half";
	  }
	  if($pageCategory == "Small Cent"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  $dates = $row['dates'];

  }
 }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType ?> Rolls</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinType ?> Folders (<?php echo $collectionRolls->getRollCountByType($userID, $coinType); ?>)</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />
<h3><img src="../img/albumIcon.jpg" alt="" width="20" height="24" align="absmiddle" /> Folders</h3>
<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="75%"><strong>Name</strong></td>
      <td width="11%" align="center"><strong>Collected</strong></td>
      <td width="14%" align="right"><strong>Purchase</strong></td>
    </tr>
<?php 
    echo '<tr>
      <td></td>
      <td></td>
      <td></td>
    </tr>';
?>
<?php
$countAll = mysql_query("SELECT * FROM folders WHERE folderType = 'folder' AND coinType = '$coinType' ") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td><a href="addBulk.php" class="brownLinkBold">No '.$coinType.' Folders</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $folder->getFolderByID(intval($row['folderID']));	  
  echo '
    <tr class="gryHover">
    <td class="darker"><a href="viewFolder.php?folderID='.intval($row['folderID']).'">'.$folder->getFolderName().'</a></td>
	<td align="center">'.$folder->getCount(intval($row['folderID']), $userID).'</td>
	<td align="right">'.$collectionFolder->getFolderIDSumById(intval($row['folderID']), $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
  </tbody>
</table>
<hr />
<h3><img src="../img/albumIcon.jpg" alt="" width="20" height="24" align="absmiddle" /> Albums</h3>
<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="75%"><strong>Name</strong></td>
      <td width="11%" align="center"><strong>Collected</strong></td>
      <td width="14%" align="right"><strong>Purchase</strong></td>
    </tr>
<?php 
    echo '<tr>
      <td></td>
      <td></td>
      <td></td>
    </tr>';
?>
<?php
$countAll = mysql_query("SELECT * FROM folders WHERE folderType = 'album' AND coinType = '$coinType' ") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td><a href="addBulk.php" class="brownLinkBold">No '.$coinType.' Folders</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $folder->getFolderByID(intval($row['folderID']));	  
  echo '
    <tr class="gryHover">
    <td class="darker"><a href="viewFolder.php?folderID='.intval($row['folderID']).'">'.$folder->getFolderName().'</a></td>
	<td align="center">'.$folder->getCount(intval($row['folderID']), $userID).'</td>
	<td align="right">'.$collectionFolder->getFolderIDSumById(intval($row['folderID']), $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
  </tbody>
</table>
<hr />

<h3>Collected Folders</h3>
<table width="100%" border="0" id="folderListTbl">
  <thead class="darker">
  <tr>
    <td width="41%" height="24">Folder Name</td>
    <td width="48%">Type</td>  
    <td width="11%" align="center">Coins</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectfolder WHERE userID = '$userID' AND coinType = '$coinType'") or die(mysql_error());
  if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr class="gryHover">
		  <td>No Folders in your Collection</td>
		  <td>&nbsp;</td><td>&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
  $folder->getFolderByID(intval($row['folderID']));
  echo '
    <tr class="gryHover">
    <td><a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'">'.$collectionFolder->getFolderNickname().'</a> </td>
	<td><a href="viewFolder.php?folderID='.intval($row['folderID']).'">'.$folder->getFolderName().'</a></td>	
	<td align="center">'.$collectionFolder->folderCoinsCount(intval($row['collectfolderID']), $userID).'</td>	

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