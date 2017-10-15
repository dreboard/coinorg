<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
include_once"../inc/classes/PaginateFolder.php";
$pages = new PaginateFolder;

  function folderCoinLink($coinID, $collectfolderID, $userID){
	  $coin = new Coin();
	  $Encryption = new Encryption();
	  $coin->getCoinById($coinID);
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID = '$collectfolderID' AND userID = '$userID'");
	$coinCount = mysql_num_rows($pageQuery);
	if($coinCount == 0){
		if($coin->getCoinYear() <= date('Y')){
		$image = '<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/blank.jpg" alt="" width="100" height="100" /></a>';
		} else {
			$image = '<img class="coinSwitch" src="../img/blank.jpg" alt="" width="100" height="100" />';
		}
		
	} else {
		while ($row2 = mysql_fetch_array($pageQuery))
		{
			$collection = new Collection();
			$coinVersion = str_replace(' ', '_', strip_tags($row2['coinVersion']));
			$coinID = intval($row2['coinID']);
			$collectionID = $Encryption->encode(intval($row2['collectionID']));
			$collection->getCollectionById(intval($row2['collectionID'])); 
		}
		$image = '<a href="viewCoinDetail.php?ID='.$collectionID.'"  title="'.$coin->getCoinName().' '.$collection->getCoinGrade().'"><img class="coinSwitch" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" alt="" width="100" height="100" /></a>';
	}
	 return $image;
 } 
 

if (isset($_GET["ID"])) { 
$collectfolderID = $Encryption->decode($_GET['ID']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderID = $collectionFolder->getFolderID();
$folder->getFolderByID($folderID);

 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>View <?php echo $collectionFolder->getFolderNickname(); ?></title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h1><?php echo $collectionFolder->getFolderNickname(); ?></h1>
<p><strong>Folder Type: </strong><a href="viewFolder.php?folderID=<?php echo $folderID ?>" class="brownLink"><?php echo $folder->getFolderName(); ?></a></p>
<table class="table">
  <tr>
    <td width="22%"><strong>Total Coins</strong></td>
    <td width="78%"><?php echo $collectionFolder->folderCoinsCount($collectfolderID, $userID); ?>/<?php echo $folder->getCoinSlots(); ?></td>
    </tr>
  <tr>
    <td><strong>Created</strong></td>
    <td><?php echo date("M j, Y",strtotime($collectionFolder->getCoinDate())); ?></td>
    </tr>
  <tr>
    <td><strong> Investment (Folder)</strong></td>
    <td>$<?php echo $collectionFolder->getCoinPrice($collectfolderID); ?></td>
    </tr>
  <tr>
    <td><strong> Investment (Coins)</strong></td>
    <td>$<?php echo $collectionFolder->getFolderCoinPrice($collectfolderID); ?></td>
    </tr>
  <tr>
    <td><strong>Total</strong></td>
    <td><strong>$<?php echo $collectionFolder->getCoinPrice($collectfolderID) +  $collectionFolder->getFolderCoinPrice($collectfolderID); ?></strong></td>
    </tr>
</table>
<a class="btn btn-default btn-block" href="http://mycoinorganizer.com/user/addFolderBlank.php">Create New Folder</a>
<a class="btn btn-default btn-block" href="viewFolderDetailList.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>">Manage This Folder</a>


<div class="table-responsive">
  <table class="table">
  <tr class="setSixRow" valign="top"> 
<?php
$i = 1;
/*$result = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinName ASC ".$pages->limit." ") or die(mysql_error());*/

$result = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID'") or die(mysql_error());


while($row = mysql_fetch_array($result)){
$coinList = explode(",", $row['coins']);
	foreach ($coinList as $coinID)
		{
			$coin->getCoinById($coinID);
echo '<td width="14%" height="135">
	'.folderCoinLink($coinID, $collectfolderID, $userID).'<br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 7) { //when you have echoed 3 <td>'s
echo '</tr><tr class="setSixRow" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}
}

?>
</tr></table>
</div>

<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>