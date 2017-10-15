<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if(isset($_GET["collectionID"])){
	$collectionID  = intval($_GET["collectionID"]);
	$collectfolderID  = intval($_GET["collectfolderID"]);
	$collection->getCollectionById($collectionID);
	
	$coinType = str_replace(' ', '_', $collection->getCoinType());
		
	$coinID = $collection->getCoinID();
	$coin->getCoinById($coinID);
	$coinName = $coin->getCoinName();
	
	$collectionFolder->getCollectionFolderById($collectfolderID);
	$folderNickname = $collectionFolder->getFolderNickname();


}

if(isset($_POST["removeCollectBtn"])){
	$collectionID = intval($_POST["collectionID"]);
	$collectfolderID = intval($_POST["collectfolderID"]);		
    $removeThis = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$collectionID'") or die(mysql_error()); 
	if($removeThis) {
	 header("location: viewFolderDetail.php?collectfolderID=$collectfolderID");
	}
}


if(isset($_POST["deleteCoinBtn"])){
	$collectionID = intval($_POST["collectionID"]);
	
    $removeThis = mysql_query("DELETE from collection WHERE collectionID = '$collectionID'") or die(mysql_error()); 
	if($removeThis) {
	 
		echo "Coin not updated";
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	
//coinSwitch


});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">



<h1><?php echo $coinName; ?></h1>

<p>
<table width="600" border="0" cellpadding="3" id="removeChoiceTbl">
  <tr align="center">
    <td valign="top">
    <img src="../img/<?php echo $coinType ?>.jpg" width="100" height="100" />
    <p>Remove this coin from folder <?php echo $folderNickname ?> </p>
</td>
    <td valign="top">
    <img src="../img/<?php echo $coinType ?>.jpg" width="100" height="100" />
    <p>Remove this coin from your collection</p></td>
  </tr>
  <tr align="center">
    <td><form class="compactForm" action="" method="post">
        <input name="collectfolderID" type="hidden" value="<?php echo $collectfolderID ?>" />
        <input name="collectionID" type="hidden" value="<?php echo $collectionID ?>" />
        <input name="removeCollectBtn" type="submit" value="Remove From Folder" />
      </form></td>
    <td><form class="compactForm" action="" method="post">
        <input name="collectfolderID" type="hidden" value="<?php echo $collectfolderID ?>" />
        <input name="collectionID" type="hidden" value="<?php echo $collectionID ?>" />
        <input name="deleteCoinBtn" type="submit" value="Remove From Collection" />
      </form></td>
  </tr>
</table>

<hr /><a href="viewFolderDetail.php?collectfolderID=<?php echo $collectfolderID ?>">Back to folder</a>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
