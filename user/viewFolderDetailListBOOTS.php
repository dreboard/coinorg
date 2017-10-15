<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_POST["enterOpenCoinsBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
if($collectionFolder->addOpenFolderCoins($collectfolderID, $userID)){
$_SESSION['message'] = 'All Coins Added';
} else {
	$_SESSION['message'] = '<span class="errorTxt">No Coins Added</span>';
}
}
//All
if (isset($_POST["removeAllCoinsBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
$_SESSION['message'] = 'All Coins Removed';
}


//All
if (isset($_POST["deleteFolderBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
mysql_query("DELETE FROM collectfolder WHERE collectfolderID = '$collectfolderID' AND userID = '$userID'");
mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
header("location: myFolders.php");

}

if (isset($_POST["deleteFolderAndCoinsBtn"])) { 
$collectfolderID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("DELETE FROM collection WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
if($sql){
	mysql_query("DELETE FROM collectfolder WHERE collectfolderID = '$collectfolderID'  AND userID = '$userID'");
	header("location: myFolders.php");
}
}
//One coin
if (isset($_POST["folderCoin"])) { 
$collectionID = $Encryption->decode($_POST['folderCoin']);
$collectfolderID = $Encryption->decode($_POST['folder']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderID = $collectionFolder->getFolderID();
$folder->getFolderByID($folderID);

$sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$collectionID'  AND userID = '$userID'");

}

if (isset($_POST["changeCoinBtn"])) { 
$newID = $Encryption->decode($_POST['newID']);
$collectfolderID = $Encryption->decode($_POST['changeRoll']);
$oldID = $Encryption->decode($_POST['oldID']);

$sql = mysql_query("UPDATE collection SET collectfolderID = '$collectfolderID' WHERE collectionID = '$newID' AND userID = '$userID' ");
$sql2 = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$oldID' AND userID = '$userID'");
header("location: viewFolderDetailList.php?ID=".$Encryption->encode($collectfolderID)."");
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
<title>Manage <?php echo $collectionFolder->getFolderNickname(); ?></title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){	
$('.otherFolderCoinsBtns').attr('disabled', 'disabled');

$('.idCheck').change(function() {
    if ($('.idCheck:checked').length) {
        $('#addCoinFormBtn').removeAttr('disabled');
    } else {
        $('#addCoinFormBtn').attr('disabled', 'disabled');
    }
});


$("#deleteFolderBtn").click(function(){
  $('#deleteFolderSpan').text('Deleting All, Please Wait...');
  $(this).attr('disabled', 'disabled');
});	
$("#enterOpenCoinsBtn").click(function(){
  $('#enterOpenCoinsSpan').text('Adding All, Please Wait...');
  $(this).attr('disabled', 'disabled');
});	


});

function toggleFolderButtons(x) {
	//alert(x);
    if (document.getElementById('newID'+x).value == '') {
		document.getElementById("changeBtn"+x).disabled = true; 
    } else {
        document.getElementById("changeBtn"+x).disabled = false;
    }	
}
</script>   
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h1><?php echo $collectionFolder->getFolderNickname(); ?> Folder</h1>
<p><strong>Folder Type: </strong><a href="viewFolder.php?folderID=<?php echo $folderID ?>" class="brownLink"><?php echo $folder->getFolderName(); ?></a></p>
<hr>

<h2><span class="glyphicon glyphicon-book"></span> Folder Manager</h2>

<h2>
  <?php if($collectionFolder->folderCoinsCount($collectfolderID, $userID)< $folder->getCoinSlots()){ ?>
</h2>
<form class="form-inline" role="form" action="" method="post">
  <div class="form-group">
  <button class="btn btn-primary" name="enterOpenCoinsBtn" id="enterOpenCoinsBtn" type="submit"  onclick="return confirm('Enter All Available Coins?')">Enter Available </button>
      <strong><img class="hidden-xs" src="../img/Lincoln_Memorialplaceholder.jpg" width="30" height="30" align="absmiddle" /> Auto Fill Coins To Folder: </strong>
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
      
    </div>
<span class="help-block"> *Add All Available Coins From Collection</span>
  </form>
    <hr>

<?php }?>    

<?php if($collectionFolder->folderCoinsCount($collectfolderID, $userID) != 0){ ?>
  <form action="" method="post" class="form-inline" role="form">
  <div class="form-group">
  <button class="btn btn-danger" name="removeAllCoinsBtn" id="removeAllCoinsBtn" type="submit" onclick="return confirm('Remove All Coins?')">Remove Coins</button>
        <label><img class="hidden-xs" src="../img/blank.jpg" width="30" height="30" align="absmiddle" /> Empty All Coins: </label>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
    </div>
<span  class="help-block">*Keep Folder</span>
  </form>   
  <hr>

 <?php }?>     
    
<form action="" method="post" class="form-inline" role="form">
       <div class="form-group"> 
       <button class="btn btn-danger" name="deleteFolderBtn" id="deleteFolderBtn" type="submit" onclick="return confirm('Delete Folder And Keep Coins?')">Remove Folder <span class="glyphicon glyphicon-remove"></span></button>
       <label><img class="hidden-xs" src="../img/noFolder.jpg" width="30" height="30" align="absmiddle" /> Delete Folder Only: </label>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
    </div>
<span class="help-block">*Keep Coins</span>
  </form>   
   <hr>

<?php if($collectionFolder->folderCoinsCount($collectfolderID, $userID) != 0){ ?>    
 <form action="" method="post"  class="form-inline" role="form">
 <div class="form-group"> 
       <button class="btn btn-danger" name="deleteFolderAndCoinsBtn" id="deleteFolderAndCoinsBtn" type="submit" onclick="return confirm('Delete Folder And Coins?')">Remove All <span class="glyphicon glyphicon-remove"></span></button>
        <label><img class="hidden-xs" src="../img/noFolderCoins.jpg" width="30" height="30" align="absmiddle" /> Delete All: </label>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectfolderID); ?>" />
    </div>
<span class="help-block">*Delete Folder &amp; Coins</span>
  </form>   
  <hr>
   <?php }?> 
 <a class="btn btn-default" role="button" href="viewFolderDetail.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>">Return To Album View <span class="glyphicon glyphicon-th-large"></span></a>
 <hr>
   

  <h2><span class="glyphicon glyphicon-th"></span> Coins Manager</h2>
<p class="innerAlbum">Use the forms to search and add/update the folder coins.  The list will only be populated by the coins in your collection.  If you have coins that meets this folders criteria, you can go to the <a href="addFolderCoins.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>" class="brownLinkBold">Add <?php echo $collectionFolder->getCoinType(); ?> Coins</a> page and enter the collection data.</p>

<div class="table-responsive">
  <table class="table table-hover">
  <tr class="active">
    <td><strong>Coin</strong></td>
    <td><strong>Current Coin</strong></td>
    <td><strong>Other Coins In Collection</strong></td>
  </tr>
<?php 
	$sql  = mysql_query("SELECT * FROM folders WHERE folderID = '".$collectionFolder->getFolderID()."'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
	$coinList = explode(",", $row['coins']);
	$i = 0;
	foreach ($coinList as $coinID)
		{
			$coin->getCoinById($coinID);
	echo '<tr class="gryHover">
    <td><a href="viewCoin.php?coinID='.$coinID.'" title="'.$coin->getCoinName().'">' .$General->summary($coin->getCoinName(), $limit=40, $strip = false). '</a>
	
	</td>
	<td>'.$collectionFolder->getFolderCoin($coinID, $collectfolderID, $userID).'</td>
    <td>'.$collectionFolder->otherCoinsList($coinID, $collectfolderID, $userID).'</td> 
  </tr>';
	}
}

?>
</table>
</div>





<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>