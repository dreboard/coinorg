<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$containerID = $Encryption->decode($_GET['ID']);
$Container->getContainerById($containerID);
$coinCategory = $Container->getCoinCategory();
$ContainerType->getContainerTypeById($Container->getContainerTypeID());


}


if (isset($_POST["collapseViewBtn"])) { 
$containerID = $Encryption->decode($_POST['theContainer1']);
$collectionID = $Encryption->decode($_POST['theCoin']);

echo $collectionID.'<br />';
echo $containerID;
$sql = mysql_query("UPDATE collection SET containerID = '$containerID' WHERE collectionID = '$collectionID' AND userID = '$userID'");
$_SESSION['message'] = 'Coins Added to Roll';
header("location: coinContainerSlabEdit.php?ID=".$Encryption->encode($containerID)."");
exit();
}
//roll mgt
if (isset($_POST["enterOpenCoinsBtn"])) { 
$containerID = $Encryption->decode($_POST['ID']);
$collectionRolls->addOpenFolderCoins($containerID, $userID);
$_SESSION['message'] = 'All Coins Added';
}
//All
if (isset($_POST["removeAllCoinsBtn"])) { 
$containerID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("UPDATE collection SET containerID = '0' WHERE containerID = '$containerID'  AND userID = '$userID'");
$_SESSION['message'] = 'All Coins Removed';
header("location: coinContainerSlabEdit.php?ID=".$Encryption->encode($containerID)."");
exit();
}


//All
if (isset($_POST["deleteBoxBtn"])) { 
$containerID = $Encryption->decode($_POST['deleteBox']);
mysql_query("DELETE FROM containers WHERE containerID = '$containerID' AND userID = '$userID'");
mysql_query("UPDATE collection SET containerID = '0' WHERE containerID = '$containerID'  AND userID = '$userID'");
header("location: coinContainer.php");
exit();
}

//One coin
if (isset($_POST["folderCoin"])) { 
$collectionID = $Encryption->decode($_POST['folderCoin']);
$containerID = $Encryption->decode($_POST['folder']);
$collectionRolls->getCollectionFolderById($containerID);
$folderID = $collectionRolls->getFolderID();
$folder->getFolderByID($folderID);

$sql = mysql_query("UPDATE collection SET containerID = '0' WHERE collectionID = '$collectionID'  AND userID = '$userID'");
header("location: coinContainerSlabEdit.php?ID=".$Encryption->encode($containerID)."");
exit();
}




//EXPANDED FORM
if (isset($_POST["addRollCoinsExpBtn"])) { 
$containerID = $Encryption->decode($_POST['expandContainer']);
$Container->getContainerById($containerID);
$loopLimit = $Container->getFull() - $Container->getBinCount($containerID, $userID);  


	foreach($_POST['selectID'] as $collectionID){
		$insert = mysql_query("UPDATE collection SET containerID = ".$containerID." WHERE collectionID = ".$Encryption->decode($collectionID)." AND userID = '$userID' ");
	}
header("location: coinContainerSlabEdit.php?ID=".$Encryption->encode($containerID)."");
exit();
}


if (isset($_POST["noID"])) { 
$collectionID = $Encryption->decode($_POST['noID']);
$containerID = $Encryption->decode($_POST['noContainer']);
mysql_query("UPDATE collection SET containerID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'");
header("location: coinContainerSlabEdit.php?ID=".$Encryption->encode($containerID)."");
exit();
}



//switch
if (isset($_POST["newID"])) { 
$containerID = $Encryption->decode($_POST['container']);
$newID = $Encryption->decode($_POST['newID']);
$oldID = $Encryption->decode($_POST['oldID']);

$sql = mysql_query("UPDATE collection SET containerID = '$containerID' WHERE collectionID = '$newID' AND userID = '$userID' ");
$sql2 = mysql_query("UPDATE collection SET containerID = '0' WHERE collectionID = '$oldID'  AND userID = '$userID'");
header("location: coinContainerSlabEdit.php?ID=".$Encryption->encode($containerID)."");
exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo 

$Container->getContainerName(); ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#expandViewDiv').hide();

$("#addRollCoinsForm").submit(function() {
      if($("#rollCoinID").val() == "")  {
		$("#rollCoinID").addClass("errorInput");
      return false;
      } else {
		$("#addRollCoinsBtn").prop('value', 'Updating...');  
	  return true;
	  }
});

$("#addRollCoinsExpBtn").submit(function() {
	$(this).prop('value', 'Adding Coins...Please Wait');  
});


$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


    var max = <?php echo $Container->openSlabCoinsRequest($containerID, $userID); ?>;
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
<h1><img src="../img/<?php echo str_replace(' ', '_', $ContainerType->getContainerTypeName()) ?>.jpg" width="200" height="100" align="absmiddle" /> <?php echo 

$Container->getContainerName(); ?></h1>
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center"><h3><a href="coinContainerSlab.php?ID=<?php echo $Encryption->encode($containerID) ?>">View Container</a></h3></td>    
    <td width="25%" align="center"><h3><a href="coinContainer.php" class="brownLinkBold">All Containers</a></h3></td>
    <td width="25%" align="center"><h3><a href="coinContainerType.php?containerType=<?php echo str_replace(' ', '_', strip_tags($Container->getContainerType

())); ?>" class="brownLink"><?php echo $Container->getContainerType(); ?></a></h3></td>

    <td width="25%" align="center"><h3><a href="coinContainerNew.php">Add New Container</a></h3></td>        
  </tr>
