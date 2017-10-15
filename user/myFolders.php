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
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
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
<h1><img src="../img/myFolder.jpg" width="100" height="100" align="middle"> Coin Folders</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td> 
  </tr>
</table> 
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

<table width="100%" border="0" id="coinTbl" cellpadding="3">
<thead class="darker">
  <tr>
    <td>Collected</td>
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Coins</td>
  </tr>
</thead>
  <tbody>

<?php
$sql = mysql_query("SELECT * FROM collectfolder WHERE userID = '$userID' ORDER BY denomination ASC") or die(mysql_error());
if(mysql_num_rows($sql)== 0){
	echo    ' <tr align="center">
    <td align="left"><strong><a href="addFolderBlank.php">No Folders Saved, Add</a></strong></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>';
} else {
  while($row = mysql_fetch_array($sql))
	  {
  //$collectsetID = $Encryption->encode($row['collectsetID']);
  $folderID = intval($row['folderID']);
  $folder->getFolderByID($folderID);
  $collectfolderID = intval($row['collectfolderID']);
  $collectionFolder->getCollectionFolderById($collectfolderID);   
  echo '
    <tr align="center" class="gryHover">
    <td align="left"><a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'">'.$collectionFolder->getFolderNickname().'</a></td>
		<td>'.date("M j, Y",strtotime($collectionFolder->getCoinDate())) .'</td>
	<td>'. $collectionFolder->folderCoinsCount($collectfolderID, $userID) .'/'.$folder->getCoinSlots().'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td>Collected</td>
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Coins</td>
  </tr>
	</tfoot>
</table>
<br class="clear" />

<p class="roundedWhite">
<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=whitmancoinalbums&icep_uq=whitman+coin+albums&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=83274&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/ads/foldersAd.jpg" width="900" height="100"></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=whitmancoinalbums&uq=whitman+coin+albums&mpt=[CACHEBUSTER]"> </p>

<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>