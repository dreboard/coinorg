<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

//addCoinByID.php?coinID=$coinID

function checkFolderCoin($coinID, $collectfolderID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
{
	$coinVersion = str_replace(' ', '_', $show['coinVersion']);
}
	if($coinCount == 0){
		$image = "blank.jpg";
	} else {
		$image = $coinVersion.'.jpg';
	}
	 return $image;
}

if (isset($_GET['collectfolderID'])) { 
$collectfolderID = intval($_GET['collectfolderID']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folder->getFolderByID($collectionFolder->getFolderID());

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $folder->getFolderName(); ?> Folder</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	
//coinSwitch


});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">

<a href="viewFolderDetailList.php?collectfolderID=<?php echo $collectfolderID ?>">List View With Details</a>
<table width="100%" border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM collection WHERE collectfolderID = '$collectfolderID' ORDER BY coinYear ASC ") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
	//checkCoin($coinID);	
echo '<td width="14%" height="135">
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.checkFolderCoin($coinID, $collectfolderID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 8) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
