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


//EXPANDED FORM
if (isset($_POST["deleteCoinsBtn"])) { 
$coinCategory = strip_tags($_POST["coinCategory"]);
foreach($_POST['collections'] as $collectionID){
	$collectionID = $Encryption->decode($collectionID);
	$FileManager->recursiveRemove($userID.'/'.$collectionID);
	mysql_query("DELETE FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID' LIMIT 1") or die(mysql_error());	
	}
header('Location: coinCategoryBulk.php?coinCategory='.str_replace(' ', '_', $_POST["coinCategory"]).'');
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Bulk Remove <?php echo str_replace('_', ' ', strip_tags($_GET["coinCategory"])); ?> Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	
$("#progress").hide();
$('#coinTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
$(".switchSelect").change(function() {
   $("#progress").show();
});

$("#deleteCoinsBtn").attr("disabled", true);

$('.collections').change(function() {
    if ($('.collections:checked').length) {
        $('#deleteCoinsBtn').removeAttr('disabled');
    } else {
        $('#deleteCoinsBtn').attr('disabled', 'disabled');
    }
});

    $('#checkall').toggle(
        function () { 
            $('.collections').attr('Checked','Checked'); 
			$("#checkallLbl").text("Remove All.");
        },
        function () { 
            $('.collections').removeAttr('Checked'); 
			$("#checkallLbl").text("Select All.");
        }
    );

});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">

<h1><img src="../img/<?php echo $_GET["coinCategory"]; ?>.jpg" alt="11" width="40" height="40" border="0" align="absmiddle" /> Bulk Remove <a href="<?php echo strip_tags($_GET["coinCategory"]) ?>.php" class="brownLink"><?php echo str_replace('_', ' ', strip_tags($_GET["coinCategory"])); ?></a> Coins</h1>

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
    <td width="12%" class="darker">
      <form action="" method="post" class="compactForm" id="deleteTypeForm">
  <input name="coinCategory" type="hidden" value="<?php echo strip_tags($_GET["coinCategory"]); ?>" />
  <input type="submit" value="Remove All" class="yearSwitch" name="removeAllCoinsBtn" id="removeAllCoinsBtn" onclick="return confirm('Delete All <?php echo $coinCategory ?> Coins?');" />
  </form>
      </td>
    <td width="13%" align="left"><a href="coinCategoryManage.php?coinCategory=<?php echo str_replace(' ', '_', $_GET["coinCategory"]) ?>">Manager</a></td>
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


<div id="allCoinsDiv">
<form action="" method="post" class="compactForm" id="addRollCoinsExpForm">
<label for="checkall" id="checkallLbl" class="brownLink">Select All </label>  <input type="checkbox" id="checkall">
<br /><br />
<table width="100%" cellpadding="3" id="coinTbl">
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
$result = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', strip_tags($_GET["coinCategory"]))."' AND userID = '$userID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($result)== 0){
	echo    ' <tr class="gryHover" align="center">
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
<input name="coinCategory" type="hidden" value="<?php echo strip_tags($_GET["coinCategory"]); ?>" />	
<p class="clear"><input name="deleteCoinsBtn" id="deleteCoinsBtn" type="submit" value="Delete Coins" onclick="if (confirm('Remove These Coins?')) { document.getElementById('deleteCoinsBtn').setAttribute('value', 'Deleting...');}" /> </p>
    
    </form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>