<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectsetID = $Encryption->decode($_GET['ID']);
$CollectionSet->getCollectionSetById($collectsetID);

if($CollectionSet->getMintsetID() !== 0){
$Mintset->getMintsetById($CollectionSet->getMintsetID());
}
}

if (isset($_POST['deleteSetBtn'])) {
$collectsetID = $Encryption->decode($_GET['ID']);
$CollectionSet->getCollectionSetById($collectsetID);
$sql = mysql_query("DELETE * FROM collectset WHERE collectsetID = 'collectsetID' LIMIT 1")or die(mysql_error());
mysql_query("UPDATE collection SET collectsetID = '0' WHERE collectsetID = '$collectsetID' AND userID = '$userID'") or die(mysql_error()); 
	header("location: mintset.php");
	exit();
}

if (isset($_POST['DeleteAllBtn'])) {
$collectsetID = $Encryption->decode($_GET['ID']);

if($CollectionSet->deleteCollectedCoinSet($collectsetID, $userID) && $collection->deleteCoinAndImagesFromSet($collectionID, $collectsetID, $userID))
	header("location: mintset.php");
	
} else {
	$_SESSION['message'] = '<span class="errorTxt">Your Set Was Not Deleted</span>';
}

if (isset($_POST["containerListBtn"])) { 
$collectsetID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
$containerID = mysql_real_escape_string($Encryption->decode($_POST["Collection"]));
mysql_query("UPDATE collectset SET containerID = '$containerID' WHERE collectsetID = '$collectsetID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Added To Container</span>';
header("location: viewSetDetail.php?ID=".$Encryption->encode($collectsetID)."");
}
if (isset($_POST["containerRemoveBtn"])) { 
$collectsetID = mysql_real_escape_string($Encryption->decode($_POST["ID"]));
mysql_query("UPDATE collectset SET containerID = '0' WHERE collectsetID = '$collectsetID' AND userID = '$userID'") or die(mysql_error()); 
$_SESSION['message'] = '<span class="greenLink">Removed From Container</span>';
header("location: viewSetDetail.php?ID=".$Encryption->encode($collectsetID)."");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Mint Set</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h1><?php echo $CollectionSet->getSetNickname(); ?> </h1>
<table class="table">
  <tr>
    <td><strong>Set</strong></td>
    <td colspan="2" align="left"><a href="viewSet.php?ID=<?php echo $CollectionSet->getMintsetID() ?>" class="brownLinkBold"><?php echo $Mintset->getSetName() ?></a>&nbsp;</td>
    </tr>
  <tr>
    <td width="17%"><strong>Collected</strong></td>
    <td width="26%" align="left"><?php echo date("F j, Y",strtotime($CollectionSet->getCoinDate())); ?></td>
    <td width="57%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Investment</strong></td>
    <td>$<?php echo $CollectionSet->getCoinPrice(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Certified</strong></td>
    <td><?php echo $CollectionSet->getGrader(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
  <a href="editMintSet.php?ID=<?php echo $Encryption->encode($collectsetID); ?>" class="btn btn-primary btn-warning" role="button">Edit Set </a>
    <form action="" method="post" class="compactForm form-inline" role="form">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectsetID); ?>" /> <button class="btn btn-primary btn-danger" type="submit" name="deleteSetBtn" onclick="return confirm('Delete Set and Keep Coins?')" />Delete Set <span class="hidden-xs">(Keep Coins)</span></button>    
    
    </form>
        <form action="" method="post" class="compactForm form-inline" role="form">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectsetID); ?>" />
     <button class="btn btn-primary btn-danger" type="submit" name="DeleteAllBtn" onclick="return confirm('Delete Everything?')" />Delete All</button>
    </form>
 
    <?php if($CollectionSet->getMintsetID() !== '0'){  ?>
  <form action="addMintSetByID.php" method="get" class="compactForm form-inline" role="form">
    <input name="ID" type="hidden" value="<?php echo $CollectionSet->getMintsetID(); ?>" />
    <button class="btn btn-primary btn-success" type="submit" name="duplicateBtn" onclick="return confirm('Duplicate this set?')">Duplicate  <span class="hidden-xs">This Set</span></button>
    </form>
 <?php } ?> 
    </td>
    </tr>
</table>
<!--
<h3><?php //echo $Mintset->getSetName(); ?> Price Guide</h3>
<table width="100%" border="1" id="priceListTbl" cellpadding="3">
  <tr class="keyRow">
    <td>Sealed</td>
    </tr>

  <tr>
    <td>$<?php //echo $Mintset->getValue(); ?></td>
    </tr>
</table>
-->

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#detail" data-toggle="tab">Details</a></li>
  <li><a href="#collections" data-toggle="tab">Collection/Storage</a></li>
  <li><a href="#viewCoins" data-toggle="tab"> <span class="hidden-xs">View</span> Coins</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="detail">
<table class="table">
  <tr>
    <td width="39%"><strong>Coins Condition</strong></td>
    <td width="61%"><?php echo $CollectionSet->getCoinsCondition(); ?></td>
  </tr>
  <tr>
    <td><strong>Box Condition</strong></td>
    <td><?php echo $CollectionSet->getBoxCondition(); ?></td>
  </tr>
  <tr>
    <td><strong>Container Condition</strong></td>
    <td><?php echo $CollectionSet->getSlabCondition(); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>  
  </div>
  <div class="tab-pane" id="collections">
 <h3>Collection/Storage Details</h3>
<table class="table">
  <tr>
    <td width="12%" class="darker">Collection</td>
    <td width="88%">
<?php
$countWant = mysql_query("SELECT * FROM collectset WHERE collectsetID = '$collectsetID' AND coincollectID != '0' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countWant) == 0){
	  echo 'This roll is not in a collection, Add to: 
	  <form action="" method="post" class="compactForm form-inline" role="form">
	  <select name="Collection" class="form-control">
      <option selected="selected" value="">Select</option>
		'.$CoinCollect->getOpenList($userID).'
    </select>
	  <input name="ID" type="hidden" value="'.$Encryption->encode($collectsetID).'" />
	  <input id="collectionListBtn" name="collectionListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Collection?\')" />
	  </form> &nbsp;<a href="addCollection.php">Create New Collection</a>
	  ';
} else {

  while($row = mysql_fetch_array($countWant))
	  {
		$coincollectID = intval($row['coincollectID']); 
		$CoinCollect->getCoinCollectionById($coincollectID);
		echo '<a href="coinCollectionView.php?ID='.$Encryption->encode($coincollectID).'"><strong>'.$CoinCollect->getCoinCollectionName().'</strong></a>&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="'.$Encryption->encode($collectsetID).'" />
	    <input id="collectionRemoveBtn" name="collectionRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Collection?\')" />
	  </form>';
	  }
}
?>
    </td>
  </tr>
<?php if($CollectionSet->getSetType() == 'Proof'){?>  
  
  <tr>
    <td><strong>Container</strong></td>
    <td>
      <?php
if($CollectionSet->getContainerID() == '0'){
	  echo 'This set is not in a container, Add to: 
	  <form action="" method="post" class="compactForm" id="containerListForm">
	  <select name="Collection" id="Collection">
      <option selected="selected" value="">Select</option>
		'.$Container->getSetOpenList($userID, $collectsetID).'
    </select>
	  <input name="ID" type="hidden" value="'.$Encryption->encode($collectsetID).'" />
	  <input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />
	  </form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>
	  ';
} else {

		$Container->getContainerById($CollectionSet->getContainerID());
		echo $Container->getContainerTypeLinkByID($CollectionSet->getContainerID()).'&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="'.$Encryption->encode($collectsetID).'" />
	    <input id="containerRemoveBtn" name="containerRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Container?\')" />
	  </form>';
}
?>
      </td>
  </tr>
 <?php } else { ?>
  <tr>
    <td><strong>Container</strong></td>
    <td>
      <?php
if($CollectionSet->getContainerID() == '0'){
	  echo 'This set is not in a container, Add to: 
	  <form action="" method="post" class="compactForm" id="containerListForm">
	  <select name="Collection" id="Collection">
      <option selected="selected" value="">Select</option>
		'.$Container->getSetsOpenList($userID).'
    </select>
	  <input name="ID" type="hidden" value="'.$Encryption->encode($collectsetID).'" />
	  <input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />
	  </form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>
	  ';
} else {

		$Container->getContainerById($CollectionSet->getContainerID());
		echo $Container->getContainerTypeLinkByID($CollectionSet->getContainerID()).'&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="'.$Encryption->encode($collectsetID).'" />
	    <input id="containerRemoveBtn" name="containerRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Container?\')" />
	  </form>';
}
?>
      </td>
  </tr>
<?php }?>
  
</table> 
  
  </div>
  <div class="tab-pane" id="viewCoins">
<div id="minsetDiv">
<table class="table">
  <tr class="setThreeRow" valign="top"> 
<?php
$i = 1;

  function checkCoins($coinID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
{
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
 
$result = mysql_query("SELECT * FROM collection WHERE collectsetID = '".$Encryption->decode($_GET['ID'])."' AND userID = '$userID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($result) == 0){
	  echo '
		  <td colspan="4" align="center">You dont have any coins in this set</td>';
} else {
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$collectionID = intval($row['collectionID']);
	$coin->getCoinById($coinID);
	checkCoins($coinID);	
echo '<td>
	<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.checkCoins($coinID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 4) { //when you have echoed 3 <td>'s
echo '</tr><tr class="setThreeRow" valign="top"> '; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
}
?>
</tr></table>
</div>
  </div>
</div>












<p><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>