</table>

<hr />
<table width="100%" border="0">
  <tr>
     <td width="50%">
     <img src="../img/Lincoln_Memorialplaceholder.jpg" width="30" height="30" align="absmiddle" />  <strong><a href="addCoin.php">Add New Sets To Box: </a></strong>
      <br />
<span id="enterOpenCoinsSpan"> *Add New Coins To Collection</span>
    </td>   
    <td width="50%">
        <form action="" method="post" class="compactForm" id="removeAllCoinsForm">
        <strong><img src="../img/blank.jpg" width="30" height="30" align="absmiddle" /> Remove All Sets From Box: </strong>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
    <input name="removeAllCoinsBtn" id="removeAllCoinsBtn" type="submit" value="Remove All" onclick="return confirm('Remove All Coins?')" /><br />
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
        <strong><img src="../img/noRoll.jpg" width="30" height="30" align="absmiddle" /> Delete Box: </strong>
        <input name="deleteBox" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
    <input name="deleteBoxBtn" id="deleteBoxBtn" type="submit" value="Remove Roll" onclick="return confirm('Delete Box And Keep Coins?')" /><br />
<span id="deleteFolderSpan">*Keep Coins</span>
    </form></td>
    
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<div>
<?php 
if($Container->getSlabBoxCount($containerID, $userID) >= $Container->getFull()){
echo '<h4 class="errorTxt">This Tray Is Full</h4>';
} else {

?> 

<p class="innerAlbum">Use the forms to search and add/update the boxes coins.  The list will only be populated by the coins in your collection.  If you have a new coin that meets this rolls criteria, you can go to the <a href="addCoin.php" class="brownLinkBold">Add New Coins</a> page and enter the collection data.</p>
<h2><?php echo $Container->getSetTypeOpenCount($setType='Proof', $userID); ?> Available Sets In Collection</h2>
<div id="addLists"><table width="100%" border="0">
  <tr>
    <td>    
  <div id="collapseViewDiv">
<form action="" method="post" class="compactForm" id="addRollCoinsForm">
<select name="theCoin" id="theCoin">
<option value="" selected="selected">Add Another Set</option>
<?php 
$sql = mysql_query("SELECT * FROM collectset WHERE setType = 'Proof' AND containerID = '0' AND userID = '$userID' ORDER BY coinYear DESC");
	$rollCount = mysql_num_rows($sql); 
	while($row = mysql_fetch_array($sql)){
		$collectsetID = intval($row['collectsetID']);		
		$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
	echo '<option value="'.$Encryption->encode(intval($row['collectsetID'])).'">'.$CollectionSet->getSetNickname().'</option>';
}
?>
</select>
        <input name="theContainer1" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
    <input name="collapseViewBtn" id="addRollCoinsBtn" type="submit" value="Add Coin" onclick="return confirm('Add Set to Box?')" /> 
    <span class="brownLink" id="expandView" onclick="$('#collapseViewDiv').hide();$('#expandViewDiv').show();">Expanded View</span>
    <br />
<p id="deleteAllSpan">*Set &amp; Folder Coins <strong>(Not Included)</strong></p>
    </form>
 </div>   
  
<div id="expandViewDiv">
<form action="" method="post" class="compactForm" id="addRollCoinsExpForm">
<table width="100%" cellpadding="3">
<tr class="darker">
<td>Set</td>
<td>Type</td>
</tr>
<?php
$a = 0;
$result  = mysql_query("SELECT * FROM collectset WHERE setType = 'Proof' AND containerID = '0' AND userID = '$userID' ORDER BY coinYear DESC");
if(mysql_num_rows($result)== 0){
	echo    ' <tr class="gryHover" align="center">
    <td align="left"><a href="addMintSet.php">No Sets Saved, Add Mintset</a></td>
	<td>&nbsp;</td>   
  </tr>';
} else {

while($row = mysql_fetch_array($result)){
		$collectsetID = intval($row['collectsetID']);		
		$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		$Mintset->getMintsetById($CollectionSet->getMintsetID());
		$a++;
		switch ($CollectionSet->getMintsetID())
		{
		case "0":
		  $setTypeLink = '<a href="viewSets.php?setType=Year Set">Graded Year Sets</a>';
		  break;
		default:
		  $setTypeLink = '<a href="viewSet.php?ID='.$Encryption->encode($CollectionSet->getMintsetID()).'" title="'.$Mintset->getSetName().'">'.substr($Mintset->getSetName(), 0, 30).'</a>';
		}		

echo '<tr class="gryHover">
<td><input id="mintList'.$a.'" class="collections" name="selectID[]" type="checkbox" value="'.$Encryption->encode(intval($row['collectsetID'])).'" /> <label for="mintList'.$a.'">' .$CollectionSet->getSetNickname(). '</label></td>
<td>'.$setTypeLink.'</td>
</tr>'; 
}//close the while loop
}
echo '' //close out the table
?>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
        <input name="expandContainer" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
    <input name="addRollCoinsExpBtn" id="addRollCoinsExpBtn" type="submit" value="Add Coins" onclick="return confirm('Add All Coins to Box?')" /> 
    <span class="brownLink" id="collapseView" onclick="$('#expandViewDiv').hide();$('#collapseViewDiv').show();">Collapsed View</span>
<p id="deleteAllSpan">*Set &amp; Folder Coins <strong>(Not Included)</strong></p>
    </form>
</div>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></div>
<?php } ?>

