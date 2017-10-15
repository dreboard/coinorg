<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

/*if (isset($_GET['year'])) { 
$coinType = str_replace('_', ' ', strip_tags($_GET['coinType']));
$coinTypeQuery = str_replace('_', ' ', strip_tags($_GET['coinType']));
$coinTypeLink = $_GET['coinType'];
$coinYear = intval($_GET['year']);
$CoinTypes->getCoinByType($coinType);
}
*/

if (isset($_GET['year'])) { 
$coinType = str_replace('_', ' ', strip_tags($_GET['coinType']));
if($_GET['year'] > $coin->getTypeEndYear($coinType)){
$coinYear = $coin->getTypeEndYear($coinType);

$coinTypeQuery = str_replace('_', ' ', strip_tags($_GET['coinType']));
$coinTypeLink = $_GET['coinType'];
$CoinTypes->getCoinByType($coinType);	
	
} else if($_GET['year'] <= $coin->getTypeStartYear($coinType)){
$coinType = str_replace('_', ' ', strip_tags($_GET['coinType']));	
$coinYear = $coin->getTypeStartYear($coinType);

$coinTypeQuery = str_replace('_', ' ', strip_tags($_GET['coinType']));
$coinTypeLink = $_GET['coinType'];
$CoinTypes->getCoinByType($coinType);	
	
}else {
$coinYear = intval($_GET['year']);
$coinType = str_replace('_', ' ', strip_tags($_GET['coinType']));	
$coinTypeQuery = str_replace('_', ' ', strip_tags($_GET['coinType']));
$coinTypeLink = $_GET['coinType'];
$CoinTypes->getCoinByType($coinType);	
}
}

