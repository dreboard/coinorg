<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['sheldon'])) { 
$sheldon = strip_tags($_GET['sheldon']);
$coinCategory = 'Large Cent'; 
$categoryLink = str_replace(' ', '_', $coinCategory); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $sheldon ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 3, "desc" ]],
	"iDisplayLength": 50
} );

});

</script> 

<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><img src="../img/Large_Cent.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $_GET['coinYear'] ?> Large Cent <?php echo $sheldon; ?> </h2>
<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Total Collected</strong></td>
    <td width="10%" align="right">0</td>
    <td width="11%">&nbsp;</td>
    <td width="13%"><strong>Face Value</strong></td>
    <td width="51%">$0.00</td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$0.00</td>
    <td>&nbsp;</td>
    <td>
    
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<form>
  <label for="listSwitcher">Filter Results: </label><select id="listSwitcher" name="q" onchange="showUser(this.value)">
<option value="all" selected="selected">Switch View:</option>
<option value="folder">In Folders</option>
<option value="roll">In Rolls</option>
<option value="set">In Sets</option>
<option value="certified">To Be Certified</option>
<option value="all">All</option>
</select>
</form>
<br />

<div id="thisCoinDiv">

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE sheldon = '$sheldon' AND userID = '$userID' ORDER BY purchaseDate DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><strong>No '.$coinCategory.'  '.$sheldon.' Collected</strong></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		}
  
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
</div>
<p class="clear">&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>