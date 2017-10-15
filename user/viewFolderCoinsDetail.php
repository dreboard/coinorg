<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['folderID'])) { 
$folderIDtemp = strip_tags($_GET['folderID']);
$folderID = $folder->getFolderByID($folderIDtemp);
$folderName = $folder->getFolderName();	
$folderType = $folder->getFolderType();
$folderCode = $folder->getFolderCode();

$coinTypeLink = str_replace(' ', '_', strip_tags($folder->getCoinType()));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Folder Coin Details</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	

});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><?php echo $folderType ?> <?php echo $folderName ?></h1>
<p><a href="viewListReport.php?coinType=<?php echo $coinTypeLink ?>">View <?php echo $folder->getCoinType() ?> Coins</a></p>
<table width="100%" class="reportList priceListTbl" cellpadding="3" border="1">
  <tr class="keyRow">
  <td width="8%" align="center"><strong>#</strong></td>
    <td width="56%"><strong>Folder Name </strong></td>
    <td width="36%" align="center"><strong>Coins in Folder</strong></td>
    
  </tr>
<tr>
<?php
function getFolderCoinCount($collectfolderID){
	$sql = mysql_query("SELECT * FROM collection WHERE collectfolderID = '$collectfolderID'") or die(mysql_error());
		$collectCount = mysql_num_rows($sql);    	
	return $collectCount;
}

//viewListReport.php?coinType=Lincoln_Wheat
$sql = mysql_query("SELECT * FROM collectfolder WHERE folderCode = '$folderCode'  AND  userID = '$userID'") or die(mysql_error());
$folderNums = mysql_num_rows($sql);
if($folderNums == 0){
echo '<td>No '.$folder->getFolderName().'s In Collection</td>'; 
} else {
while($row = mysql_fetch_array($sql)){
	$i = 1;
	$collectfolderID = intval($row['collectfolderID']);
	$coinType = str_replace(' ', '_', strip_tags($row["coinType"]));
	
		  //$collectfolderIDVar = $collectionFolder->getCollectionFolderById($collectfolderID);
	//$folderCode = $folder->getFolderByID($folderID);
echo '
<td align="center">'.$i.' </td>
<td><a href=viewFolderDetail.php?collectfolderID='.$collectfolderID.'>'.$folder->getFolderName().'</a></td>
<td align="center"><a href=viewFolderCoinsDetail.php?collectfolderID='.$collectfolderID.'> ('. getFolderCoinCount($collectfolderID).')</a></td>

'; 
$i++;
}
}
?>
</tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