function getYearVersionImg($coinType, $coinYear){
	$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND coinYear = '$coinYear' LIMIT 1") or die(mysql_error());
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
		$coinType = str_replace(' ', '_', $row['coinVersion']);
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
<title><?php echo $coinYear ?> <?php echo $coinType ?> Coins</title>
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
<h1><img src="../img/<?php echo getYearVersionImg($coinType, $coinYear); ?>" width="100" height="100" align="left" /><a class="brownLink" href="viewSetYear.php?year=<?php echo $coinYear ?>"><?php echo $coinYear ?></a> <a class="brownLink" href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>"><?php echo $coinType ?></a> Coins</h1>



<table width="883" border="0" cellpadding="3" id="yearSwitchTbl" class="clear">
  <tr>
    <td width="61"><a class="yearSwitch" href="viewCoinYear.php?year=<?php echo $coinYear -1; ?>&coinType=<?php echo $coinTypeLink ?>"><?php echo $coinYear -1; ?></a> |</td>
    <td width="62"><a class="yearSwitch" href="viewCoinYear.php?year=<?php echo $coinYear +1; ?>&coinType=<?php echo $coinTypeLink ?>"><?php echo $coinYear +1; ?></a> |</td>
    <td width="403"> <span id="switchLbl">Select Year</span>  <form action="viewCoinYear.php" method="get" class="compactForm" id="yearSwitchForm">
<select class="yearSwitch" name="year" id="yearSwitch">
<option value="" selected="selected">Switch Year</option>
<?php 
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND coinYear != '0' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $field = mysql_fetch_assoc($sql)) {
		echo '<option value="'.$field['coinYear'].'">'.$field['coinYear'].' ('.$collection->getCointypeByYear(str_replace('_', ' ', $coinType), $field['coinYear'], $userID).')</option>';
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
<h2><a class="brownLink" href="viewSetYear.php?year=<?php echo $coinYear ?>"><?php echo $coinYear ?></a> <?php echo $coinType ?> Mint Mark Set <?php echo $collection->yearMintMarkCollectedNums(str_replace('_', ' ', strip_tags($_GET['coinType'])), intval($_GET['year']), $userID).' of '.$collection->yearMintMarkNums(str_replace('_', ' ', strip_tags($_GET['coinType'])), intval($_GET['year'])); ?> (<?php echo percent($collection->yearMintMarkCollectedNums(str_replace('_', ' ', strip_tags($_GET['coinType'])), $coinYear, $userID), $collection->yearMintMarkNums(str_replace('_', ' ', strip_tags($_GET['coinType'])), intval($_GET['year']))); ?>%)</h2>


<table width="98%" border="0" cellpadding="3" class="autoCoinTbl">
<tr valign="top" align="center">
<?php 
    $sql = mysql_query("SELECT DISTINCT mintmark 
	FROM coins WHERE 
	coinType =  '".str_replace('_', ' ', $coinType)."'
	AND coinYear = '$coinYear' 
	ORDER BY mintMark ASC") or die(mysql_error());

 while ($o = mysql_fetch_array($sql,MYSQL_ASSOC)) {
	 
        echo '<td><a href="viewCoinYearMint.php?coinType='.$coinTypeLink.'&mintMark='.$o['mintmark'].'&coinYear='.$coinYear.'"><img class="coinSwitch" src="../img/'.getMintMarkImage($coinYear, $userID, $o['mintmark'], $coinTypeQuery).'" alt="" width="100" height="100" /></a><br />
<a href="viewCoinYearMint.php?coinType='.$coinTypeLink.'&mintMark='.$o['mintmark'].'&coinYear='.$coinYear.'">'.$o['mintmark'].'</a></td>'; 
    }
?>
</tr></table>

<hr />
<h2><a class="brownLink" href="viewSetYear.php?year=<?php echo $coinYear ?>"><?php echo $coinYear ?></a> <?php echo str_replace('_', ' ', $coinType) ?> Complete Variety Set <?php echo $collection->getNumOfCoinSavedThisYear(intval($_GET['year']), $coinType, $userID); ?> of <?php echo $collection->getNumOfCoinThisYear(intval($_GET['year']), $coinType); ?> (<?php echo percent($collection->getNumOfCoinSavedThisYear(intval($_GET['year']), $coinType, $userID), $collection->getNumOfCoinThisYear(intval($_GET['year']), $coinType)); ?>%)</h2>

<table cellpadding="3" class="typeTbl" width="100%">
<tr valign="top" align="center">
<?php
$i = 1;

switch(str_replace('_', ' ', strip_tags($_GET['coinType']))){
	case 'State Quarter':
	case 'District of Columbia and US Territories':
	case 'America the Beautiful Quarter':
	
$result = mysql_query("SELECT * 
FROM coins
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinYear =  '".$coinYear."'
ORDER BY coinVersion ASC") or die(mysql_error());
	break;
	default:
$result = mysql_query("SELECT * 
FROM coins
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinYear =  '".$coinYear."'
ORDER BY mintMark ASC") or die(mysql_error());	
	break;
}	

while($row = mysql_fetch_array($result)){
		$coinID = intval($row['coinID']);
		$coinName = strip_tags($row['coinName']);
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		echo '<td width="140"><a href="viewCoin.php?coinID='.$coinID.'"><img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
 <a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr valign="top" align="center">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>
<hr />

<h2><a class="brownLink" href="viewSetYear.php?year=<?php echo $coinYear ?>"><?php echo $coinYear ?></a> Coins (<?php echo $collection->getAllCoinThisYear($coinYear, $coinType, $userID);?>)</h2>

 <?php if (in_array(str_replace('_', ' ', strip_tags($_GET['coinType'])), $snowTypes)) {?>  
<p><a href="snowYearReport.php?coinYear=<?php echo $coinYear; ?>&amp;coinType=<?php echo $_GET["coinType"]; ?>" class="brownLinkBold"><?php echo $coinYear; ?> Snow Report</a></p>
<?php } else { echo ''; }  ?> 

 <?php if (in_array(str_replace('_', ' ', strip_tags($_GET['coinType'])), $vamTypes)) {?>  
<p><a href="vamYearReport.php?coinYear=<?php echo $coinYear; ?>&amp;coinType=<?php echo $_GET["coinType"]; ?>" class="brownLinkBold"><?php echo $coinYear; ?> Vam Report</a></p>
<?php } else { echo ''; }  ?> 


<?php if (str_replace('_', ' ', strip_tags($_GET['coinType'])) == 'Franklin Half Dollar') {?>
<h3><a href="viewFullReport.php?coinType=Franklin_Half_Dollar" class="brownLink">Full Bell Lines Count</a> for <?php echo $coinYear; ?> (<?php echo $collection->getAttributeCountByYear($coinYear, $coinType,$userID) ?>)</h3>




<table cellpadding="3" class="typeTbl" width="100%">
<tr valign="top" align="center">
<?php
$i = 1;
$result = mysql_query("SELECT * 
FROM coins
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinYear =  '".$coinYear."'
ORDER BY mintMark ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
		$coinID = intval($row['coinID']);
		$coinName = strip_tags($row['coinName']);
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		echo '<td width="140"><a href="viewCoin.php?coinID='.$coinID.'"><img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
 <a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr valign="top" align="center">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>





<?php } else { echo ''; }  ?> 


 
<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="53%">Year / Mint</td>
    <td width="17%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * 
FROM collection
WHERE userID = '$userID' AND coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinYear =  '".$coinYear."'
ORDER BY mintmark ASC ") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
	<td>&nbsp;</td>
    <td>No '. str_replace('_', ' ', $coinType).' collected</td>
	<td></td><td></td>
	<td></td>	   
  </tr> ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img class="typeIcon" align="middle" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />';
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="middle" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="middle" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="middle" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="middle" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr class="gryHover" align="center"> 
	<td width="3%" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).' '.$collection->getVarietyForCoin(intval($row['collectionID'])).'</a></td>
	<td>'. $collection->getCoinGrade().$collection->getCoinAttribute(intval($row['collectionID']), $userID).$grader.'</td>
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
    <td width="3%">&nbsp;</td>
    <td width="53%">Year / Mint</td>
    <td width="17%" align="center">Grade</td>  
    <td width="14%" align="center"> Collected</td>
    <td width="13%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<hr />

<!--------------------------ONLY SHOW IF APPLIES TO YEAR------------------------------>

<?php
$countAll = mysql_query("SELECT * FROM rollsmint WHERE rollName LIKE '$coinYear%'  AND coinType =  '".str_replace('_', ' ', $coinType)."' ORDER BY coinID DESC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '';
} else {
	 echo '
	 <h2>Mint Rolls</h2>
<table width="100%" border="0">
<thead class="darker">
  <tr>
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase Price</td>
  </tr></thead>
  <tbody>
  ';

  while($row = mysql_fetch_array($countAll))
	  {
  $rollMintID = intval($row['rollMintID']);
  $rollCoinType = strip_tags($row['coinType']);
  $rollCoinLink = str_replace(' ', '_', $rollCoinType);
  $rollName = strip_tags($row['rollName']);
  echo '
    <tr class="gryHover">
    <td><a href="viewMintRoll.php?rollMintID='.$rollMintID.'">'.$rollName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$rollCoinLink.'">'.$rollCoinType.'</a></td>	
	<td align="center">'.$collectionRolls->getMintRollIDCountByID($rollMintID, $userID).'</td>
	<td align="center">$'.$collectionRolls->getMintRollIDValByID($rollMintID, $userID).'</td>	    
  </tr>
  ';
	  }
echo '
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase Price</td>
  </tr>
	</tfoot>
</table><hr />
';	  
	  
}
?>
<!-------------------------------FIRSTDAY COINS-------------------------------->
<?php
$countAll2 = mysql_query("SELECT * FROM firstday WHERE coinYear = '$coinYear'  AND coinType =  '".str_replace('_', ' ', $coinType)."' ORDER BY firstdayID DESC") or die(mysql_error());
if(mysql_num_rows($countAll2)== 0){
	  echo '';
} else {
	 echo '
	 <h2><a href="viewFirstDayType.php?coinType='.$coinTypeLink.'">First Day Coins</a></h2>
<table width="100%" border="0">
<thead class="darker">	 
  <tr>
    <td width="76%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase Price</td>
  </tr></thead>
  <tbody>
  ';

  while($row = mysql_fetch_array($countAll2))
	  {
  $firstdayID = intval($row['firstdayID']);
  $setName = strip_tags($row['setName']);
  $coinVersion = strip_tags($row['coinVersion']);
  echo '
    <tr class="gryHover">
    <td><a href="viewFirstDay.php?firstdayID='.$firstdayID.'">'.$setName.'</a></td>
	<td align="center">'.$CollectionFirstday->firstDayIDCollected($firstdayID, $userID).'</td>
	<td align="center">$'.$CollectionFirstday->totalFirstDayIDInvestment($firstdayID, $userID).'</td>	    
  </tr>
  ';
	  }
echo '
</tbody>
     
<tfoot class="darker">	 
  <tr>
    <td width="76%" height="24">Year / Mint</td>  
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase Price</td>
  </tr>
	</tfoot>
</table><hr />
';	  
	  
}
?>

<h2><a class="brownLink" href="viewSetYear.php?year=<?php echo $coinYear ?>"><?php echo $coinYear ?></a> Rolls</h2>
<table width="100%" border="0">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase Price</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE coinYear = '$coinYear' AND userID = '$userID' AND coinType =  '".str_replace('_', ' ', $coinType)."' ORDER BY coinCategory DESC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No rolls saved for '.$coinYear.', <a class="brownLinkBold" href="addRollCoinCategory.php?coinType='.$coinTypeLink.'">Add</a></td>
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
  echo '
    <tr class="gryHover">
    <td>'.$collectionRolls->getRollTypeLink(intval($row['collectrollsID'])).'</a></td>
	<td><a href="coinTypeRolls.php?coinType='.$rollCoinLink.'">'.$rollCoinType.'</a></td>	
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
    <td width="51%">Year / Mint</td>  
    <td>Type</td>    
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase Price</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>