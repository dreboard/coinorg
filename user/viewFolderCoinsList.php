<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['collectfolderID'])) { 
$collectfolderID = strip_tags($_GET['collectfolderID']);
$collectionFolder->getCollectionFolderById($collectfolderID);

$folderNickname = $collectionFolder->getFolderNickname();


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coin List</title>

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
<h1>Coins in <?php echo $folderNickname ?></h1>
<p><a href="viewListReport.php?coinType=<?php echo $coinTypeLink ?>">View <?php echo $folder->getCoinType() ?> Coins</a></p>
<table width="100%" class="reportList priceListTbl" cellpadding="3" border="1">
  <tr class="keyRow">
    <td width="79%"><strong>Coin Name </strong></td>
    <td width="21%" align="center"><strong>Grade</strong></td>
  </tr>

<?php
function getFolderCoinCount($collectfolderID){
	$sql = mysql_query("SELECT * FROM collection WHERE collectfolderID = '$collectfolderID'") or die(mysql_error());
		$collectCount = mysql_num_rows($sql);    	
	return $collectCount;
}

//viewListReport.php?coinType=Lincoln_Wheat
$sql = mysql_query("SELECT * FROM collection WHERE collectfolderID = '$collectfolderID'  AND  userID = '$userID'") or die(mysql_error());
$folderNums = mysql_num_rows($sql);

while($row = mysql_fetch_array($sql)){
	$collectionID = intval($row['collectionID']);
	$collectfolderID = intval($row['collectfolderID']);
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
	$collection->getCollectionById($collectionID);

	echo '
    <td><a href="viewCoinDetail.php?collectionID='.$collectionID.'">'.$coin->getCoinName().'</a></td>
    <td>'.$collection->getCoinGrade().'</td>
  </tr>
	
	';
}
?>
</table>

<table width="100%">
  <tr align="center" valign="top">
    <th width="29%"><h3><a href="addFolder.php">Enter A <br />
      Purchased Folder</a></h3></th>
    <th width="35%"><h3><a href="addFolderBlank.php">Create and Store <br />
      Empty Folder</a></h3></th>    
    <th width="36%"><h3><a href="addFolderCollection.php">Create Folder <br />
      From My Collection</a></h3></th>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
