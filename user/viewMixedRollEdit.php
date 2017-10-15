<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);

$CollectMintRolls->getMintRollById($collectionRolls->getRollMintID());

$CoinCategories->getCoinByCategory($collectionRolls->getCoinCategory());
$rollType = $collectionRolls->getRollType();


$rollNickname = $collectionRolls->getRollNickname();

$additional = $collectionRolls->getAdditional(); 

$page ->getCoinPage($collectionRolls->getCoinCategory());
$linkName = str_replace(' ', '_', $collectionRolls->getCoinCategory());
$coinLink = str_replace(' ', '_', $collectionRolls->getCoinCategory());


$availableCoinsRequest =mysql_query("SELECT * FROM collection WHERE coinCategory = '".$collectionRolls->getCoinCategory()."' AND proservice = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID'");

$inRollCountSql = mysql_query("SELECT * FROM collection WHERE collectrollsID = '".$collectrollsID."' AND userID = '$userID' ") or die(mysql_error());

$inRollCount = mysql_num_rows($inRollCountSql); 

$optionLimit = $CoinCategories->getRollCount() - $inRollCount;  


}

if (isset($_POST["addRollCoinsBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['ID']);
$collectionID = $Encryption->decode($_POST['rollCoinID']);

$sql = mysql_query("UPDATE collection SET collectrollsID = '$collectrollsID' WHERE collectionID = '$collectionID'  AND userID = '$userID'");
$_SESSION['message'] = 'Coins Added to Roll';
}
//roll mgt
if (isset($_POST["enterOpenCoinsBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['ID']);
$collectionRolls->addOpenFolderCoins($collectrollsID, $userID);
$_SESSION['message'] = 'All Coins Added';
}
//All
if (isset($_POST["removeAllCoinsBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("UPDATE collection SET collectrollsID = '0' WHERE collectrollsID = '$collectrollsID'  AND userID = '$userID'");
$_SESSION['message'] = 'All Coins Removed';
}


//All
if (isset($_POST["deleteRollBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['ID']);
mysql_query("DELETE FROM collectrolls WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'");
mysql_query("UPDATE collection SET collectrollsID = '0' WHERE collectrollsID = '$collectrollsID'  AND userID = '$userID'");
header("location: myRolls.php");
exit();
}

if (isset($_POST["deleteRollAndCoinsBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("DELETE FROM collection WHERE collectrollsID = '$collectrollsID'  AND userID = '$userID'");
if($sql){
	mysql_query("DELETE FROM collectrolls WHERE collectrollsID = '$collectrollsID'  AND userID = '$userID'");
	header("location: myRolls.php");
	exit();
}
}
//One coin
if (isset($_POST["folderCoin"])) { 
$collectionID = $Encryption->decode($_POST['folderCoin']);
$collectrollsID = $Encryption->decode($_POST['folder']);
$collectionRolls->getCollectionFolderById($collectrollsID);
$folderID = $collectionRolls->getFolderID();
$folder->getFolderByID($folderID);

$sql = mysql_query("UPDATE collection SET collectrollsID = '0' WHERE collectionID = '$collectionID'  AND userID = '$userID'");

}

if (isset($_POST["changeCoinBtn"])) { 
$newID = $Encryption->decode($_POST['newID']);
$collectrollsID = $Encryption->decode($_POST['changeRoll']);
$oldID = $Encryption->decode($_POST['oldID']);

$sql = mysql_query("UPDATE collection SET collectrollsID = '$collectrollsID' WHERE collectionID = '$newID' AND userID = '$userID' ");
$sql2 = mysql_query("UPDATE collection SET collectrollsID = '0' WHERE collectionID = '$oldID' AND userID = '$userID'");
header("location: viewMixedRollEdit.php?ID=".$Encryption->encode($collectrollsID)."");
exit();
}

//EXPANDED FORM
if (isset($_POST["addRollCoinsExpBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['theRoll']);
	
foreach($_POST['collections'] as $collectionID){
		$insert=mysql_query("UPDATE collection SET collectrollsID = ".$collectrollsID." WHERE collectionID = ".$Encryption->decode($collectionID)." AND userID = '$userID' ");
		
	}
header("location: viewMixedRollEdit.php?ID=".$Encryption->encode($collectrollsID)."");
exit();	
}
if (isset($_POST["noRollBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['theRoll']);
$insert = mysql_query("UPDATE collection SET collectrollsID = '0' WHERE collectionID = ".$Encryption->decode($_POST['noID'])." AND userID = '$userID' "); 
header("location: viewMixedRollEdit.php?ID=".$Encryption->encode($collectrollsID)."");
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $rollNickname ?></title>
 <script type="text/javascript">
$(document).ready(function(){	

    var max = <?php echo $optionLimit; ?>;
    var checkboxes = $('.collections');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });

});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<hr />

<h1>Manage <?php echo $rollNickname ?> Coin Roll</h1>

<hr />

<table width="100%" border="0">
<tr align="center" class="darker">
    <td width="25"><h3><a href="viewMixedRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Roll Main View</a></h3></td>
    <td width="25%"><h3><a href="editRollCoinType.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>">Edit This Roll Details</a></h3></td>
    <td width="25%"><h3><a href="addRollsMixed.php">Add Mixed Type Roll</a></h3></td>
    <td width="25%"><h3><a href="myRolls.php">All Rolls</a></h3></td>
  </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr>
     <td width="50%">
     <img src="../img/Lincoln_Memorialplaceholder.jpg" width="30" height="30" align="absmiddle" />  <strong><a href="viewTypeRollNewCoins.php?ID=<?php echo $Encryption->encode($collectrollsID); ?>">Add New Coins To Roll: </a></strong>
      <br />
<span id="enterOpenCoinsSpan">*Add New Coins To Collection for This Roll</span>
    </td>   
    <td width="50%">
        <form action="" method="post" class="compactForm" id="removeAllCoinsForm">
        <strong><img src="../img/blank.jpg" width="30" height="30" align="absmiddle" /> Remove All Coins From Roll: </strong>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectrollsID); ?>" />
    <input name="removeAllCoinsBtn" id="removeAllCoinsBtn" type="submit" value="Remove All" onclick="if (confirm('Remove All Coins?')) { document.getElementById('removeAllCoinsBtn').setAttribute('value', 'Deleting...');}" /><br />
<span id="removeAllCoinsSpan">*Keep Roll</span>
    </form>
    </td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <form action="" method="post" class="compactForm" id="deleteFolderForm">
        <strong><img src="../img/noRoll.jpg" width="30" height="30" align="absmiddle" /> Delete Roll: </strong>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectrollsID); ?>" />
    <input name="deleteRollBtn" id="deleteRollBtn" type="submit" value="Remove Roll" onclick="if (confirm('Delete Roll And Keep Coins?')) { document.getElementById('deleteRollBtn').setAttribute('value', 'Deleting...');}" /><br />
<span id="deleteFolderSpan">*Keep Coins</span>
    </form></td>
    
    <td>        <form action="" method="post" class="compactForm" id="deleteFolderAndCoinsForm">
        <strong><img src="../img/rollEditIcon.jpg" width="30" height="30" align="absmiddle" /> Delete All: </strong>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectrollsID); ?>" />
    <input name="deleteRollAndCoinsBtn" id="deleteRollAndCoinsBtn" type="submit" value="Remove All"  onclick="if (confirm('Delete Roll And Coins?')) { document.getElementById('deleteRollAndCoinsBtn').setAttribute('value', 'Deleting...');}"  /><br />
<span id="deleteAllSpan">*Delete Roll &amp; Coins</span>
    </form></td>
  </tr>
</table>
<hr />

<p class="innerAlbum">Use the forms to search and add/update the roll coins.  The list will only be populated by the coins in your collection.  If you have a coin that meets this rolls criteria, you can go to the <a href="viewTypeRollNewCoins.php?ID=<?php echo $Encryption->encode($collectrollsID); ?>" class="brownLinkBold">Add New Coins To Roll: </a> page and enter the collection data.</p>

  <?php 
if ($collectionRolls->checkClosedMixedRollStatus($collectrollsID, $userID) == '0'){
 echo '<h4><span class="errorTxt">This Roll Is Full</span>, You Can Only Exchange Coins</h4>';	
} else {
?>

<h2><?php echo mysql_num_rows($availableCoinsRequest) ?> Available Coins In Collection</h2>
  <div id="collapseViewDiv">

<table width="100%" border="0">
  <tr>
    <td>    

<form action="" method="post" class="compactForm" id="addRollCoinsForm">
<select name="rollCoinID" id="rollCoinID" onchange="document.getElementById('addRollCoinsBtn').disabled=false;">
<option value="" selected="selected">Add Another Coin</option>
<?php 
$sql  = mysql_query("SELECT * FROM collection WHERE coinCategory = '".$collectionRolls->getCoinCategory()."' AND proservice = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID' ORDER BY coinYear DESC");
	$rollCount = mysql_num_rows($sql); 
	while($row = mysql_fetch_array($sql)){
		$coinID = intval($row['coinID']);
		$collectionID = intval($row['collectionID']);
        $coin->getCoinById($coinID);
		$collection->getCollectionById($collectionID);
	echo '<option value="'.$Encryption->encode($collectionID).'">' .$coin->getCoinName() . ' ' .$collection->getCoinGrade() . '</option>';
}
?>
</select>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectrollsID); ?>" />
    <input name="addRollCoinsBtn" id="addRollCoinsBtn" type="submit" value="Add Coin" onclick="return confirm('Add Coin to Roll?')" /> 
    <span class="brownLink" id="expandView" onclick="$('#collapseViewDiv').hide();$('#expandViewDiv').show();">Expanded View</span>
    <br />
<p id="deleteAllSpan">*Set, Slabbed &amp; Folder Coins <strong>(Not Included)</strong></p>
    </form>
 </td>   
 </tr>   
 </table>
 </div>   
  
<div id="expandViewDiv">
<form action="" method="post" class="compactForm" id="addRollCoinsExpForm">
<table width="100%" cellpadding="3" id="newOpenCoinsTbl">

<thead class="darker">
<tr>
<td width="73%">Coin</td>
<td width="11%">Grade</td>
<td width="16%">Collected</td>
</tr>
</thead>

<tbody>
<?php
$i = 1;
$result  = mysql_query("SELECT * FROM collection WHERE coinCategory = '".$collectionRolls->getCoinCategory()."' AND proservice = 'None' AND collectfolderID = '0' AND collectrollsID = '0' AND collectsetID = '0' AND setregID = '0' AND userID = '$userID' ORDER BY coinYear DESC");
if(mysql_num_rows($result)== 0){
	echo    ' 
	<tr class="gryHover" align="center">
    <td align="left"><a href="addCoinRaw.php">No Coins Saved, Add</a></td>
	<td>&nbsp;</td> <td>&nbsp;</td>    
  </tr>';
} else {

while($row = mysql_fetch_array($result)){
        $coin->getCoinById(intval($row['coinID']));
		$collection->getCollectionById(intval($row['collectionID']));
		$i++;
echo '
<tr class="gryHover">
<td><input class="collections" name="collections[]" type="checkbox" value="'.$Encryption->encode($row['collectionID']).'" id="rollCoin'.$i.'" /><label for="rollCoin'.$i.'">' .$General->summary($coin->getCoinName(), $limit=100, $strip = false). '</label>&nbsp;</td>
<td>' .$collection->getCoinGrade() . '</td>
<td>'.date("M j Y ",strtotime($collection->getCoinDate())) .'</td>
</tr>'; 
}
}
?>
</tbody>

<tfoot class="darker">
<tr>
<td width="73%">Coin</td>
<td width="11%">Grade</td>
<td width="16%">Collected</td>
</tr>
</tfoot>

</table>
<br />
        <input name="theRoll" type="hidden" value="<?php echo $Encryption->encode($collectrollsID); ?>" />
    <input name="addRollCoinsExpBtn" id="addRollCoinsExpBtn" type="submit" value="Add Coins" onclick="if (confirm('Add Coins to Roll?')) { document.getElementById('addRollCoinsExpBtn').setAttribute('value', 'Adding...');}" /> 
    <span class="brownLink" id="collapseView" onclick="$('#expandViewDiv').hide();$('#collapseViewDiv').show();">Collapsed View</span>
<p id="deleteAllSpan">*Set, Slabbed &amp; Folder Coins <strong>(Not Included)</strong></p>
</form>
</div>
<?php }?>
<hr />
<h3>Exchange/Delete Roll Coins (<?php echo $collectionRolls->getRollCount($collectrollsID, $userID); ?>)</h3>
<table width="98%" border="0" id="coinChangerTbl" cellpadding="3">
  <tr class="darker">
    <td width="48%">Coin</td>
    <td width="48%">Other Coins In Collection</td>
    <td width="4%">&nbsp;</td>
  </tr>
<?php 
	$sql  = mysql_query("SELECT * FROM collection WHERE collectrollsID = '".$collectrollsID."' AND userID = '$userID' LIMIT ".$CoinCategories->getRollCount()."") or die(mysql_error()); 
	$rollCount = mysql_num_rows($sql); 
	while($row = mysql_fetch_array($sql)){
        $coin->getCoinById(intval($row['coinID']));
		$collection->getCollectionById(intval($row['collectionID']));
	echo '<tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">' .$coin->getCoinName() . '</a> ' .$collection->getCoinGrade() . '</td>
    <td>'.$collectionRolls->otherMixedCoinsList(intval($row['collectionID']), $collectionRolls->getCoinCategory(), $userID, $collectrollsID).'</td>
	<td><form method="post" action="" class="compactForm">
	<input name="noID" type="hidden" value="'.$Encryption->encode(intval($row['collectionID'])).'"  />
	<input name="theRoll" type="hidden" value="'.$Encryption->encode($collectrollsID).'" />
	<input name="noRollBtn" class="noRollBtns" id="changeBtn" type="submit" value="X" onclick="return confirm(\'Remove This Coin From Roll?\')" /></form></td>
  </tr>';
}
?>
</table>

<br />
<p class="clear"><a class="topLink" href="#top">Top</a></p>
<p>&nbsp;</p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>