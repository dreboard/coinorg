<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$containerID = $Encryption->decode($_GET['ID']);
$Container->getContainerById($containerID);
$coinCategory = $Container->getCoinCategory();

$ContainerType->getContainerTypeById($Container->getContainerTypeID());
}


//roll mgt

if (isset($_POST["removeAllRollsBtn"])) { 
$containerID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("UPDATE collectrolls SET containerID = '0' WHERE containerID = '$containerID'  AND userID = '$userID'");
$_SESSION['message'] = '<span class="greenLink">All Rolls Removed</span>';
header("location: coinContainerTrayEdit.php?ID=".$Encryption->encode($containerID)."");
}

//All
if (isset($_POST["deleteContainerBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['ID']);
mysql_query("DELETE FROM containers WHERE containerID = '$containerID' AND userID = '$userID'");
mysql_query("UPDATE collectrolls SET containerID = '0' WHERE containerID = '$containerID'  AND userID = '$userID'");
header("location: coinContainer.php");

}

//switch
if (isset($_POST["newID"])) { 
$containerID = $Encryption->decode($_POST['theContainer']);
$newID = $Encryption->decode($_POST['newID']);
$oldID = $Encryption->decode($_POST['oldID']);

$sql = mysql_query("UPDATE collectrolls SET containerID = '$containerID' WHERE collectrollsID = '$newID' AND userID = '$userID' ");
$sql2 = mysql_query("UPDATE collectrolls SET containerID = '0' WHERE collectrollsID = '$oldID'  AND userID = '$userID'");

//
}

//EXPANDED FORM
if (isset($_POST["addRollCoinsExpBtn"])) { 
$containerID = $Encryption->decode($_POST['theContainer']);
$Container->getContainerById($containerID);
$loopLimit = $ContainerType->getRollCount() - $Container->getBinCount($containerID, $userID);  

if(isset($_POST['collectrollsID']))
{
for($j = 0; $j <= $loopLimit; $j++)
    {
      $insert=mysql_query("UPDATE collectrolls SET containerID = ".$containerID." WHERE collectrollsID = ".$Encryption->decode($_POST["collectrollsID"][$j])." AND userID = '$userID' ");	  
    }
}
header("location: coinContainerTrayEdit.php?ID=".$Encryption->encode($containerID)."");
}


if (isset($_POST["addRollCoinsBtn"])) { 
$containerID = $Encryption->decode($_POST['ID']);
$collectrollsID = $Encryption->decode($_POST['rollCoinID']);

$sql = mysql_query("UPDATE collectrolls SET containerID = '$containerID' WHERE collectrollsID = '$collectrollsID'  AND userID = '$userID'");
$_SESSION['message'] = '<span class="greenLink">Rolls Added to Tray</span>';
header("location: coinContainerTrayEdit.php?ID=".$Encryption->encode($containerID)."");
}



if (isset($_POST["noRollBtn"])) { 
$collectrollsID = $Encryption->decode($_POST['noID']);
$containerID = $Encryption->decode($_POST['theContainer']);
$collectionRolls->removeRollContainer($collectrollsID, $userID);
header("location: coinContainerTrayEdit.php?ID=".$Encryption->encode($containerID)."");
}

$optionLimit = $ContainerType->getRollCount() - $Container->getBinCount($containerID, $userID);  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $Container->getContainerName(); ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


$('#expandViewDiv').hide();
    var max = <?php echo $optionLimit; ?>;
    var checkboxes = $('.collections');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo str_replace(' ', '_', $ContainerType->getContainerTypeName()) ?>.jpg" width="100" height="100" align="absmiddle" /> <?php echo $Container->getContainerName(); ?></h1>
<table width="100%" border="0">
  <tr>
    <td width="25%" align="center"><h3><a href="coinContainerBin.php?ID=<?php echo $Encryption->encode($containerID) ?>">View Container</a></h3></td>    
    <td width="25%" align="center"><h3><a href="coinContainer.php" class="brownLinkBold">All Containers</a></h3></td>
    <td width="25%" align="center"><h3><a href="coinContainerType.php?containerType=<?php echo str_replace(' ', '_', strip_tags($Container->getContainerType())); ?>" class="brownLink"><?php echo $Container->getContainerType(); ?></a></h3></td>

    <td width="25%" align="center"><h3><a href="coinContainerNew.php">Add New Container</a></h3></td>        
  </tr>
</table>
<hr />

<?php echo $_SESSION['message']; ?>
<table width="100%" border="0">
  <tr>
    <td width="50%"><form action="" method="post" class="compactForm" id="removeAllCoinsForm">
      <strong><img src="../img/blank.jpg" alt="" width="30" height="30" align="absmiddle" /> Remove All Rolls From Bin: </strong>
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
      <input name="removeAllRollsBtn" id="removeAllRollsBtn" type="submit" value="Remove All" onclick="return confirm('Remove All Coins?')" />
      <br />
      <span id="removeAllCoinsSpan">*Keep Bin</span>
    </form></td>
    <td><form action="" method="post" class="compactForm" id="deleteFolderForm">
      <strong><img src="../img/noRoll.jpg" alt="" width="30" height="30" align="absmiddle" /> Delete Bin: </strong>
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
      <input name="deleteContainerBtn" id="deleteContainerBtn" type="submit" value="Remove Roll" onclick="return confirm('Delete Container And Keep Rolls?')" />
      <br />
      <span id="deleteFolderSpan">*Keep Rolls</span>
    </form></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<hr />

<?php 
if($Container->getBinCount($containerID, $userID) >= $Container->getFull()){
echo '<h4 class="errorTxt">This Tray Is Full</h4>';
} else {

?>   

<table width="100%" border="0">
  <tr>
    <td>    
 
  <div id="collapseViewDiv">
<form action="" method="post" class="compactForm" id="addRollCoinsForm">
<label for="collectionID"><strong><?php echo $Container->availableRollIDCoinRequest($Container->getCoinCategory(), $userID); ?> </strong>Available Rolls In Collection </label>
<select name="rollCoinID" id="rollCoinID">
<option value="" selected="selected">Add Another Roll</option>
<?php 
$sql  = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = '".$Container->getCoinCategory()."' AND rollType != 'Mint' AND containerID = '0' AND userID = '$userID'");
	$rollCount = mysql_num_rows($sql); 
	while($row = mysql_fetch_array($sql)){
		$collectrollsID = intval($row['collectrollsID']);
        $collectionRolls->getCollectionRollById($collectrollsID);
	echo '<option value="'.$Encryption->encode($collectrollsID).'">' .$collectionRolls->getRollNickname() . ' ' .$collectionRolls->getRollType() . '</option>';
}
?>
</select>
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
    <input name="addRollCoinsBtn" id="addRollCoinsBtn" type="submit" value="Add Roll" onclick="return confirm('Add Roll to Tray?')" /> 
    <span class="brownLink" id="expandView" onclick="$('#collapseViewDiv').hide();$('#expandViewDiv').show();">Expanded View</span>
    <br />
<p id="deleteAllSpan">*US Mint Rolls <strong>(Not Included)</strong></p>
    </form>
 </div>   
  
<div id="expandViewDiv">
<form action="" method="post" class="compactForm" id="addRollCoinsExpForm">
<label for="collectionID"><strong><?php echo $Container->availableRollIDCoinRequest($Container->getCoinCategory(), $userID); ?> </strong> Available Rolls In Collection</label>
<br /><br />
<table width="100%">
<tr>
<?php
$i = 1;
$result  = mysql_query("SELECT * FROM collectrolls WHERE coinCategory = '".$Container->getCoinCategory()."' AND rollType != 'Mint' AND containerID = '0' AND userID = '$userID'");
while($row = mysql_fetch_array($result)){
        $collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
echo '<td width="25%"><input id="coinNum'.$i.'" class="collections" name="collectrollsID[]" type="checkbox" value="'.$Encryption->encode(intval($row['collectrollsID'])).'" /><label>' .$collectionRolls->getRollNickname() . ' ' .$collectionRolls->getRollType() . '</label>&nbsp;</td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>
<br />

        <input name="theContainer" type="hidden" value="<?php echo $Encryption->encode($containerID); ?>" />
    <input name="addRollCoinsExpBtn" id="addRollCoinsExpBtn" type="submit" value="Add Rolls" onclick="return confirm('Add All Rolls?')" /> 
    <span class="brownLink" id="collapseView" onclick="$('#expandViewDiv').hide();$('#collapseViewDiv').show();">Collapsed View</span>
<p id="deleteAllSpan">*US Mint Rolls <strong>(Not Included)</strong></p>
    </form>
</div>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php  } ?>

<hr />

<h3>Rolls (<?php echo $Container->getBinCount($containerID, $userID); ?>) | <a href="addRollType.php" class="brownLink">Add New Roll</a></h3>

<table width="100%" border="0" id="rollListTbl">
  <thead class="darker">
  <tr>
    <td width="47%">Roll Name</td>  
    <td width="13%" align="center">Roll Type</td>
    <td width="40%" align="center">&nbsp;</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND containerID = '$containerID'") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addBulk.php" class="brownLinkBold">No Rolls Saved In Bin</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $rollNickname = strip_tags($row['rollNickname']);  
  $coinGrade = strip_tags($row['coinGrade']);  
  $coinID = intval($row['coinID']);
  $coinCategory = strip_tags($row['coinCategory']);
  $coinGrade = strip_tags($row['coinGrade']);
  $rollType = strip_tags($row['rollType']);
  $collectrollsID = intval($row['collectrollsID']);
  $coinType = strip_tags($row['coinType']);
  $coinCategoryLink = str_replace(' ', '_', $coinCategory);
  $rollTypeLink = str_replace(' ', '_', $rollType);

  echo '
    <tr class="gryHover">
    <td>'.$collectionRolls->getRollTypeLink($collectrollsID).'</td>
	<td align="center"><a href="viewRollTypes.php?rollType='.$rollTypeLink.'&coinCategory='.$coinCategory.'">'.$rollType.'</a></td>		
	<td align="center">'.$Container->otherTrayTypeCoinsList($collectrollsID, $coinCategory, $userID, $containerID).'</td>
    
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="47%">Roll Name</td>  
    <td width="13%" align="center">Roll Type</td>
    <td width="40%" align="center">&nbsp;</td>
  </tr>
	</tfoot>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>