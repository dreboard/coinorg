<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinType'])) { 
$coinType = str_replace('_', ' ', strip_tags($_GET['coinType']));
$coinTypeQuery = str_replace('_', ' ', strip_tags($_GET['coinType']));
$mintMark = strip_tags($_GET['mintMark']);
$coinTypeLink = $_GET['coinType'];
$coinYear = intval($_GET['coinYear']);
$CoinTypes->getCoinByType($coinType);
}



function getCoinsYearImg($coinVersion, $userID, $coinYear){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinVersion = '".str_replace('_', ' ', $coinVersion)."' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return $coinVersion.'.jpg';
	}
	
	}	
}
 function getMintMarkImage($coinYear, $userID, $mintMark, $coinType){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND coinYear = '$coinYear' AND mintMark = '$mintMark' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinType = str_replace(' ', '_', $row['coinType']);
		return $coinType.'.jpg';
	}
	
	}	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinYear ?> <?php echo $mintMark ?> <?php echo $coinType ?> Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	


$("#yearSwitchForm").submit(function() {
      if ($("#yearSwitch").val() == "") {
		$("#yearSwitch").addClass("errorInput");
		$("#switchLbl").addClass("errorTxt");
        return false;
      }else {
	 $("#switchLbl").removeClass("errorTxt");
	 $('#yearSwitchBtn').val("Loading...");		  
	  return true;
	  }
});

});
</script> 
<style type="text/css">
#yearSwitchTbl {font-size:115%;}
.yearSwitch {font-size:115%;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="100" align="left" /><?php echo $coinYear ?> <?php echo $mintMark ?> <a class="brownLink" href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>"><?php echo $coinType ?></a> Coins</h1>



<table width="883" border="0" cellpadding="3" id="yearSwitchTbl" class="clear">
  <tr>
    <td width="61"><a class="yearSwitch" href="viewCoinYear.php?year=<?php echo $coinYear -1; ?>&coinType=<?php echo $coinTypeLink ?>"><?php echo $coinYear -1; ?></a> |</td>
    <td width="62"><a class="yearSwitch" href="viewCoinYear.php?year=<?php echo $coinYear +1; ?>&coinType=<?php echo $coinTypeLink ?>"><?php echo $coinYear +1; ?></a> |</td>
    <td width="403"> <span id="switchLbl">Select Year</span>  <form action="viewCoinYear.php" method="get" class="compactForm" id="yearSwitchForm">
<select class="yearSwitch" name="year" id="yearSwitch">
<option value="" selected="selected">Switch Year</option>
<?php 
$sql = mysql_query("SELECT DISTINCT LEFT(coinName,4) AS coinYearOption FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."'");
while( $field = mysql_fetch_assoc($sql)) {
		echo '<option value="'.$field['coinYearOption'].'">'.$field['coinYearOption'].'</option>';
	}	
?>
</select>
<input name="coinType" type="hidden" value="<?php echo $coinTypeLink ?>" />
<input type="submit" value="Load Year" class="yearSwitch" id="yearSwitchBtn" />
</form></td>
    <td width="323"><a href="viewProgressList.php?coinType=<?php echo $coinTypeLink ?>" class="brownLinkBold">Mint Mark Report</a></td>
  </tr>
</table>
<hr />
<h2><a href="viewCoinYear.php?year=<?php echo $coinYear ?>&coinType=<?php echo $coinTypeLink ?>"><?php echo $coinYear ?></a> <?php echo $mintMark ?> <?php echo str_replace('_', ' ', $coinType) ?>   Mint Mark Set <?php echo $collection->getNumOfCoinSavedThisYear($coinYear, $coinType, $userID); ?> of <?php echo $collection->getNumOfCoinThisYear($coinYear, $coinType); ?> (<?php echo percent($collection->getNumOfCoinSavedThisYear($coinYear, $coinType, $userID), $collection->getNumOfCoinThisYear($coinYear, $coinType)); ?>%)</h2>

<table cellpadding="3" class="typeTbl" width="100%">
<tr valign="top" align="center">
<?php
$i = 1;
$result = mysql_query("SELECT * 
FROM coins
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinYear =  '".$coinYear."'
AND mintMark = '".$mintMark."'
ORDER BY coinName DESC ") or die(mysql_error());
while($row = mysql_fetch_array($result)){
		$coinID = intval($row['coinID']);
		$coinName = strip_tags($row['coinName']);
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		echo '<td width="140"><a href="viewCoin.php?coinID='.$coinID.'"><img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
 <a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>';
$i = $i + 1; //add 1 to $i
if ($i == 9) { //when you have echoed 3 <td>'s
echo '</tr><tr valign="top" align="center">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>
<hr />

<h2>Coins (<?php echo $collection->getAllCoinThisYear($coinYear, $coinType, $userID);?>)</h2>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * 
FROM collection
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinYear =  '".$coinYear."'
AND mintMark = '".$mintMark."'
ORDER BY coinYear DESC ") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coinYear.' '.$mintMark.' coins collected</strong></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
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
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 50).' '. $collection->getCoinGrade() .$grader.' '.substr($collection->getVarietyForCoin(intval($row['collectionID'])), 0, 40).' '.substr($Errors->getErrorForCoin(intval($row['collectionID'])), 0, 40).'</a></td>
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
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>

<hr />

<h2>Rolls</h2>
<table width="100%" border="0" class="coinTbl">
  <thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE coinYear = '$coinYear' AND mintMark = '".$mintMark."' ORDER BY coinCategory DESC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No rolls saved for '.$coinYear.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collectrollsID = intval($row['collectrollsID']);
  $rollCoinType = strip_tags($row['coinType']);
  $rollCoinLink = str_replace(' ', '_', $rollCoinType);
  $rollNickname = strip_tags($row['rollNickname']);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a></td>
	<td><a href="viewListReport.php?coinType='.$rollCoinLink.'">'.$rollCoinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>