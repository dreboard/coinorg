<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$setregID = $Encryption->decode($_GET['ID']);
$SetRegistry->getSetRegById($setregID);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $SetRegistry->getSetregName(); ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">
.headpara {margin:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<p class="headpara">Set Registry</p>
<h1>View <?php echo $SetRegistry->getSetregName(); ?></h1>

<table width="100%" border="0">
  <tr>
    <td class="darker">Type</td>
    <td align="right"><?php echo $SetRegistry->getCoinType(); ?></td>
    <td align="right"><a href="regSet.php"><strong>All Set Registry</strong></a></td>
  </tr>
  <tr>
    <td width="15%" class="darker">Coins</td>
    <td width="28%" align="right"><?php echo $SetRegistry->getCoinsCount($setregID); ?></td>
    <td width="57%" align="right"><a href="regSetEdit.php?ID=<?php echo $Encryption->encode($setregID) ?>"><strong>Edit This Set</strong></a></td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $SetRegistry->getCollectionSum($setregID); ?></td>
    <td align="right" class="darker"><a href="regSetAdd.php?ID=<?php echo $Encryption->encode($setregID) ?>">Add Coins To This Set</a></td>
  </tr>
  <tr>
    <td class="darker">Collected</td>
    <td align="right"><?php echo date("F j, Y",strtotime($SetRegistry->getSetregDate()));; ?></td>
    <td align="right"><span class="darker"><a href="regSetNew.php">Add New Set Registry</a></span></td>
  </tr>
</table>
<br />
<p><?php echo $SetRegistry->getSetregDesc(); ?></p>
<hr />

<h3>Album View | <a href="setRegList.php?ID=<?php echo $Encryption->encode($setregID) ?>" class="brownLink">List View</a></h3>
<h3><img src="../siteImg/csv.jpg" width="50" height="50" align="absmiddle" /> Download CSV File</h3>
<table width="100%" border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;

  function checkCoins($coinID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE setregID = '$setregID'");
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
 
$result = mysql_query("SELECT * FROM collection WHERE setregID = '$setregID' ORDER BY denomination ASC ") or die(mysql_error());
if(mysql_num_rows($result) == 0){
	  echo '
		  <td colspan="4" align="center">You dont have any coins in this collection</td>';
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
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
}
?>
</tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>