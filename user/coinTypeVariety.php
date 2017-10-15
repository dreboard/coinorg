<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', strip_tags($_GET["coinType"]));
$coinVersionLink = strip_tags($_GET["coinType"]);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType ?> Variety List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );

$("#loaderGif").hide();

$("#typeChanger").change(function() {
   $("#loaderGif").show();
});



 

});
</script>
<style type="text/css">
#listTbl h3 {margin:0px;}
#loaderGif {height:20px; width:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><?php echo $coinType ?> Variety Coins</h2>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="18%" rowspan="3" valign="top"><img src="../img/<?php echo $coinVersionLink ?>.jpg" alt="Obverse and reverse" name="obvRev" width="125" height="125" title="<?php echo $coinType ?>" /></td>
    <td>Type</td>
    <td><a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $coinType) ?>"><?php echo $coinType ?></a></td>
  </tr>
  <tr>
    <td width="23%">Total Collected</td>
    <td width="59%"><?php echo $collection->getCollectionCountByVarietyType($userID, $coinType); ?> (<?php echo $collection->getCollectionUniqueCountByVarietyType($userID, $coinType); ?> Unique)</td>
  </tr>
  <tr>
    <td>Total  Investment</td>
    <td>$<?php echo $collection->getCoinSumByVarietyType($userID, $coinType); ?></td>
    </tr>
</table>
  
  <div>

</div>
<br />
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

  <div id="relatedTypeDiv">
<table width="100%" border="0" cellpadding="3" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND  varietyCoin = '1' ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
echo '<td width="14%" height="135">
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
</tr>
</table> 
 
 
  </div>
  
<hr />
 
<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="53%">Year / Mint</td>
    <td width="9%" align="center">Grade</td>  
    <td width="19%" align="center"> Collected</td>
    <td width="15%" align="center">Purchase </td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE varietyCoin = '1'  AND coinType = '".str_replace('_', ' ', strip_tags($_GET["coinType"]))."'  AND userID = '$userID' AND coinYear < ".date("Y")." ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
    <td width="4%">&nbsp;</td>
    <td width="53%">No varieties collected</td>
    <td width="9%" align="center">&nbsp;</td>  
    <td width="19%" align="center"> &nbsp;</td>
    <td width="15%" align="center">&nbsp; </td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absmiddle" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />';
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr class="gryHover" align="center"> 
	<td width="3%">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).' '.substr($collection->getVarietyForCoin(intval($row['collectionID'])), 0, 20).' '.substr($Errors->getErrorForCoin(intval($row['collectionID'])), 0, 20).'</a></td>
	<td>'. $collection->getCoinGrade().$grader .'</td>
		<td>'.date("M j Y ",strtotime($collection->getCoinDate())) .'</td>
	<td>'. $collection->getCoinPrice() .'</td>	   	  
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td>&nbsp;</td>
    <td>Year / Mint</td>
    <td align="center">Grade</td>  
    <td width="19%" align="center"> Collected</td>
    <td width="15%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>
  <p>&nbsp;</p>
  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>