<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$collectsetID = $Encryption->decode($_GET['ID']);
$CollectionSet->getCollectionSetById($collectsetID);
$Mintset->getMintsetById($CollectionSet->getMintsetID());
}
function deleteCollectedCoinSet($collectsetID){
	$CollectionSet->getCollectionSetById($collectionID);
	if($CollectionSet->getCoinImage1() !== 'blankBig.jpg'){
		unlink($CollectionSet->getCoinImage1());
	}if($CollectionSet->getCoinImage2() !== 'blankBig.jpg'){
		unlink($CollectionSet->getCoinImage2());
	}if($CollectionSet->getCoinImage3() !== 'blankBig.jpg'){
		unlink($CollectionSet->getCoinImage3());
	}if($CollectionSet->getCoinImage4() !== 'blankBig.jpg'){
		unlink($CollectionSet->getCoinImage4());
	}
	  @mysql_query("DELETE FROM collectset WHERE collectsetID = '$collectsetID'") or die(mysql_error()); 
	  return;
}

if (isset($_POST['deleteSetBtn'])) {
$collectsetID = $Encryption->decode($_GET['ID']);
$CollectionSet->getCollectionSetById($collectsetID);
$sql = mysql_query("DELETE * FROM collectset WHERE collectsetID = 'collectsetID' LIMIT 1")or die(mysql_error());
	header("location: mintset.php");
	exit();
}
if (isset($_POST['DeleteAllBtn'])) {
$collectsetID = $Encryption->decode($_GET['ID']);
$sql = mysql_query("DELETE * FROM collection WHERE collectsetID = 'collectsetID'")or die(mysql_error());
$sql = mysql_query("DELETE * FROM collectset WHERE collectsetID = 'collectsetID' LIMIT 1")or die(mysql_error());
	header("location: mintset.php");
	exit();
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View Mint Set</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">
.topH1 {margin-top:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><a href="mintset.php" class="brownLinkBold">Mintsets</a> -> <a href="viewSet.php?ID=<?php echo $CollectionSet->getMintsetID(); ?>" class="brownLinkBold"><?php echo $Mintset->getSetName(); ?> </a></span>
<h1 class="topH1"><?php echo $CollectionSet->getSetNickname(); ?> </h1>

<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Collected</strong></td>
    <td width="28%" align="right"><?php echo date("F j, Y",strtotime($CollectionSet->getCoinDate()));; ?></td>
    <td width="57%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Investment</strong></td>
    <td align="right">$<?php echo $CollectionSet->getCoinPrice(); ?></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong>Certified</strong></td>
    <td align="right"><?php echo $CollectionSet->getGrader(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Year</strong></td>
    <td align="right"><a href="viewSetYear.php?year=<?php echo $CollectionSet->getCoinYear(); ?>" class="brownLinkBold"><?php echo $CollectionSet->getCoinYear(); ?></a></td>
    <td>&nbsp;</td>
  </tr>
</table>

<hr />
<h3>Set Detail</h3>
<table width="50%" border="0">
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
<hr />

<h3>Collection/Storage Details</h3>
<table width="100%" border="0">
  <tr>
    <td width="12%" class="darker">Collection</td>
    <td width="88%">
<?php
$countWant = mysql_query("SELECT * FROM collectset WHERE collectsetID = '$collectsetID' AND coincollectID != '0' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countWant) == 0){
	  echo 'This roll is not in a collection, Add to: 
	  <form action="" method="post" class="compactForm" id="collectionListForm">
	  <select name="Collection" id="Collection">
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
		'.$Container->getOtherOpenList($userID, $collectsetID).'
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

<hr />
<h3><?php echo $Mintset->getSetName(); ?> Price Guide</h3>
<table width="100%" border="1" id="priceListTbl" cellpadding="3">
  <tr class="keyRow">
    <td>Sealed</td>
    </tr>

  <tr>
    <td>$<?php echo $Mintset->getValue(); ?></td>
    </tr>
</table>
<p><a href="mintset.php" class="brownLinkBold">My Minsets </a> | <a href="addMintSet.php" class="brownLinkBold"> Add Mintset</a></p>

<div id="minsetDiv">
<table width="100%" border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
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
 
$result = mysql_query("SELECT * FROM collection WHERE collectsetID = '$collectsetID' AND userID = '$userID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($result) == 0){
	  echo '
		  <td colspan="4" align="center">You dont have any coins in this container</td>';
} else {
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$collectionID = intval($row['collectionID']);
	$coin->getCoinById($coinID);
	checkCoins($coinID);	
echo '<td width="14%" height="135">
	<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.checkCoins($coinID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 4) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
}
?>
</tr></table>
</div>
<hr />

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Coins</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE collectsetID = '$collectsetID' AND userID = '$userID'") or die(mysql_error());

  while($row = mysql_fetch_array($countAll))
	  {
  $collectionID = intval($row['collectionID']);
  $collection->getCollectionById($collectionID);  
  
  $coinID = intval($row['coinID']);
$coin->getCoinById($coinID);
$coin->getCoinName();
  
  echo '
    <tr align="center" class="gryHover">
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.$coin->getCoinName().' '.$coin->getCoinType().'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("F j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $CollectionSet->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td width="57%">Coins</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<p><script charset="utf-8" type="text/javascript" src="http://adn.ebay.com/files/js/min/ebay_activeContent-min.js"></script><br />
<?php $keyword = str_replace(' ', '+', $Mintset->getSetName()); ?>
<script charset="utf-8" type="text/javascript">// <![CDATA[
document.write('<scr' + 'ipt charset="utf-8" src="http://adn.ebay.com/cb?programId=1&#038;campId=5336737982&#038;toolId=10026&#038;keyword=<?php echo $CollectionSet->getCoinYear() ?>+mint+set+-grade+-proof&#038;width=900&#038;height=350&#038;font=1&#038;textColor=000000&#038;linkColor=0000AA&#038;arrowColor=8BBC01&#038;color1=4D4DA1&#038;color2=FFFFFF&#038;format=Flash&#038;contentType=TEXT_AND_IMAGE&#038;enableSearch=y&#038;useeBayT=n&#038;usePopularSearches=n&#038;freeShipping=n&#038;topRatedSeller=n&#038;itemsWithPayPal=n&#038;descriptionSearch=n&#038;showKwCatLink=n&#038;excludeCatId=&#038;excludeKeyword=&#038;catId=526&#038;disWithin=200&#038;ctx=n&#038;flashEnabled=' + isFlashEnabled + '&#038;pageTitle=' + _epn__pageTitle + '"></scr' + 'ipt>' );
// ]]&gt;</script></p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>