<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_POST["rollCoinBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
mysql_query("UPDATE collection SET collectrollsID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
header('Location: viewCoinStorage.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_GET['ID'])) { 
$collectionID = $Encryption->decode($_GET['ID']);

if($collection->getCollectionById($collectionID) == NULL){
header("location: myCoins.php");
} else {

$coinType = $collection->getCoinType();
$coinID = $collection->getCoinID();
$coin-> getCoinById($coinID);
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinGrade = $collection->getCoinGrade();
$proService = $collection->getGrader();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);

if($collection->getCoinImage1() !== '../img/noPic.jpg'){
  $coinPic1 = '<img src="'.$collection->getCoinImage1().'" class="coinImg" />';
	} else {
	$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';
	}
  }
}

if (isset($_POST["collectionListBtn"])) { 
$coincollectID = mysql_real_escape_string($Encryption->decode($_POST["Collection"]));
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '$coincollectID' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
header("location: coinCollectionView.php?ID=".$Encryption->encode($coincollectID)."");
exit();
}

if (isset($_POST["collectionRemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET coincollectID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Collection</span>';
 header('Location: viewCoinStorage.php?ID='.$Encryption->encode($collectionID).'');
exit();
}


if (isset($_POST["containerListBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$containerID = mysql_real_escape_string($Encryption->decode($_POST["Collection"]));
mysql_query("UPDATE collection SET containerID = '$containerID' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Added To Container</span>';
 header('Location: viewCoinStorage.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["containerRemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collection SET containerID = '0' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Container</span>';
 header('Location: viewCoinStorage.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_POST["folderCoinBtn"])) { 
$collectionID = $Encryption->decode($_POST['ID']);
$sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$collectionID'  AND userID = '$userID'");
if(!$sql){
	$_SESSION['message'] = '<span class="errorTxt">Coin Not Removed</span>';
	}	 else {
	$_SESSION['message'] = '<span class="greenLink">Removed From Folder</span>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
<script type="text/javascript" src="../scripts/lightbox.js"></script>
<script type="text/javascript" src="../scripts/images.js"></script>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


$("#wantForm").submit(function() {
      if ($("#coinGrade").val() == "") {
		$("#coinGrade").addClass("errorInput");
        return false;
      }else {
	 $('#wantBtn').val("Adding to list.....");	  
	  return true;
	  }
});

$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#collectionListForm").submit(function() {
      if ($("#Collection").val() == "") {
		$("#Collection").addClass("errorInput");
        return false;
      }else {
	 $('#collectionListBtn').val("Adding to collection.....");	  
	  return true;
	  }
});






});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><?php echo $_SESSION['message']; ?></span>

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h1>

<?php include('../inc/pageElements/viewCoinLinks.php'); ?>

<hr />
<h2>Collection/Storage Details</h2>
<table width="100%" border="0">
  <tr>
    <td class="darker">Collection</td>
    <td>
<?php
if($collection->getCollectionFolder() == '0' && $collection->getCollectionRoll() == '0' && $collection->getCollectionSet() == '0') {
$countWant = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND coincollectID != '0' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countWant) == 0){
	  echo 'This coin is not in a collection, Add to: 
	  <form action="" method="post" class="compactForm" id="collectionListForm">
	  <select name="Collection" id="Collection">
      <option selected="selected" value="">Select</option>
		'.$CoinCollect->getOpenList($userID).'
    </select>
	  <input name="ID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	  <input id="collectionListBtn" name="collectionListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Collection?\')" />
	  </form> &nbsp;<a href="addCollection.php">Create New Collection</a>
	  ';
} else {

  while($row = mysql_fetch_array($countWant))
	  {
		$coincollectID = intval($row['coincollectID']); 
		$CoinCollect->getCoinCollectionById($coincollectID);
		echo '<a href="coinCollectionList.php?ID='.$Encryption->encode($coincollectID).'"><strong>'.$CoinCollect->getCoinCollectionName().'</strong></a>&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	    <input id="collectionRemoveBtn" name="collectionRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Collection?\')" />
	  </form>';
	  }
}
} else {
	echo 'This coin can not be placed in a collection';
}
?>
    </td>
  </tr>
  <tr>
    <td width="12%" class="darker">Folder</td>
    <td width="88%">
	<?php echo $collection->getFolderHolderNumber($collectionID, $userID) ?>  
    </td>
  </tr>
  <tr>
    <td class="darker">Roll</td>
    <td><?php echo $collection->getRollHolderNumber($collectionID, $userID) ?></td>
  </tr>
  <tr>
    <td><strong> Set</strong></td>
    <td><?php echo $collection->getSetHolderNumber($collectionID, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>Container</strong></td>
    <td>
    <?php
/*$contain = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND containerID != '0' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($contain) == 0){
	  echo 'This coin is not in a container, Add to: 
	  <form action="" method="post" class="compactForm" id="containerListForm">
	  <select name="Collection" id="Collection">
      <option selected="selected" value="">Select</option>
		'.$Container->getOpenList($userID).'
    </select>
	  <input name="ID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	  <input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />
	  </form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>
	  ';
} else {*/


if($collection->getCollectionFolder() == '0' && $collection->getCollectionRoll() == '0' && $collection->getCollectionSet() == '0') {
if($collection->getContainerID() == '0'){
	switch($collection->getGrader()){
		case 'None':
		echo 'This coin is not in a container, Add to: '.$Container->getOtherBoxList($userID, $collectionID);
		break;
		default:
				echo 'This coin is not in a container, Add to: '.$Container->getSlabBoxList($userID, $collectionID);
				break;
	}		 
} else {
	
		$Container->getContainerById($collection->getContainerID());
		echo '<a href="coinContainerList.php?ID='.$Encryption->encode($collection->getContainerID()).'"><strong>'.$Container->getContainerName().'</strong></a>&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	    <input id="containerRemoveBtn" name="containerRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Container?\')" />
	  </form>';
}
} else {
	echo 'This coin can not be placed in a container';
}

?>
    </td>
  </tr>
</table>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>