<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
include_once"../inc/classes/PaginateFolder.php";
$pages = new PaginateFolder;
  function checkFolderCoin($coinID, $collectfolderID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
	{
		$coin = new Coin();
		$coinVersion = str_replace(' ', '_', $show['coinVersion']);
	}
	if($coinCount == 0){
		$image = "blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = $coinVersion.'.jpg';
	}
	 return $image;
 }
 
 
   function checkCoin($coinID, $collectfolderID){
	 $coin = new Coin();  
	 $Encryption = new Encryption();
	 $coin->getCoinById($coinID);
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
	{
		$coinVersion = str_replace(' ', '_', $show['coinVersion']);
		$collectionID = intval($show['collectionID']);
	}
	if($coinCount == 0){
		$link = '<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/blank.jpg" alt="" width="100" height="100" /></a>';
	} else {
		$link = '<a href="viewCoinDetail.php?collectionID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.$coinVersion.'.jpg" alt="" width="100" height="100" /></a>';
		//$image = $coinVersion.'.jpg';
	}
	 return $link;
 }
 
if (isset($_GET["ID"])) { 
$collectfolderID = $Encryption->decode($_GET['ID']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderID = $collectionFolder->getFolderID();
$folder->getFolderByID($folderID);

 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $collectionFolder->getFolderNickname(); ?></title>

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
<h2><?php echo $collectionFolder->getFolderNickname(); ?></h2>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="2" align="left"><a href="viewFolder.php?folderID=<?php echo $folderID ?>"><?php echo $folder->getFolderName(); ?></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="23%"><strong>Total Coins</strong></td>
    <td width="12%" align="right"><a href="viewFolderCoins.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><?php echo $collectionFolder->folderCoinsCount($collectfolderID); ?></a></td>
    <td width="65%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Investment (Folder)</strong></td>
    <td align="right">$<?php echo $collectionFolder->getCoinPrice($collectfolderID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Investment (Coins)</strong></td>
    <td align="right">$<?php echo $collectionFolder->getFolderCoinPrice($collectfolderID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><a href="viewFolderDetailList.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>"><strong>List View With Details</strong></a></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<hr />
<h3><?php echo ucfirst($folder->getFolderType()); ?> View</h3>
<p>
  <?php
$countAll = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID' ") or die(mysql_error());
$row = mysql_fetch_array($countAll);
$coinList = explode(",", $row['coins']);
$num_rows = count($coinList);
$pages->items_total = $num_rows;
$pages->mid_range = 6;
$pages->paginate();
echo $pages->display_pages();

?>
</p>
<table width="700" border="0" cellpadding="3" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php 

$i = 1;

$values = array($row['coins']);

$result = mysql_query("SELECT * FROM coins WHERE coinID IN('".implode("','", $coinList)."') ORDER BY coinYear ASC ".$pages->limit."") or die(mysql_error());

//$result = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID' ") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = strip_tags($row['coinID']);
	$coin->getCoinById($coinID);
echo '<td width="14%" height="135">
	'.checkCoin($coinID, $collectfolderID).'<br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 7) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

echo '' //close out the table
?>
</tr></table>
<p><?php
echo $pages->display_pages(); // Optional call which will display the page numbers after the results.
echo $pages->display_jump_menu(); // Optional – displays the page jump menu
echo $pages->display_items_per_page(); //Optional – displays the items per page menu
?></p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