<hr />
<h3>Exchange/Remove Box Sets (<?php echo $Container->getSlabBoxCount($containerID, $userID) ?>)</h3>

<table width="100%" border="0" id="coinChangerTbl" cellpadding="3">
<thead class="darker">
  <tr>
    <td width="40%">Set</td>
    <td width="15%">Type</td>
    <td width="31%">&nbsp;</td>
  </tr>
</thead>
  <tbody>
<?php 

	$sql2  = mysql_query("SELECT * FROM collectset WHERE containerID = '".$containerID."' AND userID = '$userID' ORDER BY coinYear DESC LIMIT ".$Container->getFull()." ") or die(mysql_error()); 
	$rollCount = mysql_num_rows($sql2); 
if(mysql_num_rows($sql2)== 0){
	  echo '
    <tr>
    <td><a href="addCoin.php" class="brownLinkBold">No Sets Saved In Box</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td><td>&nbsp;</td>	    
  </tr>
  ';
} else {
	while($row = mysql_fetch_array($sql2)){
  $collectsetID = intval($row['collectsetID']); 
  $mintsetID = intval($row['mintsetID']); 
  $CollectionSet->getCollectionSetById($collectsetID);
		if($CollectionSet->getMintsetID() !== 0){
		  $Mintset->getMintsetById($CollectionSet->getMintsetID());
		  }
	echo '<tr>
    <td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'">'.$CollectionSet->getSetNickname().'</a></td>
    <td><a href="viewSet.php?ID='.$Encryption->encode($mintsetID).'" title="'.$Mintset->getSetName().'">'.substr($Mintset->getSetName(), 0, 30).'</a></td>
	<td align="center">
	'.$Container->otherProofSetsList(intval($row['collectsetID']), $userID, $containerID).'
	<form method="post" action="" class="compactForm">
	<input name="noID" type="hidden" value="'.$Encryption->encode(intval($row['collectsetID'])).'"  />
	<input name="noContainer" type="hidden" value="'.$Encryption->encode($collectsetID).'" />
	<input name="noContainerBtn" class="noContainerBtns" id="changeBtn" type="submit" value="X" onclick="return confirm(\'Remove This Set From Box?\')" /></form></td>
  </tr>';
}
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="40%">Set</td>
    <td width="15%">Type</td>
    <td width="31%">&nbsp;</td>
  </tr>
</tfoot>
</table>

<p><a class="topLink" href="#top">Top</a></p>
<p><a href="http://cgi.ebay.co.uk/ws/eBayISAPI.dll?ViewItem&item=130849451064" target="_blank">
Please check out my other auctions!
</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>