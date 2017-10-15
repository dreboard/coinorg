<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', strip_tags($_GET["coinCategory"]));
$categoryLink = strip_tags($_GET["coinCategory"]);

}
if (isset($_POST["removeAllCoinsBtn"])) { 
$collection->deleteAllCoins(mysql_real_escape_string($_POST["coinCategory"]), $userID); 
$_SESSION['message'] = '<span class="greenLink">All Removed From Collection</span>';
header('Location: coinCategoryManage.php?coinCategory='.str_replace(' ', '_', $_POST["coinCategory"]).'');
exit();
}



if (isset($_POST["noID"])) { 
$collectionID = $Encryption->decode($_POST['noID']);
$FileManager->recursiveRemove($userID.'/'.$collectionID);
mysql_query("DELETE FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID' LIMIT 1") or die(mysql_error());
header('Location: coinCategoryManage.php?coinCategory='.str_replace(' ', '_', $_POST["coinCategory"]).'');
exit();
}

/*if (isset($_POST["noID2"])) { 
if($collection->deleteCoin($Encryption->decode($_POST['noID']), $userID)){
$_SESSION['message'] = '<span class="greenLink">Coin Removed From Collection</span>';
header('Location: coinCategoryManage.php?coinCategoryManage='.str_replace(' ', '_', $_POST["coinCategory"]).'');
exit();
} else {
$_SESSION['message'] = '<span class="errorTxt">Coin Could Not Be Removed From Collection</span>';	
}
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Manage <?php echo str_replace('_', ' ', strip_tags($_GET["coinCategory"])); ?> Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	
$("#progress").hide();
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
$(".switchSelect").change(function() {
   $("#progress").show();
});

});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">

<h1><img src="../img/<?php echo $_GET["coinCategory"]; ?>.jpg" alt="11" width="40" height="40" border="0" align="absmiddle" /> Manage <a href="<?php echo strip_tags($_GET["coinCategory"]) ?>.php" class="brownLink"><?php echo str_replace('_', ' ', strip_tags($_GET["coinCategory"])); ?></a> Coins</h1>

<table width="100%" border="0">
  <tr>
    <td colspan="2"><h3><a href="categoryCoins.php?coinCategory=<?php echo $_GET["coinCategory"];?>"><?php echo $collection->getMasterCoinCountByCoinCategory(str_replace('_', ' ', strip_tags($_GET["coinCategory"])), $userID); ?></a> Coins</h3></td>
    <td width="37%" align="left"><?php echo $_SESSION['message']; ?></td>
    <td width="38%" align="right" valign="middle"> <img src="../siteImg/loader.gif" width="102" height="14" id="progress" />
      <select id="switchCategory" class="switchSelect" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category</option>
        <option value="coinCategoryManage.php?coinCategory=Half_Cent">Half Cents</option>
        <option value="coinCategoryManage.php?coinCategory=Large_Cent">Large Cent</option>
        <option value="coinCategoryManage.php?coinCategory=Small_Cent">Small Cents</option>
        <option value="coinCategoryManage.php?coinCategory=Two_Cent">Two Cent</option>
        <option value="coinCategoryManage.php?coinCategory=Three_Cent">Three Cent</option>
        <option value="coinCategoryManage.php?coinCategory=Half_Dime">Half Dime</option>
        <option value="coinCategoryManage.php?coinCategory=Nickel">Nickel</option>
        <option value="coinCategoryManage.php?coinCategory=Dime">Dime</option>
        <option value="coinCategoryManage.php?coinCategory=Twenty_Cent">Twenty Cent</option>
        <option value="coinCategoryManage.php?coinCategory=Quarter">Quarter</option>
        <option value="coinCategoryManage.php?coinCategory=Half_Dollar">Half Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Dollar">Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Quarter_Eagle">Quarter Eagle</option>
        <option value="coinCategoryManage.php?coinCategory=Three_Dollar">Three Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Four_Dollar">Four Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Five_Dollar">Five Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Ten_Dollar">Ten Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Twenty_Dollar">Twenty Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Twenty_Five_Dollar">Twenty Five Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=Fifty_Dollar">Fifty Dollar</option>
        <option value="coinCategoryManage.php?coinCategory=One_Hundred_Dollar">One Hundred Dollar</option>
  </select></td>
  </tr>
  <tr>
    <td class="darker">
      <form action="" method="post" class="compactForm" id="deleteTypeForm">
  <input name="coinCategory" type="hidden" value="<?php echo strip_tags($_GET["coinCategory"]); ?>" />
  <input type="submit" value="Remove All" class="yearSwitch" name="removeAllCoinsBtn" id="removeAllCoinsBtn" onclick="return confirm('Delete All <?php echo $coinCategory ?> Coins?');" />
  </form>
      </td>
    <td align="left"><a href="coinCategoryBulk.php?coinCategory=<?php echo str_replace(' ', '_', $_GET["coinCategory"]) ?>">Bulk Remove</a></td>
    <td colspan="2" align="left"><strong>Add:</strong> <select class="switchSelect" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Select Type</option>
      <?php
$countAll = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinCategory = '".str_replace('_', ' ', strip_tags($_GET["coinCategory"]))."' ORDER BY coinYear ASC ") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
		  echo '<option value="addCoinType.php?coinType='.str_replace('_', ' ', strip_tags($row["coinType"])).'">'.strip_tags($row["coinType"]).'</option>';
	  }
?>   
  </select></td>
  </tr>
</table>

<hr />


<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="47%" height="24">Year / Mint</td>  
    <td width="11%">Price</td>
    <td width="17%" align="center">Collected</td>
    <td width="12%" align="right"></td>
    <td width="13%" align="right"></td>
  </tr>
</thead>
  <tbody>
<?php
$i=0;
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', strip_tags($_GET["coinCategory"]))."' AND collectsetID = '0' AND  collectfirstdayID = '0' AND userID = '$userID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No Coins In Collection</td>
	<td>&nbsp;</td><td>&nbsp;</td>
	<td>&nbsp;</td><td>&nbsp;</td>
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collection->getCollectionById(intval($row['collectionID']));
  $coin-> getCoinById(intval($row['coinID']));  
  $i++;
  echo '
    <tr class="gryHover">
    <td>
	<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'" title="'.$coin->getCoinName().'">' .$General->summary($coin->getCoinName(), $limit=50, $strip = false). ' / '.substr($collection->getCoinGrade(), 0, 30).'</a></td>
	<td>'.$collection->getCoinPrice().'</td>	
	<td align="center">'.date("M j, Y",strtotime($collection->getCoinDate())).'</td>
	'.$collection->getCollectionStatus(intval($row['collectionID'])).'
	<td align="center">
	
	&nbsp;
		<form action="" method="post" class="compactForm">
	    <input name="coinCategory" type="hidden" value="'.strip_tags($_GET["coinCategory"]).'" />	
        <input name="noID" type="hidden" value="'.$Encryption->encode(intval($row['collectionID'])).'" />
	    <input id="collectionRemoveBtn'.$i.'" name="collectionRemoveBtn" type="submit" value="Remove" onclick="if (confirm(\'Remove From Collection?\')) { document.getElementById(\'collectionRemoveBtn'.$i.'\').setAttribute(\'value\', \'Deleting..\');}" />
	  </form>
</td>

	    
  </tr>
  ';
	  }
}
?>
</tbody>
    
<tfoot class="darker">
  <tr>
    <td width="47%" height="24">Year / Mint</td>  
    <td width="11%">Price</td>
    <td width="17%" align="center">Collected</td>
    <td width="12%" align="right"></td>
    <td width="13%" align="right"></td>
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